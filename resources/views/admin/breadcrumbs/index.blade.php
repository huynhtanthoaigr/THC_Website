@extends('layouts.admin.app')

@section('content')
<div class="container">
    <h2>Quản lý Breadcrumb</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.breadcrumbs.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="background_image" class="form-label">Ảnh Breadcrumb</label>
            @if($breadcrumb && $breadcrumb->background_image)
                <div class="mb-2">
                    <img src="{{ asset($breadcrumb->background_image) }}" width="300" alt="Breadcrumb">
                </div>
            @endif
            <input type="file" name="background_image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Cập Nhật</button>
    </form>
</div>
@endsection
