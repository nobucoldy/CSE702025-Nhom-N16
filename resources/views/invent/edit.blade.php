@extends('layouts.app')

@section('content')
<div class="container">

    <form action="{{ route('invent.update', $invent->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="codePro" class="form-label">Sản phẩm</label>
            <select name="codePro" id="codePro" class="form-select @error('codePro') is-invalid @enderror" required>
                <option value="">-- Chọn sản phẩm --</option>
                @foreach ($productsLists as $product)
                    <option value="{{ $product->codePro }}" {{ (old('codePro', $invent->codePro) == $product->codePro) ? 'selected' : '' }}>
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
            <input type="number" min="0" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity', $invent->quantity) }}" required>
            @error('quantity')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="import_date">Ngày nhập</label>
            <input type="date" name="import_date" class="form-control" value="{{ old('import_date') }}">
        </div>


        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $invent->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('invent.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
