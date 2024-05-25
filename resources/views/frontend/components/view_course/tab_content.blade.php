<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade" id="search" role="tabpanel" aria-labelledby="search-tab">
        <div class="search-course-wrap pt-40px">
            <form action="#" class="pb-5">
                <div class="input-group">
                    <input class="form-control form--control form--control-gray pl-3" type="text" name="search"
                        placeholder="Nhập nội dung . . .">
                    <div class="input-group-append">
                        <button class="btn theme-btn"><span class="la la-search"></span></button>
                    </div>
                </div>
            </form>
            <div class="search-results-message text-center">
                <h3 class="fs-24 font-weight-semi-bold pb-1">Tìm Kiếm</h3>
                <p>Tìm chú thích, bài giảng hoặc tài nguyên</p>
            </div>
        </div><!-- end search-course-wrap -->
    </div><!-- end tab-pane -->

    <div class="tab-pane fade" id="course-content" role="tabpanel" aria-labelledby="course-content-tab">
        <div class="mobile-course-menu pt-4">
            <div class="accordion generic-accordion generic--accordion" id="mobileCourseAccordionCourseExample">
                @foreach ($course as $item)
                    <div class="card">
                        <div class="card-header" id="mobileCourseHeadingOne">
                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                data-target="#mobileCourseCollapseOne" aria-expanded="true"
                                aria-controls="mobileCourseCollapseOne">
                                <i class="la la-angle-down"></i>
                                <i class="la la-angle-up"></i>
                                <span class="fs-15"> Section 1: Dive in and Discover After
                                    Effects</span>
                                <span class="course-duration">
                                    <span>1/5</span>
                                    <span>21min</span>
                                </span>
                            </button>
                        </div><!-- end card-header -->
                        <div id="mobileCourseCollapseOne" class="collapse show" aria-labelledby="mobileCourseHeadingOne"
                            data-parent="#mobileCourseAccordionCourseExample">
                            <div class="card-body p-0">
                                <ul class="curriculum-sidebar-list">
                                    <li class="course-item-link active">
                                        <div class="course-item-content-wrap">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="mobileCourseCheckbox" required>
                                                <label class="custom-control-label custom--control-label"
                                                    for="mobileCourseCheckbox"></label>
                                            </div><!-- end custom-control -->
                                            <div class="course-item-content">
                                                <h4 class="fs-15">1. Let's Have Fun -
                                                    Seriously!</h4>
                                                <div class="courser-item-meta-wrap">
                                                    <p class="course-item-meta"><i class="la la-play-circle"></i>2min
                                                    </p>
                                                </div>
                                            </div><!-- end course-item-content -->
                                        </div><!-- end course-item-content-wrap -->
                                    </li>
                                    <li class="course-item-link">
                                        <div class="course-item-content-wrap">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="mobileCourseCheckbox2" required>
                                                <label class="custom-control-label custom--control-label"
                                                    for="mobileCourseCheckbox2"></label>
                                            </div><!-- end custom-control -->
                                            <div class="course-item-content">
                                                <h4 class="fs-15">2. A simple concept to
                                                    get
                                                    ahead</h4>
                                                <div class="courser-item-meta-wrap">
                                                    <p class="course-item-meta"><i class="la la-play-circle"></i>2min
                                                    </p>
                                                </div>
                                            </div><!-- end course-item-content -->
                                        </div><!-- end course-item-content-wrap -->
                                    </li>
                                    <li class="course-item-link active-resource">
                                        <div class="course-item-content-wrap">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="mobileCourseCheckbox3" required>
                                                <label class="custom-control-label custom--control-label"
                                                    for="mobileCourseCheckbox3"></label>
                                            </div><!-- end custom-control -->
                                            <div class="course-item-content">
                                                <h4 class="fs-15">3. Download your Footage
                                                    for
                                                    your Quick Start</h4>
                                                <div class="courser-item-meta-wrap">
                                                    <p class="course-item-meta"><i class="la la-file"></i>2min</p>
                                                    <div class="generic-action-wrap">
                                                        <div class="dropdown">
                                                            <a class="btn theme-btn theme-btn-sm theme-btn-transparent mt-1 fs-14 font-weight-medium"
                                                                href="#" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <i class="la la-folder-open mr-1"></i>
                                                                Resources<i class="la la-angle-down ml-1"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="javascript:void(0)">
                                                                    Section-Footage.zip
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div><!-- end generic-action-wrap -->
                                                </div>
                                            </div><!-- end course-item-content -->
                                        </div><!-- end course-item-content-wrap -->
                                    </li>
                                    <li class="course-item-link">
                                        <div class="course-item-content-wrap">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="mobileCourseCheckbox4" required>
                                                <label class="custom-control-label custom--control-label"
                                                    for="mobileCourseCheckbox4"></label>
                                            </div><!-- end custom-control -->
                                            <div class="course-item-content">
                                                <h4 class="fs-15">4. Jump in and Animate
                                                    your
                                                    Character</h4>
                                                <div class="courser-item-meta-wrap">
                                                    <p class="course-item-meta"><i class="la la-play-circle"></i>2min
                                                    </p>
                                                </div>
                                            </div><!-- end course-item-content -->
                                        </div><!-- end course-item-content-wrap -->
                                    </li>
                                </ul>
                            </div><!-- end card-body -->
                        </div><!-- end collapse -->
                    </div><!-- end card -->
                @endforeach

            </div><!-- end accordion-->
        </div><!-- end mobile-course-menu -->
    </div><!-- end tab-pane -->

    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
        <div class="lecture-overview-wrap">
            <div class="lecture-overview-item">
                <h3 class="fs-24 font-weight-semi-bold pb-2">Thông Tin Khoá Học</h3>
                <p>
                    {!! $course->title !!}
                </p>
            </div><!-- end lecture-overview-item -->

            <div class="section-block"></div>
            <div class="lecture-overview-item">
                <div class="lecture-overview-stats-wrap d-flex">
                    <div class="lecture-overview-stats-item">
                        <h3 class="fs-16 font-weight-semi-bold pb-2">Đặc Trưng</h3>
                    </div><!-- end lecture-overview-stats-item -->
                    <div class="lecture-overview-stats-item">
                        <p>Có Sẵn Trên <a href="#" class="text-color hover-underline"> IOS </a> và <a
                                href="#" class="text-color hover-underline">Android</a></p>
                    </div><!-- end lecture-overview-stats-item -->
                </div><!-- end lecture-overview-stats-wrap -->
            </div><!-- end lecture-overview-item -->
            <div class="section-block"></div>
            <div class="lecture-overview-item">
                <div class="lecture-overview-stats-wrap d-flex">
                    <div class="lecture-overview-stats-item">
                        <h3 class="fs-16 font-weight-semi-bold pb-2">Mô Tả</h3>
                    </div><!-- end lecture-overview-stats-item -->
                    <div class="lecture-overview-stats-item lecture-overview-stats-wide-item lecture-description">
                        {!! $course->description !!}
                    </div><!-- end lecture-overview-stats-item -->
                </div><!-- end lecture-overview-stats-wrap -->
            </div><!-- end lecture-overview-item -->
            <div class="section-block"></div>
            <div class="lecture-overview-item">
                <div class="lecture-overview-stats-wrap d-flex ">
                    <div class="lecture-overview-stats-item">
                        <h3 class="fs-16 font-weight-semi-bold pb-2">Người Hướng Dẫn</h3>
                    </div><!-- end lecture-overview-stats-item -->
                    <div class="lecture-overview-stats-item lecture-overview-stats-wide-item">
                        <div class="media media-card align-items-center">
                            <a href="{{ route('info', $course->instructor->username) }}"
                                class="media-img d-block rounded-full avatar-md">
                                <img src="{{ $course->instructor->photo }}" alt="Instructor avatar"
                                    class="rounded-full">
                            </a>
                            <div class="media-body">
                                <h5><a href="{{ route('info', $course->instructor->username) }}">
                                        {{ $course->instructor->name }}
                                    </a></h5>
                                <span class="d-block lh-18 pt-2">
                                    {{ $course->instructor->sort_desc }}
                                </span>
                            </div>
                        </div>
                        <div class="lecture-owner-profile pt-4">
                            <ul class="social-icons social-icons-styled">
                                <li><a href="#" class="facebook-bg"><i class="la la-facebook"></i></a></li>
                                <li><a href="#" class="twitter-bg"><i class="la la-twitter"></i></a></li>
                                <li><a href="#" class="instagram-bg"><i class="la la-instagram"></i></a></li>
                                <li><a href="#" class="linkedin-bg"><i class="la la-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div><!-- end lecture-overview-stats-item -->
                </div><!-- end lecture-overview-stats-wrap -->
            </div><!-- end lecture-overview-item -->
        </div><!-- end lecture-overview-wrap -->
    </div><!-- end tab-pane -->

    <div class="tab-pane fade" id="question-and-ans" role="tabpanel" aria-labelledby="question-and-ans-tab">
        <div class="lecture-overview-wrap lecture-quest-wrap">
            <div class="new-question-wrap">
                <button class="btn theme-btn theme-btn-transparent back-to-question-btn"><i
                        class="la la-reply mr-1"></i>Back to all questions</button>
                <div class="new-question-body pt-40px">
                    <h3 class="fs-20 font-weight-semi-bold">My question relates to</h3>
                    <form action="#" class="pt-4">
                        <div class="custom-control-wrap">
                            <div class="custom-control custom-radio mb-3 pl-0">
                                <input type="radio" class="custom-control-input" id="courseContentRadio"
                                    name="radio-stacked" required>
                                <label class="custom-control-label custom--control-label custom--control-label-boxed"
                                    for="courseContentRadio">
                                    <span class="font-weight-semi-bold text-black d-block">Course
                                        content</span>
                                    <span class="d-block fs-14 lh-20">This might include
                                        comments, questions, tips, or projects to
                                        share</span>
                                </label>
                            </div>
                            <div class="custom-control custom-radio mb-3 pl-0">
                                <input type="radio" class="custom-control-input" id="somethingElseRadio"
                                    name="radio-stacked" required>
                                <label class="custom-control-label custom--control-label custom--control-label-boxed"
                                    for="somethingElseRadio">
                                    <span class="font-weight-semi-bold text-black d-block">Something
                                        else</span>
                                    <span class="d-block fs-14 lh-20">This might include
                                        questions about certificates, audio and video
                                        troubleshooting, or download issues</span>
                                </label>
                            </div>
                        </div>
                        <div class="btn-box text-center">
                            <button class="btn theme-btn w-100">Continue <i
                                    class="la la-arrow-right icon ml-1"></i></button>
                        </div>
                    </form>
                </div>
            </div><!-- end new-question-wrap -->
            <div class="replay-question-wrap">
                <button class="btn theme-btn theme-btn-transparent back-to-question-btn"><i
                        class="la la-reply mr-1"></i>Back to all questions</button>
                <div class="replay-question-body pt-30px">
                    <div class="question-list-item">
                        <div class="media media-card border-bottom border-bottom-gray py-4">
                            <div class="media-img rounded-full flex-shrink-0 avatar-sm">
                                <img class="rounded-full" src="images/small-avatar-1.jpg" alt="User image">
                            </div>
                            <div class="media-body">
                                <div class="d-flex justify-content-between">
                                    <div class="question-meta-content">
                                        <h5 class="fs-16 pb-1">I still did't get H264 after
                                            installing Quicktime. Please what do I do</h5>
                                        <p class="meta-tags fs-13">
                                            <a href="#">Alex Smith</a>
                                            <a href="#">Lecture 20</a>
                                            <span>3 hours ago</span>
                                        </p>
                                        <p class="fs-15 text-gray">
                                            Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit,
                                            sed do eiusmod tempor incididunt ut labore et
                                            dolore magna aliqua.
                                            Ut enim ad minim veniam, quis nostrud
                                            exercitation.
                                        </p>
                                    </div><!-- end question-meta-content -->
                                    <div class="question-upvote-action">
                                        <div class="number-upvotes pb-2 d-flex align-items-center generic-action-wrap">
                                            <span>1</span>
                                            <button type="button"><i class="la la-arrow-up"></i></button>
                                            <div class="dropdown">
                                                <button class="ml-0" type="button" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="la la-ellipsis-v"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                        data-target="#reportModal"><i class="la la-flag mr-1"></i>
                                                        Report abuse</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end question-upvote-action -->
                                </div>
                            </div><!-- end media-body -->
                        </div><!-- end media -->
                        <div
                            class="question-replay-separator-wrap d-flex align-items-center justify-content-between py-3">
                            <h4 class="fs-16 font-weight-semi-bold">1 Replay</h4>
                            <button class="btn swapping-btn text-gray font-weight-medium"
                                data-text-swap="Following replies" data-text-original="Follow replies">Follow
                                replies</button>
                        </div><!-- end question-replay-separator-wrap -->
                        <div class="section-block"></div>
                        <div class="question-answer-wrap">
                            <div class="media media-card mb-3 border-bottom border-bottom-gray py-4">
                                <div class="media-img rounded-full avatar-sm flex-shrink-0">
                                    <img src="images/small-avatar-2.jpg" alt="Instructor avatar"
                                        class="rounded-full">
                                </div><!-- end media-img -->
                                <div class="media-body">
                                    <h5 class="fs-16"><a href="#">David Luise</a>
                                    </h5>
                                    <span class="fs-14">3 years ago</span>
                                    <p class="pt-1 fs-15">Occaecati cupiditate non
                                        provident, similique sunt in culpa fuga.</p>
                                </div><!-- end media-body -->
                            </div><!-- end media -->
                            <div class="question-replay-input-wrap pt-20px">
                                <div class="question-replay-body">
                                    <h3 class="fs-16 font-weight-semi-bold">Add Replay</h3>
                                    <form method="post" class="pt-4">
                                        <div class="replay-action-bar">
                                            <div class="btn-group">
                                                <button class="btn" type="button" data-toggle="modal"
                                                    data-target="#insertLinkModal" title="Insert link"><i
                                                        class="la la-link"></i></button>
                                                <button class="btn" type="button" data-toggle="modal"
                                                    data-target="#uploadPhotoModal" title="Upload an image"><i
                                                        class="la la-photo"></i></button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control form--control pl-3" name="message" rows="4"
                                                placeholder="Write your response..."></textarea>
                                        </div>
                                        <div class="btn-box">
                                            <button class="btn theme-btn" type="submit">Add an answer <i
                                                    class="la la-arrow-right icon ml-1"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- end question-replay-input-wrap -->
                        </div><!-- end question-answer-wrap -->
                    </div><!-- end question-list-item -->
                </div><!-- end replay-question-body -->
            </div><!-- end replay-question-wrap -->
            <div class="question-overview-result-wrap">
                <div class="lecture-overview-item">
                    <form method="post">
                        <div class="input-group mb-3">
                            <input class="form-control form--control form--control-gray pl-3" type="text"
                                name="search" placeholder="Search all course questions">
                            <div class="input-group-append">
                                <button class="btn theme-btn"><i class="la la-search search-icon"></i></button>
                            </div>
                        </div>
                    </form>
                    <div class="question-overview-filter-wrap d-flex align-items-center">
                        <div class="question-overview-filter-item">
                            <div class="select-container w-100">
                                <select class="select-container-select">
                                    <option value="0">All lectures</option>
                                    <option value="1">Current lecture</option>
                                </select>
                            </div>
                        </div><!-- end question-overview-filter-item -->
                        <div class="question-overview-filter-item">
                            <div class="select-container w-100">
                                <select class="select-container-select">
                                    <option value="0">Sort by most recent</option>
                                    <option value="1">Sort by most upvoted</option>
                                    <option value="2">Sort by recommended</option>
                                </select>
                            </div>
                        </div><!-- end question-overview-filter-item -->
                        <div class="question-overview-filter-item">
                            <div class="generic-action-wrap">
                                <div class="dropdown">
                                    <a class="btn theme-btn theme-btn-transparent w-100" href="#"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Filter questions
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox fs-15">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="questionsCheckbox" required>
                                                <label class="custom-control-label custom--control-label"
                                                    for="questionsCheckbox">
                                                    Questions I'm following
                                                </label>
                                            </div><!-- end custom-control -->
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox fs-15">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="questionsCheckbox2" required>
                                                <label class="custom-control-label custom--control-label"
                                                    for="questionsCheckbox2">
                                                    Questions I asked
                                                </label>
                                            </div><!-- end custom-control -->
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="custom-control custom-checkbox fs-15">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="questionsCheckbox3" required>
                                                <label class="custom-control-label custom--control-label"
                                                    for="questionsCheckbox3">
                                                    Questions without responses
                                                </label>
                                            </div><!-- end custom-control -->
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end generic-action-wrap -->
                        </div><!-- end question-overview-filter-item -->
                    </div>
                </div><!-- end lecture-overview-item -->
                <div class="lecture-overview-item">
                    <div class="question-overview-result-header d-flex align-items-center justify-content-between">
                        <h3 class="fs-17 font-weight-semi-bold">30 questions in this course
                        </h3>
                        <button class="btn theme-btn theme-btn-sm theme-btn-transparent ask-new-question-btn">Ask
                            a new question</button>
                    </div>
                </div><!-- end lecture-overview-item -->
                <div class="section-block"></div>
                <div class="lecture-overview-item mt-0">
                    <div class="question-list-item">
                        <div class="media media-card border-bottom border-bottom-gray py-4 px-3">
                            <div class="media-img rounded-full flex-shrink-0 avatar-sm">
                                <img class="rounded-full" src="images/small-avatar-1.jpg" alt="User image">
                            </div>
                            <div class="media-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="question-meta-content">
                                        <a href="javascript:void(0)" class="d-block">
                                            <h5 class="fs-16 pb-1">I still did't get H264
                                                after installing Quicktime. Please what do I
                                                do</h5>
                                            <p class="text-truncate fs-15 text-gray">
                                                Lorem ipsum dolor sit amet, consectetur
                                                adipisicing elit,
                                                sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                                Ut enim ad minim veniam, quis nostrud
                                                exercitation.
                                            </p>
                                        </a>
                                    </div><!-- end question-meta-content -->
                                    <div class="question-upvote-action">
                                        <div class="number-upvotes pb-2 d-flex align-items-center">
                                            <span>1</span>
                                            <button type="button"><i class="la la-arrow-up"></i></button>
                                        </div>
                                        <div class="number-upvotes question-response d-flex align-items-center">
                                            <span>1</span>
                                            <button type="button" class="question-replay-btn"><i
                                                    class="la la-comments"></i></button>
                                        </div>
                                    </div><!-- end question-upvote-action -->
                                </div>
                                <p class="meta-tags pt-1 fs-13">
                                    <a href="#">Alex Smith</a>
                                    <a href="#">Lecture 20</a>
                                    <span>3 hours ago</span>
                                </p>
                            </div><!-- end media-body -->
                        </div><!-- end media -->
                        <div class="media media-card border-bottom border-bottom-gray py-4 px-3">
                            <div class="media-img rounded-full flex-shrink-0 avatar-sm">
                                <img class="rounded-full" src="images/small-avatar-2.jpg" alt="User image">
                            </div>
                            <div class="media-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="question-meta-content">
                                        <a href="javascript:void(0)" class="d-block">
                                            <h5 class="fs-16 pb-1">When i selected
                                                rectangle and placed it its create mask ? I
                                                cant solve this</h5>
                                            <p class="text-truncate fs-15 text-gray">
                                                Lorem ipsum dolor sit amet, consectetur
                                                adipisicing elit,
                                                sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                                Ut enim ad minim veniam, quis nostrud
                                                exercitation.
                                            </p>
                                        </a>
                                    </div><!-- end question-meta-content -->
                                    <div class="question-upvote-action">
                                        <div class="number-upvotes pb-2 d-flex align-items-center">
                                            <span>0</span>
                                            <button type="button"><i class="la la-arrow-up"></i></button>
                                        </div>
                                        <div class="number-upvotes question-response d-flex align-items-center">
                                            <span>0</span>
                                            <button type="button" class="question-replay-btn"><i
                                                    class="la la-comments"></i></button>
                                        </div>
                                    </div><!-- end question-upvote-action -->
                                </div>
                                <p class="meta-tags pt-1 fs-13">
                                    <a href="#">Alex Smith</a>
                                    <a href="#">Lecture 20</a>
                                    <span>3 hours ago</span>
                                </p>
                            </div><!-- end media-body -->
                        </div><!-- end media -->
                        <div class="media media-card border-bottom border-bottom-gray py-4 px-3">
                            <div class="media-img rounded-full flex-shrink-0 avatar-sm">
                                <img class="rounded-full" src="images/small-avatar-3.jpg" alt="User image">
                            </div>
                            <div class="media-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="question-meta-content">
                                        <a href="javascript:void(0)" class="d-block">
                                            <h5 class="fs-16 pb-1">Practice Activity</h5>
                                            <p class="text-truncate fs-15 text-gray">
                                                https://youtu.be/fzyAWYKh2pgg
                                            </p>
                                        </a>
                                    </div><!-- end question-meta-content -->
                                    <div class="question-upvote-action">
                                        <div class="number-upvotes pb-2 d-flex align-items-center">
                                            <span>0</span>
                                            <button type="button"><i class="la la-arrow-up"></i></button>
                                        </div>
                                        <div class="number-upvotes question-response d-flex align-items-center">
                                            <span>0</span>
                                            <button type="button" class="question-replay-btn"><i
                                                    class="la la-comments"></i></button>
                                        </div>
                                    </div><!-- end question-upvote-action -->
                                </div>
                                <p class="meta-tags pt-1 fs-13">
                                    <a href="#">Alex Smith</a>
                                    <a href="#">Lecture 20</a>
                                    <span>3 hours ago</span>
                                </p>
                            </div><!-- end media-body -->
                        </div><!-- end media -->
                        <div class="media media-card border-bottom border-bottom-gray py-4 px-3">
                            <div class="media-img rounded-full flex-shrink-0 avatar-sm">
                                <img class="rounded-full" src="images/small-avatar-4.jpg" alt="User image">
                            </div>
                            <div class="media-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="question-meta-content">
                                        <a href="javascript:void(0)" class="d-block">
                                            <h5 class="fs-16 pb-1">The walking man
                                                composition.</h5>
                                            <p class="text-truncate fs-15 text-gray">
                                                Lorem ipsum dolor sit amet, consectetur
                                                adipisicing elit,
                                                sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                                Ut enim ad minim veniam, quis nostrud
                                                exercitation.
                                            </p>
                                        </a>
                                    </div><!-- end question-meta-content -->
                                    <div class="question-upvote-action">
                                        <div class="number-upvotes pb-2 d-flex align-items-center">
                                            <span>0</span>
                                            <button type="button"><i class="la la-arrow-up"></i></button>
                                        </div>
                                        <div class="number-upvotes question-response d-flex align-items-center">
                                            <span>0</span>
                                            <button type="button" class="question-replay-btn"><i
                                                    class="la la-comments"></i></button>
                                        </div>
                                    </div><!-- end question-upvote-action -->
                                </div>
                                <p class="meta-tags pt-1 fs-13">
                                    <a href="#">Alex Smith</a>
                                    <a href="#">Lecture 20</a>
                                    <span>3 hours ago</span>
                                </p>
                            </div><!-- end media-body -->
                        </div><!-- end media -->
                        <div class="media media-card border-bottom border-bottom-gray py-4 px-3">
                            <div class="media-img rounded-full flex-shrink-0 avatar-sm">
                                <img class="rounded-full" src="images/small-avatar-5.jpg" alt="User image">
                            </div>
                            <div class="media-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="question-meta-content">
                                        <a href="javascript:void(0)" class="d-block">
                                            <h5 class="fs-16 pb-1">Record options</h5>
                                            <p class="text-truncate fs-15 text-gray">
                                                Lorem ipsum dolor sit amet, consectetur
                                                adipisicing elit,
                                                sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua.
                                                Ut enim ad minim veniam, quis nostrud
                                                exercitation.
                                            </p>
                                        </a>
                                    </div><!-- end question-meta-content -->
                                    <div class="question-upvote-action">
                                        <div class="number-upvotes pb-2 d-flex align-items-center">
                                            <span>0</span>
                                            <button type="button"><i class="la la-arrow-up"></i></button>
                                        </div>
                                        <div class="number-upvotes question-response d-flex align-items-center">
                                            <span>0</span>
                                            <button type="button" class="question-replay-btn"><i
                                                    class="la la-comments"></i></button>
                                        </div>
                                    </div><!-- end question-upvote-action -->
                                </div>
                                <p class="meta-tags pt-1 fs-13">
                                    <a href="#">Alex Smith</a>
                                    <a href="#">Lecture 20</a>
                                    <span>3 hours ago</span>
                                </p>
                            </div><!-- end media-body -->
                        </div><!-- end media -->
                    </div>
                    <div class="question-btn-box pt-35px text-center">
                        <button class="btn theme-btn theme-btn-transparent w-100" type="button">See More</button>
                    </div>
                </div><!-- end lecture-overview-item -->
            </div>
        </div>
    </div><!-- end tab-pane -->

    <div class="tab-pane fade" id="announcements" role="tabpanel" aria-labelledby="announcements-tab">
        <div class="lecture-overview-wrap lecture-announcement-wrap">
            <div class="lecture-overview-item">
                <div class="media media-card align-items-center">
                    <a href="teacher-detail.html" class="media-img d-block rounded-full avatar-md">
                        <img src="images/small-avatar-1.jpg" alt="Instructor avatar" class="rounded-full">
                    </a>
                    <div class="media-body">
                        <h5 class="pb-1"><a href="teacher-detail.html">Alex Smith</a>
                        </h5>
                        <div class="announcement-meta fs-15">
                            <span>Posted an announcement</span>
                            <span> · 3 years ago ·</span>
                            <a href="#" class="btn-text" data-toggle="modal" data-target="#reportModal"
                                title="Report abuse"><i class="la la-flag"></i></a>
                        </div>
                    </div>
                </div>
                <div class="lecture-owner-decription pt-4">
                    <h3 class="fs-19 font-weight-semi-bold pb-3">Important Q&A support</h3>
                    <p>Happy 2019 to everyone, thank you for being a student and all of your
                        support.</p>
                    <p><strong>Great job on enrolling and your current course progress. I
                            encourage you keep in pursuit of your dreams :)</strong></p>
                    <p>The whole lot. In my course After Effects Complete Course packed with
                        all Techniques and Methods (No Tricks and gimmicks).</p>
                    <p class="font-italic"><strong>Unfortunately this will result in
                            delayed responses by me in the Q&A section and to direct
                            messages. This is only for the next week and once back I will be
                            back to 100% .</strong></p>
                    <p>I will continue to do my best to respond to as many questions as
                        possible but only one person, regularly I spend 4-5 hours daily on
                        this and with over 440000 students as you can image that its a lot
                        of work.</p>
                    <p class="font-italic">Thank you once again for your understanding and
                        for all of the wonderful students who I have had an opportunity to
                        communicate with regularly and all of your encouragement.</p>
                    <p>Have an awesome day</p>
                    <p>Alex</p>
                </div>
                <div class="lecture-announcement-comment-wrap pt-4">
                    <div class="media media-card align-items-center">
                        <div class="media-img rounded-full avatar-sm flex-shrink-0">
                            <img src="images/small-avatar-1.jpg" alt="Instructor avatar" class="rounded-full">
                        </div><!-- end media-img -->
                        <div class="media-body">
                            <form action="#">
                                <div class="input-group">
                                    <input class="form-control form--control form--control-gray pl-3" type="text"
                                        name="search" placeholder="Enter your comment">
                                    <div class="input-group-append">
                                        <button class="btn theme-btn" type="button"><i
                                                class="la la-arrow-right"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- end media-body -->
                    </div><!-- end media -->
                    <div class="comments pt-40px">
                        <div class="media media-card mb-3 border-bottom border-bottom-gray pb-3">
                            <div class="media-img rounded-full avatar-sm flex-shrink-0">
                                <img src="images/small-avatar-2.jpg" alt="Instructor avatar" class="rounded-full">
                            </div><!-- end media-img -->
                            <div class="media-body">
                                <div class="announcement-meta fs-15 lh-20">
                                    <a href="#" class="text-color">Tony Olsson</a>
                                    <span> · 3 years ago ·</span>
                                    <a href="#" class="btn-text" data-toggle="modal"
                                        data-target="#reportModal" title="Report abuse"><i
                                            class="la la-flag"></i></a>
                                </div>
                                <p class="pt-1">Occaecati cupiditate non provident,
                                    similique sunt in culpa fuga.</p>
                            </div><!-- end media-body -->
                        </div><!-- end media -->
                        <div class="media media-card mb-3 border-bottom border-bottom-gray pb-3">
                            <div class="media-img rounded-full avatar-sm flex-shrink-0">
                                <img src="images/small-avatar-3.jpg" alt="Instructor avatar" class="rounded-full">
                            </div><!-- end media-img -->
                            <div class="media-body">
                                <div class="announcement-meta fs-15 lh-20">
                                    <a href="#" class="text-color">Eduard-Dan</a>
                                    <span> · 2 years ago ·</span>
                                    <a href="#" class="btn-text" data-toggle="modal"
                                        data-target="#reportModal" title="Report abuse"><i
                                            class="la la-flag"></i></a>
                                </div>
                                <p class="pt-1">Occaecati cupiditate non provident,
                                    similique sunt in culpa fuga.</p>
                            </div><!-- end media-body -->
                        </div><!-- end media -->
                    </div><!-- end comments -->
                </div><!-- end lecture-announcement-comment-wrap -->
            </div><!-- end lecture-overview-item -->
        </div>
    </div><!-- end tab-pane -->

</div><!-- end tab-content -->
