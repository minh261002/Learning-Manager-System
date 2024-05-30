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

                    <div class="card-header-action">
                        <select class="form-control" name="status" id="status">
                            <option value="">Tất Cả</option>
                            <option value="pending" {{ request()->status == 'pending' ? 'selected' : '' }}>Chưa
                                Thanh
                                Toán</option>
                            <option value="success" {{ request()->status == 'success' ? 'selected' : '' }}>Đã Thanh
                                Toán</option>
                            <option value="cancel" {{ request()->status == 'cancel' ? 'selected' : '' }}>Đã Hủy
                            </option>
                        </select>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>Mã Đơn Hàng</th>
                                    <th>Khách Hàng</th>
                                    <th>Ngày Đặt Hàng</th>
                                    <th>Tổng Tiền</th>
                                    <th>Thanh Toán</th>
                                    <th>Trạng Thái</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($payments as $item)
                                    <tr>
                                        <td>{{ $item->payment_id }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ formatDate($item->created_at) }}</td>
                                        <td>{{ number_format($item->total) }} VND</td>
                                        <td>
                                            @if ($item->payment_method == 'paypal')
                                                <img src="{{ asset('frontend/img/icon_paypal.png') }}" alt="Paypal"
                                                    width="70">
                                            @elseif($item->payment_method == 'vnpay')
                                                <img src="{{ asset('frontend/img/icon_vnpay.webp') }}" alt="VNPay"
                                                    width="80">
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->status == 'pending')
                                                <span class="badge badge-warning">Chưa Thanh Toán</span>
                                            @elseif ($item->status == 'success')
                                                <span class="badge badge-success">Đã Thanh Toán</span>
                                            @else
                                                <span class="badge badge-danger">Đã Hủy</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.orders.show', $item->id) }}"
                                                class="btn btn-primary">Xem</a>
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

@push('scripts')
    <script>
        $('#status').change(function() {
            window.location.href = "{{ route('admin.orders.index') }}" + "?status=" + $(this).val();
        });
    </script>
@endpush
