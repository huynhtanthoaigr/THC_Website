<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Car;
use App\Models\Order; // Thêm dòng này để import mô hình Order

class ReviewController extends Controller
{
    public function create($car_id)
    {
        $car = Car::findOrFail($car_id);
        $order = Order::where('user_id', auth()->id())->where('status', 'pending')->first(); // Hoặc điều kiện khác tuỳ theo ứng dụng của bạn

        return view('user.review.create', compact('car', 'order'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string'
        ]);

        // Kiểm tra xem đã đánh giá chưa
        $existingReview = Review::where('user_id', auth()->id())
            ->where('car_id', $request->car_id)
            ->first();

        if ($existingReview) {
            return redirect()->back()->with('error', 'Bạn đã đánh giá xe này rồi!');
        }

        // Tạo đánh giá mới
        Review::create([
            'user_id' => auth()->id(),
            'car_id' => $request->car_id,
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);

        return redirect()->route('user.orders.index')->with('success', 'Cảm ơn bạn đã đánh giá!');
    }
}
