@extends('admin.master')

@section('title', 'Quản Lý Danh Mục')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Quản Lý Danh Mục</h1>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Tất Cả Danh Mục</h4>

                    <div class="card-header-action">
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Thêm Danh Mục Mới</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="card-body">
                        <div class="list-group category-tree">
                            @foreach ($categories as $category)
                                @if ($category->parent_id === null)
                                    @include('admin.categories.item', ['category' => $category])
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
