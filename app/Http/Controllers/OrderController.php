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
        $query = \App\Models\Order::with('product');
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('id', $search)
                    ->orWhere('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%")
                    ->orWhere('whatsapp', 'like', "%$search%")
                    ->orWhereHas('product', function ($p) use ($search) {
                        $p->where('name', 'like', "%$search%")
                            ->orWhere('quota', 'like', "%$search%")
                            ->orWhere('validity', 'like', "%$search%");
                    });
            });
        }
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->input('date'));
        }
        $orders = $query->orderBy('created_at', 'desc')->paginate(20);
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
        $order = Order::with(['product', 'esimStock'])->findOrFail($id);
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

    // Update order status
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,expired,failed,cancelled',
        ]);
        $order->status = $request->status;
        $order->save();
        return redirect()->back()->with('success', 'Order status updated!');
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

    // Export orders as CSV
    public function export(Request $request)
    {
        $orders = \App\Models\Order::with('product')->orderBy('created_at', 'desc')->get();
        $filename = 'orders_export_' . now()->format('Ymd_His') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$filename",
        ];
        $columns = ['ID', 'Customer', 'Email', 'WhatsApp', 'Product', 'Amount', 'Status', 'Delivery', 'Date'];
        $callback = function () use ($orders, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            foreach ($orders as $order) {
                fputcsv($file, [
                    $order->id,
                    $order->name,
                    $order->email,
                    $order->whatsapp,
                    $order->product ? $order->product->name : ($order->product_id ? \App\Models\Product::find($order->product_id)->name : '-'),
                    $order->total ?? $order->price,
                    $order->status,
                    $order->delivery_status,
                    $order->created_at->format('Y-m-d H:i:s'),
                ]);
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }
}
