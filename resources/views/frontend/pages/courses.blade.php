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
                                <h3 class="card-title fs-18 pb-2">Đánh Giá</h3>
                                <div class="divider"><span></span></div>
                                <div class="custom-control custom-radio mb-1 fs-15">
                                    <input type="radio" class="custom-control-input" id="fiveStarRating"
                                        name="radio-stacked" required>
                                    <label class="custom-control-label custom--control-label" for="fiveStarRating">
                                        <span class="rating-wrap d-flex align-items-center">
                                            <span class="review-stars">
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                            </span>
                                            <span class="rating-total pl-1"><span
                                                    class="mr-1 text-black">5.0</span>(20,230)</span>
                                        </span>
                                    </label>
                                </div>
                                <div class="custom-control custom-radio mb-1 fs-15">
                                    <input type="radio" class="custom-control-input" id="fourStarRating"
                                        name="radio-stacked" required>
                                    <label class="custom-control-label custom--control-label" for="fourStarRating">
                                        <span class="rating-wrap d-flex align-items-center">
                                            <span class="review-stars">
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                            </span>
                                            <span class="rating-total pl-1"><span class="mr-1 text-black">4.5 &
                                                    up</span>(10,230)</span>
                                        </span>
                                    </label>
                                </div>
                                <div class="custom-control custom-radio mb-1 fs-15">
                                    <input type="radio" class="custom-control-input" id="threeStarRating"
                                        name="radio-stacked" required>
                                    <label class="custom-control-label custom--control-label" for="threeStarRating">
                                        <span class="rating-wrap d-flex align-items-center">
                                            <span class="review-stars">
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                            </span>
                                            <span class="rating-total pl-1"><span class="mr-1 text-black">3.0 &
                                                    up</span>(7,230)</span>
                                        </span>
                                    </label>
                                </div>
                                <div class="custom-control custom-radio mb-1 fs-15">
                                    <input type="radio" class="custom-control-input" id="twoStarRating"
                                        name="radio-stacked" required>
                                    <label class="custom-control-label custom--control-label" for="twoStarRating">
                                        <span class="rating-wrap d-flex align-items-center">
                                            <span class="review-stars">
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                            </span>
                                            <span class="rating-total pl-1"><span class="mr-1 text-black">2.0 &
                                                    up</span>(5,230)</span>
                                        </span>
                                    </label>
                                </div>
                                <div class="custom-control custom-radio mb-1 fs-15">
                                    <input type="radio" class="custom-control-input" id="oneStarRating"
                                        name="radio-stacked" required>
                                    <label class="custom-control-label custom--control-label" for="oneStarRating">
                                        <span class="rating-wrap d-flex align-items-center">
                                            <span class="review-stars">
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                            </span>
                                            <span class="rating-total pl-1"><span class="mr-1 text-black">1.0 &
                                                    up</span>(3,230)</span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div><!-- end card -->

                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="card-title fs-18 pb-2">Danh Mục</h3>
                                <div class="divider"><span></span></div>
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="catCheckbox" required>
                                    <label class="custom-control-label custom--control-label text-black"
                                        for="catCheckbox">
                                        Business<span class="ml-1 text-gray">(12,300)</span>
                                    </label>
                                </div><!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="catCheckbox2" required>
                                    <label class="custom-control-label custom--control-label text-black"
                                        for="catCheckbox2">
                                        UI & UX<span class="ml-1 text-gray">(12,300)</span>
                                    </label>
                                </div><!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="catCheckbox3" required>
                                    <label class="custom-control-label custom--control-label text-black"
                                        for="catCheckbox3">
                                        Animation<span class="ml-1 text-gray">(12,300)</span>
                                    </label>
                                </div><!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="catCheckbox4" required>
                                    <label class="custom-control-label custom--control-label text-black"
                                        for="catCheckbox4">
                                        Game Design<span class="ml-1 text-gray">(12,300)</span>
                                    </label>
                                </div><!-- end custom-control -->
                                <div class="collapse" id="collapseMore">
                                    <div class="custom-control custom-checkbox mb-1 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="catCheckbox5" required>
                                        <label class="custom-control-label custom--control-label text-black"
                                            for="catCheckbox5">
                                            Graphic Design<span class="ml-1 text-gray">(12,300)</span>
                                        </label>
                                    </div><!-- end custom-control -->
                                    <div class="custom-control custom-checkbox mb-1 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="catCheckbox6" required>
                                        <label class="custom-control-label custom--control-label text-black"
                                            for="catCheckbox6">
                                            Typography<span class="ml-1 text-gray">(12,300)</span>
                                        </label>
                                    </div><!-- end custom-control -->
                                    <div class="custom-control custom-checkbox mb-1 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="catCheckbox7" required>
                                        <label class="custom-control-label custom--control-label text-black"
                                            for="catCheckbox7">
                                            Web Development<span class="ml-1 text-gray">(12,300)</span>
                                        </label>
                                    </div><!-- end custom-control -->
                                    <div class="custom-control custom-checkbox mb-1 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="catCheckbox8" required>
                                        <label class="custom-control-label custom--control-label text-black"
                                            for="catCheckbox8">
                                            Photography<span class="ml-1 text-gray">(12,300)</span>
                                        </label>
                                    </div><!-- end custom-control -->
                                    <div class="custom-control custom-checkbox mb-1 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="catCheckbox9" required>
                                        <label class="custom-control-label custom--control-label text-black"
                                            for="catCheckbox9">
                                            Finance<span class="ml-1 text-gray">(12,300)</span>
                                        </label>
                                    </div><!-- end custom-control -->
                                </div><!-- end collapse -->
                                <a class="collapse-btn collapse--btn fs-15" data-toggle="collapse" href="#collapseMore"
                                    role="button" aria-expanded="false" aria-controls="collapseMore">
                                    <span class="collapse-btn-hide">Show more<i
                                            class="la la-angle-down ml-1 fs-14"></i></span>
                                    <span class="collapse-btn-show">Show less<i
                                            class="la la-angle-up ml-1 fs-14"></i></span>
                                </a>
                            </div>
                        </div><!-- end card -->


                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="card-title fs-18 pb-2">Ngôn Ngữ</h3>
                                <div class="divider"><span></span></div>
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="lanCheckbox" required>
                                    <label class="custom-control-label custom--control-label text-black"
                                        for="lanCheckbox">
                                        English<span class="ml-1 text-gray">(12,300)</span>
                                    </label>
                                </div><!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="laCheckbox2" required>
                                    <label class="custom-control-label custom--control-label text-black"
                                        for="laCheckbox2">
                                        Português<span class="ml-1 text-gray">(12,300)</span>
                                    </label>
                                </div><!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="lanCheckbox3" required>
                                    <label class="custom-control-label custom--control-label text-black"
                                        for="lanCheckbox3">
                                        Español<span class="ml-1 text-gray">(12,300)</span>
                                    </label>
                                </div><!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="lanCheckbox4" required>
                                    <label class="custom-control-label custom--control-label text-black"
                                        for="lanCheckbox4">
                                        Türkçe<span class="ml-1 text-gray">(12,300)</span>
                                    </label>
                                </div><!-- end custom-control -->
                                <div class="collapse" id="collapseMoreTwo">
                                    <div class="custom-control custom-checkbox mb-1 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="lanCheckbox5" required>
                                        <label class="custom-control-label custom--control-label text-black"
                                            for="lanCheckbox5">
                                            Français<span class="ml-1 text-gray">(12,300)</span>
                                        </label>
                                    </div><!-- end custom-control -->
                                    <div class="custom-control custom-checkbox mb-1 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="lanCheckbox6" required>
                                        <label class="custom-control-label custom--control-label text-black"
                                            for="lanCheckbox6">
                                            中文<span class="ml-1 text-gray">(12,300)</span>
                                        </label>
                                    </div><!-- end custom-control -->
                                    <div class="custom-control custom-checkbox mb-1 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="lanCheckbox7" required>
                                        <label class="custom-control-label custom--control-label text-black"
                                            for="lanCheckbox7">
                                            Deutsch<span class="ml-1 text-gray">(12,300)</span>
                                        </label>
                                    </div><!-- end custom-control -->
                                    <div class="custom-control custom-checkbox mb-1 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="lanCheckbox8" required>
                                        <label class="custom-control-label custom--control-label text-black"
                                            for="lanCheckbox8">
                                            日本語<span class="ml-1 text-gray">(300)</span>
                                        </label>
                                    </div><!-- end custom-control -->
                                    <div class="custom-control custom-checkbox mb-1 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="lanCheckbox9" required>
                                        <label class="custom-control-label custom--control-label text-black"
                                            for="lanCheckbox9">
                                            Polski<span class="ml-1 text-gray">(300)</span>
                                        </label>
                                    </div><!-- end custom-control -->
                                </div><!-- end collapse -->
                                <a class="collapse-btn collapse--btn fs-15" data-toggle="collapse"
                                    href="#collapseMoreTwo" role="button" aria-expanded="false"
                                    aria-controls="collapseMoreTwo">
                                    <span class="collapse-btn-hide">Show more<i
                                            class="la la-angle-down ml-1 fs-14"></i></span>
                                    <span class="collapse-btn-show">Show less<i
                                            class="la la-angle-up ml-1 fs-14"></i></span>
                                </a>
                            </div>
                        </div><!-- end card -->

                    </div><!-- end sidebar -->
                </div><!-- end col-lg-4 -->
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6 responsive-column-half">
                            <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_1">
                                <div class="card-image">
                                    <a href="course-details.html" class="d-block">
                                        <img class="card-img-top lazy"
                                            src="{{ asset('frontend/images/img-loading.png') }}"
                                            data-src="{{ asset('frontend/images/img8.jpg') }}" alt="Card image cap">
                                    </a>
                                    <div class="course-badge-labels">
                                        <div class="course-badge">Bestseller</div>
                                        <div class="course-badge blue">-39%</div>
                                    </div>
                                </div><!-- end card-image -->
                                <div class="card-body">
                                    <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">All Levels</h6>
                                    <h5 class="card-title"><a href="course-details.html">The Business Intelligence Analyst
                                            Course 2021</a></h5>
                                    <p class="card-text"><a href="teacher-detail.html">Jose Portilla</a></p>
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
                                        <p class="card-price text-black font-weight-bold">12.99 <span
                                                class="before-price font-weight-medium">129.99</span></p>
                                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer"
                                            title="Add to Wishlist"><i class="la la-heart-o"></i></div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div><!-- end col-lg-6 -->
                        <div class="col-lg-6 responsive-column-half">
                            <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_1">
                                <div class="card-image">
                                    <a href="course-details.html" class="d-block">
                                        <img class="card-img-top lazy"
                                            src="{{ asset('frontend/images/img-loading.png') }}"
                                            data-src="{{ asset('frontend/images/img9.jpg') }}" alt="Card image cap">
                                    </a>
                                    <div class="course-badge-labels">
                                        <div class="course-badge red">Featured</div>
                                    </div>
                                </div><!-- end card-image -->
                                <div class="card-body">
                                    <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">All Levels</h6>
                                    <h5 class="card-title"><a href="course-details.html">The Business Intelligence Analyst
                                            Course 2021</a></h5>
                                    <p class="card-text"><a href="teacher-detail.html">Jose Portilla</a></p>
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
                                        <p class="card-price text-black font-weight-bold">129.99</p>
                                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer"
                                            title="Add to Wishlist"><i class="la la-heart-o"></i></div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div><!-- end col-lg-6 -->
                        <div class="col-lg-6 responsive-column-half">
                            <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_1">
                                <div class="card-image">
                                    <a href="course-details.html" class="d-block">
                                        <img class="card-img-top lazy"
                                            src="{{ asset('frontend/images/img-loading.png') }}"
                                            data-src="{{ asset('frontend/images/img10.jpg') }}" alt="Card image cap">
                                    </a>
                                </div><!-- end card-image -->
                                <div class="card-body">
                                    <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">All Levels</h6>
                                    <h5 class="card-title"><a href="course-details.html">The Business Intelligence Analyst
                                            Course 2021</a></h5>
                                    <p class="card-text"><a href="teacher-detail.html">Jose Portilla</a></p>
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
                                        <p class="card-price text-black font-weight-bold">129.99</p>
                                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer"
                                            title="Add to Wishlist"><i class="la la-heart-o"></i></div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div><!-- end col-lg-6 -->
                        <div class="col-lg-6 responsive-column-half">
                            <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_1">
                                <div class="card-image">
                                    <a href="course-details.html" class="d-block">
                                        <img class="card-img-top lazy"
                                            src="{{ asset('frontend/images/img-loading.png') }}"
                                            data-src="{{ asset('frontend/images/img11.jpg') }}" alt="Card image cap">
                                    </a>
                                </div><!-- end card-image -->
                                <div class="card-body">
                                    <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">All Levels</h6>
                                    <h5 class="card-title"><a href="course-details.html">The Business Intelligence Analyst
                                            Course 2021</a></h5>
                                    <p class="card-text"><a href="teacher-detail.html">Jose Portilla</a></p>
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
                                        <p class="card-price text-black font-weight-bold">129.99</p>
                                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer"
                                            title="Add to Wishlist"><i class="la la-heart-o"></i></div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div><!-- end col-lg-6 -->
                        <div class="col-lg-6 responsive-column-half">
                            <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_1">
                                <div class="card-image">
                                    <a href="course-details.html" class="d-block">
                                        <img class="card-img-top lazy"
                                            src="{{ asset('frontend/images/img-loading.png') }}"
                                            data-src="{{ asset('frontend/images/img12.jpg') }}" alt="Card image cap">
                                    </a>
                                    <div class="course-badge-labels">
                                        <div class="course-badge green">Free</div>
                                    </div>
                                </div><!-- end card-image -->
                                <div class="card-body">
                                    <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">All Levels</h6>
                                    <h5 class="card-title"><a href="course-details.html">The Business Intelligence Analyst
                                            Course 2021</a></h5>
                                    <p class="card-text"><a href="teacher-detail.html">Jose Portilla</a></p>
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
                                        <p class="card-price text-black font-weight-bold">Free</p>
                                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer"
                                            title="Add to Wishlist"><i class="la la-heart-o"></i></div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div><!-- end col-lg-6 -->
                        <div class="col-lg-6 responsive-column-half">
                            <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_1">
                                <div class="card-image">
                                    <a href="course-details.html" class="d-block">
                                        <img class="card-img-top lazy"
                                            src="{{ asset('frontend/images/img-loading.png') }}"
                                            data-src="{{ asset('frontend/images/img13.jpg') }}" alt="Card image cap">
                                    </a>
                                    <div class="course-badge-labels">
                                        <div class="course-badge sky-blue">Highest rated</div>
                                    </div>
                                </div><!-- end card-image -->
                                <div class="card-body">
                                    <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">All Levels</h6>
                                    <h5 class="card-title"><a href="course-details.html">The Business Intelligence Analyst
                                            Course 2021</a></h5>
                                    <p class="card-text"><a href="teacher-detail.html">Jose Portilla</a></p>
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
                                        <p class="card-price text-black font-weight-bold">129.99</p>
                                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer"
                                            title="Add to Wishlist"><i class="la la-heart-o"></i></div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div><!-- end col-lg-6 -->
                        <div class="col-lg-6 responsive-column-half">
                            <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_1">
                                <div class="card-image">
                                    <a href="course-details.html" class="d-block">
                                        <img class="card-img-top lazy"
                                            src="{{ asset('frontend/images/img-loading.png') }}"
                                            data-src="{{ asset('frontend/images/img10.jpg') }}" alt="Card image cap">
                                    </a>
                                </div><!-- end card-image -->
                                <div class="card-body">
                                    <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">All Levels</h6>
                                    <h5 class="card-title"><a href="course-details.html">The Business Intelligence Analyst
                                            Course 2021</a></h5>
                                    <p class="card-text"><a href="teacher-detail.html">Jose Portilla</a></p>
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
                                        <p class="card-price text-black font-weight-bold">129.99</p>
                                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer"
                                            title="Add to Wishlist"><i class="la la-heart-o"></i></div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div><!-- end col-lg-6 -->
                        <div class="col-lg-6 responsive-column-half">
                            <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_1">
                                <div class="card-image">
                                    <a href="course-details.html" class="d-block">
                                        <img class="card-img-top lazy"
                                            src="{{ asset('frontend/images/img-loading.png') }}"
                                            data-src="{{ asset('frontend/images/img11.jpg') }}" alt="Card image cap">
                                    </a>
                                </div><!-- end card-image -->
                                <div class="card-body">
                                    <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">All Levels</h6>
                                    <h5 class="card-title"><a href="course-details.html">The Business Intelligence Analyst
                                            Course 2021</a></h5>
                                    <p class="card-text"><a href="teacher-detail.html">Jose Portilla</a></p>
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
                                        <p class="card-price text-black font-weight-bold">129.99</p>
                                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer"
                                            title="Add to Wishlist"><i class="la la-heart-o"></i></div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div><!-- end col-lg-6 -->
                        <div class="col-lg-6 responsive-column-half">
                            <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_1">
                                <div class="card-image">
                                    <a href="course-details.html" class="d-block">
                                        <img class="card-img-top lazy"
                                            src="{{ asset('frontend/images/img-loading.png') }}"
                                            data-src="{{ asset('frontend/images/img12.jpg') }}" alt="Card image cap">
                                    </a>
                                    <div class="course-badge-labels">
                                        <div class="course-badge green">Free</div>
                                    </div>
                                </div><!-- end card-image -->
                                <div class="card-body">
                                    <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">All Levels</h6>
                                    <h5 class="card-title"><a href="course-details.html">The Business Intelligence Analyst
                                            Course 2021</a></h5>
                                    <p class="card-text"><a href="teacher-detail.html">Jose Portilla</a></p>
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
                                        <p class="card-price text-black font-weight-bold">Free</p>
                                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer"
                                            title="Add to Wishlist"><i class="la la-heart-o"></i></div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div><!-- end col-lg-6 -->
                        <div class="col-lg-6 responsive-column-half">
                            <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_1">
                                <div class="card-image">
                                    <a href="course-details.html" class="d-block">
                                        <img class="card-img-top lazy"
                                            src="{{ asset('frontend/images/img-loading.png') }}"
                                            data-src="{{ asset('frontend/images/img13.jpg') }}" alt="Card image cap">
                                    </a>
                                    <div class="course-badge-labels">
                                        <div class="course-badge sky-blue">Highest rated</div>
                                    </div>
                                </div><!-- end card-image -->
                                <div class="card-body">
                                    <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">All Levels</h6>
                                    <h5 class="card-title"><a href="course-details.html">The Business Intelligence Analyst
                                            Course 2021</a></h5>
                                    <p class="card-text"><a href="teacher-detail.html">Jose Portilla</a></p>
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
                                        <p class="card-price text-black font-weight-bold">129.99</p>
                                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer"
                                            title="Add to Wishlist"><i class="la la-heart-o"></i></div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div><!-- end col-lg-6 -->
                    </div><!-- end row -->
                    <div class="text-center pt-3">
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
                    </div>
                </div><!-- end col-lg-8 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection