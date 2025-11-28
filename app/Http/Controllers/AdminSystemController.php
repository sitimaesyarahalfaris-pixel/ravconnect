<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class AdminSystemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(\App\Http\Middleware\AdminAuthMiddleware::class);
    }
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
        if (request()->wantsJson()) {
            return response()->json($settings);
        }
        return view('admin.system.index', compact('settings'));
    }

    // Update system setting
    public function updateSetting(Request $request)
    {
        $validated = $request->validate([
            'key' => 'required|string',
            'value' => 'nullable|string',
        ]);
        $setting = Setting::updateOrCreate(['key' => $validated['key']], ['value' => $validated['value']]);
        if ($request->wantsJson()) {
            return response()->json($setting);
        }
        return redirect()->route('admin.simple')->with('success', 'Setting updated');
    }
}
