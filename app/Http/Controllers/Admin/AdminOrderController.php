<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;

class AdminOrderController extends Controller
{
    // Hiển thị danh sách đơn hàng
    public function index()
    {
        $orders = Order::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    // Hiển thị chi tiết đơn hàng
    public function show($id)
    {
        $order = Order::with(['user', 'orderItems.car'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    // Cập nhật trạng thái đơn hàng
    public function updateStatus(Request $request, $id)
{
    // Kiểm tra trạng thái có hợp lệ không
    $request->validate([
        'status' => 'required|in:pending,processing,confirmed', // Các giá trị hợp lệ cho trạng thái
    ]);

    // Tìm đơn hàng theo ID
    $order = Order::findOrFail($id);
    
    // Cập nhật trạng thái
    $order->status = $request->status;
    $order->save();

    // Trả về thông báo thành công
    return redirect()->back()->with('success', 'Cập nhật trạng thái thành công!');
}

    

}
