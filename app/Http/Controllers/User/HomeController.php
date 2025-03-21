<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Blog;
use App\Models\About;
use App\Models\Review; // Thêm model Review
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $cars = Car::with('firstImage')->latest()->get();
        $brands = Brand::all();
        $blogs = Blog::where('status', 1)->latest()->take(3)->get();
        $about = About::first();
        $company = \App\Models\CompanyProfile::first(); // Lấy thông tin công ty
        // Lấy danh sách review kèm theo xe và ảnh đầu tiên
        $reviews = Review::with(['user', 'car.firstImage'])
                        ->latest()
                        ->take(5)
                        ->get();
    
        return view('user.home', compact('categories', 'cars', 'brands', 'blogs', 'about', 'reviews','company'));
    }
    
    
}
