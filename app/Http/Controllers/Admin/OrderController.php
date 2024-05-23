<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Notify;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;

class OrderController extends Controller
{
    public $order;
    public $payment;

    public function __construct(Order $order, Payment $payment)
    {
        $this->order = $order;
        $this->payment = $payment;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->has('status')) {
            $payments = $this->payment->where('status', request('status'))->orderBy('id', 'desc')->get();
        } else {
            $payments = $this->payment->orderBy('id', 'desc')->get();
        }
        ;

        return view('admin.orders.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payment = $this->payment->findOrFail($id);
        $orders = $this->order->where('payment_id', $payment->id)->get();

        return view('admin.orders.show', compact('payment', 'orders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function changeStatus(Request $request)
    {
        $payment = $this->payment->findOrFail($request->id);
        $payment->status = $request->status;
        $payment->save();

        Notify::success('Huỷ đơn hàng thành công');
        return redirect()->back();
    }
}