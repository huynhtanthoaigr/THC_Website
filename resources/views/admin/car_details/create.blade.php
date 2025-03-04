@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
<div class="row">
<div class="table-responsive">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center fw-bold">
            <h4>Thêm Chi Tiết Xe</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.car_details.store') }}" method="POST">
                @csrf

                <!-- Chọn xe -->
                <div class="mb-3">
                    <label for="car_id" class="form-label">Chọn xe:</label>
                    <select name="car_id" id="car_id" class="form-select" required>
                        <option value="" disabled selected>-- Chọn xe --</option>
                        @foreach($cars as $car)
                            <option value="{{ $car->id }}">{{ $car->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Các thông tin khác -->
                <div class="mb-3">
                    <label class="form-label">Động cơ:</label>
                    <input type="text" name="engine" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Công suất (HP):</label>
                    <input type="number" name="horsepower" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mô-men xoắn (Nm):</label>
                    <input type="number" name="torque" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Dung tích nhiên liệu (lít):</label>
                    <input type="number" step="0.1" name="fuel_capacity" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kích thước:</label>
                    <input type="text" name="dimensions" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Trọng lượng (kg):</label>
                    <input type="number" step="0.1" name="weight" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Bảo hành:</label>
                    <input type="text" name="warranty" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tính năng:</label>
                    <textarea name="features" class="form-control"></textarea>
                </div>

                <!-- Nút lưu -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success px-4">Lưu</button>
                </div>
            </form>
        </div>
        </div>
        </div>
    </div>
</div>
@endsection
