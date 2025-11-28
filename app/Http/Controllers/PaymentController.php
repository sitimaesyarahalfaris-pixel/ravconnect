<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Protect admin-only endpoints: list, update, destroy, quickConfirm
        $this->middleware('auth')->only(['index', 'update', 'destroy', 'quickConfirm']);
        $this->middleware(\App\Http\Middleware\AdminAuthMiddleware::class)->only(['index', 'update', 'destroy', 'quickConfirm']);
    }
    // List all payments
    public function index()
    {
        $payments = Payment::orderBy('created_at', 'desc')->paginate(20);
        if (request()->wantsJson()) {
            return response()->json($payments);
        }
        return view('admin.payments.index', compact('payments'));
    }

    // Store a new payment
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'method' => 'required|string',
            'amount' => 'required|numeric',
            'status' => 'in:pending,paid,failed,expired',
            'payment_url' => 'nullable|string',
            'transaction_id' => 'nullable|string',
        ]);
        $payment = Payment::create($validated);
        return response()->json($payment, 201);
    }

    // Show a single payment
    public function show($id)
    {
        $payment = Payment::findOrFail($id);
        return response()->json($payment);
    }

    // Update a payment
    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $validated = $request->validate([
            'status' => 'in:pending,paid,failed,expired',
            'payment_url' => 'nullable|string',
            'transaction_id' => 'nullable|string',
        ]);
        $payment->update($validated);
        return response()->json($payment);
    }

    // Delete a payment
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Payment deleted']);
        }
        return redirect()->route('admin.dashboard')->with('success', 'Payment deleted');
    }

    // Quick confirm (mark as paid) from admin
    public function quickConfirm(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update(['status' => 'paid']);
        if ($request->wantsJson()) {
            return response()->json($payment);
        }
        return redirect()->route('admin.dashboard')->with('success', 'Payment confirmed');
    }
}
