@extends('layouts.guest.app')

@section('content')
    <main class="main">
    @php
        // Get the first breadcrumb record
        $breadcrumb = \App\Models\Breadcrumb::first();
        // Use its background image if available, otherwise use default
        $backgroundImage = $breadcrumb ? asset($breadcrumb->background_image) : asset('assets/img/breadcrumb/01.jpg');
    @endphp

    <!-- Breadcrumb section -->
    <div class="site-breadcrumb"
         style="background: url('{{ $backgroundImage }}') no-repeat center center; background-size: cover;">
        <div class="container">
            <h2 class="breadcrumb-title">Listing Grid</h2>
            <ul class="breadcrumb-menu">
                <li><a href="/">Home</a></li>
                <li class="active">Orders</li>
            </ul>
        </div>
    </div>

    <!-- Orders list section -->
    <div class="container mt-4">
        <h2 class="mb-4">Your Order List</h2>

        @if($orders->isEmpty())
            <p>You have no orders yet.</p>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Created Date</th>
                            <th>Status</th>
                            <th>Total Amount</th>
                            <th>Details</th>
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
                                    <a href="{{ route('user.orders.show', $order->id) }}" class="btn btn-info btn-sm">
                                        View Details
                                    </a>
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
