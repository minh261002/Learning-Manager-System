@extends('frontend.master')

@section('title', 'Thanh toán')

@section('content')
    <section class="cart-area  mt-5">
        <form class="container" method="POST" action="{{ route('checkout.store') }}">
            @csrf
            <div class="row">
                <div class="col-lg-7">
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="card-title fs-22 pb-3">Thông Tin Khách Hàng</h3>
                            <div class="divider"><span></span></div>

                            <div class="row">
                                <div class="input-box col-lg-12 mb-3">
                                    <label class="label-text">Họ Và Tên</label>
                                    <div class="form-group">
                                        <input class="form-control form--control" type="text" name="name"
                                            value="{{ Auth::user()->name }}" readonly>
                                        <span class="la la-user input-icon"></span>
                                    </div>
                                </div>

                                <div class="input-box col-lg-12 mb-3">
                                    <label class="label-text">Email</label>
                                    <div class="form-group">
                                        <input class="form-control form--control" type="text" name="email"
                                            value="{{ Auth::user()->email }}" readonly>
                                        <span class="la la-envelope input-icon"></span>
                                    </div>
                                </div>


                                <div class="btn-box col-lg-12">
                                    <p class="pb-1 text-black-50"><i class="la la-lock fs-24 mr-1"></i>Kết nối an toàn
                                    </p>
                                    <p class="fs-14">Thông tin của bạn được bảo mật tuyệt đối!</p>
                                </div><!-- end btn-box -->
                            </div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->

                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="card-title fs-22 pb-3">Phương Thức Thanh Toán</h3>
                            <div class="divider"><span></span></div>
                            <div class="payment-option-wrap">
                                <div class="payment-tab">
                                    <div class="payment-tab-toggle">
                                        <input type="radio" name="payment_method" id="momo" value="momo" checked>
                                        <label for="momo">Cổng Thanh Toán Momo</label>
                                        <img class="payment-logo" src="{{ asset('frontend/img/momo.png') }}" width="40px"
                                            style="top:10px">
                                    </div>
                                </div><!-- end payment-tab -->

                                <div class="payment-tab">
                                    <div class="payment-tab-toggle">
                                        <input id="paypal" name="payment_method" type="radio" value="paypal">
                                        <label for="paypal">Cổng Thanh Toán PayPal</label>
                                        <img class="payment-logo" src="{{ asset('frontend/images/paypal.png') }}"
                                            alt="">
                                    </div>
                                </div><!-- end payment-tab -->
                                <div class="payment-tab">
                                    <div class="payment-tab-toggle">
                                        <input type="radio" name="payment_method" id="vnpay" value="vnpay">
                                        <label for="vnpay">Cổng Thanh Toán VNPAY</label>
                                        <img class="payment-logo" src="{{ asset('frontend/img/logo-primary.svg') }}"
                                            width="70px" alt="">
                                    </div>
                                </div><!-- end payment-tab -->
                            </div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div><!-- end col-lg-7 -->

                <div class="col-lg-5">
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="card-title fs-22 pb-3">Thông Tin Đơn Hàng</h3>
                            <div class="divider"><span></span></div>
                            <div class="order-details-lists">
                                @foreach ($cart as $item)
                                    <div class="media media-card border-bottom border-bottom-gray pb-3 mb-3">
                                        <a href="{{ route('course.detail', $item->options->slug) }}" class="media-img">
                                            <img src="{{ $item->options->image }}" alt="Cart image">
                                        </a>
                                        <div class="media-body">
                                            <h5 class="fs-15 pb-2"><a
                                                    href="{{ route('course.detail', $item->options->slug) }}">
                                                    {{ $item->name }}
                                                </a></h5>
                                            {{-- <p class="text-black font-weight-semi-bold lh-18">$12.99 <span
                                                    class="before-price fs-14">$129.99</span></p> --}}

                                            <p
                                                class="text-black
                                                font-weight-semi-bold">
                                                {{ number_format($item->price) }} VND</p>
                                        </div>
                                    </div><!-- end media -->
                                @endforeach
                            </div><!-- end order-details-lists -->
                            <a href="{{ route('cart.index') }}" class="btn-text"><i class="la la-edit mr-1"></i>Chỉnh
                                Sửa</a>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="card-title fs-22 pb-3">Thanh Toán</h3>
                            <div class="divider"><span></span></div>
                            <ul class="generic-list-item generic-list-item-flash fs-15">
                                <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                    <span class="text-black">Tạm Tính:</span>
                                    <span>
                                        {{ $subTotal }} VND
                                    </span>
                                </li>
                                @if ($discount > 0)
                                    <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                        <span class="text-black">Mã Giảm Giá:</span>
                                        <span class="text-danger">
                                            -{{ $discount }} VND
                                        </span>
                                    </li>
                                @endif
                                <li class="d-flex align-items-center justify-content-between font-weight-bold">
                                    <span class="text-black">Tổng:</span>
                                    <span>{{ $total }} VND</span>
                                </li>
                            </ul>
                            <div class="btn-box border-top border-top-gray pt-3">
                                <button type="submit" class="btn theme-btn w-100">Thanh Toán Đơn Hàng <i
                                        class="la la-arrow-right icon ml-1"></i></button>
                            </div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div><!-- end col-lg-5 -->
            </div><!-- end row -->
        </form><!-- end container -->
    </section>
@endsection
