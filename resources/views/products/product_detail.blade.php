@extends('layouts.app')

@section('title', $product->name . ' - RAVCONNECT')

@section('content')
<section class="relative py-20 bg-linear-to-b from-gray-50 to-white overflow-hidden min-h-screen">
    <div class="max-w-3xl mx-auto px-4 relative z-10">
        <div class="flex items-center gap-4 mb-8">
            @php
                $flag = $product->countries && $product->countries->count() ?
                    'https://flagcdn.com/48x36/' . strtolower($product->countries->first()->code) . '.png' : null;
            @endphp
            @if($flag)
                <img src="{{ $flag }}" alt="{{ $product->countries->first()->name }}" class="w-14 h-10 rounded shadow border border-gray-200">
            @endif
            <h1 class="text-3xl md:text-4xl font-black text-gray-900">{{ $product->name }}</h1>
        </div>
        <div class="bg-white rounded-3xl shadow-xl border-4 border-[#FFC50F]/30 p-8 mb-8">
            <div class="text-gray-700 text-lg mb-4">{{ $product->description }}</div>
            <div class="grid grid-cols-2 gap-6 mb-6">
                <div>
                    <div class="text-xs text-gray-500 font-semibold mb-1">Harga</div>
                    <div class="text-2xl font-black text-[#FFC50F]">Rp {{ number_format($product->price * 1000, 0, ',', '.') }}</div>
                </div>
                <div>
                    <div class="text-xs text-gray-500 font-semibold mb-1">Kuota</div>
                    <div class="font-black text-gray-900 text-lg">{{ $product->quota ? $product->quota . 'GB' : 'Unlimited' }}</div>
                </div>
                <div>
                    <div class="text-xs text-gray-500 font-semibold mb-1">Masa Aktif</div>
                    <div class="font-black text-gray-900 text-lg">{{ $product->validity }} Hari</div>
                </div>
                <div>
                    <div class="text-xs text-gray-500 font-semibold mb-1">Operator</div>
                    <div class="font-black text-gray-900 text-lg">{{ $product->operator }}</div>
                </div>
            </div>
            <div class="mb-6">
                <div class="text-xs text-gray-500 font-semibold mb-1">Negara yang bisa dipakai</div>
                <div class="flex flex-wrap gap-2">
                    @foreach($product->countries as $country)
                        <span class="inline-flex items-center gap-2 bg-gray-100 border border-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">
                            <img src="https://flagcdn.com/24x18/{{ strtolower($country->code) }}.png" alt="{{ $country->name }}" class="w-6 h-4 rounded shadow">
                            {{ $country->name }}
                        </span>
                    @endforeach
                </div>
            </div>
            <form method="POST" action="{{ route('cart.add', $product->id) }}" class="block w-full mt-4">
                @csrf
                <button type="submit" class="w-full bg-gradient-to-r from-[#FFC50F] to-[#FFD700] text-black py-4 rounded-2xl hover:from-[#FFD700] hover:to-[#FFC50F] transition-all font-black text-lg shadow-xl hover:shadow-2xl transform hover:scale-105 text-center">
                    Beli Sekarang
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
