<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Category;


class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with(['brand', 'category'])->get();
        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'model_year' => 'required|integer',
            'mileage' => 'required|integer',
            'transmission' => 'required|string',
            'fuel_type' => 'required|string',
            'color' => 'required|string',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
        ]);

        Car::create($request->all());

        return redirect()->route('admin.cars.index')->with('success', 'Xe đã được thêm thành công.');
    }

    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'model_year' => 'required|integer',
            'mileage' => 'required|integer',
            'transmission' => 'required|string',
            'fuel_type' => 'required|string',
            'color' => 'required|string',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
        ]);

        $car->update($request->all());

        return redirect()->route('admin.cars.index')->with('success', 'Cập nhật xe thành công.');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('admin.cars.index')->with('success', 'Xe đã được xóa.');
    }
    
}
