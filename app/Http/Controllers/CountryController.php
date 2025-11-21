<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    // List all countries
    public function index()
    {
        $countries = Country::withCount('products')->get();
        return view('countries', compact('countries'));
    }

    // public function indexPage()
    // {

    // }

    // Store a new country
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'nullable|string|max:10',
        ]);
        $country = Country::create($validated);
        return response()->json($country, 201);
    }

    // Show a single country
    public function show($id)
    {
        $country = Country::findOrFail($id);
        return response()->json($country);
    }

    public function showProducts($id)
    {
        $country = Country::findOrFail($id);
        $products = \DB::table('products')
            ->join('product_country', 'products.id', '=', 'product_country.product_id')
            ->where('product_country.country_id', $id)
            ->select('products.*')
            ->get();
        return view('products/country_products', compact('country', 'products'));
    }

    // Update a country
    public function update(Request $request, $id)
    {
        $country = Country::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'code' => 'nullable|string|max:10',
        ]);
        $country->update($validated);
        return response()->json($country);
    }

    // Delete a country
    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        return response()->json(['message' => 'Country deleted']);
    }
}
