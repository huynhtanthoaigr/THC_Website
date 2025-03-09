@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <!-- Tiêu đề với Background Gradient -->
    <div class="bg-primary text-white p-4 rounded shadow-lg mb-4 text-center">
        <h1><i class="fas fa-info-circle"></i> About Us</h1>
       
    </div>

    <!-- Nút Chỉnh Sửa -->
    <div class="text-end mb-3">
        <a href="{{ route('admin.about.edit') }}" class="btn btn-outline-primary btn-lg">
            <i class="fas fa-edit"></i> Edit About
        </a>
    </div>

    <!-- Card Nội Dung -->
    <div class="card shadow-lg border-0">
        <div class="card-body">
            <div class="row align-items-center">
                <!-- Hình Ảnh -->
                <div class="col-lg-5 text-center">
                    @if($about->image)
                        <img src="{{ asset('storage/' . $about->image) }}" alt="About Image" class="img-fluid rounded shadow-lg border" style="max-height: 300px;">
                    @else
                        <img src="https://via.placeholder.com/400x300" alt="Default Image" class="img-fluid rounded shadow-lg border">
                    @endif
                </div>

                <!-- Nội Dung -->
                <div class="col-lg-7">
                    <h2 class="text-primary fw-bold">
                        <i class="fas fa-quote-left"></i> {{ $about->title ?? 'No Title' }}
                    </h2>
                    <p class="text-muted fst-italic">{{ $about->description ?? 'No Description' }}</p>

                    <!-- Danh Sách Nội Dung Con -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <i class="fas fa-check-circle text-success me-2"></i> {{ $about->sub_content_1 ?? 'No content' }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-car text-primary me-2"></i> {{ $about->sub_content_2 ?? 'No content' }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-star text-warning me-2"></i> {{ $about->sub_content_3 ?? 'No content' }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-handshake text-info me-2"></i> {{ $about->sub_content_4 ?? 'No content' }}
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-shield-alt text-danger me-2"></i> {{ $about->sub_content_5 ?? 'No content' }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
