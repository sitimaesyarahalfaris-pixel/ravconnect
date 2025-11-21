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
