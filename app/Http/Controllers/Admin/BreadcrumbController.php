<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Breadcrumb;
use Illuminate\Support\Facades\Storage;

class BreadcrumbController extends Controller
{
    public function index()
    {
        $breadcrumb = Breadcrumb::first(); // Chỉ có một bản ghi
        return view('admin.breadcrumbs.index', compact('breadcrumb'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $breadcrumb = Breadcrumb::first(); // Lấy bản ghi đầu tiên

        if (!$breadcrumb) {
            $breadcrumb = new Breadcrumb(); // Nếu chưa có, tạo mới
        }

        if ($request->hasFile('background_image')) {
            // Xóa ảnh cũ nếu có
            if ($breadcrumb->background_image) {
                Storage::delete($breadcrumb->background_image);
            }

            // Upload ảnh mới
            $path = $request->file('background_image')->store('public/breadcrumbs');
            $breadcrumb->background_image = str_replace('public/', 'storage/', $path);
        }

        $breadcrumb->save();

        return redirect()->route('admin.breadcrumbs.index')->with('success', 'Cập nhật thành công!');
    }
}
