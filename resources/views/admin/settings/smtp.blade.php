@extends('admin.master')

@section('title', 'SMTP Settings')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Cấu Hình Email</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.smtp.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12 col-md-4 mb-4">
                                <label for="mailer">Mailer</label>
                                <input type="text" name="mailer" id="mailer" class="form-control"
                                    value="{{ $smtpSetting->mailer }}">
                            </div>

                            <div class="col-12 col-md-4 mb-4">
                                <label for="host">Host</label>
                                <input type="text" name="host" id="host" class="form-control"
                                    value="{{ $smtpSetting->host }}">
                            </div>

                            <div class="col-12 col-md-4 mb-4">
                                <label for="port">Port</label>
                                <input type="text" name="port" id="port" class="form-control"
                                    value="{{ $smtpSetting->port }}">
                            </div>

                            <div class="col-12 col-md-6 mb-4">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                    value="{{ $smtpSetting->username }}">
                            </div>

                            <div class="col-12 col-md-6 mb-4">
                                <label for="password">Password</label>

                                <div class="input-group">
                                    <input type="password" name="password" id="password" class="form-control"
                                        value="{{ $smtpSetting->password }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fas fa-eye cursor-pointer" id="togglePassword"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 mb-4">
                                <label for="encryption">Encryption</label>
                                <input type="text" name="encryption" id="encryption" class="form-control"
                                    value="{{ $smtpSetting->encryption }}">
                            </div>

                            <div class="col-12 col-md-6 mb-4">
                                <label for="from_address">From Address</label>
                                <input type="text" name="from_address" id="from_address" class="form-control"
                                    value="{{ $smtpSetting->from_address }}">
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection


@push('scripts')
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            var password = document.getElementById('password');
            if (password.type === 'password') {
                password.type = 'text';
            } else {
                password.type = 'password';
            }
        });
    </script>
@endpush
