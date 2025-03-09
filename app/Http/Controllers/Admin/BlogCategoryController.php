<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::all();
        return view('admin.blog_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.blog_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|unique:blog_categories,name',
            'slug'        => 'required|unique:blog_categories,slug',
            'description' => 'nullable',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Hỗ trợ upload ảnh
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('category_images', 'public');
        }

        BlogCategory::create([
            'name'        => $request->name,
            'slug'        => Str::slug($request->slug),
            'description' => $request->description,
            'image'       => $imagePath, // Lưu đường dẫn ảnh
        ]);

        return redirect()->route('admin.blog_categories.index')->with('success', 'Danh mục đã được thêm!');
    }

    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.blog_categories.edit', compact('blogCategory'));
    }

    public function update(Request $request, BlogCategory $blogCategory)
    {
        $request->validate([
            'name'        => 'required|unique:blog_categories,name,' . $blogCategory->id,
            'slug'        => 'required|unique:blog_categories,slug,' . $blogCategory->id,
            'description' => 'nullable',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $blogCategory->image;
        if ($request->hasFile('image')) {
            if ($blogCategory->image) {
                Storage::disk('public')->delete($blogCategory->image);
            }
            $imagePath = $request->file('image')->store('category_images', 'public');
        }

        $blogCategory->update([
            'name'        => $request->name,
            'slug'        => Str::slug($request->slug),
            'description' => $request->description,
            'image'       => $imagePath,
        ]);

        return redirect()->route('admin.blog_categories.index')->with('success', 'Danh mục đã được cập nhật!');
    }

    public function destroy(BlogCategory $blogCategory)
    {
        if ($blogCategory->image) {
            Storage::disk('public')->delete($blogCategory->image);
        }

        $blogCategory->delete();
        return redirect()->route('admin.blog_categories.index')->with('success', 'Danh mục đã được xóa!');
    }
}
