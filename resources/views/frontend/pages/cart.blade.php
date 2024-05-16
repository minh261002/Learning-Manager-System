@extends('frontend.master')

@section('title', 'Giỏ hàng')

@section('content')
    <section class="cart-area section-padding">
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
                        <tr>
                            <th scope="row">
                                <div class="media media-card">
                                    <a href="course-details.html" class="media-img mr-0">
                                        <img src="{{ asset('frontend/images/small-img.jpg') }}" alt="Cart image">
                                    </a>
                                </div>
                            </th>
                            <td>
                                <a href="course-details.html" class="text-black font-weight-semi-bold">
                                    Kỹ Thuật Debugs Với Lập Trình FullStack Website
                                </a>
                                <p class="fs-14 text-gray lh-20"><a href="teacher-detail.html"
                                        class="text-color hover-underline">Hỏi Dân It Với Eric
                                    </a></p>
                            </td>
                            <td>
                                <ul class="generic-list-item font-weight-semi-bold">
                                    <li class="text-black lh-18">599.000 VND</li>
                                    <li class="before-price lh-18">729.000 VND</li>
                                </ul>
                            </td>
                            <td>
                                <div class="quantity-item d-flex align-items-center">
                                    <button class="qtyBtn qtyDec"><i class="la la-minus"></i></button>
                                    <input class="qtyInput" type="text" name="qty-input" value="1">
                                    <button class="qtyBtn qtyInc"><i class="la la-plus"></i></button>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="icon-element icon-element-xs shadow-sm border-0"
                                    data-toggle="tooltip" data-placement="top" title="Remove">
                                    <i class="la la-times"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <div class="media media-card">
                                    <a href="course-details.html" class="media-img mr-0">
                                        <img src="{{ asset('frontend/images/small-img.jpg') }}" alt="Cart image">
                                    </a>
                                </div>
                            </th>
                            <td>
                                <a href="course-details.html" class="text-black font-weight-semi-bold">React Pro TypeScript
                                    - Thực Hành Dự Án Portfolio </a>
                                <p class="fs-14 text-gray lh-20"> <a href="teacher-detail.html"
                                        class="text-color hover-underline"></a>Hỏi Dân It Với Eric</p>
                            </td>
                            <td>
                                <ul class="generic-list-item font-weight-semi-bold">
                                    <li class="text-black lh-18">599.000 VND</li>
                                    <li class="before-price lh-18">729.000 VND</li>
                                </ul>
                            </td>
                            <td>
                                <div class="quantity-item d-flex align-items-center">
                                    <button class="qtyBtn qtyDec"><i class="la la-minus"></i></button>
                                    <input class="qtyInput" type="text" name="qty-input" value="1">
                                    <button class="qtyBtn qtyInc"><i class="la la-plus"></i></button>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="icon-element icon-element-xs shadow-sm border-0"
                                    data-toggle="tooltip" data-placement="top" title="Remove">
                                    <i class="la la-times"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex flex-wrap align-items-center justify-content-between pt-4">
                    <a href="{{ route('home') }}" class="btn theme-btn">Tiếp Tục Mua Sắm</a>

                    <form method="post">
                        <div class="input-group mb-2">
                            <input class="form-control form--control pl-3" type="text" name="search"
                                placeholder="Mã Giảm Giá">
                            <div class="input-group-append">
                                <button class="btn theme-btn">Áp Dụng</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 ml-auto">
                <div class="bg-gray p-4 rounded-rounded mt-40px">
                    <h3 class="fs-18 font-weight-bold pb-3">Tổng Tiền</h3>
                    <div class="divider"><span></span></div>
                    <ul class="generic-list-item pb-4">
                        <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                            <span class="text-black">Tạm Tính:</span>
                            <span>549.000 VND</span>
                        </li>
                        <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                            <span class="text-black">Tổng Tiền:</span>
                            <span>1.049.000 VND</span>
                        </li>
                    </ul>
                    <a href="{{ route('checkout') }}" class="btn theme-btn w-100">Thanh Toán <i
                            class="la la-arrow-right icon ml-1"></i></a>
                </div>
            </div>
        </div><!-- end container -->
    </section>
@endsection
