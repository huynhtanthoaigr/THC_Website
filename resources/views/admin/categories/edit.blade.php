@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <h2 class="my-3"><i class="fas fa-edit"></i> Sửa danh mục</h2>

    {{-- Hiển thị thông báo thành công --}}
    @if(session('success'))
        <div id="success-message" class="alert alert-success d-flex align-items-center">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-folder"></i> Chỉnh sửa danh mục</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label"><i class="fas fa-tag"></i> Tên danh mục</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label"><i class="fas fa-align-left"></i> Mô tả</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ $category->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Cập nhật</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Quay lại</a>
            </form>
        </div>
    </div>
</div>

{{-- Script để ẩn thông báo sau 5 giây --}}
<script>
    setTimeout(function() {
        let successMessage = document.getElementById('success-message');
        if (successMessage) {
            successMessage.style.transition = 'opacity 0.5s';
            successMessage.style.opacity = '0';
            setTimeout(() => successMessage.remove(), 500);
        }
    }, 5000);
</script>
@endsection
