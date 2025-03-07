@extends('layouts.admin.app')

@section('content')
<div class="container-fluid mt-4">  <!-- Sử dụng container-fluid để co giãn theo sidebar -->
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary mb-3 mb-sm-0">
            <i class="fas fa-images me-2"></i> Quản lý Hình Ảnh Xe
        </h2>
        <a href="{{ route('admin.car_images.create') }}" class="btn btn-success d-flex align-items-center">
            <i class="fas fa-plus-circle me-1"></i> Thêm Hình Ảnh
        </a>
    </div>

    @if(session('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white fw-bold">
            <i class="fas fa-list-alt me-2"></i> Danh sách hình ảnh xe
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <!-- Thêm min-width cho bảng để kích hoạt thanh cuộn ngang trên mobile -->
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Xe</th>
                            <th>Hình Ảnh</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carImages->groupBy('car_id') as $carId => $images)
                        <tr>
                            <td class="fw-bold text-secondary">{{ $carId }}</td>
                            <td class="text-primary fw-semibold">
                                <i class="fas fa-car me-1"></i> {{ $images->first()->car->name ?? 'N/A' }}
                            </td>
                            <td>
                                <div class="d-flex flex-wrap justify-content-center">
                                    @foreach($images->take(4) as $image)
                                        <a href="{{ asset('storage/' . $image->image_url) }}" target="_blank" title="Xem ảnh lớn">
                                            <img src="{{ asset('storage/' . $image->image_url) }}" 
                                                 class="img-thumbnail car-thumbnail" 
                                                 alt="Hình ảnh xe">
                                        </a>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.car_images.edit', $images->first()->id) }}" 
                                       class="btn btn-warning btn-sm d-flex align-items-center me-1">
                                        <i class="fas fa-edit me-1"></i> Sửa
                                    </a>
                                    <form action="{{ route('admin.car_images.destroy', $images->first()->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Xóa tất cả ảnh của xe này?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center">
                                            <i class="fas fa-trash-alt me-1"></i> Xóa
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS cho responsive images và thanh kéo ngang -->
<style>
    .car-thumbnail {
         width: 120px;
         height: 80px;
         object-fit: cover;
         border-radius: 5px;
         box-shadow: 0 0 5px rgba(0,0,0,0.1);
         margin-right: 0.5rem;
         margin-bottom: 0.5rem;
    }

    /* Khi bảng không vừa với màn hình, thanh cuộn ngang sẽ hiển thị */
    .table-responsive {
         overflow-x: auto;
    }
    .table-responsive table {
         min-width: 800px; /* Điều chỉnh giá trị này sao cho phù hợp với số cột của bảng */
    }
</style>

<script>
    // Tự động ẩn thông báo sau 5 giây
    setTimeout(function() {
        let alertBox = document.getElementById('success-alert');
        if (alertBox) {
            alertBox.style.transition = "opacity 0.5s ease";
            alertBox.style.opacity = "0";
            setTimeout(() => alertBox.remove(), 500);
        }
    }, 5000);
</script>
@endsection
