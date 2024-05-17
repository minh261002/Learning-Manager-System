@extends('user.master')

@section('title', 'Danh Sách Yêu Thích')

@section('content')
    <div class="dashboard-content-wrap mb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="user-form">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Ảnh</th>
                                        <th scope="col">Khoá Học</th>
                                        <th scope="col">Người Hướng Dẫn</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wishlists as $wishlist)
                                        <tr>
                                            <td>
                                                <img src="{{ asset($wishlist->course->image) }}" alt="Ảnh khoá học"
                                                    style="width: 200px; height: 70px; object-fit:cover">
                                            </td>
                                            <td>{{ $wishlist->course->name }}</td>
                                            <td>{{ $wishlist->course->instructor->name }}</td>
                                            <td>
                                                @if ($wishlist->course->status == 0)
                                                    Sắp Ra Mắt
                                                @else
                                                    @if ($wishlist->course->price == 0)
                                                        Miễn Phí
                                                    @elseif ($wishlist->course->discount > 0)
                                                        {{ number_format($wishlist->course->price - ($wishlist->course->price * $wishlist->course->discount) / 100, 0, ',', '.') }}
                                                        VNĐ
                                                        <span
                                                            class="badge badge-danger">-{{ $wishlist->course->discount }}%</span>
                                                    @else
                                                        {{ number_format($wishlist->course->price, 0, ',', '.') }} VNĐ
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('course.detail', $wishlist->course->slug) }}"
                                                    class="btn btn-primary">Xem chi tiết</a>
                                                <a href="{{ route('wishlist.destroy', $wishlist->id) }}"
                                                    class="btn btn-danger delete-item">Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
