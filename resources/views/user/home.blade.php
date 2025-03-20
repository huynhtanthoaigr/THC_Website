@extends('layouts.guest.app')

@section('title', 'Trang Chủ - Motex Car Dealer')

@section('content')
    <main class="main">

        <!-- hero slider -->
        <div class="hero-section">
    <div class="hero-slider owl-carousel owl-theme">
        @foreach(\App\Models\Slider::all() as $slider)
        <div class="hero-single" style="background: url({{ asset('storage/' . $slider->image) }})">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12 col-lg-7">
                        <div class="hero-content">
                            <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">{{ $slider->hero_sub_title }}</h6>
                            <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">{!! $slider->hero_title !!}</h1>
                            <p data-animation="fadeInLeft" data-delay=".75s">{{ $slider->hero_description }}</p>
                            <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                <a href="{{ $slider->btn1_link }}" class="theme-btn">{{ $slider->btn1_text }}<i class="fas fa-arrow-right-long"></i></a>
                                <a href="{{ $slider->btn2_link }}" class="theme-btn theme-btn2">{{ $slider->btn2_text }}<i class="fas fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
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

                @foreach ($categories->slice(0, 8)->chunk(4) as $chunk) {{-- Lấy 8 danh mục, chia thành từng hàng 4 ảnh --}}
                    <div class="row">
                        @foreach ($chunk as $category)
                            <div class="col-6 col-md-3">
                                <a href="#" class="category-item wow fadeInUp" data-wow-delay=".25s">
                                    <div class="category-img">
                                        <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}">
                                    </div>
                                    <h5>{{ $category->name }}</h5>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endforeach
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
                    @foreach($cars as $car)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="car-item wow fadeInUp" data-wow-delay=".25s">
                                <div class="car-img">
                                    <span class="car-status {{ $car->stock > 0 ? 'status-2' : 'status-1' }}">
                                        {{ $car->stock > 0 ? 'New' : 'Used' }}
                                    </span>
                                    @if($car->images->isNotEmpty())
                                        <img src="{{ asset('storage/' . $car->images->first()->image_url) }}" class="card-img-top"
                                            alt="{{ $car->name }}">
                                    @else
                                        <img src="{{ asset('storage/default-car.jpg') }}" class="card-img-top" alt="No Image">
                                    @endif
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
                                            <span>5.0 (58.5k Review)</span>
                                        </div>
                                    </div>
                                    <ul class="car-list">
                                        <li><i class="far fa-steering-wheel"></i> {{ $car->transmission }}</li>
                                        <li><i class="far fa-road"></i> {{ $car->mileage }} km</li>
                                        <li><i class="far fa-car"></i> Model: {{ $car->model_year }}</li>
                                        <li><i class="far fa-gas-pump"></i> {{ $car->fuel_type }}</li>
                                    </ul>
                                    <div class="car-footer">
                                        <span class="car-price">${{ number_format($car->price, 2) }}</span>
                                        <a href="{{ route('user.shop.show', $car->id) }}" class="theme-btn"><span
                                                class="far fa-eye"></span>Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>




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


        <!-- blog area -->
        <div class="blog-area py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline"><i class="flaticon-drive"></i> Blog Mới Nhất</span>
                            <h2 class="site-title">Tin Tức & <span>Bài Viết</span></h2>
                            <div class="heading-divider"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($blogs as $blog)
                        <div class="col-md-6 col-lg-4">
                            <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                                <div class="blog-item-img">
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                                </div>
                                <div class="blog-item-info">
                                    <div class="blog-item-meta">
                                        <ul>
                                            <li><i class="far fa-user-circle"></i>
                                                By {{ $blog->author->name ?? 'Unknown' }}
                                            </li>
                                            <li><i class="far fa-calendar-alt"></i>
                                                {{ $blog->created_at->format('d M, Y') }}
                                            </li>
                                        </ul>
                                    </div>
                                    <h4 class="blog-title">
                                        <a href="">{{ $blog->title }}</a>
                                    </h4>
                                    <a class="theme-btn" href="{{ route('user.blog.detail', $blog->slug) }}">Read More<i
                                            class="fas fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- blog area end -->
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
        background-color: rgba(237, 29, 38, 0.9);
        /* Màu đỏ */
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
            e.preventDefault(); // Ngăn chặn load lại trang

            var form = $(this).closest("form");

            $.ajax({
                url: form.attr("action"),
                type: "POST",
                data: form.serialize(),
                success: function (response) {
                    alert(response.message);
                    $(".favorite-count").text(response.count); // Cập nhật số lượng yêu thích
                },
                error: function () {
                    alert("Có lỗi xảy ra, vui lòng thử lại!");
                }
            });
        });
    });
</script>