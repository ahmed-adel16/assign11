
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Commerce</title>
    <style>
        .card {
            transition-duration: .3s;
        }
        .card:hover {
            translate: 3px -3px;
            box-shadow: -5px 5px 10px rgba(0, 0, 0, 0.05)
        }
    </style>
</head>
<body>
    @extends('layouts.app')

    @section('content')
        <div class="container">
            <h2>All Products</h2>
            

            <div class="row">
                @if ($products->count() > 0)
                    @foreach ($products as $product)
                        <div class="col-md-4">
                            <div class="card mb-5">
                                <img src="{{ $product->image_path }}" class="card-img-top" alt="Product Image">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text" style = 'min-height:70px;'>{{ $product->description }}</p>
                                    <p class="card-text"><strong>${{ $product->price }}</strong></p>
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">See More</a>
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