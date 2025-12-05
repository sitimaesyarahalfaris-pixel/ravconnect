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
        $countries = Country::orderBy('name')->get();
        return view('admin.countries.index', compact('countries'));
    }

    public function create()
    {
        return view('admin.countries_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'code'  => 'required|string|size:2|unique:countries,code',
            'flag_url' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'code', 'flag_url']);

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
            'name'  => 'required|string|max:255',
            'code'  => 'required|string|size:2|unique:countries,code,' . $country->id,
            'flag_url' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update text fields
        $country->name = $request->name;
        $country->code = $request->code;
        $country->flag_url = $request->flag_url;

        // Handle image replacement
        if ($request->hasFile('image')) {
            // delete old file if exists
            if ($country->image_url && file_exists(public_path($country->image_url))) {
                unlink(public_path($country->image_url));
            }

            $path = $request->file('image')->store('country_headers', 'public');
            $country->image_url = '/storage/' . $path;
        }

        $country->save();

        return redirect()->route('admin.countries.index')
            ->with('success', 'Country updated successfully.');
    }
}
