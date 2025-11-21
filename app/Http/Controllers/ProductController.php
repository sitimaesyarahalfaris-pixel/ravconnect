<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // List all products
    public function index()
    {
        return response()->json(Product::all());
    }

    // Store a new product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quota' => 'nullable|string',
            'validity' => 'nullable|string',
            'operator' => 'nullable|string',
            'auto_delivery' => 'boolean',
            'image' => 'nullable|string',
            'active' => 'boolean',
        ]);
        $product = Product::create($validated);
        return response()->json($product, 201);
    }

    // Show a single product (API JSON and web view)
    public function show($id)
    {
        // If the request expects JSON, return JSON
        if (request()->wantsJson()) {
            $product = Product::with('countries')->findOrFail($id);
            return response()->json($product);
        }
        // Otherwise, return the web view
        return $this->detail($id);
    }

    // Show a single product (web view)
    public function detail($id)
    {
        $product = Product::with('countries')->findOrFail($id);
        return view('products/product_detail', compact('product'));
    }

    // Update a product
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|required|numeric',
            'quota' => 'nullable|string',
            'validity' => 'nullable|string',
            'operator' => 'nullable|string',
            'auto_delivery' => 'boolean',
            'image' => 'nullable|string',
            'active' => 'boolean',
        ]);
        $product->update($validated);
        return response()->json($product);
    }

    // Delete a product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['message' => 'Product deleted']);
    }
}
