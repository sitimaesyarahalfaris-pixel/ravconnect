<?php



namespace App\Http\Controllers;

use App\Models\Withdrawal;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\AtlanticPediaApi;
use Illuminate\Support\Str;


class AdminWithdrawalController extends Controller
{
    // Show withdrawal form for admin
    public function showForm()
    {
        $totalRevenue = Order::where('status', 'paid')->sum('total');
        $totalWithdrawn = Withdrawal::sum('total_deducted');

        $revenue = $totalRevenue - $totalWithdrawn;

        // Fix: get only withdrawal_info row
        $setting = DB::table('settings')
            ->where('key', 'withdrawal_info')
            ->first();

        // Fix: read JSON from "value" column
        $info = $setting && !empty($setting->value)
            ? json_decode($setting->value, true)
            : [];

        $withdrawalInfo = [
            'bank_code'       => $info['withdraw_bank_code'] ?? null,
            'bank_name'       => $info['withdraw_bank_name'] ?? null,
            'account_number'  => $info['withdraw_account_number'] ?? null,
            'account_holder'  => $info['withdraw_account_holder'] ?? null,
            'email'           => $info['withdraw_email'] ?? null,
            'phone'           => $info['withdraw_phone'] ?? null,
            'note'            => $info['withdraw_note'] ?? null,
        ];

        $isEmpty = empty(array_filter($withdrawalInfo));
        if ($isEmpty) {
            $withdrawalInfo = null;
        }

        return view('admin.withdrawal', compact('revenue', 'withdrawalInfo'));
    }

    // Handle withdrawal request from admin
    public function withdraw(Request $request)
    {
        // Get withdrawal_info
        $setting = DB::table('settings')
            ->where('key', 'withdrawal_info')
            ->first();

        $acc = $setting && !empty($setting->value)
            ? json_decode($setting->value, true)
            : [];

        // Ensure withdrawal account is set
        if (empty($acc)) {
            return response()->json([
                'status' => false,
                'message' => 'Withdrawal account not configured.'
            ], 400);
        }

        // Only validate withdraw amount + note
        $validated = $request->validate([
            'nominal' => 'required|numeric|min:10000',
            'note'    => 'nullable|string',
        ]);

        $api = new AtlanticPediaApi();

        $refId = 'ADMINWD-' . now()->format('YmdHis') . '-' . Str::random(6);

        // Call API with saved withdrawal info
        $result = $api->createTransfer(
            $refId,
            $acc['withdraw_bank_code'],        // bank_code
            $acc['withdraw_account_number'],   // account_number
            $acc['withdraw_account_holder'],   // account_holder
            $validated['nominal'],             // amount
            $acc['withdraw_email'] ?? null,    // email
            $acc['withdraw_phone'] ?? null,    // phone
            $validated['note'] ?? null         // note
        );

        if (!empty($result['status']) && $result['status'] === true) {
            Withdrawal::create([
                'ref_id'        => $refId,
                'bank_code'     => $validated['bank_code'],
                'bank_name'     => $validated['bank_name'] ?? null,
                'account_number'=> $validated['account_number'],
                'account_holder'=> $validated['account_holder'],
                'amount'        => $validated['nominal'],
                'fee'           => $result['data']['fee'] ?? 0,
                'total_deducted'=> ($validated['nominal']) + ($result['data']['fee'] ?? 0),
                'api_id'        => $result['data']['id'] ?? null,
                'status'        => $result['data']['status'] ?? 'success',
            ]);
        }

        return response()->json($result);
    }

}
