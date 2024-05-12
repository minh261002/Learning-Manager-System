@extends('instructor.master')

@section('title', 'Thông Tin Cá Nhân')

@section('content')
    <div class="dashboard-content-wrap mb-5">
        <div class="card">
            <div class="card-body shadow-sm">
                <div class="setting-body">
                    <h3 class="fs-17 font-weight-semi-bold pb-4">Thông Tin Cá Nhân</h3>
                    <form method="post" action="{{ route('instructor.profile.update') }}"
                        class="row pt-40px MultiFile-intercepted" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-12  mb-4 media media-card align-items-center">
                            <div class="media-img media-img-lg mr-4 bg-gray">
                                <img class="mr-3" src="{{ Auth::user()?->photo ?? asset('uploads/no_image.jpg') }}"
                                    id="previewImg">
                            </div>
                            <div class="media-body">
                                <div class="file-upload-wrap file-upload-wrap-2">
                                    <div class="MultiFile-wrap" id="MultiFile2">
                                        <input type="file" name="photo"
                                            class="multi file-upload-input with-preview MultiFile-applied" id="MultiFile2">
                                        <div class="MultiFile-list" id="MultiFile2_list"></div>
                                    </div>
                                    <span class="file-upload-text"><i class="la la-photo mr-2"></i>Chọn Ảnh</span>
                                </div><!-- file-upload-wrap -->

                            </div>
                        </div>

                        <div class="input-box col-lg-6">
                            <label class="label-text">Tên Người Dùng</label>
                            <div class="form-group">
                                <input class="form-control form--control" type="text" name="username"
                                    value="{{ Auth::user()?->username }}">
                                <span class="la la-user input-icon"></span>
                            </div>
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div><!-- end input-box -->
                        <div class="input-box col-lg-6">
                            <label class="label-text">Họ Và Tên</label>
                            <div class="form-group">
                                <input class="form-control form--control" type="text" name="name"
                                    value="{{ Auth::user()?->name }}">
                                <span class="la la-user input-icon"></span>
                            </div>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div><!-- end input-box -->
                        <div class="input-box col-lg-6">
                            <label class="label-text">Email</label>
                            <div class="form-group">
                                <input class="form-control form--control" type="email" name="email"
                                    value="{{ Auth::user()?->email }}">
                                <span class="la la-envelope input-icon"></span>
                            </div>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div><!-- end input-box -->
                        <div class="input-box col-lg-6">
                            <label class="label-text">Số Điện Thoại</label>
                            <div class="form-group">
                                <input class="form-control form--control" type="email" name="phone"
                                    value="{{ Auth::user()?->phone }}">
                                <span class="la la-phone input-icon"></span>
                            </div>
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div><!-- end input-box -->

                        <div class="input-box col-lg-4 mb-4">
                            <label class="label-text">Tỉnh / Thành Phố</label>
                            <select class="form-control form--control select2" name="province"
                                style="padding-left: 12px !important" id="province">
                                <option value="">Chọn Tỉnh / Thành Phố</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->code }}"
                                        {{ Auth::user()?->province_id == $province->code ? 'selected' : '' }}>
                                        {{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div><!-- end input-box -->

                        <div class="input-box col-lg-4 mb-4">
                            <label class="label-text">Quận / Huyện</label>
                            <select class="form-control form--control select2" name="district" id="district"
                                style="padding-left: 12px !important">
                                <option value="">Chọn Quận / Huyện</option>

                                @if ($districts)
                                    @foreach ($districts as $district)
                                        <option value="{{ $district->code }}"
                                            {{ Auth::user()?->district_id == $district->code ? 'selected' : '' }}>
                                            {{ $district->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div><!-- end input-box -->


                        <div class="input-box col-lg-4 mb-4">
                            <label class="label-text">Phường / Xã</label>
                            <select class="form-control form--control select2" name="ward"
                                style="padding-left: 12px !important" id="ward">
                                <option value="">Chọn Phường / Xã</option>

                                @if ($wards)
                                    @foreach ($wards as $ward)
                                        <option value="{{ $ward->code }}"
                                            {{ Auth::user()?->ward_id == $ward->code ? 'selected' : '' }}>
                                            {{ $ward->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div><!-- end input-box -->

                        <div class="input-box col-lg-12">
                            <label class="label-text">Địa Chỉ</label>
                            <div class="form-group">
                                <input class="form-control form--control" type="text" name="address"
                                    value="{{ Auth::user()?->address }}">
                                <span class="la la-map-marker-alt input-icon"></span>
                            </div>
                        </div><!-- end input-box -->

                        <div class="input-box col-12 mb-4">
                            <label for="bio">TIểu Sử</label>
                            <textarea name="bio" id="bio" class="form-control form--control" rows="3">{{ Auth::user()?->bio }}</textarea>
                            @error('bio')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input-box col-lg-12 py-2">
                            <button class="btn theme-btn">Lưu Thay Đổi</button>
                        </div><!-- end input-box -->
                    </form>
                </div>
            </div>
        </div>


        <div class="card my-5">
            <div class="card-body shadow-sm">
                <div class="setting-body">
                    <h3 class="fs-17 font-weight-semi-bold pb-4">Cập Nhật Mật Khẩu</h3>
                    <form method="post" action="{{ route('instructor.change.password') }}"
                        class="row pt-40px MultiFile-intercepted" action="">
                        @csrf
                        @method('PUT')

                        <div class="input-box col-12 col-md-6">
                            <label class="label-text">Mật Khẩu Hiện Tại</label>
                            <div class="form-group">
                                <input class="form-control form--control" type="password" name="current_password">
                                <span class="la la-lock input-icon"></span>
                            </div>
                            @error('current_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6"></div>

                        <div class="input-box col-12 col-md-6">
                            <label class="label-text">Mật Khẩu Mới</label>
                            <div class="form-group">
                                <input class="form-control form--control" type="password" name="password">
                                <span class="la la-lock input-icon"></span>
                            </div>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6"></div>


                        <div class="input-box col-12 col-md-6">
                            <label class="label-text">Nhập Lại Mật Khẩu Mới</label>
                            <div class="form-group">
                                <input class="form-control form--control" type="password" name="password_confirmation">
                                <span class="la la-lock input-icon"></span>
                            </div>
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input-box col-lg-12 py-2">
                            <button class="btn theme-btn">Lưu Thay Đổi</button>
                        </div><!-- end input-box -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.file-upload-input').on('change', function() {
                var fileInput = $(this);
                if (fileInput.length) {
                    var files = fileInput[0].files;
                    if (files && files.length) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#previewImg').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(files[0]);
                    }
                }
            });
        });

        ClassicEditor
            .create(document.querySelector('#bio'))
            .catch(error => {
                console.error(error);
            });

        $('.select2').select2();
    </script>

    <script src="{{ asset('js/location.js') }}"></script>
@endpush
