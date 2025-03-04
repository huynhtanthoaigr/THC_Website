@extends('layouts.admin.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center fw-bold">
                <h4>Thêm Hình Ảnh Xe</h4>
            </div>
            <div class="card-body">
                <form id="uploadForm" action="{{ route('admin.car_images.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <!-- Chọn xe -->
                    <div class="mb-3">
                        <label for="car_id" class="form-label fw-semibold">Chọn xe:</label>
                        <select name="car_id" id="car_id" class="form-select" required>
                            <option value="" disabled selected>-- Chọn xe --</option>
                            @forelse($cars as $car)
                                <option value="{{ $car->id }}">{{ $car->name }}</option>
                            @empty
                                <option value="" disabled>Không còn xe để thêm ảnh</option>
                            @endforelse
                        </select>

                    </div>

                    <!-- Hiển thị 5 ô ảnh và 5 nút chọn ảnh -->
                    <div class="row text-center mb-4">
                        @for ($i = 0; $i < 5; $i++)
                            <div class="col-md-2 col-6 mb-3">
                                <div class="image-preview border p-2 rounded shadow-sm" id="preview-{{ $i }}">
                                    <img src="https://via.placeholder.com/100" alt="Ảnh {{ $i + 1 }}" id="img-{{ $i }}"
                                        class="img-thumbnail">
                                </div>
                                <input type="file" name="images[]" id="image-{{ $i }}" class="d-none" accept="image/*"
                                    onchange="previewImage(event, {{ $i }})">
                                <button type="button" class="btn btn-outline-primary btn-sm mt-2 w-100"
                                    onclick="document.getElementById('image-{{ $i }}').click();">
                                    <i class="bi bi-image"></i> Chọn Ảnh {{ $i + 1 }}
                                </button>
                            </div>
                        @endfor
                    </div>

                    <!-- Cảnh báo nếu chưa chọn đủ 5 ảnh -->
                    <div id="warningMessage" class="alert alert-warning text-center d-none">
                        Vui lòng chọn đủ <strong>5 ảnh</strong> trước khi tải lên.
                    </div>

                    <!-- Nút tải ảnh lên -->
                    <div class="text-center">
                        <button type="submit" id="uploadBtn" class="btn btn-success px-4" disabled>
                            <i class="bi bi-upload"></i> Thêm Ảnh
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event, index) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('img-' + index).src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
            checkImages();
        }

        function checkImages() {
            let count = 0;
            for (let i = 0; i < 5; i++) {
                if (document.getElementById('image-' + i).files.length > 0) {
                    count++;
                }
            }
            let warningMessage = document.getElementById('warningMessage');
            let uploadBtn = document.getElementById('uploadBtn');

            if (count === 5) {
                uploadBtn.disabled = false;
                warningMessage.classList.add('d-none');
            } else {
                uploadBtn.disabled = true;
                warningMessage.classList.remove('d-none');
            }
        }
    </script>

@endsection