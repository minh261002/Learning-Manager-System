@extends('admin.master')

@section('title', 'Danh Mục Khoá Học')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Danh Mục Khoá Học</h1>
        </div>

        <section class="body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4> Thêm Danh Mục Mới </h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.categories.store') }}" class="row" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="col-12 col-md-6 mb-4">
                            <label for="name" class="form-label">Tên Danh Mục</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6 mb-4">
                            <label for="parent_id" class="form-label">Danh Mục Cha</label>
                            <select name="parent_id" class="form-control select2">
                                <option value="">Không</option>
                                @php
                                    echo $html = categoryMultiLevelOption($categories);
                                @endphp
                            </select>
                        </div>

                        <div class="col-12 col-md-2 mb-4">
                            <img src="" id="previewImg" class="d-block mb-4" width="300px">
                            <input type="file" class="form-control" id="image" name="image"
                                onchange="previewFile(this)">
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Thêm Danh Mục</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </section>
@endsection

@push('scripts')
    <script>
        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $("#previewImg").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush
