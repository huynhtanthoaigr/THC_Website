<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // Hiển thị trang checkout (đặt cọc)
    public function index(Request $request)
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $subTotal = 0;
        foreach ($cart as $item) {
            $subTotal += $item['price'] * $item['quantity'];
        }
        $deposit = $subTotal * 0.20; // 20% đặt cọc

        return view('user.shop.checkout', compact('cart', 'subTotal', 'deposit'));
    }

    // Xử lý đơn đặt cọc
    public function process(Request $request)
    {
        // Xác thực dữ liệu từ form checkout
        $data = $request->validate([
            'fullName'    => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'phone'       => 'required|string|max:20',
            'viewAddress' => 'required|string|max:255',
            'notes'       => 'nullable|string',
        ]);

        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $subTotal = 0;
        foreach ($cart as $item) {
            $subTotal += $item['price'] * $item['quantity'];
        }
        $deposit = $subTotal * 0.20;

        // Tạo đơn hàng (đơn đặt cọc) – Ở ví dụ này lưu vào session, bạn nên lưu vào cơ sở dữ liệu trong ứng dụng thực tế
        $order = [
            'customer'  => $data,
            'cart'      => $cart,
            'subTotal'  => $subTotal,
            'deposit'   => $deposit,
            'status'    => 'Deposit Pending',
        ];

        session(['order' => $order]);

        // Optionally, bạn có thể xóa giỏ hàng sau khi đặt cọc:
        // session()->forget('cart');

        return view('user.shop.checkout_success', compact('order'));
    }
}
