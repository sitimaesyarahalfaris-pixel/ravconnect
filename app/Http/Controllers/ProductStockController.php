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

    // List all stocks for a product (for admin modal)
    public function list($productId)
    {
        $stocks = \App\Models\ProductStock::where('product_id', $productId)->orderBy('created_at', 'desc')->get();
        return response()->json($stocks);
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

    // Store new stock (for admin modal)
    public function storeForProduct(Request $request, $productId)
    {
        $validated = $request->validate([
            'iccid' => 'required|string',
            'activation_code' => 'required|string',
            'smdp_plus' => 'required|string',
            'qr_image_url' => 'nullable|string',
            'qr_image_file' => 'nullable|file|image|max:2048',
        ]);
        $validated['product_id'] = $productId;
        $validated['status'] = 'available';
        // Fill content and type for compatibility
        $validated['content'] = $validated['iccid'];
        $validated['type'] = 'esim';

        // Handle file upload
        if ($request->hasFile('qr_image_file')) {
            $path = $request->file('qr_image_file')->store('qr_images', 'public');
            $validated['qr_image_url'] = '/storage/' . $path;
        }

        $stock = \App\Models\ProductStock::create($validated);
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

    // Update stock for a product (for admin modal)
    public function updateForProduct(Request $request, $productId, $stockId)
    {
        $stock = \App\Models\ProductStock::where('product_id', $productId)->where('id', $stockId)->firstOrFail();
        $validated = $request->validate([
            'iccid' => 'sometimes|required|string',
            'activation_code' => 'sometimes|required|string',
            'smdp_plus' => 'sometimes|required|string',
            'qr_image_url' => 'nullable|string',
            'qr_image_file' => 'nullable|file|image|max:2048',
            'status' => 'in:available,used',
        ]);
        // Handle file upload
        if ($request->hasFile('qr_image_file')) {
            $path = $request->file('qr_image_file')->store('qr_images', 'public');
            $validated['qr_image_url'] = '/storage/' . $path;
        }
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

    // Delete stock (for admin modal)
    public function destroyForProduct($productId, $stockId)
    {
        $stock = \App\Models\ProductStock::where('product_id', $productId)->where('id', $stockId)->firstOrFail();
        $stock->delete();
        return response()->json(['message' => 'Stock deleted']);
    }
}
