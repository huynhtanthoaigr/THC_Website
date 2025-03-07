@extends('layouts.admin.app')

@section('content')
<div class="container-fluid mt-5">
    <h2 class="mb-4 text-center"><i class="fas fa-file-invoice"></i> Chi tiết đơn hàng #{{ $order->id }}</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th colspan="2" class="text-center text-light"><i class="fas fa-info-circle"></i> Thông tin đơn hàng</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong><i class="fas fa-user"></i> Khách hàng:</strong></td>
                    <td>{{ $order->user->name ?? 'Khách' }}</td>
                </tr>
                <tr>
                    <td><strong><i class="fas fa-envelope"></i> Email:</strong></td>
                    <td>{{ $order->user->email ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><strong><i class="fas fa-tags"></i> Trạng thái:</strong></td>
                    <td>
                        @if($order->status == 'pending')
                            <span class="badge bg-warning text-dark"><i class="fas fa-clock"></i> Đang chờ</span>
                        @elseif($order->status == 'processing')
                            <span class="badge bg-info"><i class="fas fa-sync-alt"></i> Đang xử lý</span>
                        @elseif($order->status == 'confirmed')
                            <span class="badge bg-success"><i class="fas fa-check-circle"></i> Đã xác nhận</span>
                        @else
                            <span class="badge bg-secondary">{{ ucfirst($order->status) }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td><strong><i class="fas fa-dollar-sign"></i> Tổng tiền:</strong></td>
                    <td class="text-success fw-bold">{{ number_format($order->total_price, 0, ',', '.') }} VNĐ</td>
                </tr>
            </tbody>
        </table>
    </div>

    <h4 class="mt-4"><i class="fas fa-car"></i> Danh sách xe đặt cọc</h4>
    <div class="table-responsive">
        <table class="table table-hover table-bordered shadow-sm">
            <thead class="table-info text-center">
                <tr>
                    <th><i class="fas fa-car-side"></i> Xe</th>
                    <th><i class="fas fa-sort-numeric-up"></i> Số lượng</th>
                    <th><i class="fas fa-money-bill-wave"></i> Giá</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderItems as $item)
                <tr class="align-middle text-center">
                    <td>{{ $item->car->name ?? 'N/A' }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td class="text-danger fw-bold">{{ number_format($item->price, 0, ',', '.') }} $</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <h5><i class="fas fa-edit"></i> Cập nhật trạng thái đơn hàng</h5>
        <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="d-flex align-items-center gap-3">
            @csrf
            <div class="form-group">
                <label for="status" class="fw-bold"><i class="fas fa-tasks"></i> Trạng thái:</label>
                <select name="status" class="form-control">
                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Đang chờ</option>
                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Đang xử lý</option>
                    <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>Đã xác nhận</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cập nhật</button>
        </form>
    </div>

    <div class="mt-4 d-flex justify-content-end">
        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Quay lại danh sách</a>
    </div>
</div>
@endsection

@section('styles')
<style>
    .table {
        border-radius: 10px;
        overflow: hidden;
    }

    .badge {
        font-size: 0.9rem;
        padding: 5px 10px;
    }

    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
    }

    .btn-primary, .btn-secondary {
        transition: 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-secondary:hover {
        background-color: #6c757d;
    }
</style>
@endsection
