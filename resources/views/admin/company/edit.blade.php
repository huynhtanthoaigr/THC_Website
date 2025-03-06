@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <h2 class="mt-3">Chỉnh Sửa Thông Tin Công Ty</h2>

    @if(session('success'))
        <div class="alert alert-success" id="success-message">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.company.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card p-3">
            <div class="text-center mb-3">
                @if(!empty($company->logo))
                    <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo Công Ty" class="img-fluid rounded shadow-sm" style="max-height: 150px;">
                @else
                    <p class="text-muted">Chưa có logo</p>
                @endif
            </div>

            <div class="mb-3">
                <label for="logo" class="form-label">Logo Công Ty</label>
                <input type="file" class="form-control" name="logo" accept="image/*">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Tên Công Ty</label>
                <input type="text" class="form-control" name="name" value="{{ $company->name ?? '' }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $company->email ?? '' }}" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Số Điện Thoại</label>
                <input type="text" class="form-control" name="phone" value="{{ $company->phone ?? '' }}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Địa Chỉ</label>
                <textarea class="form-control" name="address" required>{{ $company->address ?? '' }}</textarea>
            </div>
            <div class="mb-3">
                <label for="website" class="form-label">Website</label>
                <input type="text" class="form-control" name="website" value="{{ $company->website ?? '' }}">
            </div>
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
        </div>
    </form>
</div>

{{-- Ẩn thông báo sau 5 giây --}}
<script>
    setTimeout(function() {
        let successMessage = document.getElementById('success-message');
        if (successMessage) {
            successMessage.style.transition = "opacity 0.5s";
            successMessage.style.opacity = "0";
            setTimeout(() => successMessage.remove(), 500);
        }
    }, 5000);
</script>
@endsection
