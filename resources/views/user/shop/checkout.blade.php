@extends('layouts.guest.app')

@section('title', 'Checkout - Motex Car Dealer')

@section('content')
<main class="main">
    <!-- breadcrumb -->
    <div class="site-breadcrumb" style="background: url({{ asset('assets/img/breadcrumb/01.jpg') }})">
        <div class="container">
            <h2 class="breadcrumb-title">Checkout</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">Checkout</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- checkout area -->
    <div class="checkout-area py-120">
        <div class="container">
            <div class="row">
                <!-- Thông tin khách hàng (Form đặt cọc) -->
                <div class="col-lg-6">
                    <div class="checkout-billing">
                        <h3>Thông Tin Khách Hàng</h3>
                        <form action="{{ route('checkout.process') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Họ Tên *</label>
                                <input type="text" class="form-control" id="fullName" name="fullName"
                                    value="{{ $user->name }}" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $user->email }}" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Số Điện Thoại *</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ $user->phone }}" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="viewAddress" class="form-label">Địa Chỉ Xem Xe *</label>
                                <input type="text" class="form-control" id="viewAddress" name="viewAddress"
                                    value="{{ $companyAddress }}" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="notes" class="form-label">Ghi Chú (nếu có)</label>
                                <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                            </div>
                            <button type="submit" class="theme-btn">Đặt Cọc & Đặt Xe</button>
                        </form>
                    </div>
                </div>
                <!-- Tóm tắt đơn hàng (Bill) -->
                <div class="col-lg-6">
                    <div class="order-summary">
                        <h3>Đơn Hàng Của Bạn</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sản Phẩm</th>
                                        <th>Số Lượng</th>
                                        <th>Tạm Tính</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(session('cart') as $id => $item)
                                        <tr>
                                            <td>{{ $item['name'] }}</td>
                                            <td>{{ $item['quantity'] }}</td>
                                            <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2"><strong>Tạm Tính:</strong></td>
                                        <td><strong>${{ number_format($subTotal, 2) }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>Đặt Cọc (20%):</strong></td>
                                        <td><strong>${{ number_format($deposit, 2) }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-end"><strong>Tổng Đặt Cọc:</strong></td>
                                        <td><strong>${{ number_format($deposit, 2) }}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p>Lưu ý: Đây là đơn hàng đặt cọc. Bạn không thanh toán toàn bộ ngay lúc này. Xe của bạn sẽ được giữ chỗ và bạn sẽ nhận hướng dẫn thanh toán phần còn lại sau khi xem xe.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout area end -->
</main>
@endsection
