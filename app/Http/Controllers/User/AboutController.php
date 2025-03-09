<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Brand; // Thêm dòng này
use App\Models\Review;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first(); // Lấy bản ghi đầu tiên từ bảng About
        $brands = Brand::all();
        $reviews = Review::with(['user', 'car.firstImage'])
        ->latest()
        ->take(5)
        ->get();
        return view('user.about.index', compact('about', 'brands', 'reviews'));

    }
}
