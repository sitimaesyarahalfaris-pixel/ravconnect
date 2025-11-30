@extends('layouts.app')

@section('title', 'Checkout - RAVCONNECT')

@section('content')
<section class="relative py-20 bg-linear-to-b from-gray-50 to-white min-h-screen">
    <div class="max-w-3xl mx-auto px-4 relative z-10">
        <h1 class="text-3xl md:text-4xl font-black text-gray-900 mb-8">Checkout</h1>
        <div class="mb-8">
            <h2 class="text-xl font-bold mb-4">Ringkasan Pesanan</h2>
            @php $cart = session('cart', []); $total = 0; @endphp
            @if(count($cart) === 0)
                <div class="text-center text-gray-500 py-10">Keranjang Anda kosong.</div>
            @else
                <div class="space-y-4 mb-6">
                    @foreach($cart as $item)
                        @php $total += $item['price']; @endphp
                        <div class="flex items-center gap-4 bg-white rounded-xl shadow p-4 border border-[#FFC50F]/30">
                            <div class="flex-1">
                                <div class="font-bold text-base text-gray-900">{{ $item['name'] }}</div>
                                <div class="text-xs text-gray-500">Kuota: {{ $item['quota'] ?? '-' }} | Masa Aktif: {{ $item['validity'] ?? '-' }} | Operator: {{ $item['operator'] ?? '-' }}</div>
                            </div>
                            <div class="font-black text-lg text-[#FFC50F]">Rp {{ number_format($item['price'], 0, ',', '.') }}</div>
                        </div>
                    @endforeach
                </div>
                <div class="text-right font-bold text-xl text-gray-900 mb-8">Total: <span class="text-[#FFC50F]">Rp {{ number_format($total, 0, ',', '.') }}</span></div>
            @endif
        </div>
        <form method="POST" action="{{ route('checkout.process') }}" class="space-y-6 bg-white rounded-2xl shadow-lg p-8 border-2 border-[#FFC50F]/20">
            @csrf
            <div>
                <label class="block font-semibold mb-1">Pilih Metode Pembayaran</label>
                @php
                    $groupOrder = ['ewallet', 'va', 'bank'];
                    $grouped = collect($paymentMethods)
                        ->where('status', 'aktif')
                        ->groupBy(fn($m) => strtolower($m['type']))
                        ->sortBy(fn($v, $k) => array_search($k, $groupOrder));
                    $groupLabel = [
                        'ewallet' => 'Pembayaran instan dengan E-Wallet (OVO, DANA, ShopeePay, dll)',
                        'va' => 'Pembayaran melalui Virtual Account (BNI, BRI, Mandiri, dll)',
                        'bank' => 'Transfer ke rekening bank manual',
                    ];
                    $groupTitle = [
                        'ewallet' => 'E-Wallet',
                        'va' => 'Virtual Account',
                        'bank' => 'Transfer Bank',
                    ];
                @endphp
                <div class="grid grid-cols-1 gap-4">
                    @foreach($groupOrder as $group)
                        @if(isset($grouped[$group]))
                            <div class="mb-1 mt-4 text-xs font-bold uppercase text-gray-500">{{ $groupTitle[$group] ?? ucfirst($group) }}</div>
                            <div class="mb-2 text-xs text-gray-600">{{ $groupLabel[$group] ?? '' }}</div>
                            @foreach($grouped[$group] as $method)
                                @php
                                    $totalBiaya = $total + ($method['fee'] ?? 0) + round($total * (($method['fee_persen'] ?? 0) / 100));
                                @endphp
                                <label class="flex items-center gap-4 p-4 border-2 rounded-xl cursor-pointer transition-all shadow-sm hover:border-[#FFC50F] {{ old('payment_method') == $method['metode'] ? 'border-[#FFC50F] bg-yellow-50' : 'border-gray-200 bg-white' }}">
                                    <div class="flex flex-col items-center justify-center w-28 min-w-28">
                                        <div class="font-black text-lg text-[#FFC50F]">Rp {{ number_format($totalBiaya, 0, ',', '.') }}</div>
                                        @if(($method['fee'] ?? 0) > 0 || ($method['fee_persen'] ?? 0) > 0)
                                            <div class="text-xs text-gray-400">Termasuk admin/fee</div>
                                        @endif
                                    </div>
                                    <input type="radio" name="payment_method" value="{{ $method['metode'] }}" class="form-radio text-[#FFC50F] focus:ring-[#FFC50F]" {{ old('payment_method') == $method['metode'] ? 'checked' : '' }} required>
                                    <img src="{{ $method['img_url'] }}" alt="{{ $method['name'] }}" class="w-12 h-12 object-contain rounded bg-white border border-gray-100">
                                    <div class="flex-1">
                                        <div class="font-bold text-gray-900">{{ $method['name'] }}</div>
                                    </div>
                                </label>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
            <button type="submit" class="w-full bg-[#FFC50F] text-black py-3 rounded-xl font-black text-lg shadow hover:bg-[#FFD700] transition-all">Lanjut Bayar</button>
        </form>
    </div>
</section>
@endsection
