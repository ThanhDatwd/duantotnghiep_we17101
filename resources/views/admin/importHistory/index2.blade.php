@extends('admin.appLayout.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm mới đơn nhập hàng</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('purchases.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="purchase_date" class="col-md-4 col-form-label text-md-right">Ngày nhập hàng</label>
                        <div class="col-md-6">
                            <input id="purchase_date" type="date" class="form-control @error('purchase_date') is-invalid @enderror" name="purchase_date" value="{{ old('purchase_date') }}" required autofocus>
                            @error('purchase_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="product_id" class="col-md-4 col-form-label text-md-right">Sản phẩm</label>
                        <div class="col-md-6">
                            <select id="product_id" name="product_id" class="form-control @error('product_id') is-invalid @enderror" required>
                                <option value="">Chọn sản phẩm</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                                @endforeach
                            </select>
                            @error('product_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="quantity" class="col-md-4 col-form-label text-md-right">Số lượng</label>
                        <div class="col-md-6">
                            <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required>
                            @error('quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cost" class="col-md-4 col-form-label text-md-right">Giá nhập</label>
                        <div class="col-md-6">
                            <input id="cost" type="number" step="0.01" min="0" class="form-control @error('cost') is-invalid @enderror" name="cost" value="{{ old('cost') }}" required>
                            @error('cost')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
