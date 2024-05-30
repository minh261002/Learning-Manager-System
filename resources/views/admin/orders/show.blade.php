@extends('admin.master')

@section('title', 'Thông Tin Đơn Hàng')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Thông Tin Đơn Hàng</h1>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Đơn Hàng: {{ $payment->payment_id }}</h4>

                    <div class="card-header-action">
                        @if ($payment->status == 'pending')
                            <form action="{{ route('admin.orders.change-status', $payment->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="cancel">
                                <button class="btn btn-danger">Huỷ Đơn Hàng</button>
                            </form>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Khách Hàng:</strong> {{ $payment->user->name }}</p>
                            <p><strong>Email:</strong> {{ $payment->user->email }}</p>
                            <p><strong>Ngày Đặt Hàng:</strong> {{ formatDate($payment->created_at) }}</p>
                        </div>

                        <div class="col-md-6">
                            <p><strong>Phương Thức Thanh Toán: </strong>
                                @if ($payment->payment_method == 'paypal')
                                    <img src="{{ asset('frontend/img/icon_paypal.png') }}" alt="Paypal" width="70">
                                @elseif($payment->payment_method == 'vnpay')
                                    <img src="{{ asset('frontend/img/icon_vnpay.webp') }}" alt="VNPay" width="80">
                                @endif
                            </p>
                            <p>
                                <strong>Trạng Thái: </strong>
                                @if ($payment->status == 'pending')
                                    <span class="badge badge-warning">Chưa Thanh Toán</span>
                                @elseif($payment->status == 'success')
                                    <span class="badge badge-success">Đã Thanh Toán</span>
                                @else
                                    <span class="badge badge-danger">Đã Hủy</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-primary">
                <div class="card-header">
                    <h4>Chi Tiết Đơn Hàng</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Khoá Hóc</th>
                                    <th>Người Hướng Dẫn</th>
                                    <th>Giá</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <td>
                                            <img src="{{ asset($item->course->image) }}" alt="{{ $item->name }}"
                                                style="width: 100px; height: 50px; object-fit: cover;">
                                        </td>
                                        <td>{{ $item->course->name }}</td>
                                        <td>{{ $item->course->instructor->name }}</td>
                                        <td>{{ number_format($item->price) }} VND</td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                @if ($payment->discount > 0)
                                    <tr>
                                        <td colspan="3" class="text-right"><strong>Giảm Giá:</strong></td>
                                        <td><strong>{{ number_format($payment->discount) }} VND</strong></td>
                                    </tr>
                                @endif
                                <tr>
                                    <td colspan="3" class="text-right"><strong>Tổng Tiền:</strong></td>
                                    <td><strong>{{ number_format($payment->total) }} VND</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
