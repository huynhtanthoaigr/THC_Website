@extends('layouts.guest.app')

@section('content')
@php
            $breadcrumb = \App\Models\Breadcrumb::first();
            $backgroundImage = $breadcrumb ? asset($breadcrumb->background_image) : asset('assets/img/breadcrumb/01.jpg');
        @endphp

        <div class="site-breadcrumb"
            style="background: url('{{ $backgroundImage }}') no-repeat center center; background-size: cover;">
            <div class="container">
                <h2 class="breadcrumb-title">Listing Grid</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="/">Home</a></li>
                    <li class="active">Detaials Oders</li>
                </ul>
            </div>
        </div>

    <div class="container my-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header" style="background-color: #ee1d26; color: white; border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                <h3 class="mb-0 text-center">Đánh giá xe: {{ $car->name }}</h3>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('user.reviews.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="car_id" value="{{ $car->id }}">

                    <div class="mb-4">
                        <label for="rating" class="form-label fw-bold" style="color: #ee1d26;">Chọn số sao:</label>
                        <select name="rating" class="form-select shadow-sm">
                            <option value="5">⭐⭐⭐⭐⭐ - Tuyệt vời</option>
                            <option value="4">⭐⭐⭐⭐ - Tốt</option>
                            <option value="3">⭐⭐⭐ - Bình thường</option>
                            <option value="2">⭐⭐ - Kém</option>
                            <option value="1">⭐ - Rất kém</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="comment" class="form-label fw-bold" style="color: #ee1d26;">Nhận xét:</label>
                        <textarea name="comment" class="form-control shadow-sm" rows="4" placeholder="Hãy chia sẻ trải nghiệm của bạn..."></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn" style="background-color: #ee1d26; color: white; padding-left: 30px; padding-right: 30px; border-radius: 50px;">
                            <i class="fas fa-paper-plane"></i> Gửi đánh giá
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
