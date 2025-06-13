@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Thêm hàng hóa vào kho</h1>

    <form action="{{ route('invent.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="codePro" class="form-label">Sản phẩm</label>
            <select name="codePro" id="codePro" class="form-select @error('codePro') is-invalid @enderror" required>
                <option value="">-- Chọn sản phẩm --</option>
                @foreach ($productsLists as $product)
                    <option value="{{ $product->codePro }}" {{ old('codePro') == $product->codePro ? 'selected' : '' }}>
                        {{ $product->name }} ({{ $product->codePro }})
                    </option>
                @endforeach
            </select>
            @error('codePro')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Số lượng</label>
            <input type="number" min="0" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity') }}" required>
            @error('quantity')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="import_date">Ngày nhập:</label>
            <input type="date" name="import_date" id="import_date" class="form-control"
                value="{{ old('import_date', \Carbon\Carbon::now()->format('Y-m-d')) }}" required>
            @error('import_date')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>



        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Thêm</button>
        <a href="{{ route('invent.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
