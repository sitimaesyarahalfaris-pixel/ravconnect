<?php

namespace App\Http\Controllers;

use App\Models\ProductStock;
use Illuminate\Http\Request;

class ProductStockController extends Controller
{
    public function __construct()
    {
        // Only admin may manipulate stocks
        $this->middleware('auth')->only(['store', 'update', 'destroy']);
        $this->middleware(\App\Http\Middleware\AdminAuthMiddleware::class)->only(['store', 'update', 'destroy']);
    }
    // List all stocks for a product
    public function index(Request $request)
    {
        $productId = $request->query('product_id');
        $query = ProductStock::query();
        if ($productId) {
            $query->where('product_id', $productId);
        }
        $stocks = $query->orderBy('created_at', 'desc')->paginate(50);
        if ($request->wantsJson()) {
            return response()->json($stocks);
        }
        return view('admin.product_stocks.index', compact('stocks'));
    }

    // Store new stock
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'content' => 'required|string',
            'type' => 'nullable|string',
            'status' => 'in:available,used',
        ]);
        $stock = ProductStock::create($validated);
        return response()->json($stock, 201);
    }

    // Show a single stock
    public function show($id)
    {
        $stock = ProductStock::findOrFail($id);
        return response()->json($stock);
    }

    // Update stock
    public function update(Request $request, $id)
    {
        $stock = ProductStock::findOrFail($id);
        $validated = $request->validate([
            'content' => 'sometimes|required|string',
            'type' => 'nullable|string',
            'status' => 'in:available,used',
        ]);
        $stock->update($validated);
        return response()->json($stock);
    }

    // Delete stock
    public function destroy($id)
    {
        $stock = ProductStock::findOrFail($id);
        $stock->delete();
        return response()->json(['message' => 'Stock deleted']);
    }
}
