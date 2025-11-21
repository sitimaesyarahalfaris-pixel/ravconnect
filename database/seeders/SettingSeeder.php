<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::firstOrCreate(['key' => 'promo_banner'], [
            'value' => 'Diskon 20% untuk pelanggan baru!'
        ]);
        Setting::firstOrCreate(['key' => 'faq'], [
            'value' => 'Q: Bagaimana cara aktivasi eSIM?\nA: Setelah pembayaran, QR code akan dikirim ke email Anda.'
        ]);
    }
}
