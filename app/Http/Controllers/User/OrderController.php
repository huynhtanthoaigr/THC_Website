<?php 
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Order;
use App\Models\CompanyProfile;
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
        
        // Lấy thông tin công ty (giả sử chỉ có 1 bản ghi)
        $company = CompanyProfile::first();
    
        return view('user.orders.show', compact('order', 'company'));
    }

}
