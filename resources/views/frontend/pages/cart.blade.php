@extends('frontend.master')

@section('title', 'Giỏ hàng')

@section('content')
    <section class="cart-area my-5">
        <div class="container">
            <div class="table-responsive">
                <table class="table generic-table">
                    <thead>
                        <tr>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Thông Tin Khoá Học</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cartItems as $item)
                            <tr>
                                <th scope="row">
                                    <div class="media media-card">
                                        <a href="{{ route('course.detail', $item->options->slug) }}" class="media-img mr-0">
                                            <img src="{{ $item->options->image }}" alt="Cart image">
                                        </a>
                                    </div>
                                </th>
                                <td>
                                    <a href="{{ route('course.detail', $item->options->slug) }}"
                                        class="text-black font-weight-semi-bold">
                                        {{ $item->name }}
                                    </a>
                                    <p class="fs-14 text-gray lh-20"><a href="teacher-detail.html"
                                            class="text-color hover-underline">
                                            {{ $item->options->instructor }}
                                        </a></p>
                                </td>
                                <td>
                                    <ul class="generic-list-item font-weight-semi-bold">
                                        <li class="d-flex align-items-center justify-content-between">
                                            <span
                                                class="text-black
                                                font-weight-semi-bold ">
                                                {{ number_format($item->price, 0, ',', '.') }} VND
                                            </span>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <a href="{{ route('cart.destroy', $item->rowId) }}"
                                        class="icon-element delete-item icon-element-xs shadow-sm border-0"
                                        data-toggle="tooltip" data-placement="top" title="Remove">
                                        <i class="la la-times"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Không có khoá học nào trong giỏ hàng</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex flex-wrap align-items-center justify-content-between pt-4">
                    <div>
                        <a href="{{ route('cart.clear') }}" class="btn delete-item theme-btn">Xóa Tất Cả</a>
                        <a href="{{ route('home') }}" class="btn theme-btn">Tiếp Tục Mua Sắm</a>
                    </div>

                    <form action="{{ route('coupon.apply') }}" method="POST">
                        @csrf
                        <div class="input-group mb-2">
                            <input class="form-control form--control pl-3" type="text" name="coupon_name"
                                placeholder="Mã Giảm Giá">
                            <div class="input-group-append">
                                <button type="submit" class="btn theme-btn">Áp Dụng</button>
                            </div>
                        </div>

                        @if (session('isAppliedCoupon'))
                            <div class="alert alert-success mt-2">
                                {{ session('couponName') }}
                                <a href="{{ route('coupon.remove') }}" class="text-danger delete-item">Xóa</a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
            <div class="col-lg-4 ml-auto">
                <div class="bg-gray p-4 rounded-rounded mt-40px">
                    <h3 class="fs-18 font-weight-bold pb-3">Tổng Tiền</h3>
                    <div class="divider"><span></span></div>
                    <ul class="generic-list-item pb-4">

                        @if ($discount > 0)
                            <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                <span class="text-black">Tạm Tính:</span>
                                <span>
                                    {{ number_format($subTotal, 0, ',', '.') }} VND
                                </span>
                            </li>

                            <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                <span class="text-black font-weight-semi-bold ">Giảm
                                    Giá:</span>
                                <span class="text-danger">
                                    -{{ number_format($discount, 0, ',', '.') }} VND
                                </span>
                            </li>

                            <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                <span class="text-black font-weight-semi-bold ">Tổng
                                    Tiền:</span>
                                <span>
                                    {{ number_format($total, 0, ',', '.') }} VND
                                </span>
                            </li>
                        @else
                            <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                <span class="text-black">Tạm Tính:</span>
                                <span>
                                    {{ number_format($subTotal, 0, ',', '.') }} VND
                                </span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                <span class="text-black">Tổng Tiền:</span>
                                <span>
                                    {{ number_format($total, 0, ',', '.') }} VND
                                </span>
                            </li>
                        @endif

                    </ul>
                    <a href="{{ route('checkout') }}" class="btn theme-btn w-100">Thanh Toán <i
                            class="la la-arrow-right icon ml-1"></i></a>
                </div>
            </div>
        </div><!-- end container -->
    </section>
@endsection
