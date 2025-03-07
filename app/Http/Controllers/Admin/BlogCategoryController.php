<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;

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
            'name' => 'required|unique:blog_categories,name',
            'slug' => 'required|unique:blog_categories,slug',
            'description' => 'nullable',
        ]);

        BlogCategory::create($request->all());

        return redirect()->route('admin.blog_categories.index')->with('success', 'Danh mục đã được thêm!');
    }

    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.blog_categories.edit', compact('blogCategory'));
    }

    public function update(Request $request, BlogCategory $blogCategory)
    {
        $request->validate([
            'name' => 'required|unique:blog_categories,name,' . $blogCategory->id,
            'slug' => 'required|unique:blog_categories,slug,' . $blogCategory->id,
            'description' => 'nullable',
        ]);

        $blogCategory->update($request->all());

        return redirect()->route('admin.blog_categories.index')->with('success', 'Danh mục đã được cập nhật!');
    }

    public function destroy(BlogCategory $blogCategory)
    {
        $blogCategory->delete();
        return redirect()->route('admin.blog_categories.index')->with('success', 'Danh mục đã được xóa!');
    }
}
