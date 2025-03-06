@extends('layouts.admin.app')

@section('content')
<div class="container-fluid mt-5">
    <h2 class="mb-4 text-center">Chi tiết đơn hàng #{{ $order->id }}</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th colspan="2" class="text-center text-primary">Thông tin đơn hàng</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Khách hàng:</strong></td>
                    <td>{{ $order->user->name ?? 'Khách' }}</td>
                </tr>
                <tr>
                    <td><strong>Email:</strong></td>
                    <td>{{ $order->user->email ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><strong>Trạng thái:</strong></td>
                    <td>{{ ucfirst($order->status) }}</td>
                </tr>
                <tr>
                    <td><strong>Tổng tiền:</strong></td>
                    <td>{{ number_format($order->total_price, 0, ',', '.') }} VNĐ</td>
                </tr>
            </tbody>
        </table>
    </div>

    <h4 class="mt-4">Danh sách xe đặt cọc</h4>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Xe</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderItems as $item)
                <tr>
                    <td>{{ $item->car->name ?? 'N/A' }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 0, ',', '.') }} VNĐ</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <h5>Cập nhật trạng thái đơn hàng</h5>
        <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="form-inline">
            @csrf
            <div class="form-group mr-3">
                <label for="status" class="mr-2">Trạng thái:</label>
                <select name="status" class="form-control w-50">
                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Đang chờ</option>
                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Đang xử lý</option>
                    <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>Đã xác nhận</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>

    <div class="mt-4 d-flex justify-content-end">
    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
</div>

</div>
@endsection
