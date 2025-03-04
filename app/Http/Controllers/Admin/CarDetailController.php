<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarDetail;
use Illuminate\Http\Request;

class CarDetailController extends Controller
{
    public function index()
    {
        // Lấy tất cả dữ liệu từ bảng car_details
        $carDetails = CarDetail::with('car')->paginate(10); // Hiển thị 10 bản ghi mỗi trang

        return view('admin.car_details.index', compact('carDetails'));
    }
    public function create()
    {
        $cars = Car::doesntHave('carDetail')->get();
        return view('admin.car_details.create', compact('cars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id|unique:car_details,car_id',
            'engine' => 'required|string',
            'horsepower' => 'required|integer',
            'torque' => 'required|integer',
            'fuel_capacity' => 'required|integer',
            'dimensions' => 'required|string',
            'weight' => 'required|integer',
            'warranty' => 'required|string',
            'features' => 'required|string',
        ]);

        CarDetail::create($request->all());

        return redirect()->route('admin.car_details.index')->with('success', 'Thêm chi tiết xe thành công.');
    }

    public function edit(CarDetail $carDetail)
    {
        $cars = Car::all(); // Lấy danh sách tất cả xe để hiển thị trong dropdown
        return view('admin.car_details.edit', compact('carDetail', 'cars'));
    }
    
    public function update(Request $request, CarDetail $carDetail)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'engine' => 'required|string',
            'horsepower' => 'required|integer',
            'torque' => 'required|string',
            'fuel_capacity' => 'required|numeric',
            'dimensions' => 'required|string',
            'weight' => 'required|integer',
            'warranty' => 'required|string',
            'features' => 'required|string',
        ]);
    
        $carDetail->update($request->all());
    
        return redirect()->route('admin.car_details.index')->with('success', 'Cập nhật chi tiết xe thành công.');
    }
    

    public function destroy(CarDetail $carDetail)
    {
        $carDetail->delete();
        return redirect()->route('admin.car_details.index')->with('success', 'Xóa chi tiết xe thành công.');
    }
}
