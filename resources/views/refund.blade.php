@extends('layouts.app')

@section('title', 'Pengembalian Dana - RAVCONNECT')

@section('content')
<!-- Load Alpine.js for this page -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>

<!-- Hero Header -->
<div class="relative bg-gradient-to-br from-[#FFC50F] via-[#FFD700] to-[#FFA500] py-16 px-8 overflow-hidden">
    <div class="absolute inset-0 overflow-hidden opacity-20">
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-white rounded-full blur-3xl"></div>
    </div>
    
    <div class="max-w-6xl mx-auto relative z-10 text-center">
        <div class="inline-flex items-center gap-2 bg-black/10 backdrop-blur-sm px-4 py-2 rounded-full border-2 border-black/20 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                <polyline points="14 2 14 8 20 8"></polyline>
                <line x1="16" y1="13" x2="8" y2="13"></line>
                <line x1="16" y1="17" x2="8" y2="17"></line>
                <polyline points="10 9 9 9 8 9"></polyline>
            </svg>
            <span class="text-black font-bold text-sm">Legal Information</span>
        </div>
        <h1 class="text-4xl md:text-5xl font-black text-black mb-3">Informasi Legal</h1>
        <p class="text-lg text-black/80 max-w-2xl mx-auto">Ketentuan penggunaan layanan, kebijakan privasi, dan informasi penting lainnya</p>
    </div>
</div>

<!-- Navigation Pills -->
<div class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b-2 border-gray-200 shadow-lg">
    <div class="max-w-6xl mx-auto px-8 py-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
            <!-- Syarat & Ketentuan -->
            <a href="{{ url('/terms') }}" 
               class="group relative overflow-hidden rounded-2xl bg-gray-100 hover:bg-gradient-to-br hover:from-gray-200 hover:to-gray-300 p-4 shadow-md hover:shadow-lg transition-all hover:scale-105">
                <div class="relative z-10 flex flex-col items-center text-center gap-2">
                    <div class="w-12 h-12 bg-gray-700 rounded-xl flex items-center justify-center shadow-md group-hover:bg-black transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                        </svg>
                    </div>
                    <span class="font-black text-gray-900 text-sm">Syarat & Ketentuan</span>
                </div>
            </a>

            <!-- Kebijakan Privasi -->
            <a href="{{ url('/privacy') }}" 
               class="group relative overflow-hidden rounded-2xl bg-gray-100 hover:bg-gradient-to-br hover:from-gray-200 hover:to-gray-300 p-4 shadow-md hover:shadow-lg transition-all hover:scale-105">
                <div class="relative z-10 flex flex-col items-center text-center gap-2">
                    <div class="w-12 h-12 bg-gray-700 rounded-xl flex items-center justify-center shadow-md group-hover:bg-black transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                    </div>
                    <span class="font-black text-gray-900 text-sm">Kebijakan Privasi</span>
                </div>
            </a>

            <!-- Pengembalian Dana (Active) -->
            <a href="{{ url('/refund') }}" 
               class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-[#FFC50F] to-[#FFD700] p-4 shadow-lg hover:shadow-xl transition-all hover:scale-105">
                <div class="relative z-10 flex flex-col items-center text-center gap-2">
                    <div class="w-12 h-12 bg-black rounded-xl flex items-center justify-center shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                    </div>
                    <span class="font-black text-black text-sm">Pengembalian Dana</span>
                </div>
                <!-- Active Indicator -->
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-black"></div>
            </a>

            <!-- Disclaimer -->
            <a href="{{ url('/disclaimer') }}" 
               class="group relative overflow-hidden rounded-2xl bg-gray-100 hover:bg-gradient-to-br hover:from-gray-200 hover:to-gray-300 p-4 shadow-md hover:shadow-lg transition-all hover:scale-105">
                <div class="relative z-10 flex flex-col items-center text-center gap-2">
                    <div class="w-12 h-12 bg-gray-700 rounded-xl flex items-center justify-center shadow-md group-hover:bg-black transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                    </div>
                    <span class="font-black text-gray-900 text-sm">Disclaimer</span>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="max-w-3xl mx-auto px-8 py-12">
    
    <!-- Important Notice -->
    <div class="mb-8 p-5 bg-red-50 border-2 border-red-300 rounded-xl">
        <div class="flex items-start gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-red-600 flex-shrink-0">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg>
            <div>
                <h3 class="font-black text-red-900 mb-2">Penting: Non-Refundable</h3>
                <p class="text-red-800 text-sm">
                    Semua pembelian eSIM yang telah berhasil disediakan Kode QR-nya bersifat <strong>final dan tidak dapat dikembalikan</strong> (non-refundable).
                </p>
            </div>
        </div>
    </div>

    <!-- Section 1: Prinsip Umum -->
    <div class="mb-8 bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
        <div class="bg-gray-900 p-4">
            <h2 class="text-xl font-black text-white">1. Prinsip Umum</h2>
        </div>
        <div class="p-6 space-y-4">
            <div>
                <h3 class="font-bold text-gray-900 mb-2">1.1. Sifat Produk Digital</h3>
                <p class="text-gray-700">
                    Seluruh produk yang dijual oleh RAVCONNECT adalah eSIM data digital yang proses penyediaannya otomatis dan instan di akun pengguna setelah pembayaran berhasil.
                </p>
            </div>
            <div>
                <h3 class="font-bold text-gray-900 mb-2">1.2. Final Sale</h3>
                <p class="text-gray-700">
                    Mengingat sifat produk, semua pembelian yang telah berhasil disediakan Kode QR eSIM di halaman "My eSIM" dalam akun pelanggan bersifat final dan tidak dapat dibatalkan atau dikembalikan (non-refundable).
                </p>
            </div>
            <div class="p-4 bg-green-50 border border-green-300 rounded-lg">
                <h3 class="font-bold text-green-900 mb-2">1.3. Pengecualian</h3>
                <p class="text-green-800">
                    Pengembalian dana (Refund) hanya akan diproses jika terjadi kegagalan layanan yang terbukti sebagai kesalahan murni sistem dari pihak RAVCONNECT.
                </p>
            </div>
        </div>
    </div>

    <!-- Contact Support -->
    <div class="p-6 bg-gradient-to-r from-[#FFC50F] to-[#FFD700] rounded-xl">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-black rounded-full flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                </svg>
            </div>
            <div>
                <h3 class="font-black text-black mb-1">Butuh Bantuan?</h3>
                <p class="text-black/80 text-sm mb-2">Hubungi support untuk pertanyaan mengenai pengembalian dana.</p>
                <a href="{{ url('/contact') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-black text-white rounded-lg font-bold text-sm hover:bg-gray-900">
                    Contact Support
                </a>
            </div>
        </div>
    </div>

</div>

<style>
    html {
        scroll-behavior: smooth;
    }
</style>

@endsection
