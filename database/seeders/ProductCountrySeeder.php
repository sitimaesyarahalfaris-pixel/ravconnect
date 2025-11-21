<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Country;
use Illuminate\Support\Arr;

class ProductCountrySeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();
        $countryIds = Country::pluck('id')->toArray();
        foreach ($products as $product) {
            // Attach 1-3 random countries to each product
            $attach = Arr::random($countryIds, rand(1, min(3, count($countryIds))));
            $product->countries()->sync($attach);
        }
    }
}
