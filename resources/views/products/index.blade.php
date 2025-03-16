<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Commerce</title>
    <style>
        .prod-img img {
            width: 100%;
            height: 200px; 
            object-fit: cover; 
            border-radius: 5px;
        }
        .card {
            transition: box-shadow, translate .3s ease-in-out;
        }
        .card:hover {
            translate: 3px -3px;
            box-shadow: -5px 5px 10px rgba(0, 0, 0, 0.05);
        }

    </style>
</head>
<body>
    @extends('layouts.app')

    @section('content')
        <div class="container">
            <h2>All Products</h2>
            <!-- Add Product Button -->
            <a href="{{ route('products.create') }}" class="btn btn-success mb-3">Add New Product</a>
            <div class="row">
                @if ($products->count() > 0)
                    @foreach ($products as $product)
                        <div class="col-md-4">
                            <div class="card mb-5">
                                <div class="prod-img">
                                    <img src="{{ asset('storage/' . $product->image_path)}}" 
                                    class="card-img-top" 
                                    alt="Product Image"
                                    onerror="this.src='https://placehold.co/200x100'">
                                </div>
                                    <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text"><strong>Brand:</strong> {{ $product->brand->name ?? 'N/A' }}</p>
                                    <p class="card-text" style="min-height:70px;">{{ $product->description }}</p>
                                    <p class="card-text"><strong>${{ $product->price }}</strong></p>
                                    
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">See More</a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning ms-1">Edit</a>

                                    <!-- Delete Product Button -->
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger ms-1" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No products found.</p>
                @endif
            </div>
        </div>

        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    @endsection
</body>
</html>
