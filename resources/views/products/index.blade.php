@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Products</h2>
    

    <div class="row">
        @if ($products->count() > 0)
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card mb-5" style="min-height: 280px;">
                        <img src="{{ $product->image_path }}" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text" style = 'min-height:50px;'>{{ $product->description }}</p>
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
