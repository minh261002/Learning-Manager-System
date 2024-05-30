@extends('frontend.master')

@section('title', $course->name)
@section('content')
    <section class="breadcrumb-area pt-50px pb-50px bg-white pattern-bg">
        <div class="container">
            <div class="col-lg-8 mr-auto">
                <div class="breadcrumb-content">
                    <ul class="generic-list-item generic-list-item-arrow d-flex flex-wrap align-items-center">
                        <li><a href="{{ route('home') }}">Trang Chủ</a></li>
                        <li><a href="#">{{ $course->category->parent->name }}</a></li>
                        <li><a href="#">{{ $course->category->name }}</a></li>
                    </ul>
                    <div class="section-heading">
                        <h2 class="section__title">
                            {{ $course->name }}
                        </h2>
                        <p class="section__desc pt-2 lh-30">
                            {{ $course->title }}
                        </p>
                    </div><!-- end section-heading -->

                    <p class="pt-2 pb-1">Người Hướng Dẫn: <a href="{{ route('info', $course->instructor->username) }}"
                            class="text-color hover-underline">{{ $course->instructor->name }}</a></p>
                    <div class="d-flex flex-column">
                        <p class="pr-3 d-flex align-items-center">
                            <svg class="svg-icon-color-gray mr-1" width="16px" viewBox="0 0 24 24">
                                <path
                                    d="M23 12l-2.44-2.78.34-3.68-3.61-.82-1.89-3.18L12 3 8.6 1.54 6.71 4.72l-3.61.81.34 3.68L1 12l2.44 2.78-.34 3.69 3.61.82 1.89 3.18L12 21l3.4 1.46 1.89-3.18 3.61-.82-.34-3.68L23 12zm-10 5h-2v-2h2v2zm0-4h-2V7h2v6z">
                                </path>
                            </svg>
                            {{-- Last updated 2 Jan,2021 --}}
                            Cập nhật lần cuối: {{ formatDate($course->updated_at) }}
                        </p>
                        <p class="pr-3 d-flex align-items-center d-block">
                            <svg class="svg-icon-color-gray mr-1" width="16px" viewBox="0 0 24 24">
                                <path
                                    d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm6.93 6h-2.95a15.65 15.65 0 00-1.38-3.56A8.03 8.03 0 0118.92 8zM12 4.04c.83 1.2 1.48 2.53 1.91 3.96h-3.82c.43-1.43 1.08-2.76 1.91-3.96zM4.26 14C4.1 13.36 4 12.69 4 12s.1-1.36.26-2h3.38c-.08.66-.14 1.32-.14 2s.06 1.34.14 2H4.26zm.82 2h2.95c.32 1.25.78 2.45 1.38 3.56A7.987 7.987 0 015.08 16zm2.95-8H5.08a7.987 7.987 0 014.33-3.56A15.65 15.65 0 008.03 8zM12 19.96c-.83-1.2-1.48-2.53-1.91-3.96h3.82c-.43 1.43-1.08 2.76-1.91 3.96zM14.34 14H9.66c-.09-.66-.16-1.32-.16-2s.07-1.35.16-2h4.68c.09.65.16 1.32.16 2s-.07 1.34-.16 2zm.25 5.56c.6-1.11 1.06-2.31 1.38-3.56h2.95a8.03 8.03 0 01-4.33 3.56zM16.36 14c.08-.66.14-1.32.14-2s-.06-1.34-.14-2h3.38c.16.64.26 1.31.26 2s-.1 1.36-.26 2h-3.38z">
                                </path>
                            </svg>
                            {{ $course->language == 'vi' ? 'Ngôn Ngữ: Tiếng Việt' : 'Ngôn Ngữ: Tiếng Anh' }}
                        </p>
                    </div><!-- end d-flex -->
                    <div class="bread-btn-box pt-3">
                        <button class="btn theme-btn theme-btn-sm theme-btn-transparent lh-28 mr-2 mb-2">
                            <i class="la la-heart-o mr-1"></i>
                            <span class="swapping-btn" data-text-swap="Wishlisted" data-text-original="Wishlist"></span>
                        </button>
                        <button class="btn theme-btn theme-btn-sm theme-btn-transparent lh-28 mr-2 mb-2" data-toggle="modal"
                            data-target="#shareModal">
                            <i class="la la-share mr-1"></i>
                        </button>
                        <button class="btn theme-btn theme-btn-sm theme-btn-transparent lh-28 mb-2" data-toggle="modal"
                            data-target="#reportModal">
                            <i class="la la-flag mr-1"></i>
                        </button>
                    </div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-8 -->
        </div><!-- end container -->
    </section>
    <section class="course-details-area pb-20px">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 pb-5">
                    <div class="course-details-content-wrap pt-90px">
                        <div class="course-overview-card bg-gray p-4 rounded">
                            <h3 class="fs-24 font-weight-semi-bold pb-3">Bạn Sẽ Học Được Gì ?</h3>
                            {!! $course->outcomes !!}
                        </div><!-- end course-overview-card -->

                        <div class="course-overview-card">
                            <h3 class="fs-24 font-weight-semi-bold pb-3">Yêu Cầu</h3>
                            {!! $course->prerequisites !!}
                        </div><!-- end course-overview-card -->

                        <div class="course-overview-card">
                            <h3 class="fs-24 font-weight-semi-bold pb-3">Mô Tả</h3>

                            <div class="collapse" id="collapseMoreOne">
                                {!! $course->description !!}
                            </div>

                            <a class="collapse-btn collapse--btn fs-15" data-toggle="collapse" href="#collapseMoreOne"
                                role="button" aria-expanded="false" aria-controls="collapseMoreOne">
                                <span class="collapse-btn-hide">Xem Mô Tả<i class="la la-angle-down ml-1 fs-14"></i></span>
                                <span class="collapse-btn-show">Thu gọn<i class="la la-angle-up ml-1 fs-14"></i></span>
                            </a>

                        </div><!-- end course-overview-card -->
                        <div class="course-overview-card">
                            <div class="curriculum-header d-flex align-items-center justify-content-between pb-4">
                                <h3 class="fs-24 font-weight-semi-bold">Nội Dung Khoá Học</h3>
                                <div class="curriculum-duration fs-15">
                                    <span class="curriculum-total__text mr-2"><strong
                                            class="text-black font-weight-semi-bold">Bài Học:</strong>
                                        {{ $course->section->flatMap(function ($section) {
                                                return $section->lectures;
                                            })->count() }}
                                    </span>
                                </div>
                            </div>

                            <div class="curriculum-content">
                                <div id="accordion" class="generic-accordion">
                                    @forelse ($course->section as $section)
                                        <div class="card">
                                            <div class="card-header" id="heading{{ $course->id }}-{{ $section->id }}">
                                                <button
                                                    class="btn btn-link d-flex align-items-center justify-content-between collapsed"
                                                    data-toggle="collapse"
                                                    data-target="#collapse{{ $course->id }}-{{ $section->id }}"
                                                    aria-expanded="false"
                                                    aria-controls="collapse{{ $course->id }}-{{ $section->id }}">
                                                    <i class="la la-plus"></i>
                                                    <i class="la la-minus"></i>
                                                    {{ $section->title }}
                                                    <span class="fs-15 text-gray font-weight-medium">
                                                        {{ $section->lectures->count() }} Bài Học
                                                    </span>
                                                </button>
                                            </div><!-- end card-header -->

                                            <div id="collapse{{ $course->id }}-{{ $section->id }}" class="collapse"
                                                aria-labelledby="heading{{ $course->id }}-{{ $section->id }}"
                                                data-parent="#accordion" style="">
                                                <div class="card-body">
                                                    <ul class="generic-list-item">
                                                        @foreach ($section->lectures as $lecture)
                                                            @if ($lecture->preview == 1)
                                                                <li>
                                                                    <a href="#"
                                                                        class="d-flex align-items-center justify-content-between text-color"
                                                                        data-toggle="modal"
                                                                        data-target="#previewLecture{{ $lecture->id }}">

                                                                        <span>
                                                                            <i class="la la-play-circle mr-1"></i>
                                                                            {{ $lecture->title }}
                                                                            <span class="ribbon ml-2 fs-13">Preview</span>
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <div class="modal fade"
                                                                    id="previewLecture{{ $lecture->id }}" tabindex="-1"
                                                                    aria-labelledby="previewLectureLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-body">
                                                                                <video id="previewVideo"
                                                                                    class="d-block mb-4" width="100%"
                                                                                    height="320px" controls>
                                                                                    <source src="{{ $lecture->video }}"
                                                                                        type="video/mp4">
                                                                                </video>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <li>
                                                                    <a href="javascript:void(0)"
                                                                        class="d-flex align-items-center justify-content-between ">

                                                                        <span>
                                                                            <i class="la la-play-circle mr-1"></i>
                                                                            {{ $lecture->title }}
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </div><!-- end card-body -->
                                            </div><!-- end collapse -->
                                        </div><!-- end card -->
                                    @empty
                                        <div class="alert alert-info">
                                            Chưa có bài học nào
                                        </div>
                                    @endforelse
                                </div><!-- end generic-accordion -->
                            </div><!-- end curriculum-content -->

                        </div><!-- end course-overview-card -->

                        <div class="course-overview-card pt-4">
                            <h3 class="fs-24 font-weight-semi-bold pb-4">Người Hướng Dẫn</h3>
                            <div class="instructor-wrap">
                                <div class="media media-card">
                                    <div class="instructor-img">
                                        <a href="{{ route('info', $course->instructor->username) }}"
                                            class="media-img d-block">
                                            <img class="lazy" src="images/img-loading.png"
                                                data-src="{{ $course->instructor->photo ?? asset('uploads/no_image.jpg') }}"
                                                alt="Avatar image">
                                        </a>
                                    </div><!-- end instructor-img -->
                                    <div class="media-body">
                                        <h5><a href="{{ route('info', $course->instructor->username) }}">
                                                {{ $course->instructor->name }}
                                            </a></h5>
                                        <strong class="mt-2">
                                            {{ $course->instructor->sort_desc }}
                                        </strong>
                                        <span class="d-block lh-18 py-2">
                                            Tham Gia: {{ formatDate($course->instructor->created_at) }}
                                        </span>
                                        <div class="collapse" id="collapseMoreTwo">
                                            {!! $course->instructor->bio !!}
                                        </div>
                                        <a class="collapse-btn collapse--btn fs-15" data-toggle="collapse"
                                            href="#collapseMoreTwo" role="button" aria-expanded="false"
                                            aria-controls="collapseMoreTwo">
                                            <span class="collapse-btn-hide">Xem Mô Tả<i
                                                    class="la la-angle-down ml-1 fs-14"></i></span>
                                            <span class="collapse-btn-show">Ẩn<i
                                                    class="la la-angle-up ml-1 fs-14"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div><!-- end instructor-wrap -->
                        </div><!-- end course-overview-card -->
                        <div class="course-overview-card pt-4">
                            <h3 class="fs-24 font-weight-semi-bold pb-4">Đánh Giá</h3>

                            <div class="feedback-wrap">
                                <div class="media media-card align-items-center">
                                    <div class="review-rating-summary">
                                        <span class="stats-average__count"></span>
                                        <div class="rating-wrap pt-1">
                                            <div class="review-stars" id="stars-box-container">
                                            </div>
                                            <span class="rating-total d-block"></span>
                                        </div><!-- end rating-wrap -->
                                    </div><!-- end review-rating-summary -->
                                    <div class="my-2" id="rating-notify"></div>
                                </div>
                            </div><!-- end feedback-wrap -->
                            <hr>

                            <div class="review-wrap mt-5" id="rating-box">

                            </div><!-- end review-wrap -->
                        </div><!-- end course-overview-card -->

                        <form id="form-rating" class="course-overview-card pt-4" method="POST"
                            action="{{ route('course.rating') }}">
                            @csrf

                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <input type="hidden" name="instructor_id" value="{{ $course->instructor->id }}">

                            <h3 class="fs-24 font-weight-semi-bold pb-4">Đánh Giá Về Khoá Học Này</h3>
                            <div class="leave-rating-wrap pb-4">
                                <div class="leave-rating leave--rating">
                                    <input type="radio" name='rate' id="star5" value="5" />
                                    <label for="star5"></label>
                                    <input type="radio" name='rate' id="star4" value="4" />
                                    <label for="star4"></label>
                                    <input type="radio" name='rate' id="star3" value="3" />
                                    <label for="star3"></label>
                                    <input type="radio" name='rate' id="star2" value="2" />
                                    <label for="star2"></label>
                                    <input type="radio" name='rate' id="star1" value="1" />
                                    <label for="star1"></label>
                                </div><!-- end leave-rating -->
                            </div>
                            <div class="row">
                                <div class="input-box col-lg-12">
                                    <label class="label-text">Nội Dung</label>
                                    <div class="form-group">
                                        <textarea class="form-control form--control pl-3" name="message" rows="3"></textarea>
                                    </div>
                                </div><!-- end input-box -->
                                <div class="btn-box col-lg-12">
                                    <button class="btn theme-btn" type="submit">Gửi Đánh Giá</button>
                                </div><!-- end btn-box -->
                            </div>
                        </form><!-- end course-overview-card -->
                    </div><!-- end course-details-content-wrap -->
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="sidebar sidebar-negative">
                        <div class="card card-item">
                            <div class="card-body">
                                <div class="preview-course-video">
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#previewModal_course">
                                        <img src="{{ asset('frontend/images/img-loading.png') }}"
                                            data-src="{{ asset($course->image) }}" alt="course-img"
                                            class="w-100 rounded lazy">
                                        <div class="preview-course-video-content">
                                            <div class="overlay"></div>
                                            <div class="play-button">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                    viewBox="-307.4 338.8 91.8 91.8"
                                                    style=" enable-background:new -307.4 338.8 91.8 91.8;"
                                                    xml:space="preserve">
                                                    <style type="text/css">
                                                        .st0 {
                                                            fill: #ffffff;
                                                            border-radius: 100px;
                                                        }

                                                        .st1 {
                                                            fill: #000000;
                                                        }
                                                    </style>
                                                    <g>
                                                        <circle class="st0" cx="-261.5" cy="384.7" r="45.9">
                                                        </circle>
                                                        <path class="st1"
                                                            d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </div>
                                            <p class="fs-15 font-weight-bold text-white pt-3">Xem Trước Khoá Học</p>
                                        </div>
                                    </a>
                                </div><!-- end preview-course-video -->

                                <div class="preview-course-feature-content pt-40px">

                                    @if (Auth::check())
                                        @if (checkUserPaidCourse(auth()->user()->id, $course->id))
                                            <a href="{{ route('course.view', $course->slug) }}"
                                                class="btn theme-btn w-100 mb-2">Vào Học</a>
                                        @else
                                            <p class="d-flex flex-column gap-10 ">
                                                @if ($course->discount > 0)
                                                    <span class="fs-35 font-weight-semi-bold text-color d-block pb-2">
                                                        {{ number_format($course->price - ($course->price * $course->discount) / 100, 0, ',', '.') }}
                                                        VND
                                                    </span>
                                                    <div class="d-flex align-items-center pb-3">
                                                        <span class="before-price font-weight-medium text-gray d-block">
                                                            {{ number_format($course->price, 0, ',', '.') }} VND
                                                        </span>
                                                        <span class="badge badge-danger">-{{ $course->discount }}%</span>
                                                    </div>
                                                @else
                                                    <span class="fs-35 font-weight-semi-bold text-black d-block">
                                                        {{ number_format($course->price, 0, ',', '.') }} VND
                                                    </span>
                                                @endif
                                            </p>

                                            <div class="buy-course-btn-box my-3">
                                                @if ($course->status == 1 && $course->price == 0)
                                                    <a href="" class="btn theme-btn w-100 mb-2">Tham Gia Khoá
                                                        Học</a>
                                                @elseif($course->status == 1)
                                                    <button type="button" class="btn theme-btn w-100 mb-2"
                                                        id="{{ $course->id }}" onclick="addToCart(this.id)">
                                                        <i class="la la-shopping-cart fs-18 mr-1"></i>
                                                        Thêm Vào Giỏ Hàng
                                                    </button>

                                                    <button type="button"
                                                        class="btn theme-btn w-100 theme-btn-white mb-2" id="buyNow"
                                                        data-course-id="{{ $course->id }}">
                                                        <i class="la la-shopping-bag mr-1"></i>
                                                        Mua Ngay
                                                    </button>
                                                @endif
                                            </div>
                                        @endif
                                    @endif
                                </div><!-- end preview-course-content -->
                            </div>
                        </div><!-- end card -->
                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="card-title fs-18 pb-2">Về Khoá Học Này</h3>
                                <div class="divider"><span></span></div>
                                <ul class="generic-list-item generic-list-item-flash">
                                    <li class="d-flex align-items-center justify-content-between">
                                        <span><i class="la la-play-circle-o mr-2 text-color"></i>Bài Giảng</span>
                                        @php
                                            $totalLecture = $course->section
                                                ->flatMap(function ($section) {
                                                    return $section->lectures->pluck('id');
                                                })
                                                ->count();
                                        @endphp
                                        {{ $totalLecture }}
                                    </li>
                                    <li class="d-flex align-items-center justify-content-between">
                                        <span>
                                            <i class="la la-file-text-o mr-2 text-color"></i>Tài Nguyên
                                        </span>
                                        @php
                                            $totalAttachment = $course->section
                                                ->flatMap(function ($section) {
                                                    return $section->lectures
                                                        ->pluck('attachment')
                                                        ->filter(function ($attachment) {
                                                            return !is_null($attachment);
                                                        });
                                                })
                                                ->count();
                                        @endphp
                                        {{ $totalAttachment }}
                                    </li>

                                    <li class="d-flex align-items-center justify-content-between">
                                        <span>
                                            <i class="la la-eye mr-2 text-color"></i>Xem Trước
                                        </span>
                                        @php
                                            echo $course->section
                                                ->flatMap(function ($section) {
                                                    return $section->lectures->where('preview', 1);
                                                })
                                                ->count();
                                        @endphp
                                    </li>

                                    <li class="d-flex align-items-center justify-content-between"><span><i
                                                class="la la-language mr-2 text-color"></i>Ngôn Ngữ</span>
                                        {{ $course->language == 'vi' ? 'Tiếng Việt' : 'Tiếng Anh' }}
                                    </li>
                                </ul>
                            </div>
                        </div><!-- end card -->

                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="card-title fs-18 pb-2">Khoá Học Liên Quan</h3>
                                <div class="divider"><span></span></div>

                                @foreach ($related as $item)
                                    <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4">
                                        <a href="{{ route('course.detail', $item->slug) }}" class="media-img">
                                            <img class="mr-3 lazy" src="{{ asset('frontend/images/img-loading.png') }}"
                                                data-src="{{ $item->image }}" alt="Related course image">
                                        </a>
                                        <div class="media-body">
                                            <h5 class="fs-15"><a href="{{ route('course.detail', $item->slug) }}">
                                                    {{ $item->name }}
                                                </a></h5>
                                            <span class="d-block lh-18 py-1 fs-14">
                                                {{ $item->instructor->name }}
                                            </span>
                                            <p class="text-black font-weight-semi-bold lh-18 fs-15">
                                                {{ number_format($item->price, 0, ',', '.') }} VND

                                        </div>
                                    </div><!-- end media -->
                                @endforeach

                            </div>
                        </div><!-- end card -->

                    </div><!-- end sidebar -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

    <!-- Modal -->
    <div class="modal fade" id="previewModal_course" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-preview">
                <div class="modal-header">
                    <h5 class="modal-title" id="previewModalLabel">Xem Trước Khoá Học</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-close"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="preview-course-video">
                        @if (strpos($course->video, 'youtube') !== false)
                            <iframe width="100%" height="320px" src="{{ $course->video }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        @else
                            <video id="video" class="d-block mb-4" width="100%" height="320px" controls>
                                <source src="{{ $course->video }}" type="video/mp4">
                            </video>
                        @endif
                        {{-- <video controls crossorigin playsinline id="player" class="d-block mb-4" width="100%"
                            height="320px" controls>
                            <source src="{{ $course->video }}" />
                        </video> --}}
                    </div><!-- end preview-course-video -->
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        //đóng modal thì dừng video
        $('#previewModal').on('hidden.bs.modal', function() {
            var video = document.getElementById("video");
            video.pause();
        });

        //mua ngay
        $('#buyNow').click(function() {
            var courseId = $(this).data('course-id');
            $.ajax({
                url: "{{ route('course.buy-now') }}",
                method: "POST",
                data: {
                    courseId: courseId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.status == 'success') {
                        window.location.href = "{{ route('checkout') }}";
                    } else {
                        location.reload();
                    }
                }
            });
        });


        $('#previewModal_course').on('hidden.bs.modal', function() {
            var video = document.getElementById("video");
            video.pause();
        });

        $('#form-rating').on('submit', function(e) {
            e.preventDefault();

            var rate = $('input[name="rate"]:checked').val();
            var message = $('textarea[name="message"]').val();
            var courseId = $('input[name="course_id"]').val();
            var instructorId = $('input[name="instructor_id"]').val();
            var userId = $('input[name="user_id"]').val();

            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: {
                    rate: rate,
                    message: message,
                    course_id: courseId,
                    instructor_id: instructorId,
                    _token: '{{ csrf_token() }}'
                },
                beforeSend: function() {
                    $('#form-rating button').attr('disabled', true);
                    $('#form-rating button').html(
                        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Đang xử lý...'
                    );
                },
                success: function(response) {
                    if (response.status == 'success') {
                        loadRating();
                        $('#rating-notify').html(
                            '<div class="alert alert-success">Đánh giá của bạn đã được gửi thành công</div>'
                        ).show().delay(2000).fadeOut();
                        $('#form-rating')[0].reset();
                    } else {
                        console.log(response)
                    }
                },
                complete: function() {
                    $('#form-rating button').attr('disabled', false);
                    $('#form-rating button').html('Gửi Đánh Giá');
                }
            });
            return false;
        });

        function deleteRating(id) {
            Swal.fire({
                title: 'Xác nhận xóa ?',
                text: "Bạn không thể hoàn tác hành động này!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xác nhận',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('course.rating.delete') }}",
                        method: 'DELETE',
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                loadRating();

                                $('#rating-notify').html(
                                    '<div class="alert alert-success">Đánh giá của bạn đã được xóa</div>'
                                ).show().delay(2000).fadeOut();
                            }
                        }
                    });
                }
            })
        }

        function loadRating() {
            $.ajax({
                url: "{{ route('course.rating.get') }}",
                method: 'GET',
                data: {
                    course_id: {{ $course->id }}
                },
                success: function(response) {
                    var html = '';
                    var ratings = response.data;
                    var current_user = {{ auth()->check() ? auth()->user()->id : 0 }};
                    var delete_button = '';

                    $('.stats-average__count').html(response.avg);
                    $('.rating-total').html(response.total + ' đánh giá');
                    $('#stars-box-container').html(generateStars(response.avg));


                    if (ratings.length > 0) {
                        ratings.forEach(function(rating) {

                            if (rating.user_id === current_user) {
                                deleteButton =
                                    `<button class="btn btn-sm btn-danger btn-del-rating rounded-circle" onclick="deleteRating(${rating.id})">
                                        <i class="la la-trash"></i>
                                    </button>`;
                            } else {
                                deleteButton = '';
                            }

                            html += `
                    <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4">
                        <div class="media-img mr-4 rounded-full">
                            <img class="rounded-full lazy" src="{{ asset('frontend/images/img-loading.png') }}"
                                data-src="${rating.users.photo ?? 'uploads/no_image.png'}" alt="User image">
                        </div>
                        <div class="media-body custom-box-rating">
                            <div class="d-flex flex-wrap align-items-center justify-content-between pb-1">
                                <h5>${rating.users.name}</h5>
                                <div class="review-stars">
                                    ${generateStars(rating.rating)}
                                </div>
                            </div>
                            <span class="d-block lh-18 pb-2">
                                ${formatDate(rating.created_at)}
                            </span>
                            <p class="pb-2">${rating.comment}</p>

                            ${deleteButton}
                        </div>
                    </div><!-- end media -->
                    `;
                        });

                    } else {
                        html += '<div class="alert alert-info">Chưa có đánh giá nào</div>';
                    }
                    $('#rating-box').html(
                        html);
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + error);
                }
            });
        }

        function formatDate(dateString) {
            var options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            return new Date(dateString).toLocaleDateString(undefined, options);
        }

        function generateStars(rating) {
            var fullStar = '<i class="fas fa-star star-filled"></i>';
            var halfStar = '<i class="fas fa-star-half-alt star-filled"></i>';
            var emptyStar = '<i class="far fa-star star-empty"></i>';

            var starsHtml = '';
            var fullStars = Math.floor(rating);
            var hasHalfStar = (rating % 1) >= 0.5;
            var emptyStars = 5 - fullStars - (hasHalfStar ? 1 : 0);

            for (var i = 0; i < fullStars; i++) {
                starsHtml += fullStar;
            }

            if (hasHalfStar) {
                starsHtml += halfStar;
            }

            for (var i = 0; i < emptyStars; i++) {
                starsHtml += emptyStar;
            }

            return starsHtml;
        }

        loadRating();
    </script>
@endpush
