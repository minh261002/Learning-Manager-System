@extends('admin.master')

@section('title', 'Cấu hình trang web')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Cấu Hình Trang Web</h1>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Cấu hình trang web</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.site') }}" method="POST" class="row" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-12 col-md-6 mb-3">
                            <img src="{{ $settings->logo }}" alt="Logo" class="prev_logo img-fluid w-full">
                            <label for="logo" class="mt-2 btn btn-outline-primary">Chọn Logo</label>
                            <input type="file" name="logo" id="logo" class="d-none">
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <img src="{{ $settings->favicon }}" alt="Favicon" class="prev_fav img-fluid w-full">
                            <label for="favicon" class="mt-2 btn btn-outline-primary">Chọn Favicon</label>
                            <input type="file" name="favicon" id="favicon" class="d-none">
                        </div>

                        <div class="card-header">
                            <h4>Thông Tin</h4>
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ $settings->email }}">
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" name="phone" id="phone" class="form-control"
                                value="{{ $settings->phone }}">
                        </div>

                        <div class="col-12 mb-3">
                            <label for="address">Địa chỉ</label>
                            <input type="text" name="address" id="address" class="form-control"
                                value="{{ $settings->address }}">
                        </div>

                        <div class="card-header">
                            <h4>Liên kết mạng xã hội</h4>
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <label for="facebook">Facebook</label>
                            <input type="text" name="facebook" id="facebook" class="form-control"
                                value="{{ $settings->facebook }}">
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <label for="behance">Behance</label>
                            <input type="text" name="behance" id="behance" class="form-control"
                                value="{{ $settings->behance }}">
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <label for="linkedin">LinkedIn</label>
                            <input type="text" name="linkedin" id="linkedin" class="form-control"
                                value="{{ $settings->linkedin }}">
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <label for="github">GitHub</label>
                            <input type="text" name="github" id="github" class="form-control"
                                value="{{ $settings->github }}">
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#logo').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('.prev_logo').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

            $('#favicon').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('.prev_fav').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });

        $('form').submit(function() {
            $(this).find('button[type="submit"]').prop('disabled', true);
            $(this).find('button[type="submit"]').html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
        });
    </script>
@endpush
