@extends('layouts.admin.app')

@section('content')
<div class="container">
    <h1>Edit Slider</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Hero Sub Title</label>
            <input type="text" name="hero_sub_title" class="form-control" value="{{ $slider->hero_sub_title }}" required>
        </div>
        <div class="mb-3">
            <label>Hero Title (có thể chứa HTML)</label>
            <input type="text" name="hero_title" class="form-control" value="{{ $slider->hero_title }}" required>
        </div>
        <div class="mb-3">
            <label>Hero Description</label>
            <textarea name="hero_description" class="form-control">{{ $slider->hero_description }}</textarea>
        </div>
        <div class="mb-3">
            <label>Button 1 Text</label>
            <input type="text" name="btn1_text" class="form-control" value="{{ $slider->btn1_text }}">
        </div>
        <div class="mb-3">
            <label>Button 1 Link</label>
            <input type="text" name="btn1_link" class="form-control" value="{{ $slider->btn1_link }}">
        </div>
        <div class="mb-3">
            <label>Button 2 Text</label>
            <input type="text" name="btn2_text" class="form-control" value="{{ $slider->btn2_text }}">
        </div>
        <div class="mb-3">
            <label>Button 2 Link</label>
            <input type="text" name="btn2_link" class="form-control" value="{{ $slider->btn2_link }}">
        </div>
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <br>
            <img src="{{ asset('storage/' . $slider->image) }}" alt="Slider" width="150">
        </div>
        <button type="submit" class="btn btn-success">Update Slider</button>
    </form>
</div>
@endsection
