@extends('user.master')

@section('title', 'Khoá học của tôi')

@section('content')
    <div class="dashboard-content-wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-10">

                    @forelse ($courses as $item)
                        <div class="card card-item card-preview card-item-list-layout tooltipstered">
                            <div class="card-image">
                                <a href="course-details.html" class="d-block">
                                    <img class="card-img-top lazy" src="{{ $item->image }}" alt="Card image cap"
                                        style="object-fit:cover">
                                </a>
                                <div class="course-badge-labels">
                                    {{-- <div class="course-badge">Bestseller</div> --}}
                                    @if ($item->discount > 0)
                                        <div class="course-badge red">-{{ $item->discount }}%</div>
                                    @endif
                                </div>
                            </div><!-- end card-image -->
                            <div class="card-body">
                                <h5 class="card-title"><a href="{{ route('course.detail', $item->slug) }}">
                                        {{ $item->name }}
                                    </a>
                                </h5>
                                <p class="card-text"><a href="{{ route('info', $item->instructor->username) }}">
                                        {{ $item->instructor->name }}
                                    </a></p>

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
                                    <div>
                                        @if ($item->discount > 0)
                                            <p class="card-price text-black font-weight-bold">
                                                {{ formatPrice(($item->price * (100 - $item->discount)) / 100) }}
                                                <span
                                                    class="before-price font-weight-medium">{{ formatPrice($item->price) }}</span>
                                            </p>
                                        @else
                                            <p
                                                class="card-price
                                text-black font-weight-bold">
                                                {{ formatPrice($item->price) }}</p>
                                        @endif
                                    </div>

                                    <a href="{{ route('course.view', $item->slug) }}" class="btn btn-sm btn-outline-danger">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
                            </div><!-- end card-body -->
                        </div>
                    @empty
                        <div class="col-10">
                            <div class="alert alert-info">
                                <p>Bạn chưa mua khoá học nào.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
