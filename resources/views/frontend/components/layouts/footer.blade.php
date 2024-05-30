<section class="footer-area pt-100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 responsive-column-half">
                <div class="footer-item">
                    <a href="index.html">
                        <img src="{{ $site->logo }}" alt="footer logo" class="footer__logo">
                    </a>
                    <ul class="generic-list-item pt-4">
                        <li><a href="tel:{{ $site->phone }}">{{ $site->phone }}</a></li>
                        <li><a href="mailto:{{ $site->email }}">{{ $site->email }}</a></li>
                        <li>{{ $site->address }}</li>
                    </ul>
                    <h3 class="fs-20 font-weight-semi-bold pt-4 pb-2">Liên Kết Mạng Xã Hội</h3>
                    <ul class="social-icons social-icons-styled">
                        <li class="mr-1"><a href="{{ $site->facebook }}" target="_blank" class="facebook-bg"><i
                                    class="la la-facebook"></i></a></li>
                        <li class="mr-1"><a href="{{ $site->behance }}" target="_blank" class="twitter-bg"><i
                                    class="la la-behance"></i></a></li>
                        <li class="mr-1"><a href="{{ $site->github }}" target="_blank" class="instagram-bg"><i
                                    class="la la-github"></i></a>
                        </li>
                        <li class="mr-1"><a href="{{ $site->linkedin }}" target="_blank"class="linkedin-bg"><i
                                    class="la la-linkedin"></i></a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column-half">
                <div class="footer-item">
                    <h3 class="fs-20 font-weight-semi-bold">Thông Tin</h3>
                    <span class="section-divider section--divider"></span>
                    <ul class="generic-list-item">
                        <li><a href="#">Về Chúng Tôi</a></li>
                        <li><a href="#">Liên Hệ</a></li>
                        <li><a href="#">Tham Gia Giảng Dạy</a></li>
                        <li><a href="#">Hỗ Trợ</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column-half">
                <div class="footer-item">
                    <h3 class="fs-20 font-weight-semi-bold">Khoá Học</h3>
                    <span class="section-divider section--divider"></span>
                    <ul class="generic-list-item">
                        <li><a href="#">Lập Trình Web</a></li>
                        <li><a href="#">Bảo Mật</a></li>
                        <li><a href="#">PHP </a></li>
                        <li><a href="#">Javascript</a></li>
                        <li><a href="#">Adobe Illustrator</a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column-half">
                <div class="footer-item">
                    <h3 class="fs-20 font-weight-semi-bold">Tải Xuống</h3>
                    <span class="section-divider section--divider"></span>
                    <div class="mobile-app">
                        <p class="pb-3 lh-24">Tải xuống ứng dụng di động của chúng tôi và học mọi lúc, mọi nơi.</p>
                        <a href="#" class="d-block mb-2 hover-s"><img
                                src="{{ asset('frontend/images/appstore.png') }}" alt="App store"
                                class="img-fluid"></a>
                        <a href="#" class="d-block hover-s"><img
                                src="{{ asset('frontend/images/googleplay.png') }}" alt="Google play store"
                                class="img-fluid"></a>
                    </div>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
    </div><!-- end container -->
    <div class="section-block"></div>
    <div class="copyright-content py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <p class="copy-desc">&copy; 2024 LearnHub. All Rights Reserved. </p>
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="d-flex flex-wrap align-items-center justify-content-end">
                        <ul class="generic-list-item d-flex flex-wrap align-items-center fs-14">
                            <li class="mr-3"><a href="terms-and-conditions.html">Terms & Conditions</a></li>
                            <li class="mr-3"><a href="privacy-policy.html">Privacy Policy</a></li>
                        </ul>
                        <div class="select-container select-container-sm">
                            <select class="select-container-select">
                                <option value="">Việt Nam</option>
                            </select>
                        </div>
                    </div>
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end copyright-content -->
</section>
