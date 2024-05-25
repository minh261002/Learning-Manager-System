<section class="header-menu-area">
    <div class="header-menu-content bg-dark">
        <div class="container-fluid">
            <div class="main-menu-content d-flex align-items-center">
                <div class="logo-box logo--box">
                    <div class="theme-picker d-flex align-items-center">
                        <button class="theme-picker-btn dark-mode-btn" title="Dark mode">
                            <svg class="svg-icon-color-white" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                            </svg>
                        </button>
                        <button class="theme-picker-btn light-mode-btn" title="Light mode">
                            <svg viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
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
                </div><!-- end logo-box -->
                <div class="course-dashboard-header-title pl-4">
                    <a href="{{ route('course.detail', $course->slug) }}" class="text-white fs-15">
                        {{ $course->name }}
                    </a>
                </div><!-- end course-dashboard-header-title -->
                <div class="menu-wrapper ml-auto">
                    <div class="theme-picker d-flex align-items-center mr-3">
                        <button class="theme-picker-btn dark-mode-btn" title="Dark mode">
                            <svg class="svg-icon-color-white" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                            </svg>
                        </button>
                        <button class="theme-picker-btn light-mode-btn" title="Light mode">
                            <svg viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
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
                    <div class="nav-right-button d-flex align-items-center">
                        <a href="#"
                            class="btn theme-btn theme-btn-sm theme-btn-transparent lh-26 text-white mr-2"
                            data-toggle="modal" data-target="#ratingModal"><i class="la la-star mr-1"></i> Đánh
                            Giá</a>
                        <a href="#"
                            class="btn theme-btn theme-btn-sm theme-btn-transparent lh-26 text-white mr-2"
                            data-toggle="modal" data-target="#shareModal"><i class="la la-share mr-1"></i>
                            Chia Sẻ</a>
                        <div class="generic-action-wrap generic--action-wrap">
                            <div class="dropdown">
                                <a class="action-btn" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="la la-ellipsis-v"></i>
                                </a>
                            </div>
                        </div>
                    </div><!-- end nav-right-button -->
                </div><!-- end menu-wrapper -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end header-menu-content -->
</section>
