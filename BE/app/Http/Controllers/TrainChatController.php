<?php

namespace App\Http\Controllers;

use App\Models\DuLieuChat;
use App\Models\MonAn;
use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use App\Models\QuanAn;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class TrainChatController extends Controller
{
    /**
     * Train tất cả dữ liệu
     */
    public function trainAll(Request $request)
    {
        ini_set('max_execution_time', 300);
        set_time_limit(300);

        DB::beginTransaction();
        try {
            $p1 = $this->trainStatic($request, false);
            $p2 = $this->trainQuanAn($request, false);
            $p3 = $this->trainMonAn($request, false);
            $p4 = $this->trainVouchers($request, false);
            $p5 = $this->trainDonHang($request, false);

            DB::commit();

            return response()->json([
                'message' => '✅ Train xong!',
                'counts'  => [
                    'static'    => $p1['inserted'],
                    'quan_an'   => $p2['inserted'],
                    'mon_an'    => $p3['inserted'],
                    'vouchers'  => $p4['inserted'],
                    'don_hang'  => $p5['inserted'],
                ],
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Train thông tin static
     */
    public function trainStatic(Request $request, bool $wrapResponse = true)
    {
        ini_set('max_execution_time', 300);
        set_time_limit(300);

        $items = [
            "Hệ thống đặt món trực tuyến hỗ trợ khách hàng tìm kiếm quán ăn, xem menu, đặt món và áp dụng voucher giảm giá.",
            "Khách hàng có thể đặt món mang về hoặc giao hàng tận nơi tùy theo từng quán ăn hỗ trợ.",
            "Mỗi quán ăn có khung giờ mở cửa, đóng cửa riêng. Hệ thống chỉ cho phép đặt món trong khung giờ hoạt động.",
            "Người dùng có thể lưu quán ăn yêu thích, xem lại lịch sử đơn hàng và áp dụng mã giảm giá phù hợp.",
        ];

        $force = (bool) $request->input('force', false);

        $inserted = 0;
        foreach ($items as $text) {
            $inserted += $this->upsertEmbedding($text, $force);
        }

        $data = ['inserted' => $inserted];

        return $wrapResponse ? response()->json($data) : $data;
    }

    /**
     * Train dữ liệu QUÁN ĂN
     */
    public function trainQuanAn(Request $request, bool $wrapResponse = true)
    {
        ini_set('max_execution_time', 300);
        set_time_limit(300);

        $query = QuanAn::query();

        // ?ids=1,2,3
        if ($request->filled('ids')) {
            $ids = array_filter(array_map('intval', explode(',', $request->input('ids'))));
            if (!empty($ids)) $query->whereIn('id', $ids);
        }

        // chỉ train quán active (nếu muốn train hết thì comment)
        $query->where('is_active', 1);

        $force = (bool) $request->input('force', false);

        $inserted = 0;
        $total = 0;

        // ✅ giảm chunk để tránh timeout (mỗi quán gọi 1 lần embedding)
        $query->orderBy('id')->chunkById(10, function ($quanAns) use (&$inserted, &$total, $force) {
            $total += $quanAns->count();

            foreach ($quanAns as $q) {
                $tinhTrangText = $q->tinh_trang ? 'đang hoạt động' : 'tạm ngưng';

                $text =
                    "Quán ăn #{$q->id}: {$q->ten_quan_an}. " .
                    "Địa chỉ: {$q->dia_chi}. " .
                    "Số điện thoại: {$q->so_dien_thoai}. " .
                    "Giờ mở cửa: {$q->gio_mo_cua} - {$q->gio_dong_cua}. " .
                    "Tình trạng: {$tinhTrangText}. " .
                    "Mã số thuế: {$q->ma_so_thue}.";

                $inserted += $this->upsertEmbedding($text, $force);
            }
        });

        $data = ['inserted' => $inserted, 'total' => $total];

        return $wrapResponse ? response()->json($data) : $data;
    }

    /**
     * Train dữ liệu MÓN ĂN
     */
    public function trainMonAn(Request $request, bool $wrapResponse = true)
    {
        ini_set('max_execution_time', 300);
        set_time_limit(300);

        $query = MonAn::query();
        $query->where('tinh_trang', 1);

        if ($request->filled('ids')) {
            $ids = array_filter(array_map('intval', explode(',', $request->input('ids'))));
            if (!empty($ids)) $query->whereIn('id', $ids);
        }

        $force = (bool) $request->input('force', false);

        $inserted = 0;
        $total = 0;

        $quanMap = QuanAn::pluck('ten_quan_an', 'id')->toArray();

        // ✅ train hết, chunk nhỏ tránh timeout
        $query->orderBy('id')->chunkById(20, function ($monAns) use (&$inserted, &$total, $force, $quanMap) {
            $total += $monAns->count();

            foreach ($monAns as $m) {
                $tenQuan = $quanMap[$m->id_quan_an] ?? 'quán ăn đối tác';

                $textGiaBan = is_null($m->gia_ban)
                    ? ''
                    : "Giá bán: " . number_format((float)$m->gia_ban, 0, ',', '.') . " VND. ";

                $textGiaKM = !empty($m->gia_khuyen_mai)
                    ? "Giá khuyến mãi: " . number_format((float)$m->gia_khuyen_mai, 0, ',', '.') . " VND. "
                    : '';

                $textMoTa = !empty($m->mo_ta) ? "Mô tả: {$m->mo_ta}. " : '';
                $textCombo = $m->is_combo ? "Đây là món combo, bao gồm: {$m->list_combo}. " : '';

                // ✅ thêm ID để tránh hash trùng
                $text =
                    "Món ăn #{$m->id}: {$m->ten_mon_an}. " .
                    "Thuộc quán: {$tenQuan}. " .
                    $textGiaBan . $textGiaKM . $textMoTa . $textCombo;

                $inserted += $this->upsertEmbedding($text, $force);
            }
        });

        $data = ['inserted' => $inserted, 'total' => $total];

        return $wrapResponse ? response()->json($data) : $data;
    }

    /**
     * Train dữ liệu VOUCHER
     */
    public function trainVouchers(Request $request, bool $wrapResponse = true)
    {
        ini_set('max_execution_time', 300);
        set_time_limit(300);

        $query = Voucher::query();
        $query->where('tinh_trang', 1);

        if ($request->filled('id_quan_an')) {
            $query->where('id_quan_an', (int)$request->input('id_quan_an'));
        }

        $force = (bool) $request->input('force', false);

        $inserted = 0;
        $total = 0;

        $quanMap = QuanAn::pluck('ten_quan_an', 'id')->toArray();

        // ✅ chunk nhỏ
        $query->orderBy('id')->chunkById(30, function ($vouchers) use (&$inserted, &$total, $force, $quanMap) {
            $total += $vouchers->count();

            foreach ($vouchers as $v) {
                $tenQuan = $quanMap[$v->id_quan_an] ?? 'một số quán ăn nhất định';

                $loaiGiamText = $v->loai_giam == Voucher::GIAM_PHAN_TRAM
                    ? 'giảm theo phần trăm trên giá trị đơn hàng'
                    : 'giảm tiền mặt trực tiếp vào đơn hàng';

                $mucGiamText = $v->loai_giam == Voucher::GIAM_PHAN_TRAM
                    ? $v->so_giam_gia . '%. '
                    : number_format((float)$v->so_giam_gia, 0, ',', '.') . ' VND. ';

                $donHangToiThieu = !empty($v->don_hang_toi_thieu)
                    ? "Đơn hàng tối thiểu: " . number_format((float)$v->don_hang_toi_thieu, 0, ',', '.') . " VND. "
                    : '';

                $giamToiDa = !empty($v->so_tien_toi_da)
                    ? "Số tiền giảm tối đa: " . number_format((float)$v->so_tien_toi_da, 0, ',', '.') . " VND. "
                    : '';

                $text =
                    "Voucher #{$v->id}: {$v->ten_voucher} (mã: {$v->ma_code}). " .
                    "Áp dụng cho: {$tenQuan}. " .
                    "Hình thức: {$loaiGiamText}. " .
                    "Mức giảm: {$mucGiamText}" .
                    $donHangToiThieu . $giamToiDa .
                    "Thời gian áp dụng: từ {$v->thoi_gian_bat_dau} đến {$v->thoi_gian_ket_thuc}.";

                $inserted += $this->upsertEmbedding($text, $force);
            }
        });

        $data = ['inserted' => $inserted, 'total' => $total];

        return $wrapResponse ? response()->json($data) : $data;
    }

    /**
     * Train dữ liệu ĐƠN HÀNG + CHI TIẾT
     */
    public function trainDonHang(Request $request, bool $wrapResponse = true)
    {
        ini_set('max_execution_time', 300);
        set_time_limit(300);

        $force = (bool) $request->input('force', false);

        $inserted = 0;
        $total = 0;

        DonHang::orderBy('id')->chunkById(10, function ($donHangs) use (&$inserted, &$total, $force) {
            foreach ($donHangs as $don) {
                $total++;

                $trangThaiText = match ($don->tinh_trang) {
                    DonHang::TINH_TRANG_CHUA_NHAN     => 'chưa nhận',
                    DonHang::TINH_TRANG_DA_NHAN       => 'đã nhận',
                    DonHang::TINH_TRANG_QUAN_DANG_LAM => 'quán đang chuẩn bị',
                    DonHang::TINH_TRANG_DA_GIAO       => 'đã giao',
                    DonHang::TINH_TRANG_DA_HUY        => 'đã huỷ',
                    default => 'không xác định',
                };

                $thanhToanText = $don->is_thanh_toan ? 'đã thanh toán' : 'chưa thanh toán';

                $chiTiet = ChiTietDonHang::where('id_don_hang', $don->id)->get();

                $monText = '';
                foreach ($chiTiet as $ct) {
                    $mon = MonAn::find($ct->id_mon_an);
                    if ($mon) {
                        // ✅ sửa đúng field tên món của bạn là ten_mon_an
                        $monText .= "- {$mon->ten_mon_an} x{$ct->so_luong}, giá {$ct->don_gia}. ";
                    }
                }

                $text =
                    "Đơn hàng #{$don->id} ({$don->ma_don_hang}). " .
                    "Người nhận: {$don->ten_nguoi_nhan}, SĐT {$don->so_dien_thoai}. " .
                    "Tiền hàng {$don->tien_hang}, phí ship {$don->phi_ship}, tổng tiền {$don->tong_tien}. " .
                    "Trạng thái {$trangThaiText}, {$thanhToanText}. " .
                    "Danh sách món: {$monText}";

                $inserted += $this->upsertEmbedding($text, $force);
            }
        });

        $data = ['inserted' => $inserted, 'total' => $total];

        return $wrapResponse ? response()->json($data) : $data;
    }

    /**
     * Gọi Gemini Embedding API
     */
    private function getEmbedding(string $text): array
    {
        $apiKey = env('GEMINI_API_KEY');
        if (!$apiKey) {
            throw new \Exception("Missing GEMINI_API_KEY in .env");
        }

        $url = "https://generativelanguage.googleapis.com/v1beta/models/text-embedding-004:embedContent?key={$apiKey}";

        $res = Http::withoutVerifying()
            ->timeout(60)
            ->retry(2, 500) // ✅ retry 2 lần nếu mạng chập chờn
            ->withHeaders(['Content-Type' => 'application/json'])
            ->post($url, [
                'content' => [
                    'parts' => [
                        ['text' => $text]
                    ]
                ]
            ]);

        if (!$res->successful()) {
            throw new \Exception("Embedding API error: " . $res->body());
        }

        $values = data_get($res->json(), 'embedding.values');
        if (!is_array($values) || empty($values)) {
            throw new \Exception("Embedding parse error: " . json_encode($res->json()));
        }

        return $values;
    }

    /**
     * Upsert theo hash (tránh trùng), có hỗ trợ force=1
     */
    private function upsertEmbedding(string $content, bool $force = false): int
    {
        $hash = sha1($content);

        $existing = DuLieuChat::where('hash', $hash)->first();
        if ($existing && !$force) return 0;

        $embedding = $this->getEmbedding($content);

        if ($existing) {
            $existing->update([
                'content'   => $content,
                'embedding' => json_encode($embedding),
            ]);
            return 1;
        }

        DuLieuChat::create([
            'content'   => $content,
            'embedding' => json_encode($embedding),
            'hash'      => $hash,
        ]);

        return 1;
    }
}
