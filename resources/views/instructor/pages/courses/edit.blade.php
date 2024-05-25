@extends('instructor.master')

@section('title', $course->name)

@section('content')
    <div class="dashboard-content-wrap mb-5">
        <div class="card">
            <div class="card-body shadow-sm">
                <div class="setting-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="fs-17 font-weight-semi-bold ">Thêm Khoá Học Mới</h3>
                    </div>

                    <form action="{{ route('instructor.courses.update', $course->id) }}" class="row my-5" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-12 col-md-6 mb-4">
                            <img src="{{ $course->image }}" alt="preview" class="prv-img d-block mb-4"
                                style="width: 100%; height:320px; object-fit:cover">
                            <div class="media-body">
                                <div class="file-upload-wrap file-upload-wrap-2">
                                    <div class="MultiFile-wrap" id="MultiFile2">
                                        <input type="file" name="image"
                                            class="multi file-upload-input file-upload-input-image with-preview MultiFile-applied"
                                            id="MultiFile2">
                                        <div class="MultiFile-list" id="MultiFile2_list"></div>
                                    </div>
                                    <span class="file-upload-text"><i class="la la-photo mr-2"></i>Chọn Ảnh</span>
                                </div><!-- file-upload-wrap -->
                            </div>
                        </div>

                        <div class="col-12 col-md-6 mb-4  d-none" id="box-video">
                            <video id="previewVideo" class="d-block mb-4" width="100%" height="320px" controls></video>

                            <div class="d-flex">
                                <div class="media-body file-upload-wrap file-upload-wrap-2" id="uploadVideo">
                                    <div class="MultiFile-wrap" id="MultiFile2">
                                        <input type="file" name="video"
                                            class="multi file-upload-input file-upload-input-video with-preview MultiFile-applied"
                                            id="MultiFile2">
                                        <div class="MultiFile-list" id="MultiFile2_list"></div>
                                    </div>

                                    <span class="file-upload-text"><i class="la la-video mr-2"></i>Chọn Video</span>
                                </div>

                                <div class="mt-4">
                                    <a href="javascript:void(0)" id="uploadLink">Tải Lên Link Video</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 mb-4" id="box-link">
                            <div>
                                <label for="video_url">Link Video</label>
                                <input type="text" class="form-control form--control pl-15px" id="video_url"
                                    name="video_url" value="{{ $course->video }}">
                                @error('video_url')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <a href="javascript:void(0)" id="uploadVid">Tải Lên Video</a>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                            <label for="name">Tên Khoá Học</label>
                            <input type="text" class="form-control form--control pl-15px" id="name" name="name"
                                value="{{ $course->name }}">

                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6 mb-4">
                            <label for="category_id">Danh Mục</label>
                            <select name="category_id" id="category_id" class="form-control select2">
                                <option value="">Chọn Danh Mục</option>
                                @php
                                    echo categoryMultiLevelOption($categories, 0, '', null, $course->category_id);
                                @endphp
                            </select>
                        </div>

                        <div class="col-12 mb-4">
                            <label for="title">Tiêu Đề</label>
                            <textarea name="title" id="title" class="form-control form--control pl-15px">{{ $course->title }}</textarea>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 mb-4">
                            <label for="language">Ngôn Ngữ</label>
                            <select name="language" id="language" class="form-control select2">
                                <option value="">Chọn Ngôn Ngữ</option>
                                <option value="vi" {{ $course->language == 'vi' ? 'selected' : '' }}>Tiếng Việt
                                </option>
                                <option value="en" {{ $course->language == 'en' ? 'selected' : '' }}>Tiếng Anh</option>
                            </select>
                        </div>

                        <div class="col-12 col-md-6 mb-4">
                            <label for="price">Giá</label>
                            <input type="text" class="form-control form--control pl-15px" id="price" name="price"
                                value="{{ $course->price }}">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6 mb-4">
                            <label for="discount">Giảm Giá (%)</label>
                            <input type="text" class="form-control form--control pl-15px" id="discount"
                                name="discount" value="{{ $course->discount }}">
                            @error('discount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 mb-4">
                            <label for="description">Mô Tả</label>
                            <textarea name="description" id="description" class="form-control">{{ $course->description }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 mb-4">
                            <label for="prerequisites">Điều Kiện Tham Gia Khoá Học</label>
                            <textarea name="prerequisites" id="prerequisites" class="form-control">{{ $course->prerequisites }}</textarea>
                            @error('prerequisites')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 mb-4">
                            <label for="">Kết Quả Đạt Được</label>
                            <textarea name="outcomes" id="outcome" class="form-control">{{ $course->outcomes }}</textarea>
                            @error('outcome')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-danger">Lưu Thay Đổi</button>
                            <a href="{{ route('instructor.courses.index') }}" class="btn btn-secondary">Quay Lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2();

            //ckeditor
            ClassicEditor
                .create(document.querySelector('#description')).catch(error => {
                    console.error(error);
                });

            ClassicEditor
                .create(document.querySelector('#prerequisites')).catch(error => {
                    console.error(error);
                });

            ClassicEditor
                .create(document.querySelector('#outcome')).catch(error => {
                    console.error(error);
                });

            //preview video
            $('.file-upload-input-video').on('change', function() {
                var file = $(this)[0].files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewVideo').attr('src', e.target.result);
                }
                reader.readAsDataURL(file);
            });

            //preview image
            $('.file-upload-input-image').on('change', function() {
                var file = $(this)[0].files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.prv-img').attr('src', e.target.result);
                }
                reader.readAsDataURL(file);
            });

            //upload video
            $('#uploadVid').on('click', function() {
                $('#box-link').addClass('d-none');
                $('#box-video').removeClass('d-none');
            });

            //upload link
            $('#uploadLink').on('click', function() {
                $('#box-video').addClass('d-none');
                $('#box-link').removeClass('d-none');
            });

            $('form').submit(function() {
                $(this).find('button[type="submit"]').attr('disabled', true);
                $(this).find('button[type="submit"]').html(
                    '<i class="fa fa-spinner fa-spin"></i> Đang Xử Lý');
            });
        });
    </script>
@endpush
