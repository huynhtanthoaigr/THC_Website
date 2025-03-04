@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <h2 class="mt-3">Danh Sách Xe</h2>

    @if(session('success'))
        <div class="alert alert-success" id="success-message">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.cars.create') }}" class="btn btn-primary">Thêm xe mới</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead class="">
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Thương hiệu</th>
                    <th>Loại xe</th>
                    <th>Giá</th>
                    <th>Năm sản xuất</th>
                    <th>Màu sắc</th>
                    <th>Hành động</th>
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
                        <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
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
