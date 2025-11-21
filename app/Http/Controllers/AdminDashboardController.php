<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Payment;
use App\Models\ProductStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    // Dashboard statistics
    public function stats()
    {
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $paidOrders = Order::where('status', 'paid')->count();
        $expiredOrders = Order::where('status', 'expired')->count();
        $totalProducts = Product::count();
        $totalRevenue = Payment::where('status', 'paid')->sum('amount');
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
            'revenue_total' => Payment::where('status', 'paid')->sum('amount'),
            'stock_total' => ProductStock::where('status', 'available')->count(),
        ];
        $products = Product::with('country')->get();
        $countries = \App\Models\Country::all();
        // Pass stats, products, countries to view
        return view('admin.admin_panel', compact('stats', 'products', 'countries'));
    }
}
