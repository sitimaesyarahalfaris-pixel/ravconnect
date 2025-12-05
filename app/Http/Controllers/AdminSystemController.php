<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class AdminSystemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(\App\Http\Middleware\AdminAuthMiddleware::class);
    }

    // Get system settings
    public function getSettings()
    {
        $settings = Setting::whereIn('key', [
            'smtp_email',
            'whatsapp_cs',
            'website_title',
            'meta_seo',
            'midtrans_api_key',
            'tripay_api_key',
            'webhook_url',
            'qris_static',
            'qris_dynamic',
            'available_payment_methods',
            'default_payment_method',
            'withdrawal_info', // tambahkan key withdrawal_info
        ])->get()->keyBy('key');
        // Get payment methods from AtlanticPediaApi
        $paymentMethods = app(\App\Services\AtlanticPediaApi::class)->getDepositMethods();
        $paymentMethods = $paymentMethods['data'] ?? [];
        $availablePaymentMethods = isset($settings['available_payment_methods']) ? json_decode($settings['available_payment_methods']->value, true) : [];
        $defaultPaymentMethod = $settings['default_payment_method']->value ?? null;
        // Get bank/ewallet list
        $bankList = app(\App\Services\AtlanticPediaApi::class)->getBankList();
        $bankList = $bankList['data'] ?? [];
        $withdrawalInfo = isset($settings['withdrawal_info']) ? json_decode($settings['withdrawal_info']->value, true) : [];
        return view('admin.system.index', [
            'settings' => $settings,
            'paymentMethods' => $paymentMethods,
            'availablePaymentMethods' => $availablePaymentMethods,
            'defaultPaymentMethod' => $defaultPaymentMethod,
            'bankList' => $bankList,
            'withdrawalInfo' => $withdrawalInfo,
        ]);
    }

    // Update system setting
    public function updateSetting(Request $request)
    {
        if ($request->has('available_payment_methods')) {
            Setting::updateOrCreate(['key' => 'available_payment_methods'], ['value' => json_encode($request->input('available_payment_methods'))]);
            return redirect()->back()->with('success', 'Available payment methods updated');
        }
        if ($request->has('default_payment_method')) {
            Setting::updateOrCreate(['key' => 'default_payment_method'], ['value' => $request->input('default_payment_method')]);
            return redirect()->back()->with('success', 'Default payment method updated');
        }
        $validated = $request->validate([
            'key' => 'required|string',
            'value' => 'nullable|string',
        ]);
        $setting = Setting::updateOrCreate(['key' => $validated['key']], ['value' => $validated['value']]);
        return redirect()->back()->with('success', 'Setting updated');
    }

    // Save withdrawal info
    public function saveWithdrawalInfo(Request $request)
    {
        // Example: Save withdrawal info to settings or a dedicated table
        $validated = $request->validate([
            'withdraw_bank_code' => 'required|string',
            'withdraw_bank_name' => 'required|string',
            'withdraw_account_number' => 'required|string',
            'withdraw_account_holder' => 'required|string',
            'withdraw_email' => 'nullable|email',
            'withdraw_phone' => 'nullable|string',
            'withdraw_note' => 'nullable|string',
        ]);

        // Save to settings table as JSON (or adjust as needed)
        \App\Models\Setting::updateOrCreate(
            ['key' => 'withdrawal_info'],
            ['value' => json_encode($validated)]
        );

        return redirect()->back()->with('success', 'Withdrawal info saved successfully.');
    }
}
