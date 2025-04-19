@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid mt-4">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center fw-bold">
                <h4><i class="fas fa-car-side me-2"></i> Car Details Management</h4>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5><i class="fas fa-list-alt me-1"></i> Car Details List</h5>
                    <a href="{{ route('admin.car_details.create') }}"
                        class="btn btn-success btn-sm d-flex align-items-center">
                        <i class="fas fa-plus-circle me-1"></i> Add New Car Detail
                    </a>
                </div>

                <!-- Search Form -->
                <div class="mb-3">
                    <input type="text" id="searchInput" class="form-control" placeholder="🔍 Search car details...">
                </div>

                <!-- Responsive Table -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th style="min-width: 100px;"><i class="fas fa-id-badge me-1"></i> ID</th>
                                <th style="min-width: 150px;"><i class="fas fa-car me-1"></i> Car Name</th>
                                <th style="min-width: 160px;"><i class="fas fa-cogs me-1"></i> Engine</th>
                                <th style="min-width: 200px;"><i class="fas fa-tachometer-alt me-1"></i> Horsepower (HP)
                                </th>
                                <th style="min-width: 200px;"><i class="fas fa-sync-alt me-1"></i> Torque</th>
                                <th style="min-width: 250px;"><i class="fas fa-gas-pump me-1"></i> Fuel Capacity</th>
                                <th style="min-width: 200px;"><i class="fas fa-ruler-combined me-1"></i> Dimensions</th>
                                <th style="min-width: 170px;"><i class="fas fa-weight-hanging me-1"></i> Weight</th>
                                <th style="min-width: 160px;"><i class="fas fa-shield-alt me-1"></i> Warranty</th>
                                <th style="min-width: 200px;"><i class="fas fa-list me-1"></i> Features</th>
                                <th style="min-width: 200px;"><i class="fas fa-cogs me-1"></i> Actions</th>
                            </tr>
                        </thead>
                        <tbody id="carDetailsTable">
                            @foreach($carDetails as $detail)
                                <tr>
                                    <td>{{ $detail->id }}</td>
                                    <td>{{ $detail->car->name ?? 'No data available' }}</td>
                                    <td>{{ $detail->engine }}</td>
                                    <td>{{ $detail->horsepower }} HP</td>
                                    <td>{{ $detail->torque }}</td>
                                    <td>{{ $detail->fuel_capacity }} L</td>
                                    <td>{{ $detail->dimensions }}</td>
                                    <td>{{ $detail->weight }} kg</td>
                                    <td>{{ $detail->warranty }}</td>
                                    <td>{{ $detail->features }}</td>
                                    <td>
                                        <a href="{{ route('admin.car_details.edit', $detail->id) }}"
                                            class="btn btn-warning btn-sm me-1">
                                            <i class="fas fa-edit me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.car_details.destroy', $detail->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Are you sure you want to delete?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt me-1"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{ $carDetails->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    @push('scripts')
        <script>
            // Tự động ẩn thông báo thành công sau 5 giây
            setTimeout(function () {
                let alertBox = document.getElementById('success-alert');
                if (alertBox) {
                    alertBox.style.transition = "opacity 0.5s ease";
                    alertBox.style.opacity = "0";
                    setTimeout(() => alertBox.remove(), 500);
                }
            }, 5000);

            // Chức năng tìm kiếm cho bảng chi tiết xe
            document.getElementById("searchInput").addEventListener("keyup", function () {
                let filter = this.value.toLowerCase();
                let rows = document.querySelectorAll("#carDetailsTable tr");

                rows.forEach(row => {
                    let text = row.textContent.toLowerCase();
                    row.style.display = text.includes(filter) ? "" : "none";
                });
            });
        </script>
    @endpush
@endsection