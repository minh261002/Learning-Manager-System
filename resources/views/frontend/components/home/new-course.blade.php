<section class="course-area pb-120px">
    <div class="container">
        <div class="section-heading text-center">
            <h5 class="ribbon ribbon-lg mb-2">Chọn Khoá Học</h5>
            <h2 class="section__title">Khoá Học Mới</h2>
            <span class="section-divider"></span>
        </div><!-- end section-heading -->
    </div><!-- end container -->
    <div class="card-content-wrapper bg-gray pt-50px pb-50px">
        <div class="container">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="business" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row">
                        @php
                            echo renderBoxCoursesHome($newCourses);
                        @endphp
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="btn-box text-center mt-4">
                        <a href="{{ route('courses') }}" class="theme-btn">Xem Thêm
                            <i class="la la-angle-right"></i>
                        </a>
                    </div><!-- end btn-box -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div>
</section>
