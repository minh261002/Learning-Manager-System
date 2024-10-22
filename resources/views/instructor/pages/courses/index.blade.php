@extends('instructor.master')

@section('title', 'Quản Lý Khoá Học')

@section('content')
    <div class="dashboard-content-wrap mb-5">
        <div class="card">
            <div class="card-body shadow-sm">
                <div class="setting-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="fs-17 font-weight-semi-bold ">Quản Lý Khoá Học</h3>

                        <a href="{{ route('instructor.courses.create') }}" class="btn btn-sm btn-danger">Thêm Khoá Học</a>
                    </div>

                    <div class="table-responsive mt-5">
                        <table class="table mb-0 table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tên Khoá Học</th>
                                    <th>Giá</th>
                                    <th>Ngày Tạo</th>
                                    <th>Trạng Thái</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($courses as $course)
                                    <tr>
                                        <td>
                                            <img src="{{ asset($course->image) }}" alt="{{ $course->name }}"
                                                class="img-fluid" style="width: 100px; height: 50px; object-fit: cover">
                                        </td>
                                        <td>{{ $course->name }}</td>
                                        <td>
                                            @if ($course->price == 0)
                                                Miễn Phí
                                            @elseif ($course->discount > 0)
                                                <span class="text-danger font-weight-bold">
                                                    {{ number_format($course->price - ($course->price * $course->discount) / 100, 0, ',', '.') }}đ
                                                </span>
                                                <span class="text-muted d-block">
                                                    <del>{{ number_format($course->price, 0, ',', '.') }}đ</del>
                                                </span>
                                            @else
                                                <span class="text-danger font-weight-bold">
                                                    {{ number_format($course->price, 0, ',', '.') }}đ
                                                </span>
                                            @endif
                                        </td>

                                        <td>{{ $course->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            @if ($course->status == 1)
                                                <span class="badge badge-success">Đã Kích Hoạt</span>
                                            @elseif($course->status == 0)
                                                <span class="badge badge-warning">Chưa Kích Hoạt</span>
                                            @else
                                                <span class="badge badge-danger">Bị Từ Chối</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('instructor.courses.show', $course->slug) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="la la-eye"></i>
                                            </a>
                                            <a href="{{ route('instructor.courses.edit', $course->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="la la-edit"></i>
                                            </a>
                                            <a href="{{ route('instructor.courses.destroy', $course->id) }}"
                                                class="btn btn-sm btn-danger delete-item">
                                                <i class="la la-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
