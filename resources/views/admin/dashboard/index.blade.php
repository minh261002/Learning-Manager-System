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
                                                    <label class="custom-switch d-block mr-4">
                                                        <input type="checkbox" name="custom-switch-checkbox"
                                                            class="custom-switch-input change-status-user"
                                                            id="customSwitch{{ $instructor->id }}"
                                                            {{ $instructor->status == 1 ? 'checked' : '' }}>
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>
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
                                                        class="img-fluid" style="width: 150px">
                                                </td>
                                                <td>{{ $course->title }}</td>
                                                <td>{{ $course->instructor->name }}</td>
                                                <td>{{ formatDate($course->created_at) }}</td>
                                                <<td>
                                                    <label class="custom-switch d-block mr-4">
                                                        <input type="checkbox" name="custom-switch-checkbox"
                                                            class="custom-switch-input change-status-course"
                                                            id="customSwitch{{ $course->id }}"
                                                            data-id="{{ $course->id }}"
                                                            {{ $course->status == 1 ? 'checked' : '' }}>
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>
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

                        {{-- <div class="statistic-details mt-sm-4">
                            <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>
                                    7%</span>
                                <div class="detail-value">$243</div>
                                <div class="detail-name">Today's Sales</div>
                            </div>
                            <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span>
                                    23%</span>
                                <div class="detail-value">$2,902</div>
                                <div class="detail-name">This Week's Sales</div>
                            </div>
                            <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-primary"><i
                                            class="fas fa-caret-up"></i></span>9%</span>
                                <div class="detail-value">$12,821</div>
                                <div class="detail-name">This Month's Sales</div>
                            </div>
                            <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-primary"><i
                                            class="fas fa-caret-up"></i></span>
                                    19%</span>
                                <div class="detail-value">$92,142</div>
                                <div class="detail-name">This Year's Sales</div>
                            </div>
                        </div> --}}
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
        $(document).ready(function() {
            $('body').on('click', '.change-status-user', function() {
                let id = $(this).attr('id').replace('customSwitch', '')
                let status = $(this).prop('checked') == true ? 1 : 0

                Swal.fire({
                    title: 'Thông Báo',
                    text: 'Xác nhận thay đổi trạng thái người dùng này?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Xác Nhận',
                    cancelButtonText: 'Hủy',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: '{{ route('admin.accounts.change-status') }}',
                            data: {
                                'status': status,
                                'id': id
                            },
                            success: function(data) {
                                location.reload()
                            }
                        })
                    } else {
                        $('#customSwitch' + id).prop('checked', !status)
                    }
                })
            })
        })
    </script>

    <script>
        $(document).ready(function() {
            $('.change-status-course').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var course_id = $(this).data('id');

                Swal.fire({
                    title: 'Thông báo!',
                    text: 'Xác nhận thay đổi trạng thái?',
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
                            url: '{{ route('admin.courses.change-status') }}',
                            data: {
                                'status': status,
                                'course_id': course_id,
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
                    } else {
                        //reset checkbox
                        $(this).prop('checked', !status);
                    }
                });
            });
        });
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
