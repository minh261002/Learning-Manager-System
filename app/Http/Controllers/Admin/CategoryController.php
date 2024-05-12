<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Notify;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    use FileUploadTrait;
    public $category;

    function __construct()
    {
        $this->category = new Category();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->category->getAll();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->category->getAll();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = $this->category;

        $imagePath = $this->uploadImage($request, 'image', null, 'category');

        if ($imagePath) {
            $category->image = $imagePath;
        }
        $category->slug = createSlug(Category::class, $request->name);

        $category->name = $request->name;
        $category->parent_id = $request->parent_id;

        $category->save();

        Notify::success('Thêm danh mục thành công');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = $this->category->findOrFail($id);

        $categories = $this->category->getAll();

        return view('admin.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = $this->category->findOrFail($id);

        $imagePath = $this->uploadImage($request, 'image', $category->image, 'category');

        if ($imagePath) {
            $category->image = $imagePath;
        }

        $category->slug = createSlug(Category::class, $request->name);

        $category->name = $request->name;

        if ($request->parent_id == $category->id) {
            Notify::error('Lỗi chọn danh mục cha không hợp lệ');
            return redirect()->back();
        }

        $children = $category->children;
        foreach ($children as $child) {
            if ($request->parent_id == $child->id) {
                Notify::error('Lỗi chọn danh mục cha không hợp lệ');
                return redirect()->back();
            }
        }

        $category->parent_id = $request->parent_id;

        $category->save();

        Notify::success('Cập nhật danh mục thành công');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = $this->category->findOrFail($id);
            $this->deleteFile($category->image);
            $category->delete();

            Notify::success('Xóa danh mục thành công');
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            Notify::error('Xóa danh mục thất bại');
            return response()->json(['status' => 'error']);
        }
    }
}