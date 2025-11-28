<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        // Protect admin actions with auth + explicit admin middleware class
        $this->middleware('auth')->only(['store', 'update', 'destroy', 'quickUpdate']);
        $this->middleware(\App\Http\Middleware\AdminAuthMiddleware::class)->only(['store', 'update', 'destroy', 'quickUpdate']);
    }
    // List all products
    public function index()
    {
        $products = Product::with('countries')->get();
        foreach ($products as $p) {
            $p->country = $p->countries->first() ?? null;
            $p->stock = \App\Models\ProductStock::where('product_id', $p->id)->where('status', 'available')->count();
        }
        $countries = \App\Models\Country::all();
        if (request()->wantsJson()) {
            return response()->json($products);
        }
        return view('admin.products.index', compact('products', 'countries'));
    }

    // Store a new product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'country_id' => 'nullable|integer|exists:countries,id',
            'stock' => 'nullable|integer|min:0',
            'quota' => 'nullable|string',
            'validity' => 'nullable|string',
            'operator' => 'nullable|string',
            'auto_delivery' => 'boolean',
            'image' => 'nullable|string',
            'active' => 'boolean',
        ]);
        $product = Product::create($validated);
        // Attach country if provided
        if (!empty($validated['country_id'])) {
            $product->countries()->attach($validated['country_id']);
        }
        // Create product stock entries if requested (simple auto-generated entries)
        if (!empty($validated['stock']) && $validated['stock'] > 0) {
            for ($i = 0; $i < $validated['stock']; $i++) {
                \App\Models\ProductStock::create([
                    'product_id' => $product->id,
                    'content' => 'AUTO-' . uniqid(),
                    'type' => 'digital',
                    'status' => 'available',
                ]);
            }
        }
        if ($request->wantsJson()) {
            return response()->json($product, 201);
        }
        return redirect()->route('admin.dashboard')->with('success', 'Product created');
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
            'country_id' => 'nullable|integer|exists:countries,id',
            'stock' => 'nullable|integer|min:0',
            'quota' => 'nullable|string',
            'validity' => 'nullable|string',
            'operator' => 'nullable|string',
            'auto_delivery' => 'boolean',
            'image' => 'nullable|string',
            'active' => 'boolean',
        ]);
        $product->update($validated);
        // Sync country if provided
        if (array_key_exists('country_id', $validated) && $validated['country_id']) {
            $product->countries()->sync([$validated['country_id']]);
        }
        // If stock provided and greater than current available, add more
        if (isset($validated['stock'])) {
            $current = \App\Models\ProductStock::where('product_id', $product->id)->where('status', 'available')->count();
            if ($validated['stock'] > $current) {
                $toAdd = $validated['stock'] - $current;
                for ($i = 0; $i < $toAdd; $i++) {
                    \App\Models\ProductStock::create([
                        'product_id' => $product->id,
                        'content' => 'AUTO-' . uniqid(),
                        'type' => 'digital',
                        'status' => 'available',
                    ]);
                }
            }
        }
        if ($request->wantsJson()) {
            return response()->json($product);
        }
        return redirect()->route('admin.dashboard')->with('success', 'Product updated');
    }

    // Delete a product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Product deleted']);
        }
        return redirect()->route('admin.dashboard')->with('success', 'Product deleted');
    }

    // Quick update via admin (single-field updates)
    public function quickUpdate(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $allowed = ['price', 'name', 'active'];
        $update = [];
        foreach ($allowed as $key) {
            if ($request->has($key)) {
                $update[$key] = $request->input($key);
            }
        }
        if (!empty($update)) {
            $product->update($update);
        }
        if ($request->wantsJson()) {
            return response()->json($product);
        }
        return redirect()->route('admin.dashboard')->with('success', 'Product updated');
    }
}
