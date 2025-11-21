@extends('layouts.app')

@section('title', 'Status Pembayaran - RAVCONNECT')

@section('content')
<section class="relative py-20 bg-linear-to-b from-gray-50 to-white min-h-screen">
    <div class="max-w-2xl mx-auto px-4 relative z-10 text-center">
        <h1 class="text-3xl md:text-4xl font-black text-gray-900 mb-8">Status Pembayaran</h1>
        @if(session('success'))
            <div class="mb-8 p-6 bg-green-100 text-green-800 rounded-xl font-bold text-lg">
                {{ session('success') }}
            </div>
        @endif
        <p class="text-gray-700 text-lg mb-8">Silakan selesaikan pembayaran Anda di halaman payment gateway.<br>Setelah pembayaran berhasil, eSIM akan dikirim otomatis ke email Anda.</p>
        <a href="/" class="inline-block px-10 py-4 bg-[#FFC50F] text-black rounded-2xl font-black text-lg shadow-xl hover:bg-[#FFD700] transition-all">Kembali ke Beranda</a>
    </div>
</section>
@endsection
