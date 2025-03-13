@extends('layouts.guest.app')

@section('title', 'Checkout - Motex Car Dealer')

@section('content')
    <main class="main">
        <!-- breadcrumb -->
        <div class="site-breadcrumb" style="background: url({{ asset('assets/img/breadcrumb/01.jpg') }})">
            <div class="container">
                <h2 class="breadcrumb-title">Checkout</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb end -->

        <!-- checkout area -->
        <div class="checkout-confirmation py-5">
            <div class="d-flex justify-content-center">
                <div class="border p-3 custom-border position-relative">
                    <!-- Các góc viền -->
                    <div class="corner-top-left"></div>
                    <div class="corner-bottom-right"></div>
                    <div class="d-flex justify-content-center mb-1">
                        <img decoding="async" id="img_qr_code" class="img-fluid rounded"
                            src="https://qr.sepay.vn/img?acc=79678988889999&amp;bank=MBBank&amp;amount={{ $order->total_price }}&amp;des={{ $order->id }}&amp;template=compact"
                            alt="QR Code">
                    </div>
                </div>
            </div>
        </div>
        <!-- checkout area end -->
    </main>

    <script>
        function checkStatus() {
            fetch(`{{ route('user.check.status', $order->id) }}`)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'processing') {
                        window.location.href = `{{ route('user.checkout.success', $order->id) }}`;
                    } else {
                        console.log(data.status);
                    }
                });
        }
        setInterval(checkStatus, 2000);
    </script>
@endsection
