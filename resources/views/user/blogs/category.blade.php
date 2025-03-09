@extends('layouts.guest.app')

@section('content')
<main class="main">
    <!-- Breadcrumb -->
    <div class="site-breadcrumb" style="background: url({{ asset('assets/img/breadcrumb/01.jpg') }})">
        <div class="container">
            <h2 class="breadcrumb-title">Our Blog</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">Category</li>
            </ul>
        </div>
    </div>
    
    <div class="blog-area py-120">
        <div class="container">
            <!-- Title Section -->
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center">
                        <span class="site-title-tagline"><i class="flaticon-drive"></i> Blog Category</span>
                        <h2 class="site-title">{{ $category->name }} </h2>
                        <div class="heading-divider"></div>
                    </div>
                </div>
            </div>

            <!-- Blog List -->
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="blog-item-img">
                                @if($blog->image)
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                                @else
                                    <img src="{{ asset('images/default-thumbnail.jpg') }}" alt="No Image">
                                @endif
                            </div>
                            <div class="blog-item-info">
                                <div class="blog-item-meta">
                                    <ul>
                                        <li><i class="far fa-user-circle"></i> By {{ $blog->author['name'] ?? 'Admin' }}</li>
                                        <li><i class="far fa-calendar-alt"></i> {{ $blog->created_at->format('F d, Y') }}</li>
                                    </ul>
                                </div>
                                <h4 class="blog-title">
                                    <a href="{{ route('user.blog.detail', $blog->slug) }}">{{ $blog->title }}</a>
                                </h4>
                                <a class="theme-btn" href="{{ route('user.blog.detail', $blog->slug) }}">Read More <i class="fas fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="pagination-area">
                {{ $blogs->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
</main>
@endsection
