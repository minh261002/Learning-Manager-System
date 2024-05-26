<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $course->name }}</title>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" sizes="16x16" href="images/favicon.png">

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/line-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animated-headline.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/plyr.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-te-1.4.0.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!-- end inject -->
</head>

<body>

    <!--======================================
        START HEADER AREA
    ======================================-->
    @include('frontend.components.view_course.header')
    <!--======================================
        END HEADER AREA
======================================-->

    <!--======================================
        START COURSE-DASHBOARD
======================================-->
    <section class="course-dashboard">
        <div class="course-dashboard-wrap">
            <div class="course-dashboard-container d-flex">
                <div class="course-dashboard-column">

                    <div class="lecture-viewer-container">
                        <div class="lecture-video-item">
                            <video controls crossorigin playsinline id="player">
                                <source src="" />
                            </video>
                        </div>
                    </div>

                    <div class="lecture-video-detail">
                        <div class="lecture-tab-body bg-gray p-4">
                            @include('frontend.components.view_course.tab_header')
                        </div>

                        <div class="lecture-video-detail-body">
                            @include('frontend.components.view_course.tab_content')
                        </div>
                    </div>

                    @include('frontend.components.view_course.footer')

                </div>

                <div class="course-dashboard-sidebar-column h-100">
                    <button class="sidebar-open" type="button"><i class="la la-angle-left"></i> Nội Dung</button>
                    <div class="course-dashboard-sidebar-wrap custom-scrollbar-styled">

                        <div class="course-dashboard-side-heading d-flex align-items-center justify-content-between">
                            <h3 class="fs-18 font-weight-semi-bold">Nội Dung Khoá Học</h3>
                            <button class="sidebar-close" type="button"><i class="la la-times"></i></button>
                        </div>

                        <div class="course-dashboard-side-content">
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
                                                            data-id-lecture="{{ $lesson->id }}"
                                                            data-title-lecture="{{ $lesson->title }}">
                                                            <div class="course-item-content-wrap">
                                                                <div class="course-item-content">
                                                                    <h4 class="fs-15">{{ $lesson->title }}</h4>
                                                                </div><!-- end course-item-content -->
                                                                @if ($lesson->attachment)
                                                                    <a class="btn btn-sm btn-outline-danger"
                                                                        href="{{ $lesson->attachment }}"
                                                                        target="_blank" id="downloadButton">
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
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--======================================
        END COURSE-DASHBOARD
======================================-->

    <!-- start scroll top -->
    <div id="scroll-top">
        <i class="la la-arrow-up" title="Go top"></i>
    </div>
    <!-- end scroll top -->

    <!-- Modal -->
    <div class="modal fade modal-container" id="ratingModal" tabindex="-1" role="dialog"
        aria-labelledby="ratingModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-gray">
                    <div class="pr-2">
                        <h5 class="modal-title fs-19 font-weight-semi-bold lh-24" id="ratingModalTitle">
                            Đánh giá khóa học
                        </h5>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-times"></span>
                    </button>
                </div><!-- end modal-header -->
                <div class="modal-body text-center py-5">
                    <div class="leave-rating mt-5">
                        <input type="radio" name='rate' id="star5" />
                        <label for="star5" class="fs-45"></label>
                        <input type="radio" name='rate' id="star4" />
                        <label for="star4" class="fs-45"></label>
                        <input type="radio" name='rate' id="star3" />
                        <label for="star3" class="fs-45"></label>
                        <input type="radio" name='rate' id="star2" />
                        <label for="star2" class="fs-45"></label>
                        <input type="radio" name='rate' id="star1" />
                        <label for="star1" class="fs-45"></label>
                        <div class="rating-result-text fs-20 pb-4"></div>
                    </div><!-- end leave-rating -->
                </div><!-- end modal-body -->
            </div><!-- end modal-content -->
        </div><!-- end modal-dialog -->
    </div><!-- end modal -->

    <!-- Modal -->
    <div class="modal fade modal-container" id="shareModal" tabindex="-1" role="dialog"
        aria-labelledby="shareModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-gray">
                    <h5 class="modal-title fs-19 font-weight-semi-bold" id="shareModalTitle">Chia Sẻ Khoá Học</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-times"></span>
                    </button>
                </div><!-- end modal-header -->
                <div class="modal-body">
                    <div class="copy-to-clipboard">
                        <span class="success-message">Đã Sao Chép!</span>
                        <div class="input-group">
                            <input type="text" class="form-control form--control copy-input pl-3"
                                value="https://www.aduca.com/share/101WxMB0oac1hVQQ==/">
                            <div class="input-group-append">
                                <button class="btn theme-btn theme-btn-sm copy-btn shadow-none"><i
                                        class="la la-copy mr-1"></i> Sao Chép</button>
                            </div>
                        </div>
                    </div><!-- end copy-to-clipboard -->
                </div><!-- end modal-body -->
                <div class="modal-footer justify-content-center border-top-gray">
                    <ul class="social-icons social-icons-styled">
                        <li><a href="#" class="facebook-bg"><i class="la la-facebook"></i></a></li>
                        <li><a href="#" class="twitter-bg"><i class="la la-twitter"></i></a></li>
                        <li><a href="#" class="instagram-bg"><i class="la la-instagram"></i></a></li>
                    </ul>
                </div><!-- end modal-footer -->
            </div><!-- end modal-content-->
        </div><!-- end modal-dialog -->
    </div><!-- end modal -->

    <!-- template js files -->
    <script src="{{ asset('frontend/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/isotope.js') }}"></script>
    <script src="{{ asset('frontend/js/waypoint.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/fancybox.js') }}"></script>
    <script src="{{ asset('frontend/js/plyr.js') }}"></script>
    <script src="{{ asset('frontend/js/datedropper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/emojionearea.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-te-1.4.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.MultiFile.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script>
        $('document').ready(function() {
            const player = new Plyr('#player');

            let firstLinkClicked = false;

            document.querySelectorAll('.course-item-link').forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();

                    if (!firstLinkClicked) {
                        firstLinkClicked = true;
                    } else {
                        // Remove 'active' class from all links except the clicked one
                        document.querySelectorAll('.course-item-link').forEach(link => {
                            if (link !== this) {
                                link.classList.remove('active');
                            }
                        });
                    }
                    // Add 'active' class to the clicked link
                    this.classList.add('active');

                    const videoUrl = this.dataset.video;

                    let sourceConfig;

                    if (videoUrl.includes('youtube.com') || videoUrl.includes('youtu.be')) {
                        const videoId = extractYouTubeVideoId(videoUrl);
                        sourceConfig = {
                            type: 'video',
                            sources: [{
                                src: videoId,
                                provider: 'youtube'
                            }],
                            autoplay: true
                        };
                    } else {
                        sourceConfig = {
                            type: 'video',
                            sources: [{
                                src: videoUrl,
                                type: 'video/mp4'
                            }],
                            autoplay: true
                        };
                    }

                    player.source = sourceConfig;
                });
            });

            //hàm lấy video id từ youtube url
            function extractYouTubeVideoId(url) {
                const regex =
                    /(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
                const matches = url.match(regex);
                return matches ? matches[1] : null;
            }

        });

        $('#downloadButton').click(function() {
            var url = $(this).attr('href');
            window.open(url, '_blank');
        });

        $(document).ready(function() {
            $('.course-item-link').click(function() {
                let id = $(this).data('id-lecture');
                let title = $(this).data('title-lecture');
                $('#heading-lecture-title').text('Bài học: ' + title);
            });
        });

        $('#form-add-question').submit(function(e) {
            e.preventDefault();

            let form = $(this);
            let url = form.attr('action');
            let data = form.serialize();
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    course_lecture_id: form.find('input[name="course_lecture_id"]').val(),
                    title: form.find('input[name="title"]').val(),
                    question: form.find('textarea[name="content"]').val(),
                    instructor_id: {{ $course->instructor->id }}
                },
                success: function(response) {
                    if (response.status == 'success') {
                        form.trigger('reset');

                        $('.back-to-question-btn').click();

                        $('.course-item-link.active').click();
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        $('.course-item-link').click(function() {
            let id = $(this).data('id-lecture');

            let url = '{{ route('question.get-by-lecture') }}';

            $.ajax({
                url: url,
                method: 'GET',
                data: {
                    course_lecture_id: id
                },

                success: function(response) {
                    let html = '';

                    if (response.questions.length > 0) {
                        response.questions.forEach(function(question) {
                            html += `
                            <div class="media media-card border-bottom border-bottom-gray py-4 px-3">
                                <div class="media-img rounded-full flex-shrink-0 avatar-sm">
                                    <img class="rounded-full" src="${question.user.photo ?? "{{ asset('uploads/no_image.jpg') }}"}"
                                    style="width: 50px; height: 50px; object-fit:cover" alt="Image">
                                </div>
                                <div class="media-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="question-meta-content">
                                            <a href="javascript:void(0)" class="d-block">
                                                <h5 class="fs-16 pb-1">
                                                    ${question.title}
                                                </h5>
                                                <p class="text-truncate fs-15 text-gray">
                                                    ${question.question}
                                                </p>
                                            </a>
                                        </div>

                                        <div class="question-upvote-action">
                                            <div class="number-upvotes question-response d-flex align-items-center">
                                                <span>
                                                    ${question.answers.length ?? 0}
                                                </span>
                                                <button type="button" class="question-replay-btn"><i
                                                        class="la la-comments"></i></button>
                                            </div>
                                        </div><!-- end question-upvote-action -->
                                    </div>
                                    <p class="meta-tags pt-1 fs-13">
                                        <a href="#">
                                            ${question.user.name}
                                        </a>
                                        <span>
                                            ${question.created_at}
                                        </span>
                                    </p>
                                </div>
                            </div>
                            `;
                        });

                        $('#question-list').html(html);
                    } else {
                        html = '<div class="alert alert-info">Chưa có câu hỏi nào</div>';
                    }

                },

                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    $('#question-list').html(
                        '<div class="alert alert-danger">Đã xảy ra lỗi khi gửi yêu cầu.</div>'
                    );
                }
            });
        });
    </script>
</body>

</html>
