@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class=" ">
            <h2 class="mb-4"><i class="fas fa-plus-circle"></i> Thêm danh mục</h2>

            @if(session('success'))
                <div id="success-message" class="alert alert-success d-flex align-items-center">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            <div class="card shadow-lg">
                <div class="card-body">
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label"><i class="fas fa-tag"></i> Tên danh mục</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label"><i class="fas fa-align-left"></i> Mô tả</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    setTimeout(function() {
        document.getElementById('success-message')?.remove();
    }, 5000);
</script>
@endsection
