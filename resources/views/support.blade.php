@extends('layouts.app')
@section('title', 'Support & Panduan eSIM - RAVCONNECT')
@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
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

<body class="text-dark">
    <!-- Animated Background Elements -->
    <div class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10">
        <div class="absolute top-10 left-10 w-20 h-20 rounded-full bg-yellow-500/20 blur-xl floating"></div>
        <div class="absolute top-1/3 right-20 w-16 h-16 rounded-full bg-yellow-500/20 blur-xl floating" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-20 left-1/4 w-24 h-24 rounded-full bg-yellow-500/20 blur-xl floating" style="animation-delay: 2s;"></div>
        <div class="absolute bottom-40 right-1/3 w-12 h-12 rounded-full bg-yellow-500/20 blur-xl floating" style="animation-delay: 1.5s;"></div>
    </div>

    <div class="max-w-6xl mx-auto py-10 px-4">
        <!-- Hero Section -->
        <div class="text-center mb-16 mt-8">
            <h1 class="text-5xl md:text-6xl font-black mb-6 gradient-text">Panduan & Support eSIM</h1>
            <p class="text-xl text-muted max-w-2xl mx-auto">Panduan lengkap untuk mengaktifkan dan menggunakan teknologi eSIM. Cepat, mudah, dan revolusioner.</p>

            <div class="mt-10 flex justify-center">
                <div class="relative w-64 h-64 bg-gradient-to-br from-[#FFC50F] to-[#FFD700] rounded-2xl p-1 glow pulse">
                    <div class="w-full h-full bg-white rounded-2xl flex items-center justify-center">
                        <div class="text-center p-4">
                            <div class="text-4xl mb-2">📱</div>
                            <h3 class="font-bold text-yellow-600">SIM Digital</h3>
                            <p class="text-sm text-muted mt-2">Tidak perlu kartu fisik</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activation Steps -->
        <!-- Activation Steps -->
<div class="mb-20">
    <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 gradient-text">Cara Mengaktifkan eSIM Anda</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Android Card -->
        <div class="step-card rounded-2xl p-6 glow">
            <div class="flex items-center mb-6">
                <div class="w-14 h-14 rounded-full bg-green-500 flex items-center justify-center mr-4">
                    <i class="fab fa-android text-2xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold text-dark">Aktivasi Android</h3>
            </div>

            <div class="space-y-6">
                <div class="flex items-start">
                    <div class="w-8 h-8 rounded-full bg-yellow-500 flex-shrink-0 flex items-center justify-center mr-4 mt-1">
                        <span class="font-bold text-white">1</span>
                    </div>
                    <p class="text-dark">Buka <span class="text-yellow-600 font-semibold">Settings → Connections → SIM Manager</span></p>
                </div>

                <div class="flex items-start">
                    <div class="w-8 h-8 rounded-full bg-yellow-500 flex-shrink-0 flex items-center justify-center mr-4 mt-1">
                        <span class="font-bold text-white">2</span>
                    </div>
                    <p class="text-dark">Pilih <span class="text-yellow-600 font-semibold">Add Mobile Plan → Scan QR Code</span></p>
                </div>

                <div class="flex items-start">
                    <div class="w-8 h-8 rounded-full bg-yellow-500 flex-shrink-0 flex items-center justify-center mr-4 mt-1">
                        <span class="font-bold text-white">3</span>
                    </div>
                    <p class="text-dark">Konfirmasi dan selesai! eSIM Anda sekarang aktif.</p>
                </div>
            </div>

            <!-- YouTube Video Widget for Android -->
            <div class="mt-8 rounded-xl overflow-hidden shadow-lg">
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
            </div>
        </div>

        <!-- iPhone Card -->
        <div class="step-card rounded-2xl p-6 glow">
            <div class="flex items-center mb-6">
                <div class="w-14 h-14 rounded-full bg-gray-800 flex items-center justify-center mr-4">
                    <i class="fab fa-apple text-2xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold text-dark">Aktivasi iPhone</h3>
            </div>

            <div class="space-y-6">
                <div class="flex items-start">
                    <div class="w-8 h-8 rounded-full bg-yellow-500 flex-shrink-0 flex items-center justify-center mr-4 mt-1">
                        <span class="font-bold text-white">1</span>
                    </div>
                    <p class="text-dark">Pergi ke <span class="text-yellow-600 font-semibold">Settings → Cellular → Add eSIM</span></p>
                </div>

                <div class="flex items-start">
                    <div class="w-8 h-8 rounded-full bg-yellow-500 flex-shrink-0 flex items-center justify-center mr-4 mt-1">
                        <span class="font-bold text-white">2</span>
                    </div>
                    <p class="text-dark">Scan kode QR atau pilih <span class="text-yellow-600 font-semibold">Enter Details Manually</span></p>
                </div>

                <div class="flex items-start">
                    <div class="w-8 h-8 rounded-full bg-yellow-500 flex-shrink-0 flex items-center justify-center mr-4 mt-1">
                        <span class="font-bold text-white">3</span>
                    </div>
                    <p class="text-dark">Isi <span class="text-yellow-600 font-semibold">SM-DP+ Address & Activation Code</span>, lalu selesai!</p>
                </div>
            </div>

            <!-- YouTube Video Widget for iPhone -->
            <div class="mt-8 rounded-xl overflow-hidden shadow-lg">
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
            </div>
        </div>
    </div>
</div>


        <!-- QR Code Visualizer -->
        <div class="mb-20 bg-pattern rounded-2xl p-8 border border-yellow-500/30 bg-yellow-50">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-6 gradient-text">Scan untuk Aktivasi</h2>
            <p class="text-center text-muted mb-10 max-w-2xl mx-auto">Arahkan kamera ponsel Anda ke kode QR di bawah untuk mengaktifkan eSIM dengan cepat. Pastikan Anda terhubung ke Wi-Fi.</p>

            <div class="flex flex-col md:flex-row items-center justify-center gap-10">
                <div class="qr-code bg-white p-4 rounded-2xl w-64 h-64 flex items-center justify-center shadow-lg">
                    <!-- QR Code Placeholder -->
                    <div class="w-full h-full bg-gradient-to-br from-yellow-100 to-yellow-200 rounded-xl flex items-center justify-center border border-yellow-300">
                        <div class="text-center">
                            <div class="text-4xl mb-2">📲</div>
                            <p class="text-yellow-600 font-bold">RAVCONNECT eSIM</p>
                            <p class="text-muted text-xs mt-2">Scan dengan ponsel Anda</p>
                        </div>
                    </div>
                </div>

                <div class="max-w-md">
                    <h3 class="text-xl font-bold text-yellow-600 mb-4">Aktivasi Manual</h3>
                    <p class="text-muted mb-6">Jika scanning tidak berhasil, Anda dapat memasukkan detail ini secara manual:</p>

                    <div class="space-y-4">
                        <div>
                            <p class="text-yellow-600 font-semibold">SM-DP+ Address:</p>
                            <div class="bg-white p-3 rounded-lg mt-1 font-mono text-sm border border-yellow-200">ravconnect.com/esim</div>
                        </div>
                        <div>
                            <p class="text-yellow-600 font-semibold">Activation Code:</p>
                            <div class="bg-white p-3 rounded-lg mt-1 font-mono text-sm border border-yellow-200">RAV-ESIM-2024-XXXX</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Support Section -->
        <div class="mb-20">
            <div class="bg-gradient-to-r from-yellow-500/20 to-yellow-500/10 rounded-2xl p-8 border border-yellow-500/30 flex flex-col md:flex-row items-center">
                <div class="flex-1 mb-6 md:mb-0 md:pr-8">
                    <h3 class="text-2xl font-bold text-yellow-600 mb-4">Butuh Bantuan Lebih Lanjut?</h3>
                    <p class="text-muted mb-6">Tim support kami tersedia 24/7 untuk membantu masalah aktivasi, pemecahan masalah, atau pertanyaan tentang layanan eSIM Anda.</p>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="https://wa.me/6281234567890" target="_blank" class="bg-green-500 hover:bg-green-600 text-white font-bold px-6 py-3 rounded-xl transition-all flex items-center justify-center gap-2">
                            <i class="fab fa-whatsapp text-xl"></i> WhatsApp Support
                        </a>
                        <a href="tel:+6281234567890" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold px-6 py-3 rounded-xl transition-all flex items-center justify-center gap-2">
                            <i class="fas fa-phone-alt"></i> Telepon Support
                        </a>
                    </div>
                </div>

                <div class="flex-shrink-0">
                    <div class="relative">
                        <div class="w-40 h-40 bg-gradient-to-br from-yellow-500 to-yellow-300 rounded-full flex items-center justify-center glow">
                            <div class="w-36 h-36 bg-white rounded-full flex items-center justify-center">
                                <i class="fas fa-headset text-5xl text-yellow-600"></i>
                            </div>
                        </div>
                        <div class="absolute -top-2 -right-2 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                            Online
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Supported Devices -->
        <div class="mb-20">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 gradient-text">Perangkat yang Didukung</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- iPhone -->
                <div class="device-card rounded-2xl p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-xl bg-gray-800 flex items-center justify-center mr-4">
                            <i class="fab fa-apple text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-dark">iPhone</h3>
                    </div>
                    <p class="text-muted text-sm mb-4">Semua model dari iPhone XR dan yang lebih baru mendukung teknologi eSIM.</p>
                    <div class="h-40 overflow-y-auto pr-2">
                        <ul class="text-sm text-dark space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-check text-yellow-500 mr-2 mt-1"></i>
                                <span>iPhone XR, XS, XS Max</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-yellow-500 mr-2 mt-1"></i>
                                <span>iPhone 11, 11 Pro, 11 Pro Max</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-yellow-500 mr-2 mt-1"></i>
                                <span>iPhone SE 2 (2020), SE 3 (2022)</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-yellow-500 mr-2 mt-1"></i>
                                <span>iPhone 12, 12 Mini, 12 Pro, 12 Pro Max</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-yellow-500 mr-2 mt-1"></i>
                                <span>iPhone 13, 13 Mini, 13 Pro, 13 Pro Max</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-yellow-500 mr-2 mt-1"></i>
                                <span>iPhone 14, 14 Plus, 14 Pro, 14 Pro Max</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-yellow-500 mr-2 mt-1"></i>
                                <span>iPhone 15, 15 Plus, 15 Pro, 15 Pro Max</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-yellow-500 mr-2 mt-1"></i>
                                <span>iPhone 16, 16 Plus, 16 Pro, 16 Pro Max</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Samsung -->
                <div class="device-card rounded-2xl p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-500 flex items-center justify-center mr-4">
                            <i class="fab fa-android text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-dark">Samsung Galaxy</h3>
                    </div>
                    <p class="text-muted text-sm mb-4">Model Samsung Galaxy terpilih dengan dukungan eSIM.</p>
                    <div class="h-40 overflow-y-auto pr-2">
                        <ul class="text-sm text-dark space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-check text-yellow-500 mr-2 mt-1"></i>
                                <span>S20, S20+, S20+ 5G, S20 Ultra</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-yellow-500 mr-2 mt-1"></i>
                                <span>S21, S21+ 5G, S21+ Ultra 5G</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-yellow-500 mr-2 mt-1"></i>
                                <span>S22, S22+, S22 Ultra</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-yellow-500 mr-2 mt-1"></i>
                                <span>S23, S23+, S23 Ultra</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-yellow-500 mr-2 mt-1"></i>
                                <span>S24, S24+, S24 Ultra, S24 FE</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-yellow-500 mr-2 mt-1"></i>
                                <span>Note 20, Note 20 Ultra 5G</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-yellow-500 mr-2 mt-1"></i>
                                <span>Fold, Z Fold2 5G, Z Fold3 5G</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-yellow-500 mr-2 mt-1"></i>
                                <span>Z Fold4, Z Fold5 5G, Z Fold6 5G</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Other Brands -->
                <div class="device-card rounded-2xl p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-xl bg-red-500 flex items-center justify-center mr-4">
                            <i class="fas fa-mobile-alt text-xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-dark">Merek Lainnya</h3>
                    </div>
                    <p class="text-muted text-sm mb-4">Oppo, Xiaomi, Vivo dan perangkat lain yang didukung.</p>
                    <div class="h-40 overflow-y-auto pr-2">
                        <ul class="text-sm text-dark space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-check text-yellow-500 mr-2 mt-1"></i>
                                <span>Oppo Find X3, X3 Pro, X5, X5 Pro</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-yellow-500 mr-2 mt-1"></i>
                                <span>Oppo Find N2 Flip, N3, N3 Flip</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-yellow-500 mr-2 mt-1"></i>
                                <span>Xiaomi 12T Pro, 13, 13 Pro, 14</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-yellow-500 mr-2 mt-1"></i>
                                <span>Redmi Note 13 Pro+, 14 Pro+</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-yellow-500 mr-2 mt-1"></i>
                                <span>Vivo X80 Pro, X90 Pro, X100 Pro</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-yellow-500 mr-2 mt-1"></i>
                                <span>Vivo V29, V29 Lite, V40, V40 Lite</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-yellow-500 mr-2 mt-1"></i>
                                <span>Google Pixel 4 dan yang lebih baru</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-yellow-500 mr-2 mt-1"></i>
                                <span>Huawei P40, P50 series</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mt-6 text-center">
                <p class="text-xs text-muted">*Periksa situs web resmi perangkat untuk informasi kompatibilitas eSIM terbaru.</p>
            </div>
        </div>

        <!-- Benefits Section -->
        <div class="mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 gradient-text">Mengapa Memilih eSIM RAVCONNECT?</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gradient-to-br from-yellow-500/20 to-transparent rounded-2xl p-6 border border-yellow-500/20 text-center">
                    <div class="w-16 h-16 rounded-full bg-yellow-500/20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-bolt text-2xl text-yellow-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-2">Aktivasi Instan</h3>
                    <p class="text-muted">Dapatkan koneksi segera setelah pembelian. Tidak perlu menunggu pengiriman.</p>
                </div>

                <div class="bg-gradient-to-br from-yellow-500/20 to-transparent rounded-2xl p-6 border border-yellow-500/20 text-center">
                    <div class="w-16 h-16 rounded-full bg-yellow-500/20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-globe text-2xl text-yellow-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-2">Cakupan Global</h3>
                    <p class="text-muted">Tetap terhubung di lebih dari 190 negara dengan jaringan partner kami.</p>
                </div>

                <div class="bg-gradient-to-br from-yellow-500/20 to-transparent rounded-2xl p-6 border border-yellow-500/20 text-center">
                    <div class="w-16 h-16 rounded-full bg-yellow-500/20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-2xl text-yellow-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-2">Aman & Terpercaya</h3>
                    <p class="text-muted">Koneksi Anda dienkripsi dan dilindungi dengan keamanan tingkat perusahaan.</p>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 gradient-text">Siap untuk Terhubung?</h2>
            <p class="text-xl text-muted mb-8 max-w-2xl mx-auto">Rasakan masa depan konektivitas seluler dengan RAVCONNECT eSIM. Aktivasi instan, cakupan global, dan dukungan 24/7.</p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="/" class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-black font-bold px-8 py-4 rounded-2xl shadow-xl hover:from-yellow-400 hover:to-yellow-500 transition-all text-lg flex items-center justify-center gap-2">
                    <i class="fas fa-shopping-cart"></i> Lihat Paket eSIM
                </a>
                <a href="#support" class="bg-transparent border-2 border-yellow-500 text-yellow-600 font-bold px-8 py-4 rounded-2xl hover:bg-yellow-500/10 transition-all text-lg flex items-center justify-center gap-2">
                    <i class="fas fa-question-circle"></i> FAQ
                </a>
            </div>
        </div>
    </div>

    <script>
        // Simple animation for cards on scroll
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.device-card, .step-card');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = 1;
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });

            cards.forEach(card => {
                card.style.opacity = 0;
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                observer.observe(card);
            });
        });
    </script>
</body>
@endsection
