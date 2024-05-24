@extends('instructor.master')

@section('title', 'Khoá Học Đã Bán')

@section('content')
    <div class="dashboard-content-wrap mb-5">
        <div class="card">
            <div class="card-body shadow-sm">
                <div class="setting-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="fs-17 font-weight-semi-bold ">Khoá Học Đã Bán</h3>
                    </div>
                    <div class="table-responsive mt-5">
                        <table class="table mb-0 table-striped" id="table">
                            <thead>
                                <tr>
                                    <th scope="col">Tên Khoá Học</th>
                                    <th scope="col">Học Viên</th>
                                    <th scope="col">Số Tiền</th>
                                    <th scope="col">Ngày Mua</th>
                                    <th scope="col">Trạng Thái</th>
                                    <th scope="col">HĐ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->course->title }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ number_format($order->price, 0, ',', '.') }} VNĐ</td>
                                        <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            @if ($order->payment->status == 'success')
                                                <span class="badge badge-success">Đã Thanh Toán</span>
                                            @elseif($order->payment->status == 'pending')
                                                <span class="badge badge-warning">Chưa Thanh Toán</span>
                                            @else
                                                <span class="badge badge-danger">Đã Hủy</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('instructor.order.pdf', $order->id) }}"
                                                class="btn btn-sm btn-outline-info">
                                                <i class="fa-solid fa-download"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
