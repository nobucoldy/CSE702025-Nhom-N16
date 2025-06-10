@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sửa sản phẩm</h1>

    <form action="{{ route('products.update', $productList->codePro) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="codePro" class="form-label">Mã sản phẩm</label>
            <input type="text" class="form-control @error('codePro') is-invalid @enderror" id="codePro" name="codePro" value="{{ old('codePro', $productList->codePro) }}" required>
            @error('codePro')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $productList->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="codeSup" class="form-label">Nhà cung cấp</label>
            <select name="codeSup" id="codeSup" class="form-select @error('codeSup') is-invalid @enderror" required>
                <option value="">-- Chọn nhà cung cấp --</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->codeSup }}" {{ (old('codeSup', $productList->codeSup) == $supplier->codeSup) ? 'selected' : '' }}>
                        {{ $supplier->supplier }} ({{ $supplier->address }})
                    </option>
                @endforeach
            </select>
            @error('codeSup')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
