@extends('layouts.app')

@section('content')
<div class="position-absolute top-0 end-0 m-3">
    <a href="{{ route('profile.edit') }}" class="btn btn-warning btn-sm">
        <i class="fas fa-user-edit"></i> 
    </a>
</div>
<div class="container">
    <h2>Chỉnh sửa thông tin</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Tên</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu mới </label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('/') }}" class="btn btn-secondary">
            <i class="fas fa-times"></i> Hủy bỏ
        </a>
    </form>
</div>
@endsection
