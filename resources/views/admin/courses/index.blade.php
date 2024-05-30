@extends('admin.master')

@section('title', 'Quản Lý Khoá Học')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Quản Lý Khoá Học</h1>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Danh Sách Khoá Học</h4>
                </div>

                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->status == null ? 'active' : '' }}" aria-current="page"
                                href="{{ route('admin.courses.index') }}">Xem Tất Cả</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->status == '1' ? 'active' : '' }}"
                                href="{{ route('admin.courses.index', ['status' => '1']) }}">Đã Kích Hoạt</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->status == '0' ? 'active' : '' }}"
                                href="{{ route('admin.courses.index', ['status' => '0']) }}">Chưa Kích Hoạt</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table">
                            <thead>
                                <th>Ảnh</th>
                                <th>Tên Khoá Học</th>
                                <th>Danh Mục</th>
                                <th>Người Hướng Dẫn</th>
                                <th>Giá</th>
                                <th>Trạng Thái</th>
                                <th>Thao Tác</th>
                            </thead>

                            <tbody>
                                @foreach ($courses as $course)
                                    <tr>
                                        <td>
                                            <img src="{{ $course->image }}" alt="{{ $course->name }}" width="100">
                                        </td>
                                        <td>{{ $course->name }}</td>
                                        <td>{{ $course->category->name }}</td>
                                        <td>{{ $course->instructor->name }}</td>
                                        <td class="d-flex align-items-center">
                                            {{-- {{ number_format($course->price) }} VND --}}
                                            @if ($course->price == 0)
                                                Miễn Phí
                                            @else
                                                @if ($course->discount > 0)
                                                    {{ number_format($course->price - ($course->price * $course->discount) / 100) }}
                                                    VND
                                                    <span
                                                        class="badge badge-danger d-block ml-3">-{{ $course->discount }}%</span>
                                                @else
                                                    {{ number_format($course->price) }} VND
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            <label class="custom-switch d-block mr-4">
                                                <input type="checkbox" name="custom-switch-checkbox"
                                                    class="custom-switch-input change-status"
                                                    id="customSwitch{{ $course->id }}" data-id="{{ $course->id }}"
                                                    {{ $course->status == 1 ? 'checked' : '' }}>
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.courses.show', $course->slug) }}"
                                                class="btn btn-sm btn-info">Xem Chi Tiết</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.change-status').change(function() {
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
