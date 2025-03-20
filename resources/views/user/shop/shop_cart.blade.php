@extends('layouts.guest.app')

@section('title', 'Shop Cart - Motex Car Dealer')

@section('content')
    <main class="main">

        <!-- breadcrumb -->
        @php
            $breadcrumb = \App\Models\Breadcrumb::first();
            $backgroundImage = $breadcrumb ? asset($breadcrumb->background_image) : asset('assets/img/breadcrumb/01.jpg');
        @endphp

        <div class="site-breadcrumb"
            style="background: url('{{ $backgroundImage }}') no-repeat center center; background-size: cover;">
            <div class="container">
                <h2 class="breadcrumb-title">Listing Grid</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="/">Home</a></li>
                    <li class="active">Shop Car</li>
                </ul>
            </div>
        </div>

        <!-- breadcrumb end -->

        <!-- shop cart -->
        <div class="shop-cart py-120">
            <div class="container">
                <div class="shop-cart-wrapper">
                    @if(session('cart') && count(session('cart')) > 0)
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Product Name</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Sub Total</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $subTotal = 0; @endphp
                                                @foreach(session('cart') as $id => $item)
                                                                        @php
                                                                            $itemSubtotal = $item['price'] * $item['quantity'];
                                                                            $subTotal += $itemSubtotal;
                                                                        @endphp
                                                                        <tr>
                                                                            <td>
                                                                                <div class="cart-img">
                                                                                    <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}">
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <h5>{{ $item['name'] }}</h5>
                                                                            </td>
                                                                            <td>
                                                                                <div class="cart-price">
                                                                                    <span>${{ number_format($item['price'], 2) }}</span>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="cart-qty">
                                                                                    <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex">
                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <button type="submit" name="action" value="decrement" class="minus-btn"><i
                                                                                                class="fal fa-minus"></i></button>
                                                                                        <input class="quantity" type="text" name="quantity"
                                                                                            value="{{ $item['quantity'] }}" readonly
                                                                                            style="width:50px; text-align:center;">
                                                                                        <button type="submit" name="action" value="increment" class="plus-btn"><i
                                                                                                class="fal fa-plus"></i></button>
                                                                                    </form>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="cart-sub-total">
                                                                                    <span>${{ number_format($itemSubtotal, 2) }}</span>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <a href="javascript:void(0)" onclick="this.closest('form').submit()"
                                                                                        class="cart-remove"><i class="far fa-times"></i></a>
                                                                                </form>
                                                                            </td>
                                                                        </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Cart Footer -->
                                    <div class="cart-footer">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-4">
                                                <div class="cart-coupon">
                                                    <form action="{{ route('cart.coupon') }}" method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="coupon"
                                                                placeholder="Your Coupon Code">
                                                            <button class="coupon-btn" type="submit">Apply <i
                                                                    class="fas fa-arrow-right-long"></i></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-8">
                                                <div class="cart-summary">
                                                    <ul>
                                                        <li><strong>Sub Total:</strong> <span>${{ number_format($subTotal, 2) }}</span></li>
                                                        @php
                                                            // Giả sử VAT 5% và discount có thể lưu trong session('discount')
                                                            $vat = $subTotal * 0.05;
                                                            $discount = session('discount') ?? 0;
                                                            $total = $subTotal + $vat - $discount;
                                                        @endphp
                                                        <li><strong>Vat (5%):</strong> <span>${{ number_format($vat, 2) }}</span></li>
                                                        <li><strong>Discount:</strong> <span>${{ number_format($discount, 2) }}</span></li>
                                                        <li class="cart-total"><strong>Total:</strong>
                                                            <span>${{ number_format($total, 2) }}</span>
                                                        </li>
                                                    </ul>
                                                    <div class="text-end mt-40">
                                                        <a href="{{ route('checkout') }}" class="theme-btn">Checkout Now <i
                                                                class="fas fa-arrow-right-long"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    @else
                        <div class="alert alert-info">
                            Your cart is empty.
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- shop cart end -->
    </main>
@endsection