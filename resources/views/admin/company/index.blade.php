@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm p-4">
        <h2 class="text-center text-primary">Thông Tin Công Ty</h2>

        {{-- Hiển thị thông báo thành công --}}
        @if(session('success'))
            <div class="alert alert-success text-center" id="success-message">
                {{ session('success') }}
            </div>
        @endif

        <div class="row align-items-center">
            {{-- Logo Công Ty --}}
            <div class="col-md-4 text-center">
                @if(!empty($company->logo))
                    <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo Công Ty" class="img-thumbnail shadow-sm" style="max-width: 200px;">
                @else
                    <div class="d-flex align-items-center justify-content-center border rounded" style="width: 200px; height: 200px; background-color: #f8f9fa;">
                        <span class="text-muted">Chưa có logo</span>
                    </div>
                @endif
            </div>

            {{-- Thông Tin Công Ty --}}
            <div class="col-md-8">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th class="bg-light text-dark" width="30%">Tên Công Ty</th>
                            <td>{{ $company->name ?? 'Chưa cập nhật' }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light text-dark">Email</th>
                            <td>{{ $company->email ?? 'Chưa cập nhật' }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light text-dark">Số Điện Thoại</th>
                            <td>{{ $company->phone ?? 'Chưa cập nhật' }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light text-dark">Địa Chỉ</th>
                            <td>{{ $company->address ?? 'Chưa cập nhật' }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light text-dark">Website</th>
                            <td>
                                @if(!empty($company->website))
                                    <a href="{{ $company->website }}" target="_blank" class="text-primary">{{ $company->website }}</a>
                                @else
                                    Chưa cập nhật
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="text-end">
                    <a href="{{ route('admin.company.edit') }}" class="btn btn-primary mt-3">
                        <i class="fas fa-edit"></i> Chỉnh sửa
                    </a>
                </div>
            </div>
        </div>
    </div>
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
