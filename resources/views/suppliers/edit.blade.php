@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sửa nhà cung cấp</h1>

    <form action="{{ route('suppliers.update', $supplier->codeSup) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="codeSup" class="form-label">Mã nhà cung cấp</label>
            <input type="text" class="form-control @error('codeSup') is-invalid @enderror" id="codeSup" name="codeSup" value="{{ old('codeSup', $supplier->codeSup) }}" required>
            @error('codeSup')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="supplier" class="form-label">Tên nhà cung cấp</label>
            <input type="text" class="form-control @error('supplier') is-invalid @enderror" id="supplier" name="supplier" value="{{ old('supplier', $supplier->supplier) }}" required>
            @error('supplier')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" required>{{ old('address', $supplier->address) }}</textarea>
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
