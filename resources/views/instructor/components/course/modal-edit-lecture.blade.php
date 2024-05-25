<div class="modal fade" id="editLecture{{ $lecture->id }}" tabindex="-1" aria-labelledby="editLectureLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" action="{{ route('instructor.course.lecture.update', $lecture->id) }}" method="POST"
            id="form-edit" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title" id="editLectureLabel">Chỉnh Sửa Thông Tin</h5>
            </div>

            <div class="modal-body">

                <div class="mb-3">
                    <label for="lectureTitle" class="form-label"> Tiêu Đề Bài Học </label>
                    <input type="text" class="form-control form--control pl-15px" name="title"
                        value="{{ $lecture->title }}">
                </div>

                <div class="mb-3" id="link_video_edit">
                    <label for="link">Video Bài Học</label>
                    <input type="text" class="form-control" name="link_video" placeholder="Nhập Link"
                        value="{{ $lecture->video }}">
                    <a href="javascipt:void(0)">Tải Video Lên</a>
                </div>

                <div class="mb-3 d-none" id="video_edit">
                    <label for="lectureVideo" class="form-label">Video Bài Học</label>
                    <input type="file" class="form-control file-upload-input-video" name="video"
                        id="lectureVideo_edit">
                    <video id="previewVideo" class="mt-3" style="width:100%; height:400px; object-fit:cover"
                        controls></video>
                    <a href="javascipt:void(0)" class="mt-3">Nhập Link</a>
                </div>

                <div class="mb-3" id="link-attachment_edit">
                    <label for="link">Tài Liệu Bài Học</label>
                    <input type="text" class="form-control" name="link_attachment" placeholder="Nhập Link"
                        value="{{ $lecture->attachment }}">
                    <a href="javascipt:void(0)">Tải Tài Liệu Lên</a>
                </div>

                <div class="mb-3 d-none" id="attachment_edit">
                    <label for="lectureAttachment" class="form-label">Tài Liệu Bài Học</label>
                    <input type="file" class="form-control file-upload-input-video" name="attachment"
                        id="lectureAttachment">

                    <a href="javascipt:void(0)" class="mt-3">Nhập Link</a>
                </div>

                <div class="mb-3">
                    <label for="preview">Tuỳ Chọn</label>
                    <select class="form-control form--control pl-15px" name="preview" id="preview">
                        <option value="0" {{ $lecture->preview == 0 ? 'selected' : '' }}>
                            Không Được Xem Trước</option>
                        <option value="1" {{ $lecture->preview == 1 ? 'selected' : '' }}>
                            Được Xem Trước</option>
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
        $('#link_video_edit a').on('click', function() {
            $('#link_video_edit').addClass('d-none');
            $('#video_edit').removeClass('d-none');
        });

        $('#video_edit a').on('click', function() {
            $('#video_edit').addClass('d-none');
            $('#link_video_edit').removeClass('d-none');
        });

        $('#link-attachment_edit a').on('click', function() {
            $('#link-attachment_edit').addClass('d-none');
            $('#attachment_edit').removeClass('d-none');
        });

        $('#attachment_edit a').on('click', function() {
            $('#attachment_edit').addClass('d-none');
            $('#link-attachment_edit').removeClass('d-none');
        });

        //submit form loading
        $('#form-edit').on('submit', function() {
            $('#form-edit button[type="submit"]').attr('disabled', true);
            $('#form-edit button[type="submit"]').html(`<span class="spinner-border spinner-border-sm" role="status"
                aria-hidden="true"></span> Đang Tải...`);
        });
    </script>
@endpush
