<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Notifications\sendToInstructor;
use App\Services\Notify;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Payment;
use App\Mail\Order as OrderMail;
use Illuminate\Support\Facades\Mail;
use Notification;
use Omnipay\Omnipay;
use App\Notifications\OrderComplete;
use App\Models\User;
use App\Events\OrderCreated;

class CheckoutController extends Controller
{
    private $order;
    private $payment;
    private $gateway;

    public function __construct(Order $order, Payment $payment)
    {
        $this->order = $order;
        $this->payment = $payment;
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }
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
            'payment_method' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $cart = Cart::content();
            $total = Cart::total('0', '', '');
            $discount = Cart::discount('0', '', '');

            $payment = $this->payment->createPayment([
                'payment_id' => 'LEARN_' . strtoupper(uniqid()),
                'name' => $request->name,
                'email' => $request->email,
                'payment_method' => $request->payment_method,
                'total' => $total,
                'discount' => $discount ?? 0,
                'status' => 'pending',
            ]);

            foreach ($cart as $item) {
                $order = $this->order->createOrder([
                    'order_number' => 'LEARN_' . strtoupper(uniqid()),
                    'user_id' => auth()->user()->id,
                    'payment_id' => $payment->id,
                    'course_id' => $item->id,
                    'price' => $item->price,
                    'instructor_id' => $item->options->instructor_id,
                ]);

                $orders[] = $order;
            }


            Mail::to($request->email)->send(
                new OrderMail(
                    $payment,
                    $orders
                )
            );

            Notification::send(auth()->user(), new OrderComplete(auth()->user()->name));

            foreach ($orders as $order) {
                $instructor = User::find($order->instructor_id);
                if ($instructor) {
                    Notification::send($instructor, new sendToInstructor(auth()->user()->name));
                }
            }

            $admins = User::where('role', 'admin')->get();
            Notification::send($admins, new sendToInstructor(auth()->user()->name));

            event(new OrderCreated(auth()->user()->name));

            DB::commit();

            Cart::destroy();
            session()->forget([
                'isAppliedCoupon',
                'couponName'
            ]);

            if ($request->payment_method == 'vnpay') {
                return $this->paymentVNPay($payment->total, $payment->payment_id);
            } elseif ($request->payment_method == 'paypal') {
                vndToUsd($total);
                return $this->paymentPaypal(vndToUsd($total), $payment->payment_id);
            }

        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            Notify::error('Đã có lỗi xảy ra. Vui lòng thử lại.');
            return redirect()->back();
        }
    }

    public function paymentVNPay($total, $payment_id)
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('payment.vnpay.callback');
        $vnp_TmnCode = env('TmnCode');//Mã website tại VNPAY
        $vnp_HashSecret = env('HashSecret'); //Chuỗi bí mật

        $vnp_TxnRef = $payment_id;
        $vnp_OrderInfo = 'Thanh toán hóa đơn';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $total * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        $vnp_ExpireDate = date('YmdHis', strtotime(date("YmdHis")) + 86400);

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
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

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

    public function handleVNPayCallback()
    {
        if (request()->vnp_ResponseCode == '00') {

            $payment = Payment::where('payment_id', request()->vnp_TxnRef)->first();

            //cập nhật trạng thái thanh toán
            $payment->status = 'success';
            $payment->save();

            return redirect()->route('checkout.success');
        } else {
            $this->error();
        }
    }

    public function paymentPaypal($total, $payment_id)
    {
        try {
            $response = $this->gateway->purchase([
                'amount' => $total,
                'currency' => 'USD',
                'returnUrl' => route('payment.paypal.callback', ['id' => $payment_id]),
                'cancelUrl' => route('checkout'),
            ])->send();

            if ($response->isRedirect()) {
                $response->redirect();
            } else {
                Notify::error('Đã có lỗi xảy ra. Vui lòng thử lại.');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Notify::error('Đã có lỗi xảy ra. Vui lòng thử lại.');
            dd($e);
            return redirect()->back();
        }
    }

    public function handlePaypalCallback()
    {
        $response = $this->gateway->completePurchase([
            'payer_id' => request()->PayerID,
            'transactionReference' => request()->paymentId,
        ])->send();

        if ($response->isSuccessful()) {
            $payment = Payment::where('payment_id', request()->id)->first();
            $payment->update([
                'status' => 'success'
            ]);
            return redirect()->route('checkout.success');
        } else {
            $this->error();
        }
    }

    public function success()
    {
        Notify::success('Thanh toán thành công');
        return view('frontend.pages.checkout_success');
    }

    public function error()
    {
        Notify::error('Thanh toán thất bại. Vui lòng thử lại.');
        return redirect()->route('home');
    }

}