<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CompanyProfileController extends Controller
{
    public function index()
    {
        $company = CompanyProfile::first();
        return view('admin.company.index', compact('company'));
    }

    public function edit()
    {
        $company = CompanyProfile::first();
        return view('admin.company.edit', compact('company'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'opening_hours' => 'nullable|string|max:255', // Thêm validation
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $company = CompanyProfile::firstOrCreate([]);
    
        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->address = $request->address;
        $company->website = $request->website;
        $company->opening_hours = $request->opening_hours; // Lưu thời gian mở cửa
    
        if ($request->hasFile('logo')) {
            if ($company->logo) {
                Storage::disk('public')->delete($company->logo);
            }
            $path = $request->file('logo')->store('company_logos', 'public');
            $company->logo = $path;
        }
    
        $company->save();
    
        return redirect()->route('admin.company.index')->with('success', 'Cập nhật thông tin công ty thành công!');
    }
    public function adminDashboard()
{
    $company = CompanyProfile::first(); // Lấy thông tin công ty đầu tiên
    return view('admin.dashboard', compact('company'));
}

}
