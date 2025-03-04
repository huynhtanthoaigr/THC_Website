<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarImage;
use App\Models\Car;
use Illuminate\Support\Facades\Storage;

class CarImageController extends Controller
{
    public function index()
    {
        $carImages = CarImage::with('car')->latest()->paginate(100);
        return view('admin.car_images.index', compact('carImages'));
    }

    public function create()
{
    // Lấy danh sách xe chưa đủ 5 ảnh
    $cars = Car::whereDoesntHave('images', function ($query) {
        $query->havingRaw('COUNT(*) >= 5');
    })->get();

    return view('admin.car_images.create', compact('cars'));
}


    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'images' => 'required|array|max:5', // Tối đa 5 ảnh
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Kiểm tra từng ảnh
        ]);
    
        foreach ($request->file('images') as $image) {
            $imagePath = $image->store('car_images', 'public');
    
            CarImage::create([
                'car_id' => $request->car_id,
                'image_url' => $imagePath,
            ]);
        }
    
        return redirect()->route('admin.car_images.index')->with('success', 'Đã thêm tối đa 5 ảnh.');
    }
    


    public function edit(CarImage $carImage)
{
    $cars = Car::all();
    $carImages = CarImage::where('car_id', $carImage->car_id)->get(); // Lấy tất cả ảnh của xe
    return view('admin.car_images.edit', compact('carImage', 'carImages', 'cars'));
}

public function update(Request $request, CarImage $carImage)
{
    $request->validate([
        'car_id' => 'required|exists:cars,id',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $carImage->car_id = $request->car_id;
    $carImage->save();

    // Kiểm tra nếu có hình ảnh mới được tải lên
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $imageId => $file) {
            $image = CarImage::find($imageId);
            if ($image) {
                Storage::disk('public')->delete($image->image_url);
                $imagePath = $file->store('car_images', 'public');
                $image->image_url = $imagePath;
                $image->save();
            }
        }
    }

    return redirect()->route('admin.car_images.index')->with('success', 'Hình ảnh xe đã được cập nhật.');
}


public function destroy(CarImage $carImage)
{
    // Lấy danh sách tất cả hình ảnh của xe
    $carImages = CarImage::where('car_id', $carImage->car_id)->get();

    // Xóa từng hình ảnh trong storage
    foreach ($carImages as $image) {
        Storage::disk('public')->delete($image->image_url);
        $image->delete();
    }

    return redirect()->route('admin.car_images.index')->with('success', 'Tất cả hình ảnh của xe đã được xóa.');
}

}
