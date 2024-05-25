<div class="modal fade" id="addLecture{{ $section->id }}" tabindex="-1" aria-labelledby="addLectureLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" action="{{ route('instructor.course.lecture') }}" method="POST" id="form-add"
            enctype="multipart/form-data">
            @csrf

            <div class="modal-header">
                <h5 class="modal-title" id="addLectureLabel">Thêm Bài Học Mới</h5>
            </div>

            <div class="modal-body">
                <div class="alert alert-info">
                    {{ $section->title }}
                </div>

                <input type="hidden" name="course_section_id" value="{{ $section->id }}">

                <div class="mb-3">
                    <label for="lectureTitle" class="form-label"> Tiêu Đề Bài Học </label>
                    <input type="text" class="form-control form--control pl-15px" name="title" id="lectureTitle">
                </div>

                <div class="mb-3" id="link">
                    <label for="link">Video Bài Học</label>
                    <input type="text" class="form-control" name="link_video" placeholder="Nhập Link">
                    <a href="javascipt:void(0)">Tải Video Lên</a>
                </div>

                <div class="mb-3 d-none" id="video">
                    <label for="lectureVideo" class="form-label">Video Bài Học</label>
                    <input type="file" class="form-control file-upload-input-video" name="video" id="lectureVideo">
                    <video id="previewVideo" class="mt-3" style="width:100%; height:400px; object-fit:cover"
                        controls></video>
                    <a href="javascipt:void(0)" class="mt-3">Nhập Link</a>
                </div>

                <div class="mb-3" id="link-attachment">
                    <label for="link">Tài Liệu Bài Học</label>
                    <input type="text" class="form-control" name="link_attachment" placeholder="Nhập Link">
                    <a href="javascipt:void(0)">Tải Tài Liệu Lên</a>
                </div>

                <div class="mb-3 d-none" id="attachment">
                    <label for="lectureAttachment" class="form-label">Tài Liệu Bài Học</label>
                    <input type="file" class="form-control file-upload-input-video" name="attachment"
                        id="lectureAttachment">

                    <a href="javascipt:void(0)" class="mt-3">Nhập Link</a>
                </div>

                <div class="mb-3">
                    <label for="preview">Tuỳ Chọn</label>
                    <select class="form-control form--control pl-15px" name="preview" id="preview">
                        <option value="0">Không Được Xem Trước</option>
                        <option value="1">Được Xem Trước</option>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                <button type="submit" class="btn btn-sm btn-danger">Thêm Mới</button>
            </div>
        </form>
    </div>
</div>

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

        $('#link a').on('click', function() {
            $('#link').addClass('d-none');
            $('#video').removeClass('d-none');
        });

        $('#video a').on('click', function() {
            $('#video').addClass('d-none');
            $('#link').removeClass('d-none');
        });

        $('#link-attachment a').on('click', function() {
            $('#link-attachment').addClass('d-none');
            $('#attachment').removeClass('d-none');
        });

        $('#attachment a').on('click', function() {
            $('#attachment').addClass('d-none');
            $('#link-attachment').removeClass('d-none');
        });

        //submit loading
        $('#form-add').on('submit', function() {
            $(this).find('button[type="submit"]').attr('disabled', true).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Đang Tải ...'
            );
        });
    </script>
@endpush
