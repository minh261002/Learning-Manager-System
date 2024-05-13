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
                    <table class="table table-striped" id="table">
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
                                            Giảng Viên
                                        @else
                                            Người Dùng
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
@endpush
