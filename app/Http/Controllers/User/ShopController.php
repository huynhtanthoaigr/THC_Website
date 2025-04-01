<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CarDetail; // Thêm dòng này để import model CarDetail
class ShopController extends Controller
{
  
    public function index(Request $request)
{
    $query = Car::query();
    
    // Lọc theo thương hiệu (brand)
    if ($request->has('brand_id')) {
        $query->where('brand_id', $request->brand_id); // Lọc theo brand_id
    }

    // Kiểm tra nếu có danh mục được chọn
    if ($request->has('category_id')) {
        $query->where('category_id', $request->category_id); // Lọc theo category_id
    }

    // Tìm kiếm theo tên hoặc mô tả xe
    if ($request->has('search') && !empty($request->search)) {
        $query->where(function ($q) use ($request) {
            $q->where('name', 'LIKE', '%' . $request->search . '%')
              ->orWhere('description', 'LIKE', '%' . $request->search . '%');
        });
    }
    
    // Lọc theo thương hiệu
    if ($request->has('brands')) {
        $query->whereIn('brand_id', $request->brands);
    }

    // Lọc theo khoảng giá
    if ($request->has('min_price') && $request->has('max_price')) {
        $query->whereBetween('price', [$request->min_price, $request->max_price]);
    }

    // Lọc theo hộp số
    if ($request->has('transmission')) {
        $query->whereIn('transmission', $request->transmission);
    }

    // Lấy tất cả các xe cùng với các hình ảnh tương ứng
    $cars = $query->with('images')->paginate(9);  // Lấy hình ảnh liên quan với mỗi xe
    $brands = Brand::all();
    $categories = Category::all();
    
    // Danh sách khoảng giá cố định
    $priceRanges = [
        ['min' => 0, 'max' => 20000, 'label' => 'Dưới 20,000$'],
        ['min' => 20000, 'max' => 50000, 'label' => '20,000$ - 50,000$'],
        ['min' => 50000, 'max' => 100000, 'label' => '50,000$ - 100,000$'],
        ['min' => 100000, 'max' => null, 'label' => 'Trên 100,000$'],
    ];

    // Danh sách hộp số
    $transmissions = ['Automatic', 'Manual'];
    
    return view('user.shop.index', compact('cars', 'brands', 'categories', 'priceRanges', 'transmissions'));
}

    public function show($carId)
    {
        // Lấy dữ liệu chi tiết xe từ bảng car_details theo car_id
        $carDetail = CarDetail::where('car_id', $carId)->first();
     
        // Truyền dữ liệu vào view
        return view('user.shop.show', compact('carDetail'));
    }
    
}
