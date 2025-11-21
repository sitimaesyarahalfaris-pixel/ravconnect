<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate([
            'email' => 'admin@ravconnect.com'
        ], [
            'name' => 'Admin',
            'email' => 'admin@ravconnect.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);
        User::factory(5)->create();
    }
}
