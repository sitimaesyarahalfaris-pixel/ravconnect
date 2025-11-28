<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        // Admin list/update/delete only
        $this->middleware('auth')->only(['index', 'update', 'destroy', 'quickStatus']);
        $this->middleware(\App\Http\Middleware\AdminAuthMiddleware::class)->only(['index', 'update', 'destroy', 'quickStatus']);
    }
    // List all orders
    public function index(Request $request)
    {
        $query = Order::query();
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }
        if ($request->has('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->has('from') && $request->has('to')) {
            $query->whereBetween('created_at', [$request->from, $request->to]);
        }
        $orders = $query->orderBy('created_at', 'desc')->paginate(20);
        if ($request->wantsJson()) {
            return response()->json($orders);
        }
        return view('admin.orders.index', compact('orders'));
    }

    // Store a new order
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'whatsapp' => 'nullable|string',
            'status' => 'in:pending,paid,expired,failed',
            'delivery_status' => 'in:pending,delivered,manual',
            'expired_at' => 'nullable|date',
        ]);
        $order = Order::create($validated);
        return response()->json($order, 201);
    }

    // Show a single order
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return response()->json($order);
    }

    // Update an order
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $validated = $request->validate([
            'status' => 'in:pending,paid,expired,failed',
            'delivery_status' => 'in:pending,delivered,manual',
            'expired_at' => 'nullable|date',
        ]);
        $order->update($validated);
        return response()->json($order);
    }

    // Delete an order
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Order deleted']);
        }
        return redirect()->route('admin.dashboard')->with('success', 'Order deleted');
    }

    // Quick status update from admin list
    public function quickStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $validated = $request->validate([
            'status' => 'required|in:pending,paid,expired,failed',
        ]);
        $order->update(['status' => $validated['status']]);
        if ($request->wantsJson()) {
            return response()->json($order);
        }
        return redirect()->route('admin.dashboard')->with('success', 'Order status updated');
    }
}
