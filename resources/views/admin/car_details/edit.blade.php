@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="table-responsive">
            <div class="card shadow-lg">
                    <div class="card-header bg-warning text-white text-center fw-bold">
                        <h4>Chỉnh sửa Chi Tiết Xe</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.car_details.update', $carDetail->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">
                                <!-- Chọn xe -->
                                <div class="col-lg-6 col-md-12">
                                    <label for="car_id" class="form-label">Tên Xe</label>
                                    <select name="car_id" id="car_id" class="form-select" required>
                                        @foreach($cars as $car)
                                            <option value="{{ $car->id }}" {{ $carDetail->car_id == $car->id ? 'selected' : '' }}>
                                                {{ $car->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Động cơ -->
                                <div class="col-lg-6 col-md-12">
                                    <label for="engine" class="form-label">Động cơ</label>
                                    <input type="text" name="engine" id="engine" class="form-control"
                                        value="{{ $carDetail->engine }}" required>
                                </div>

                                <!-- Công suất -->
                                <div class="col-lg-6 col-md-6">
                                    <label for="horsepower" class="form-label">Công suất (HP)</label>
                                    <input type="number" name="horsepower" id="horsepower" class="form-control"
                                        value="{{ $carDetail->horsepower }}" required>
                                </div>

                                <!-- Mô-men xoắn -->
                                <div class="col-lg-6 col-md-6">
                                    <label for="torque" class="form-label">Mô-men xoắn</label>
                                    <input type="text" name="torque" id="torque" class="form-control"
                                        value="{{ $carDetail->torque }}">
                                </div>

                                <!-- Dung tích nhiên liệu -->
                                <div class="col-lg-6 col-md-6">
                                    <label for="fuel_capacity" class="form-label">Dung tích nhiên liệu (L)</label>
                                    <input type="number" step="0.1" name="fuel_capacity" id="fuel_capacity"
                                        class="form-control" value="{{ $carDetail->fuel_capacity }}" required>
                                </div>

                                <!-- Kích thước -->
                                <div class="col-lg-6 col-md-6">
                                    <label for="dimensions" class="form-label">Kích thước</label>
                                    <input type="text" name="dimensions" id="dimensions" class="form-control"
                                        value="{{ $carDetail->dimensions }}">
                                </div>

                                <!-- Trọng lượng -->
                                <div class="col-lg-6 col-md-6">
                                    <label for="weight" class="form-label">Trọng lượng (kg)</label>
                                    <input type="number" name="weight" id="weight" class="form-control"
                                        value="{{ $carDetail->weight }}">
                                </div>

                                <!-- Bảo hành -->
                                <div class="col-lg-6 col-md-6">
                                    <label for="warranty" class="form-label">Bảo hành</label>
                                    <input type="text" name="warranty" id="warranty" class="form-control"
                                        value="{{ $carDetail->warranty }}">
                                </div>

                                <!-- Tính năng -->
                                <div class="col-12">
                                    <label for="features" class="form-label">Tính năng</label>
                                    <textarea name="features" id="features" class="form-control"
                                        rows="3">{{ $carDetail->features }}</textarea>
                                </div>
                            </div>

                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                <a href="{{ route('admin.car_details.index') }}" class="btn btn-secondary">Quay lại</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <!-- Custom CSS -->
 
@endsection