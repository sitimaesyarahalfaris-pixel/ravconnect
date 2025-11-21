@extends('layouts.app')

@section('title', 'eSIM untuk ' . $country->name . ' - RAVCONNECT')

@section('content')
<section class="relative py-24 bg-gradient-to-b from-gray-50 to-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <div class="flex items-center gap-4 mb-10">
            <img src="https://flagcdn.com/48x36/{{ strtolower($country->code) }}.png" alt="{{ $country->name }}" class="w-12 h-9 rounded shadow">
            <h1 class="text-3xl font-black text-gray-900">eSIM untuk {{ $country->name }}</h1>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($products as $product)
            <div class="relative group bg-white rounded-3xl overflow-hidden border-4 border-[#FFC50F]/30 hover:border-[#FFC50F] transition-all card-shadow-yellow transform hover:-translate-y-2">
                <div class="relative h-32 hero-gradient overflow-hidden flex items-center justify-center">
                    <img src="https://flagcdn.com/48x36/{{ strtolower($country->code) }}.png" alt="{{ $country->name }}" class="w-16 h-12 object-contain rounded-xl shadow-lg bg-white/80">
                </div>
                <div class="p-6">
                    <h3 class="text-gray-900 mb-3 font-bold text-lg">{{ $product->name }}</h3>
                    <div class="text-gray-600 text-sm mb-4">{{ $product->description }}</div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs text-gray-500 font-semibold">Kuota</span>
                        <span class="font-black text-gray-900">{{ $product->quota ? $product->quota . 'GB' : 'Unlimited' }}</span>
                    </div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs text-gray-500 font-semibold">Masa Aktif</span>
                        <span class="font-black text-gray-900">{{ $product->validity }} Hari</span>
                    </div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-xs text-gray-500 font-semibold">Operator</span>
                        <span class="font-black text-gray-900">{{ $product->operator }}</span>
                    </div>
                    <div class="flex items-center justify-between pt-3 border-t-2 border-gray-100 mb-4">
                        <span class="text-sm text-gray-700 font-bold">Harga</span>
                        <span class="text-2xl font-black text-[#FFC50F]">Rp {{ number_format($product->price * 1000, 0, ',', '.') }}</span>
                    </div>
                    <a href="{{ route('products.show', $product->id) }}" class="w-full block bg-gradient-to-r from-[#FFC50F] to-[#FFD700] text-black py-3 rounded-2xl hover:from-[#FFD700] hover:to-[#FFC50F] transition-all font-black text-base shadow-xl hover:shadow-2xl transform hover:scale-105 text-center">Lihat Detail</a>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center text-gray-500 py-20">
                Tidak ada produk eSIM untuk negara ini.
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
