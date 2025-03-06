@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Danh sách đơn hàng</h2>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Khách hàng</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Ngày đặt</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name ?? 'Khách' }}</td>
                    <td>{{ number_format($order->total_price, 0, ',', '.') }} $ </td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info btn-sm">Xem</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $orders->links() }}
</div>
@endsection

@section('styles')
<style>
    .container-fluid {
        padding-left: 0;
        padding-right: 0;
    }

    .table-responsive {
        margin-left: 0;
        margin-right: 0;
    }
</style>
@endsection
