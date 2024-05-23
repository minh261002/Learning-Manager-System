<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {

        //lấy order và payment của order
        $orders = Order::with('payment')
            ->where('instructor_id', auth()->user()->id)
            ->with('payment')
            ->latest()->get();

        return view('instructor.pages.orders.index', compact('orders'));
    }
}