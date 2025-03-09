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
            <h2 class="mb-4">Danh sách đơn hàng của bạn</h2>

            @if($orders->isEmpty())
                <p>Chưa có đơn hàng nào.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID Đơn Hàng</th>
                                <th>Ngày Tạo</th>
                                <th>Trạng Thái</th>
                                <th>Tổng Tiền</th>
                                <th>Chi Tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <span class="badge 
                                            @if($order->status == 'confirmed') 
                                                bg-success 
                                            @elseif($order->status == 'processing') 
                                                bg-warning 
                                            @else 
                                                bg-secondary 
                                            @endif">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td>{{ number_format($order->total_price, 0, ',', '.') }} $</td>
                                    <td>
                                        <a href="{{ route('user.orders.show', $order->id) }}" class="btn btn-info btn-sm">Xem chi
                                            tiết</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </main>
@endsection