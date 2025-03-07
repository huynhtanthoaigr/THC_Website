@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="table-responsive">
            <h2><i class="fas fa-edit"></i> Chỉnh sửa xe: {{ $car->name }}</h2>
            <form action="{{ route('admin.cars.update', $car->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-car"></i> Tên xe</label>
                    <input type="text" name="name" class="form-control" value="{{ $car->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-industry"></i> Thương hiệu</label>
                    <select name="brand_id" class="form-control" required>
                        @foreach (\App\Models\Brand::all() as $brand)
                            <option value="{{ $brand->id }}" {{ $car->brand_id == $brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-tags"></i> Loại xe</label>
                    <select name="category_id" class="form-control" required>
                        @foreach (\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}" {{ $car->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-dollar-sign"></i> Giá</label>
                    <input type="number" name="price" class="form-control" value="{{ $car->price }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-calendar-alt"></i> Năm sản xuất</label>
                    <input type="number" name="model_year" class="form-control" value="{{ $car->model_year }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-road"></i> Số km đã đi</label>
                    <input type="number" name="mileage" class="form-control" value="{{ $car->mileage }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-cogs"></i> Truyền động</label>
                    <div class="d-flex">
                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="transmission" value="manual" id="manual" {{ $car->transmission == 'manual' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="manual">Số sàn (Manual)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="transmission" value="automatic" id="automatic" {{ $car->transmission == 'automatic' ? 'checked' : '' }}>
                            <label class="form-check-label" for="automatic">Tự động (Automatic)</label>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-gas-pump"></i> Nhiên liệu</label>
                    <div class="d-flex flex-wrap">
                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="fuel_type" value="gasoline" id="gasoline" {{ $car->fuel_type == 'gasoline' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="gasoline">Xăng (Gasoline)</label>
                        </div>
                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="fuel_type" value="diesel" id="diesel" {{ $car->fuel_type == 'diesel' ? 'checked' : '' }}>
                            <label class="form-check-label" for="diesel">Dầu (Diesel)</label>
                        </div>
                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="fuel_type" value="electric" id="electric" {{ $car->fuel_type == 'electric' ? 'checked' : '' }}>
                            <label class="form-check-label" for="electric">Điện (Electric)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="fuel_type" value="hybrid" id="hybrid" {{ $car->fuel_type == 'hybrid' ? 'checked' : '' }}>
                            <label class="form-check-label" for="hybrid">Hybrid</label>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-palette"></i> Màu sắc</label>
                    <input type="text" name="color" class="form-control" value="{{ $car->color }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-info-circle"></i> Mô tả</label>
                    <textarea name="description" class="form-control">{{ $car->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-boxes"></i> Số lượng trong kho</label>
                    <input type="number" name="stock" class="form-control" value="{{ $car->stock }}" required>
                </div>

                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Cập nhật</button>
            </form>
        </div>
    </div>
</div>
@endsection
