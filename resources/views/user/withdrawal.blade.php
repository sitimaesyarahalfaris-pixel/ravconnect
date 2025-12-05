@extends('layouts.app')
@section('content')
@include('admin.partials.sidebar')
<div class="container mx-auto py-8">
    <h2 class="text-2xl font-bold mb-4">Pencairan Dana (Withdrawal)</h2>
    @if($withdrawalInfo)
        <div class="mb-4 p-4 bg-green-50 border border-green-400 rounded">
            <div class="font-bold mb-2">Akun Pencairan Tersimpan:</div>
            <div><b>Bank/E-Wallet:</b> {{ $withdrawalInfo['withdraw_bank_name'] ?? '-' }} ({{ $withdrawalInfo['withdraw_bank_code'] ?? '-' }})</div>
            <div><b>No. Rekening/E-Wallet:</b> {{ $withdrawalInfo['withdraw_account_number'] ?? '-' }}</div>
            <div><b>Nama Pemilik:</b> {{ $withdrawalInfo['withdraw_account_holder'] ?? '-' }}</div>
            <div><b>Email:</b> {{ $withdrawalInfo['withdraw_email'] ?? '-' }}</div>
            <div><b>Telepon:</b> {{ $withdrawalInfo['withdraw_phone'] ?? '-' }}</div>
            <div><b>Catatan:</b> {{ $withdrawalInfo['withdraw_note'] ?? '-' }}</div>
        </div>
        <form id="withdrawal-form" method="POST" action="{{ route('user.withdrawal.submit') }}">
            @csrf
            <input type="hidden" name="withdraw_bank_code" value="{{ $withdrawalInfo['withdraw_bank_code'] ?? '' }}">
            <input type="hidden" name="withdraw_bank_name" value="{{ $withdrawalInfo['withdraw_bank_name'] ?? '' }}">
            <input type="hidden" name="withdraw_account_number" value="{{ $withdrawalInfo['withdraw_account_number'] ?? '' }}">
            <input type="hidden" name="withdraw_account_holder" value="{{ $withdrawalInfo['withdraw_account_holder'] ?? '' }}">
            <input type="hidden" name="withdraw_email" value="{{ $withdrawalInfo['withdraw_email'] ?? '' }}">
            <input type="hidden" name="withdraw_phone" value="{{ $withdrawalInfo['withdraw_phone'] ?? '' }}">
            <input type="hidden" name="withdraw_note" value="{{ $withdrawalInfo['withdraw_note'] ?? '' }}">
            <div class="mb-4">
                <label for="nominal" class="block font-semibold mb-1">Nominal (Rp)</label>
                <input type="number" name="nominal" id="nominal" class="w-full border rounded p-2" min="10000" required>
            </div>
            <div class="mb-4">
                <label for="note" class="block font-semibold mb-1">Catatan (Opsional)</label>
                <textarea name="note" id="note" class="w-full border rounded p-2"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Ajukan Pencairan</button>
        </form>
        <div id="withdrawal-result" class="mt-6"></div>
    @else
        <div class="mb-4 p-4 bg-red-50 border border-red-400 rounded">
            <div class="font-bold mb-2 text-red-700">No Withdrawal Account Set</div>
            <div>Please configure your withdrawal account in System Settings before requesting a withdrawal.</div>
            <a href="{{ url('admin/system/settings') }}" class="inline-block mt-2 px-4 py-2 bg-yellow-400 text-black rounded font-bold">Go to System Settings</a>
        </div>
    @endif
</div>
<script>
document.getElementById('withdrawal-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    const form = e.target;
    const data = new FormData(form);
    const res = await fetch(form.action, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value,
            'Accept': 'application/json',
        },
        body: data
    });
    const result = await res.json();
    let html = '';
    if(result.status) {
        html = `<div class='p-4 bg-green-100 border border-green-400 rounded'>${result.message}<br>ID: ${result.data?.id ?? ''}</div>`;
    } else {
        html = `<div class='p-4 bg-red-100 border border-red-400 rounded'>${result.message ?? 'Terjadi kesalahan.'}</div>`;
    }
    document.getElementById('withdrawal-result').innerHTML = html;
});
</script>
@endsection
