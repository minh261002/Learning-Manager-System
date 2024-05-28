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
            @forelse ($sections as $section)
                <div class="accordion generic-accordion generic--accordion"
                    id="accordionCourseExample{{ $loop->index }}">
                    <div class="card">
                        <div class="card-header" id="heading{{ $loop->index }}">
                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                data-target="#collapse{{ $loop->index }}" aria-expanded="true"
                                aria-controls="collapse{{ $loop->index }}">
                                <i class="la la-angle-down"></i>
                                <i class="la la-angle-up"></i>
                                <span class="fs-15"> Phần {{ $loop->iteration }}:
                                    {{ $section->title }}</span>
                            </button>
                        </div><!-- end card-header -->

                        <div id="collapse{{ $loop->index }}" class="collapse"
                            aria-labelledby="heading{{ $loop->index }}"
                            data-parent="#accordionCourseExample{{ $loop->index }}">
                            <div class="card-body p-0">
                                <ul class="curriculum-sidebar-list">
                                    @forelse ($section->lectures as $lesson)
                                        <li class="course-item-link" data-video="{{ $lesson->video }}"
                                            data-id-lecture="{{ $lesson->id }}">
                                            <div class="course-item-content-wrap">
                                                <div class="course-item-content">
                                                    <h4 class="fs-15">{{ $lesson->title }}</h4>
                                                </div><!-- end course-item-content -->

                                                @if ($lesson->attachment)
                                                    <a class="btn btn-sm btn-outline-danger"
                                                        href="{{ $lesson->attachment }}" target="_blank"
                                                        id="downloadButton">
                                                        <i class="la la-download"></i> Tài Nguyên
                                                    </a>
                                                @endif
                                            </div>
                                        </li>
                                    @empty
                                        <li class="course-item-link">
                                            <div class="course-item-content-wrap">
                                                <div class="course-item-content">
                                                    <h4 class="fs-15">Chưa có nội dung</h4>
                                                </div>
                                            </div>
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">
                    Chưa có nội dung khóa học
                </div>
            @endforelse
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
                        class="la la-reply mr-1"></i>Quay Lại</button>
                <div class="new-question-body pt-40px">
                    <h3 class="fs-20 font-weight-semi-bold">Đặt Câu Hỏi</h3>
                    <form action="{{ route('question.create') }}" class="pt-4" id="form-add-question">
                        <input type="hidden" name="course_lecture_id" value="{{ $lesson->id }}">
                        <div class="mb-4">
                            <label for="question-title" class="fs-15 font-weight-semi-bold">Tiêu Đề</label>
                            <input type="text" name="title" id="question-title"
                                class="form-control form--control pl-15px" placeholder="Nhập tiêu đề">
                        </div>

                        <div class="mb-4">
                            <label for="question-content" class="fs-15 font-weight-semi-bold">Nội Dung</label>
                            <textarea id="question-content" name="content" class="form-control form--control pl-15px"
                                placeholder="Nhập nội dung" rows="5"></textarea>
                        </div>

                        <div class="btn-box text-center">
                            <button class="btn theme-btn w-100" type="submit">Gửi Câu Hỏi
                                <i class="la la-arrow-right icon ml-1"></i></button>
                        </div>
                    </form>
                </div>
            </div><!-- end new-question-wrap -->

            <div class="replay-question-wrap">
                <button class="btn theme-btn theme-btn-transparent back-to-question-btn"><i
                        class="la la-reply mr-1"></i>Quay Lại</button>
                <div class="replay-question-body pt-30px">
                    <div class="question-list-item" id="question-parent">
                        <div id="question-block"></div>
                        <div
                            class="question-replay-separator-wrap d-flex align-items-center justify-content-between py-3">
                            <h4 class="fs-16 font-weight-semi-bold">
                                Trả Lời
                            </h4>
                        </div><!-- end question-replay-separator-wrap -->
                        <div class="section-block"></div>

                        <div class="question-answer-wrap">
                            <div id="answer-block"></div>
                        </div><!-- end question-answer-wrap -->

                    </div><!-- end question-list-item -->
                </div><!-- end replay-question-body -->
            </div><!-- end replay-question-wrap -->

            <div class="question-overview-result-wrap">
                <div class="lecture-overview-item">
                    <div class="question-overview-result-header d-flex align-items-center justify-content-between">
                        <h3 class="fs-17 font-weight-semi-bold" id="heading-lecture-title"></h3>
                        <button class="btn theme-btn theme-btn-sm theme-btn-transparent ask-new-question-btn">
                            <i class="la la-plus"></i> Đặt câu hỏi mới
                        </button>
                    </div>
                </div><!-- end lecture-overview-item -->
                <div class="section-block"></div>
                <div class="lecture-overview-item mt-0">
                    <div class="question-list-item" id="question-list">
                    </div>

                </div><!-- end lecture-overview-item -->
            </div>
        </div>
    </div><!-- end tab-pane -->

</div><!-- end tab-content -->
