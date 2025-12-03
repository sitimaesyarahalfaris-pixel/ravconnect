<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Storage;

class CountryAdminController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('admin.countries_index', compact('countries'));
    }

    public function create()
    {
        return view('admin.countries_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|size:2|unique:countries,code',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data = $request->only(['name', 'code']);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('country_headers', 'public');
            $data['image_url'] = '/storage/' . $path;
        }
        Country::create($data);
        return redirect()->route('admin.countries.index')->with('success', 'Country added successfully.');
    }

    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('admin.countries_edit', compact('country'));
    }

    public function update(Request $request, $id)
    {
        $country = Country::findOrFail($id);
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('country_headers', 'public');
            $country->image_url = '/storage/' . $path;
        }
        $country->save();
        return redirect()->route('admin.countries.index')->with('success', 'Country updated successfully.');
    }
}
