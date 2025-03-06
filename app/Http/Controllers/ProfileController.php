<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    // Hiển thị hồ sơ của User
    public function index()
    {
        $user = Auth::user();
        return view('profile.user', compact('user'));
    }

    // Chỉnh sửa hồ sơ của User
    public function edit()
    {
        return view('profile.edit_user');
    }

    // Cập nhật hồ sơ của User
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string',
            'address' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Cập nhật thông tin User
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;
        $user->address = $request->address;

        // Xử lý ảnh đại diện nếu có
        if ($request->hasFile('avatar')) {
            if ($user->avatar && Storage::exists('public/avatars/' . $user->avatar)) {
                Storage::delete('public/avatars/' . $user->avatar);
            }
            $imageName = time() . '.' . $request->avatar->extension();
            $request->avatar->storeAs('public/avatars', $imageName);
            $user->avatar = $imageName;
        }

        $user->save();

        return redirect()->route('profile.index')->with('success', 'Thông tin đã được cập nhật!');
    }

    // Cập nhật mật khẩu cho cả User và Admin
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            throw ValidationException::withMessages(['current_password' => 'Mật khẩu hiện tại không đúng.']);
        }

        auth()->user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        // Kiểm tra nếu là admin thì chuyển hướng về trang admin profile
        if (auth()->user()->hasRole('admin')) {
            return redirect()->route('admin.profile')->with('success', 'Mật khẩu Admin đã được cập nhật.');
        }

        return back()->with('success', 'Mật khẩu đã được cập nhật.');
    }

    // Hiển thị hồ sơ của Admin
    public function adminProfile()
    {
        if (!Auth::user()->hasRole('admin')) {
            return redirect()->route('profile.index');
        }

        return view('profile.admin');
    }

    // Chỉnh sửa hồ sơ của Admin
    public function editAdmin()
    {
        if (!Auth::user()->hasRole('admin')) {
            return redirect()->route('profile.index');
        }

        return view('profile.edit_admin');
    }

    // Cập nhật hồ sơ của Admin
    public function updateAdmin(Request $request)
    {
        $user = Auth::user();

        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string',
            'address' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Cập nhật thông tin Admin
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;
        $user->address = $request->address;

        // Xử lý ảnh đại diện nếu có
        if ($request->hasFile('avatar')) {
            if ($user->avatar && Storage::exists('public/avatars/' . $user->avatar)) {
                Storage::delete('public/avatars/' . $user->avatar);
            }
            $imageName = time() . '.' . $request->avatar->extension();
            $request->avatar->storeAs('public/avatars', $imageName);
            $user->avatar = $imageName;
        }

        $user->save();

        return redirect()->route('admin.profile')->with('success', 'Thông tin Admin đã được cập nhật!');
    }
}
