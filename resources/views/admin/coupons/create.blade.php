@extends('admin.master')

@section('title', 'Thêm mã giảm giá')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Quản lý mã giảm giá</h1>
        </div>
        <div class="section-body">

            <div class="card card-primary">
                <div class="card-header">
                    <h4>Thêm mã giảm giá</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.coupons.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-12 col-md-6 mb-4">
                                <label for="name">Mã Giảm Giá</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ old('name') }}">

                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-6"></div>

                            <div class="col-12 col-md-6 mb-4">
                                <label for="discount">Giảm Giá (%)</label>
                                <input type="number" class="form-control" name="discount" id="discount"
                                    value="{{ old('discount') }}">

                                @error('discount')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-6"></div>

                            <div class="col-12 col-md-6 mb-4">
                                <label for="expires_at">Ngày hết hạn</label>
                                <input type="text" class="form-control datepicker" name="expires_at" id="expires_at"
                                    value="{{ old('expires_at') }}">
                                @error('expires_at')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Thêm mã giảm giá</button>
                                <a href="{{ route('admin.coupons.index') }}" class="btn btn-secondary">Quay lại</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection
