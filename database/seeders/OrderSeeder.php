<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $products = Product::all();
        foreach ($users as $user) {
            foreach ($products->random(2) as $product) {
                Order::create([
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                    'status' => 'paid',
                    'total' => $product->price,
                    'email' => $user->email,
                    'name' => $user->name,
                ]);
            }
        }
    }
}
