@extends('layouts.guest.app')

@section('title', 'Shop Car - Motex Car Dealer')

@section('content')
<main class="main">

    @php
        $breadcrumb = \App\Models\Breadcrumb::first();
        $backgroundImage = $breadcrumb ? asset($breadcrumb->background_image) : asset('assets/img/breadcrumb/01.jpg');
    @endphp

    <div class="site-breadcrumb"
        style="background: url('{{ $backgroundImage }}') no-repeat center center; background-size: cover;">
        <div class="container">
            <h2 class="breadcrumb-title">
                @if(isset($category))
                    {{ $category->name }}
                @else
                    Shop Car
                @endif
            </h2>
            <ul class="breadcrumb-menu">
                <li><a href="/">Home</a></li>
                <li class="active">Shop</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- car area -->
    <div class="car-area grid bg py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="car-sidebar">
                        <!-- Search bar -->
                        <div class="car-widget">
                            <div class="car-search-form">
                                <h4 class="car-widget-title">Search Car</h4>
                                <form action="{{ route('user.shop.index') }}" method="GET">
                                    <div class="form-group">
                                        <input type="text" name="search" class="form-control"
                                            placeholder="Enter car name..." value="{{ request('search') }}">
                                        <button type="submit">
                                            <i class="far fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <form action="{{ route('user.shop.index') }}" method="GET">
                            <!-- Filter by brand -->
                            <div class="car-widget">
                                <h4 class="car-widget-title">Brand</h4>
                                <ul>
                                    @foreach ($brands as $brand)
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="brands[]"
                                                    value="{{ $brand->id }}" {{ in_array($brand->id, request('brands', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label">{{ $brand->name }}</label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Filter by price range -->
                            <div class="car-widget">
                                <h4 class="car-widget-title">Price Range</h4>

                                <!-- Hidden inputs for submitting min/max price -->
                                <input type="hidden" name="min_price" id="min_price" value="{{ request('min_price') }}">
                                <input type="hidden" name="max_price" id="max_price" value="{{ request('max_price') }}">

                                <ul>
                                    @foreach ($priceRanges as $range)
                                        @php
                                            $checked = request('min_price') == $range['min'] &&
                                                       (request('max_price') == $range['max'] || ($range['max'] === null && request('max_price') === null));
                                        @endphp
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input price-range-radio" type="radio" name="price_range"
                                                    data-min="{{ $range['min'] }}" data-max="{{ $range['max'] }}"
                                                    {{ $checked ? 'checked' : '' }}>
                                                <label class="form-check-label">{{ $range['label'] }}</label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Filter by transmission -->
                            <div class="car-widget">
                                <h4 class="car-widget-title">Transmission</h4>
                                <ul>
                                    @foreach ($transmissions as $trans)
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="transmission[]"
                                                    value="{{ $trans }}" {{ in_array($trans, request('transmission', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label">{{ $trans }}</label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Filter button -->
                            <div class="car-widget">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </form>

                        <!-- Script for handling price range selection -->
                        <script>
                            document.querySelectorAll('.price-range-radio').forEach(radio => {
                                radio.addEventListener('change', function () {
                                    document.getElementById('min_price').value = this.getAttribute('data-min');
                                    document.getElementById('max_price').value = this.getAttribute('data-max');
                                });
                            });
                        </script>

                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="col-md-12">
                        <div class="car-sort">
                            <h6>Showing {{ $cars->firstItem() }}-{{ $cars->lastItem() }} of {{ $cars->total() }} Results</h6>
                            <div class="col-md-3 car-sort-box">
                                <select class="select">
                                    <option value="1">Sort By Default</option>
                                    <option value="5">Sort By Featured</option>
                                    <option value="2">Sort By Latest</option>
                                    <option value="3">Sort By Low Price</option>
                                    <option value="4">Sort By High Price</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($cars as $car)
                            <div class="col-md-6 col-lg-4">
                                <div class="car-item">
                                    <div class="car-img">
                                        <span class="car-status status-1">{{ $car->status }}</span>

                                        @if ($car->images && $car->images->isNotEmpty())
                                            <img src="{{ asset('storage/' . $car->images->first()->image_url) }}"
                                                alt="{{ $car->name }}">
                                        @else
                                            <img src="{{ asset('storage/default-image.jpg') }}" alt="No image available">
                                        @endif

                                        <!-- Favorite & refresh buttons -->
                                        <div class="car-btns">
                                            <form action="{{ route('user.favorites.store', $car->id) }}" method="POST"
                                                class="favorite-form">
                                                @csrf
                                                <button type="submit" class="favorite-btn">
                                                    <i class="far fa-heart"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="car-content">
                                        <div class="car-top">
                                            <h4><a href="#">{{ $car->name }}</a></h4>
                                            <div class="car-rate">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span>5.0 ({{ $car->reviews_count }} Reviews)</span>
                                            </div>
                                        </div>
                                        <ul class="car-list">
                                            <li><i class="far fa-steering-wheel"></i>{{ $car->transmission }}</li>
                                            <li><i class="far fa-road"></i> {{ $car->mileage }} km</li>
                                            <li><i class="far fa-car"></i>Model: {{ $car->model_year }}</li>
                                            <li><i class="far fa-gas-pump"></i> {{ $car->fuel_type }}</li>
                                        </ul>
                                        <div class="car-footer">
                                            <span class="car-price">${{ number_format($car->price) }}</span>
                                            <a href="{{ route('user.shop.show', $car->id) }}" class="theme-btn"><span
                                                    class="far fa-eye"></span>Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- pagination -->
                    <div class="pagination-area">
                        <div aria-label="Page navigation example">
                            {{-- Use custom pagination view --}}
                            {{ $cars->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                    <!-- pagination end -->
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

<style>
    .car-btns {
        position: absolute;
        top: 10px;
        right: 10px;
        display: flex;
        gap: 8px;
    }

    .car-btns .favorite-form {
        margin: 0;
    }

    .car-btns .favorite-btn {
        width: 40px;
        height: 40px;
        background-color: rgba(237, 29, 38, 0.9); /* Red */
        border: none;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background 0.3s ease-in-out;
    }

    .car-btns .favorite-btn:hover {
        background-color: rgba(237, 29, 38, 1);
    }

    .car-btns .favorite-btn i {
        font-size: 18px;
        color: white;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $(".favorite-btn").click(function (e) {
            e.preventDefault(); // Prevent page reload

            var form = $(this).closest("form");

            $.ajax({
                url: form.attr("action"),
                type: "POST",
                data: form.serialize(),
                success: function (response) {
                    alert(response.message);
                    $(".favorite-count").text(response.count); // Update favorite count
                },
                error: function () {
                    alert("Something went wrong. Please try again!");
                }
            });
        });
    });
</script>
