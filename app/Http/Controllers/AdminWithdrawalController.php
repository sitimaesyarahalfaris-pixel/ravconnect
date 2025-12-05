<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AtlanticPediaApi;
use Illuminate\Support\Str;

class AdminWithdrawalController extends Controller
{
    // Show withdrawal form for admin
    public function showForm()
    {
        // You can fetch revenue from your dashboard logic or pass as parameter
        $revenue = (float) (session('dashboard_revenue') ?? 0); // Example, replace with real logic
        return view('admin.withdrawal', compact('revenue'));
    }

    // Handle withdrawal request from admin
    public function withdraw(Request $request)
    {
        $validated = $request->validate([
            'bank_code' => 'required|string',
            'bank_name' => 'required|string',
            'account_number' => 'required|string',
            'account_holder' => 'required|string',
            'nominal' => 'required|numeric|min:10000',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'note' => 'nullable|string',
        ]);
        $api = new AtlanticPediaApi();
        $refId = 'ADMINWD-' . now()->format('YmdHis') . '-' . Str::random(6);
        $result = $api->createTransfer(
            $refId,
            $validated['bank_code'],
            $validated['account_number'],
            $validated['account_holder'],
            $validated['nominal'],
            $validated['email'] ?? null,
            $validated['phone'] ?? null,
            $validated['note'] ?? null
        );
        return response()->json($result);
    }
}
