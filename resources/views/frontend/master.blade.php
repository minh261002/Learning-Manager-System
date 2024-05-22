<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ env('APP_URL') }}">

    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>

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
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!-- end inject -->
</head>

<body>
    {{-- <div class="preloader">
        <div class="loader">
            <svg class="spinner" viewBox="0 0 50 50">
                <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
            </svg>
        </div>
    </div> --}}

    <!--====================================== START HEADER AREA ======================================-->
    @include('frontend.components.layouts.header')
    <!--====================================== END HEADER AREA ======================================-->

    @yield('content')

    <!--===================================== START SUBSCRIBER AREA ======================================-->
    @include('frontend.components.layouts.subscriber')
    <!--===================================== END SUBSCRIBER AREA ======================================-->


    <!--====================================== START FOOTER AREA ======================================-->
    @include('frontend.components.layouts.footer')
    <!--====================================== END FOOTER AREA ======================================-->

    <!-- start scroll top -->
    <div id="scroll-top">
        <i class="la la-arrow-up" title="Go top"></i>
    </div>
    <!-- end scroll top -->

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
    <script src="{{ asset('frontend/js/jquery.lazy.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('body').on('click', '.delete-item', function(e) {
            e.preventDefault();
            let url = $(this).attr('href');
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa?',
                text: "Dữ liệu bị xóa sẽ không thể khôi phục lại được!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        method: 'DELETE',
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function(res) {
                            if (res.status == 'success') {
                                location.reload();
                            } else {
                                location.reload();
                                console.log(res.error)
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                }
            });
        });

        function addToCart(id) {
            $.ajax({
                url: "{{ route('cart.store') }}",
                type: 'POST',
                data: {
                    course_id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    console.log(data)
                    location.reload();
                },
                error: function(data) {
                    console.log(data);
                    alert('An error occurred. Please try again.');
                }
            });
        }

        function miniCart() {
            $.ajax({
                method: 'GET',
                url: '{{ route('cart.data') }}',
                dataType: 'json',
                success: function(response) {
                    var miniCart = ""
                    $.each(response.carts, function(key, value) {
                        miniCart += `<li class="media media-card">
                        <a href="" class="media-img">
                            <img src="${value.options.image}" alt="Cart image">
                        </a>
                        <div class="media-body">
                            <h5><a href="/course/${value.options.slug}"> ${value.name}</a></h5>
                             <span class="d-block fs-14">
                                ${value.price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')}VND
                            </span>
                        </div>
                    </li>
                    `
                    });
                    $('#miniCart').html(miniCart);
                    $("#cartQty").text(response.cartQty);
                }
            })
        }
        miniCart();
    </script>

    @stack('scripts')
</body>

</html>
