<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            [
                'name' => 'Global eSIM 5GB',
                'description' => '5GB data, 30 days validity, works in 100+ countries.',
                'price' => 25.00,
                'quota' => 5,
                'validity' => 30,
                'operator' => 'GlobalTel',
                'auto_delivery' => true,
                'image' => 'esim-global-5gb.png',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Europe eSIM 10GB',
                'description' => '10GB data, 30 days validity, covers all of Europe.',
                'price' => 30.00,
                'quota' => 10,
                'validity' => 30,
                'operator' => 'EuroConnect',
                'auto_delivery' => true,
                'image' => 'esim-europe-10gb.png',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Asia eSIM 3GB',
                'description' => '3GB data, 15 days validity, for major Asian countries.',
                'price' => 15.00,
                'quota' => 3,
                'validity' => 15,
                'operator' => 'AsiaLink',
                'auto_delivery' => true,
                'image' => 'esim-asia-3gb.png',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'USA eSIM Unlimited',
                'description' => 'Unlimited data, 7 days validity, for the United States.',
                'price' => 20.00,
                'quota' => null,
                'validity' => 7,
                'operator' => 'USAMobile',
                'auto_delivery' => true,
                'image' => 'esim-usa-unlimited.png',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
