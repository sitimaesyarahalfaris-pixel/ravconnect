<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class AdminSystemController extends Controller
{
    // Get system settings
    public function getSettings()
    {
        $settings = Setting::whereIn('key', [
            'smtp_email',
            'whatsapp_cs',
            'website_title',
            'meta_seo',
            'midtrans_api_key',
            'tripay_api_key',
            'webhook_url',
            'qris_static',
            'qris_dynamic'
        ])->get();
        return response()->json($settings);
    }

    // Update system setting
    public function updateSetting(Request $request)
    {
        $validated = $request->validate([
            'key' => 'required|string',
            'value' => 'nullable|string',
        ]);
        $setting = Setting::updateOrCreate(['key' => $validated['key']], ['value' => $validated['value']]);
        return response()->json($setting);
    }
}
