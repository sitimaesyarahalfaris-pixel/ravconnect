<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Payment;
use App\Models\ProductStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $user = Auth::user();
            if (!$user || !$user->is_admin) {
                abort(403, 'Unauthorized');
            }
            return $next($request);
        });
    }

    // Dashboard statistics
    public function stats()
    {
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $paidOrders = Order::where('status', 'paid')->count();
        $expiredOrders = Order::where('status', 'expired')->count();
        $totalProducts = Product::count();
        $totalRevenue = Order::where('status', 'paid')->sum('total');
        $remainingStock = ProductStock::where('status', 'available')->count();

        return response()->json([
            'total_orders' => $totalOrders,
            'pending_orders' => $pendingOrders,
            'paid_orders' => $paidOrders,
            'expired_orders' => $expiredOrders,
            'total_products' => $totalProducts,
            'total_revenue' => $totalRevenue,
            'remaining_stock' => $remainingStock,
        ]);
    }

    // Admin dashboard main view
    public function index()
    {
        // Gather stats for dashboard cards
        $stats = [
            'orders_total' => Order::count(),
            'orders_pending' => Order::where('status', 'pending')->count(),
            'orders_paid' => Order::where('status', 'paid')->count(),
            'orders_expired' => Order::where('status', 'expired')->count(),
            'products_total' => Product::count(),
            'revenue_total' => Order::where('status', 'paid')->sum('total'),
            'stock_total' => ProductStock::where('status', 'available')->count(),
        ];
        // Load products with their countries and compute available stock per product
        $products = Product::with('countries')->get();
        foreach ($products as $p) {
            $p->country = $p->countries->first() ?? null;
            $p->stock = \App\Models\ProductStock::where('product_id', $p->id)->where('status', 'available')->count();
        }
        $countries = \App\Models\Country::all();

        // Ensure only admins can access (extra safety)
        if (!auth()->check() || !auth()->user()->is_admin) {
            return redirect()->route('admin.login');
        }

        return view('admin.admin_panel', compact('stats', 'products', 'countries'));
    }

    // Simple admin dashboard view (minimal, uses auth middleware and checks is_admin)
    public function simpleIndex()
    {
        // require authentication and admin status is checked in the route/login redirect
        $stats = [
            'orders_total' => Order::count(),
            'orders_pending' => Order::where('status', 'pending')->count(),
            'orders_paid' => Order::where('status', 'paid')->count(),
            'products_total' => Product::count(),
        ];
        $products = Product::limit(20)->get();
        return view('admin.simple_dashboard', compact('stats', 'products'));
    }

    // Export simple JSON list or CSV (basic implementation)
    public function export(Request $request, $entity)
    {
        $allowed = ['products', 'orders', 'payments', 'users'];
        if (!in_array($entity, $allowed)) {
            return response()->json(['error' => 'Invalid export entity'], 400);
        }
        switch ($entity) {
            case 'products':
                $data = Product::all();
                break;
            case 'orders':
                $data = Order::all();
                break;
            case 'payments':
                $data = Payment::all();
                break;
            case 'users':
                $data = \App\Models\User::all();
                break;
        }
        if ($request->wantsJson()) {
            return response()->json($data);
        }
        // Simple CSV download for web requests
        $csv = '';
        $first = true;
        foreach ($data as $row) {
            $arr = (array)$row->toArray();
            if ($first) {
                $csv .= implode(',', array_keys($arr)) . "\n";
                $first = false;
            }
            $csv .= implode(',', array_map(function ($v) {
                return '"' . str_replace('"', '""', (string)$v) . '"';
            }, array_values($arr))) . "\n";
        }
        $filename = $entity . "-export-" . date('Ymd') . ".csv";
        return response($csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ]);
    }

    // Bulk action handler (basic)
    public function bulkAction(Request $request, $entity)
    {
        $ids = $request->input('ids', []);
        $action = $request->input('action');
        if (empty($ids) || empty($action)) {
            return redirect()->route('admin.dashboard')->with('error', 'No ids or action provided');
        }
        switch ($entity) {
            case 'products':
                if ($action === 'delete') {
                    \App\Models\Product::whereIn('id', $ids)->delete();
                }
                break;
            case 'orders':
                if (in_array($action, ['pending', 'paid', 'expired', 'failed'])) {
                    \App\Models\Order::whereIn('id', $ids)->update(['status' => $action]);
                }
                break;
            case 'payments':
                if ($action === 'confirm') {
                    \App\Models\Payment::whereIn('id', $ids)->update(['status' => 'paid']);
                }
                break;
        }
        return redirect()->route('admin.dashboard')->with('success', 'Bulk action completed');
    }
}
