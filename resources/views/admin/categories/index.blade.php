@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <h2 class="mt-3">Quản lý danh mục</h2>

    @if(session('success'))
        <div class="alert alert-success" id="success-message">
            {{ session('success') }}
        </div>
    @endif

  
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Thêm danh mục</a>
    </div>

  
    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead class="">
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
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
