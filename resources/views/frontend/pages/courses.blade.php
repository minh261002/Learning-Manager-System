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
                                <option value="name_desc" {{ request()->sort == 'name_desc' ? 'selected' : '' }}>Tên: Z-A
                                </option>
                                <option value="name_asc" {{ request()->sort == 'name_asc' ? 'selected' : '' }}>Tên: A-Z
                                </option>
                                <option value="price_asc" {{ request()->sort == 'price_asc' ? 'selected' : '' }}>Giá: Thấp
                                    Đến Cao</option>
                                <option value="price_desc" {{ request()->sort == 'price_desc' ? 'selected' : '' }}>Giá: Cao
                                    Đến Thấp</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <h6 class="mb-0">
                            @if (request()->category)
                                Danh Mục: {{ $allCategories->where('slug', request()->category)->first()->name }}
                            @else
                                Danh Sách Khóa Học
                            @endif
                        </h6>
                    </div>

                </div><!-- end filter-bar-inner -->
            </div><!-- end filter-bar -->

            <div class="row">
                <div class="col-lg-3">
                    <div class="sidebar mb-5">
                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="card-title fs-18 pb-2">Danh Mục</h3>
                                <div class="divider"><span></span></div>
                            </div>
                        </div><!-- end card -->

                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="card-title fs-18 pb-2">Ngôn Ngữ</h3>
                                <div class="divider"><span></span></div>
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="langCheckbox"
                                        {{ request()->lang == 'vi' ? 'checked' : '' }}>
                                    <label class="custom-control-label custom--control-label text-black" for="langCheckbox">
                                        Tiếng Việt
                                    </label>
                                </div><!-- end custom-control -->

                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="langCheckbox2"
                                        {{ request()->lang == 'en' ? 'checked' : '' }}>
                                    <label class="custom-control-label custom--control-label text-black"
                                        for="langCheckbox2">
                                        Tiếng Anh
                                    </label>
                                </div>
                            </div>
                        </div><!-- end card -->

                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="card-title fs-18 pb-2">Đánh Giá</h3>
                                <div class="divider"><span></span></div>
                            </div>
                        </div><!-- end card -->
                    </div><!-- end sidebar -->
                </div><!-- end col-lg-4 -->
                <div class="col-lg-9">
                    <div class="row">
                        @php
                            echo renderBoxCourses($courses);
                        @endphp

                    </div><!-- end row -->

                    <div class="text-center pt-3">
                        <nav aria-label="Page navigation example" class="pagination-box">
                            {{ $courses->links('pagination::bootstrap-4') }}
                        </nav>
                        <p class="fs-14 pt-2">Hiển Thị {{ $courses->firstItem() ?? 0 }} - {{ $courses->lastItem() ?? 0 }}
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

        //checkbox lang
        $('#langCheckbox').on('change', function() {
            var url = "{{ route('courses') }}";
            var value = $(this).is(':checked') ? 'vi' : '';

            if (value == 'vi') {
                url = url + '?lang=vi';
            }

            window.location.href = url
        });

        $('#langCheckbox2').on('change', function() {
            var url = "{{ route('courses') }}";
            var value = $(this).is(':checked') ? 'en' : '';

            if (value == 'en') {
                url = url + '?lang=en';
            }

            window.location.href = url
        });
    </script>
@endpush
