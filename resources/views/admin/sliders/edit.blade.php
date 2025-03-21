@extends('layouts.admin.app')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-primary"><i class="fas fa-edit"></i> Edit Slider</h1>
    </div>

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
              @foreach($errors->all() as $error)
                  <li><i class="fas fa-exclamation-circle"></i> {{ $error }}</li>
              @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm p-4">
        <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-tag"></i> Hero Sub Title</label>
                <input type="text" name="hero_sub_title" class="form-control" value="{{ $slider->hero_sub_title }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-heading"></i> Hero Title (HTML allowed)</label>
                <input type="text" name="hero_title" class="form-control" value="{{ $slider->hero_title }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-align-left"></i> Description</label>
                <textarea name="hero_description" class="form-control">{{ $slider->hero_description }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-link"></i> Button 1 Text</label>
                <input type="text" name="btn1_text" class="form-control" value="{{ $slider->btn1_text }}">
            </div>
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-external-link-alt"></i> Button 1 Link</label>
                <input type="text" name="btn1_link" class="form-control" value="{{ $slider->btn1_link }}">
            </div>
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-link"></i> Button 2 Text</label>
                <input type="text" name="btn2_text" class="form-control" value="{{ $slider->btn2_text }}">
            </div>
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-external-link-alt"></i> Button 2 Link</label>
                <input type="text" name="btn2_link" class="form-control" value="{{ $slider->btn2_link }}">
            </div>
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-image"></i> Image</label>
                <input type="file" name="image" class="form-control">
                <br>
                <img src="{{ asset('storage/' . $slider->image) }}" alt="Slider" class="img-thumbnail" width="150">
            </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
        </form>
    </div>
</div>
@endsection
