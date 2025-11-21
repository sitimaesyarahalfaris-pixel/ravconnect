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
                        @php $total += $item['price'] * 1000; @endphp
                        <div class="flex items-center gap-4 bg-white rounded-xl shadow p-4 border border-[#FFC50F]/30">
                            <div class="flex-1">
                                <div class="font-bold text-base text-gray-900">{{ $item['name'] }}</div>
                                <div class="text-xs text-gray-500">Kuota: {{ $item['quota'] ?? '-' }} | Masa Aktif: {{ $item['validity'] ?? '-' }} | Operator: {{ $item['operator'] ?? '-' }}</div>
                            </div>
                            <div class="font-black text-lg text-[#FFC50F]">Rp {{ number_format($item['price'] * 1000, 0, ',', '.') }}</div>
                        </div>
                    @endforeach
                </div>
                <div class="text-right font-bold text-xl text-gray-900 mb-8">Total: <span class="text-[#FFC50F]">Rp {{ number_format($total, 0, ',', '.') }}</span></div>
            @endif
        </div>
        <form method="POST" action="{{ route('checkout.process') }}" class="space-y-6 bg-white rounded-2xl shadow-lg p-8 border-2 border-[#FFC50F]/20">
            @csrf
            <div>
                <label class="block font-semibold mb-1">Nama</label>
                <input type="text" name="name" required class="w-full border rounded-lg px-4 py-2">
            </div>
            <div>
                <label class="block font-semibold mb-1">Email</label>
                <input type="email" name="email" required class="w-full border rounded-lg px-4 py-2">
            </div>
            <div>
                <label class="block font-semibold mb-1">Nomor WhatsApp (opsional)</label>
                <input type="text" name="whatsapp" class="w-full border rounded-lg px-4 py-2">
            </div>
            <div>
                <label class="block font-semibold mb-1">Pilih Metode Pembayaran</label>
                <select name="payment_method" class="w-full border rounded-lg px-4 py-2">
                    <option value="midtrans">Midtrans</option>
                    <option value="tripay">Tripay</option>
                    <option value="xendit">Xendit</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-[#FFC50F] text-black py-3 rounded-xl font-black text-lg shadow hover:bg-[#FFD700] transition-all">Lanjut Bayar</button>
        </form>
    </div>
</section>
@endsection
