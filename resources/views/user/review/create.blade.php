@extends('layouts.guest.app')

@section('content')
    <div class="container mt-5">
        <h2>Đánh giá xe: {{ $car->name }}</h2>

        <form action="{{ route('user.reviews.store') }}" method="POST">
            @csrf
            <input type="hidden" name="car_id" value="{{ $car->id }}">

            <div class="mb-3">
                <label for="rating">Chọn số sao:</label>
                <select name="rating" class="form-control">
                    <option value="5">⭐⭐⭐⭐⭐ - Tuyệt vời</option>
                    <option value="4">⭐⭐⭐⭐ - Tốt</option>
                    <option value="3">⭐⭐⭐ - Bình thường</option>
                    <option value="2">⭐⭐ - Kém</option>
                    <option value="1">⭐ - Rất kém</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="comment">Nhận xét:</label>
                <textarea name="comment" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Gửi đánh giá</button>
        </form>
    </div>
@endsection
