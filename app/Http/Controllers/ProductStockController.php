<?php

namespace App\Http\Controllers;

use App\Models\ProductStock;
use Illuminate\Http\Request;

class ProductStockController extends Controller
{
    // List all stocks for a product
    public function index(Request $request)
    {
        $productId = $request->query('product_id');
        $query = ProductStock::query();
        if ($productId) {
            $query->where('product_id', $productId);
        }
        return response()->json($query->get());
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
