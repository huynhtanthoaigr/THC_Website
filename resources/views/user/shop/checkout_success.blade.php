@extends('layouts.guest.app')

@section('title', 'Checkout Success - Motex Car Dealer')

@section('content')
<main class="main">
    <!-- breadcrumb -->
    <div class="site-breadcrumb" style="background: url({{ asset('assets/img/breadcrumb/01.jpg') }})">
        <div class="container">
            <h2 class="breadcrumb-title">Checkout Success</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">Checkout Success</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->

    <div class="checkout-success py-120">
        <div class="container">
            <h3>Thank you for your deposit!</h3>
            <p>Your order has been received. Please review your order details below and await further instructions.</p>
            <div class="order-summary">
                <ul>
                    <li><strong>Tạm Tính:</strong> ${{ number_format($order['subTotal'], 2) }}</li>
                    <li><strong>Đặt Cọc (20%):</strong> ${{ number_format($order['deposit'], 2) }}</li>
                    <li class="order-total"><strong>Tổng Đặt Cọc:</strong> ${{ number_format($order['deposit'], 2) }}</li>
                </ul>
            </div>
            <div class="order-details mt-4">
                <h5>Thông Tin Khách Hàng:</h5>
                <p><strong>Họ Tên:</strong> {{ $order['customer']['fullName'] }}</p>
                <p><strong>Email:</strong> {{ $order['customer']['email'] }}</p>
                <p><strong>Số Điện Thoại:</strong> {{ $order['customer']['phone'] }}</p>
                <p><strong>Địa Chỉ Xem Xe:</strong> {{ $order['customer']['viewAddress'] }}</p>
                @if(!empty($order['customer']['notes']))
                    <p><strong>Ghi Chú:</strong> {{ $order['customer']['notes'] }}</p>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection
