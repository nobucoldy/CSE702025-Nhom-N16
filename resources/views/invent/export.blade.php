@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Xuất kho</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('invent.export') }}">
        @csrf

        <div class="mb-3">
            <label for="codePro" class="form-label">Sản phẩm</label>
            <select name="codePro" id="codePro" class="form-select" required>
                <option value="">-- Chọn sản phẩm --</option>
                @foreach($products as $product)
                    <option value="{{ $product->codePro }}">
                        {{ $product->productList->name ?? 'Không xác định' }} (Tồn kho: {{ $product->quantity }})
                    </option>
                @endforeach
            </select>
            @error('codePro') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Số lượng xuất</label>
            <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
            @error('quantity') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="export_date" class="form-label">Ngày xuất</label>
            <input type="date" name="export_date" id="export_date" class="form-control" value="{{ date('Y-m-d') }}" required>

            @error('export_date') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="receiver" class="form-label">Người nhận (tuỳ chọn)</label>
            <input type="text" name="receiver" id="receiver" class="form-control">
        </div>

        <div class="mb-3">
            <label for="note" class="form-label">Ghi chú (tuỳ chọn)</label>
            <textarea name="note" id="note" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Xuất kho</button>
    </form>
</div>
@endsection
