@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Nội dung chính -->
        <div class="table-responsive">
            <h2 class="mb-4">Thêm danh mục</h2>

            <!-- Hiển thị thông báo thành công -->
            @if(session('success'))
                <div id="success-message" class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên danh mục</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script để ẩn thông báo sau 5s -->
<script>
    setTimeout(function() {
        document.getElementById('success-message')?.remove();
    }, 5000);
</script>

@endsection
