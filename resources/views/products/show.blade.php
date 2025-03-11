@extends('layouts.app')

@section('content')
<div class="card mx-auto" style="max-width: 500px;">
    <img src="{{ asset($product->image_path) }}" class="card-img-top" alt="Product Image">
    <div class="card-body">
        <h5 class="card-title">{{ $product->name }}</h5>
        <p class="card-text">{{ $product->description }}</p>
        <p class="card-text"><strong>Price: </strong>${{ number_format($product->price, 2) }}</p>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
    </div>
</div>
@endsection
