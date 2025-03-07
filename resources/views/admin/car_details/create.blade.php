@extends('layouts.admin.app')

@section('content')
<div class="container-fluid mt-4">  <!-- Sử dụng container-fluid để hiển thị co giãn theo sidebar -->
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center fw-bold">
            <h4>
                <i class="fas fa-car-side me-2"></i> Thêm Chi Tiết Xe
            </h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.car_details.store') }}" method="POST">
                @csrf

                <!-- Chọn xe -->
                <div class="mb-3">
                    <label for="car_id" class="form-label fw-semibold">
                        <i class="fas fa-car me-1"></i> Chọn xe:
                    </label>
                    <select name="car_id" id="car_id" class="form-select" required>
                        <option value="" disabled selected>-- Chọn xe --</option>
                        @foreach($cars as $car)
                            <option value="{{ $car->id }}">{{ $car->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Động cơ -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        <i class="fas fa-cogs me-1"></i> Động cơ:
                    </label>
                    <input type="text" name="engine" class="form-control" required>
                </div>

                <!-- Công suất (HP) -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        <i class="fas fa-tachometer-alt me-1"></i> Công suất (HP):
                    </label>
                    <input type="number" name="horsepower" class="form-control" required>
                </div>

                <!-- Mô-men xoắn (Nm) -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        <i class="fas fa-sync-alt me-1"></i> Mô-men xoắn (Nm):
                    </label>
                    <input type="number" name="torque" class="form-control" required>
                </div>

                <!-- Dung tích nhiên liệu (lít) -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        <i class="fas fa-gas-pump me-1"></i> Dung tích nhiên liệu (lít):
                    </label>
                    <input type="number" step="0.1" name="fuel_capacity" class="form-control" required>
                </div>

                <!-- Kích thước -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        <i class="fas fa-ruler-combined me-1"></i> Kích thước:
                    </label>
                    <input type="text" name="dimensions" class="form-control" required>
                </div>

                <!-- Trọng lượng (kg) -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        <i class="fas fa-weight-hanging me-1"></i> Trọng lượng (kg):
                    </label>
                    <input type="number" step="0.1" name="weight" class="form-control" required>
                </div>

                <!-- Bảo hành -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        <i class="fas fa-shield-alt me-1"></i> Bảo hành:
                    </label>
                    <input type="text" name="warranty" class="form-control" required>
                </div>

                <!-- Tính năng -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        <i class="fas fa-list me-1"></i> Tính năng:
                    </label>
                    <textarea name="features" class="form-control" rows="3"></textarea>
                </div>

                <!-- Nút lưu -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success px-4">
                        <i class="fas fa-save me-1"></i> Lưu
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
