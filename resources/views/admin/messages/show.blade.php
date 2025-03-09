@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-envelope-open-text"></i> Chi tiết tin nhắn</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <h5><i class="fas fa-user"></i> {{ $message->name }}</h5>
                <h6 class="text-muted"><i class="fas fa-envelope"></i> {{ $message->email }}</h6>
            </div>
            <div class="p-3 bg-light rounded border">
                <p class="mb-0"><i class="fas fa-comment-dots"></i> {{ $message->message }}</p>
            </div>
            <p class="text-muted mt-3"><i class="fas fa-calendar-alt"></i> Gửi lúc: {{ $message->created_at->format('d/m/Y H:i') }}</p>
            
            <div class="d-flex">
                <a href="{{ route('admin.messages') }}" class="btn btn-secondary me-2">
                    <i class="fas fa-arrow-left"></i> Quay lại
                </a>
                
                <!-- Form xóa tin nhắn -->
                <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" id="delete-message-form">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger" onclick="confirmDelete()">
                        <i class="fas fa-trash-alt"></i> Xóa tin nhắn
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete() {
        if (confirm('Bạn có chắc chắn muốn xóa tin nhắn này?')) {
            document.getElementById('delete-message-form').submit();
        }
    }
</script>
@endsection
