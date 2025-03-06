<?php 
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get(); // Lấy tất cả đơn hàng của người dùng hiện tại
        return view('user.orders.index', compact('orders'));
    }
    public function show($id)
{
    $order = Order::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
    return view('user.orders.show', compact('order'));
}

}
