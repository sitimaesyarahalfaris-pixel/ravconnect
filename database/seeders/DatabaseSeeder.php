<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Only create if not exists
        \App\Models\User::firstOrCreate([
            'email' => 'test@example.com',
        ], [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);
        // Seed all other tables
        $this->call([
            UserSeeder::class,
            CountrySeeder::class,
            ProductSeeder::class,
            SettingSeeder::class,
            ProductCountrySeeder::class,
            ProductStockSeeder::class,
            OrderSeeder::class,
            PaymentSeeder::class,
        ]);
    }
}
