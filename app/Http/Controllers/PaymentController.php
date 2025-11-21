<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // List all payments
    public function index()
    {
        return response()->json(Payment::all());
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
        return response()->json(['message' => 'Payment deleted']);
    }
}
