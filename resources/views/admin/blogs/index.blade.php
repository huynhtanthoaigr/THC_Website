@extends('layouts.admin.app')

@section('content')
<div class="container-fluid mt-4">
    <h2 class="mb-4">📑 Manage Blogs</h2>

    <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus-circle"></i> Create New Blog
    </a>

    {{-- Hiển thị tối đa 5 thông báo thành công --}}
    @if(session()->has('success_messages'))
        <div class="alert alert-success">
            <ul class="mb-0">
                @foreach(session('success_messages') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-lg">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($blog->image)
                                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" class="rounded img-thumbnail" width="80">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td><strong>{{ $blog->title }}</strong></td>
                                <td class="text-truncate" style="max-width: 250px;">{{ Str::limit(strip_tags($blog->content), 100, '...') }}</td>
                                <td>
                                    <span class="badge bg-info">{{ $blog->category->name ?? 'Uncategorized' }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $blog->status == 'published' ? 'success' : 'secondary' }}">
                                        {{ ucfirst($blog->status) }}
                                    </span>
                                </td>
                                <td>{{ $blog->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-3">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
