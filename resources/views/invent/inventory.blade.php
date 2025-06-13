@extends('layouts.app')

@section('content')

<div class="container py-3">
     @if(Auth::user()->is_admin && $users->count())
    <div class="mt-5">
        <h4>
            <i class="fas fa-users text-primary me-2"></i>Danh sách tài khoản người dùng
        </h4>
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Quyền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->is_admin ? 'Admin' : 'User' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@else
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Quản lý kho hàng</h2>
    </div>

    <!-- Alert nếu có -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Table báo cáo -->
    <div class="card shadow-sm">
        <div class="card-body p-0">
            @if($reportData->count())
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th class="text-end">Tổng số lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reportData as $item)
                            <tr>
                                <td>{{ $item->codePro }}</td>
                                <td>{{ $item->productList->name ?? 'N/A' }}</td>
                                <td class="text-end">{{ number_format($item->total_quantity) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-4">
                    <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                    <p class="text-muted">Không có dữ liệu báo cáo</p>
                </div>
            @endif
        </div>
    </div>
    @endif
</div>

<!-- Custom styling -->
<style>
.table-hover tbody tr:hover {
    background-color: #f8f9fa;
}
.table-responsive {
    max-height: 500px;
    overflow-y: auto;
}
.table thead th {
    position: sticky;
    top: 0;
    background-color: #ffffff;
    z-index: 10;
}
.text-end {
    text-align: right;
}
</style>
@endsection
