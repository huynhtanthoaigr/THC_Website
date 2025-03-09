@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <div class="card shadow-sm p-4">
            <h2 class="text-center text-primary mb-4">
                <i class="fas fa-edit"></i> Chỉnh Sửa Thông Tin Công Ty
            </h2>

            {{-- Hiển thị thông báo thành công --}}
            @if(session('success'))
                <div class="alert alert-success text-center" id="success-message">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.company.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    {{-- Logo Công Ty --}}
                    <div class="col-md-4 text-center mb-3">
                        @if(!empty($company->logo))
                            <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo Công Ty"
                                class="img-thumbnail shadow-sm rounded-circle" style="max-width: 180px;">
                        @else
                            <div class="d-flex align-items-center justify-content-center border rounded-circle"
                                style="width: 180px; height: 180px; background-color: #f8f9fa;">
                                <i class="fas fa-image text-muted fa-3x"></i>
                            </div>
                        @endif
                        <label for="logo" class="form-label mt-3">
                            <i class="fas fa-upload"></i> Cập Nhật Logo
                        </label>
                        <input type="file" class="form-control" name="logo" accept="image/*">
                    </div>

                    {{-- Form Nhập Liệu --}}
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                <i class="fas fa-building"></i> Tên Công Ty
                            </label>
                            <input type="text" class="form-control" name="name" value="{{ $company->name ?? '' }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope"></i> Email
                            </label>
                            <input type="email" class="form-control" name="email" value="{{ $company->email ?? '' }}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">
                                <i class="fas fa-phone"></i> Số Điện Thoại
                            </label>
                            <input type="text" class="form-control" name="phone" value="{{ $company->phone ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">
                                <i class="fas fa-map-marker-alt"></i> Địa Chỉ
                            </label>
                            <textarea class="form-control" name="address" required>{{ $company->address ?? '' }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="opening_hours" class="form-label">Thời Gian Mở Cửa</label>
                            <input type="text" class="form-control" id="opening_hours" name="opening_hours"
                                value="{{ old('opening_hours', $company->opening_hours) }}"
                                placeholder="Ví dụ: 08:00 - 18:00">
                        </div>

                        <div class="mb-3">
                            <label for="website" class="form-label">
                                <i class="fas fa-globe"></i> Website
                            </label>
                            <input type="text" class="form-control" name="website" value="{{ $company->website ?? '' }}">
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Cập Nhật
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Ẩn thông báo sau 5 giây --}}
    <script>
        setTimeout(function () {
            let successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.style.transition = "opacity 0.5s";
                successMessage.style.opacity = "0";
                setTimeout(() => successMessage.remove(), 500);
            }
        }, 5000);
    </script>
@endsection