<div class="custom-control custom-checkbox mb-1 fs-15">
    <input type="checkbox" class="custom-control-input" id="categoryCheckbox{{ $category->id }}"
        {{ request()->category == $category->slug ? 'checked' : '' }}>
    <label class="custom-control-label custom--control-label text-black" for="categoryCheckbox{{ $category->id }}">
        {{ $category->name }}
    </label>
</div>
