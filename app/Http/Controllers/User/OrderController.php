<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $payments = auth()->user()->payments()->orderBy('id', 'DESC')->get();
        return view('user.pages.order', compact('payments'));
    }

    public function show($id)
    {
        $payment = auth()->user()->payments()->where('id', $id)->first();
        $order = Order::whereIn('payment_id', $payment->pluck('id'))
            ->where('user_id', auth()->id())
            ->where('payment_id', $id)
            ->get();

        return view('user.pages.order_detail', compact('payment', 'order'));
    }
}