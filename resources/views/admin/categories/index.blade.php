@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <h2 class="mt-3"><i class="fas fa-list-alt"></i> Category Management</h2>

    @if(session('success'))
        <div class="alert alert-success" id="success-message">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Category
        </a>
    </div>

    <!-- Search Form -->
    <div class="mb-3">
        <input type="text" id="searchInput" class="form-control" placeholder="🔍 Search categories...">
    </div>

    <div class="table-responsive">
        <table class="table table-bordered text-center table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Category Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="categoryTable">
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>
                    @if($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}" class="img-thumbnail" width="80">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

        </table>
    </div>
</div>

<script>
    // Remove success message after 5 seconds
    setTimeout(function() {
        document.getElementById('success-message')?.remove();
    }, 5000);

    // Search functionality
    document.getElementById("searchInput").addEventListener("keyup", function () {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll("#categoryTable tr");

        rows.forEach(row => {
            let text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? "" : "none";
        });
    });
</script>
@endsection
