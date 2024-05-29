@extends('frontend.master')

@section('title', 'Danh Sách Khóa Học')
@section('content')
    <section class="course-area my-5">
        <div class="container">

            <div class="filter-bar mb-4">
                <div class="filter-bar-inner d-flex flex-wrap align-items-center justify-content-between">
                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                        <div class="select-container select--container">
                            <select class="select-container-select select2" id="select-option">
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
                            @elseif (request()->q)
                                Kết Quả Tìm Kiếm: <span class="text-danger">"{{ request()->q }}"</span>
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

                                @foreach ($allCategories as $category)
                                    @if ($category->parent_id == null)
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="categoryCheckbox{{ $category->id }}"
                                                    data-slug="{{ $category->slug }}"
                                                    {{ request()->category == $category->slug ? 'checked' : '' }}>
                                                <label class="custom-control-label custom--control-label text-black"
                                                    for="categoryCheckbox{{ $category->id }}">
                                                    {{ $category->name }}
                                                </label>
                                            </div>
                                            <div class="parent cursor-pointer">
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                        </div>
                                        @foreach ($allCategories as $childCategory)
                                            @if ($childCategory->parent_id == $category->id)
                                                <div class="custom-control custom-checkbox mb-1 fs-15 d-none"
                                                    style="margin-left: 10px;" id="child">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="categoryCheckbox{{ $childCategory->id }}"
                                                        data-slug="{{ $childCategory->slug }}"
                                                        {{ request()->category == $childCategory->slug ? 'checked' : '' }}>
                                                    <label class="custom-control-label custom--control-label text-black"
                                                        for="categoryCheckbox{{ $childCategory->id }}">
                                                        {{ $childCategory->name }}
                                                    </label>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach

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
        $(document).ready(function() {
            function buildUrl() {
                var url = "{{ route('courses') }}";
                var params = [];

                // Lấy danh sách các danh mục đã chọn bằng slug
                var categories = [];
                $('input[type=checkbox]:checked').each(function() {
                    if ($(this).attr('id').includes('categoryCheckbox')) {
                        categories.push($(this).data('slug'));
                    }
                });
                if (categories.length > 0) {
                    params.push('category=' + categories.join(','));
                }

                // Lấy ngôn ngữ đã chọn
                var lang = '';
                if ($('#langCheckbox').is(':checked')) {
                    lang = 'vi';
                } else if ($('#langCheckbox2').is(':checked')) {
                    lang = 'en';
                }
                if (lang) {
                    params.push('lang=' + lang);
                }

                // Lấy thứ tự sắp xếp đã chọn
                var sort = $('#select-option').val();
                if (sort) {
                    params.push('sort=' + sort);
                }

                // Xây dựng URL với các tham số đã chọn, có thể có nhiều tham số
                if (params.length > 0) {
                    url += '?' + params.join('&');
                }

                return url;
            }
            //khi option được chọn
            $('#select-option').on('change', function() {
                window.location.href = buildUrl();
            });

            // Sự kiện thay đổi checkbox category
            $('input[type=checkbox]').on('change', function() {
                // Đảm bảo chỉ một checkbox category được chọn
                if ($(this).attr('id').includes('categoryCheckbox')) {
                    $('input[type=checkbox]').not(this).prop('checked', false);
                }
                window.location.href = buildUrl();
            });

            // Sự kiện thay đổi checkbox ngôn ngữ
            $('#langCheckbox, #langCheckbox2').on('change', function() {
                // Đảm bảo chỉ một checkbox ngôn ngữ được chọn
                if ($(this).is('#langCheckbox') && $(this).is(':checked')) {
                    $('#langCheckbox2').prop('checked', false);
                } else if ($(this).is('#langCheckbox2') && $(this).is(':checked')) {
                    $('#langCheckbox').prop('checked', false);
                }
                window.location.href = buildUrl();
            });

            $('#ratingCheckbox1', '#ratingCheckbox2', '#ratingCheckbox3', '#ratingCheckbox4', '#ratingCheckbox5')
                .on('change', function() {
                    window.location.href = buildUrl();
                });

            // Sự kiện click vào danh mục cha hiện danh sách danh mục con của nó
            $('.parent').on('click', function() {
                $(this).parent().nextAll('#child').toggleClass('d-none');
            });
        });
    </script>
@endpush
