@extends('layouts.app')

@section('content')
<div class="container py-3">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>
            <i class=""></i>Nhập kho
        </h2>
        <a href="{{ route('invent.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Thêm hàng hóa
        </a>
    </div>

    <!-- Alert message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Search box - Phiên bản cải tiến -->
    <div class="card mb-3 shadow-sm">
        <div class="card-body py-2">
            <form action="{{ route('inventory.search') }}" method="GET" class="row g-2 align-items-center">
                <div class="col-md-8 col-12">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent border-end-0">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                        <input type="text" name="keyword" class="form-control border-start-0" 
       placeholder="Tìm theo mã sản phẩm, tên sản phẩm hoặc mô tả..." 
       value="{{ request('keyword') }}">

                    </div>
                </div>
                <div class="col-md-4 col-12 d-flex gap-2">
                    <button type="submit" class="btn btn-primary flex-grow-1">
                        <i class="fas fa-search me-1"></i> Tìm kiếm
                    </button>
                    @if(request()->has('keyword'))
                        <a href="{{ route('invent.import') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-undo"></i>
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <!-- Inventory table -->
    <div class="card shadow-sm">
        <div class="card-body p-0">
            @if($invent->count())
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Ngày nhập</th>
                                <th>Mô tả</th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invent as $item)
                            <tr>
                                <td>{{ $item->codePro }}</td>
                                <td>{{ $item->productList->name ?? 'N/A' }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->import_date}}</td>
                                <td>{{ Str::limit($item->description, 50) }}</td>
                                <td class="text-center" >
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('invent.edit', $item->id) }}" 
                                           class="btn btn-warning" title="Sửa">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('invent.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" title="Xóa" 
                                                    onclick="return confirm('Xác nhận xóa hàng hóa này?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-4">
                    <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                    <p class="text-muted">Không có hàng hóa tồn kho</p>
                    <a href="{{ route('invent.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Thêm hàng hóa 
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
    }
    .btn-group-sm .btn {
        padding: 0.25rem 0.5rem;
    }
    .table td {
        vertical-align: middle;
    }
    /* Tối ưu thanh tìm kiếm */
    .input-group-text {
        transition: all 0.3s ease;
    }
    .input-group:focus-within .input-group-text {
        color: #0d6efd;
    }
    .form-control:focus {
        box-shadow: none;
        border-color: #dee2e6;
    }
    .table-responsive {
    max-height: 500px; /* hoặc chiều cao mong muốn */
    overflow-y: auto;
}

.table thead th {
    position: sticky;
    top: 0;
    background-color: #ffffff; /* hoặc màu nền của bảng */
    z-index: 10;
}

</style>
@endsection