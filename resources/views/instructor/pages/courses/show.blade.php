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

        {{-- <div class="card mb-3 mt-1 p-0"> --}}
        {{-- <div class="card-header" id="heading{{ $section->id }}">
                    <div class="row">
                        <h2 class="col-8 mb-0 ">
                            <a class="nav-link fs-15" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $section->id }}" aria-expanded="true"
                                aria-controls="collapse{{ $section->id }}">
                                {{ $section->title }}
                            </a>
                        </h2>

                        <p class="col-2">
                            {{ $section->lectures->count() }} Bài Học
                        </p>

                        <div class="col-2">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addLecture{{ $section->id }}">
                                <i class="la la-plus fs-15"></i>
                            </button>

                            <div class="modal fade" id="addLecture{{ $section->id }}" tabindex="-1"
                                aria-labelledby="addLectureLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <form class="modal-content" action="{{ route('instructor.course.lecture') }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addLectureLabel">Thêm Bài Học Mới</h5>
                                        </div>

                                        <div class="modal-body">
                                            <div class="alert alert-info">Mục: {{ $section->title }}</div>
                                            <input type="hidden" name="course_section_id" value="{{ $section->id }}">

                                            <div class="mb-4">
                                                <label for="lectureName" class="form-label">Tiêu Đề</label>
                                                <input type="text" class="form-control" name="name" id="lectureName">
                                            </div>

                                            <div class="mb-4">
                                                <video id="previewVideo" class="d-block mb-4" width="100%" height="320px"
                                                    controls></video>
                                                <div class="media-body file-upload-wrap file-upload-wrap-2">
                                                    <div class="MultiFile-wrap" id="MultiFile2">
                                                        <input type="file" name="video"
                                                            class="multi file-upload-input file-upload-input-video with-preview MultiFile-applied"
                                                            id="MultiFile2">
                                                        <div class="MultiFile-list" id="MultiFile2_list"></div>
                                                    </div>
                                                    <span class="file-upload-text"><i class="la la-video mr-2"></i>Chọn
                                                        Video</span>
                                                </div><!-- file-upload-wrap -->
                                            </div>

                                            <div class="mb-4">
                                                <label for="attachment" class="form-label">Tệp Đính Kèm</label>
                                                <input type="file" class="form-control" name="attachment"
                                                    id="attachment">
                                            </div>

                                            <div class="mb-4">
                                                <label for="preview">Tuỳ Chọn</label>
                                                <select name="type" id="type" class="form-control">
                                                    <option value="0">Không được xem trước</option>
                                                    <option value="1">Được xem trước</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-secondary"
                                                data-bs-dismiss="modal">Huỷ</button>
                                            <button type="submit" class="btn btn-sm btn-danger">Thêm Mới</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

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
                                                <input type="text" class="form-control" name="name"
                                                    id="sectionName" value="{{ $section->title }}">
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
                </div> --}}

        {{-- <div id="collapse{{ $section->id }}" class="collapse" aria-labelledby="heading{{ $section->id }}">
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($section->lectures as $lecture)
                            @endforeach
                        </ul>
                    </div>
                </div> --}}
        {{-- </div> --}}
        <div class="curriculum-content">
            <div id="accordion" class="generic-accordion">
                @forelse ($sections as $section)
                    <div class="card">
                        <div class="card-header" id="heading{{ $course->id }}-{{ $section->id }}">
                            <button class="btn btn-link d-flex align-items-center justify-content-between collapsed"
                                data-toggle="collapse" data-target="#collapse{{ $course->id }}-{{ $section->id }}"
                                aria-expanded="false" aria-controls="collapse{{ $course->id }}-{{ $section->id }}">
                                <i class="la la-plus"></i>
                                <i class="la la-minus"></i>
                                {{ $section->title }}
                                <span class="fs-15 text-gray font-weight-medium">
                                    {{ $section->lectures->count() }} Bài Học
                                </span>
                            </button>
                        </div><!-- end card-header -->

                        <div id="collapse{{ $course->id }}-{{ $section->id }}" class="collapse"
                            aria-labelledby="heading{{ $course->id }}-{{ $section->id }}" data-parent="#accordion"
                            style="">
                            <div class="card-body">
                                <ul class="generic-list-item">
                                    @foreach ($section->lectures as $lecture)
                                        <li>
                                            <a href="#"
                                                class="d-flex align-items-center justify-content-between text-color"
                                                data-toggle="modal" data-target="#previewLecture">

                                                <span>
                                                    <i class="la la-play-circle mr-1"></i>
                                                    {{ $lecture->title }}
                                                    <span class="ribbon ml-2 fs-13">Preview</span>
                                                </span>

                                                <span>
                                                    <i class="la la-clock-o mr-1"></i>
                                                    {{ formatTime($lecture->duration) }}
                                                </span>
                                            </a>
                                        </li>

                                        <div class="modal fade" id="previewLecture" tabindex="-1"
                                            aria-labelledby="previewLectureLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <video id="previewVideo" src="{{ $lecture->video }}"
                                                            class="d-block mb-4" width="100%" height="320px"
                                                            controls></video>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </ul>
                            </div><!-- end card-body -->
                        </div><!-- end collapse -->
                    </div><!-- end card -->
                @empty
                    <div class="alert alert-warning" role="alert">
                        Bạn Cần Thêm Mục Mới
                    </div>
                @endforelse
            </div><!-- end generic-accordion -->
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
    <script>
        $('.file-upload-input-video').on('change', function() {
            var file = $(this)[0].files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#previewVideo').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        });
    </script>
@endpush
