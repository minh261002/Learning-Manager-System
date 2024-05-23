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
                                    <td>Ảnh</td>
                                    <td>Khoá Học</td>
                                    <td>Người Mua</td>
                                    <td>Trạng Thái</td>
                                    <td>Thao Tác</td>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>
                                            <img src="{{ $order->course->image }}" alt="{{ $order->course->name }}"
                                                class="img-fluid" style="width: 100px; height: 40px; object-fit:cover">
                                        </td>
                                        <td>{{ $order->course->name }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>
                                            @if ($order->payment->status == 'pending')
                                                <span class="badge badge-warning text-white">Chưa Thanh Toán</span>
                                            @elseif($order->payment->status == 'success')
                                                <span class="badge badge-success">Đã Thanh Toán</span>
                                            @else
                                                <span class="badge badge-danger">Đã Hủy</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{-- <a href="{{ route('instructor.orders.show', $order->id) }}"
                                                class="btn btn-sm btn-primary">Xem</a> --}}
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
