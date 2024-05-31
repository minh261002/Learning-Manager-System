@extends('frontend.master')

@section('title', 'Quên Mật Khẩu')
@section('content')
    <section class="contact-area mt-5 position-relative">
        <span class="ring-shape ring-shape-1"></span>
        <span class="ring-shape ring-shape-2"></span>
        <span class="ring-shape ring-shape-3"></span>
        <span class="ring-shape ring-shape-4"></span>
        <span class="ring-shape ring-shape-5"></span>
        <span class="ring-shape ring-shape-6"></span>
        <span class="ring-shape ring-shape-7"></span>
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-6 mx-auto">
                    <h3 class="card-title text-center fs-24 lh-35 pb-4">Quên Mật Khẩu</h3>
                    <div class="section-block"></div>
                    <form method="post" class="pt-4" action="{{ route('password.email') }}">
                        @csrf

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="input-box">
                            <label class="label-text">Email</label>
                            <div class="form-group">
                                <input class="form-control form--control" type="text" name="email"
                                    value="{{ old('email') }}">
                                <span class="la la-user input-icon"></span>
                            </div>
                            @error('email')
                                <span class="text-danger my-2">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><!-- end input-box -->


                        <div class="btn-box">
                            <button class="btn theme-btn" type="submit">Xác Thực Email <i
                                    class="la la-arrow-right icon ml-1"></i></button>
                        </div><!-- end btn-box -->

                        <div class="mt-4 d-flex align-items-center justify-content-between">
                            <a class="text-center text-color font-weight-bold text-capitalize font-size-15"
                                href="{{ route('login') }}">Đăng Nhập</a>
                            <a class="text-center text-color font-weight-bold text-capitalize font-size-15"
                                href="{{ route('register') }}">Đăng Ký</a>
                        </div>

                    </form>
                </div><!-- end col-lg-7 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('form').submit(function() {
                $(this).find('button[type="submit"]').html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Đang Xử Lý...'
                );
                $(this).find('button[type="submit"]').attr('disabled', true);
            });
        });
    </script>
@endpush
