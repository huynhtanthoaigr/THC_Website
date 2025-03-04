@extends('layouts.admin.app')

@section('content')
<div class="container">
    <h2>Chỉnh Sửa Hình Ảnh Xe</h2>

    <form action="{{ route('admin.car_images.update', $carImage->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <!-- Chọn xe -->
        <div class="mb-3">
            <label for="car_id" class="form-label">Chọn Xe</label>
            <select name="car_id" id="car_id" class="form-control">
                @foreach($cars as $car)
                    <option value="{{ $car->id }}" {{ $carImage->car_id == $car->id ? 'selected' : '' }}>{{ $car->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Hiển thị 5 ô ảnh với nút sửa -->
        <div class="row mb-3">
            @foreach ($carImages as $index => $image)
                <div class="col-md-2 text-center">
                    <div class="image-preview border p-2" id="preview-{{ $index }}">
                        <img src="{{ asset('storage/' . $image->image_url) }}" alt="Ảnh {{ $index+1 }}" id="img-{{ $index }}" class="img-thumbnail">
                    </div>
                    <input type="file" name="images[{{ $image->id }}]" id="image-{{ $index }}" class="d-none" accept="image/*" onchange="previewImage(event, {{ $index }})">
                    <button type="button" class="btn btn-warning btn-sm mt-2" onclick="document.getElementById('image-{{ $index }}').click();">
                        Sửa Ảnh {{ $index+1 }}
                    </button>
                </div>
            @endforeach
        </div>

        <!-- Nút cập nhật ảnh -->
        <button type="submit" class="btn btn-success">Cập Nhật</button>
    </form>
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
