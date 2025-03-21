@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Cột chính chứa nội dung -->
        <div >
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h2><i class="fas fa-bars"></i> Breadcrumb Management</h2>
            </div>

            @if(session('success'))
                <div class="alert alert-success d-flex align-items-center">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-image"></i> Update Breadcrumb Image
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.breadcrumbs.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="background_image" class="form-label">
                                <i class="fas fa-photo-video"></i> Breadcrumb Image
                            </label>
                            @if($breadcrumb && $breadcrumb->background_image)
                                <div class="mb-2 text-center">
                                    <img src="{{ asset($breadcrumb->background_image) }}" 
                                         class="img-fluid rounded shadow-sm" 
                                         style="max-width: 100%; height: auto;" 
                                         alt="Breadcrumb">
                                </div>
                            @endif
                            <input type="file" name="background_image" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
