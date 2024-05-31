<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ env('APP_URL') }}" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>403 - Forbidden</title>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" sizes="16x16" href="{{ asset('frontend/img/favicon.svg') }}">

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/line-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/tooltipster.bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!-- end inject -->

    <style>
        .container-error {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;

        }
    </style>
</head>

<body>
    <!-- ================================
       START ERROR AREA
================================= -->
    <div class="container-error">
        <section class="error-area dot-bg overflow-hidden">
            <div class="container">
                <div class="col-lg-10 mx-auto">
                    <div class="error-content text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            fill="#000000" version="1.1" id="Layer_1" viewBox="0 0 512 512" xml:space="preserve">
                            <g>
                                <g>
                                    <path
                                        d="M302.297,209.702H155.233c-4.513,0-8.17,3.658-8.17,8.17s3.657,8.17,8.17,8.17h147.064c4.513,0,8.17-3.658,8.17-8.17    S306.811,209.702,302.297,209.702z" />
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path
                                        d="M285.528,253.277H89.873c-4.513,0-8.17,3.658-8.17,8.17v43.575c0,4.512,3.657,8.17,8.17,8.17h171.184    c4.513,0,8.17-3.658,8.17-8.17s-3.657-8.17-8.17-8.17H98.043v-27.234h187.485c4.513,0,8.17-3.658,8.17-8.17    S290.041,253.277,285.528,253.277z" />
                                </g>
                            </g>
                            <g>
                                <g>
                                    <circle cx="375.831" cy="84.425" r="8.17" />
                                </g>
                            </g>
                            <g>
                                <g>
                                    <circle cx="343.15" cy="84.425" r="8.17" />
                                </g>
                            </g>
                            <g>
                                <g>
                                    <circle cx="408.512" cy="84.425" r="8.17" />
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path
                                        d="M449.363,43.574H8.17c-2.167,0-4.244,0.861-5.778,2.393C0,48.36,0,49.918,0,55.719v350.068c0,4.512,3.657,8.17,8.17,8.17    h256.006c4.513,0,8.17-3.658,8.17-8.17s-3.658-8.17-8.17-8.17H16.34c0-35.953,0-181.914,0-272.341h424.852v95.326    c0,4.512,3.657,8.17,8.17,8.17s8.17-3.658,8.17-8.17V51.744C457.533,47.232,453.876,43.574,449.363,43.574z M294.127,108.936    H16.34c0-22.067,0-39.456,0-49.021h277.787V108.936z M441.191,108.936H310.468V59.915h130.724V108.936z" />
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path
                                        d="M430.298,319.284v-14.263c0-19.252-15.221-33.77-35.404-33.77c-19.522,0-35.404,15.883-35.404,35.404v12.63    c-12.497,1.107-22.332,11.628-22.332,24.408v50.111c0,13.516,10.996,24.511,24.511,24.511h66.451    c13.515,0,24.511-10.995,24.511-24.511v-50.111C452.63,330.912,442.795,320.391,430.298,319.284z M375.83,306.655    c0-10.512,8.553-19.064,19.064-19.064c11.047,0,19.064,7.33,19.064,17.43v14.162H375.83V306.655z M436.289,393.805    c0,4.506-3.665,8.17-8.17,8.17h-66.451c-4.506,0-8.17-3.665-8.17-8.17v-50.111c0-4.506,3.665-8.17,8.17-8.17h66.451    c4.506,0,8.17,3.665,8.17,8.17V393.805z" />
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path
                                        d="M394.893,352.409c-4.513,0-8.17,3.658-8.17,8.17v16.34c0,4.512,3.657,8.17,8.17,8.17s8.17-3.658,8.17-8.17v-16.34    C403.064,356.066,399.407,352.409,394.893,352.409z" />
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path
                                        d="M394.893,234.213c-64.572,0-117.107,52.534-117.107,117.107s52.535,117.107,117.107,117.107S512,415.893,512,351.319    S459.465,234.213,394.893,234.213z M394.893,452.086c-55.563,0-100.766-45.203-100.766-100.766    c0-55.563,45.203-100.766,100.766-100.766c55.563,0,100.766,45.203,100.766,100.766    C495.66,406.882,450.456,452.086,394.893,452.086z" />
                                </g>
                            </g>
                        </svg>
                        <div class="section-heading">
                            <h3 class="section__title pb-3">
                                Quyền Truy Cập Bị Từ Chối
                            </h3>
                            <p class="section__desc">
                                Bạn không được uỷ quyền truy cập nội dung này. Vui lòng quay lại trang chủ.
                            </p>
                        </div>
                        <div class="btn-box pt-30px">
                            <a href="{{ route('home') }}" class="btn theme-btn"><i class="la la-reply mr-1"></i> Quay
                                Lại </a>
                        </div>
                    </div><!-- end error-content -->
                </div><!-- end col-lg-7 -->
            </div><!-- end container -->
        </section><!-- end error-area -->
    </div>

    <!-- template js files -->
    <script src="{{ asset('frontend/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/isotope.js') }}"></script>
    <script src="{{ asset('frontend/js/waypoint.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/fancybox.js') }}"></script>
    <script src="{{ asset('frontend/js/datedropper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/emojionearea.min.js') }}"></script>
    <script src="{{ asset('frontend/js/tooltipster.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>
