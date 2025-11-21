<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Add product to cart
    public function add(Request $request, $id)
    {
        $product = Product::with('countries')->findOrFail($id);
        $cart = session('cart', []);
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
        return redirect()->route('cart')->with('success', 'Produk ditambahkan ke keranjang!');
    }

    // Remove product from cart
    public function remove(Request $request, $id)
    {
        $cart = session('cart', []);
        unset($cart[$id]);
        session(['cart' => $cart]);
        return redirect()->route('cart')->with('success', 'Produk dihapus dari keranjang!');
    }

    // Checkout page
    public function checkout()
    {
        $cart = session('cart', []);
        return view('order/checkout', compact('cart'));
    }

    // Process checkout with real payment gateway logic
    public function processCheckout(Request $request)
    {
        $cart = session('cart', []);
        if (count($cart) === 0) {
            return redirect()->route('cart')->with('error', 'Keranjang kosong.');
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'whatsapp' => 'nullable|string',
            'payment_method' => 'required|in:midtrans,tripay,xendit',
        ]);

        // 1. Create Order
        $order = new \App\Models\Order();
        $order->user_id = auth()->check() ? auth()->id() : null;
        $order->name = $validated['name'];
        $order->email = $validated['email'];
        $order->whatsapp = $validated['whatsapp'] ?? null;
        $order->status = 'pending';
        $order->total = collect($cart)->sum(fn($item) => $item['price'] * 1000);
        $order->save();

        // 2. Attach products to order (if you have a pivot table)
        if (method_exists($order, 'products')) {
            foreach ($cart as $item) {
                $order->products()->attach($item['id'], [
                    'price' => $item['price'],
                    'quantity' => 1,
                ]);
            }
        }

        // 3. Create Payment record
        $payment = new \App\Models\Payment();
        $payment->order_id = $order->id;
        $payment->method = $validated['payment_method'];
        $payment->status = 'pending';
        $payment->amount = $order->total;
        $payment->save();

        // 4. Redirect to payment gateway (stub: you should integrate with real SDK/API)
        switch ($validated['payment_method']) {
            case 'midtrans':
                // TODO: Integrate with Midtrans API and redirect to payment page
                return redirect()->route('delivery')->with('success', 'Order created. Integrate Midtrans here.');
            case 'tripay':
                // TODO: Integrate with Tripay API and redirect to payment page
                return redirect()->route('delivery')->with('success', 'Order created. Integrate Tripay here.');
            case 'xendit':
                // TODO: Integrate with Xendit API and redirect to payment page
                return redirect()->route('delivery')->with('success', 'Order created. Integrate Xendit here.');
        }

        // 5. Clear cart
        session()->forget('cart');
        return redirect()->route('index')->with('success', 'Checkout berhasil! Pesanan Anda sedang diproses.');
    }
}
