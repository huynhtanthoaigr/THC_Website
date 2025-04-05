@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <h2 class="mt-3"><i class="fas fa-car"></i> Car List</h2>

    @if(session('success'))
        <div class="alert alert-success d-flex align-items-center" id="success-message">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.cars.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Car
        </a>
    </div>

    <!-- Search Form -->
    <div class="mb-3">
        <input type="text" id="searchInput" class="form-control" placeholder="🔍 Search cars...">
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th><i class="fas fa-car"></i> Name</th>
                    <th><i class="fas fa-industry"></i> Brand</th>
                    <th><i class="fas fa-tags"></i> Category</th>
                    <th><i class="fas fa-dollar-sign"></i> Price</th>
                    <th><i class="fas fa-calendar-alt"></i> Model Year</th>
                    <th><i class="fas fa-palette"></i> Color</th>
                    <th><i class="fas fa-cogs"></i> Actions</th>
                </tr>
            </thead>
            <tbody id="carTable">
                @foreach($cars as $car)
                <tr>
                    <td>{{ $car->id }}</td>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->brand->name }}</td>
                    <td>{{ $car->category->name }}</td>
                    <td>{{ number_format($car->price, 0, ',', '.') }} $</td>
                    <td>{{ $car->model_year }}</td>
                    <td>{{ $car->color }}</td>
                    <td>
                        <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this car?')">
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
        let rows = document.querySelectorAll("#carTable tr");

        rows.forEach(row => {
            let text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? "" : "none";
        });
    });
</script>

@endsection
