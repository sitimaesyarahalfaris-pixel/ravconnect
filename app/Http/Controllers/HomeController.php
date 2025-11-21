<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Country;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('active', true)->with('countries')->get();
        $countries = Country::all();
        $promoBanner = Setting::where('key', 'promo_banner')->first();
        $faq = Setting::where('key', 'faq')->first();
        $recommended = Product::where('active', true)->orderBy('id', 'desc')->take(5)->get();
        return view('index', [
            'products' => $products,
            'countries' => $countries,
            'promoBanner' => $promoBanner,
            'faq' => $faq,
            'recommended' => $recommended,
        ]);
    }
}
