@extends('layouts.admin.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class=" mx-auto">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="fas fa-edit"></i> Chỉnh sửa danh mục blog</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.blog_categories.update', $blogCategory->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Tên danh mục</label>
                            <input type="text" name="name" id="name" class="form-control" 
                                value="{{ old('name', $blogCategory->name) }}" required onkeyup="generateSlug()">
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label fw-bold">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" 
                                value="{{ old('slug', $blogCategory->slug) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">Mô tả</label>
                            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $blogCategory->description) }}</textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.blog_categories.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Quay lại
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Cập nhật
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function generateSlug() {
        let name = document.getElementById('name').value;
        let slug = name.toLowerCase()
            .normalize('NFD').replace(/[\u0300-\u036f]/g, '') // Loại bỏ dấu tiếng Việt
            .replace(/đ/g, 'd').replace(/Đ/g, 'D') // Chuyển đổi đ -> d
            .replace(/[^a-z0-9\s-]/g, '') // Xóa ký tự đặc biệt
            .replace(/\s+/g, '-') // Thay khoảng trắng bằng dấu -
            .replace(/-+/g, '-'); // Xóa dấu - thừa
        
        document.getElementById('slug').value = slug;
    }
</script>

@endsection
