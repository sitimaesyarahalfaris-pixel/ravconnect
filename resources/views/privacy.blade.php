@extends('layouts.app')

@section('title', 'Kebijakan Privasi - RAVCONNECT')

@section('content')
<!-- Load Alpine.js for this page -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>

<!-- Hero Header -->
<div class="relative bg-gradient-to-br from-[#FFC50F] via-[#FFD700] to-[#FFA500] py-16 px-8 overflow-hidden">
    <!-- Animated Background -->
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

            <!-- Kebijakan Privasi (Active) -->
            <a href="{{ url('/privacy') }}" 
               class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-[#FFC50F] to-[#FFD700] p-4 shadow-lg hover:shadow-xl transition-all hover:scale-105">
                <div class="relative z-10 flex flex-col items-center text-center gap-2">
                    <div class="w-12 h-12 bg-black rounded-xl flex items-center justify-center shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                    </div>
                    <span class="font-black text-black text-sm">Kebijakan Privasi</span>
                </div>
                <!-- Active Indicator -->
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-black"></div>
            </a>

            <!-- Pengembalian Dana -->
            <a href="{{ url('/refund') }}" 
               class="group relative overflow-hidden rounded-2xl bg-gray-100 hover:bg-gradient-to-br hover:from-gray-200 hover:to-gray-300 p-4 shadow-md hover:shadow-lg transition-all hover:scale-105">
                <div class="relative z-10 flex flex-col items-center text-center gap-2">
                    <div class="w-12 h-12 bg-gray-700 rounded-xl flex items-center justify-center shadow-md group-hover:bg-black transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                    </div>
                    <span class="font-black text-gray-900 text-sm">Pengembalian Dana</span>
                </div>
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
<div class="max-w-4xl mx-auto px-8 py-12">
    
    <!-- Introduction Card -->
    <div class="mb-8 p-6 bg-gradient-to-r from-blue-50 to-blue-100 border-2 border-blue-200 rounded-2xl">
        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
            </div>
            <div>
                <h3 class="font-black text-blue-900 text-lg mb-2">Privasi Anda Sangat Penting</h3>
                <p class="text-blue-800 text-sm leading-relaxed">
                    Halaman ini menjelaskan bagaimana data Anda dikumpulkan, digunakan, dan dilindungi oleh RAVCONNECT. Kami berkomitmen untuk menjaga kerahasiaan dan keamanan data pribadi Anda sesuai dengan peraturan perundang-undangan yang berlaku di Indonesia.
                </p>
            </div>
        </div>
    </div>

    <!-- Section 1: Informasi yang Kami Kumpulkan -->
    <div class="mb-8 bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-gray-900 to-black p-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-[#FFC50F] rounded-lg flex items-center justify-center">
                    <span class="font-black text-black text-lg">1</span>
                </div>
                <h2 class="text-2xl font-black text-white">Informasi yang Kami Kumpulkan</h2>
            </div>
        </div>
        <div class="p-6">
            <p class="text-gray-700 leading-relaxed mb-6">
                Kami mengumpulkan data pribadi yang Anda berikan secara langsung saat melakukan pembelian atau mendaftar akun, serta data yang dikumpulkan secara otomatis.
            </p>
            
            <!-- 1.1 -->
            <div class="mb-6 p-5 bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl border-2 border-purple-200">
                <h3 class="font-black text-purple-900 mb-3 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-purple-600">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    1.1. Data yang Diberikan Secara Langsung
                </h3>
                <ul class="space-y-3">
                    <li class="flex items-start gap-2 text-purple-900">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-purple-600 mt-1 flex-shrink-0">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span><strong>Data Identifikasi:</strong> Nama, Alamat Email, dan Nomor Telepon/WhatsApp (opsional, untuk notifikasi atau dukungan pelanggan).</span>
                    </li>
                    <li class="flex items-start gap-2 text-purple-900">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-purple-600 mt-1 flex-shrink-0">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span><strong>Data Transaksi:</strong> Detail produk eSIM yang dibeli (negara tujuan, kuota, iccid), jumlah transaksi, dan tanggal pembelian.</span>
                    </li>
                    <li class="flex items-start gap-2 text-purple-900">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-purple-600 mt-1 flex-shrink-0">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span><strong>Data Komunikasi:</strong> Informasi yang Anda berikan saat menghubungi customer service kami melalui email atau via chat.</span>
                    </li>
                </ul>
            </div>

            <!-- 1.2 -->
            <div class="p-5 bg-gradient-to-br from-green-50 to-green-100 rounded-2xl border-2 border-green-200">
                <h3 class="font-black text-green-900 mb-3 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-600">
                        <rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect>
                        <line x1="12" y1="18" x2="12.01" y2="18"></line>
                    </svg>
                    1.2. Data yang Dikumpulkan Secara Otomatis
                </h3>
                <ul class="space-y-3">
                    <li class="flex items-start gap-2 text-green-900">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-600 mt-1 flex-shrink-0">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span><strong>Data Teknis Perangkat:</strong> Alamat IP, jenis browser, sistem operasi, device ID, dan bahasa.</span>
                    </li>
                    <li class="flex items-start gap-2 text-green-900">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-600 mt-1 flex-shrink-0">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span><strong>Data Penggunaan (Cookies):</strong> Informasi tentang bagaimana Anda menggunakan website kami, seperti halaman yang dikunjungi, waktu yang dihabiskan, dan tautan yang diklik. Data ini digunakan untuk meningkatkan user experience (UX).</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Section 2: Penggunaan Data Pribadi -->
    <div class="mb-8 bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-gray-900 to-black p-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-[#FFC50F] rounded-lg flex items-center justify-center">
                    <span class="font-black text-black text-lg">2</span>
                </div>
                <h2 class="text-2xl font-black text-white">Penggunaan Data Pribadi</h2>
            </div>
        </div>
        <div class="p-6">
            <p class="text-gray-700 leading-relaxed mb-6">
                Kami menggunakan Data Pribadi Anda untuk tujuan-tujuan berikut:
            </p>
            <ul class="space-y-4">
                <li class="flex items-start gap-3 p-4 bg-gray-50 rounded-xl border border-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F] mt-0.5 flex-shrink-0">
                        <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                    </svg>
                    <div>
                        <strong class="text-gray-900">Penyediaan Layanan Inti:</strong>
                        <p class="text-gray-700 mt-1">Untuk memproses pesanan eSIM Anda, mengirimkan Kode QR eSIM, dan memfasilitasi aktivasi layanan konektivitas.</p>
                    </div>
                </li>
                <li class="flex items-start gap-3 p-4 bg-gray-50 rounded-xl border border-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F] mt-0.5 flex-shrink-0">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                        <line x1="1" y1="10" x2="23" y2="10"></line>
                    </svg>
                    <div>
                        <strong class="text-gray-900">Pemrosesan Transaksi:</strong>
                        <p class="text-gray-700 mt-1">Untuk memproses pembayaran Anda melalui Payment Gateway pihak ketiga dan mengirimkan konfirmasi transaksi.</p>
                    </div>
                </li>
                <li class="flex items-start gap-3 p-4 bg-gray-50 rounded-xl border border-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F] mt-0.5 flex-shrink-0">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                    <div>
                        <strong class="text-gray-900">Dukungan Pelanggan:</strong>
                        <p class="text-gray-700 mt-1">Untuk menjawab pertanyaan Anda, menyelesaikan keluhan terkait eSIM, atau memberikan bantuan teknis.</p>
                    </div>
                </li>
                <li class="flex items-start gap-3 p-4 bg-gray-50 rounded-xl border border-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F] mt-0.5 flex-shrink-0">
                        <path d="M18 20V10M12 20V4M6 20v-6"></path>
                    </svg>
                    <div>
                        <strong class="text-gray-900">Peningkatan Kualitas Layanan:</strong>
                        <p class="text-gray-700 mt-1">Untuk menganalisis tren penggunaan dan perilaku pelanggan (melalui data anonim) guna meningkatkan fitur website dan penawaran produk.</p>
                    </div>
                </li>
                <li class="flex items-start gap-3 p-4 bg-gray-50 rounded-xl border border-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F] mt-0.5 flex-shrink-0">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    <div>
                        <strong class="text-gray-900">Tujuan Pemasaran (Opsional):</strong>
                        <p class="text-gray-700 mt-1">Jika Anda menyetujuinya, untuk mengirimkan informasi promosi, penawaran diskon, atau berita produk baru.</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- Section 3: Pengungkapan (Berbagi) Data Pribadi -->
    <div class="mb-8 bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-gray-900 to-black p-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-[#FFC50F] rounded-lg flex items-center justify-center">
                    <span class="font-black text-black text-lg">3</span>
                </div>
                <h2 class="text-2xl font-black text-white">Pengungkapan (Berbagi) Data Pribadi</h2>
            </div>
        </div>
        <div class="p-6">
            <p class="text-gray-700 leading-relaxed mb-6">
                Kami menjaga kerahasiaan Data Pribadi Anda, namun dapat mengungkapkannya kepada Pihak Ketiga dalam situasi berikut:
            </p>
            <div class="space-y-4">
                <div class="p-4 bg-yellow-50 border-2 border-yellow-200 rounded-xl">
                    <div class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-yellow-600 mt-0.5 flex-shrink-0">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                        <div>
                            <strong class="text-yellow-900">Mitra Penyedia eSIM:</strong>
                            <p class="text-yellow-800 mt-1">Kami membagikan Data Transaksi (misal: jenis paket yang dibeli) kepada mitra API eSIM kami sejauh yang diperlukan untuk generate dan mengaktifkan kode QR eSIM Anda.</p>
                        </div>
                    </div>
                </div>
                <div class="p-4 bg-blue-50 border-2 border-blue-200 rounded-xl">
                    <div class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 mt-0.5 flex-shrink-0">
                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                            <line x1="1" y1="10" x2="23" y2="10"></line>
                        </svg>
                        <div>
                            <strong class="text-blue-900">Penyedia Layanan Pembayaran (Payment Gateway):</strong>
                            <p class="text-blue-800 mt-1">Data transaksi dan pembayaran Anda dibagikan kepada Payment Gateway pihak ketiga untuk memproses pembayaran secara aman.</p>
                        </div>
                    </div>
                </div>
                <div class="p-4 bg-red-50 border-2 border-red-200 rounded-xl">
                    <div class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-red-600 mt-0.5 flex-shrink-0">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                        </svg>
                        <div>
                            <strong class="text-red-900">Kewajiban Hukum:</strong>
                            <p class="text-red-800 mt-1">Kami dapat mengungkapkan Data Pribadi Anda jika diwajibkan oleh undang-undang atau perintah pengadilan yang sah di Republik Indonesia.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 4: Penyimpanan dan Keamanan Data -->
    <div class="mb-8 bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-gray-900 to-black p-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-[#FFC50F] rounded-lg flex items-center justify-center">
                    <span class="font-black text-black text-lg">4</span>
                </div>
                <h2 class="text-2xl font-black text-white">Penyimpanan dan Keamanan Data</h2>
            </div>
        </div>
        <div class="p-6 space-y-6">
            <!-- 4.1 -->
            <div>
                <h3 class="font-black text-gray-900 mb-3 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F]">
                        <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                        <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                        <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                    </svg>
                    4.1. Penyimpanan
                </h3>
                <p class="text-gray-700 leading-relaxed ml-6">
                    Kami menyimpan Data Pribadi Anda selama diperlukan untuk tujuan penyediaan layanan atau selama diwajibkan oleh peraturan perundang-undangan yang berlaku.
                </p>
            </div>
            
            <!-- 4.2 -->
            <div>
                <h3 class="font-black text-gray-900 mb-3 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F]">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                    4.2. Keamanan
                </h3>
                <p class="text-gray-700 leading-relaxed ml-6">
                    Kami mengambil langkah-langkah teknis dan organisasi yang wajar untuk melindungi Data Pribadi Anda dari akses tidak sah, pengungkapan, perubahan, atau penghancuran. Kami melindungi Kode QR eSIM di dalam server yang aman dan dilindungi kata sandi. Keamanan akses terhadap data tersebut bergantung pada kerahasiaan password dan informasi login akun Anda.
                </p>
            </div>
        </div>
    </div>

    <!-- Section 5: Hak Pengguna -->
    <div class="mb-8 bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-gray-900 to-black p-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-[#FFC50F] rounded-lg flex items-center justify-center">
                    <span class="font-black text-black text-lg">5</span>
                </div>
                <h2 class="text-2xl font-black text-white">Hak Pengguna (Subjek Data)</h2>
            </div>
        </div>
        <div class="p-6">
            <p class="text-gray-700 leading-relaxed mb-6">
                Sesuai UU PDP di Indonesia, Anda memiliki hak untuk:
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="p-5 bg-gradient-to-br from-green-50 to-green-100 rounded-2xl border-2 border-green-200 text-center">
                    <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                            <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </div>
                    <h4 class="font-black text-green-900 mb-2">Mengakses</h4>
                    <p class="text-green-800 text-sm">Data Pribadi Anda yang kami simpan</p>
                </div>
                <div class="p-5 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl border-2 border-blue-200 text-center">
                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                        </svg>
                    </div>
                    <h4 class="font-black text-blue-900 mb-2">Memperbaiki</h4>
                    <p class="text-blue-800 text-sm">Data Pribadi yang tidak akurat</p>
                </div>
                <div class="p-5 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl border-2 border-red-200 text-center">
                    <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        </svg>
                    </div>
                    <h4 class="font-black text-red-900 mb-2">Menghapus</h4>
                    <p class="text-red-800 text-sm">Data Pribadi Anda (kecuali diwajibkan hukum)</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 6: Kontak Kami -->
    <div class="mb-8 bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-gray-900 to-black p-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-[#FFC50F] rounded-lg flex items-center justify-center">
                    <span class="font-black text-black text-lg">6</span>
                </div>
                <h2 class="text-2xl font-black text-white">Kontak Kami</h2>
            </div>
        </div>
        <div class="p-6">
            <p class="text-gray-700 leading-relaxed mb-6">
                Jika Anda memiliki pertanyaan mengenai Kebijakan Privasi ini atau ingin mengajukan hak Anda sebagai Subjek Data, silakan hubungi kami melalui:
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <a href="mailto:support@ravconnect.my.id" class="p-5 bg-gradient-to-br from-blue-50 to-blue-100 border-2 border-blue-200 rounded-2xl hover:shadow-lg transition-all hover:scale-105 group">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </div>
                        <div>
                            <div class="text-xs text-blue-700 mb-1">Email Support</div>
                            <div class="font-black text-blue-900 group-hover:text-blue-700 transition-colors">support@ravconnect.my.id</div>
                        </div>
                    </div>
                </a>
                <a href="https://wa.me/6285706074934" target="_blank" class="p-5 bg-gradient-to-br from-green-50 to-green-100 border-2 border-green-200 rounded-2xl hover:shadow-lg transition-all hover:scale-105 group">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-xs text-green-700 mb-1">WhatsApp Admin</div>
                            <div class="font-black text-green-900 group-hover:text-green-700 transition-colors">085-706-074-934</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Bottom CTA -->
    <div class="p-6 bg-gradient-to-r from-[#FFC50F] to-[#FFD700] rounded-2xl shadow-lg">
        <div class="text-center">
            <div class="w-14 h-14 bg-black rounded-full flex items-center justify-center mx-auto mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                </svg>
            </div>
            <h3 class="font-black text-black text-xl mb-2">Data Anda Aman Bersama Kami</h3>
            <p class="text-black/80 text-sm mb-4 max-w-2xl mx-auto">
                Kami berkomitmen untuk menjaga privasi dan keamanan data Anda sesuai dengan standar tertinggi dan peraturan yang berlaku.
            </p>
            <a href="{{ url('/') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-black text-white rounded-xl font-black shadow-lg hover:bg-gray-900 transition-all hover:scale-105">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                </svg>
                Kembali ke Beranda
            </a>
        </div>
    </div>

</div>

<style>
    [x-cloak] { display: none !important; }
    
    /* Smooth scrolling */
    html {
        scroll-behavior: smooth;
    }
</style>

@endsection
