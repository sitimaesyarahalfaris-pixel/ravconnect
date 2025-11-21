<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductStock;
use App\Models\Product;

class ProductStockSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();
        foreach ($products as $product) {
            ProductStock::firstOrCreate([
                'product_id' => $product->id,
                'sku' => 'SKU-' . $product->id,
                'content' => 'DEMO-ESIM-' . $product->id,
                'type' => 'qr',
            ], [
                'product_id' => $product->id,
                'content' => 'DEMO-ESIM-' . $product->id,
                'type' => 'qr',
                'stock' => rand(10, 100),
                'sku' => 'SKU-' . $product->id,
                'status' => 'available',
            ]);
        }
    }
}
