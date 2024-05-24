@extends('user.master')

@section('title', 'Danh Sách Yêu Thích')

@section('content')
    <div class="dashboard-content-wrap mb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-10">

                    @forelse ($wishlists as $item)
                        <div class="card card-item card-preview card-item-list-layout tooltipstered">
                            <div class="card-image">
                                <a href="course-details.html" class="d-block">
                                    <img class="card-img-top lazy" src="{{ $item->course->image }}" alt="Card image cap"
                                        style="object-fit:cover">
                                </a>
                                <div class="course-badge-labels">
                                    {{-- <div class="course-badge">Bestseller</div> --}}
                                    @if ($item->course->discount > 0)
                                        <div class="course-badge red">-{{ $item->course->discount }}%</div>
                                    @endif
                                </div>
                            </div><!-- end card-image -->
                            <div class="card-body">
                                <h5 class="card-title"><a href="{{ route('course.detail', $item->course->slug) }}">
                                        {{ $item->course->name }}
                                    </a>
                                </h5>
                                <p class="card-text"><a href="{{ route('info', $item->course->instructor->username) }}">
                                        {{ $item->course->instructor->name }}
                                    </a></p>

                                {{-- <p class="card-text">
                                    {{ $item->course->title }}
                                </p> --}}

                                <div class="rating-wrap d-flex align-items-center py-2">
                                    <div class="review-stars">
                                        <span class="rating-number">4.4</span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star-o"></span>
                                    </div>
                                    <span class="rating-total pl-1">(20,230)</span>
                                </div><!-- end rating-wrap -->
                                <div class="d-flex justify-content-between align-items-center">
                                    {{-- <p class="card-price text-black font-weight-bold">12.99 <span
                                    class="before-price font-weight-medium">129.99</span></p> --}}

                                    @if ($item->course->discount > 0)
                                        <p class="card-price text-black font-weight-bold">
                                            {{ formatPrice(($item->course->price * (100 - $item->course->discount)) / 100) }}
                                            <span
                                                class="before-price font-weight-medium">{{ formatPrice($item->course->price) }}</span>
                                        </p>
                                    @else
                                        <p class="card-price
                                text-black font-weight-bold">
                                            {{ formatPrice($item->course->price) }}</p>
                                    @endif
                                    <div class="icon-element icon-element-sm shadow-sm cursor-pointer bg-danger"
                                        title="Xoá Khỏi Danh Sách Yêu Thích">
                                        <a class="text-white delete-item" href="{{ route('wishlist.destroy', $item->id) }}">
                                            <i class="la la-times"></i>
                                        </a>
                                    </div>


                                </div>
                            </div><!-- end card-body -->
                        </div>
                    @empty
                        <div class="col-10">
                            <div class="alert alert-info">
                                <p>Không có khóa học nào trong danh sách yêu thích của bạn.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
