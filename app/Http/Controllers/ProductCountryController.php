<?php

namespace App\Http\Controllers;

use App\Models\ProductCountry;
use Illuminate\Http\Request;

class ProductCountryController extends Controller
{
    // List all product-country relations
    public function index(Request $request)
    {
        $productId = $request->query('product_id');
        $countryId = $request->query('country_id');
        $query = ProductCountry::query();
        if ($productId) {
            $query->where('product_id', $productId);
        }
        if ($countryId) {
            $query->where('country_id', $countryId);
        }
        return response()->json($query->get());
    }

    // Store a new product-country relation
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'country_id' => 'required|exists:countries,id',
        ]);
        $relation = ProductCountry::create($validated);
        return response()->json($relation, 201);
    }

    // Delete a product-country relation
    public function destroy($id)
    {
        $relation = ProductCountry::findOrFail($id);
        $relation->delete();
        return response()->json(['message' => 'Relation deleted']);
    }
}
