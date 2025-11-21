@extends('layouts.app')

@section('title', 'Keranjang Belanja - RAVCONNECT')

@section('content')
<section class="relative py-20 bg-linear-to-b from-gray-50 to-white min-h-screen">
    <div class="max-w-3xl mx-auto px-4 relative z-10">
        <h1 class="text-3xl md:text-4xl font-black text-gray-900 mb-8">Keranjang Belanja</h1>
        <div id="cart-items">
            @php $cart = session('cart', []); @endphp
            @if(count($cart) === 0)
                <div class="text-center text-gray-500 py-20">Keranjang Anda kosong.</div>
            @else
                <div class="space-y-6">
                    @foreach($cart as $item)
                        <div class="flex items-center gap-4 bg-white rounded-2xl shadow p-6 border-2 border-[#FFC50F]/20">
                            <div class="flex-1">
                                <div class="font-bold text-lg text-gray-900">{{ $item['name'] }}</div>
                                <div class="text-gray-600 text-sm mb-2">{{ $item['description'] ?? '' }}</div>
                                <div class="text-xs text-gray-500">Kuota: {{ $item['quota'] ?? '-' }} | Masa Aktif: {{ $item['validity'] ?? '-' }} | Operator: {{ $item['operator'] ?? '-' }}</div>
                            </div>
                            <div class="font-black text-xl text-[#FFC50F]">Rp {{ number_format($item['price'] * 1000, 0, ',', '.') }}</div>
                            <form method="POST" action="{{ route('cart.remove', $item['id']) }}">
                                @csrf
                                <button type="submit" class="ml-4 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 font-bold">Hapus</button>
                            </form>
                        </div>
                    @endforeach
                </div>
                <div class="text-right mt-8">
                    <a href="{{ route('checkout') }}" class="inline-block px-10 py-4 bg-[#FFC50F] text-black rounded-2xl font-black text-lg shadow-xl hover:bg-[#FFD700] transition-all">Checkout</a>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
