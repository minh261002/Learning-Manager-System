@php
    $categories = \App\Models\Category::all();
@endphp

<header class="header-menu-area bg-white border shadow-sm">
    <div class="header-top pr-150px pl-150px border-bottom border-bottom-gray py-1">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="header-widget">
                        <ul class="generic-list-item d-flex flex-wrap align-items-center fs-14">
                            <li class="d-flex align-items-center pr-3 mr-3 border-right border-right-gray"><i
                                    class="la la-phone mr-1"></i><a href="tel:00123456789"> {{ $site->phone }}</a>
                            </li>
                            <li class="d-flex align-items-center"><i class="la la-envelope-o mr-1"></i><a
                                    href="mailto:{{ $site->email }}">{{ $site->email }}</a></li>
                        </ul>
                    </div><!-- end header-widget -->
                </div><!-- end col-lg-6 -->

                <div class="col-lg-6">
                    <div class="header-widget d-flex flex-wrap align-items-center justify-content-end">
                        <div class="theme-picker d-flex align-items-center">
                            <button class="theme-picker-btn dark-mode-btn" title="Dark mode">
                                <svg id="moon" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                                </svg>
                            </button>
                            <button class="theme-picker-btn light-mode-btn" title="Light mode">
                                <svg id="sun" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="5"></circle>
                                    <line x1="12" y1="1" x2="12" y2="3"></line>
                                    <line x1="12" y1="21" x2="12" y2="23"></line>
                                    <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                                    <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                                    <line x1="1" y1="12" x2="3" y2="12"></line>
                                    <line x1="21" y1="12" x2="23" y2="12"></line>
                                    <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                                    <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                                </svg>
                            </button>
                        </div>
                        @guest
                            <ul
                                class="generic-list-item d-flex flex-wrap align-items-center fs-14 border-left border-left-gray pl-3 ml-3">
                                <li class="d-flex align-items-center pr-3 mr-3 border-right border-right-gray"><i
                                        class="la la-sign-in mr-1"></i><a href="{{ route('login') }}"> Đăng Nhập</a></li>
                                <li class="d-flex align-items-center"><i class="la la-user mr-1"></i><a
                                        href="{{ route('register') }}">
                                        Đăng Ký</a></li>
                            </ul>
                        @endguest

                        @auth
                            <ul
                                class="generic-list-item d-flex flex-wrap align-items-center fs-14 border-left border-left-gray pl-3 ml-3">
                                <li class="d-flex align-items-center pr-3 mr-3 border-right border-right-gray"><i
                                        class="la la-user mr-1"></i>
                                    @if (auth()->user()->role == 'admin')
                                        <a href="{{ route('admin.dashboard') }}">
                                            Xin Chào, {{ auth()->user()->name }}</a>
                                    @elseif(auth()->user()->role == 'instructor')
                                        <a href="{{ route('instructor.dashboard') }}">
                                            Xin Chào, {{ auth()->user()->name }}</a>
                                        </a>
                                    @else
                                        <a href="{{ route('dashboard') }}">
                                            Xin Chào, {{ auth()->user()->name }}
                                        </a>
                                    @endif
                                </li>
                                <li class="d-flex align-items-center"><i class="la la-sign-out mr-1"></i><a
                                        href="{{ route('logout') }}">
                                        Đăng Xuất</a></li>
                            </ul>
                        @endauth


                    </div><!-- end header-widget -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end header-top -->

    <div class="header-menu-content pr-150px pl-150px bg-white">
        <div class="container-fluid">
            <div class="main-menu-content">
                <a href="#" class="down-button"><i class="la la-angle-down"></i></a>
                <div class="row align-items-center">
                    <div class="col-lg-2">
                        <div class="logo-box">
                            <a href="{{ route('home') }}" class="logo"><img src="{{ $site->logo }}"
                                    alt="logo"></a>

                            <div class="user-btn-action">
                                <div class="search-menu-toggle icon-element icon-element-sm shadow-sm mr-2"
                                    data-toggle="tooltip" data-placement="top" title="Search">
                                    <i class="la la-search"></i>
                                </div>
                                <div class="off-canvas-menu-toggle cat-menu-toggle icon-element icon-element-sm shadow-sm mr-2"
                                    data-toggle="tooltip" data-placement="top" title="Category menu">
                                    <i class="la la-th-large"></i>
                                </div>
                                <div class="off-canvas-menu-toggle main-menu-toggle icon-element icon-element-sm shadow-sm"
                                    data-toggle="tooltip" data-placement="top" title="Main menu">
                                    <i class="la la-bars"></i>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col-lg-2 -->

                    <div class="col-lg-10">
                        <div class="menu-wrapper">
                            <div class="menu-category">
                                <ul>
                                    <li>
                                        <a href="{{ route('courses') }}">Danh Mục <i
                                                class="la la-angle-down fs-12"></i></a>
                                        <ul class="cat-dropdown-menu">
                                            @foreach ($categories as $category)
                                                @if ($category->parent_id == null)
                                                    <li>
                                                        <a
                                                            href="{{ route('courses', array_merge(request()->query(), ['category' => $category->slug])) }}">{{ $category->name }}
                                                            <i class="la la-angle-right"></i></a>
                                                        <ul class="sub-menu">
                                                            @foreach ($categories as $subCategory)
                                                                @if ($subCategory->parent_id == $category->id)
                                                                    <li>
                                                                        <a
                                                                            href="{{ route('courses', array_merge(request()->query(), ['category' => $subCategory->slug])) }}">{{ $subCategory->name }}</a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>

                            </div><!-- end menu-category -->

                            <form method="get" action="{{ route('courses') }}">
                                <div class="form-group mb-0">
                                    <input class="form-control form--control pl-3" type="text" name="q"
                                        id="search" placeholder="Tìm Kiếm  . . ." autocomplete="off"
                                        value="{{ request()->q }}">
                                    <span class="la la-search search-icon"></span>
                                </div>
                            </form>

                            <div id="searchResult" class="search-result position-absolute left-0 w-50 mt-5 bg-light"
                                style="top: 40px; left:44%; transform:translate(-50%)">

                            </div>

                            <nav class="main-menu">
                                <ul>
                                    <li>
                                        <a href="{{ route('home') }}">Trang Chủ</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('courses') }}">Khoá Học</a>
                                    </li>

                                    <li>
                                        <a href="#">blog</a>
                                    </li>
                                </ul><!-- end ul -->
                            </nav><!-- end main-menu -->

                            <div class="shop-cart mr-4">
                                <ul>
                                    <li>
                                        <p class="shop-cart-btn d-flex align-items-center">
                                            <i class="la la-shopping-cart"></i>
                                            @if (Auth::check())
                                                <span class="product-count" id="cartQty">
                                                    0
                                                </span>
                                            @else
                                                <span class="product-count" id="cartQty">
                                                    0
                                                </span>
                                            @endif
                                        </p>
                                        <ul class="cart-dropdown-menu">
                                            <div id="miniCart">

                                            </div>
                                            <li class="mt-4">
                                                <a href="{{ route('cart.index') }}" class="btn theme-btn w-100">
                                                    <i class="la la-arrow-right icon ml-1"></i>
                                                    Xem Giỏ Hàng
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div><!-- end shop-cart -->

                            <div class="nav-right-button">
                                <a href="{{ route('admission') }}" class="btn theme-btn d-none d-lg-inline-block"><i
                                        class="la la-user-plus mr-1"></i> Admission</a>
                            </div><!-- end nav-right-button -->
                        </div><!-- end menu-wrapper -->
                    </div><!-- end col-lg-10 -->
                </div><!-- end row -->
            </div>
        </div><!-- end container-fluid -->
    </div><!-- end header-menu-content -->

    <div class="off-canvas-menu custom-scrollbar-styled main-off-canvas-menu">
        <div class="off-canvas-menu-close main-menu-close icon-element icon-element-sm shadow-sm"
            data-toggle="tooltip" data-placement="left" title="Close menu">
            <i class="la la-times"></i>
        </div><!-- end off-canvas-menu-close -->
        <ul class="generic-list-item off-canvas-menu-list pt-90px">
            <li>
                <a href="{{ route('home') }}">Trang Chủ</a>
            </li>
            <li>
                <a href="{{ route('courses') }}">Khoá Học</a>
            </li>
            <li>
                <a href="#">blog</a>
            </li>
        </ul>
    </div><!-- end off-canvas-menu -->

    <div class="off-canvas-menu custom-scrollbar-styled category-off-canvas-menu">
        <div class="off-canvas-menu-close cat-menu-close icon-element icon-element-sm shadow-sm" data-toggle="tooltip"
            data-placement="left" title="Close menu">
            <i class="la la-times"></i>
        </div><!-- end off-canvas-menu-close -->
        <ul class="generic-list-item off-canvas-menu-list pt-90px">
            <li>
                <a href="course-grid.html">Development</a>
                <ul class="sub-menu">
                    <li><a href="#">All Development</a></li>
                    <li><a href="#">Web Development</a></li>
                    <li><a href="#">Mobile Apps</a></li>
                    <li><a href="#">Game Development</a></li>
                    <li><a href="#">Databases</a></li>
                    <li><a href="#">Programming Languages</a></li>
                    <li><a href="#">Software Testing</a></li>
                    <li><a href="#">Software Engineering</a></li>
                    <li><a href="#">E-Commerce</a></li>
                </ul>
            </li>
            <li>
                <a href="course-grid.html">business</a>
                <ul class="sub-menu">
                    <li><a href="#">All Business</a></li>
                    <li><a href="#">Finance</a></li>
                    <li><a href="#">Entrepreneurship</a></li>
                    <li><a href="#">Strategy</a></li>
                    <li><a href="#">Real Estate</a></li>
                    <li><a href="#">Home Business</a></li>
                    <li><a href="#">Communications</a></li>
                    <li><a href="#">Industry</a></li>
                    <li><a href="#">Other</a></li>
                </ul>
            </li>
            <li>
                <a href="course-grid.html">IT & Software</a>
                <ul class="sub-menu">
                    <li><a href="#">All IT & Software</a></li>
                    <li><a href="#">IT Certification</a></li>
                    <li><a href="#">Hardware</a></li>
                    <li><a href="#">Network & Security</a></li>
                    <li><a href="#">Operating Systems</a></li>
                    <li><a href="#">Other</a></li>
                </ul>
            </li>
            <li>
                <a href="course-grid.html">Finance & Accounting</a>
                <ul class="sub-menu">
                    <li><a href="#"> All Finance & Accounting</a></li>
                    <li><a href="#">Accounting & Bookkeeping</a></li>
                    <li><a href="#">Cryptocurrency & Blockchain</a></li>
                    <li><a href="#">Economics</a></li>
                    <li><a href="#">Investing & Trading</a></li>
                    <li><a href="#">Other Finance & Economics</a></li>
                </ul>
            </li>
            <li>
                <a href="course-grid.html">design</a>
                <ul class="sub-menu">
                    <li><a href="#">All Design</a></li>
                    <li><a href="#">Graphic Design</a></li>
                    <li><a href="#">Web Design</a></li>
                    <li><a href="#">Design Tools</a></li>
                    <li><a href="#">3D & Animation</a></li>
                    <li><a href="#">User Experience</a></li>
                    <li><a href="#">Other</a></li>
                </ul>
            </li>
            <li>
                <a href="course-grid.html">Personal Development</a>
                <ul class="sub-menu">
                    <li><a href="#">All Personal Development</a></li>
                    <li><a href="#">Personal Transformation</a></li>
                    <li><a href="#">Productivity</a></li>
                    <li><a href="#">Leadership</a></li>
                    <li><a href="#">Personal Finance</a></li>
                    <li><a href="#">Career Development</a></li>
                    <li><a href="#">Parenting & Relationships</a></li>
                    <li><a href="#">Happiness</a></li>
                </ul>
            </li>
            <li>
                <a href="course-grid.html">Marketing</a>
                <ul class="sub-menu">
                    <li><a href="#">All Marketing</a></li>
                    <li><a href="#">Digital Marketing</a></li>
                    <li><a href="#">Search Engine Optimization</a></li>
                    <li><a href="#">Social Media Marketing</a></li>
                    <li><a href="#">Branding</a></li>
                    <li><a href="#">Video & Mobile Marketing</a></li>
                    <li><a href="#">Affiliate Marketing</a></li>
                    <li><a href="#">Growth Hacking</a></li>
                    <li><a href="#">Other</a></li>
                </ul>
            </li>
            <li>
                <a href="course-grid.html">Health & Fitness</a>
                <ul class="sub-menu">
                    <li><a href="#">All Health & Fitness</a></li>
                    <li><a href="#">Fitness</a></li>
                    <li><a href="#">Sports</a></li>
                    <li><a href="#">Dieting</a></li>
                    <li><a href="#">Self Defense</a></li>
                    <li><a href="#">Meditation</a></li>
                    <li><a href="#">Mental Health</a></li>
                    <li><a href="#">Yoga</a></li>
                    <li><a href="#">Dance</a></li>
                    <li><a href="#">Other</a></li>
                </ul>
            </li>
            <li>
                <a href="course-grid.html">Photography</a>
                <ul class="sub-menu">
                    <li><a href="#">All Photography</a></li>
                    <li><a href="#">Digital Photography</a></li>
                    <li><a href="#">Photography Fundamentals</a></li>
                    <li><a href="#">Commercial Photography</a></li>
                    <li><a href="#">Video Design</a></li>
                    <li><a href="#">Photography Tools</a></li>
                    <li><a href="#">Other</a></li>
                </ul>
            </li>
        </ul>
    </div><!-- end off-canvas-menu -->

    <div class="mobile-search-form">
        <div class="d-flex align-items-center">
            <form method="post" class="flex-grow-1 mr-3">
                <div class="form-group mb-0">
                    <input class="form-control form--control pl-3" type="text" name="search"
                        placeholder="Search for anything">
                    <span class="la la-search search-icon"></span>
                </div>
            </form>
            <div class="search-bar-close icon-element icon-element-sm shadow-sm">
                <i class="la la-times"></i>
            </div><!-- end off-canvas-menu-close -->
        </div>
    </div><!-- end mobile-search-form -->

    <div class="body-overlay"></div>
</header>


@push('scripts')
    <script>
        $(document).ready(function() {

            $(document).on('click', function(e) {
                if (!$(e.target).closest('#searchResult').length && !$(e.target).closest('#search')
                    .length) {
                    $('#searchResult').html('');
                }
            });


            let searchTimeout;

            $('#search').on('keyup', function() {
                clearTimeout(searchTimeout);
                $('#searchResult').html(`
                    <div class="d-flex justify-content-center align-items-center" style="height: 100px;">
                        <div class="spinner-border text-danger" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                `);

                var q = $(this).val();

                if (q.length == 0) {
                    $('#searchResult').html('');
                } else {
                    searchTimeout = setTimeout(function() {
                        $.ajax({
                            url: "{{ route('search') }}",
                            method: 'GET',
                            data: {
                                q: q
                            },
                            success: function(res) {
                                var courses = res.courses;
                                console.log(courses);

                                if (courses.length === 0) {
                                    $('#searchResult').html(
                                        '<p class="py-3 fs-18 text-center">Không Có Kết Quả</p>'
                                    );
                                    return;
                                }

                                var searchResult = `
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Ảnh</th>
                                            <th>Khoá Học</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            `;

                                $.each(courses, function(key, value) {
                                    searchResult += `
                                    <tr>
                                        <td><img src="${value.image}" alt="Search image" style="width: 50px; height: 50px; object-fit:cover"></td>
                                        <td>
                                            <a href="/course/${value.slug}">
                                                ${value.name}
                                            </a>
                                        </td>
                                    </tr>
                                `;
                                });

                                searchResult += `
                                    </tbody>
                                </table>
                            `;

                                $('#searchResult').html(searchResult);
                            },
                            error: function(err) {
                                $('#searchResult').html(
                                    '<p>Đã có lỗi xảy ra, vui lòng thử lại</p>'
                                );
                                console.log(err);
                            }
                        });
                    }, 2000);
                }
            });
        });
    </script>
@endpush
