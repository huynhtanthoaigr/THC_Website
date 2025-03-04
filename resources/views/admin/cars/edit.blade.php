@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
<div class="row">
<div class="table-responsive">
    <h2>Sửa xe: {{ $car->name }}</h2>
    <form action="{{ route('admin.cars.update', $car->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Tên xe</label>
            <input type="text" name="name" class="form-control" value="{{ $car->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Thương hiệu</label>
            <select name="brand_id" class="form-control" required>
                @foreach (\App\Models\Brand::all() as $brand)
                    <option value="{{ $brand->id }}" {{ $car->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Loại xe</label>
            <select name="category_id" class="form-control" required>
                @foreach (\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}" {{ $car->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Giá</label>
            <input type="number" name="price" class="form-control" value="{{ $car->price }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Năm sản xuất</label>
            <input type="number" name="model_year" class="form-control" value="{{ $car->model_year }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Số km đã đi</label>
            <input type="number" name="mileage" class="form-control" value="{{ $car->mileage }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Truyền động</label>
            <input type="text" name="transmission" class="form-control" value="{{ $car->transmission }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nhiên liệu</label>
            <input type="text" name="fuel_type" class="form-control" value="{{ $car->fuel_type }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Màu sắc</label>
            <input type="text" name="color" class="form-control" value="{{ $car->color }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Mô tả</label>
            <textarea name="description" class="form-control">{{ $car->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Số lượng trong kho</label>
            <input type="number" name="stock" class="form-control" value="{{ $car->stock }}" required>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
    </form>
</div>
</div>
</div>
@endsection
