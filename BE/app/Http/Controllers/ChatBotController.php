<?php

namespace App\Http\Controllers;

use App\Models\DuLieuChat;
use App\Models\QuanAn;
use App\Models\MonAn;
use App\Models\Voucher;
use App\Models\DonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatBotController extends Controller
{
    public function chat(Request $request)
    {
        $message = trim((string) $request->input('message', ''));

        if ($message === '') {
            return response()->json(['error' => 'No message provided'], 400);
        }
        // ✅ DB-FIRST: match được thì trả luôn, KHÔNG gọi Gemini
        if ($db = $this->handleDbFirst($message)) {
            return response()->json($db);
        }

        try {
            $apiKey = env('GEMINI_API_KEY');
            if (!$apiKey) {
                return response()->json(['error' => 'Missing GEMINI_API_KEY in .env'], 500);
            }

            // 1) Embedding
            $embeddingResponse = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept'       => 'application/json',
            ])->timeout(60)->post(
                "https://generativelanguage.googleapis.com/v1beta/models/gemini-embedding-001:embedContent?key={$apiKey}",
                [
                    'content' => [
                        'parts' => [
                            ['text' => $message],
                        ],
                    ],
                ]
            );


            if (!$embeddingResponse->ok()) {
                return response()->json([
                    'error' => 'Không gọi được API embedding',
                    'raw'   => $embeddingResponse->json(),
                ], 500);
            }
            $userEmbedding = data_get($embeddingResponse->json(), 'embedding.values');
            if (!is_array($userEmbedding) || empty($userEmbedding)) {
                return response()->json(['error' => 'Không tạo được embedding từ câu hỏi'], 500);
            }

            // 2) Lấy dữ liệu nội bộ
            $query  = DuLieuChat::query()->select(['id', 'content', 'embedding']);
            if (!$query->exists()) {
                return response()->json([
                    'reply' => 'Hiện tại FoodXpress chưa có dữ liệu nội bộ để trả lời. Vui lòng train dữ liệu trước.',
                    'match' => null,
                    'score' => null,
                ]);
            }
            $ranked = [];
            $query->orderBy('id')->chunk(200, function ($rows) use (&$ranked, $userEmbedding) {
                foreach ($rows as $item) {
                    $dataEmbedding = json_decode($item->embedding, true);
                    if (!is_array($dataEmbedding) || empty($dataEmbedding)) continue;
                    $dot = 0.0;
                    $normA = 0.0;
                    $normB = 0.0;
                    foreach ($userEmbedding as $i => $v) {
                        $b = $dataEmbedding[$i] ?? 0.0;
                        $dot   += $v * $b;
                        $normA += $v * $v;
                        $normB += $b * $b;
                    }

                    $cosine = ($normA == 0.0 || $normB == 0.0) ? 0.0 : ($dot / (sqrt($normA) * sqrt($normB)));
                    $ranked[] = ['content' => $item->content, 'score' => $cosine];
                }
            });

            if (empty($ranked)) {
                return response()->json([
                    'reply' => 'Hiện tại FoodXpress chưa có dữ liệu nội bộ hợp lệ để trả lời.',
                    'match' => null,
                    'score' => null,
                ]);
            }
            usort($ranked, fn($a, $b) => $b['score'] <=> $a['score']);
            $topMatches = array_slice($ranked, 0, 5);

            $bestMatch = $topMatches[0]['content'] ?? null;
            $bestScore = isset($topMatches[0]['score']) ? (float) $topMatches[0]['score'] : 0.0;
            $context   = implode("\n", array_map(fn($m) => $m['content'], $topMatches));
            $prompt =
                "Bạn là nhân viên tư vấn thông minh của FoodXpress (Đà Nẵng).\n" .
                "Website có 4 tác nhân: khách hàng, admin, quán ăn và shipper.\n\n" .
                "Dưới đây là DỮ LIỆU NỘI BỘ (từ database FoodXpress):\n" .
                "----------------------\n{$context}\n----------------------\n\n" .
                "Độ tương đồng cao nhất: {$bestScore} (0..1).\n" .
                "- Nếu score < 0.5: trả lời \"Xin lỗi, hiện tại FoodXpress chưa có thông tin phù hợp trong hệ thống cho câu hỏi này.\".\n" .
                "- Tuyệt đối KHÔNG bịa thông tin không có trong dữ liệu.\n\n" .
                "Hướng dẫn:\n" .
                "1) Món ăn: tên, giá, giá khuyến mãi (nếu có), mô tả, quán bán.\n" .
                "2) Quán ăn: tên, địa chỉ, số điện thoại, giờ mở cửa.\n" .
                "3) Voucher: tên, mức giảm, điều kiện, thời gian áp dụng.\n" .
                "4) Lỗi chính tả: boucher/vourcher/mã giảm giá => voucher.\n" .
                "5) Trả lời thân thiện, ngắn gọn, dễ hiểu.\n" .
                "6) Chỉ trả TEXT thuần.\n\n" .
                "Câu hỏi: {$message}\n" .
                "Trả lời dựa trên dữ liệu nội bộ ở trên.";

            // 5) Generate
            $apiResponse = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept'       => 'application/json',
            ])->timeout(60)->post(
                "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key={$apiKey}",
                [
                    'contents' => [
                        ['role' => 'user', 'parts' => [['text' => $prompt]]],
                    ],
                ]
            );
            // ✅ bắt 429 cho đẹp (đỡ báo 500)
            if ($apiResponse->status() == 429) {
                return response()->json([
                    'reply'  => 'AI đang quá tải hoặc đã hết lượt miễn phí. Bạn thử lại sau 30–60 giây nhé.',
                    'source' => 'gemini_429',
                ]);
            }

            if (!$apiResponse->ok()) {
                return response()->json([
                    'error' => 'Không có phản hồi hợp lệ từ Gemini',
                    'raw'   => $apiResponse->json(),
                ], 500);
            }
            $reply = data_get($apiResponse->json(), 'candidates.0.content.parts.0.text');

            if ($reply) {
                return response()->json([
                    'reply' => $reply,
                    'match' => $bestMatch,
                    'score' => round($bestScore, 3),
                ]);
            }

            return response()->json([
                'error' => 'Không có phản hồi từ Gemini',
                'raw'   => $apiResponse->json(),
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'error'   => 'API request failed',
                'details' => $e->getMessage(),
            ], 500);
        }
    }

    private function handleDbFirst(string $message): ?array
    {
        $lower = mb_strtolower(trim($message), 'UTF-8');


        // =========================
        // 0) GIỚI THIỆU N QUÁN / N MÓN
        // =========================

        // Giới thiệu về chatbot / website
        if (preg_match('/(gi[oớ]i\s*thi[eệ]u).*(b[aạ]n|trang\s*web|foodxpress)|b[aạ]n\s*l[aà]\s*ai|foodxpress\s*l[aà]\s*g[iì]/u', $lower)) {
            return [
                'reply' => "FoodXpress là **nền tảng đặt món ăn trực tuyến** giúp khách hàng tìm món, đặt hàng nhanh chóng; quán ăn quản lý thực đơn, đơn hàng; shipper nhận và giao đơn; admin quản lý toàn bộ hệ thống.",
                'source' => 'db_web_intro'
            ];
        }

        if (preg_match('/^(chào|xin\s*chào|hello|hi|hey)\b/u', $lower)) {
            $h = (int) date('H');
            $greet = ($h < 11) ? "Chào buổi sáng" : (($h < 18) ? "Chào buổi chiều" : "Chào buổi tối");

            return [
                'reply'  => "{$greet} 👋 FoodXpress có thể giúp gì cho bạn? (Ví dụ: “giá cafe sữa”, “quán nào bán cafe muối”, “bao nhiêu voucher”)",
                'source' => 'db_greeting'
            ];
        }

        // // 0) Chào hỏi / mở đầu cuộc trò chuyện (DB-first)
        // if (preg_match('/^(chào|xin\s*chào|hello|hi|hé\s*lô|hey)\b/u', $lower)) {
        //     return [
        //         'reply'  => "Chào bạn 👋 FoodXpress có thể giúp gì cho bạn? Bạn có thể hỏi: giá món, quán nào bán món, voucher, hoặc gợi ý món ăn.",
        //         'source' => 'db_greeting'
        //     ];
        // }


        // Giới thiệu N quán ăn (vd: "giới thiệu 5 quán ăn")
        if (preg_match('/gi[aớ]i\s*thi[eệ]u\s*(\d+)?\s*qu[aá]n(\s*ăn)?/u', $lower, $m)) {
            $n = isset($m[1]) ? (int)$m[1] : 5;
            $n = max(1, min($n, 10));

            $quans = QuanAn::where('is_active', 1)
                ->orderByDesc('id')
                ->limit($n)
                ->get(['ten_quan_an', 'dia_chi', 'so_dien_thoai', 'gio_mo_cua', 'gio_dong_cua']);

            if ($quans->isEmpty()) {
                return ['reply' => "Hiện chưa có quán ăn nào đang hoạt động.", 'source' => 'db_intro_quan_empty'];
            }

            $lines = [];
            foreach ($quans as $i => $q) {
                $lines[] = ($i + 1) . ". {$q->ten_quan_an} - {$q->dia_chi} (☎ {$q->so_dien_thoai}, {$q->gio_mo_cua}-{$q->gio_dong_cua})";
            }

            return ['reply' => "Gợi ý {$n} quán ăn:\n" . implode("\n", $lines), 'source' => 'db_intro_quan'];
        }

        // Giới thiệu N món ăn (vd: "giới thiệu 5 món ăn")
        if (preg_match('/gi[aớ]i\s*thi[eệ]u\s*(\d+)?\s*m[oó]n(\s*ăn)?/u', $lower, $m)) {
            $n = isset($m[1]) ? (int)$m[1] : 5;
            $n = max(1, min($n, 10));

            $mons = MonAn::where('tinh_trang', 1)
                ->orderByDesc('id')
                ->limit($n)
                ->get(['ten_mon_an', 'gia_ban', 'gia_khuyen_mai', 'id_quan_an']);

            if ($mons->isEmpty()) {
                return ['reply' => "Hiện chưa có món ăn nào đang bán.", 'source' => 'db_intro_mon_empty'];
            }

            $lines = [];
            foreach ($mons as $i => $mon) {
                $gia = ($mon->gia_khuyen_mai && $mon->gia_khuyen_mai > 0) ? $mon->gia_khuyen_mai : $mon->gia_ban;
                $lines[] = ($i + 1) . ". {$mon->ten_mon_an} - " . number_format((float)$gia, 0, ',', '.') . "đ";
            }

            return ['reply' => "Gợi ý {$n} món ăn:\n" . implode("\n", $lines), 'source' => 'db_intro_mon'];
        }

        // =========================
        // A) COUNT (BAO NHIÊU...)
        // =========================

        if (preg_match('/bao\s*nh[ií]êu.*(qu[aá]n|nh[aà]\s*h[aà]ng)/u', $lower)) {
            $count = QuanAn::where('is_active', 1)->count();
            return ['reply' => "Hiện hệ thống có {$count} quán ăn đang hoạt động.", 'source' => 'db_count_quan_an'];
        }

        if (preg_match('/bao\s*nh[ií]êu.*m[oó]n/u', $lower)) {
            $count = MonAn::where('tinh_trang', 1)->count();
            return ['reply' => "Hiện hệ thống có {$count} món ăn đang bán.", 'source' => 'db_count_mon_an'];
        }

        if (preg_match('/bao\s*nh[ií]êu.*(voucher|m[aã]\s*g[ií]am(\s*gi[aá])?)/u', $lower)) {
            $count = Voucher::where('tinh_trang', 1)->count();
            return ['reply' => "Hiện hệ thống có {$count} voucher còn hiệu lực.", 'source' => 'db_count_voucher'];
        }

        if (preg_match('/bao\s*nh[ií]êu.*(đ[oô]n|don)\s*h[aà]ng/u', $lower)) {
            $count = DonHang::count();
            return ['reply' => "Hiện hệ thống có {$count} đơn hàng.", 'source' => 'db_count_don_hang'];
        }

        // =========================
        // B) GIÁ MÓN (giá X / X bao nhiêu)
        // =========================

        // "giá cafe sữa"
        if (preg_match('/^gi[aá]\s+(.+)$/u', $lower, $m)) {
            $name = trim($m[1]);
            $mon = MonAn::where('ten_mon_an', 'like', "%{$name}%")->where('tinh_trang', 1)->first();
            if ($mon) {
                $gia = ($mon->gia_khuyen_mai && $mon->gia_khuyen_mai > 0) ? $mon->gia_khuyen_mai : $mon->gia_ban;
                return ['reply' => "Món **{$mon->ten_mon_an}** có giá **" . number_format((float)$gia, 0, ',', '.') . " đ**.", 'source' => 'db_price_mon'];
            }
        }

        // "cafe sữa bao nhiêu" / "cơm gà xé giá bao nhiêu"
        if (preg_match('/^(.+?)\s+(bao\s*nh[ií]êu|gi[aá])(\s*bao\s*nh[ií]êu)?$/u', $lower, $m)) {
            $name = trim($m[1]);
            $mon = MonAn::where('ten_mon_an', 'like', "%{$name}%")->where('tinh_trang', 1)->first();
            if ($mon) {
                $gia = ($mon->gia_khuyen_mai && $mon->gia_khuyen_mai > 0) ? $mon->gia_khuyen_mai : $mon->gia_ban;
                return ['reply' => "Món **{$mon->ten_mon_an}** có giá **" . number_format((float)$gia, 0, ',', '.') . " đ**.", 'source' => 'db_price_mon'];
            }
        }

        // =========================
        // C) QUÁN CÓ MÓN GÌ (TênQuán có món gì)
        // =========================
        if (preg_match('/^(.+?)\s+c[oó]\s+m[oó]n\s+g[iì]/u', $lower, $m)) {
            $tenQuan = trim($m[1]);

            $quan = QuanAn::where('ten_quan_an', 'like', "%{$tenQuan}%")->first();
            if ($quan) {
                $mons = MonAn::where('id_quan_an', $quan->id)
                    ->where('tinh_trang', 1)
                    ->limit(15)
                    ->pluck('ten_mon_an')
                    ->toArray();

                if (empty($mons)) {
                    return ['reply' => "Quán **{$quan->ten_quan_an}** hiện chưa có món nào.", 'source' => 'db_quan_mon_empty'];
                }

                return ['reply' => "Quán **{$quan->ten_quan_an}** có một số món: " . implode(', ', $mons) . (count($mons) >= 15 ? '…' : ''), 'source' => 'db_quan_list_mon'];
            }
        }

        // =========================
        // D) MÓN THUỘC QUÁN NÀO (X của quán nào / X thuộc quán nào)
        // =========================
        if (preg_match('/^(.+?)\s+(c[uủ]a|thu[oộ]c)\s+qu[aá]n\s*n[aà]o/u', $lower, $m)) {
            $name = trim($m[1]);

            // dùng relationship nếu bạn đã thêm MonAn->quanAn()
            $mon = MonAn::with('quanAn')
                ->where('ten_mon_an', 'like', "%{$name}%")
                ->where('tinh_trang', 1)
                ->first();

            if ($mon && $mon->quanAn) {
                return ['reply' => "Món **{$mon->ten_mon_an}** thuộc quán **{$mon->quanAn->ten_quan_an}**.", 'source' => 'db_mon_belong_quan'];
            }

            // fallback nếu chưa có relationship
            $mon2 = MonAn::where('ten_mon_an', 'like', "%{$name}%")->where('tinh_trang', 1)->first();
            if ($mon2) {
                $q = QuanAn::find($mon2->id_quan_an);
                if ($q) {
                    return ['reply' => "Món **{$mon2->ten_mon_an}** thuộc quán **{$q->ten_quan_an}**.", 'source' => 'db_mon_belong_quan'];
                }
            }
        }

        // =========================
        // E) QUÁN NÀO BÁN MÓN X
        // =========================
        if (preg_match('/qu[aá]n\s*n[aà]o\s*b[aá]n\s+(.+)/u', $lower, $m)) {
            $name = trim($m[1]);

            $mons = MonAn::where('ten_mon_an', 'like', "%{$name}%")
                ->where('tinh_trang', 1)
                ->limit(50)
                ->get(['id_quan_an']);

            if ($mons->count() > 0) {
                $quanIds = $mons->pluck('id_quan_an')->unique()->values()->toArray();
                $quans = QuanAn::whereIn('id', $quanIds)->pluck('ten_quan_an')->toArray();

                if (!empty($quans)) {
                    return ['reply' => "Một số quán có bán **{$name}**: " . implode(', ', $quans) . '.', 'source' => 'db_quan_sell_mon'];
                }
            }
        }

        // =========================
        // F) VOUCHER CỦA QUÁN (quán X có voucher gì)
        // =========================
        if (preg_match('/qu[aá]n\s+(.+?)\s+c[oó]\s+voucher\s*g[iì]/u', $lower, $m)) {
            $tenQuan = trim($m[1]);

            $quan = QuanAn::where('ten_quan_an', 'like', "%{$tenQuan}%")->first();
            if ($quan) {
                $vouchers = Voucher::where('id_quan_an', $quan->id)
                    ->where('tinh_trang', 1)
                    ->limit(5)
                    ->get(['ma_code', 'ten_voucher', 'loai_giam', 'so_giam_gia']);

                if ($vouchers->isEmpty()) {
                    return ['reply' => "Quán **{$quan->ten_quan_an}** hiện chưa có voucher.", 'source' => 'db_quan_voucher_empty'];
                }

                $lines = [];
                foreach ($vouchers as $v) {
                    $giam = ($v->loai_giam == Voucher::GIAM_PHAN_TRAM)
                        ? ($v->so_giam_gia . '%')
                        : (number_format((float)$v->so_giam_gia, 0, ',', '.') . 'đ');
                    $lines[] = "{$v->ma_code} - {$v->ten_voucher} (giảm {$giam})";
                }

                return ['reply' => "Voucher của **{$quan->ten_quan_an}**:\n- " . implode("\n- ", $lines), 'source' => 'db_quan_vouchers'];
            }
        }

        // =========================
        // G) GỢI Ý MÓN / ĂN GÌ HÔM NAY / NÊN ĂN GÌ (DB random)
        // =========================
        if (preg_match('/(gợi\s*ý|ăn\s*g[iì]|nên\s*ăn|tư\s*vấn).*(m[oó]n|h[oô]m\s*nay|bu[oổ]i\s*trưa)/u', $lower)) {
            $mons = MonAn::where('tinh_trang', 1)
                ->inRandomOrder()
                ->limit(5)
                ->get(['ten_mon_an', 'gia_ban', 'gia_khuyen_mai']);

            if ($mons->isEmpty()) {
                return ['reply' => "Hiện chưa có món ăn nào đang bán.", 'source' => 'db_suggest_empty'];
            }

            $lines = [];
            foreach ($mons as $i => $mon) {
                $gia = ($mon->gia_khuyen_mai && $mon->gia_khuyen_mai > 0) ? $mon->gia_khuyen_mai : $mon->gia_ban;
                $lines[] = ($i + 1) . ". {$mon->ten_mon_an} - " . number_format((float)$gia, 0, ',', '.') . "đ";
            }

            return ['reply' => "Gợi ý cho bạn:\n" . implode("\n", $lines), 'source' => 'db_suggest_mon'];
        }

        return null; // không match DB -> để chat() fallback qua RAG/Gemini

        // Ăn gì hôm nay
        if (preg_match('/(ăn\s*g[iì]\s*h[oô]m\s*nay|gợi\s*ý\s*m[oó]n)/u', $lower)) {
            $mons = MonAn::where('tinh_trang', 1)
                ->inRandomOrder()
                ->limit(5)
                ->get(['ten_mon_an', 'gia_ban', 'gia_khuyen_mai']);

            if ($mons->isEmpty()) {
                return ['reply' => "Hiện chưa có món ăn nào đang bán.", 'source' => 'db_suggest_empty'];
            }

            $lines = [];
            foreach ($mons as $i => $m) {
                $gia = ($m->gia_khuyen_mai && $m->gia_khuyen_mai > 0) ? $m->gia_khuyen_mai : $m->gia_ban;
                $giaFmt = number_format((float)$gia, 0, ',', '.');
                $lines[] = ($i + 1) . ". {$m->ten_mon_an} - {$giaFmt}đ";
            }

            return ['reply' => "Hôm nay bạn thử mấy món này nha:\n" . implode("\n", $lines), 'source' => 'db_suggest_mon'];
        }

        // ✅ Giới thiệu N món ăn (vd: "giới thiệu 5 món ăn")
        if (preg_match('/gi[aớ]i\s*thi[eệ]u\s*(\d+)?\s*m[oó]n(\s*ăn)?/u', $lower, $m)) {
            $n = isset($m[1]) ? (int)$m[1] : 5;
            $n = max(1, min($n, 10));

            $mons = MonAn::where('tinh_trang', 1)
                ->orderBy('id', 'desc')
                ->limit($n)
                ->get(['ten_mon_an', 'gia_ban', 'gia_khuyen_mai']);

            if ($mons->isEmpty()) {
                return ['reply' => "Hiện chưa có món ăn nào đang bán.", 'source' => 'db_intro_mon_empty'];
            }

            $lines = [];
            foreach ($mons as $i => $mon) {
                $gia = ($mon->gia_khuyen_mai && $mon->gia_khuyen_mai > 0) ? $mon->gia_khuyen_mai : $mon->gia_ban;
                $lines[] = ($i + 1) . ". {$mon->ten_mon_an} - " . number_format((float)$gia, 0, ',', '.') . "đ";
            }

            return ['reply' => "Gợi ý {$n} món ăn:\n" . implode("\n", $lines), 'source' => 'db_intro_mon'];
        }


        // ====== A) COUNT ======
        if (preg_match('/bao\s*nh[ií]êu.*(qu[aá]n|nh[aà]\s*h[aà]ng)/u', $lower)) {
            $count = QuanAn::where('is_active', 1)->count();
            return ['reply' => "Hiện hệ thống có **{$count}** quán ăn đang hoạt động.", 'source' => 'db_count_quan_an'];
        }

        if (preg_match('/bao\s*nh[ií]êu.*m[oó]n/u', $lower)) {
            $count = MonAn::where('tinh_trang', 1)->count();
            return ['reply' => "Hiện hệ thống có **{$count}** món ăn đang bán.", 'source' => 'db_count_mon_an'];
        }

        if (preg_match('/bao\s*nh[ií]êu.*(đ[oô]n|don)\s*h[aà]ng/u', $lower)) {
            $count = DonHang::count();
            return ['reply' => "Hiện hệ thống có **{$count}** đơn hàng.", 'source' => 'db_count_don_hang'];
        }

        if (preg_match('/bao\s*nh[ií]êu.*(voucher|m[aã]\s*gi[aả]m)/u', $lower)) {
            $count = Voucher::where('tinh_trang', 1)->count();
            return ['reply' => "Hiện hệ thống có **{$count}** voucher còn hiệu lực.", 'source' => 'db_count_voucher'];
        }
        return null;
    }
}
