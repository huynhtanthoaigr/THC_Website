<header class="header">
    <!-- top header -->
    <div class="header-top">
        <div class="container">
            <div class="header-top-wrapper">
                <div class="header-top-left">
                    <div class="header-top-contact">
                        <ul>
                            <li>
                                <a href="mailto:{{ $company->email ?? 'info@example.com' }}">
                                    <i class="far fa-envelope"></i> {{ $company->email ?? 'info@example.com' }}
                                </a>
                            </li>
                            <li>
                                <a href="tel:{{ $company->phone ?? '+21236547898' }}">
                                    <i class="far fa-phone-volume"></i> {{ $company->phone ?? '+2 123 654 7898' }}
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="far fa-alarm-clock"></i>
                                    {{ $company->opening_hours ?? 'Sun - Fri (08AM - 10PM)' }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="header-top-right">
                    <div class="header-top-link">
                        @auth
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @else
                            <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
                            <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Register</a>
                        @endauth
                    </div>

                    <div class="header-top-social">
                        <span>Follow Us: </span>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- main navigation -->
    <div class="main-navigation">
        <nav class="navbar navbar-expand-lg">
            <div class="container position-relative">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('storage/' . ($company->logo ?? 'default-logo.png')) }}" alt="logo">
                </a>
                <div class="mobile-menu-right">
                    <div class="search-btn">
                        <button type="button" class="nav-right-link"><i class="far fa-search"></i></button>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-mobile-icon"><i class="far fa-bars"></i></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.shop.index') }}">Shop Car</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.orders.index') }}">Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.about') }}">About</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('blogs.index') }}">Blogs</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('user.contact') }}">Contact</a></li>
                    </ul>

                    <div class="nav-right d-none d-lg-flex">
                        <div class="cart-btn">
                            <a href="{{ route('user.favorites.index') }}" class="nav-right-link">
                                <i class="far fa-heart"></i>
                                <span class="favorite-count">{{ \App\Models\Favorite::where('user_id', Auth::id())->count() }}</span>
                            </a>
                        </div>
                        <div class="cart-btn">
                            <a href="{{ route('cart.index') }}" class="nav-right-link">
                                <i class="far fa-cart-plus"></i>
                                <span>{{ collect(session('cart', []))->sum('quantity') }}</span>
                            </a>
                        </div>
                        @auth
                            <div class="profile-btn">
                                <a href="{{ route('profile.index') }}" class="nav-right-link">
                                    <i class="far fa-user"></i>
                                </a>
                            </div>
                        @endauth
                        <div class="sidebar-btn">
                            <button type="button" class="nav-right-link"><i class="far fa-bars-sort"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>

<!-- Mobile Bottom Navigation -->
<div class="nav-mobile d-lg-none">
    <a href="{{ route('home') }}">
        <i class="fas fa-home"></i>
        <span>Trang chủ</span>
    </a>
    <a href="{{ route('cart.index') }}" class="position-relative">
        <i class="far fa-cart-plus"></i>
        <span>Giỏ hàng</span>
        <span class="badge">{{ collect(session('cart', []))->sum('quantity') }}</span>
    </a>
    <a href="{{ route('user.favorites.index') }}" class="position-relative">
        <i class="far fa-heart"></i>
        <span>Yêu thích</span>
        <span class="badge">{{ \App\Models\Favorite::where('user_id', Auth::id())->count() }}</span>
    </a>
    @auth
        <a href="{{ route('profile.index') }}">
            <i class="far fa-user"></i>
            <span>Tài khoản</span>
        </a>
    @else
        <a href="{{ route('login') }}">
            <i class="fas fa-sign-in-alt"></i>
            <span>Đăng nhập</span>
        </a>
    @endauth
</div>

<style>
    .nav-mobile {
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 10px 15px;
    background: #f8f9fa;
    border-top: 1px solid #ddd;
    position: fixed;
    bottom: 0;
    width: 100%;
    z-index: 999;
}

.nav-mobile a {
    text-decoration: none;
    color: #333;
    font-size: 14px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.nav-mobile i {
    font-size: 22px;
    margin-bottom: 3px;
}

.nav-mobile .badge {
    position: absolute;
    top: 3px;
    right: 10px;
    background: red;
    color: white;
    font-size: 12px;
    padding: 3px 6px;
    border-radius: 50%;
}

</style>