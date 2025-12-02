<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    // Add product to cart (AJAX compatible)
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session('cart', []);

        // Check if ?checkout=1 is present (Buy Now flow)
        $isCheckoutFlow = $request->query('checkout') == 1;

        // Check if product already in cart
        if (isset($cart[$id])) {
            // If it's Buy Now flow and product already in cart, just proceed to checkout
            if ($isCheckoutFlow) {
                return redirect()->route('checkout');
            }

            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Produk sudah ada di keranjang!'
                ]);
            }
            return redirect()->back()->with('info', 'Produk sudah ada di keranjang!');
        }

        // Add product to cart
        $cart[$id] = [
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'quota' => $product->quota,
            'validity' => $product->validity,
            'operator' => $product->operator,
        ];

        session(['cart' => $cart]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'cart_count' => count($cart),
                'message' => 'Produk berhasil ditambahkan ke keranjang!'
            ]);
        }

        // If Buy Now flow, redirect to checkout immediately
        if ($isCheckoutFlow) {
            return redirect()->route('checkout');
        }

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // Remove product from cart (AJAX compatible)
    public function remove(Request $request, $id)
    {
        $cart = session('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session(['cart' => $cart]);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'cart_count' => count($cart),
                    'message' => 'Produk dihapus dari keranjang!'
                ]);
            }

            return redirect()->back()->with('success', 'Produk dihapus dari keranjang!');
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan di keranjang!'
            ]);
        }

        return redirect()->back()->with('error', 'Produk tidak ditemukan di keranjang!');
    }

    // Show cart page
    public function index()
    {
        $cart = session('cart', []);
        $total = array_sum(array_column($cart, 'price'));

        return view('order.cart', compact('cart', 'total'));
    }

    // Checkout page
    public function checkout()
    {
        $cart = session('cart', []);

        if (count($cart) === 0) {
            return redirect()->route('cart')->with('error', 'Keranjang kosong.');
        }

        $total = array_sum(array_column($cart, 'price'));

        // Ambil metode pembayaran dari AtlanticPedia
        $methods = app(\App\Services\AtlanticPediaApi::class)->getDepositMethods();
        $paymentMethods = $methods['data'] ?? [];

        return view('order.checkout', compact('cart', 'total', 'paymentMethods'));
    }

    // Process checkout
    public function processCheckout(Request $request)
    {
        // If direct_checkout is set, override cart with single product and auto-select payment method
        if ($request->has('direct_checkout') && $request->has('product_id')) {
            $product = \App\Models\Product::findOrFail($request->product_id);
            $cart = [
                [
                    'id' => $product->id,
                    'name' => $product->name,
                    'description' => $product->description,
                    'price' => $product->price,
                    'quota' => $product->quota,
                    'validity' => $product->validity,
                    'operator' => $product->operator,
                ]
            ];
            session(['cart' => $cart]);
            // Ambil metode pembayaran dari AtlanticPedia
            $methods = app(\App\Services\AtlanticPediaApi::class)->getDepositMethods();
            $paymentMethods = $methods['data'] ?? [];
            // Pilih metode pembayaran default (misal: pertama di list)
            $selected = $paymentMethods[0] ?? null;
            if (!$selected) {
                return redirect()->back()->with('error', 'Metode pembayaran tidak tersedia.');
            }
            $request->merge(['payment_method' => $selected['metode']]);
        } else {
            $cart = session('cart', []);
        }

        if (count($cart) === 0) {
            return redirect()->route('cart')->with('error', 'Keranjang kosong.');
        }

        $validated = $request->validate([
            'payment_method' => 'required',
        ]);

        // Ambil data metode pembayaran dari AtlanticPedia (agar dapat type dan info lain)
        $methods = app(\App\Services\AtlanticPediaApi::class)->getDepositMethods();
        $paymentMethods = $methods['data'] ?? [];
        $selected = collect($paymentMethods)->firstWhere('metode', $request->payment_method);
        if (!$selected) {
            return redirect()->back()->with('error', 'Metode pembayaran tidak valid.');
        }

        // Generate reff_id unik
        $reffId = 'order-' . now()->format('YmdHis') . '-' . (Auth::id() ?? 'guest');
        $baseNominal = array_sum(array_map(function ($item) {
            return $item['price'];
        }, $cart));
        $adminFeeFixed = $selected['fee'] ?? 0;
        $adminFeePercent = $selected['fee_persen'] ?? 0;
        $adminFeePercentValue = round($baseNominal * ($adminFeePercent / 100));
        $adminFee = $adminFeeFixed + $adminFeePercentValue;
        $nominal = $baseNominal + $adminFee;
        $type = $selected['type'] ?? '';
        $metode = $selected['metode'] ?? '';

        // Panggil API create deposit
        $api = app(\App\Services\AtlanticPediaApi::class);
        $result = $api->createDeposit($reffId, $nominal, $type, $metode);

        // Handle error jika response tidak sesuai ekspektasi
        if (!($result['status'] ?? false) || !isset($result['data']['id'])) {
            $msg = $result['message'] ?? ($result['data']['msg'] ?? 'Gagal membuat permintaan pembayaran. Pastikan nominal dan metode pembayaran sesuai.');
            return redirect()->back()->with('error', $msg);
        }

        // Normalisasi data payment untuk berbagai tipe response (bank, va, ewallet, qris)
        $data = $result['data'] ?? [];
        $paymentData = [
            'id' => $data['id'] ?? null,
            'reff_id' => $data['reff_id'] ?? null,
            'nominal' => $data['nominal'] ?? 0,
            'tambahan' => $data['tambahan'] ?? 0,
            'fee' => $data['fee'] ?? 0,
            'get_balance' => $baseNominal,
            'status' => $data['status'] ?? null,
            'created_at' => $data['created_at'] ?? null,
            'expired_at' => $data['expired_at'] ?? null,
            // Bank/VA
            'bank' => $data['bank'] ?? null,
            'tujuan' => $data['tujuan'] ?? null,
            'atas_nama' => $data['atas_nama'] ?? null,
            'nomor_va' => $data['nomor_va'] ?? null,
            // QRIS
            'qr_string' => $data['qr_string'] ?? null,
            'qr_image' => $data['qr_image'] ?? null,
            // Ewallet
            'url' => $data['url'] ?? null,
        ];

        // Convert cart to array values to handle associative array
        $cartItems = array_values($cart);

        // Create orders for each product in cart
        $orderIds = [];
        $totalItems = count($cartItems);
        $adminFeePerItem = $totalItems > 0 ? ($adminFee / $totalItems) : 0;

        foreach ($cartItems as $index => $item) {
            // Calculate total for this item (price + proportional admin fee)
            $itemTotal = $item['price'] + $adminFeePerItem;

            $order = \App\Models\Order::create([
                'user_id' => Auth::id(),
                'product_id' => $item['id'],
                'price' => $item['price'],
                'total' => $itemTotal,
                'admin_fee' => $adminFeePerItem,
                'name' => Auth::user()->name ?? '',
                'email' => Auth::user()->email ?? '',
                'whatsapp' => Auth::user()->whatsapp ?? '',
                'status' => 'pending',
                'delivery_status' => 'pending',
                'expired_at' => $data['expired_at'] ?? null,
                'reff_id' => $reffId,
                'deposit_id' => $data['id'] ?? null,
            ]);
            $orderIds[] = $order->id;
        }

        // Kosongkan keranjang
        session()->forget('cart');
        // Simpan order ids di session untuk delivery/assignment
        session(['order_ids' => $orderIds]);

        // Kirim data pembayaran ke view delivery
        return redirect()->route('delivery')->with([
            'success' => 'Pesanan berhasil dibuat! Silakan selesaikan pembayaran.',
            'payment_data' => $paymentData
        ]);
    }

    public function cancelPayment(Request $request)
    {
        $request->validate([
            'deposit_id' => 'required|string',
        ]);
        $depositId = $request->input('deposit_id');
        $result = app(\App\Services\AtlanticPediaApi::class)->cancelDeposit($depositId);
        if ($result['status'] ?? false) {
            session()->forget('payment_data');
            return redirect()->route('delivery')->with('success', 'Pembayaran berhasil dibatalkan.');
        } else {
            return redirect()->route('delivery')->with('error', $result['message'] ?? 'Gagal membatalkan pembayaran.');
        }
    }

    public function delivery(Request $request)
    {
        $payment = session('payment_data');
        $statusData = null;
        $forceUpdate = $request->get('force_update');

        if ($payment && isset($payment['id'])) {
            // Fetch latest status from API
            $statusResult = app(\App\Services\AtlanticPediaApi::class)->getDepositStatus($payment['id']);

            if (($statusResult['status'] ?? false) && isset($statusResult['data'])) {
                $statusData = $statusResult['data'];

                // Update status in session for UI
                $payment['status'] = $statusData['status'] ?? $payment['status'];
                session(['payment_data' => $payment]);

                // Check if payment is successful (handle multiple status variations)
                $paymentStatus = strtoupper($statusData['status'] ?? '');
                $isSuccessful = in_array($paymentStatus, ['SUCCESS', 'PAID', 'SETTLEMENT', 'COMPLETED']);

                if ($isSuccessful && Auth::check()) {
                    // Find orders by deposit_id OR reff_id (fallback)
                    $orders = \App\Models\Order::where(function ($query) use ($payment) {
                        $query->where('deposit_id', $payment['id'])
                            ->orWhere('reff_id', $payment['reff_id'] ?? '');
                    })
                        ->where('user_id', Auth::id())
                        ->get();

                    \Log::info('Processing successful payment', [
                        'deposit_id' => $payment['id'],
                        'orders_found' => $orders->count(),
                        'payment_status' => $paymentStatus
                    ]);

                    foreach ($orders as $order) {
                        // Skip if already processed
                        if ($order->status === 'paid' && $order->esim_stock_id) {
                            continue;
                        }
                        // Try to assign eSIM stock
                        if (!$order->esim_stock_id) {
                            $stock = \App\Models\ProductStock::where('product_id', $order->product_id)
                                ->where('status', 'available')
                                ->first();
                            if ($stock) {
                                $order->esim_stock_id = $stock->id;
                                $order->status = 'paid';
                                $order->delivery_status = 'delivered';
                                $order->save();
                                $stock->status = 'assigned';
                                $stock->user_id = $order->user_id;
                                $stock->assigned_at = now();
                                $stock->save();
                                \Log::info('eSIM assigned', [
                                    'order_id' => $order->id,
                                    'stock_id' => $stock->id,
                                    'user_id' => $order->user_id
                                ]);
                            } else {
                                \Log::warning('No available stock', [
                                    'order_id' => $order->id,
                                    'product_id' => $order->product_id
                                ]);
                            }
                        } else {
                            // Update order status if already has stock
                            $order->status = 'paid';
                            $order->delivery_status = 'delivered';
                            $order->save();
                        }
                    }
                }
            }
        }

        // If AJAX, return only status
        if ($request->ajax() || $forceUpdate) {
            return response()->json([
                'status' => $payment['status'] ?? 'pending',
                'payment_status' => strtoupper($statusData['status'] ?? 'PENDING'),
                'is_successful' => isset($paymentStatus) && in_array($paymentStatus, ['SUCCESS', 'PAID', 'SETTLEMENT', 'COMPLETED'])
            ]);
        }

        return view('order.delivery', compact('payment', 'statusData'));
    }

    public function ajaxDepositStatus(Request $request)
    {
        $request->validate([
            'deposit_id' => 'required|string',
        ]);
        $result = app(\App\Services\AtlanticPediaApi::class)->getDepositStatus($request->deposit_id);
        return response()->json($result);
    }

    public function search(Request $request)
    {
        $q = trim($request->get('q', ''));
        $results = [];
        if (strlen($q) > 1) {
            // Search products
            $products = \App\Models\Product::where('name', 'like', "%$q%")
                ->orWhere('description', 'like', "%$q%")
                ->limit(5)->get();
            foreach ($products as $p) {
                $results[] = [
                    'id' => $p->id,
                    'type' => 'product',
                    'name' => $p->name,
                    'url' => route('products.detail', $p->id),
                ];
            }
            // Search countries
            $countries = \App\Models\Country::where('name', 'like', "%$q%")
                ->orWhere('code', 'like', "%$q%")
                ->limit(5)->get();
            foreach ($countries as $c) {
                $results[] = [
                    'id' => $c->id,
                    'type' => 'country',
                    'name' => $c->name,
                    'url' => url('/country/' . $c->id),
                ];
            }
        }
        return response()->json($results);
    }

    // Update payment and order when deposit status is success (called from AJAX)
    public function updateDepositSuccess(Request $request)
    {
        $request->validate([
            'deposit_id' => 'required|string',
        ]);
        // Get deposit status from API
        $result = app(\App\Services\AtlanticPediaApi::class)->getDepositStatus($request->deposit_id);
        if (!empty($result['data']) && ($result['data']['status'] ?? null) === 'success') {
            $depositId = $request->deposit_id;
            // Find order(s) by deposit_id
            $orders = \App\Models\Order::where('deposit_id', $depositId)->get();
            foreach ($orders as $order) {
                $order->status = 'paid';
                $order->save();
                // Assign eSIM if not yet assigned
                if ($order->user_id && !$order->esim_stock_id) {
                    $stock = \App\Models\ProductStock::where('product_id', $order->product_id)
                        ->where('status', 'available')->first();
                    if ($stock) {
                        $order->esim_stock_id = $stock->id;
                        $order->delivery_status = 'delivered';
                        $order->save();
                        $stock->assignToUser($order->user_id);
                    }
                }
            }
            return response()->json(['updated' => true]);
        }
        return response()->json(['updated' => false]);
    }
}
