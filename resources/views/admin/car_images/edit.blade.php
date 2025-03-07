@extends('layouts.admin.app')

@section('content')
<div class="container-fluid mt-4">  <!-- Sử dụng container-fluid để tự động co giãn theo sidebar -->
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center fw-bold">
            <h4><i class="fas fa-edit me-2"></i> Chỉnh Sửa Hình Ảnh Xe</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.car_images.update', $carImage->id) }}" method="POST" enctype="multipart/form-data">
                @csrf 
                @method('PUT')

                <!-- Chọn xe -->
                <div class="mb-3">
                    <label for="car_id" class="form-label fw-semibold">
                        <i class="fas fa-car me-1"></i> Chọn Xe
                    </label>
                    <select name="car_id" id="car_id" class="form-select">
                        @foreach($cars as $car)
                            <option value="{{ $car->id }}" {{ $carImage->car_id == $car->id ? 'selected' : '' }}>
                                {{ $car->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Hiển thị 4 ô ảnh với nút sửa -->
                <div class="row mb-3">
                    @foreach ($carImages as $index => $image)
                        <div class="col-md-3 col-6 text-center">
                            <div class="image-preview border p-2 rounded shadow-sm" id="preview-{{ $index }}">
                                <img src="{{ asset('storage/' . $image->image_url) }}" alt="Ảnh {{ $index+1 }}" id="img-{{ $index }}" class="img-thumbnail" style="width: 100%; height: 150px; object-fit: cover; border-radius: 5px;">
                            </div>
                            <input type="file" name="images[{{ $image->id }}]" id="image-{{ $index }}" class="d-none" accept="image/*" onchange="previewImage(event, {{ $index }})">
                            <button type="button" class="btn btn-warning btn-sm mt-2 w-100" onclick="document.getElementById('image-{{ $index }}').click();">
                                <i class="fas fa-edit me-1"></i> Sửa Ảnh {{ $index+1 }}
                            </button>
                        </div>
                    @endforeach
                </div>

                <!-- Nút cập nhật ảnh -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save me-1"></i> Cập Nhật
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewImage(event, index) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('img-' + index).src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
