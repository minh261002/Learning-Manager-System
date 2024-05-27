@extends('user.master')

@section('title', 'Đơn Hàng' . ' ' . $payment->payment_id)

@section('content')
    <div class="dashboard-content-wrap mb-5">
        <div class="card">
            <div class="card-body shadow-sm">
                <div class="setting-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="fs-17 font-weight-semi-bold ">
                            Đơn Hàng {{ $payment->payment_id }}
                        </h3>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="font-weight-semi-bold">Thông Tin Người Mua</h5>
                                    <hr>
                                    <p><span class="font-weight-semi-bold">Họ Tên:</span> {{ $payment->user->name }}</p>
                                    <p><span class="font-weight-semi-bold">Email:</span> {{ $payment->user->email }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <form class="card-body" method="POST" action="{{ route('payment.re-try') }}">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $payment->id }}">

                                    <h5 class="font-weight-semi-bold">Thông Tin Thanh Toán</h5>
                                    <hr>
                                    <p class="mb-3"><span class="font-weight-semi-bold">Phương Thức Thanh Toán:</span>
                                        @if ($payment->payment_method == 'paypal')
                                            <img src="{{ asset('frontend/img/icon_paypal.png') }}" alt="paypal"
                                                class="img-fluid" width="80px">
                                        @else
                                            <img src="{{ asset('frontend/img/icon_vnpay.webp') }}" alt="stripe"
                                                class="img-fluid" width="80px">
                                        @endif

                                        @if ($payment->status == 'pending')
                                            <select name="payment_method" id="payment_method" class="form-control mt-3">
                                                <option value="paypal"
                                                    {{ $payment->payment_method == 'paypal' ? 'selected' : '' }}>Paypal
                                                </option>
                                                <option value="vnpay"
                                                    {{ $payment->payment_method == 'vnpay' ? 'selected' : '' }}>VnPay
                                                </option>
                                            </select>
                                        @endif
                                    </p>
                                    <p class="mb-3"><span class="font-weight-semi-bold">Trạng Thái:</span>
                                        @if ($payment->status == 'success')
                                            <span class="badge badge-success">Đã Thanh Toán</span>
                                        @elseif ($payment->status == 'pending')
                                            <span class="badge badge-warning">Chưa Thanh Toán</span>
                                        @else
                                            <span class="badge badge-danger">Đã Hủy</span>
                                        @endif
                                    </p>

                                    @if ($payment->status == 'pending')
                                        <button type="submit" class="retryPayment btn btn-sm btn-outline-primary"
                                            data-payment-id="{{ $payment->id }}">Thanh
                                            Toán Ngay</button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive mt-5">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Ảnh</th>
                                    <th>Khoá Học</th>
                                    <th>Người Hướng Dẫn</th>
                                    <th>Giá</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($order as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset($item->course->image) }}" alt="{{ $item->course->name }}"
                                                style="width: 100px; height: 60px; object-fit:cover">
                                        </td>
                                        <td>{{ $item->course->name }}</td>
                                        <td>{{ $item->course->instructor->name }}</td>
                                        <td>{{ formatPrice($item->price) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                @if ($payment->discount > 0)
                                    <tr>
                                        <td colspan="4" class="text-right">Giảm Giá</td>
                                        <td>{{ formatPrice($payment->discount) }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td colspan="4" class="text-right">Tổng Tiền</td>
                                    <td>{{ formatPrice($payment->total) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- <script>
        $(document).ready(function() {
            $('.retryPayment').click(function(e) {
                e.preventDefault();
                let payment_method = $('#payment_method').val();
                let payment_id = $(this).data('payment-id');

                $.ajax({
                    url: "{{ route('payment.re-try') }}",
                    type: 'GET',
                    data: {
                        payment_method: payment_method,
                        payment_id: payment_id
                    },
                    success: function(response) {
                        location.reload();
                    }
                })
            })
        })
    </script> --}}
@endpush
