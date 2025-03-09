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

            <div class="d-flex  gap-3 mt-4 mb-4">
    @if ($order->status == 'confirmed')
        @php
            $review = \App\Models\Review::where('user_id', auth()->id())
                ->where('car_id', $item->car_id)
                ->first();
        @endphp

        @if ($review)
            <button class="btn btn-outline-secondary px-4 py-2 fw-bold rounded-pill" disabled>
                <i class="fas fa-check-circle"></i> Đã đánh giá
            </button>
        @else
            <a href="{{ route('user.reviews.create', ['order_id' => $item->car_id]) }}" 
                class="btn btn-outline-primary px-4 py-2 fw-bold rounded-pill">
                <i class="fas fa-star"></i> Đánh giá
            </a>
        @endif
    @endif

    <a href="{{ route('user.orders.index') }}" 
        class="btn btn-danger px-4 py-2 fw-bold rounded-pill">
        <i class="fas fa-arrow-left"></i> Quay lại danh sách đơn hàng
    </a>
</div>


        </div>
    </main>
@endsection