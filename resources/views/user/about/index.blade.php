@extends('layouts.guest.app')

@section('content')
    <main class="main">

        <!-- breadcrumb -->
        <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/01.jpg)">
            <div class="container">
                <h2 class="breadcrumb-title">About Us</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">About Us</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb end -->


        <!-- about area -->
        <div class="about-area py-120">
            <div class="container">
                <div class="row align-items-stretch">
                    <!-- Hình ảnh bên trái -->
                    <div class="col-lg-6 d-flex align-items-stretch">
                        <div class="about-left wow fadeInLeft w-100" data-wow-delay=".25s">
                            <div class="about-img h-100">
                                @if($about->image ?? false)
                                    <img src="{{ asset('storage/' . $about->image) }}" alt="About Image"
                                        class="w-100 h-100 object-fit-cover">
                                @else
                                    <img src="assets/img/about/01.png" alt="Default Image" class="w-100 h-100 object-fit-cover">
                                @endif
                            </div>
                            <div class="about-experience">
                                <div class="about-experience-icon">
                                    <i class="flaticon-car"></i>
                                </div>
                                <b>30 Years Of <br> Quality Service</b>
                            </div>
                        </div>
                    </div>

                    <!-- Nội dung bên phải -->
                    <div class="col-lg-6 d-flex align-items-stretch">
                        <div class="about-right wow fadeInRight w-100" data-wow-delay=".25s">
                            <div class="site-heading mb-3">
                                <span class="site-title-tagline justify-content-start">
                                    <i class="flaticon-drive"></i> About Us
                                </span>
                                <h2 class="site-title">
                                    {{ $about->title ?? 'World Largest' }}
                                    <span>Car Dealer</span> Marketplace.
                                </h2>
                            </div>

                            <p class="about-text">
                                {{ Str::limit($about->description ?? 'There are many variations of passages of Lorem Ipsum available...', 200) }}
                            </p>

                            <div class="about-list-wrapper">
                                <ul class="about-list list-unstyled">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @php $sub_content = "sub_content_{$i}"; @endphp
                                        @if (!empty($about->$sub_content))
                                            <li><i class="fas fa-check"></i> {{ $about->$sub_content }}</li>
                                        @endif
                                    @endfor
                                </ul>
                            </div>

                            <a href="#" class="theme-btn mt-4">
                                Discover More <i class="fas fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- about area end -->


        <!-- counter area -->
        <div class="counter-area pt-30 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter-box">
                            <div class="icon">
                                <i class="flaticon-car-rental"></i>
                            </div>
                            <div>
                                <span class="counter" data-count="+" data-to="500" data-speed="3000">500</span>
                                <h6 class="title">+ Available Cars </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter-box">
                            <div class="icon">
                                <i class="flaticon-car-key"></i>
                            </div>
                            <div>
                                <span class="counter" data-count="+" data-to="900" data-speed="3000">900</span>
                                <h6 class="title">+ Happy Clients</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter-box">
                            <div class="icon">
                                <i class="flaticon-screwdriver"></i>
                            </div>
                            <div>
                                <span class="counter" data-count="+" data-to="1500" data-speed="3000">1500</span>
                                <h6 class="title">+ Team Workers</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter-box">
                            <div class="icon">
                                <i class="flaticon-review"></i>
                            </div>
                            <div>
                                <span class="counter" data-count="+" data-to="30" data-speed="3000">30</span>
                                <h6 class="title">+ Years Of Experience</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- counter area end -->


        <!-- testimonial area -->
        <div class="testimonial-area bg py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline"><i class="flaticon-drive"></i> Testimonials</span>
                            <h2 class="site-title">What Our Client <span>Say's</span></h2>
                            <div class="heading-divider"></div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-slider owl-carousel owl-theme">
                    @foreach($reviews as $review)
                        <div class="testimonial-single">
                            <div class="testimonial-content">
                                <div class="testimonial-author-img">
                                    @if($review->car && $review->car->firstImage)
                                        <img src="{{ asset('storage/' . $review->car->firstImage->image_url) }}"
                                            alt="{{ $review->car->name }}" width="150">
                                    @else
                                        <img src="{{ asset('assets/img/default-product.png') }}" alt="Ảnh mặc định" width="150">
                                    @endif


                                </div>
                                <div class="testimonial-author-info">
                                    <h4>{{ $review->car->name }}</h4> <!-- Tên sản phẩm -->
                                    <p>{{ $review->user->name }}</p> <!-- Tên người đánh giá -->
                                </div>
                            </div>
                            <div class="testimonial-quote">
                                <span class="testimonial-quote-icon"><i class="flaticon-quote"></i></span>
                                <p>{{ $review->comment }}</p>
                            </div>
                            <div class="testimonial-rate">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $review->rating ? 'text-warning' : 'text-secondary' }}"></i>
                                @endfor
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- testimonial area end -->

        <!-- car brand -->
        <div class="car-brand py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline"><i class="flaticon-drive"></i> Popular Brands</span>
                            <h2 class="site-title">Our Top Quality <span>Brands</span></h2>
                            <div class="heading-divider"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($brands as $index => $brand)
                        <div class="col-6 col-md-3 col-lg-2">
                            <a href="#" class="brand-item wow fadeInUp" data-wow-delay="{{ 0.25 * ($index + 1) }}s">
                                <div class="brand-img">
                                    <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}">
                                </div>
                                <h5>{{ $brand->name }}</h5>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- car brand end-->

    </main>

@endsection