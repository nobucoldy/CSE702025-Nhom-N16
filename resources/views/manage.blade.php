@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Quản lý người dùng</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Quyền</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->is_admin ? 'Admin' : 'User' }}</td>
                <td>
                    @if(Auth::id() !== $user->id) {{-- Không cho tự xóa chính mình --}}
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa người dùng này?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Xóa</button>
                        </form>
                    @else
                        <em>(bạn)</em>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
