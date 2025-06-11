
@extends('layouts.app')

@section('content')
<div class="container py-3">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Danh mục sản phẩm</h2>
        @auth
    @if(Auth::user()->is_admin)
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Thêm sản phẩm
        </a>
    @endif
@endauth

    </div>

    <!-- Alert message -->

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <div class="card mb-3 shadow-sm">
        <div class="card-body py-2">
            <form action="{{ route('products.search') }}" method="GET" class="row g-2 align-items-center">
                <div class="col-md-8 col-12">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent border-end-0">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                        <input type="text" name="keyword" class="form-control border-start-0" 
       placeholder="Tìm theo mã sản phẩm, tên sản phẩm hoặc nhà cung cấp..." 
       value="{{ request('keyword') }}">

                    </div>
                </div>
                <div class="col-md-4 col-12 d-flex gap-2">
                    <button type="submit" class="btn btn-primary flex-grow-1">
                        <i class="fas fa-search me-1"></i> Tìm kiếm
                    </button>
                    @if(request()->has('keyword'))
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-undo"></i>
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <!-- Product table -->
    <div class="card">
        <div class="card-body p-0">
            @if($productsLists->count())
            
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Mã SP</th>
                                <th>Tên sản phẩm</th>
                                <th>Nhà cung cấp</th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productsLists as $productList)
                            <tr>
                                <td>{{ $productList->codePro }}</td>
                                <td>{{ $productList->name }}</td>
                                <td>{{ $productList->supplier->supplier ?? 'N/A' }}</td>
                                <td class="text-center">
                                    @if(Auth::check() && Auth::user()->is_admin)
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('products.edit', $productList->codePro) }}" 
                                            class="btn btn-warning" title="Sửa">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('products.destroy', $productList->codePro) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" title="Xóa" 
                                                        onclick="return confirm('Xác nhận xóa sản phẩm?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <span class="text-muted">Không có quyền</span>
                                    @endif
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="card mb-3">
  
</div>
                </div>
            @else
                <div class="text-center py-4">
                    <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                    <p class="text-muted">Không có sản phẩm nào</p>
                    @auth
                        @if(Auth::user()->is_admin)
                            <a href="{{ route('products.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Thêm sản phẩm đầu tiên
                            </a>
                        @endif
                    @endauth

                </div>
            @endif
        </div>
    </div>
</div>

<!-- Simple CSS improvements -->
<style>
    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
    }
    .btn-group-sm .btn {
        padding: 0.25rem 0.5rem;
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