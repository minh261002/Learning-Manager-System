@extends('admin.master')

@section('title', 'Quản Lý Đơn Hàng')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Quản Lý Đơn Hàng</h1>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Tất Cả Đơn Hàng</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table">
                            <thead>
                                <th>Mã Đơn Hàng</th>
                                <th>Khách Hàng</th>
                                <th>Ngày Đặt Hàng</th>
                                <th>Trạng Thái</th>
                                <th>Thao Tác</th>
                            </thead>

                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->payment->payment_number }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
