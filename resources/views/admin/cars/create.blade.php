@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
<div class="row">
<div class="table-responsive">
    <h2>Thêm xe mới</h2>
    <form action="{{ route('admin.cars.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên xe</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Thương hiệu</label>
            <select name="brand_id" class="form-control" required>
                @foreach (\App\Models\Brand::all() as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Loại xe</label>
            <select name="category_id" class="form-control" required>
                @foreach (\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Giá</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Năm sản xuất</label>
            <input type="number" name="model_year" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Số km đã đi</label>
            <input type="number" name="mileage" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Truyền động</label>
            <input type="text" name="transmission" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nhiên liệu</label>
            <input type="text" name="fuel_type" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Màu sắc</label>
            <input type="text" name="color" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Mô tả</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Số lượng trong kho</label>
            <input type="number" name="stock" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Thêm xe</button>
    </form>
    </div>
    </div>
</div>
@endsection
