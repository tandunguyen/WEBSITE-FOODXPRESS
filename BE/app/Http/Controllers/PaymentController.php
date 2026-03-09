<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonHang;

class PaymentController extends Controller
{
    // 1) Tạo link thanh toán
    public function createPayment(Request $request)
    {
        $order = DonHang::find($request->order_id);

        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        $vnp_TxnRef = $order->ma_don_hang;
        $vnp_Amount = $order->tong_tien * 100;

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_Command" => "pay",
            "vnp_TmnCode" => env("VNP_TMN_CODE"),
            "vnp_Amount" => $vnp_Amount,
            "vnp_CurrCode" => "VND",
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_OrderInfo" => "Thanh toan don hang #$vnp_TxnRef",
            "vnp_ReturnUrl" => env("VNP_RETURN_URL"),
            "vnp_IpAddr" => $request->ip(),
            "vnp_Locale" => "vn"
        ];

        ksort($inputData);

        $query = http_build_query($inputData);
        $hashdata = urldecode($query);

        $vnp_Url = env("VNP_URL") . "?" . $query;
        $vnp_Url .= "&vnp_SecureHash=" . hash_hmac("sha512", $hashdata, env("VNP_HASH_SECRET"));

        return response()->json([
            "payment_url" => $vnp_Url
        ]);
    }

    // 2) Return URL: user trở về site
    public function vnpayReturn(Request $request)
    {
        if ($request->vnp_ResponseCode == "00") {
            return view("payment.success");
        }
        return view("payment.failed");
    }

    // 3) IPN: xác nhận giao dịch real-time
    public function vnpayIpn(Request $request)
    {
        $inputData = $request->all();
        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHash']);

        ksort($inputData);
        $hashData = urldecode(http_build_query($inputData));
        $verify = hash_hmac('sha512', $hashData, env("VNP_HASH_SECRET"));

        // Sai chữ ký
        if ($verify !== $vnp_SecureHash) {
            return response()->json(['RspCode' => '97', 'Message' => 'Chu ky sai']);
        }

        // Thành công
        if ($inputData['vnp_ResponseCode'] == "00") {
            DonHang::where("ma_don_hang", $inputData['vnp_TxnRef'])
                ->update(["is_thanh_toan" => 1]);

            return response()->json(['RspCode' => '00', 'Message' => 'Thanh cong']);
        }

        return response()->json(['RspCode' => '02', 'Message' => 'Giao dich that bai']);
    }
}
