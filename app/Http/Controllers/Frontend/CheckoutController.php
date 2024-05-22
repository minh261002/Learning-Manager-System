<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Notify;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Payment;
use App\Mail\Order as OrderMail;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function checkout()
    {
        if (Cart::count() == 0) {
            return redirect()->back();
        }

        $cart = Cart::content();
        $subTotal = Cart::initial('0', ',', '.');
        $total = Cart::total('0', ',', '.');
        $discount = Cart::discount('0', ',', '.');

        return view('frontend.pages.checkout', compact('cart', 'subTotal', 'total', 'discount'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|string|in:vnpay,momo,paypal',
        ]);

        DB::beginTransaction();

        try {
            // Lấy thông tin giỏ hàng
            $cart = Cart::content();
            $total = Cart::total('0', '', '');
            $discount = Cart::discount('0', '', '');

            // Tạo payment
            $payment = new Payment();
            $payment->user_id = auth()->user()->id;
            $payment->total = $total;
            $payment->discount = $discount ?? 0;
            $payment->payment_method = $request->payment_method;
            $payment->save();

            // Tạo order
            $order = new Order();
            $order->user_id = auth()->user()->id;
            $order->payment_id = $payment->id;
            $order->order_number = 'LEARN_' . strtoupper(uniqid());
            $items = [];
            foreach ($cart as $item) {
                $items[] = [
                    'product_id' => $item->id,
                    'price' => $item->price,
                ];
            }
            $order->items = json_encode($items);
            $order->save();

            // Gửi mail thông báo
            Mail::to($request->email)->send(new OrderMail($order));

            DB::commit();

            if ($request->payment_method == 'vnpay') {
                return $this->paymentVNPay($total, $order->id);
            } elseif ($request->payment_method == 'momo') {
                return $this->paymentMomo();
            } elseif ($request->payment_method == 'paypal') {
                return $this->paymentPaypal();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            // Log lỗi để kiểm tra sau này
            return redirect()->back()->withErrors('Đã có lỗi xảy ra. Vui lòng thử lại.');
        }
    }

    public function paymentMomo()
    {
        // Xử lý thanh toán qua Momo
    }

    public function paymentPaypal()
    {
        // Xử lý thanh toán qua Paypal
    }

    public function paymentVNPay($total, $order_id)
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = env('APP_URL') . "/checkout/success";
        $vnp_TmnCode = env('TmnCode');//Mã website tại VNPAY
        $vnp_HashSecret = env('HashSecret'); //Chuỗi bí mật

        $vnp_TxnRef = $order_id;
        $vnp_OrderInfo = 'Thanh toán hóa đơn';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $total * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        $vnp_ExpireDate = date('YmdHis', strtotime(date("YmdHis")) + 86400);
        //Billing
        // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
        // $vnp_Bill_Email = $_POST['txt_billing_email'];
        // $fullName = trim($_POST['txt_billing_fullname']);
        // if (isset($fullName) && trim($fullName) != '') {
        //     $name = explode(' ', $fullName);
        //     $vnp_Bill_FirstName = array_shift($name);
        //     $vnp_Bill_LastName = array_pop($name);
        // }
        // $vnp_Bill_Address = $_POST['txt_inv_addr1'];
        // $vnp_Bill_City = $_POST['txt_bill_city'];
        // $vnp_Bill_Country = $_POST['txt_bill_country'];
        // $vnp_Bill_State = $_POST['txt_bill_state'];
        // // Invoice
        // $vnp_Inv_Phone = $_POST['txt_inv_mobile'];
        // $vnp_Inv_Email = $_POST['txt_inv_email'];
        // $vnp_Inv_Customer = $_POST['txt_inv_customer'];
        // $vnp_Inv_Address = $_POST['txt_inv_addr1'];
        // $vnp_Inv_Company = $_POST['txt_inv_company'];
        // $vnp_Inv_Taxcode = $_POST['txt_inv_taxcode'];
        // $vnp_Inv_Type = $_POST['cbo_inv_type'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $vnp_ExpireDate,

            // "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
            // "vnp_Bill_Email" => $vnp_Bill_Email,
            // "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
            // "vnp_Bill_LastName" => $vnp_Bill_LastName,
            // "vnp_Bill_Address" => $vnp_Bill_Address,
            // "vnp_Bill_City" => $vnp_Bill_City,
            // "vnp_Bill_Country" => $vnp_Bill_Country,
            // "vnp_Inv_Phone" => $vnp_Inv_Phone,
            // "vnp_Inv_Email" => $vnp_Inv_Email,
            // "vnp_Inv_Customer" => $vnp_Inv_Customer,
            // "vnp_Inv_Address" => $vnp_Inv_Address,
            // "vnp_Inv_Company" => $vnp_Inv_Company,
            // "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
            // "vnp_Inv_Type" => $vnp_Inv_Type
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        // }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        $returnData = array(
            'code' => '00'
            ,
            'message' => 'success'
        );

        return redirect()->to($vnp_Url);
    }

    public function success()
    {
        Cart::destroy();
        session()->forget([
            'isAppliedCoupon',
            'couponName'
        ]);

        if (request()->vnp_ResponseCode == '00') {
            Notify::success('Thanh toán thành công');
            $payment = Payment::findOrFail(request()->vnp_TxnRef);
            $payment->update([
                'status' => 'success'
            ]);

            $order = Order::where('payment_id', $payment->id)->first();
        } else {
            Notify::error('Thanh toán thất bại');
        }

        return view('frontend.pages.checkout_success');
    }
}