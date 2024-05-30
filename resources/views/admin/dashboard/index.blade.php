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
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>
                                Bài Viết
                            </h4>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Đang Hoạt Động</h4>
                        </div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
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
                                                        id="customSwitch{{ $course->id }}" data-id="{{ $course->id }}"
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
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Statistics</h4>
                        <div class="card-header-action">
                            <div class="btn-group">
                                <a href="#" class="btn btn-primary">Week</a>
                                <a href="#" class="btn">Month</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart" height="182"></canvas>
                        <div class="statistic-details mt-sm-4">
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
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                <div class="card">

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
@endpush
