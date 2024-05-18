@extends('instructor.master')

@section('title', 'Quản lý mã giảm giá')

@section('content')
    <div class="dashboard-content-wrap mb-5">
        <div class="card">
            <div class="card-body shadow-sm">
                <div class="setting-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="fs-17 font-weight-semi-bold ">Quản Lý Mã Giảm Giá</h3>
                    </div>


                    <form action="{{ route('instructor.coupons.update', $coupon->id) }}" method="POST" class="mt-5">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-12 col-md-6 mb-4">
                                <label for="name">Mã Giảm Giá</label>
                                <input type="text" class="form-control form--control pl-15px" name="name"
                                    id="name" value="{{ $coupon->name }}">

                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-6"></div>

                            <div class="col-12 col-md-6 mb-4">
                                <label for="discount">Giảm Giá (%)</label>
                                <input type="number" class="form-control form--control pl-15px" name="discount"
                                    id="discount" value="{{ $coupon->discount }}">

                                @error('discount')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-6"></div>

                            <div class="col-12 col-md-6 mb-4">
                                <label for="expires_at">Ngày hết hạn</label>
                                <input type="text" class="form-control form--control pl-15px datepicker"
                                    name="expires_at" id="expires_at" value="{{ $coupon->expires_at }}">
                                @error('expires_at')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-6"></div>

                            <div class="col-12 col-md-6 mb-4">
                                <label for="course_id">Chọn Khoá Học Cụ Thể</label>
                                <select name="course_id" id="course_id" class="form-control select2">
                                    <option value="">Chọn Khoá Học</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}"
                                            {{ $coupon->course_id == $course->id ? 'selected' : '' }}>{{ $course->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Thêm mã giảm giá</button>
                                <a href="{{ route('instructor.coupons.index') }}" class="btn btn-secondary">Quay lại</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('.select2').select2();
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            autoclose: true
        });
    </script>
@endpush
