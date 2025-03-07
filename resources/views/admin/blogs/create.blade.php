@extends('layouts.admin.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class=" mx-auto">
            <h2 class="mb-4">📝 Create New Blog</h2>

            {{-- Hiển thị lỗi nếu có --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card shadow-lg">
                <div class="card-body">
                    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label fw-bold">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required onkeyup="generateSlug()">
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label fw-bold">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label fw-bold">Category</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="">-- Select Category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label fw-bold">Content</label>
                            <textarea name="content" id="content" class="form-control" rows="6" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label fw-bold">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-plus-circle"></i> Create
                            </button>
                            <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function generateSlug() {
        let title = document.getElementById('title').value;
        let slug = title.toLowerCase()
            .normalize('NFD').replace(/[\u0300-\u036f]/g, '') // Loại bỏ dấu tiếng Việt
            .replace(/đ/g, 'd').replace(/Đ/g, 'D') // Chuyển đổi đ -> d
            .replace(/[^a-z0-9\s-]/g, '') // Xóa ký tự đặc biệt
            .replace(/\s+/g, '-') // Thay khoảng trắng bằng dấu -
            .replace(/-+/g, '-'); // Xóa dấu - thừa
        
        document.getElementById('slug').value = slug;
    }
</script>

@endsection
