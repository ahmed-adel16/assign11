<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10); 
        return view('products.index', compact('products'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'LIKE', "%$query%")
            ->paginate(10); 
        return view('products.index', compact('products'));
    }
    
    public function show($id)
    {
    $product = Product::findOrFail($id);
    return view('products.show', compact('product'));
    }

}

