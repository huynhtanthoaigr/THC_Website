@extends('layouts.admin.app')

@section('content')
<div class="container-fluid mt-4">  <!-- Sử dụng container-fluid để co giãn theo sidebar -->
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center fw-bold">
            <h4>
                <i class="fas fa-car-side me-2"></i> Quản lý Chi Tiết Xe
            </h4>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5>
                    <i class="fas fa-list-alt me-1"></i> Danh sách chi tiết xe
                </h5>
                <a href="{{ route('admin.car_details.create') }}" class="btn btn-success btn-sm d-flex align-items-center">
                    <i class="fas fa-plus-circle me-1"></i> Thêm Chi Tiết Xe
                </a>
            </div>

            <!-- Bảng Responsive -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th style="min-width: 100px;"><i class="fas fa-id-badge me-1"></i> ID</th>
                            <th style="min-width: 150px;"><i class="fas fa-car me-1"></i> Tên Xe</th>
                            <th style="min-width: 160px;"><i class="fas fa-cogs me-1"></i> Động cơ</th>
                            <th style="min-width: 200px;"><i class="fas fa-tachometer-alt me-1"></i> Công suất (HP)</th>
                            <th style="min-width: 200px;"><i class="fas fa-sync-alt me-1"></i> Mô-men xoắn</th>
                            <th style="min-width: 250px;"><i class="fas fa-gas-pump me-1"></i> Dung tích nhiên liệu</th>
                            <th style="min-width: 200px;"><i class="fas fa-ruler-combined me-1"></i> Kích thước</th>
                            <th style="min-width: 170px;"><i class="fas fa-weight-hanging me-1"></i> Trọng lượng</th>
                            <th style="min-width: 160px;"><i class="fas fa-shield-alt me-1"></i> Bảo hành</th>
                            <th style="min-width: 200px;"><i class="fas fa-list me-1"></i> Tính năng</th>
                            <th style="min-width: 200px;"><i class="fas fa-cogs me-1"></i> Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carDetails as $detail)
                            <tr>
                                <td>{{ $detail->id }}</td>
                                <td style="max-width: 150px; word-break: break-word;">
                                    {{ $detail->car->name ?? 'Không có dữ liệu' }}
                                </td>
                                <td>{{ $detail->engine }}</td>
                                <td>{{ $detail->horsepower }} HP</td>
                                <td>{{ $detail->torque }}</td>
                                <td>{{ $detail->fuel_capacity }} L</td>
                                <td style="max-width: 100px; word-break: break-word;">{{ $detail->dimensions }}</td>
                                <td>{{ $detail->weight }} kg</td>
                                <td>{{ $detail->warranty }}</td>
                                <td style="max-width: 200px; word-break: break-word;">{{ $detail->features }}</td>
                                <td>
                                    <a href="{{ route('admin.car_details.edit', $detail->id) }}" class="btn btn-warning btn-sm d-inline-flex align-items-center me-1">
                                        <i class="fas fa-edit me-1"></i> Sửa
                                    </a>
                                    <form action="{{ route('admin.car_details.destroy', $detail->id) }}" method="POST" class="d-inline">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm d-inline-flex align-items-center" onclick="return confirm('Bạn có chắc muốn xóa?')">
                                            <i class="fas fa-trash-alt me-1"></i> Xóa
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- End table-responsive -->

            <!-- Phân trang -->
            <div class="d-flex justify-content-center">
                {{ $carDetails->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
