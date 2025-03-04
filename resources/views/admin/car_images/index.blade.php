@extends('layouts.admin.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">Quản lý Hình Ảnh Xe</h2>
        <a href="{{ route('admin.car_images.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Thêm Hình Ảnh
        </a>
    </div>

    @if(session('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover text-center align-middle">
                <thead>
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
                        <td class="fw-bold">{{ $carId }}</td>
                        <td class="text-primary fw-semibold">{{ $images->first()->car->name ?? 'N/A' }}</td>
                        <td>
                            <div class="d-flex flex-wrap justify-content-center">
                                @foreach($images->take(5) as $image)
                                    <img src="{{ asset('storage/' . $image->image_url) }}" class="img-thumbnail shadow-sm me-2 mb-2" width="100">
                                @endforeach
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('admin.car_images.edit', $images->first()->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> Sửa
                            </a>
                            <form action="{{ route('admin.car_images.destroy', $images->first()->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xóa tất cả ảnh của xe này?')">
                                    <i class="bi bi-trash-fill"></i> Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

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
