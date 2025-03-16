@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Product</h2>

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Name:</label>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Description:</label>
                <textarea name="description" class="form-control" required>{{ $product->description }}</textarea>
            </div>

            <div class="mb-3">
                <label>Price:</label>
                <input type="number" name="price" value="{{ $product->price }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="brand_id">Brand</label>
                <select name="brand_id" class = 'form-control' required>
                    <option value="">Select a brand</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Image:</label>
                <input type="file" name="image_path" class="form-control">
            </div>

            <button type="submit" class="btn btn-warning">Update Product</button>
        </form>
    </div>
@endsection
