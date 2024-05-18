@extends('instructor.master')

@section('title', 'Quản Lý Mã Giảm Giá')

@section('content')

    <div class="dashboard-content-wrap mb-5">
        <div class="card">
            <div class="card-body shadow-sm">
                <div class="setting-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="fs-17 font-weight-semi-bold ">Quản Lý Mã Giảm Giá</h3>

                        <a href="{{ route('instructor.coupons.create') }}" class="btn btn-sm btn-danger">Thêm Mã Giảm Giá</a>
                    </div>

                    <div class="table-responsive mt-5">
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
                                            <a href="{{ route('instructor.coupons.edit', $coupon->id) }}"
                                                class="btn btn-sm btn-primary">Sửa</a>
                                            <a href="{{ route('instructor.coupons.destroy', $coupon->id) }}"
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
    </div>

@endsection
