@extends('layouts.guest.app')

@section('title', 'Trang Chủ - Motex Car Dealer')

@section('content')
    <main class="main">

        <!-- hero slider -->
        <div class="hero-section">
            <div class="hero-slider owl-carousel owl-theme">
                <div class="hero-single" style="background: url(assets/img/slider/slider-1.jpg)">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-12 col-lg-7">
                                <div class="hero-content">
                                    <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">Welcome To
                                        Motex!</h6>
                                    <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                        We Offer Best Way To Find <span>Dream</span> Car
                                    </h1>
                                    <p data-animation="fadeInLeft" data-delay=".75s">
                                        There are many variations of passages orem psum available but the majority have
                                        suffered alteration in some form the great explorer of the truth by injected humour.
                                    </p>
                                    <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                        <a href="#" class="theme-btn">About More<i class="fas fa-arrow-right-long"></i></a>
                                        <a href="#" class="theme-btn theme-btn2">Learn More<i
                                                class="fas fa-arrow-right-long"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-single" style="background: url(assets/img/slider/slider-2.jpg)">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-12 col-lg-7">
                                <div class="hero-content">
                                    <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">Welcome To
                                        Motex!</h6>
                                    <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                        We Offer Best Way To Find <span>Dream</span> Car
                                    </h1>
                                    <p data-animation="fadeInLeft" data-delay=".75s">
                                        There are many variations of passages orem psum available but the majority have
                                        suffered alteration in some form the great explorer of the truth by injected humour.
                                    </p>
                                    <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                        <a href="#" class="theme-btn">About More<i class="fas fa-arrow-right-long"></i></a>
                                        <a href="#" class="theme-btn theme-btn2">Learn More<i
                                                class="fas fa-arrow-right-long"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-single" style="background: url(assets/img/slider/slider-3.jpg)">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-12 col-lg-7">
                                <div class="hero-content">
                                    <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">Welcome To
                                        Motex!</h6>
                                    <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                        We Offer Best Way To Find <span>Dream</span> Car
                                    </h1>
                                    <p data-animation="fadeInLeft" data-delay=".75s">
                                        There are many variations of passages orem psum available but the majority have
                                        suffered alteration in some form the great explorer of the truth by injected humour.
                                    </p>
                                    <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                        <a href="#" class="theme-btn">About More<i class="fas fa-arrow-right-long"></i></a>
                                        <a href="#" class="theme-btn theme-btn2">Learn More<i
                                                class="fas fa-arrow-right-long"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- hero slider end -->


        <!-- find car form -->
        <div class="find-car">
            <div class="container">
                <div class="find-car-form">
                    <h4 class="find-car-title">Let's Find Your Perfect Car</h4>
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Car Condition</label>
                                    <select class="select">
                                        <option value="1">All Status</option>
                                        <option value="2">New Car</option>
                                        <option value="3">Used Car</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Brand Name</label>
                                    <select class="select">
                                        <option value="1">All Brand</option>
                                        <option value="2">BMW</option>
                                        <option value="3">Ferrari</option>
                                        <option value="4">Marcediz Benz</option>
                                        <option value="5">Hyundai</option>
                                        <option value="6">Nissan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Car Model</label>
                                    <select class="select">
                                        <option value="1">All Model</option>
                                        <option value="2">3-Series </option>
                                        <option value="3">Carrera</option>
                                        <option value="4">G-TR</option>
                                        <option value="3">Macan</option>
                                        <option value="3">N-Series</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Choose Year</label>
                                    <select class="select">
                                        <option value="1">All Year</option>
                                        <option value="2">2023</option>
                                        <option value="3">2022</option>
                                        <option value="4">2021</option>
                                        <option value="5">2020</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Choose Milieage</label>
                                    <select class="select">
                                        <option value="1">All Milieage</option>
                                        <option value="2">2000 Miles</option>
                                        <option value="3">3000 Miles</option>
                                        <option value="4">4000 Miles</option>
                                        <option value="5">5000 Miles</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Price Range</label>
                                    <select class="select">
                                        <option value="1">All Price</option>
                                        <option value="2">$1,000 - $5,000</option>
                                        <option value="3">$5,000 - $10,000</option>
                                        <option value="4">$15,000 - $20,000</option>
                                        <option value="5">$20,000 - $25,000</option>
                                        <option value="6">$25,000 - $30,000</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Body Type</label>
                                    <select class="select">
                                        <option value="1">All Body Type</option>
                                        <option value="2">Sedan</option>
                                        <option value="5">Compact</option>
                                        <option value="3">Coupe</option>
                                        <option value="4">Wagon</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 align-self-end">
                                <button class="theme-btn" type="submit"><span class="far fa-search"></span> Find Your
                                    Car</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- findcar form end -->


        <!-- car category -->
        <div class="car-category py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline"><i class="flaticon-drive"></i> Car Category</span>
                            <h2 class="site-title">Car By Body <span>Types</span></h2>
                            <div class="heading-divider"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="#" class="category-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="category-img">
                                <img src="assets/img/category/01.png" alt="">
                            </div>
                            <h5>Sedan</h5>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="#" class="category-item wow fadeInUp" data-wow-delay=".50s">
                            <div class="category-img">
                                <img src="assets/img/category/02.png" alt="">
                            </div>
                            <h5>Compact</h5>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="#" class="category-item wow fadeInUp" data-wow-delay=".75s">
                            <div class="category-img">
                                <img src="assets/img/category/03.png" alt="">
                            </div>
                            <h5>Convertible</h5>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="#" class="category-item wow fadeInUp" data-wow-delay="1s">
                            <div class="category-img">
                                <img src="assets/img/category/04.png" alt="">
                            </div>
                            <h5>SUV</h5>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="#" class="category-item wow fadeInUp" data-wow-delay="1.25s">
                            <div class="category-img">
                                <img src="assets/img/category/05.png" alt="">
                            </div>
                            <h5>Crossover</h5>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="#" class="category-item wow fadeInUp" data-wow-delay="1.50s">
                            <div class="category-img">
                                <img src="assets/img/category/06.png" alt="">
                            </div>
                            <h5>Wagon</h5>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="#" class="category-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="category-img">
                                <img src="assets/img/category/07.png" alt="">
                            </div>
                            <h5>Sports</h5>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="#" class="category-item wow fadeInUp" data-wow-delay=".50s">
                            <div class="category-img">
                                <img src="assets/img/category/08.png" alt="">
                            </div>
                            <h5>Pickup</h5>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="#" class="category-item wow fadeInUp" data-wow-delay=".75s">
                            <div class="category-img">
                                <img src="assets/img/category/09.png" alt="">
                            </div>
                            <h5>Family MPV</h5>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="#" class="category-item wow fadeInUp" data-wow-delay="1s">
                            <div class="category-img">
                                <img src="assets/img/category/10.png" alt="">
                            </div>
                            <h5>Coupe</h5>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="#" class="category-item wow fadeInUp" data-wow-delay="1.25s">
                            <div class="category-img">
                                <img src="assets/img/category/11.png" alt="">
                            </div>
                            <h5>Electric</h5>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="#" class="category-item wow fadeInUp" data-wow-delay="1.50s">
                            <div class="category-img">
                                <img src="assets/img/category/12.png" alt="">
                            </div>
                            <h5>Luxury</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- car category end-->


        <!-- car area -->
        <div class="car-area bg py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline"><i class="flaticon-drive"></i> New Arrivals</span>
                            <h2 class="site-title">Let's Check Latest <span>Cars</span></h2>
                            <div class="heading-divider"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="car-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="car-img">
                                <span class="car-status status-1">Used</span>
                                <img src="assets/img/car/01.jpg" alt="">
                                <div class="car-btns">
                                    <a href="#"><i class="far fa-heart"></i></a>
                                    <a href="#"><i class="far fa-arrows-repeat"></i></a>
                                </div>
                            </div>
                            <div class="car-content">
                                <div class="car-top">
                                    <h4><a href="#">Mercedes Benz Car</a></h4>
                                    <div class="car-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span>5.0 (58.5k Review)</span>
                                    </div>
                                </div>
                                <ul class="car-list">
                                    <li><i class="far fa-steering-wheel"></i>Automatic</li>
                                    <li><i class="far fa-road"></i>10.15km / 1-litre</li>
                                    <li><i class="far fa-car"></i>Model: 2023</li>
                                    <li><i class="far fa-gas-pump"></i>Hybrid</li>
                                </ul>
                                <div class="car-footer">
                                    <span class="car-price">$45,620</span>
                                    <a href="#" class="theme-btn"><span class="far fa-eye"></span>Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="car-item wow fadeInUp" data-wow-delay=".50s">
                            <div class="car-img">
                                <img src="assets/img/car/02.jpg" alt="">
                                <div class="car-btns">
                                    <a href="#"><i class="far fa-heart"></i></a>
                                    <a href="#"><i class="far fa-arrows-repeat"></i></a>
                                </div>
                            </div>
                            <div class="car-content">
                                <div class="car-top">
                                    <h4><a href="#">Yellow Ferrari 458</a></h4>
                                    <div class="car-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span>5.0 (58.5k Review)</span>
                                    </div>
                                </div>
                                <ul class="car-list">
                                    <li><i class="far fa-steering-wheel"></i>Automatic</li>
                                    <li><i class="far fa-road"></i>10.15km / 1-litre</li>
                                    <li><i class="far fa-car"></i>Model: 2023</li>
                                    <li><i class="far fa-gas-pump"></i>Hybrid</li>
                                </ul>
                                <div class="car-footer">
                                    <span class="car-price">$90,250</span>
                                    <a href="#" class="theme-btn"><span class="far fa-eye"></span>Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="car-item wow fadeInUp" data-wow-delay=".75s">
                            <div class="car-img">
                                <img src="assets/img/car/03.jpg" alt="">
                                <div class="car-btns">
                                    <a href="#"><i class="far fa-heart"></i></a>
                                    <a href="#"><i class="far fa-arrows-repeat"></i></a>
                                </div>
                            </div>
                            <div class="car-content">
                                <div class="car-top">
                                    <h4><a href="#">Black Audi Q7</a></h4>
                                    <div class="car-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span>5.0 (58.5k Review)</span>
                                    </div>
                                </div>
                                <ul class="car-list">
                                    <li><i class="far fa-steering-wheel"></i>Automatic</li>
                                    <li><i class="far fa-road"></i>10.15km / 1-litre</li>
                                    <li><i class="far fa-car"></i>Model: 2023</li>
                                    <li><i class="far fa-gas-pump"></i>Hybrid</li>
                                </ul>
                                <div class="car-footer">
                                    <span class="car-price">$44,350</span>
                                    <a href="#" class="theme-btn"><span class="far fa-eye"></span>Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="car-item wow fadeInUp" data-wow-delay="1s">
                            <div class="car-img">
                                <span class="car-status status-2">New</span>
                                <img src="assets/img/car/04.jpg" alt="">
                                <div class="car-btns">
                                    <a href="#"><i class="far fa-heart"></i></a>
                                    <a href="#"><i class="far fa-arrows-repeat"></i></a>
                                </div>
                            </div>
                            <div class="car-content">
                                <div class="car-top">
                                    <h4><a href="#">BMW Sports Car</a></h4>
                                    <div class="car-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span>5.0 (58.5k Review)</span>
                                    </div>
                                </div>
                                <ul class="car-list">
                                    <li><i class="far fa-steering-wheel"></i>Automatic</li>
                                    <li><i class="far fa-road"></i>10.15km / 1-litre</li>
                                    <li><i class="far fa-car"></i>Model: 2023</li>
                                    <li><i class="far fa-gas-pump"></i>Hybrid</li>
                                </ul>
                                <div class="car-footer">
                                    <span class="car-price">$78,760</span>
                                    <a href="#" class="theme-btn"><span class="far fa-eye"></span>Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="car-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="car-img">
                                <span class="car-status status-1">Used</span>
                                <img src="assets/img/car/05.jpg" alt="">
                                <div class="car-btns">
                                    <a href="#"><i class="far fa-heart"></i></a>
                                    <a href="#"><i class="far fa-arrows-repeat"></i></a>
                                </div>
                            </div>
                            <div class="car-content">
                                <div class="car-top">
                                    <h4><a href="#">White Tesla Car</a></h4>
                                    <div class="car-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span>5.0 (58.5k Review)</span>
                                    </div>
                                </div>
                                <ul class="car-list">
                                    <li><i class="far fa-steering-wheel"></i>Automatic</li>
                                    <li><i class="far fa-road"></i>10.15km / 1-litre</li>
                                    <li><i class="far fa-car"></i>Model: 2023</li>
                                    <li><i class="far fa-gas-pump"></i>Hybrid</li>
                                </ul>
                                <div class="car-footer">
                                    <span class="car-price">$64,230</span>
                                    <a href="#" class="theme-btn"><span class="far fa-eye"></span>Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="car-item wow fadeInUp" data-wow-delay=".50s">
                            <div class="car-img">
                                <span class="car-status status-2">New</span>
                                <img src="assets/img/car/06.jpg" alt="">
                                <div class="car-btns">
                                    <a href="#"><i class="far fa-heart"></i></a>
                                    <a href="#"><i class="far fa-arrows-repeat"></i></a>
                                </div>
                            </div>
                            <div class="car-content">
                                <div class="car-top">
                                    <h4><a href="#">White Nissan Car</a></h4>
                                    <div class="car-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span>5.0 (58.5k Review)</span>
                                    </div>
                                </div>
                                <ul class="car-list">
                                    <li><i class="far fa-steering-wheel"></i>Automatic</li>
                                    <li><i class="far fa-road"></i>10.15km / 1-litre</li>
                                    <li><i class="far fa-car"></i>Model: 2023</li>
                                    <li><i class="far fa-gas-pump"></i>Hybrid</li>
                                </ul>
                                <div class="car-footer">
                                    <span class="car-price">$34,540</span>
                                    <a href="#" class="theme-btn"><span class="far fa-eye"></span>Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="car-item wow fadeInUp" data-wow-delay=".75s">
                            <div class="car-img">
                                <img src="assets/img/car/07.jpg" alt="">
                                <div class="car-btns">
                                    <a href="#"><i class="far fa-heart"></i></a>
                                    <a href="#"><i class="far fa-arrows-repeat"></i></a>
                                </div>
                            </div>
                            <div class="car-content">
                                <div class="car-top">
                                    <h4><a href="#">Mercedes Benz Suv</a></h4>
                                    <div class="car-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span>5.0 (58.5k Review)</span>
                                    </div>
                                </div>
                                <ul class="car-list">
                                    <li><i class="far fa-steering-wheel"></i>Automatic</li>
                                    <li><i class="far fa-road"></i>10.15km / 1-litre</li>
                                    <li><i class="far fa-car"></i>Model: 2023</li>
                                    <li><i class="far fa-gas-pump"></i>Hybrid</li>
                                </ul>
                                <div class="car-footer">
                                    <span class="car-price">$75,820</span>
                                    <a href="#" class="theme-btn"><span class="far fa-eye"></span>Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="car-item wow fadeInUp" data-wow-delay="1s">
                            <div class="car-img">
                                <img src="assets/img/car/08.jpg" alt="">
                                <div class="car-btns">
                                    <a href="#"><i class="far fa-heart"></i></a>
                                    <a href="#"><i class="far fa-arrows-repeat"></i></a>
                                </div>
                            </div>
                            <div class="car-content">
                                <div class="car-top">
                                    <h4><a href="#">Red Hyundai Car</a></h4>
                                    <div class="car-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span>5.0 (58.5k Review)</span>
                                    </div>
                                </div>
                                <ul class="car-list">
                                    <li><i class="far fa-steering-wheel"></i>Automatic</li>
                                    <li><i class="far fa-road"></i>10.15km / 1-litre</li>
                                    <li><i class="far fa-car"></i>Model: 2023</li>
                                    <li><i class="far fa-gas-pump"></i>Hybrid</li>
                                </ul>
                                <div class="car-footer">
                                    <span class="car-price">$25,620</span>
                                    <a href="#" class="theme-btn"><span class="far fa-eye"></span>Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a href="#" class="theme-btn">Load More <i class="far fa-arrow-rotate-right"></i> </a>
                </div>
            </div>
        </div>
        <!-- car area end -->


        <!-- about area -->
        <div class="about-area py-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-left wow fadeInLeft" data-wow-delay=".25s">
                            <div class="about-img">
                                <img src="assets/img/about/01.png" alt="">
                            </div>
                            <div class="about-experience">
                                <div class="about-experience-icon">
                                    <i class="flaticon-car"></i>
                                </div>
                                <b>30 Years Of <br> Quality Service</b>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-right wow fadeInRight" data-wow-delay=".25s">
                            <div class="site-heading mb-3">
                                <span class="site-title-tagline justify-content-start">
                                    <i class="flaticon-drive"></i> About Us
                                </span>
                                <h2 class="site-title">
                                    World Largest <span>Car Dealer</span> Marketplace.
                                </h2>
                            </div>
                            <p class="about-text">
                                There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form, by injected humour.
                            </p>
                            <div class="about-list-wrapper">
                                <ul class="about-list list-unstyled">
                                    <li>
                                        At vero eos et accusamus et iusto odio.
                                    </li>
                                    <li>
                                        Established fact that a reader will be distracted.
                                    </li>
                                    <li>
                                        Sed ut perspiciatis unde omnis iste natus sit.
                                    </li>
                                </ul>
                            </div>
                            <a href="about.html" class="theme-btn mt-4">Discover More<i
                                    class="fas fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- about area end -->


        <!-- choose area -->
        <div class="choose-area py-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="choose-content">
                            <div class="site-heading wow fadeInDown" data-wow-delay=".25s">
                                <span class="site-title-tagline text-white justify-content-start">
                                    <i class="flaticon-drive"></i> Why Choose Us
                                </span>
                                <h2 class="site-title text-white mb-10">We are dedicated <span>to provide</span> quality
                                    service</h2>
                                <p class="text-white">
                                    There are many variations of passages available but the majority have suffered
                                    alteration in some form going to use a passage by injected humour randomised words which
                                    don't look even slightly believable.
                                </p>
                            </div>
                            <div class="choose-img wow fadeInUp" data-wow-delay=".25s">
                                <img src="assets/img/choose/01.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="choose-content-wrapper wow fadeInRight" data-wow-delay=".25s">
                            <div class="row">
                                <div class="col-md-6 col-lg-6 mt-lg-5">
                                    <div class="choose-item">
                                        <span class="choose-count">01</span>
                                        <div class="choose-item-icon">
                                            <i class="flaticon-car"></i>
                                        </div>
                                        <div class="choose-item-info">
                                            <h3>Best Quality Cars</h3>
                                            <p>There are many variations of the passages available but the
                                                majo have suffered fact that reader will be dist alteration.</p>
                                        </div>
                                    </div>
                                    <div class="choose-item mb-lg-0">
                                        <span class="choose-count">03</span>
                                        <div class="choose-item-icon">
                                            <i class="flaticon-drive-thru"></i>
                                        </div>
                                        <div class="choose-item-info">
                                            <h3>Popular Brands</h3>
                                            <p>There are many variations of the passages available but the
                                                majo have suffered fact that reader will be dist alteration.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="choose-item">
                                        <span class="choose-count">02</span>
                                        <div class="choose-item-icon">
                                            <i class="flaticon-chauffeur"></i>
                                        </div>
                                        <div class="choose-item-info">
                                            <h3>Certified Mechanics</h3>
                                            <p>There are many variations of the passages available but the
                                                majo have suffered fact that reader will be dist alteration.</p>
                                        </div>
                                    </div>
                                    <div class="choose-item mb-lg-0">
                                        <span class="choose-count">04</span>
                                        <div class="choose-item-icon">
                                            <i class="flaticon-online-payment"></i>
                                        </div>
                                        <div class="choose-item-info">
                                            <h3>Reasonable Price</h3>
                                            <p>There are many variations of the passages available but the
                                                majo have suffered fact that reader will be dist alteration.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- choose area end -->


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
                    <div class="col-6 col-md-3 col-lg-2">
                        <a href="#" class="brand-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="brand-img">
                                <img src="assets/img/brand/01.png" alt="">
                            </div>
                            <h5>Ferrari</h5>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2">
                        <a href="#" class="brand-item wow fadeInUp" data-wow-delay=".50s">
                            <div class="brand-img">
                                <img src="assets/img/brand/02.png" alt="">
                            </div>
                            <h5>Hyundai</h5>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2">
                        <a href="#" class="brand-item wow fadeInUp" data-wow-delay=".75s">
                            <div class="brand-img">
                                <img src="assets/img/brand/03.png" alt="">
                            </div>
                            <h5>Mercedes Benz</h5>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2">
                        <a href="#" class="brand-item wow fadeInUp" data-wow-delay="1s">
                            <div class="brand-img">
                                <img src="assets/img/brand/04.png" alt="">
                            </div>
                            <h5>Toyota</h5>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2">
                        <a href="#" class="brand-item wow fadeInUp" data-wow-delay="1.25s">
                            <div class="brand-img">
                                <img src="assets/img/brand/05.png" alt="">
                            </div>
                            <h5>BMW</h5>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2">
                        <a href="#" class="brand-item wow fadeInUp" data-wow-delay="1.50s">
                            <div class="brand-img">
                                <img src="assets/img/brand/06.png" alt="">
                            </div>
                            <h5>Nissan</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- car brand end-->


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
                    <div class="testimonial-single">
                        <div class="testimonial-content">
                            <div class="testimonial-author-img">
                                <img src="assets/img/testimonial/01.jpg" alt="">
                            </div>
                            <div class="testimonial-author-info">
                                <h4>Sylvia H Green</h4>
                                <p>Customer</p>
                            </div>
                        </div>
                        <div class="testimonial-quote">
                            <span class="testimonial-quote-icon"><i class="flaticon-quote"></i></span>
                            <p>
                                There are many variations of passages available but the majority have
                                suffered to the alteration in some injected.
                            </p>
                        </div>
                        <div class="testimonial-rate">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="testimonial-single">
                        <div class="testimonial-content">
                            <div class="testimonial-author-img">
                                <img src="assets/img/testimonial/02.jpg" alt="">
                            </div>
                            <div class="testimonial-author-info">
                                <h4>Gordo Novak</h4>
                                <p>Customer</p>
                            </div>
                        </div>
                        <div class="testimonial-quote">
                            <span class="testimonial-quote-icon"><i class="flaticon-quote"></i></span>
                            <p>
                                There are many variations of passages available but the majority have
                                suffered to the alteration in some injected.
                            </p>
                        </div>
                        <div class="testimonial-rate">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="testimonial-single">
                        <div class="testimonial-content">
                            <div class="testimonial-author-img">
                                <img src="assets/img/testimonial/03.jpg" alt="">
                            </div>
                            <div class="testimonial-author-info">
                                <h4>Reid E Butt</h4>
                                <p>Customer</p>
                            </div>
                        </div>
                        <div class="testimonial-quote">
                            <span class="testimonial-quote-icon"><i class="flaticon-quote"></i></span>
                            <p>
                                There are many variations of passages available but the majority have
                                suffered to the alteration in some injected.
                            </p>
                        </div>
                        <div class="testimonial-rate">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="testimonial-single">
                        <div class="testimonial-content">
                            <div class="testimonial-author-img">
                                <img src="assets/img/testimonial/04.jpg" alt="">
                            </div>
                            <div class="testimonial-author-info">
                                <h4>Parker Jimenez</h4>
                                <p>Customer</p>
                            </div>
                        </div>
                        <div class="testimonial-quote">
                            <span class="testimonial-quote-icon"><i class="flaticon-quote"></i></span>
                            <p>
                                There are many variations of passages available but the majority have
                                suffered to the alteration in some injected.
                            </p>
                        </div>
                        <div class="testimonial-rate">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="testimonial-single">
                        <div class="testimonial-content">
                            <div class="testimonial-author-img">
                                <img src="assets/img/testimonial/05.jpg" alt="">
                            </div>
                            <div class="testimonial-author-info">
                                <h4>Heruli Nez</h4>
                                <p>Customer</p>
                            </div>
                        </div>
                        <div class="testimonial-quote">
                            <span class="testimonial-quote-icon"><i class="flaticon-quote"></i></span>
                            <p>
                                There are many variations of passages available but the majority have
                                suffered to the alteration in some injected.
                            </p>
                        </div>
                        <div class="testimonial-rate">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- testimonial area end -->


        <!-- blog area -->
        <div class="blog-area py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline"><i class="flaticon-drive"></i> Our Blog</span>
                            <h2 class="site-title">Latest News & <span>Blog</span></h2>
                            <div class="heading-divider"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="blog-item-img">
                                <img src="assets/img/blog/01.jpg" alt="Thumb">
                            </div>
                            <div class="blog-item-info">
                                <div class="blog-item-meta">
                                    <ul>
                                        <li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
                                        <li><a href="#"><i class="far fa-calendar-alt"></i> January 29, 2023</a></li>
                                    </ul>
                                </div>
                                <h4 class="blog-title">
                                    <a href="#">There are many variations of passage available.</a>
                                </h4>
                                <a class="theme-btn" href="#">Read More<i class="fas fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-item wow fadeInUp" data-wow-delay=".50s">
                            <div class="blog-item-img">
                                <img src="assets/img/blog/02.jpg" alt="Thumb">
                            </div>
                            <div class="blog-item-info">
                                <div class="blog-item-meta">
                                    <ul>
                                        <li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
                                        <li><a href="#"><i class="far fa-calendar-alt"></i> January 29, 2023</a></li>
                                    </ul>
                                </div>
                                <h4 class="blog-title">
                                    <a href="#">There are many variations of passage available.</a>
                                </h4>
                                <a class="theme-btn" href="#">Read More<i class="fas fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-item wow fadeInUp" data-wow-delay=".75s">
                            <div class="blog-item-img">
                                <img src="assets/img/blog/03.jpg" alt="Thumb">
                            </div>
                            <div class="blog-item-info">
                                <div class="blog-item-meta">
                                    <ul>
                                        <li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
                                        <li><a href="#"><i class="far fa-calendar-alt"></i> January 29, 2023</a></li>
                                    </ul>
                                </div>
                                <h4 class="blog-title">
                                    <a href="#">There are many variations of passage available.</a>
                                </h4>
                                <a class="theme-btn" href="#">Read More<i class="fas fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- blog area end -->



    </main>

@endsection