@extends('layouts.admin.app')

@section('content')
<div class="container">
    <h1>Add Slider</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Hero Sub Title</label>
            <input type="text" name="hero_sub_title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Hero Title (có thể chứa HTML ví dụ: <code>&lt;span&gt;</code>)</label>
            <input type="text" name="hero_title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Hero Description</label>
            <textarea name="hero_description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Button 1 Text</label>
            <input type="text" name="btn1_text" class="form-control">
        </div>
        <div class="mb-3">
            <label>Button 1 Link</label>
            <input type="text" name="btn1_link" class="form-control">
        </div>
        <div class="mb-3">
            <label>Button 2 Text</label>
            <input type="text" name="btn2_text" class="form-control">
        </div>
        <div class="mb-3">
            <label>Button 2 Link</label>
            <input type="text" name="btn2_link" class="form-control">
        </div>
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save Slider</button>
    </form>
</div>
@endsection
