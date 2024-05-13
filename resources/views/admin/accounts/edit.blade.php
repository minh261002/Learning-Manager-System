@extends('admin.master')

@section('title', 'Quản Lý Người Dùng')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Quản Lý Người Dùng</h1>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Chỉnh Sửa Thông Tin</h4>
                </div>

                <div class="card-body">
                    <form class="row" method="POST" enctype="multipart/form-data"
                        action="{{ route('admin.accounts.update', $account->id) }}">

                        @csrf
                        @method('PUT')

                        <div class="col-12 col-md-3">
                            <div id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">Chọn Ảnh</label>
                                <input type="file" name="photo" id="image-upload">
                            </div>
                        </div>

                        <div class="col-12 col-md-9">
                            <div class="row">
                                <div class="col-12 col-md-6 mb-4">
                                    <label for="name">Họ Và Tên <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ $account->name }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 mb-4">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="{{ $account->email }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 mb-4">
                                    <label for="password">Mật Khẩu</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 mb-4">
                                    <label for="password_confirmation">Nhập Lại Mật Khẩu</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 mb-4">
                                    <label for="username">Tên Người Dùng</label>
                                    <input type="text" name="username" id="username" class="form-control"
                                        value="{{ $account->name }}">
                                    @error('username')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 mb-4">
                                    <label for="phone">Số Điện Thoại</label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        value="{{ $account->phone }}">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-4 mb-4">
                                    <label for="province">Tỉnh / Thành Phố</label>
                                    <select name="province" id="province" class="form-control select2">
                                        <option value="">Chọn Tỉnh / Thành Phố</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->code }}"
                                                {{ $account->province_id == $province->code ? 'selected' : '' }}>
                                                {{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('province')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-4 mb-4">
                                    <label for="district">Quận / Huyện</label>
                                    <select name="district" id="district" class="form-control select2">
                                        <option value="">Chọn Quận / Huyện</option>
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->code }}"
                                                {{ $account->district_id == $district->code ? 'selected' : '' }}>
                                                {{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('district')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-4 mb-4 ">
                                    <label for="ward">Phường / Xã</label>
                                    <select name="ward" id="ward" class="form-control select2">
                                        <option value="">Chọn Phường / Xã</option>
                                        @foreach ($wards as $ward)
                                            <option value="{{ $ward->code }}"
                                                {{ $account->ward_id == $ward->code ? 'selected' : '' }}>
                                                {{ $ward->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('ward')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 mb-4">
                                    <label for="address">Địa Chỉ</label>
                                    <input type="text" name="address" id="address" class="form-control"
                                        value="{{ $account->address }}">
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 mb-4">
                                    <label for="role">Vai Trò <span class="text-danger">*</span></label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="user" {{ $account->role == 'user' ? 'selected' : '' }}>Tài Khoản
                                            Người Dùng</option>
                                        <option value="instructor" {{ $account->role == 'instructor' ? 'selected' : '' }}>
                                            Giảng
                                            Viên</option>
                                        <option value="admin" {{ $account->role == 'admin' ? 'selected' : '' }}>Quản Trị
                                            Viên</option>
                                    </select>
                                    @error('role')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 mb-4">
                                    <label for="bio">Giới Thiệu</label>
                                    <textarea name="bio" id="bio" class="form-control">{{ $account->bio }}</textarea>
                                    @error('bio')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 mb-4">
                                    <button type="submit" class="btn btn-primary">Thêm Mới</button>
                                    <a href="{{ route('admin.accounts.index') }}" class="btn btn-danger">Hủy</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/location.js') }}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#bio'))
            .catch(error => {
                console.error(error);
            });

        $(document).ready(function() {
            $('#image-preview').css('background-image',
                'url({{ $account->photo ?? asset('uploads/no_image.jpg') }})');
            $('#image-preview').css('background-size', 'cover');
            $('#image-preview').css('background-position', 'center');


            $('#image-upload').change(function() {
                let reader = new FileReader();

                reader.onload = (e) => {
                    $('#image-preview').css('background-image', 'url(' + e.target.result + ')');
                    $('image-preview').css('background-size', 'cover');
                    $('#image-preview').css('background-position', 'center');
                    $('#image-preview').hide();
                    $('#image-preview').fadeIn(650);
                }

                reader.readAsDataURL(this.files[0]);

                $('#image-label').html('Thay Đổi Ảnh');
            });
        });
    </script>
@endpush
