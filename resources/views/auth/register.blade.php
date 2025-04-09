@extends('layouts.guest.app')

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
            Resgister
            @endif
        </h2>
        <ul class="breadcrumb-menu">
            <li><a href="/">Home</a></li>
            <li class="active">   Resgister</li>
        </ul>
    </div>
</div>
        <div class="login-area py-120">
            <div class="container">
                <div class="col-md-7 mx-auto">
                    <div class="login-form">
                        <div class="login-header">
                        <img src="{{ asset('storage/' . ($company->logo ?? 'assets/img/logo/logo-light.png')) }}"
                        alt="Company Logo">
                            <p>Create your Motex account</p>
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
                                        <label>Gender</label>
                                        <select class="form-control" name="gender" required>
                                            <option value="" disabled selected>Select Gender</option>
                                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                                        </select>
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
