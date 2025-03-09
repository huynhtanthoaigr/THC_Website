<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.index', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands',
            'country' => 'nullable|string|max:255',
            // Bổ sung rule cho logo
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        // Tạo mới brand
        $brand = new Brand($request->only('name', 'country'));

        // Nếu có upload file logo
        if ($request->hasFile('logo')) {
            // Lưu file vào thư mục 'brand_logos' trong storage/app/public
            $path = $request->file('logo')->store('brand_logos', 'public');
            $brand->logo = $path;
        }

        $brand->save();

        return redirect()->route('admin.brands.index')->with('success', 'Thêm thương hiệu thành công!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name,' . $id,
            'country' => 'nullable|string|max:255',
            // Bổ sung rule cho logo
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $brand = Brand::findOrFail($id);

        // Cập nhật name, country
        $brand->fill($request->only('name', 'country'));

        // Nếu có upload file logo
        if ($request->hasFile('logo')) {
            // (Tuỳ chọn) Xoá file logo cũ nếu muốn
            // if ($brand->logo) {
            //     Storage::disk('public')->delete($brand->logo);
            // }

            $path = $request->file('logo')->store('brand_logos', 'public');
            $brand->logo = $path;
        }

        $brand->save();

        return redirect()->route('admin.brands.index')->with('success', 'Cập nhật thương hiệu thành công!');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        // (Tuỳ chọn) Xoá logo cũ
        // if ($brand->logo) {
        //     Storage::disk('public')->delete($brand->logo);
        // }

        $brand->delete();

        return redirect()->route('admin.brands.index')->with('success', 'Xóa thương hiệu thành công!');
    }
}
