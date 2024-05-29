<section class="category-area pb-90px">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9">
                <div class="category-content-wrap">
                    <div class="section-heading">
                        <h5 class="ribbon ribbon-lg mb-2">Danh Mục</h5>
                        <h2 class="section__title">Danh Mục</h2>
                        <span class="section-divider"></span>
                    </div><!-- end section-heading -->
                </div>
            </div><!-- end col-lg-9 -->
            <div class="col-lg-3">
                <div class="category-btn-box text-right">
                    <a href="{{ route('courses') }}" class="btn theme-btn">Xem Tất Cả <i
                            class="la la-arrow-right icon ml-1"></i></a>
                </div><!-- end category-btn-box-->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
        <div class="category-wrapper mt-30px">
            {{-- <div class="row">
                @foreach ($categories as $category)
                    <div class="col-lg-4 responsive-column-half">
                        <div class="category-item">
                            <img class="cat__img lazy img-category" src="{{ $category->image }}"
                                data-src="{{ $category->image }}" alt="Category image">
                            <div class="category-content">
                                <div class="category-inner">
                                    <h3 class="cat__title"><a href="#">{{ $category->name }}</a></h3>

                                    <p class="cat__meta">{{ $category->children_courses->count() }} khoá học</p>

                                    <a href="{{ route('courses', ['category' => $category->slug]) }}"
                                        class="btn theme-btn theme-btn-sm theme-btn-white">Xem<i
                                            class="la la-arrow-right icon ml-1"></i></a>
                                </div>
                            </div><!-- end category-content -->
                        </div><!-- end category-item -->
                    </div><!-- end col-lg-4 -->
                @endforeach
            </div><!-- end row --> --}}
            <div class="owl-category owl-carousel ow-theme owl-action-styled mt-30px">
                @foreach ($categories as $category)
                    <div class="category-item item">
                        <img class="cat__img lazy img-category" src="{{ $category->image }}"
                            data-src="{{ $category->image }}" alt="Category image">
                        <div class="category-content">
                            <div class="category-inner">
                                <h3 class="cat__title text-center"><a href="#">{{ $category->name }}</a></h3>

                                <p class="cat__meta text-center">{{ $category->children_courses->count() }} khoá học</p>

                                <a href="{{ route('courses', ['category' => $category->slug]) }}"
                                    class="btn theme-btn theme-btn-sm theme-btn-white">Xem<i
                                        class="la la-arrow-right icon ml-1"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div><!-- end category-wrapper -->
    </div><!-- end container -->
</section>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.owl-category').owlCarousel({
                loop: true,
                margin: 30,
                autoplay: true,
                nav: true,
                dots: false,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                navText: ["<i class='la la-arrow-left'></i>", "<i class='la la-arrow-right'></i>"],
                responsive: {
                    0: {
                        items: 1
                    },
                    576: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                }
            });
        });
    </script>
@endpush
