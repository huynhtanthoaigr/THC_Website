@extends('layouts.guest.app')

@section('title', $blog->title)

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
                    <li class="active">Detail Blogs</li>
                </ul>
            </div>
        </div>

        <!-- breadcrumb end -->


        <!-- blog single area -->
        <div class="blog-single-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog-single-wrapper">
                            <div class="blog-single-content">
                                <div class="blog-thumb-img" style="width: 100%;">
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"
                                        style="width: 100%; height: auto;">
                                </div>
                                <div class="blog-info">
                                    <div class="blog-meta">
                                        <div class="blog-meta-left">
                                            <ul>
                                                <li><i class="far fa-user"></i> {{ $blog->author['name'] ?? 'Admin' }}</li>

                                                <li><i class="far fa-calendar"></i> {{ $blog->created_at->format('d/m/Y') }}
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                    <div class="blog-details">
                                        <h3 class="blog-details-title mb-20">{{ $blog->title }}</h3>
                                        <p class="mb-10">
                                            {{ $blog->content }}
                                        </p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="col-lg-4">
                        <aside class="sidebar">
                            <!-- Danh mục -->
                            <div class="widget category">
                                <h5 class="widget-title">Category</h5>
                                <div class="category-list">
                                    @foreach ($categories as $category)
                                        <a href="{{ route('user.blog.category', ['slug' => $category->slug]) }}">
                                            <i class="far fa-arrow-right"></i> {{ $category->name }}
                                            <span>({{ $category->posts_count }})</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>


                            <div class="widget recent-post">
                                <h5 class="widget-title">Recent Post</h5>
                                @foreach ($recentBlogs as $recent)
                                    <div class="recent-post-single">
                                        <div class="recent-post-img">
                                            <img src="{{ asset('storage/' . $recent->image) }}" alt="{{ $recent->title }}">
                                        </div>
                                        <div class="recent-post-bio">
                                            <h6><a href="{{ route('user.blog.detail', ['slug' => $recent->slug]) }}">
                                                    {{ $recent->title }}</a></h6>
                                            <span><i class="far fa-clock"></i>{{ $recent->created_at->format('d/m/Y') }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>

        <!-- blog single area end -->


    </main>
@endsection