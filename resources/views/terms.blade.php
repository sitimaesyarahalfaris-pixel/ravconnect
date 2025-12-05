@extends('layouts.app')

@section('title', 'Syarat & Ketentuan - RAVCONNECT')

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
            <!-- Syarat & Ketentuan (Active) -->
            <a href="{{ url('/terms') }}" 
               class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-[#FFC50F] to-[#FFD700] p-4 shadow-lg hover:shadow-xl transition-all hover:scale-105">
                <div class="relative z-10 flex flex-col items-center text-center gap-2">
                    <div class="w-12 h-12 bg-black rounded-xl flex items-center justify-center shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                        </svg>
                    </div>
                    <span class="font-black text-black text-sm">Syarat & Ketentuan</span>
                </div>
                <!-- Active Indicator -->
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-black"></div>
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
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="16" x2="12" y2="12"></line>
                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                </svg>
            </div>
            <div>
                <h3 class="font-black text-blue-900 text-lg mb-2">Penting untuk Dibaca</h3>
                <p class="text-blue-800 text-sm leading-relaxed">
                    Dengan mengakses dan menggunakan website RAVCONNECT, Anda setuju untuk terikat oleh Syarat & Ketentuan ini serta Kebijakan Privasi kami. Silakan baca dengan seksama sebelum menggunakan layanan kami.
                </p>
            </div>
        </div>
    </div>

    <!-- Section 1: Umum -->
    <div class="mb-8 bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-gray-900 to-black p-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-[#FFC50F] rounded-lg flex items-center justify-center">
                    <span class="font-black text-black text-lg">1</span>
                </div>
                <h2 class="text-2xl font-black text-white">Umum</h2>
            </div>
        </div>
        <div class="p-6 space-y-4">
            <!-- 1.1 -->
            <div>
                <h3 class="font-black text-gray-900 mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F]">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg>
                    1.1. Penerimaan Ketentuan
                </h3>
                <p class="text-gray-700 leading-relaxed ml-6">
                    Dengan mengakses dan menggunakan website RAVCONNECT (selanjutnya disebut "Layanan"), Anda setuju untuk terikat oleh Syarat & Ketentuan ini serta Kebijakan Privasi kami.
                </p>
            </div>
            <!-- 1.2 -->
            <div>
                <h3 class="font-black text-gray-900 mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F]">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg>
                    1.2. Perubahan Ketentuan
                </h3>
                <p class="text-gray-700 leading-relaxed ml-6">
                    RAVCONNECT berhak mengubah S&K ini sewaktu-waktu. Perubahan akan berlaku segera setelah dipublikasikan di website. Pengguna bertanggung jawab untuk meninjau S&K secara berkala.
                </p>
            </div>
            <!-- 1.3 -->
            <div>
                <h3 class="font-black text-gray-900 mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F]">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg>
                    1.3. Layanan
                </h3>
                <p class="text-gray-700 leading-relaxed ml-6">
                    RAVCONNECT menyediakan layanan penjualan eSIM data roaming internasional. Layanan kami memungkinkan Anda mendapatkan konektivitas jaringan seluler dari operator pihak ketiga di berbagai negara melalui proses yang cepat dan efisien.
                </p>
            </div>
        </div>
    </div>

    <!-- Section 2: Pembelian dan Pembayaran -->
    <div class="mb-8 bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-gray-900 to-black p-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-[#FFC50F] rounded-lg flex items-center justify-center">
                    <span class="font-black text-black text-lg">2</span>
                </div>
                <h2 class="text-2xl font-black text-white">Pembelian dan Pembayaran</h2>
            </div>
        </div>
        <div class="p-6 space-y-4">
            <!-- 2.1 -->
            <div>
                <h3 class="font-black text-gray-900 mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F]">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                    2.1. Proses Pembelian Otomatis
                </h3>
                <p class="text-gray-700 leading-relaxed ml-6">
                    Pembelian dianggap valid dan akan diproses secara otomatis (pengiriman QR Code) hanya setelah pembayaran diterima secara penuh dan dikonfirmasi oleh Payment Gateway kami.
                </p>
            </div>
            <!-- 2.2 -->
            <div>
                <h3 class="font-black text-gray-900 mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F]">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>
                    2.2. Kegagalan Pembayaran
                </h3>
                <p class="text-gray-700 leading-relaxed ml-6">
                    RAVCONNECT tidak bertanggung jawab atas kegagalan transaksi yang disebabkan oleh gangguan pada bank atau Payment Gateway pihak ketiga. Jika terjadi down time pada Payment Gateway, atau terjadi kesalahan processing di sistem bank/ewallet yang terhubung, RAVCONNECT tidak bisa berbuat apa-apa selain menunggu pihak Payment Gateway menyelesaikan masalahnya.
                </p>
            </div>
            <!-- 2.3 -->
            <div>
                <h3 class="font-black text-gray-900 mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F]">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    2.3. Pemesanan dan Pengiriman
                </h3>
                <p class="text-gray-700 leading-relaxed ml-6">
                    Kode QR eSIM akan tersedia secara otomatis di halaman "My eSIM" dalam akun pengguna Anda, maksimal 5-15 menit setelah konfirmasi pembayaran berhasil. Pengguna wajib login untuk mengaksesnya.
                </p>
            </div>
        </div>
    </div>

    <!-- Section 3: Kebijakan Penggunaan eSIM -->
    <div class="mb-8 bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-gray-900 to-black p-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-[#FFC50F] rounded-lg flex items-center justify-center">
                    <span class="font-black text-black text-lg">3</span>
                </div>
                <h2 class="text-2xl font-black text-white">Kebijakan Penggunaan eSIM</h2>
            </div>
        </div>
        <div class="p-6 space-y-4">
            <!-- 3.1 -->
            <div>
                <h3 class="font-black text-gray-900 mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F]">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    3.1. Tanggung Jawab Pengguna
                </h3>
                <p class="text-gray-700 leading-relaxed ml-6">
                    Pengguna bertanggung jawab penuh untuk memastikan perangkat yang digunakan kompatibel dengan teknologi eSIM sebelum melakukan pembelian. Informasi kompatibilitas telah tersedia di website. Anda juga bisa menghubungi admin untuk bantuan pengecekan.
                </p>
            </div>
            <!-- 3.2 -->
            <div>
                <h3 class="font-black text-gray-900 mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F]">
                        <rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect>
                        <line x1="12" y1="18" x2="12.01" y2="18"></line>
                    </svg>
                    3.2. Kuota Data
                </h3>
                <p class="text-gray-700 leading-relaxed ml-6">
                    Kuota data pada eSIM bersifat pre-paid (prabayar). Setelah kuota habis atau masa aktif berakhir, eSIM tidak dapat digunakan lagi kecuali jika tersedia opsi top-up (isi ulang) yang ditawarkan oleh RAVCONNECT.
                </p>
            </div>
            <!-- 3.3 -->
            <div>
                <h3 class="font-black text-gray-900 mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F]">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                    3.3. Masa Aktif
                </h3>
                <p class="text-gray-700 leading-relaxed ml-6">
                    Masa aktif eSIM dihitung berdasarkan aktivasi pertama (tergantung paket), Detail penghitungan tertera di deskripsi produk.
                </p>
            </div>
            <!-- 3.4 -->
            <div>
                <h3 class="font-black text-gray-900 mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F]">
                        <polyline points="16 18 22 12 16 6"></polyline>
                        <polyline points="8 6 2 12 8 18"></polyline>
                    </svg>
                    3.4. Aktivasi
                </h3>
                <p class="text-gray-700 leading-relaxed ml-6">
                    eSIM harus diinstalasi dan diaktifkan sesuai panduan yang diberikan. Kegagalan aktivasi karena kesalahan pengguna (misal: menghapus profil eSIM yang sudah terinstal, atau yang lainnya) menjadi tanggung jawab pengguna.
                </p>
            </div>
        </div>
    </div>

    <!-- Section 4: Pembatalan, Pengembalian Dana, dan Keluhan -->
    <div class="mb-8 bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-gray-900 to-black p-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-[#FFC50F] rounded-lg flex items-center justify-center">
                    <span class="font-black text-black text-lg">4</span>
                </div>
                <h2 class="text-2xl font-black text-white">Pembatalan, Pengembalian Dana, dan Keluhan</h2>
            </div>
        </div>
        <div class="p-6 space-y-4">
            <!-- 4.1 -->
            <div class="p-4 bg-red-50 border-2 border-red-200 rounded-xl">
                <h3 class="font-black text-red-900 mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-red-600">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>
                    4.1. Produk Digital (Non-Refundable)
                </h3>
                <p class="text-red-800 leading-relaxed">
                    Mengingat sifat produk yang digital dan dapat diaktifkan segera, semua pembelian eSIM yang telah dikirimkan Kode QR-nya ke pelanggan bersifat final dan tidak dapat dibatalkan atau dikembalikan (non-refundable).
                </p>
            </div>
            <!-- 4.2 -->
            <div>
                <h3 class="font-black text-gray-900 mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F]">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                    4.2. Prosedur Keluhan
                </h3>
                <p class="text-gray-700 leading-relaxed ml-6">
                    Semua keluhan mengenai konektivitas atau produk harus diajukan melalui email atau via chat admin dalam waktu maksimal 24 jam sejak waktu produk di order/aktivasi, disertai bukti (screenshot status jaringan, setting perangkat, dan lain sebagainya).
                </p>
            </div>
            <!-- 4.3 -->
            <div>
                <h3 class="font-black text-gray-900 mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F]">
                        <path d="M9.59 4.59A2 2 0 1 1 11 8H2m10.59 11.41A2 2 0 1 0 14 16H2m15.73-8.27A2.5 2.5 0 1 1 19.5 12H2"></path>
                    </svg>
                    4.3. Gangguan Jaringan
                </h3>
                <p class="text-gray-700 leading-relaxed ml-6">
                    RAVCONNECT tidak bertanggung jawab atas gangguan koneksi yang disebabkan oleh faktor eksternal seperti gangguan operator lokal di negara tujuan, kondisi cuaca, atau lokasi pengguna (misal: di basement atau pedalaman).
                </p>
            </div>
        </div>
    </div>

    <!-- Section 5: Kewajiban Pengguna -->
    <div class="mb-8 bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-gray-900 to-black p-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-[#FFC50F] rounded-lg flex items-center justify-center">
                    <span class="font-black text-black text-lg">5</span>
                </div>
                <h2 class="text-2xl font-black text-white">Kewajiban Pengguna</h2>
            </div>
        </div>
        <div class="p-6 space-y-4">
            <div>
                <p class="text-gray-700 leading-relaxed flex items-start gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F] mt-1 flex-shrink-0">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    <span><strong>5.1.</strong> Pengguna dilarang menggunakan Layanan untuk aktivitas ilegal, spamming, atau aktivitas lain yang melanggar hukum di Indonesia maupun negara tujuan.</span>
                </p>
            </div>
            <div>
                <p class="text-gray-700 leading-relaxed flex items-start gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F] mt-1 flex-shrink-0">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    <span><strong>5.2.</strong> Pengguna bertanggung jawab penuh atas keamanan informasi login akun mereka di RAVCONNECT. Pengguna wajib menyimpan dengan aman Kode QR eSIM dan detail aktivasi yang tersedia di halaman "My eSIM" dan memastikan Kode QR tersebut tidak diakses oleh pihak yang tidak berwenang.</span>
                </p>
            </div>
        </div>
    </div>

    <!-- Section 6: Batasan Tanggung Jawab -->
    <div class="mb-8 bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-gray-900 to-black p-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-[#FFC50F] rounded-lg flex items-center justify-center">
                    <span class="font-black text-black text-lg">6</span>
                </div>
                <h2 class="text-2xl font-black text-white">Batasan Tanggung Jawab</h2>
            </div>
        </div>
        <div class="p-6 space-y-4">
            <div>
                <p class="text-gray-700 leading-relaxed flex items-start gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F] mt-1 flex-shrink-0">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    <span><strong>6.1.</strong> RAVCONNECT tidak menjamin koneksi internet nirkabel akan selalu tersedia tanpa gangguan di setiap lokasi dan waktu.</span>
                </p>
            </div>
            <div>
                <p class="text-gray-700 leading-relaxed flex items-start gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F] mt-1 flex-shrink-0">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    <span><strong>6.2.</strong> Tanggung jawab maksimum RAVCONNECT atas setiap klaim terbatas pada jumlah harga pembelian eSIM yang bersangkutan.</span>
                </p>
            </div>
        </div>
    </div>

    <!-- Contact Card -->
    <div class="p-6 bg-gradient-to-r from-[#FFC50F] to-[#FFD700] rounded-2xl shadow-lg">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-black rounded-full flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                </svg>
            </div>
            <div>
                <h3 class="font-black text-black text-lg mb-1">Ada Pertanyaan?</h3>
                <p class="text-black/80 text-sm mb-3">Hubungi kami jika Anda memiliki pertanyaan atau membutuhkan bantuan lebih lanjut.</p>
                <a href="{{ url('/contact') }}" class="inline-flex items-center gap-2 px-5 py-2 bg-black text-white rounded-xl font-bold text-sm hover:bg-gray-900 transition-all hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    Contact Support
                </a>
            </div>
        </div>
    </div>

</div>

<style>
    [x-cloak] { display: none !important; }
    
    /* Smooth scrolling */
    html {
        scroll-behavior: smooth;
    }
    
    /* Sticky navigation shadow on scroll */
    .sticky {
        transition: box-shadow 0.3s ease;
    }
</style>

@endsection
