<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    // List all settings
    public function index()
    {
        return response()->json(Setting::all());
    }

    // Store a new setting
    public function store(Request $request)
    {
        $validated = $request->validate([
            'key' => 'required|string|unique:settings,key',
            'value' => 'nullable|string',
        ]);
        $setting = Setting::create($validated);
        return response()->json($setting, 201);
    }

    // Show a single setting
    public function show($id)
    {
        $setting = Setting::findOrFail($id);
        return response()->json($setting);
    }

    // Update a setting
    public function update(Request $request, $id)
    {
        $setting = Setting::findOrFail($id);
        $validated = $request->validate([
            'value' => 'nullable|string',
        ]);
        $setting->update($validated);
        return response()->json($setting);
    }

    // Delete a setting
    public function destroy($id)
    {
        $setting = Setting::findOrFail($id);
        $setting->delete();
        return response()->json(['message' => 'Setting deleted']);
    }
}
