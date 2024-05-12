<ul class="list-group">
    <div class="list-group-item collapsed my-1 py-1" type="button" data-toggle="collapse"
        data-target="#subCategories{{ $category->id }}" aria-expanded="false"
        aria-controls="subCategories{{ $category->id }}" style='cursor:pointer'>

        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center justify-content-start gap-4">
                {{ $category->name }}

                <img src="{{ asset($category->image) }}" alt="no-image" class="img-fluid d-block ml-5"
                    style="width: 100px; height: 50px; object-fit: cover;">
            </div>

            <div>
                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary">
                    <i class="fas fa-edit"></i>
                </a>

                <a href="{{ route('admin.categories.destroy', $category->id) }}" class="btn btn-danger delete-item">
                    <i class="fas fa-trash"></i>
                </a>
            </div>
        </div>

    </div>

    <div class="collapse" id="subCategories{{ $category->id }}" style="margin-left: 30px;">
        @foreach ($categories as $subcategory)
            @if ($subcategory->parent_id === $category->id)
                @include('admin.categories.item', ['category' => $subcategory])
            @endif
        @endforeach
    </div>
</ul>
