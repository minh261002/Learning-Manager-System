@extends('admin.master')

@section('title', 'Quản Trị Viên')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>
                                Đơn Hàng
                            </h4>
                        </div>
                        <div class="card-body">
                            {{ $totalOrder }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-dollar"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Doanh Thu</h4>
                        </div>
                        <div class="card-body">
                            {{ number_format($totalRevenue) }} VNĐ
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Người Hướng Dẫn</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalInstructor }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Khoá Học</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalCourse }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @if ($instructors->count() > 0)
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Bạn Có {{ $instructors->count() }} Tài Khoản Cần Xác Nhận</h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th>Tên</th>
                                            <th>Email</th>
                                            <th>Thời Gian</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($instructors as $key => $instructor)
                                            <tr>
                                                <td>{{ $instructor->name }}</td>
                                                <td>{{ $instructor->email }}</td>
                                                <td>{{ formatDate($instructor->created_at) }}</td>
                                                <td>

                                                    <a href="{{ route('admin.accounts.change-status') }}"
                                                        class="btn btn-danger cancel-user" data-id="{{ $instructor->id }}">
                                                        <i class="fas fa-xmark"></i>
                                                    </a>

                                                    <a href="{{ route('admin.accounts.change-status') }}"
                                                        class="btn btn-success confirm-user"
                                                        data-id="{{ $instructor->id }}">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Không có dữ liệu</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($courses->count() > 0)
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Bạn Có {{ $courses->count() }} Khoá Học Cần Xác Nhận</h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th>Ảnh</th>
                                            <th>Tên Khoá Học</th>
                                            <th>Người Hướng Dẫn</th>
                                            <th>Thời Gian</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($courses as $key => $course)
                                            <tr>
                                                <td>
                                                    <img src="{{ $course->image }}" alt="{{ $course->title }}"
                                                        class="img-fluid" style="width: 100px">
                                                </td>
                                                <td>{{ $course->name }}</td>
                                                <td>{{ $course->instructor->name }}</td>
                                                <td>{{ formatDate($course->created_at) }}</td>
                                                <td>
                                                    <a href="{{ route('admin.courses.change-status') }}"
                                                        class="btn btn-danger cancel-course" data-id="{{ $course->id }}">
                                                        <i class="fas fa-xmark"></i>
                                                    </a>

                                                    <a href="{{ route('admin.courses.change-status') }}"
                                                        class="btn btn-success confirm-course"
                                                        data-id="{{ $course->id }}">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                    {{-- <label class="custom-switch d-block mr-4">
                                                        <input type="checkbox" name="custom-switch-checkbox"
                                                            class="custom-switch-input change-status-course"
                                                            id="customSwitch{{ $course->id }}"
                                                            data-id="{{ $course->id }}"
                                                            {{ $course->status == 1 ? 'checked' : '' }}>
                                                        <span class="custom-switch-indicator"></span>
                                                    </label> --}}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Không có dữ liệu</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Thống Kê</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="statistical" height="182"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Người Dùng Mới</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled user-progress list-unstyled-border">
                            @foreach ($newUsers as $user)
                                <ul class="list-unstyled user-progress list-unstyled-border mb-4">
                                    <li class="media">
                                        <img alt="image" class="mr-3 rounded-circle" width="50"
                                            src="{{ $user->photo ?? asset('uploads/no_image.jpg') }}">
                                        <div class="media-body">
                                            <div class="media-title">{{ $user->name }}</div>
                                            <div class="text-muted">
                                                {{ formatDate($user->created_at) }}</div>
                                        </div>
                                    </li>
                                </ul>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $('body').on('click', '.cancel-user', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Thông báo!',
                text: 'Bạn không chấp nhận tài khoản này?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng Ý',
                cancelButtonText: 'Hủy',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'GET',
                        dataType: 'json',
                        url: '{{ route('admin.accounts.change-status') }}',
                        data: {
                            'status': 2,
                            'id': $(this).data('id'),
                        },
                        success: function(data) {
                            if (data.status == 'success') {
                                location.reload();
                            } else {
                                console.log(data)
                            }
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                }
            });
        });

        $('body').on('click', '.confirm-user', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Thông báo!',
                text: 'Xác nhận tài khoản này?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng Ý',
                cancelButtonText: 'Hủy',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'GET',
                        dataType: 'json',
                        url: '{{ route('admin.accounts.change-status') }}',
                        data: {
                            'status': 1,
                            'id': $(this).data('id'),
                        },
                        success: function(data) {
                            if (data.status == 'success') {
                                location.reload();
                            } else {
                                console.log(data)
                            }
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                }
            });
        });
    </script>


    <script>
        $('body').on('click', '.cancel-course', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Thông báo!',
                text: 'Từ chối xác thực khoá học này?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng Ý',
                cancelButtonText: 'Hủy',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'GET',
                        dataType: 'json',
                        url: this.href,
                        data: {
                            'status': 2,
                            'course_id': $(this).data('id'),
                        },
                        success: function(data) {
                            if (data.status == 'success') {
                                location.reload();
                            } else {
                                console.log(data)
                            }
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                }
            });
        })

        $('body').on('click', '.confirm-course', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Thông báo!',
                text: 'Xác nhận khoá học này?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng Ý',
                cancelButtonText: 'Hủy',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'GET',
                        dataType: 'json',
                        url: this.href,
                        data: {
                            'status': 1,
                            'course_id': $(this).data('id'),
                        },
                        success: function(data) {
                            if (data.status == 'success') {
                                location.reload();
                            } else {
                                console.log(data)
                            }
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                }
            });
        })
    </script>

    <script>
        $('statistical').ready(function() {
            var ctx = document.getElementById('statistical').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [
                        @foreach ($revenueByDay as $item)
                            '{{ $item->date }}',
                        @endforeach
                    ],
                    datasets: [{
                        label: 'Doanh Thu',
                        data: [
                            @foreach ($revenueByDay as $item)
                                {{ $item->total }},
                            @endforeach
                        ],
                        borderWidth: 5,
                        borderColor: '#ed5252',
                        backgroundColor: 'transparent',
                        pointBackgroundColor: '#fff',
                        pointBorderColor: '#ed5252',
                        pointRadius: 4,
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: true,
                                drawBorder: true,
                            },
                            ticks: {
                                beginAtZero: true,
                                stepSize: 500000,
                                callback: function(value, index, values) {
                                    return value.toLocaleString('vi-VN', {
                                        style: 'currency',
                                        currency: 'VND'
                                    });
                                }
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                color: '#fbfbfb',
                                lineWidth: 2
                            }
                        }]
                    },
                }
            });
        });
    </script>
@endpush
