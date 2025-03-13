<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index($id)
    {
        $order = Order::find($id);
        return view('user.shop.payment', compact('order'));
    }

    public function checkStatus($id)
    {
        $order = Order::where('id', $id)->first();
        return response()->json(['status' => $order ? $order->status : 'not found']);
    }
}
