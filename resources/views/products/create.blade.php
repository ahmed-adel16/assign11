@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add New Product</h2>
        
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Description:</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label>Price:</label>
                <input type="number" name="price" class="form-control" required>
            </div>

            <label for="brand_id">Brand</label>
            <select name="brand_id" required class = 'form-control'>
                <option value="">Select a brand</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>

            <div class="mb-3">
                <label>Image:</label>
                <input type="file" name="image_path" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Add Product</button>
        </form>
    </div>
@endsection
