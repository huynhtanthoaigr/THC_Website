@extends('layouts.guest.app')

@section('content')
    <div class="container mt-5">
        <h2>Đánh giá đơn hàng #{{ $order->id }}</h2>

        <form action="{{ route('user.reviews.store') }}" method="POST">
            @csrf

            @foreach ($order->orderItems as $item)
                <div class="mb-4">
                    <h5>Xe: {{ $item->car->name ?? 'N/A' }}</h5>

                    <input type="hidden" name="car_id" value="{{ $item->car_id }}">

                    <label for="rating">Chọn số sao:</label>
                    <select name="rating" class="form-control">
                        <option value="5">⭐⭐⭐⭐⭐ - Tuyệt vời</option>
                        <option value="4">⭐⭐⭐⭐ - Tốt</option>
                        <option value="3">⭐⭐⭐ - Bình thường</option>
                        <option value="2">⭐⭐ - Kém</option>
                        <option value="1">⭐ - Rất kém</option>
                    </select>

                    <label for="comment">Nhận xét:</label>
                    <textarea name="comment" class="form-control" rows="3"></textarea>
                </div>
            @endforeach

            <button type="submit" class="btn btn-success">Gửi đánh giá</button>
        </form>
    </div>
@endsection
