@extends('layouts.guest.app')

@section('content')
    <main class="main">
        <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/01.jpg)">
            <div class="container">
                <h2 class="breadcrumb-title">Listing Grid</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Listing Grid</li>
                </ul>
            </div>
        </div>
        <div class="container mt-4">
            <h2 class="mb-4">Chi tiết đơn hàng #{{ $order->id }}</h2>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Thông tin</th>
                            <th>Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Ngày tạo:</strong></td>
                            <td>{{ $order->created_at->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <td><strong>Trạng thái:</strong></td>
                            <td>
                                <span class="badge 
                                {{ $order->status == 'confirmed' ? 'bg-success' :
        ($order->status == 'processing' ? 'bg-warning' : 'bg-secondary') }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Tổng tiền:</strong></td>
                            <td>{{ number_format($order->total_price, 0, ',', '.') }} VNĐ</td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <h4 class="mb-3">Danh sách xe trong đơn hàng</h4>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Xe</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Tổng giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderItems as $item)
                            <tr>
                                <td>{{ $item->car->name ?? 'N/A' }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->price, 0, ',', '.') }} VNĐ</td>
                                <td>{{ number_format($item->quantity * $item->price, 0, ',', '.') }} VNĐ</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <a href="{{ route('user.orders.index') }}" class="btn"
                style="background-color: #ed1d26; color: white; padding: 10px 20px; font-size: 16px; border-radius: 5px; margin-bottom: 20px;">
                Quay lại danh sách đơn hàng
            </a>

        </div>
    </main>
@endsection