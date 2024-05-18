@extends('admin.master')

@section('title', 'Quản lý mã giảm giá')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Quản lý mã giảm giá</h1>
        </div>
        <div class="section-body">

            <div class="card card-primary">
                <div class="card-header">
                    <h4>Danh sách mã giảm giá</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.coupons.create') }}" class="btn btn-primary">Thêm mã giảm giá</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table">
                            <thead>
                                <th>Mã giảm giá</th>
                                <th>Giảm giá</th>
                                <th>Ngày bắt đầu</th>
                                <th>Ngày kết thúc</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $coupon)
                                    <tr>
                                        <td>{{ $coupon->name }}</td>
                                        <td>{{ $coupon->discount }}%</td>
                                        <td>{{ $coupon->created_at }}</td>
                                        <td>{{ $coupon->expires_at }}</td>
                                        <td>
                                            @php
                                                $createdAt = \Carbon\Carbon::parse($coupon->created_at);
                                                $expiresAt = \Carbon\Carbon::parse($coupon->expires_at);
                                                $currentDate = \Carbon\Carbon::now();
                                            @endphp

                                            @if ($currentDate->greaterThan($expiresAt))
                                                <span class="badge badge-danger">Đã Hết Hạn</span>
                                            @else
                                                <span class="badge badge-success">Có Thể Sử Dụng</span>
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{ route('admin.coupons.edit', $coupon->id) }}"
                                                class="btn btn-sm btn-primary">Sửa</a>
                                            <a href="{{ route('admin.coupons.destroy', $coupon->id) }}"
                                                class="btn btn-sm btn-danger delete-item">Xóa</a>
                                        </td>
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
