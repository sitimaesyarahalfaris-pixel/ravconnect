<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\Payment;
use App\Models\ProductStock;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PaymentWebhookController extends Controller
{
    // Handle payment gateway webhook callback
    public function handle(Request $request)
    {
        // Example: Midtrans/Tripay/Xendit webhook payload
        $payload = $request->all();
        Log::info('Payment Webhook Received', $payload);

        // AtlanticPedia webhook support
        $payload = $request->json()->all();
        if (($payload['event'] ?? '') === 'deposit') {
            $data = $payload['data'] ?? [];
            $reffId = $data['reff_id'] ?? null;
            $status = $data['status'] ?? null;
            $depositId = $data['id'] ?? null;

            // Find order(s) by reff_id
            $orders = \App\Models\Order::where('reff_id', $reffId)->get();
            if ($orders->isEmpty()) {
                Log::warning('Order not found for reff_id: ' . $reffId);
                return response()->json(['error' => 'Order not found'], 404);
            }
            foreach ($orders as $order) {
                $order->status = $status === 'success' ? 'paid' : $status;
                $order->deposit_id = $depositId;
                $order->save();
                // Assign eSIM if paid and not yet assigned
                if ($status === 'success' && $order->user_id) {
                    if (!$order->esim_stock_id) {
                        $stock = \App\Models\ProductStock::where('product_id', $order->product_id)
                            ->where('status', 'available')->first();
                        if ($stock) {
                            $order->esim_stock_id = $stock->id;
                            $order->delivery_status = 'delivered';
                            $order->save();
                            $stock->assignToUser($order->user_id);
                        }
                    } else {
                        // Ensure stock is assigned to user
                        $stock = \App\Models\ProductStock::find($order->esim_stock_id);
                        if ($stock && $stock->user_id !== $order->user_id) {
                            $stock->assignToUser($order->user_id);
                        }
                        $order->delivery_status = 'delivered';
                        $order->save();
                    }
                }
                // Update payment record for this order
                $payment = \App\Models\Payment::where('order_id', $order->id)->first();
                if ($payment) {
                    $payment->status = $status === 'success' ? 'paid' : $status;
                    $payment->transaction_id = $depositId;
                    $payment->save();
                }
            }
            return response()->json(['success' => true]);
        }

        // Find payment by transaction_id
        $payment = Payment::where('transaction_id', $payload['transaction_id'] ?? null)->first();
        if (!$payment) {
            return response()->json(['error' => 'Payment not found'], 404);
        }

        // Update payment status
        $payment->status = $payload['status'] ?? 'pending';
        $payment->save();

        // If paid, update order and auto-deliver if enabled
        if ($payment->status === 'paid') {
            $order = $payment->order;
            $order->status = 'paid';
            $order->delivery_status = 'pending';
            $order->save();

            // Auto-delivery logic
            if ($order->product->auto_delivery) {
                $stock = ProductStock::where('product_id', $order->product_id)
                    ->where('status', 'available')
                    ->first();
                if ($stock) {
                    $stock->status = 'used';
                    $stock->save();
                    $order->delivery_status = 'delivered';
                    $order->save();

                    // Send email to buyer with eSIM content
                    Mail::raw(
                        "Your eSIM: {$stock->content}",
                        function ($message) use ($order) {
                            $message->to($order->email)
                                ->subject('Your eSIM from RAVCONNECT');
                        }
                    );
                }
            }
        }

        return response()->json(['message' => 'Webhook processed']);
    }
}
