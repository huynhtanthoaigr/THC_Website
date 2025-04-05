@extends('layouts.admin.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary mb-3 mb-sm-0">
            <i class="fas fa-images me-2"></i> Car Image Management
        </h2>
        <a href="{{ route('admin.car_images.create') }}" class="btn btn-success d-flex align-items-center">
            <i class="fas fa-plus-circle me-1"></i> Add New Image
        </a>
    </div>

    @if(session('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white fw-bold">
            <i class="fas fa-list-alt me-2"></i> Car Images List
        </div>
        <div class="card-body">
            <!-- Search Form -->
            <div class="mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="🔍 Search for cars or images...">
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Car</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="carImagesTable">
                        @foreach($carImages->groupBy('car_id') as $carId => $images)
                        <tr>
                            <td class="fw-bold text-secondary">{{ $carId }}</td>
                            <td class="text-primary fw-semibold">
                                <i class="fas fa-car me-1"></i> {{ $images->first()->car->name ?? 'N/A' }}
                            </td>
                            <td>
                                <div class="d-flex flex-wrap justify-content-center">
                                    @foreach($images->take(4) as $image)
                                        <a href="{{ asset('storage/' . $image->image_url) }}" target="_blank" title="View full-size image">
                                            <img src="{{ asset('storage/' . $image->image_url) }}" 
                                                 class="img-thumbnail car-thumbnail" 
                                                 alt="Car Image">
                                        </a>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.car_images.edit', $images->first()->id) }}" 
                                       class="btn btn-warning btn-sm d-flex align-items-center me-1">
                                        <i class="fas fa-edit me-1"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.car_images.destroy', $images->first()->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete all images for this car?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center">
                                            <i class="fas fa-trash-alt me-1"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS for responsive images and horizontal scroll -->
<style>
    .car-thumbnail {
         width: 120px;
         height: 80px;
         object-fit: cover;
         border-radius: 5px;
         box-shadow: 0 0 5px rgba(0,0,0,0.1);
         margin-right: 0.5rem;
         margin-bottom: 0.5rem;
    }

    .table-responsive {
         overflow-x: auto;
    }
    .table-responsive table {
         min-width: 800px; /* Adjust this value to fit the number of columns in your table */
    }
</style>

<script>
    // Automatically hide success alert after 5 seconds
    setTimeout(function() {
        let alertBox = document.getElementById('success-alert');
        if (alertBox) {
            alertBox.style.transition = "opacity 0.5s ease";
            alertBox.style.opacity = "0";
            setTimeout(() => alertBox.remove(), 500);
        }
    }, 5000);

    // Search functionality for cars and images
    document.getElementById("searchInput").addEventListener("keyup", function () {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll("#carImagesTable tr");

        rows.forEach(row => {
            let text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? "" : "none";
        });
    });
</script>
@endsection
