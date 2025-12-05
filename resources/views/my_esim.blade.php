@extends('layouts.app')

@section('title', 'My eSIM - RAVCONNECT')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fef7e0 0%, #fff9e6 100%);
            min-height: 100vh;
            color: #333;
        }

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0% { transform: translate(0, 0px); }
            50% { transform: translate(0, -15px); }
            100% { transform: translate(0, -0px); }
        }

        .glow {
            box-shadow: 0 0 15px rgba(255, 197, 15, 0.5);
        }

        .device-card {
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 197, 15, 0.3);
        }

        .device-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(255, 197, 15, 0.2);
            border-color: rgba(255, 197, 15, 0.5);
        }

        .step-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 197, 15, 0.3);
            transition: all 0.3s ease;
        }

        .step-card:hover {
            transform: scale(1.02);
            border-color: rgba(255, 197, 15, 0.5);
        }

        .gradient-text {
            background: linear-gradient(90deg, #FFC50F, #FFD700, #FFEC8B);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .bg-pattern {
            background-image: radial-gradient(circle at 25px 25px, rgba(255, 197, 15, 0.15) 2%, transparent 2.5%), radial-gradient(circle at 75px 75px, rgba(255, 197, 15, 0.1) 2%, transparent 2.5%);
            background-size: 100px 100px;
        }

        .qr-code {
            filter: drop-shadow(0 0 10px rgba(255, 197, 15, 0.5));
        }

        .text-dark {
            color: #333;
        }

        .text-muted {
            color: #666;
        }
    </style>
<!-- Hero Section -->
<section class="relative py-16 bg-gradient-to-br from-[#FFC50F] via-[#FFD700] to-[#FFA500] overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-6xl mx-auto px-4 relative z-10">
        <div class="text-center">
            <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full border-2 border-white/40 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                    <rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect>
                    <line x1="12" y1="18" x2="12.01" y2="18"></line>
                </svg>
                <span class="text-black font-bold text-sm">Digital Travel Companions</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-black text-black mb-3">My eSIM Collection</h1>
            <p class="text-lg text-black/80">Manage and activate your eSIM cards</p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="relative py-12 bg-gradient-to-b from-gray-50 to-white min-h-screen">
    <div class="max-w-6xl mx-auto px-4">

        @php
            $esim = $esims->first();
        @endphp

        @if(!$esim)
            <!-- Empty State -->
            <div class="max-w-xl mx-auto">
                <div class="bg-gradient-to-br from-gray-900 to-black rounded-3xl shadow-2xl border-2 border-[#FFC50F]/30 p-12 text-center">
                    <div class="w-24 h-24 bg-gradient-to-br from-[#FFC50F] to-[#FFD700] rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <svg class="w-12 h-12 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-black mb-4 text-white">No eSIM Yet</h2>
                    <p class="text-gray-400 mb-8 text-lg">Start your journey by purchasing your first eSIM</p>
                    <a href="/" class="inline-flex items-center gap-2 bg-gradient-to-r from-[#FFC50F] to-[#FFD700] text-black px-8 py-4 rounded-2xl font-black text-lg shadow-xl hover:shadow-2xl hover:scale-105 transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        Shop eSIM Now
                    </a>
                </div>
            </div>
        @else
           @if($esims->count())
    <div class="max-w-2xl mx-auto mb-8">
        <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-2 border-blue-200 rounded-2xl p-5 shadow-lg">
            <div class="flex items-start gap-4">
                <!-- Icon -->
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="16" x2="12" y2="12"></line>
                            <line x1="12" y1="8" x2="12.01" y2="8"></line>
                        </svg>
                    </div>
                </div>

                <!-- Content -->
                <div class="flex-1">
                    <h3 class="font-black text-gray-900 mb-2 flex items-center gap-2">
                        <span>Informasi Penting</span>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-blue-500 text-white">
                            Important
                        </span>
                    </h3>
                    <p class="text-sm text-gray-700 leading-relaxed">
                        Harap <span class="font-bold text-blue-700">simpan kode ICCID eSIM</span> Anda untuk info garansi, sisa kuota, dan layanan lainnya.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endif

            <!-- eSIM Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                @foreach($esims as $esim)
                    <div class="group">
                        <!-- Credit Card Style eSIM - Responsive Height -->
                        <div class="relative rounded-3xl shadow-xl transition-all duration-500 hover:scale-[1.02] hover:shadow-2xl hover:shadow-[#FFC50F]/20">

                            <!-- Card Background with Country Image -->
                            <div class="absolute inset-0 rounded-3xl overflow-hidden">
                                <!-- Static Bali Background Image -->
                                <div class="absolute inset-0 bg-cover bg-center opacity-40 transition-opacity group-hover:opacity-50"
                                     style="background-image: url('{{ asset('resources/assets/img/bg-card-bali.jpg') }}');">
                                </div>
                                <!-- Gradient Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-br from-gray-900 via-black/90 to-gray-800"></div>
                                <!-- Mesh Pattern -->
                                <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, #FFC50F 1px, transparent 0); background-size: 32px 32px;"></div>
                            </div>

                            <!-- Card Content -->
                            <div class="relative flex flex-col p-5 md:p-6 z-10">

                                <!-- Card Header -->
                                <div class="flex justify-between items-start mb-4">
                                    <div class="flex items-center gap-2">
                                        <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-[#FFC50F] to-[#FFD700] rounded-xl flex items-center justify-center shadow-lg">
                                            <svg class="w-5 h-5 md:w-6 md:h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-xs text-gray-300 uppercase tracking-wider">eSIM Card</div>
                                            <div class="text-xs md:text-sm font-bold text-[#FFC50F]">
                                                SCAN NOW
                                                {{-- {{ $esim->is_active ? 'Active' : 'Inactive' }} --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-lg md:text-xl font-black text-white">{{ $esim->product->country->name ?? '-' }}</div>
                                    </div>
                                </div>

                                <!-- QR Code Section -->
                                <div class="flex justify-center mb-4">
                                    <div class="relative">
                                        <div class="absolute inset-0 bg-[#FFC50F] blur-xl opacity-50 rounded-2xl"></div>
                                        <img src="{{ asset(ltrim($esim->qr_image_url, '/')) }}" alt="QR eSIM" class="relative w-24 h-24 md:w-32 md:h-32 object-contain rounded-2xl bg-white p-2 shadow-2xl border-2 border-[#FFC50F]/50">
                                    </div>
                                </div>


                                <!-- Product Info -->
                                <div class="mb-3">
                                    <h3 class="text-base md:text-lg font-black text-white mb-1 truncate">{{ $esim->product->name ?? '-' }}</h3>
                                    <div class="flex items-center gap-3 text-xs text-gray-300">
                                        <span class="flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                            </svg>
                                            {{ $esim->product->quota >= 1024 ? number_format($esim->product->quota / 1024, 2) . ' GB' : $esim->product->quota . ' MB' }}
                                        </span>
                                        <span class="flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            {{ $esim->product->validity }} Days
                                        </span>
                                    </div>
                                </div>

                                <!-- Technical Details -->
                                <div class="space-y-2 text-xs mb-3">
                                    <div class="bg-black/30 backdrop-blur-sm rounded-lg p-2 border border-gray-700/50">
                                        <div class="text-gray-400 mb-1">ICCID</div>
                                        <div class="flex items-center justify-between gap-2">
                                            <div class="font-mono text-white text-[10px] md:text-xs truncate flex-1">{{ $esim->iccid }}</div>
                                            <button onclick="copyText('{{ $esim->iccid }}', this)" class="text-gray-400 hover:text-[#FFC50F] transition-colors flex-shrink-0" title="Copy ICCID">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="bg-black/30 backdrop-blur-sm rounded-lg p-2 border border-gray-700/50">
                                        <div class="text-gray-400 mb-1">Activation Code</div>
                                        <div class="flex items-center justify-between gap-2">
                                            <div class="font-mono text-white text-[10px] md:text-xs truncate flex-1">{{ $esim->activation_code }}</div>
                                            <button onclick="copyText('{{ $esim->activation_code }}', this)" class="text-gray-400 hover:text-[#FFC50F] transition-colors flex-shrink-0" title="Copy Activation Code">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="bg-black/30 backdrop-blur-sm rounded-lg p-2 border border-gray-700/50">
                                        <div class="text-gray-400 mb-1">SM-DP+</div>
                                        <div class="flex items-center justify-between gap-2">
                                            <div class="font-mono text-white text-[10px] md:text-xs truncate flex-1">{{ $esim->smdp_plus }}</div>
                                            <button onclick="copyText('{{ $esim->smdp_plus }}', this)" class="text-gray-400 hover:text-[#FFC50F] transition-colors flex-shrink-0" title="Copy SM-DP+">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="grid grid-cols-2 gap-2">
                                    <a href="{{ $esim->qr_image_url }}" download class="flex items-center justify-center gap-1.5 bg-gradient-to-r from-[#FFC50F] to-[#FFD700] text-black px-3 py-2.5 rounded-xl font-bold text-xs md:text-sm shadow-lg hover:shadow-xl transition-all hover:scale-105">
                                        <svg class="w-3.5 h-3.5 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4"></path>
                                        </svg>
                                        <span class="hidden sm:inline">Download QR</span>
                                        <span class="sm:hidden">Download</span>
                                    </a>
                                    <button onclick="copyAllDetails({{ json_encode([
                                        'ICCID' => $esim->iccid,
                                        'Activation Code' => $esim->activation_code,
                                        'SM-DP+' => $esim->smdp_plus
                                    ]) }})" class="flex items-center justify-center gap-1.5 bg-gray-800 hover:bg-gray-700 text-white px-3 py-2.5 rounded-xl font-bold text-xs md:text-sm border border-gray-600 transition-all hover:scale-105 shadow-lg">
                                        <svg class="w-3.5 h-3.5 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                        </svg>
                                        Copy All
                                    </button>
                                </div>
                            </div>

                            <!-- Card Shine Effect -->
                            <div class="absolute inset-0 rounded-3xl overflow-hidden pointer-events-none">
                                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500 bg-gradient-to-r from-transparent via-white/5 to-transparent translate-x-[-200%] group-hover:translate-x-[200%] transition-transform duration-1000"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Activation Tutorial Section -->
        <div class="mt-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-3">Cara Mengaktifkan eSIM Anda</h2>
                <p class="text-gray-600 text-lg">Ikuti langkah ini dengan tepat untuk mengaktfikan eSIM</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Android Card -->
                <div class="step-card rounded-2xl p-6 glow">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 rounded-full bg-green-500 flex items-center justify-center mr-4">
                            <i class="fab fa-android text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-dark">Aktivasi Android</h3>
                    </div>

                  

                    <!-- Installation Steps -->
                    <div class="mb-6">
                        <h4 class="font-bold text-yellow-600 mb-4 flex items-center gap-2">
                            <i class="fas fa-download"></i>
                            Langkah Aktivasi di Android
                        </h4>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="w-8 h-8 rounded-full bg-yellow-500 shrink-0 flex items-center justify-center mr-4 mt-1">
                                    <span class="font-bold text-white">1</span>
                                </div>
                                <div>
                                    <p class="text-dark">Masuk menu <span class="text-yellow-600 font-semibold">'Pengaturan Telepon'</span> lalu pilih <span class="text-yellow-600 font-semibold">'Koneksi'</span></p>
                                    <p class="text-xs text-muted italic mt-1">Go to Settings and Tap Connections</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="w-8 h-8 rounded-full bg-yellow-500 shrink-0 flex items-center justify-center mr-4 mt-1">
                                    <span class="font-bold text-white">2</span>
                                </div>
                                <p class="text-dark">Pilih <span class="text-yellow-600 font-semibold">"Manajer SIM"</span></p>
                            </div>

                            <div class="flex items-start">
                                <div class="w-8 h-8 rounded-full bg-yellow-500 shrink-0 flex items-center justify-center mr-4 mt-1">
                                    <span class="font-bold text-white">3</span>
                                </div>
                                <p class="text-dark">Pilih <span class="text-yellow-600 font-semibold">'Tambah Paket Seluler'</span></p>
                            </div>

                            <div class="flex items-start">
                                <div class="w-8 h-8 rounded-full bg-yellow-500 shrink-0 flex items-center justify-center mr-4 mt-1">
                                    <span class="font-bold text-white">4</span>
                                </div>
                                <p class="text-dark">Pilih <span class="text-yellow-600 font-semibold">'Pindai Kode QR'</span></p>
                            </div>

                            <div class="flex items-start">
                                <div class="w-8 h-8 rounded-full bg-yellow-500 shrink-0 flex items-center justify-center mr-4 mt-1">
                                    <span class="font-bold text-white">5</span>
                                </div>
                                <p class="text-dark">Posisikan QR Code didalam garis panduan untuk memindainya</p>
                            </div>

                            <div class="flex items-start">
                                <div class="w-8 h-8 rounded-full bg-yellow-500 shrink-0 flex items-center justify-center mr-4 mt-1">
                                    <span class="font-bold text-white">6</span>
                                </div>
                                <p class="text-dark">Begitu eSIM telah terdeteksi, Tekan <span class="text-yellow-600 font-semibold">'Tambah'</span></p>
                            </div>

                            <div class="flex items-start">
                                <div class="w-8 h-8 rounded-full bg-yellow-500 shrink-0 flex items-center justify-center mr-4 mt-1">
                                    <span class="font-bold text-white">7</span>
                                </div>
                                <p class="text-dark">Ketika eSIM telah terdaftar, Tekan <span class="text-yellow-600 font-semibold">'OK'</span> untuk mengaktifkan eSIM</p>
                            </div>

                            <div class="flex items-start">
                                <div class="w-8 h-8 rounded-full bg-yellow-500 shrink-0 flex items-center justify-center mr-4 mt-1">
                                    <span class="font-bold text-white">8</span>
                                </div>
                                <p class="text-dark">Begitu eSIM telah aktif, akan tampil didalam menu <span class="text-yellow-600 font-semibold">'Pengelola Kartu eSIM'</span></p>
                            </div>
                        </div>
                    </div>

                    <!-- After Installation -->
                    <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-lg">
                        <h4 class="font-bold text-green-800 mb-3 flex items-center gap-2">
                            <i class="fas fa-check-circle"></i>
                            Setelah Pemasangan (After Install)
                        </h4>
                        <div class="flex items-start gap-3 text-sm text-green-800">
                            <i class="fas fa-toggle-on text-2xl text-green-600 mt-1"></i>
                            <div>
                                <p class="font-semibold mb-1">Nyalakan/ON Data Roaming</p>
                                <p>eSIM siap digunakan! <span class="font-bold">Success ✓</span></p>
                            </div>
                        </div>
                    </div>

                    <!-- YouTube Video Widget for Android (Optional) -->
                    {{-- <div class="mt-8 rounded-xl overflow-hidden shadow-lg">
                        <div class="relative" style="padding-bottom: 56.25%; height: 0;">
                            <iframe
                                class="absolute top-0 left-0 w-full h-full"
                                src="https://www.youtube.com/embed/geYsQ3nc0fc"
                                title="Tutorial Aktivasi eSIM Android"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div> --}}
                </div>

                <!-- iPhone Card -->
                <div class="step-card rounded-2xl p-6 glow">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 rounded-full bg-gray-800 flex items-center justify-center mr-4">
                            <i class="fab fa-apple text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-dark">Aktivasi iPhone</h3>
                    </div>

                    <!-- Important Part -->
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-lg mb-6">
                        <h4 class="font-bold text-red-800 mb-3 flex items-center gap-2">
                            <i class="fas fa-exclamation-triangle"></i>
                            Bagian Penting 
                            
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-extrabold bg-blue-600 text-white shadow-md">
                                Important
                            </span>
                            
                            
                        </h4>
                        <ul class="space-y-2 text-sm text-red-800">
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check-circle mt-1 text-red-600"></i>
                                <span>Lepas <strong>SIM fisik</strong> yang terpasang</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check-circle mt-1 text-red-600"></i>
                                <span><strong>OFF/DELETE</strong> eSIM sebelumnya/lainnya</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check-circle mt-1 text-red-600"></i>
                                <span><strong>OFF</strong> mode hemat baterai</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check-circle mt-1 text-red-600"></i>
                                <span>Terhubung ke <strong>WiFi/Hotspot</strong> aktif</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Installation Steps -->
                    <div class="mb-6">
                        <h4 class="font-bold text-yellow-600 mb-4 flex items-center gap-2">
                            <i class="fas fa-download"></i>
                            Bagian Pemasangan 
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-extrabold bg-blue-600 text-white shadow-md">
                                Installation Part
                            </span>
                            
                        </h4>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="w-8 h-8 rounded-full bg-yellow-500 shrink-0 flex items-center justify-center mr-4 mt-1">
                                    <span class="font-bold text-white">1</span>
                                </div>
                                <p class="text-dark">Buka <span class="text-yellow-600 font-semibold">Pengaturan (Settings)</span></p>
                            </div>

                            <div class="flex items-start">
                                <div class="w-8 h-8 rounded-full bg-yellow-500 shrink-0 flex items-center justify-center mr-4 mt-1">
                                    <span class="font-bold text-white">2</span>
                                </div>
                                <p class="text-dark">Pilih <span class="text-yellow-600 font-semibold">Seluler (Cellular)</span></p>
                            </div>

                            <div class="flex items-start">
                                <div class="w-8 h-8 rounded-full bg-yellow-500 shrink-0 flex items-center justify-center mr-4 mt-1">
                                    <span class="font-bold text-white">3</span>
                                </div>
                                <p class="text-dark">Klik <span class="text-yellow-600 font-semibold">Tambah/Atur Seluler (Add eSIM/Set Up Cellular)</span></p>
                            </div>

                            <div class="flex items-start">
                                <div class="w-8 h-8 rounded-full bg-yellow-500 shrink-0 flex items-center justify-center mr-4 mt-1">
                                    <span class="font-bold text-white">4</span>
                                </div>
                                <p class="text-dark">Pilih <span class="text-yellow-600 font-semibold">Gunakan/Use QR CODE</span> dan scan kode QR dari akun Anda</p>
                            </div>
                        </div>
                    </div>

                    <!-- After Installation -->
                    <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-lg">
                        <h4 class="font-bold text-green-800 mb-3 flex items-center gap-2">
                            <i class="fas fa-check-circle"></i>
                            Setelah Pemasangan 
                            
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-extrabold bg-blue-600 text-white shadow-md">
                                After Install
                            </span>
                            
                            
                        </h4>
                        <div class="flex items-start gap-3 text-sm text-green-800">
                            <i class="fas fa-toggle-on text-2xl text-green-600 mt-1"></i>
                            <div>
                                <p class="font-semibold mb-1">Nyalakan/ON Data Roaming</p>
                                <p>eSIM siap digunakan! <span class="font-bold">Success ✓</span></p>
                            </div>
                        </div>
                    </div>

                    <!-- YouTube Video Widget for iPhone (Optional) -->
                    {{-- <div class="mt-8 rounded-xl overflow-hidden shadow-lg">
                        <div class="relative" style="padding-bottom: 56.25%; height: 0;">
                            <iframe
                                class="absolute top-0 left-0 w-full h-full"
                                src="https://www.youtube.com/embed/Dl45LSLK4_8"
                                title="Tutorial Aktivasi eSIM iPhone"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function copyText(text, button) {
    navigator.clipboard.writeText(text).then(() => {
        // Change icon to checkmark temporarily
        const originalHTML = button.innerHTML;
        button.innerHTML = `
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        `;
        button.classList.add('text-[#FFC50F]');

        // Create toast notification
        const toast = document.createElement('div');
        toast.className = 'fixed top-4 right-4 bg-gradient-to-r from-[#FFC50F] to-[#FFD700] text-black px-6 py-3 rounded-xl shadow-2xl font-bold z-50 animate-slide-in';
        toast.innerHTML = `
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Copied to clipboard!
            </div>
        `;
        document.body.appendChild(toast);

        // Reset icon after 2 seconds
        setTimeout(() => {
            button.innerHTML = originalHTML;
            button.classList.remove('text-[#FFC50F]');
            toast.remove();
        }, 2000);
    });
}

function copyAllDetails(details) {
    const text = Object.entries(details).map(([key, value]) => `${key}: ${value}`).join('\n');
    navigator.clipboard.writeText(text).then(() => {
        const toast = document.createElement('div');
        toast.className = 'fixed top-4 right-4 bg-gradient-to-r from-[#FFC50F] to-[#FFD700] text-black px-6 py-3 rounded-xl shadow-2xl font-bold z-50 animate-slide-in';
        toast.innerHTML = `
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                All details copied!
            </div>
        `;
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    });
}
</script>

<style>
@keyframes slide-in {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

.animate-slide-in {
    animation: slide-in 0.3s ease-out;
}
</style>

@endsection
