@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-envelope"></i> Danh sách tin nhắn</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th><i class="fas fa-hashtag"></i> ID</th>
                            <th><i class="fas fa-user"></i> Người gửi</th>
                            <th><i class="fas fa-envelope"></i> Email</th>
                            <th><i class="fas fa-comment"></i> Nội dung</th>
                            <th><i class="fas fa-calendar-alt"></i> Ngày gửi</th>
                            <th><i class="fas fa-cogs"></i> Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $message)
                        <tr class="{{ $message->is_read ? 'table-secondary' : '' }}">
                            <td>{{ $message->id }}</td>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ Str::limit($message->message, 50) }}</td>
                            <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.messages.show', $message->id) }}" 
                                    class="btn btn-sm {{ $message->is_read ? 'btn-secondary' : 'btn-primary' }}">
                                    <i class="fas {{ $message->is_read ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                                    {{ $message->is_read ? 'Đã xem' : 'Xem' }}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-3">
                {{ $messages->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection
