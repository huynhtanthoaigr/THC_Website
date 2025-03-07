@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <h2 class="my-3"><i class="fas fa-tags"></i> Quản lý thương hiệu</h2>

    @if(session('success'))
        <div id="success-message" class="alert alert-success d-flex align-items-center">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        </div>
    @endif

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addBrandModal">
        <i class="fas fa-plus"></i> Thêm thương hiệu
    </button>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th><i class="fas fa-building"></i> Tên thương hiệu</th>
                        <th><i class="fas fa-globe"></i> Quốc gia</th>
                        <th><i class="fas fa-cogs"></i> Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($brands as $brand)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $brand->name }}</td>
                            <td>{{ $brand->country }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editBrandModal{{ $brand->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('admin.brands.destroy', $brand) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editBrandModal{{ $brand->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><i class="fas fa-edit"></i> Chỉnh sửa thương hiệu</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label class="form-label"><i class="fas fa-building"></i> Tên thương hiệu</label>
                                                <input type="text" class="form-control" name="name" value="{{ $brand->name }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"><i class="fas fa-globe"></i> Quốc gia</label>
                                                <input type="text" class="form-control" name="country" value="{{ $brand->country }}">
                                            </div>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save"></i> Cập nhật
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="addBrandModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-plus"></i> Thêm thương hiệu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.brands.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-building"></i> Tên thương hiệu</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-globe"></i> Quốc gia</label>
                        <input type="text" class="form-control" name="country">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Thêm mới
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

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
