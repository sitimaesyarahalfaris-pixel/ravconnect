<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Payment;
use App\Models\ProductStock;
use App\Models\Setting;
use App\Models\Country;
use Illuminate\Http\Request;

class AdminContentController extends Controller
{
    // Get editable content for admin panel
    public function getContent()
    {
        return response()->json([
            'promo_banner' => Setting::where('key', 'promo_banner')->first(),
            'faq' => Setting::where('key', 'faq')->first(),
            'esim_info' => Setting::where('key', 'esim_info')->first(),
            'recommended_products' => Product::where('active', true)->orderBy('id', 'desc')->take(5)->get(),
            'contact_info' => Setting::where('key', 'contact_info')->first(),
            'social_media' => Setting::where('key', 'social_media')->first(),
            'logo' => Setting::where('key', 'logo')->first(),
            'footer' => Setting::where('key', 'footer')->first(),
        ]);
    }

    // Update content section
    public function updateContent(Request $request)
    {
        $validated = $request->validate([
            'key' => 'required|string',
            'value' => 'nullable|string',
        ]);
        $setting = Setting::updateOrCreate(['key' => $validated['key']], ['value' => $validated['value']]);
        return response()->json($setting);
    }
}
