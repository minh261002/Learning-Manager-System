@extends('frontend.master')

@section('title', 'Danh Sách Khóa Học')
@section('content')
    <section class="course-area my-5">
        <div class="container">

            <div class="filter-bar mb-4">
                <div class="filter-bar-inner d-flex flex-wrap align-items-center justify-content-between">
                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                        <div class="select-container select--container">
                            <select class="select-container-select select2">
                                <option value="newest" {{ request()->sort == 'newest' ? 'selected' : '' }}>Mới Nhất</option>
                                <option value="oldest" {{ request()->sort == 'oldest' ? 'selected' : '' }}>Cũ Nhất</option>
                                <option value="name_desc" {{ request()->sort == 'name_desc' ? 'selected' : '' }}>Tên: A-Z
                                </option>
                                <option value="name_asc" {{ request()->sort == 'name_asc' ? 'selected' : '' }}>Tên: Z-A
                                </option>
                                <option value="price_asc" {{ request()->sort == 'price_asc' ? 'selected' : '' }}>Giá: Thấp
                                    Đến Cao</option>
                                <option value="price_desc" {{ request()->sort == 'price_desc' ? 'selected' : '' }}>Giá: Cao
                                    Đến Thấp</option>
                            </select>
                        </div>
                    </div>

                </div><!-- end filter-bar-inner -->
            </div><!-- end filter-bar -->

            <div class="row">
                <div class="col-lg-4">
                    <div class="sidebar mb-5">

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
                        @forelse ($courses as $course)
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
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="icon-element icon-element-sm shadow-sm cursor-pointer"
                                                        id="{{ $course->id }}" title="Yêu Thích"
                                                        onclick="addToWishLish(this.id)">
                                                        <i class="la la-heart-o"></i>
                                                    </div>

                                                    <div class="icon-element icon-element-sm shadow-sm cursor-pointer"
                                                        id="{{ $course->id }}" title="Thêm Vào Giỏ Hàng"
                                                        onclick="addToCart(this.id)">
                                                        <i class="la la-shopping-cart"></i>
                                                    </div>
                                                </div>
                                            @endauth

                                            @guest
                                                <div>
                                                    <div class="icon-element icon-element-sm shadow-sm"
                                                        style="cursor:not-allowed" title="Bạn Cần Đăng Nhập">
                                                        <i class="la la-heart-o"></i>
                                                    </div>

                                                    <div class="icon-element icon-element-sm shadow-sm"
                                                        style="cursor:not-allowed" title="Bạn Cần Đăng Nhập">
                                                        <i class="la la-shopping-cart"></i>
                                                    </div>

                                                </div>
                                            @endguest
                                        </div>
                                    </div><!-- end card-body -->
                                </div><!-- end card -->
                            </div>
                        @empty
                            <div class="col-lg-12">
                                <div class="alert alert-danger">Không có khóa học nào</div>
                            </div>
                        @endforelse

                    </div><!-- end row -->

                    <div class="text-center pt-3">
                        <nav aria-label="Page navigation example" class="pagination-box">
                            {{ $courses->links('pagination::bootstrap-4') }}
                        </nav>
                        <p class="fs-14 pt-2">Hiển Thị {{ $courses->lastItem() ?? $courses->firstItem() }}
                            Trên
                            {{ $courses->total() }} Kết Quả</p>
                    </div>
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
                    location.reload();
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        $('.select-container-select').on('change', function() {
            var value = $(this).val();
            var url = "{{ route('courses') }}";

            if (value == 'newest') {
                url = url + '?sort=newest';
            } else if (value == 'oldest') {
                url = url + '?sort=oldest';
            } else if (value == 'name_desc') {
                url = url + '?sort=name_desc';
            } else if (value == 'name_asc') {
                url = url + '?sort=name_asc';
            } else if (value == 'price_asc') {
                url = url + '?sort=price_asc';
            } else if (value == 'price_desc') {
                url = url + '?sort=price_desc';
            }

            window.location.href = url
        });
    </script>
@endpush
