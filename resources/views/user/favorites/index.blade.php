@extends('layouts.guest.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Sản phẩm yêu thích</h2>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        @if($favorites->isEmpty())
            <p>Bạn chưa có sản phẩm yêu thích nào.</p>
        @else
            <div class="row">
                @foreach($favorites as $favorite)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="car-item">
                            <div class="car-img position-relative">
                                <span class="car-status status-1">{{ $favorite->car->status }}</span>

                                @if ($favorite->car->images && $favorite->car->images->isNotEmpty())
                                    <img src="{{ asset('storage/' . $favorite->car->images->first()->image_url) }}" 
                                        alt="{{ $favorite->car->name }}">
                                @else
                                    <img src="{{ asset('storage/default-image.jpg') }}" alt="No image available">
                                @endif

                                <!-- Nút Xóa khỏi Yêu thích -->
                                <form method="POST" 
                                    action="{{ route('user.favorites.destroy', $favorite->car->id) }}" 
                                    class="favorite-remove-form">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm remove-favorite-btn">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>

                            <div class="car-content">
                                <h4><a href="#">{{ $favorite->car->name }}</a></h4>
                                <ul class="car-list">
                                    <li><i class="far fa-steering-wheel"></i>{{ $favorite->car->transmission }}</li>
                                    <li><i class="far fa-road"></i>{{ $favorite->car->mileage }}</li>
                                    <li><i class="far fa-car"></i>Model: {{ $favorite->car->model_year }}</li>
                                    <li><i class="far fa-gas-pump"></i>{{ $favorite->car->fuel_type }}</li>
                                </ul>
                                <div class="car-footer">
                                    <span class="car-price">${{ number_format($favorite->car->price) }}</span>
                                    <a href="{{ route('user.shop.show', $favorite->car->id) }}" class="theme-btn">
                                        <span class="far fa-eye"></span>Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $(".remove-favorite-btn").click(function(e) {
            e.preventDefault();
            var button = $(this);
            var form = button.closest("form");
            var card = button.closest(".car-item");

            $.ajax({
                url: form.attr("action"),
                type: "POST",
                data: form.serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    alert(response.message);
                    $(".favorite-count").text(response.count);

                    card.fadeOut(500, function() {
                        $(this).remove();
                    });
                },
                error: function(xhr) {
                    alert("Lỗi! Không thể xóa sản phẩm.");
                }
            });

            return false;
        });
    });
</script>
@endsection

<style>
/* Định dạng ô chứa sản phẩm */
.car-item {
    border: 1px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
    background: #fff;
    transition: all 0.3s ease-in-out;
}

.car-item:hover {
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
}

/* Định dạng hình ảnh sản phẩm */
.car-img {
    position: relative;
    width: 100%;
    height: 200px; /* Đảm bảo kích thước hình ảnh đồng nhất */
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    border-bottom: 1px solid #ddd;
}

.car-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Nút Xóa sản phẩm yêu thích */
.favorite-remove-form {
    position: absolute;
    top: 10px;
    right: 10px;
}

.favorite-remove-form button {
    background-color: rgba(255, 0, 0, 0.8);
    border: none;
    color: white;
    padding: 5px 8px;
    border-radius: 50%;
    font-size: 14px;
    transition: background-color 0.2s;
}

.favorite-remove-form button:hover {
    background-color: rgba(255, 0, 0, 1);
}


</style>
