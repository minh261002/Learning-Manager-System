<div class="off-canvas-menu dashboard-off-canvas-menu off--canvas-menu custom-scrollbar-styled pt-20px">
    <div class="off-canvas-menu-close dashboard-menu-close icon-element icon-element-sm shadow-sm" data-toggle="tooltip"
        data-placement="left" title="Close menu">
        <i class="la la-times"></i>
    </div><!-- end off-canvas-menu-close -->
    <div class="logo-box px-4">
        <a href="{{ route('home') }}" class="logo"><img src="{{ asset('frontend/img/logo.svg') }}" alt="logo"></a>
    </div>
    <ul class="generic-list-item off-canvas-menu-list off--canvas-menu-list pt-35px">

        <li class="{{ setSidebarActive(['instructor.dashboard']) }}">
            <a href="{{ route('instructor.dashboard') }}"><svg class="mr-2" xmlns="http://www.w3.org/2000/svg"
                    height="18px" viewBox="0 0 24 24" width="18px">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                        d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                </svg> Dashboard
            </a>
        </li>

        <li class="{{ setSidebarActive(['instructor.profile']) }}">
            <a href="{{ route('instructor.profile') }}"><svg class="mr-2" xmlns="http://www.w3.org/2000/svg"
                    height="18px" viewBox="0 0 24 24" width="18px">
                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                    <path
                        d="M12 5.9c1.16 0 2.1.94 2.1 2.1s-.94 2.1-2.1 2.1S9.9 9.16 9.9 8s.94-2.1 2.1-2.1m0 9c2.97 0 6.1 1.46 6.1 2.1v1.1H5.9V17c0-.64 3.13-2.1 6.1-2.1M12 4C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 9c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4z">
                    </path>
                </svg> Thông Tin Cá Nhân
            </a>
        </li>

        @if (Auth::user()->status == 1)
            <li
                class="{{ setSidebarActive(['instructor.courses.index', 'instructor.courses.create', 'instructor.courses.edit', 'instructor.courses.show']) }}">
                <a href="{{ route('instructor.courses.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#fff" width="18px" height="18px" class="mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                    </svg>
                    Khoá Học
                </a>
            </li>

            <li
                class="{{ setSidebarActive(['instructor.questions.index', 'instructor.questions.create', 'instructor.questions.edit', 'instructor.questions.show']) }}">
                <a href="{{ route('instructor.questions.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="#fff" class="mr-2" width="18px" height="18px">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                    </svg>

                    Câu Hỏi
                </a>
            </li>

            <li
                class="{{ setSidebarActive(['instructor.coupons.index', 'instructor.coupons.create', 'instructor.coupons.edit', 'instructor.coupons.show']) }}">
                <a href="{{ route('instructor.coupons.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="fff" viewBox="0 0 24 24" stroke-width="1.5"
                        style="color: #fff" stroke="currentColor" class="mr-2" width="18px" height="18px">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                    </svg>

                    Mã Giảm Giá
                </a>
            </li>

            <li
                class="{{ setSidebarActive(['instructor.orders.index', 'instructor.orders.create', 'instructor.orders.edit', 'instructor.orders.show']) }}">
                <a href="{{ route('instructor.orders.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="mr-2" width="18px" height="18px">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                    </svg>

                    Đơn Hàng
                </a>
            </li>
        @endif

        <li><a href="{{ route('logout') }}">
                <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 0 24 24"
                    width="18px">
                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                    <path
                        d="M13 3h-2v10h2V3zm4.83 2.17l-1.42 1.42C17.99 7.86 19 9.81 19 12c0 3.87-3.13 7-7 7s-7-3.13-7-7c0-2.19 1.01-4.14 2.58-5.42L6.17 5.17C4.23 6.82 3 9.26 3 12c0 4.97 4.03 9 9 9s9-4.03 9-9c0-2.74-1.23-5.18-3.17-6.83z">
                    </path>
                </svg> Đăng Xuất
            </a>
        </li>

    </ul>
</div>
