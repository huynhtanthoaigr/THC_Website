@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <h2 class="my-3"><i class="fas fa-tags"></i> Brand Management</h2>

    @if(session('success'))
        <div id="success-message" class="alert alert-success d-flex align-items-center">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        </div>
    @endif

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addBrandModal">
        <i class="fas fa-plus"></i> Add Brand
    </button>

    <input type="text" id="search" class="form-control mb-3" placeholder="Search brands...">

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-hover table-bordered align-middle" id="brandTable">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th><i class="fas fa-image"></i> Logo</th>
                        <th><i class="fas fa-building"></i> Brand Name</th>
                        <th><i class="fas fa-globe"></i> Country</th>
                        <th><i class="fas fa-cogs"></i> Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($brands as $brand)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if(!empty($brand->logo))
                                    <img src="{{ asset('storage/' . $brand->logo) }}" alt="Logo" style="max-height: 50px;">
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </td>
                            <td>{{ $brand->name }}</td>
                            <td>{{ $brand->country }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editBrandModal{{ $brand->id }}">DELETES
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('admin.brands.destroy', $brand) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete?')">EDIT
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editBrandModal{{ $brand->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Brand</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label class="form-label">Brand Name</label>
                                                <input type="text" class="form-control" name="name" value="{{ $brand->name }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Country</label>
                                                <input type="text" class="form-control" name="country" value="{{ $brand->country }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Logo</label>
                                                <input type="file" class="form-control" name="logo">
                                                @if(!empty($brand->logo))
                                                    <img src="{{ asset('storage/' . $brand->logo) }}" alt="Logo" style="max-height: 50px; margin-top: 10px;">
                                                @endif
                                            </div>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save"></i> Update
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="addBrandModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-plus"></i> Add Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Brand Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Country</label>
                        <input type="text" class="form-control" name="country">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Logo</label>
                        <input type="file" class="form-control" name="logo">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Add
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    setTimeout(function() {
        let successMessage = document.getElementById('success-message');
        if (successMessage) {
            successMessage.style.transition = 'opacity 0.5s';
            successMessage.style.opacity = '0';
            setTimeout(() => successMessage.remove(), 500);
        }
    }, 5000);

    document.getElementById('search').addEventListener('keyup', function() {
        let value = this.value.toLowerCase();
        let rows = document.querySelectorAll('#brandTable tbody tr');
        rows.forEach(row => {
            let name = row.cells[2].textContent.toLowerCase();
            let country = row.cells[3].textContent.toLowerCase();
            if (name.includes(value) || country.includes(value)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>

@endsection
