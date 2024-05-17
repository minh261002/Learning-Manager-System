@extends('frontend.master')

@section('title', 'Danh Sách Khóa Học')
@section('content')
    <section class="course-area mt-5">
        <div class="container">

            <div class="filter-bar mb-4">
                <div class="filter-bar-inner d-flex flex-wrap align-items-center justify-content-between">
                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                        <div class="select-container select--container">
                            <select class="select-container-select">
                                <option value="all-category">Tất Cả</option>
                                <option value="newest">Newest courses</option>
                                <option value="oldest">Oldest courses</option>
                                <option value="high-rated">Highest rated</option>
                                <option value="popular-courses">Popular courses</option>
                                <option value="high-to-low">Price: high to low</option>
                                <option value="low-to-high">Price: low to high</option>
                            </select>
                        </div>
                    </div>

                    <form method="post">
                        <div class="form-group mb-0">
                            <input class="form-control form--control pl-3" type="text" name="search"
                                placeholder="TÌm Kiếm  . . .">
                            <span class="la la-search search-icon"></span>
                        </div>
                    </form>

                </div><!-- end filter-bar-inner -->
            </div><!-- end filter-bar -->

            <div class="row">
                <div class="col-lg-4">
                    <div class="sidebar mb-5">

                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="card-title fs-18 pb-2">Danh Mục</h3>
                                <div class="divider"><span></span></div>
                                @foreach ($categories as $category)
                                    <div class="custom-control custom-checkbox mb-1 fs-15">
                                        <input type="checkbox" class="custom-control-input"
                                            id="catCheckbox{{ $category->id }}" required>
                                        <label class="custom-control-label custom--control-label text-black"
                                            for="catCheckbox{{ $category->id }}">
                                            {{ $category->name }}
                                        </label>
                                    </div><!-- end custom-control -->
                                @endforeach
                            </div>
                        </div><!-- end card -->


                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="card-title fs-18 pb-2">Ngôn Ngữ</h3>
                                <div class="divider"><span></span></div>
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="langCheckbox" required>
                                    <label class="custom-control-label custom--control-label text-black" for="langCheckbox">
                                        Tiếng Việt
                                    </label>
                                </div><!-- end custom-control -->

                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="langCheckbox2" required>
                                    <label class="custom-control-label custom--control-label text-black"
                                        for="langCheckbox2">
                                        Tiếng Anh
                                    </label>
                                </div>
                            </div>
                        </div><!-- end card -->

                    </div><!-- end sidebar -->
                </div><!-- end col-lg-4 -->
                <div class="col-lg-8">
                    <div class="row">
                        @foreach ($courses as $course)
                            <div class="col-lg-6 responsive-column-half">
                                <div class="card card-item card-preview"
                                    data-tooltip-content="#tooltip_content_{{ $course->id }}">
                                    <div class="card-image">
                                        <a href="{{ route('course.detail', $course->slug) }}">
                                            <img class="card-img-top lazy"
                                                src="{{ asset('frontend/images/img-loading.png') }}"
                                                data-src="{{ $course->image }}" alt="Card image cap">
                                        </a>
                                        <div class="course-badge-labels">
                                            {{-- <div class="course-badge"></div> --}}
                                            @if ($course->discount > 0)
                                                <div class="course-badge red">
                                                    -{{ $course->discount }}%
                                                </div>
                                            @endif
                                        </div>
                                    </div><!-- end card-image -->
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="{{ route('course.detail', $course->slug) }}">
                                                {{ $course->name }}
                                            </a>
                                        </h5>
                                        <p class="card-text"><a href="teacher-detail.html">
                                                {{ $course->instructor->name }}
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
                                            <p class="card-price text-black font-weight-bold">
                                                {{-- {{ number_format($course->price, 0, '.', ',') }} VNĐ
                                                <span class="before-price font-weight-medium">

                                                </span> --}}
                                                @if ($course->price == 0)
                                                    Miễn Phí
                                                @elseif ($course->discount > 0)
                                                    {{ number_format($course->price - ($course->price * $course->discount) / 100, 0, '.', ',') }}
                                                    VNĐ
                                                    <span class="before-price font-weight-medium">
                                                        {{ number_format($course->price, 0, '.', ',') }} VNĐ
                                                    </span>
                                                @else
                                                    {{ number_format($course->price, 0, '.', ',') }} VNĐ
                                                @endif
                                            </p>

                                            @auth
                                                <div class="icon-element icon-element-sm shadow-sm cursor-pointer"
                                                    id="{{ $course->id }}" title="Yêu Thích"
                                                    onclick="addToWishLish(this.id)">
                                                    <i class="la la-heart-o"></i>
                                                </div>
                                            @endauth

                                            @guest
                                                <div class="icon-element icon-element-sm shadow-sm" style="cursor:not-allowed"
                                                    title="Bạn Cần Đăng Nhập">
                                                    <i class="la la-heart-o"></i>
                                                </div>
                                            @endguest
                                        </div>
                                    </div><!-- end card-body -->
                                </div><!-- end card -->
                            </div>

                            <div class="tooltip_templates">
                                <div id="tooltip_content_{{ $course->id }}">
                                    <div class="card card-item">
                                        <div class="card-body">
                                            <p class="card-text pb-2"> <a href="teacher-detail.html">
                                                    {{ $course->instructor->name }}
                                                </a>
                                            </p>
                                            <h5 class="card-title pb-1"><a href="course-details.html">
                                                    {{ $course->name }}
                                                </a></h5>
                                            <ul
                                                class="generic-list-item generic-list-item-bullet generic-list-item--bullet d-flex align-items-center fs-14">
                                                <li>

                                                </li>
                                            </ul>
                                            <p class="card-text pt-1 fs-14 lh-22">
                                                {!! $course->title !!}
                                            </p>

                                            <div class=" card-text pt-1 fs-14">
                                                {!! $course->outcomes !!}
                                            </div>


                                            <div class="d-flex justify-content-between align-items-center mt-5">
                                                <button onclick="addToCart({{ $course->id }})"
                                                    class="btn theme-btn flex-grow-1 mr-3">
                                                    @if ($course->status == 1)
                                                        <i class="la la-shopping-cart mr-1 fs-18"></i>
                                                        Thêm Vào Giỏ Hàng
                                                    @else
                                                        Sắp Ra Mắt
                                                    @endif
                                                </button>
                                            </div>
                                        </div>
                                    </div><!-- end card -->
                                </div>
                            </div>
                        @endforeach

                    </div><!-- end row -->
                    {{-- <div class="text-center pt-3">
                        <nav aria-label="Page navigation example" class="pagination-box">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true"><i class="la la-arrow-left"></i></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true"><i class="la la-arrow-right"></i></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <p class="fs-14 pt-2">Showing 1-10 of 56 results</p>
                    </div> --}}
                </div><!-- end col-lg-8 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection

@push('scripts')
    <script>
        function addToWishLish(id) {
            $.ajax({
                url: "{{ route('wishlist.store') }}",
                type: 'POST',
                data: {
                    course_id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    location.reload();
                }
            });
        }

        function addToCart(id) {
            $.ajax({
                url: "{{ route('cart.store') }}",
                type: 'POST',
                data: {
                    course_id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    console.log(data)
                },
                error: function(data) {
                    console.log(data);
                    alert('An error occurred. Please try again.');
                }
            });
        }
    </script>
@endpush
