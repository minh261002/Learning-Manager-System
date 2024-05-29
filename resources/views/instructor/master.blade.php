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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- Favicon -->
    <link rel="icon" sizes="16x16" href="{{ asset('frontend/img/favicon.svg') }}">

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/line-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!-- end inject -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!--Data Tables -->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
</head>

<body>

    <!--====================================== START HEADER AREA ======================================-->
    @include('instructor.components.header')
    <!--====================================== END HEADER AREA ======================================-->

    <!-- ================================ START DASHBOARD AREA ================================= -->
    <section class="dashboard-area">
        @include('instructor.components.sidebar')

        @yield('content')
    </section>
    <!-- ================================ END DASHBOARD AREA ================================= -->

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
    <script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/fancybox.js') }}"></script>
    <script src="{{ asset('frontend/js/chart.js') }}"></script>
    <script src="{{ asset('frontend/js/doughnut-chart.js') }}"></script>
    <script src="{{ asset('frontend/js/bar-chart.js') }}"></script>
    <script src="{{ asset('frontend/js/line-chart.js') }}"></script>
    <script src="{{ asset('frontend/js/datedropper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/emojionearea.min.js') }}"></script>
    <script src="{{ asset('frontend/js/animated-skills.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.MultiFile.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ asset('admin/assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('admin/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>

    <script src="{{ asset('admin/assets/js/page/modules-datatables.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
        // function checkNotifications() {
        //     $.ajax({
        //         url: "{{ route('notifications.get') }}",
        //         method: 'GET',
        //         success: function(response) {
        //             if (response.notifications.length > 0) {
        //                 response.notifications.forEach(function(notification) {
        //                     Toastify({
        //                         text: notification.data.message,
        //                         duration: 5000,
        //                         close: true,
        //                         gravity: "top",
        //                         position: 'right',
        //                         backgroundColor: "#2c3e50",
        //                         stopOnFocus: true,
        //                     }).showToast();
        //                 });
        //             }
        //         },
        //         error: function(xhr) {
        //             console.error(xhr.responseText);
        //         }
        //     });
        // }

        // setInterval(checkNotifications, 5000);

        // $(document).ready(function() {
        //     checkNotifications();
        // });

        //datatable
        $('#table').DataTable({
            'language': {
                'url': '{{ asset('lang/vi-vn.json') }}'
            },
        });

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
                        }
                    });
                }
            });
        });
    </script>

    @stack('scripts')
</body>

</html>
