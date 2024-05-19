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
                                        <a href="{{ route('course.detail', $item->course->slug) }}" class="media-img mr-0">
                                            <img src="{{ $item->course->image }}" alt="Cart image">
                                        </a>
                                    </div>
                                </th>
                                <td>
                                    <a href="{{ route('course.detail', $item->course->slug) }}"
                                        class="text-black font-weight-semi-bold">
                                        {{ $item->course->name }}
                                    </a>
                                    <p class="fs-14 text-gray lh-20"><a href="teacher-detail.html"
                                            class="text-color hover-underline">
                                            {{ $item->course->instructor->name }}
                                        </a></p>
                                </td>
                                <td>
                                    <ul class="generic-list-item font-weight-semi-bold">
                                        <li class="d-flex align-items-center justify-content-between">
                                            <span
                                                class="text-black
                                                font-weight-semi-bold ">
                                                @if ($item->course->discount > 0)
                                                    {{ number_format($item->course->price - ($item->course->discount * $item->course->price) / 100) }}
                                                    <span class="text-gray fs-14" style="text-decoration: line-through">
                                                        {{ number_format($item->course->price) }}
                                                    </span>
                                                @else
                                                    {{ number_format($item->course->price) }}
                                                @endif
                                            </span>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <a href="{{ route('cart.destroy', $item->id) }}"
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

                    <form action="" method="POST">
                        @csrf
                        <div class="input-group mb-2">
                            <input class="form-control form--control pl-3" type="text" name="coupon_name"
                                placeholder="Mã Giảm Giá">
                            <div class="input-group-append">
                                <button type="submit" class="btn theme-btn">Áp Dụng</button>
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
                            <span>VND</span>
                        </li>
                        <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                            <span class="text-black">Tổng Tiền:</span>
                            <span>VND</span>
                        </li>
                    </ul>
                    <a href="{{ route('checkout') }}" class="btn theme-btn w-100">Thanh Toán <i
                            class="la la-arrow-right icon ml-1"></i></a>
                </div>
            </div>
        </div><!-- end container -->
    </section>
@endsection
