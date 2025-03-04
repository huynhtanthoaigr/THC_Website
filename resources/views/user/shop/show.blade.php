@extends('layouts.guest.app')

@section('content')
    <main class="main">
        <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/01.jpg)">
            <div class="container">
                <h2 class="breadcrumb-title">Shop Single</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="active">Shop Single</li>
                </ul>
            </div>
        </div>
        <div class="shop-item-single bg py-120">
            <div class="container">
                <div class="row">
                    <!-- Gallery: hiển thị ảnh động từ car_images -->
                    <div class="col-lg-6">
                        <div class="item-gallery mb-5">
                            <div class="flexslider-thumbnails">
                                <ul class="slides">
                                    @if($carDetail->car->images && $carDetail->car->images->isNotEmpty())
                                        @foreach($carDetail->car->images as $image)
                                            <li data-thumb="{{ asset('storage/' . $image->image_url) }}" rel="adjustX:10, adjustY:">
                                                <img src="{{ asset('storage/' . $image->image_url) }}"
                                                    alt="{{ $carDetail->car->name }}">
                                            </li>
                                        @endforeach
                                    @else
                                        <li data-thumb="{{ asset('storage/default-image.jpg') }}" rel="adjustX:10, adjustY:">
                                            <img src="{{ asset('storage/default-image.jpg') }}" alt="No image available">
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Thông tin sản phẩm -->
                    <div class="col-lg-6">
                        <div class="single-item-info">
                            <h4 class="single-item-title">{{ $carDetail->car->name }}</h4>
                            <div class="single-item-price">
                                <h4>
                                    <span>${{ number_format($carDetail->car->price, 2) }}</span>
                                </h4>
                            </div>
                            <p class="mb-4">{{ $carDetail->features }}</p>
                            <div class="single-item-content">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>Engine</th>
                                                <td>{{ $carDetail->engine }}</td>
                                                <th>Horsepower</th>
                                                <td>{{ $carDetail->horsepower }}</td>
                                            </tr>
                                            <tr>
                                                <th>Torque</th>
                                                <td>{{ $carDetail->torque }}</td>
                                                <th>Fuel Capacity</th>
                                                <td>{{ $carDetail->fuel_capacity }}</td>
                                            </tr>
                                            <tr>
                                                <th>Dimensions</th>
                                                <td>{{ $carDetail->dimensions }}</td>
                                                <th>Weight</th>
                                                <td>{{ $carDetail->weight }}</td>
                                            </tr>
                                            <tr>
                                                <th>Warranty</th>
                                                <td>{{ $carDetail->warranty }}</td>
                                                <th>Model Year</th>
                                                <td>{{ $carDetail->car->model_year }}</td>
                                            </tr>
                                            <tr>
                                                <th>Mileage</th>
                                                <td>{{ $carDetail->car->mileage }} km</td>
                                                <th>Transmission</th>
                                                <td>{{ $carDetail->car->transmission }}</td>
                                            </tr>
                                            <tr>
                                                <th>Fuel Type</th>
                                                <td>{{ $carDetail->car->fuel_type }}</td>
                                                <th>Color</th>
                                                <td>{{ $carDetail->car->color }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="single-item-action" style="text-align: right;">
                                <div class="item-single-btn-area">
                                    <form action="{{ route('cart.add', $carDetail->car->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        <button type="submit" class="theme-btn">
                                            <span class="far fa-shopping-cart"></span> Add to cart
                                        </button>
                                    </form>
                                    <a href="#" class="single-item-btn"><i class="far fa-heart"></i></a>
                                    <a href="#" class="single-item-btn"><i class="far fa-exchange-alt"></i></a>
                                </div>

                            </div>
                            <div class="row align-items-center
                                    single-item-content">
                                <div class="col-md-6">
                                    <h5>Category: <span>{{ $carDetail->car->category->name ?? 'N/A' }}</span></h5>
                                    <h5>Tags: <span>{{ $carDetail->car->tags ?? 'Car, Shop, Parts' }}</span></h5>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    <div class="single-item-share">
                                        <span>Share:</span>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>

                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                <!-- Tab Section -->
                <div class="single-item-details">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-tab1" data-bs-toggle="tab" data-bs-target="#tab1"
                                type="button" role="tab" aria-controls="tab1" aria-selected="true">Description</button>
                            <button class="nav-link" id="nav-tab3" data-bs-toggle="tab" data-bs-target="#tab3" type="button"
                                role="tab" aria-controls="tab3" aria-selected="false">Reviews (05)</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="nav-tab1">
                            <div class="single-item-desc">
                                <p>{{ $carDetail->car->description }}</p>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="nav-tab3">
                            <div class="single-item-review">
                                <!-- Reviews Section -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection