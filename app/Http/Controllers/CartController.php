<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Add product to cart (AJAX compatible)
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session('cart', []);

        // Check if product already in cart
        if (isset($cart[$id])) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Produk sudah ada di keranjang!'
                ]);
            }
            return redirect()->back()->with('info', 'Produk sudah ada di keranjang!');
        }

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
        $total = array_sum(array_column($cart, 'price')) * 1000;

        return view('order.cart', compact('cart', 'total'));
    }

    // Checkout page
    public function checkout()
    {
        $cart = session('cart', []);

        if (count($cart) === 0) {
            return redirect()->route('cart')->with('error', 'Keranjang kosong.');
        }

        $total = array_sum(array_column($cart, 'price')) * 1000;

        // Ambil metode pembayaran dari AtlanticPedia
        $methods = app(\App\Services\AtlanticPediaApi::class)->getDepositMethods();
        $paymentMethods = $methods['data'] ?? [];

        return view('order.checkout', compact('cart', 'total', 'paymentMethods'));
    }

    // Process checkout
    public function processCheckout(Request $request)
    {
        $cart = session('cart', []);

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

        // Generate reff_id unik (misal: order-<timestamp>-<user_id>)
        $reffId = 'order-' . now()->format('YmdHis') . '-' . (auth()->id() ?? 'guest');
        $nominal = array_sum(array_map(function ($item) {
            return $item['price'];
        }, $cart)) * 1000;
        $type = $selected['type'] ?? '';
        $metode = $selected['metode'] ?? '';

        // Panggil API create deposit
        $api = app(\App\Services\AtlanticPediaApi::class);
        $result = $api->createDeposit($reffId, $nominal, $type, $metode);

        // Handle error jika response tidak sesuai ekspektasi (misal: ewallet OVO gagal karena nominal tidak sesuai min/max, atau metode tidak tersedia)
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
            'get_balance' => $data['get_balance'] ?? 0,
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

        // Kosongkan keranjang
        session()->forget('cart');

        // Kirim data pembayaran ke view delivery (bisa juga redirect ke payment gateway jika perlu)
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
        if ($payment && isset($payment['id'])) {
            $statusResult = app(\App\Services\AtlanticPediaApi::class)->getDepositStatus($payment['id']);
            if (($statusResult['status'] ?? false) && isset($statusResult['data'])) {
                $statusData = $statusResult['data'];
                // Update status in session for UI
                $payment['status'] = $statusData['status'] ?? $payment['status'];
                session(['payment_data' => $payment]);
            }
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
}
