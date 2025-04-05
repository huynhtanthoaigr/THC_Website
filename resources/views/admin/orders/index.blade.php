@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4"><i class="fas fa-list"></i> Order List</h2>

    <!-- Search Bar -->
    <div class="mb-3 d-flex justify-content-end">
        <input type="text" id="searchInput" class="form-control w-25" placeholder="Search orders...">
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered" id="ordersTable">
            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th><i class="fas fa-user"></i> Customer</th>
                    <th><i class="fas fa-dollar-sign"></i> Total Price</th>
                    <th><i class="fas fa-info-circle"></i> Status</th>
                    <th><i class="fas fa-calendar-alt"></i> Order Date</th>
                    <th><i class="fas fa-cogs"></i> Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr class="align-middle text-center">
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name ?? 'Guest' }}</td>
                    <td class="text-success fw-bold">${{ number_format($order->total_price, 2, '.', ',') }}</td>
                    <td>
                        @if($order->status == 'Pending')
                            <span class="badge bg-warning text-dark"><i class="fas fa-hourglass-half"></i> {{ $order->status }}</span>
                        @elseif($order->status == 'Confirmed')
                            <span class="badge bg-success"><i class="fas fa-check-circle"></i> {{ $order->status }}</span>
                        @elseif($order->status == 'Cancelled')
                            <span class="badge bg-danger"><i class="fas fa-times-circle"></i> {{ $order->status }}</span>
                        @else
                            <span class="badge bg-secondary">{{ $order->status }}</span>
                        @endif
                    </td>
                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i> View
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

@section('scripts')
<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#ordersTable tbody tr');
        
        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });
</script>
@endsection