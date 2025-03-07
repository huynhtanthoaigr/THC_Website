@extends('layouts.admin.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class=" mx-auto">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="fw-bold">📂 Quản lý danh mục blog</h2>
                <a href="{{ route('admin.blog_categories.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> Thêm danh mục
                </a>
            </div>

            <!-- Form tìm kiếm -->
            <div class="mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="🔍 Tìm kiếm danh mục...">
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>ID</th>
                            <th>Tên danh mục</th>
                            <th>Slug</th>
                            <th>Mô tả</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody id="categoryTable">
                        @foreach ($categories as $category)
                            <tr>
                                <td class="text-center">{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>{{ $category->description }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.blog_categories.edit', $category) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Sửa
                                    </a>
                                    <form action="{{ route('admin.blog_categories.destroy', $category) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">
                                            <i class="fas fa-trash-alt"></i> Xóa
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($categories->isEmpty())
                <div class="alert alert-info text-center mt-3">Không có danh mục nào.</div>
            @endif
        </div>
    </div>
</div>

<script>
    document.getElementById("searchInput").addEventListener("keyup", function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll("#categoryTable tr");

        rows.forEach(row => {
            let text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? "" : "none";
        });
    });
</script>

@endsection
