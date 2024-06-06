@extends('layouts.admin')

@section('content')
    <h1>Edit Product</h1>
    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="nameProduct" name="nameProduct" class="form-control" value="{{ $product->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control">{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" class="form-control" value="{{ $product->price }}"
                step="0.01" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" class="form-control" value="{{ $product->quantity }}"
                required>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" class="form-control-file">
            <img src="{{ asset('storage/' . $product->image) }}" width="100" class="mt-2">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
