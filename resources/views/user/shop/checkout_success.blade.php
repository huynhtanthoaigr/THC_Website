@extends('layouts.guest.app')

@section('title', 'Checkout Success - Motex Car Dealer')

@section('content')
<main class="main">
    <!-- Breadcrumb -->
    <div class="site-breadcrumb" style="background: url({{ asset('assets/img/breadcrumb/01.jpg') }})">
        <div class="container">
            <h2 class="breadcrumb-title">Checkout Success</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">Checkout Success</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <div class="checkout-success py-5">
        <div class="container">
            <div class="invoice-wrapper p-4 shadow-lg rounded bg-white">
                <!-- Logo & Thông Tin Hóa Đơn -->
                <div class="text-center mb-4">
                    <img src="{{ $company && $company->logo ? asset('storage/' . $company->logo) : asset('default-logo.png') }}" alt="Company Logo" width="120">
                    <h3 class="mt-2 text-primary">HÓA ĐƠN ĐẶT CỌC</h3>
                    <p class="text-muted">Cảm ơn bạn đã tin tưởng Motex Car Dealer!</p>
                </div>

                <!-- Thông Tin Đơn Hàng -->
                <div class="order-details">
                    <h5 class="mb-3">Thông Tin Đơn Hàng</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th>Mã Đơn Hàng:</th>
                            <td>#{{ $order->id }}</td>
                        </tr>
                        <tr>
                            <th>Ngày Đặt:</th>
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Tạm Tính:</th>
                            <td>${{ number_format($order->total_price / 0.2, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Đặt Cọc (20%):</th>
                            <td>${{ number_format($order->total_price, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Tổng Đặt Cọc:</th>
                            <td><strong class="text-success">${{ number_format($order->total_price, 2) }}</strong></td>
                        </tr>
                    </table>
                </div>

                <!-- Thông Tin Khách Hàng -->
                <div class="customer-details mt-4">
                    <h5 class="mb-3">Thông Tin Khách Hàng</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th>Họ Tên:</th>
                            <td>{{ auth()->user()->name }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ auth()->user()->email }}</td>
                        </tr>
                        <tr>
                            <th>Số Điện Thoại:</th>
                            <td>{{ auth()->user()->phone }}</td>
                        </tr>
                        <tr>
                            <th>Địa Chỉ Xem Xe:</th>
                            <td>{{ $company->address }}</td>
                        </tr>
                        @if(!empty($order->notes))
                        <tr>
                            <th>Ghi Chú:</th>
                            <td>{{ $order->notes }}</td>
                        </tr>
                        @endif
                    </table>
                </div>

                <!-- QR Code Hoặc Nút Tải Xuống -->
                <div class="text-center mt-4">
                    <a href="#" class="btn btn-primary mt-2"><i class="fas fa-download"></i> Tải Xuống Hóa Đơn</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
