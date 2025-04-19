<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Blog;
use App\Models\About;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $blogs = Blog::where('status', 1)->latest()->take(3)->get();
        $about = About::first();
        $company = \App\Models\CompanyProfile::first();
        $reviews = Review::with(['user', 'car.firstImage'])->latest()->take(5)->get();

        // Lọc danh sách xe
        $cars = Car::query()->with(['firstImage', 'details']);

        if ($request->has('brand') && $request->brand != 'all') {
            $cars->where('brand_id', $request->brand);
        }
        if ($request->has('year') && $request->year != 'all') {
            $cars->where('model_year', $request->year);
        }
        if ($request->has('mileage') && $request->mileage != 'all') {
            $cars->where('mileage', '<=', $request->mileage);
        }
        if ($request->has('price') && $request->price != 'all') {
            [$minPrice, $maxPrice] = explode('-', $request->price);
            $cars->whereBetween('price', [(int) $minPrice, (int) $maxPrice]);
        }
        if ($request->has('color') && $request->color != 'all') {
            $cars->where('color', $request->color);
        }

        // Lọc theo mã lực
        if ($request->has('horsepower') && $request->horsepower != 'all') {
            $cars->whereHas('details', function ($query) use ($request) {
                $query->where('horsepower', '>=', $request->horsepower);
            });
        }

        // Lọc theo mô-men xoắn
        if ($request->has('torque') && $request->torque != 'all') {
            $cars->whereHas('details', function ($query) use ($request) {
                $query->where('torque', '>=', $request->torque);
            });
        }

        // 👉 Giới hạn chỉ hiển thị 8 chiếc xe mới nhất
        $cars = $cars->latest()->take(8)->get();

        return view('user.home', compact('categories', 'cars', 'brands', 'blogs', 'about', 'reviews', 'company'));
    }
}
