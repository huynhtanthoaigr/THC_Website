<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class CartController extends Controller
{
    // Hiển thị giỏ hàng
    public function index(Request $request)
    {
        $cart = session('cart', []);
        return view('user.shop.shop_cart', compact('cart'));
    }

    // Thêm sản phẩm vào giỏ hàng
    public function add(Request $request, $id)
    {
        // Nếu người dùng chưa đăng nhập, lưu URL intended là trang chi tiết sản phẩm và chuyển hướng đến trang đăng nhập
        if (!auth()->check()) {
            // Lưu URL intended vào session
            session()->put('url.intended', route('user.shop.show', $id));
            // Hoặc dùng query string để truyền redirect (thêm vào URL đăng nhập)
            return redirect()->guest(route('login', ['redirect' => route('user.shop.show', $id)]))
                             ->with('error', 'Please login to add to cart.');
        }

        // Nếu đã đăng nhập, lấy sản phẩm từ database
        $car = Car::find($id);
        if (!$car) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        // Xây dựng dữ liệu sản phẩm cần thêm vào giỏ hàng
        $product = [
            'id'       => $car->id,
            'name'     => $car->name,
            'price'    => $car->price,
            'quantity' => 1,
            'image'    => $car->image ?? ($car->images->first()->image_url ?? 'default.jpg'),
        ];

        $cart = session('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = $product;
        }
        session(['cart' => $cart]);

        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully.');
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    public function update(Request $request, $id)
    {
        $action = $request->input('action');
        $cart = session('cart', []);

        if (isset($cart[$id])) {
            if ($action === 'increment') {
                $cart[$id]['quantity']++;
            } elseif ($action === 'decrement') {
                $cart[$id]['quantity'] = max(1, $cart[$id]['quantity'] - 1);
            }
        }

        session(['cart' => $cart]);
        return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function remove(Request $request, $id)
    {
        $cart = session('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session(['cart' => $cart]);
        }
        return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
    }

    // Áp dụng mã giảm giá (coupon)
    public function coupon(Request $request)
    {
        $coupon = $request->input('coupon');

        if ($coupon === 'SAVE10') {
            session(['discount' => 10]);
            return redirect()->route('cart.index')->with('success', 'Coupon applied successfully.');
        } else {
            session()->forget('discount');
            return redirect()->route('cart.index')->with('error', 'Invalid coupon code.');
        }
    }
}
