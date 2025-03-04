@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid mt-4">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center fw-bold">
                <h4>Quản lý Chi Tiết Xe</h4>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h5>Danh sách chi tiết xe</h5>
                    <a href="{{ route('admin.car_details.create') }}" class="btn btn-success btn-sm">
                        <i class="bi bi-plus-circle"></i> Thêm Chi Tiết Xe
                    </a>
                </div>

                <!-- Bảng Responsive -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th style="min-width: 50px;">ID</th>
                                <th style="min-width: 150px;">Tên Xe</th>
                                <th style="min-width: 120px;">Động cơ</th>
                                <th style="min-width: 180px;">Công suất (HP)</th>
                                <th style="min-width: 160px;">Mô-men xoắn</th>
                                <th style="min-width: 230px;">Dung tích nhiên liệu</th>
                                <th style="min-width: 150px;">Kích thước</th>
                                <th style="min-width: 170px;">Trọng lượng</th>
                                <th style="min-width: 160px;">Bảo hành</th>
                                <th style="min-width: 200px;">Tính năng</th>
                                <th style="min-width: 150px;">Hành động</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($carDetails as $detail)
                                <tr>
                                    <td>{{ $detail->id }}</td>
                                    <td style="max-width: 150px; word-break: break-word;">
                                        {{ $detail->car->name ?? 'Không có dữ liệu' }}</td>
                                    <td>{{ $detail->engine }}</td>
                                    <td>{{ $detail->horsepower }} HP</td>
                                    <td>{{ $detail->torque }}</td>
                                    <td>{{ $detail->fuel_capacity }} L</td>
                                    <td style="max-width: 100px; word-break: break-word;">{{ $detail->dimensions }}</td>
                                    <td>{{ $detail->weight }} kg</td>
                                    <td>{{ $detail->warranty }}</td>
                                    <td style="max-width: 200px; word-break: break-word;">{{ $detail->features }}</td>
                                    <td>
                                        <a href="{{ route('admin.car_details.edit', $detail->id) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil"></i> Sửa
                                        </a>
                                        <form action="{{ route('admin.car_details.destroy', $detail->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Bạn có chắc muốn xóa?')">
                                                <i class="bi bi-trash"></i> Xóa
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- Kết thúc div table-responsive -->

                <!-- Phân trang -->
                <div class="d-flex justify-content-center">
                    {{ $carDetails->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection