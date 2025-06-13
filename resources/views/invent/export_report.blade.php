@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Báo cáo xuất kho</h2>

    <form method="GET" action="{{ route('invent.exportReport') }}" class="mb-3">
        <div class="row g-2 align-items-center">
            <div class="col-auto">
                <select name="filter" class="form-select" onchange="this.form.submit()">
                    <option value="all" {{ $filter == 'all' ? 'selected' : '' }}>Tất cả</option>
                    <option value="7days" {{ $filter == '7days' ? 'selected' : '' }}>7 ngày qua</option>
                    <option value="1month" {{ $filter == '1month' ? 'selected' : '' }}>1 tháng qua</option>
                    <option value="3months" {{ $filter == '3months' ? 'selected' : '' }}>3 tháng qua</option>
                    <option value="1year" {{ $filter == '1year' ? 'selected' : '' }}>1 năm qua</option>
                </select>
            </div>
        </div>
    </form>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng đã xuất</th>
                <th>Ngày xuất</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reportData as $item)
                <tr>
                    <td>{{ $item->codePro }}</td>
                    <td>{{ $item->productList->name ?? 'Không rõ' }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->export_date)->format('d/m/Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Không có dữ liệu xuất kho.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
