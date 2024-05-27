@extends('user.master')

@section('title', 'Quản lý đơn hàng')

@section('content')
    <div class="dashboard-content-wrap mb-5">
        <div class="card">
            <div class="card-body shadow-sm">
                <div class="setting-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="fs-17 font-weight-semi-bold ">Quản Lý Đơn Hàng</h3>
                    </div>

                    <div class="table-responsive mt-5">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Thanh Toán</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($payments as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->payment_id }}</td>
                                        <td>{{ formatDate($item->created_at) }}</td>
                                        <td>
                                            @if ($item->payment_method == 'paypal')
                                                <img src="{{ asset('frontend/img/icon_paypal.png') }}" alt="paypal"
                                                    class="img-fluid" width="80px">
                                            @else
                                                <img src="{{ asset('frontend/img/icon_vnpay.webp') }}" alt="stripe"
                                                    class="img-fluid" width="80px">
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->status == 'success')
                                                <span class="badge badge-success">Đã thanh toán</span>
                                            @elseif ($item->status == 'pending')
                                                <span class="badge badge-warning">Chưa thanh toán</span>
                                            @else
                                                <span class="badge badge-danger">Đã hủy</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('order.show', $item->id) }}"
                                                class="btn btn-sm btn-primary">Xem chi tiết</a>
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
