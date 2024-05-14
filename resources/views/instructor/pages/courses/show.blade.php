@extends('instructor.master')

@section('title', $course->name)

@section('content')
    <div class="dashboard-content-wrap mb-5">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-3">
                    <img src="{{ $course->image }}" class="img-fluid rounded-start">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->name }}</h5>
                        <p class="card-text">{{ $course->title }}</p>

                        <p class="card-text">
                            <small class="text-muted fs-14">
                                <i class="la la-clock-o"></i>
                                {{ $course->created_at->format('d/m/Y') }}
                            </small>
                        </p>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="card-body">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#addSection">
                            Thêm Mục Mới
                        </button>
                    </div>
                </div>
            </div>
        </div>

        @forelse ($sections as $section)
            <div class="card mb-3 mt-1 p-0">
                <div class="card-header" id="heading{{ $section->id }}">
                    <div class="row">
                        <h2 class="col-8 mb-0 ">
                            <a class="nav-link fs-15" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $section->id }}" aria-expanded="true"
                                aria-controls="collapse{{ $section->id }}">
                                {{ $section->title }}
                            </a>
                        </h2>

                        <p class="col-2">
                            {{ $section->lessons ? $section->lessons->count() : 0 }} Bài Học
                        </p>

                        <div class="col-2">
                            <button class="btn btn-sm btn-primary">
                                <i class="la la-plus fs-15"></i>
                            </button>

                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#editSection{{ $section->id }}" data-section-id="{{ $section->id }}"
                                data-section-title="{{ $section->title }}">
                                <i class="la la-edit fs-15"></i>
                            </button>

                            <div class="modal fade" id="editSection{{ $section->id }}" tabindex="-1"
                                aria-labelledby="editSectionLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form class="modal-content" method="POST"
                                        action="{{ route('instructor.course.section.update', $section->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editSectionLabel">Chỉnh Sửa</h5>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                                            <div class="mb-3">
                                                <label for="sectionName" class="form-label">Tên Mục</label>
                                                <input type="text" class="form-control" name="name" id="sectionName"
                                                    value="{{ $section->title }}">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-secondary"
                                                data-bs-dismiss="modal">Huỷ</button>
                                            <button type="submit" class="btn btn-sm btn-danger">Cập Nhật</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <a href="{{ route('instructor.course.section.delete', $section->id) }}"
                                class="btn btn-sm btn-danger delete-item">
                                <i class="la la-trash fs-15"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div id="collapse{{ $section->id }}" class="collapse" aria-labelledby="heading{{ $section->id }}">
                    <div class="card-body">
                        <ul class="list-group">
                            {{-- @foreach ($section->lessons as $lesson)
                                <li class="list-group list-group-item d-flex justify-content-between align-items-center">
                                    {{ $lesson->name }}
                                    <span class="badge bg-primary rounded-pill">14:00</span>
                                </li>
                            @endforeach --}}
                        </ul>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-warning" role="alert">
                Bạn Cần Thêm Mục Mới
            </div>
        @endforelse
    </div>

    <div class="modal fade" id="addSection" tabindex="-1" aria-labelledby="addSectionLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('instructor.course.section') }}" method="POST">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="addSectionLabel">Thêm Mục Mới</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                    <div class="mb-3">
                        <label for="sectionName" class="form-label">Tên Mục</label>
                        <input type="text" class="form-control" name="name" id="sectionName">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                    <button type="submit" class="btn btn-sm btn-danger">Thêm Mới</button>
                </div>
            </form>
        </div>
    </div>

@endsection
