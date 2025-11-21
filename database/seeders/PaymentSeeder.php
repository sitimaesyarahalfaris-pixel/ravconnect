<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\Order;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        $orders = Order::all();
        foreach ($orders as $order) {
            Payment::firstOrCreate([
                'order_id' => $order->id
            ], [
                'order_id' => $order->id,
                'amount' => $order->total,
                'status' => 'paid',
                'method' => 'credit_card', // align with schema
                // 'payment_method' => 'credit_card',
                'transaction_id' => 'TX-' . $order->id . '-' . rand(1000, 9999),
            ]);
        }
    }
}
