@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <h2 class="mt-3"><i class="fas fa-list-alt"></i> Quản lý danh mục</h2>

    @if(session('success'))
        <div class="alert alert-success" id="success-message">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Thêm danh mục
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered text-center table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th><i class="fas fa-tag"></i> Tên danh mục</th>
                    <th><i class="fas fa-align-left"></i> Mô tả</th>
                    <th><i class="fas fa-cogs"></i> Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Sửa
                        </a>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">
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
