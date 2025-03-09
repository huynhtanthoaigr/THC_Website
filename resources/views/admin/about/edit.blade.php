@extends('layouts.admin.app')

@section('content')
<div class="container">
    <!-- Tiêu đề -->
    <div class="bg-primary text-white p-4 rounded shadow-lg text-center mb-4">
        <h1><i class="fas fa-edit"></i> Edit About Us</h1>
          </div>

    <!-- Form Chỉnh Sửa -->
    <div class="card shadow-lg border-0">
        <div class="card-body">
            <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Tiêu đề -->
                <div class="mb-3">
                    <label class="form-label fw-bold"><i class="fas fa-heading"></i> Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $about->title ?? '' }}" required>
                </div>

                <!-- Mô tả -->
                <div class="mb-3">
                    <label class="form-label fw-bold"><i class="fas fa-align-left"></i> Description</label>
                    <textarea name="description" class="form-control" rows="4" required>{{ $about->description ?? '' }}</textarea>
                </div>

                <!-- Ảnh -->
                <div class="mb-3">
                    <label class="form-label fw-bold"><i class="fas fa-image"></i> Image</label>
                    <input type="file" name="image" class="form-control">
                    @if($about->image)
                        <div class="mt-3 text-center">
                            <img src="{{ asset('storage/' . $about->image) }}" alt="Current Image" class="img-thumbnail rounded shadow-lg" style="max-width: 300px;">
                        </div>
                    @endif
                </div>

                <!-- Các Sub Content -->
                @for($i = 1; $i <= 5; $i++)
                    <div class="mb-3">
                        <label class="form-label fw-bold"><i class="fas fa-list"></i> Sub Content {{ $i }}</label>
                        <input type="text" name="sub_content_{{ $i }}" class="form-control" value="{{ $about->{'sub_content_' . $i} ?? '' }}">
                    </div>
                @endfor

                <!-- Nút Submit -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="fas fa-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
