@extends('layouts.app')

@section('content')
<style>

    Nền tổng thể */
html,
body {
    height: 100%;
    margin: 0;
    padding: 0;
}

body {
    background: url('hethongkhohang.jpg') no-repeat center center;
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
} 
.dashboard-container {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(6px);
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}

.dashboard-container:hover {
    transform: scale(1.01);
}

.stat-card {
    border-radius: 12px;
    padding: 20px;
    color: white;
    text-align: center;
    height: 100%;
    transition: transform 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
}

.low-stock-card {
    border-radius: 12px;
    overflow: hidden;
}

.marquee-box {
    overflow: hidden;
    white-space: nowrap;
    margin-bottom: 25px;
    background-color: rgba(255, 255, 255, 0.85);
    border-radius: 8px;
    padding: 10px 0;
}

.marquee-text {
    display: inline-block;
    padding-left: 100%;
    animation: scroll-left 12s linear infinite;
    font-weight: bold;
    font-size: 1.1rem;
    color: #333;
}

@keyframes scroll-left {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-100%);
    }
}
</style>

<div class="container d-flex flex-column align-items-center justify-content-center" style="min-height: 90vh;">
    <div class="marquee-box w-100">
        <div class="marquee-text">
            🚚 Chào mừng bạn quay lại hệ thống quản lý hàng hóa!
        </div>
    </div>

    <div class="dashboard-container w-100">
        <h3 class="text-center mb-4">👋 Xin chào, {{ Auth::user()->name }}</h3>

        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <a href="{{ route('invent.report') }}" class="text-decoration-none">
                    <div class="stat-card bg-success">
                        <h6>Tổng SP tồn kho</h6>
                        <p class="display-6">{{ $uniqueProductCount }}</p>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('invent.import') }}" class="text-decoration-none">
                    <div class="stat-card bg-info">
                        <h6>Lượt nhập hôm nay</h6>
                        <p class="display-6">{{ $todayImports }}</p>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('invent.export') }}" class="text-decoration-none">
                    <div class="stat-card bg-danger">
                        <h6>Lượt xuất hôm nay</h6>
                        <p class="display-6">{{ $todayExports }}</p>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('invent.exportReport') }}" class="text-decoration-none">
                    <div class="stat-card bg-primary">
                        <h6>Xem báo cáo kho</h6>
                        <p class="display-6"><i class="fas fa-chart-bar"></i></p>
                    </div>
                </a>
            </div>
        </div>

        <div class="low-stock-card card">
            <div class="card-header bg-warning text-dark fw-bold">
                ⚠️ Sản phẩm sắp hết hàng
            </div>
            <div class="card-body p-0">
                @if($lowStockProducts->isEmpty())
                    <p class="p-3 mb-0 text-muted">Không có sản phẩm nào sắp hết hàng.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Mã SP</th>
                                    <th>Số lượng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lowStockProducts as $product)
                                    <tr>
                                        <td>{{ $product->codePro }}</td>
                                        <td>{{ $product->quantity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection