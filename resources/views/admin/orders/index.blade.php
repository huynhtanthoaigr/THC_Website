@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4"><i class="fas fa-list"></i> Danh sách đơn hàng</h2>

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th><i class="fas fa-user"></i> Khách hàng</th>
                    <th><i class="fas fa-dollar-sign"></i> Tổng tiền</th>
                    <th><i class="fas fa-info-circle"></i> Trạng thái</th>
                    <th><i class="fas fa-calendar-alt"></i> Ngày đặt</th>
                    <th><i class="fas fa-cogs"></i> Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr class="align-middle text-center">
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name ?? 'Khách' }}</td>
                    <td class="text-success fw-bold">{{ number_format($order->total_price, 0, ',', '.') }} $</td>
                    <td>
                        @if($order->status == 'Chờ xử lý')
                            <span class="badge bg-warning text-dark"><i class="fas fa-hourglass-half"></i> {{ $order->status }}</span>
                        @elseif($order->status == 'Đã xác nhận')
                            <span class="badge bg-success"><i class="fas fa-check-circle"></i> {{ $order->status }}</span>
                        @elseif($order->status == 'Đã hủy')
                            <span class="badge bg-danger"><i class="fas fa-times-circle"></i> {{ $order->status }}</span>
                        @else
                            <span class="badge bg-secondary">{{ $order->status }}</span>
                        @endif
                    </td>
                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i> Xem
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $orders->links() }}
    </div>
</div>
@endsection

@section('styles')
<style>
    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
    }
    
    .table thead th {
        vertical-align: middle;
    }
    
    .badge {
        font-size: 0.9rem;
        padding: 5px 10px;
    }
</style>
@endsection
