<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public $payment;
    public $order;

    public function __construct(Payment $payment, Order $order)
    {
        $this->payment = $payment;
        $this->order = new Order();
    }

    public function index()
    {

        $orders = $this->order
            ->where('instructor_id', auth()->user()->id)
            ->with('payment', 'user', 'course')
            ->get();

        return view('instructor.pages.orders.index', compact('orders'));
    }

    public function downloadPdf($id)
    {
        $order = $this->order
            ->where('instructor_id', auth()->user()->id)
            ->where('id', $id)
            ->with('payment', 'user', 'course')
            ->first();

        $pdf = PDF::loadView('instructor.pages.orders.pdf', compact('order'));
        return $pdf->download('order-' . $order->id . '.pdf');
    }
}