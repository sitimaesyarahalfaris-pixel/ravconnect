<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductStock;

class MyEsimController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $esims = $user ? $user->productStocks()->with('product')->where('status', 'used')->get() : collect();
        return view('my_esim', compact('esims'));
    }
}
