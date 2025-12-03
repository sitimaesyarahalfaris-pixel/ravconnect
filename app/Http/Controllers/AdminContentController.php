<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Payment;
use App\Models\ProductStock;
use App\Models\Setting;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $user = Auth::user();
            if (!$user || !$user->is_admin) {
                abort(403, 'Unauthorized');
            }
            return $next($request);
        });
    }
    // Get editable content for admin panel
    public function getContent()
    {
        $data = [
            'promo_banner' => Setting::where('key', 'promo_banner')->first(),
            'faq' => Setting::where('key', 'faq')->first(),
            'esim_info' => Setting::where('key', 'esim_info')->first(),
            'recommended_products' => Product::where('active', true)->orderBy('id', 'desc')->take(5)->get(),
            'contact_info' => Setting::where('key', 'contact_info')->first(),
            'social_media' => Setting::where('key', 'social_media')->first(),
            'logo' => Setting::where('key', 'logo')->first(),
            'footer' => Setting::where('key', 'footer')->first(),
            'hero_banner_text' => Setting::where('key', 'hero_banner_text')->first(),
            'hero_banner_img_url' => Setting::where('key', 'hero_banner_img_url')->value('value'),
            'hero_promo' => Setting::where('key', 'hero_promo')->first(),
            'hero_discount' => Setting::where('key', 'hero_discount')->first(),
            'hero_stat_countries' => Setting::where('key', 'hero_stat_countries')->first(),
            'hero_stat_users' => Setting::where('key', 'hero_stat_users')->first(),
            'hero_stat_rating' => Setting::where('key', 'hero_stat_rating')->first(),
        ];
        if (request()->wantsJson()) {
            return response()->json($data);
        }
        return view('admin.content.index', $data);
    }

    // Update content section
    public function updateContent(Request $request)
    {
        // Handle hero banner image upload
        if ($request->hasFile('hero_banner_img')) {
            $file = $request->file('hero_banner_img');
            $path = $file->store('public/hero_banners');
            $relativeUrl = str_replace('public/', 'storage/', $path);
            Setting::updateOrCreate(['key' => 'hero_banner_img_url'], ['value' => $relativeUrl]);
        }

        // Handle all text fields (including hero fields)
        $fields = [
            'hero_banner_text',
            'hero_discount',
            'hero_promo',
            'hero_stat_countries',
            'hero_stat_users',
            'hero_stat_rating',
            'promo_banner',
            'faq',
            'esim_info',
            'contact_info',
            'social_media',
            'logo',
            'footer'
        ];
        foreach ($fields as $field) {
            if ($request->has($field)) {
                Setting::updateOrCreate(['key' => $field], ['value' => $request->input($field)]);
            }
        }

        // For generic key/value pairs (fallback)
        if ($request->has('key') && $request->has('value')) {
            Setting::updateOrCreate(['key' => $request->input('key')], ['value' => $request->input('value')]);
        }

        return redirect()->back()->with('success', 'Content updated');
    }
}
