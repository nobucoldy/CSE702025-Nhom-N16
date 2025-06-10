@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3>👋 Xin chào, {{ Auth::user()->name }}</h3>
    <p class="text-muted">Chào mừng bạn quay lại hệ thống quản lý hàng hóa.</p>

    <div class="row my-4">
        <!-- Card 1 -->
        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                
            </div>
        </div>
        <!-- Tương tự cho kho, nhà cung cấp, báo cáo -->
    </div>

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('invent.report') }}" class="btn btn-success">
                <i class="fas fa-chart-bar me-1"></i> Xem báo cáo tồn kho
            </a>
        </div>
    </div>
</div>
@endsection
