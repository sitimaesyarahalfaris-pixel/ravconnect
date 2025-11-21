@extends('layouts.app')

@section('title', 'Negara Cakupan - RAVCONNECT')

@section('content')
<section class="relative py-24 bg-gradient-to-b from-gray-50 to-white overflow-hidden">
    <div class="max-w-4xl mx-auto px-4 relative z-10">
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-black text-gray-900 mb-4">Daftar Negara Cakupan</h1>
            <p class="text-lg text-gray-600">Pilih negara untuk melihat paket eSIM yang tersedia</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($countries as $country)
                <a href="/country/{{ $country->id }}" class="group flex flex-col items-center bg-white rounded-2xl shadow hover:shadow-xl border-2 border-[#FFC50F]/20 hover:border-[#FFC50F] p-6 transition-all country-card relative">
                    <img src="https://flagcdn.com/64x48/{{ strtolower($country->code) }}.png" alt="{{ $country->name }}" class="w-16 h-12 rounded shadow mb-3 border border-gray-200">
                    <span class="font-bold text-gray-900 text-lg text-center group-hover:text-[#FFC50F]">{{ $country->name }}</span>
                    <span class="absolute top-3 right-3 bg-[#FFC50F] text-black text-xs font-bold px-3 py-1 rounded-full shadow-lg border-2 border-white animate-pulse">
                        {{ $country->products_count ?? ($country->products->count() ?? 0) }} Paket
                    </span>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endsection
