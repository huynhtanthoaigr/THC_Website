@extends('layouts.guest.app')

@section('content')
    <main class="main">
        <div class="site-breadcrumb" style="background: url({{ asset('assets/img/breadcrumb/01.jpg') }})">
            <div class="container">
                <h2 class="breadcrumb-title">Register</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Register</li>
                </ul>
            </div>
        </div>

        <div class="login-area py-120">
            <div class="container">
                <div class="col-md-7 mx-auto">
                    <div class="login-form">
                        <div class="login-header">
                            <img src="{{ asset('assets/img/logo/logo.png') }}" alt="">
                            <p>Create your motex account</p>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                            placeholder="Your Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                            placeholder="Your Email" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}"
                                            placeholder="Your Phone" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address" value="{{ old('address') }}"
                                            placeholder="Your Address" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Your Password" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                            placeholder="Confirm Password" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-check form-group">
                                        <input class="form-check-input" type="checkbox" value="" id="agree" required>
                                        <label class="form-check-label" for="agree">
                                            I agree with the <a href="#">Terms Of Service.</a>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="d-flex align-items-center">
                                        <button type="submit" class="theme-btn"><i class="far fa-paper-plane"></i>
                                            Register</button>
                                    </div>
                                </div>
                            </div>
                        </form>


                        <div class="login-footer">
                            <p>Already have an account? <a href="{{ route('login') }}">Login.</a></p>
                            <div class="social-login">
                                <p>Continue with social media</p>
                                <div class="social-login-list">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-google"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection