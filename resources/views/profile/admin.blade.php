@extends('layouts.admin.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header text-white text-center" style="background-color: #1a2035;">
                    <h4>Hồ sơ Quản trị viên</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Cột trái: Avatar & Thông tin cá nhân -->
                        <div class="col-md-4 text-center border-end">
                            <img src="{{ asset('storage/avatars/' . Auth::user()->avatar) }}" 
                                class="rounded-circle img-thumbnail border border-secondary" width="150" height="150" alt="Avatar">
                            <h5 class="mt-3">{{ Auth::user()->name }}</h5>
                            <p class="text-muted">Quản trị viên từ {{ Auth::user()->created_at->format('d/m/Y') }}</p>
                            <ul class="list-group list-group-flush text-start">
                                <li class="list-group-item"><strong>Email:</strong> {{ Auth::user()->email }}</li>
                                <li class="list-group-item"><strong>Số điện thoại:</strong> {{ Auth::user()->phone }}</li>
                                <li class="list-group-item"><strong>Ngày sinh:</strong> {{ Auth::user()->date_of_birth }}</li>
                                <li class="list-group-item"><strong>Giới tính:</strong> {{ Auth::user()->gender }}</li>
                                <li class="list-group-item"><strong>Địa chỉ:</strong> {{ Auth::user()->address }}</li>
                            </ul>
                            <form action="{{ route('logout') }}" method="POST" class="mt-3">
                                @csrf
                                <button type="submit" class="btn w-100 text-white" style="background-color: #1a2035;">
                                    Đăng xuất
                                </button>
                            </form>
                        </div>

                        <!-- Cột phải: Tabs Chỉnh sửa -->
                        <div class="col-md-8">
                            <ul class="nav nav-tabs mb-3" id="profileTabs">
                                <li class="nav-item">
                                    <a class="nav-link active" id="edit-tab" data-bs-toggle="tab" href="#edit">Chỉnh sửa</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="security-tab" data-bs-toggle="tab" href="#security">Bảo mật</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="edit">
                                    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label class="form-label">Tên</label>
                                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Số điện thoại</label>
                                            <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Ngày sinh</label>
                                            <input type="date" class="form-control" name="date_of_birth" value="{{ Auth::user()->date_of_birth }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Giới tính</label>
                                            <select name="gender" class="form-control">
                                                <option value="male" @if(Auth::user()->gender == 'male') selected @endif>Nam</option>
                                                <option value="female" @if(Auth::user()->gender == 'female') selected @endif>Nữ</option>
                                                <option value="other" @if(Auth::user()->gender == 'other') selected @endif>Khác</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Địa chỉ</label>
                                            <textarea name="address" class="form-control">{{ Auth::user()->address }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Ảnh đại diện</label>
                                            <input type="file" class="form-control" name="avatar">
                                        </div>
                                        <button type="submit" class="btn w-100 text-white" style="background-color: #1a2035;">
                                            Cập nhật
                                        </button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="security">
                                    <form action="{{ route('password.update') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label class="form-label">Mật khẩu hiện tại</label>
                                            <input type="password" class="form-control" name="current_password" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Mật khẩu mới</label>
                                            <input type="password" class="form-control" name="new_password" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Xác nhận mật khẩu mới</label>
                                            <input type="password" class="form-control" name="new_password_confirmation" required>
                                        </div>
                                        <button type="submit" class="btn w-100 text-white" style="background-color: #1a2035;">
                                            Cập nhật mật khẩu
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
