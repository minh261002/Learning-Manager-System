<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ env('APP_URL') }}">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/weather-icon/css/weather-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/weather-icon/css/weather-icons-wind.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/jquery-selectric/selectric.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!--Data Tables -->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>

    <link rel="stylesheet" href="{{ asset('admin/assets/modules/switchery/switchery.min.css') }}">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css">
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('admin.components.navbar')

            @include('admin.components.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2024 <div class="bullet"></div>
                    All Rights Reserved
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('admin/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('admin/assets/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!--select2-->
    <script src="{{ asset('admin/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('admin/assets/js/page/index-0.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom.js') }}"></script>

    <script src="{{ asset('admin/assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('admin/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>

    <script src="{{ asset('admin/assets/js/page/modules-datatables.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js">
    </script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                'language': {
                    'url': '{{ asset('lang/vi-vn.json') }}'
                },
            });
        })

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
            startDate: new Date()
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
