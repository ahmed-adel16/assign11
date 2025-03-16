<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Brand;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('brand')->paginate(12);
        return view('products.index', compact('products'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
    
        $products = Product::with('brand')
            ->where('name', 'LIKE', "%$query%")
            ->paginate(10);
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with('brand')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function create()
    {
        $brands = Brand::all(); 
        return view('products.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:4056',
            'brand_id' => 'required|exists:brands,id',
        ]);
    
        $imagePath = $request->file('image_path')->store('products', 'public');
    
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image_path' => $imagePath,
            'brand_id' => $request->brand_id, 
        ]);
    
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $brands = Brand::all(); 
        return view('products.edit', compact('product', 'brands'));
    }
    

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'brand_id' => 'required|exists:brands,id',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4056',
        ]);
    
        // Update product fields
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->brand_id = $request->brand_id;
    
        // Handle Image Upload
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('products', 'public');
            $product->image_path = $imagePath;
        }
    
        $product->save();
    
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }
    

    // Delete product
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
