@extends('admin.master')

@section('title', 'Thông Tin Cá Nhân')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Thông Tin Cá Nhân</h1>
        </div>

        <section class="body">
            <div class="card">
                <div class="card-header">
                    <h4>Thông Tin Cá Nhân</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.profile.update') }}" class="row"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-12 mb-4">
                            <div id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">Chọn Ảnh</label>
                                <input type="file" name="photo" id="image-upload">
                            </div>
                        </div>

                        <div class="col-12 col-md-6 mb-4">
                            <label for="username">Tên Người Dùng</label>
                            <input type="text" name="username" id="username" class="form-control"
                                value="{{ auth()->user()?->username }}">
                            <span class="text-danger">
                                @error('username')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-12 col-md-6 mb-4">
                            <label for="name">Họ Và Tên</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ auth()->user()?->name }}">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-12 col-md-6 mb-4">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ auth()->user()?->email }}">
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-12 col-md-6 mb-4">
                            <label for="phone">Số Điện Thoại</label>
                            <input type="text" name="phone" id="phone" class="form-control"
                                value="{{ auth()->user()?->phone }}">
                            <span class="text-danger">
                                @error('phone')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-12 col-md-4 mb-4">
                            <label for="province">Tỉnh / Thành Phố</label>
                            <select name="province" id="province" class="form-control select2">
                                <option value="">Chọn Tỉnh / Thành Phố</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->code }}"
                                        {{ auth()->user()?->province_id == $province->code ? 'selected' : '' }}>
                                        {{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 col-md-4 mb-4">
                            <label for="district">Quận / Huyện</label>
                            <select name="district" id="district" class="form-control select2">
                                <option value="">Chọn Quận / Huyện</option>

                                @if ($districts)
                                    @foreach ($districts as $district)
                                        <option value="{{ $district->code }}"
                                            {{ auth()->user()?->district_id == $district->code ? 'selected' : '' }}>
                                            {{ $district->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-12 col-md-4 mb-4">
                            <label for="ward">Phường / Xã</label>
                            <select name="ward" id="ward" class="form-control select2">
                                <option value="">Chọn Phường / Xã</option>

                                @if ($wards)
                                    @foreach ($wards as $ward)
                                        <option value="{{ $ward->code }}"
                                            {{ auth()->user()?->ward_id == $ward->code ? 'selected' : '' }}>
                                            {{ $ward->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-12 mb-4">
                            <label for="address">Địa Chỉ</label>
                            <input type="text" name="address" id="address" class="form-control"
                                value="{{ auth()->user()?->address }}">
                            <span class="text-danger">
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-12 mb-4">
                            <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>Đổi Mật Khâu</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.change.password') }}" class="row" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="col-12 col-md-6 mb-4">
                            <label for="current-password">Mật Khẩu Hiện Tại</label>
                            <input type="password" name="current_password" id="current_password" class="form-control">
                            <span class="text-danger">
                                @error('current_password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-12 col-md-6 mb-4"></div>

                        <div class="col-12 col-md-6 mb-4">
                            <label for="password">Mật Khẩu Mới</label>
                            <input type="password" name="password" id="password" class="form-control">
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-12 col-md-6 mb-4"></div>

                        <div class="col-12 col-md-6 mb-4">
                            <label for="password_confirmation">Nhập Lại Mật Khẩu Mới</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control">
                            <span class="text-danger">
                                @error('password_confirmation')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-12 col-md-6 mb-4"></div>
                        <div class="col-12 mb-4">
                            <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </section>
@endsection

@push('scripts')
    <script>
        $('#image-preview').css('background-image',
            'url({{ auth()->user()?->photo ? auth()->user()?->photo : url('upload/no_image.jpg') }})'
        );
        $('#image-preview').css('background-size', 'cover');
        $('#image-preview').css('background-position', 'center');

        //image preview
        $('#image-upload').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#image-preview').css('background-image', 'url(' + e.target.result + ')');
                $('#image-preview').hide();
                $('#image-preview').fadeIn(650);
            }
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@endpush
