@extends('instructor.master')

@section('title', $course->name)

@section('content')
    <div class="dashboard-content-wrap mb-5">
        {{-- header --}}
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-md-3">
                    <img src="{{ $course->image }}" class="img-fluid rounded-start"
                        style="width:100%; height:150px; object-fit:cover">
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

        @foreach ($course->section as $section)
            <div class="row border align-items-center">
                <div class="col-8">
                    <a class="nav-link fs-18" data-bs-toggle="collapse" href="#section{{ $section->id }}" role="button"
                        aria-expanded="false" aria-controls="section{{ $section->id }}">
                        {{ $section->title }}
                    </a>
                </div>

                <div class="col-2">
                    {{ $section->lectures->count() }} Bài Học
                </div>

                <div class="col-2">
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#addLecture{{ $section->id }}">
                        <i class="la la-plus fs-15"></i>
                    </button>

                    <a href="{{ route('instructor.course.section.delete', $section->id) }}"
                        class="btn btn-sm btn-danger delete-item">
                        <i class="la la-trash fs-15"></i>
                    </a>

                    @include('instructor.components.course.modal-add-lecture', [
                        'section' => $section,
                    ])
                </div>
            </div>

            <div class="collapse" id="section{{ $section->id }}">
                @foreach ($section->lectures as $lecture)
                    <div class="row align-items-center border ml-2">
                        <div class="col-8">
                            <a href="" class="nav-link">
                                {{ $lecture->title }}
                            </a>
                        </div>
                        <div class="col-2">
                            {!! $lecture->preview == 1
                                ? '<i class="la la-check text-success fs-20"></i>'
                                : '<i class="la la-ban text-danger fs-20"></i> ' !!}

                            {!! $lecture->attachment
                                ? '<a href="' . $lecture->attachment . '" ><i class="la la-download fs-20"  target="_blank"></i></a>'
                                : '' !!}
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editLecture{{ $lecture->id }}">
                                <i class="la la-edit fs-15"></i>
                            </button>

                            @include('instructor.components.course.modal-edit-lecture', [
                                'lecture' => $lecture,
                            ])

                            <a href="{{ route('instructor.course.lecture.delete', $lecture->id) }}"
                                class="btn btn-sm btn-danger delete-item">
                                <i class="la la-trash fs-15"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

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

@push('scripts')
@endpush
