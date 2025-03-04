<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            } else {
                // Nếu request có tham số 'redirect', chuyển hướng về đó
                if ($request->has('redirect')) {
                    return redirect($request->input('redirect'));
                }
                // Nếu session có 'url.intended', chuyển hướng về đó và xóa session đó
                elseif (session()->has('url.intended')) {
                    $intended = session('url.intended');
                    session()->forget('url.intended');
                    return redirect($intended);
                }
                return redirect()->route('home');
            }
        }

        return back()->withErrors(['email' => 'Thông tin đăng nhập không đúng']);
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:users',
            'phone'   => 'required|numeric|digits_between:10,15|unique:users',
            'password'=> 'required|min:6|confirmed',
            'address' => 'required|string|max:255',
        ]);

        $user = User::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'password'=> Hash::make($request->password),
            'address' => $request->address,
        ]);

        // Gán quyền cho user mới đăng ký: nếu email chứa 'admin' thì admin, ngược lại là user
        $role = (str_contains($request->email, 'admin')) ? 'admin' : 'user';
        $user->assignRole($role);

        return redirect()->route('login')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
