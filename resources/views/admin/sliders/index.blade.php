@extends('layouts.admin.app')

@section('content')
<div class="container">
    <h1>Manage Sliders</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Hero Sub Title</th>
                <th>Hero Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sliders as $slider)
            <tr>
                <td>
                    <img src="{{ asset('storage/' . $slider->image) }}" alt="Slider" width="150">
                </td>
                <td>{{ $slider->hero_sub_title }}</td>
                <td>{!! $slider->hero_title !!}</td>
                <td>
                    <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="btn btn-warning">Edit</a>
                    {{-- Nếu không cho phép xóa, bỏ phần này --}}
                    {{-- <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                    </form> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
