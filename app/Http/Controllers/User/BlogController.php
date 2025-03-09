<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
{
    $blogs = Blog::latest()->paginate(6); // Phân trang 6 bài mỗi trang
    return view('user.blogs.index', compact('blogs'));
}
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $recentBlogs = Blog::latest()->take(4)->get();
        $categories = BlogCategory::withCount('posts')->get(); // Lấy danh mục và số bài viết
        
        return view('user.blogs.detail', compact('blog', 'recentBlogs', 'categories'));
    }

    // Phương thức mới: Hiển thị bài viết theo danh mục
    public function category($slug)
    {
        $category = BlogCategory::where('slug', $slug)->firstOrFail();
        $blogs = Blog::where('category_id', $category->id)->paginate(10); // Lấy bài viết thuộc danh mục này

        return view('user.blogs.category', compact('category', 'blogs'));
    }
}
