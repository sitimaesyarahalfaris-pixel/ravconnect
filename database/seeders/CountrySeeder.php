<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $countries = require __DIR__ . '/all_countries.php';
        foreach ($countries as $country) {
            \App\Models\Country::firstOrCreate(['code' => $country['code']], $country);
        }
    }
}
