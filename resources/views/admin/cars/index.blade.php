@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <h2 class="mt-3"><i class="fas fa-car"></i> Danh Sách Xe</h2>

    @if(session('success'))
        <div class="alert alert-success d-flex align-items-center" id="success-message">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.cars.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Thêm xe mới
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th><i class="fas fa-car"></i> Tên</th>
                    <th><i class="fas fa-industry"></i> Thương hiệu</th>
                    <th><i class="fas fa-tags"></i> Loại xe</th>
                    <th><i class="fas fa-dollar-sign"></i> Giá</th>
                    <th><i class="fas fa-calendar-alt"></i> Năm sản xuất</th>
                    <th><i class="fas fa-palette"></i> Màu sắc</th>
                    <th><i class="fas fa-cogs"></i> Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cars as $car)
                <tr>
                    <td>{{ $car->id }}</td>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->brand->name }}</td>
                    <td>{{ $car->category->name }}</td>
                    <td>{{ number_format($car->price, 0, ',', '.') }} $</td>
                    <td>{{ $car->model_year }}</td>
                    <td>{{ $car->color }}</td>
                    <td>
                        <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Sửa
                        </a>
                        <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                <i class="fas fa-trash-alt"></i> Xóa
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    setTimeout(function() {
        document.getElementById('success-message')?.remove();
    }, 5000);
</script>

@endsection
