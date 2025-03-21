@extends('layouts.admin.app')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-primary"><i class="fas fa-images"></i>Managers Sliders</h1>
       
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover align-middle shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>Images</th>
                    <th>Subtitle</th>
                    <th>Main title</th>
                    <th class="text-center">Act</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sliders as $slider)
                <tr>
                    <td>
                        <img src="{{ asset('storage/' . $slider->image) }}" alt="Slider" class="img-thumbnail" width="120">
                    </td>
                    <td class="text-muted">{{ $slider->hero_sub_title }}</td>
                    <td class="fw-bold">{!! $slider->hero_title !!}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="btn btn-sm btn-warning me-1">
                           Edit <i class="fas fa-edit"></i>
                        </a>
                        {{-- Nếu không cho phép xóa, bỏ phần này --}}
                        {{-- <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
