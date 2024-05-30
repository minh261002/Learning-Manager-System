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
                    <h4>Danh Sách Người Dùng</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.accounts.create') }}" class="btn btn-primary">Thêm Người Dùng</a>
                    </div>
                </div>

                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->role == null ? 'active' : '' }}" aria-current="page"
                                href="{{ route('admin.accounts.index') }}">Xem Tất Cả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link
                            {{ request()->role == 'admin' ? 'active' : '' }}"
                                href="{{ route('admin.accounts.index', ['role' => 'admin']) }}">Quản Trị
                                Viên</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link
                            {{ request()->role == 'instructor' ? 'active' : '' }}"
                                href="{{ route('admin.accounts.index', ['role' => 'instructor']) }}">
                                Người Hướng Dẫn
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link
                            {{ request()->role == 'user' ? 'active' : '' }}"
                                href="{{ route('admin.accounts.index', ['role' => 'user']) }}">Khách Hàng</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <table class="table table-striped mt-4" id="table">
                        <thead>
                            <tr>
                                <th>Họ Và Tên</th>
                                <th>Email</th>
                                <th>Ngày Đăng Ký</th>
                                <th>Quyền</th>
                                <th>Trạng Thái</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($accounts as $account)
                                <tr>
                                    <td>{{ $account->name }}</td>
                                    <td>{{ $account->email }}</td>
                                    <td>{{ formatDate($account->created_at) }}</td>
                                    <td>
                                        @if ($account->role == 'admin')
                                            Quản Trị Viên
                                        @elseif ($account->role == 'instructor')
                                            Người Hướng Dẫn
                                        @else
                                            Khách Hàng
                                        @endif
                                    </td>
                                    <td>
                                        <label class="custom-switch d-block mr-4">
                                            <input type="checkbox" name="custom-switch-checkbox"
                                                class="custom-switch-input change-status"
                                                id="customSwitch{{ $account->id }}"
                                                {{ $account->status == 1 ? 'checked' : '' }}>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.accounts.show', $account->username) }}"
                                            class="btn btn-sm btn-info">Xem</a>
                                        <a href="{{ route('admin.accounts.edit', $account->id) }}"
                                            class="btn btn-sm btn-primary">Sửa</a>
                                        <a href="{{ route('admin.accounts.destroy', $account->id) }}"
                                            class="btn btn-sm btn-danger delete-item">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('body').on('click', '.change-status', function() {
                let id = $(this).attr('id').replace('customSwitch', '')
                let status = $(this).prop('checked') == true ? 1 : 0

                Swal.fire({
                    title: 'Thông Báo',
                    text: 'Xác nhận thay đổi trạng thái người dùng này?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Xác Nhận',
                    cancelButtonText: 'Hủy',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: '{{ route('admin.accounts.change-status') }}',
                            data: {
                                'status': status,
                                'id': id
                            },
                            success: function(data) {
                                location.reload()
                            }
                        })
                    } else {
                        $('#customSwitch' + id).prop('checked', !status)
                    }
                })
            })
        })
    </script>

    <script>
        //chuyển role
    </script>
@endpush
