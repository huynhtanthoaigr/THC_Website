<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    // Hiển thị trang checkout (đặt cọc)
    public function index()
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Tính tổng tiền giỏ hàng
        $subTotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $deposit = max($subTotal * 0.20, 0); // Đảm bảo giá trị >= 0

        // Lấy thông tin user hiện tại
        $user = Auth::user();

        // Lấy địa chỉ xem xe từ bảng company_profiles
        $companyAddress = CompanyProfile::value('address');

        return view('user.shop.checkout', compact('cart', 'subTotal', 'deposit', 'user', 'companyAddress'));
    }

    // Xử lý đơn đặt cọc
    public function process(Request $request)
    {
        $cart = session('cart', []);

        if (!$cart || empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        $request->validate([
            'fullName'    => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'phone'       => 'required|string|max:20',
            'notes'       => 'nullable|string',
        ]);

        // Tính tổng tiền đặt cọc
        $subTotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $deposit = max($subTotal * 0.20, 0);

        // Lấy thông tin công ty từ bảng `company_profiles`
        $company = CompanyProfile::first(); // Lấy thông tin công ty
        $companyAddress = $company ? $company->address : 'N/A';

        // Lưu đơn hàng vào database
        $order = Order::create([
            'user_id'     => auth()->id(),
            'total_price' => $deposit,
            'status'      => 'Pending',
            'notes'       => $request->notes,
        ]);
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'car_id'   => $item['id'], // Giả sử ID xe được lưu trong giỏ hàng
                'quantity' => $item['quantity'],
                'price'    => $item['price'],
            ]);
        }
        // Lưu mã đơn hàng vào sessions
        session(['order_id' => $order->id]);

        // Xóa giỏ hàng sau khi đặt cọc
        session()->forget('cart');

        return redirect()->route('user.payment', $order->id);
    }


    public function checkoutSuccess(Request $request, $id)
    {
        $user = Auth::user();
        $order = Order::find($id);
        $company = CompanyProfile::first();

        // Check session to remove order id
        session()->forget('order_id');

        return view('user.shop.checkout_success', compact('user', 'order', 'company'));
    }
}
