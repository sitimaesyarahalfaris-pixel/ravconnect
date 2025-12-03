<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAVCONNECT - eSIM Global Roaming anti ribet</title>
        <!-- Styles / Scripts -->

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="icon" href="{{asset('resources\assets\img\Logo-transparent 1.png')}}" type="image/x-icon">

        <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');

        * {
            font-family: 'Inter', sans-serif;
        }

        h1 {
            font-size: 3.5rem;
            font-weight: 900;
            line-height: 1.1;
        }

        h2 {
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1.2;
        }

        h3 {
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1.3;
        }

        h4 {
            font-size: 1.25rem;
            font-weight: 600;
            line-height: 1.4;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }
            h2 {
                font-size: 2rem;
            }
        }

        .hero-gradient {
            background: linear-gradient(135deg, #FFC50F 0%, #FFD700 50%, #FFA500 100%);
        }

        .card-shadow-yellow:hover {
            box-shadow: 0 20px 60px rgba(255, 197, 15, 0.4);
        }

        .decorative-circle {
            filter: blur(80px);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(255, 197, 15, 0.5); }
            50% { box-shadow: 0 0 40px rgba(255, 197, 15, 0.8); }
        }

        .pulse-glow {
            animation: pulse-glow 2s ease-in-out infinite;
        }

        .tilt-card {
            transform: perspective(1000px) rotateY(-5deg);
            transition: all 0.4s ease;
        }

        .tilt-card:hover {
            transform: perspective(1000px) rotateY(0deg) scale(1.05);
        }

        .diagonal-section {
            clip-path: polygon(0 5%, 100% 0, 100% 95%, 0 100%);
        }

        .blob-gradient {
            background: radial-gradient(circle at 30% 50%, rgba(255, 197, 15, 0.3), transparent 50%),
                        radial-gradient(circle at 70% 50%, rgba(255, 165, 0, 0.3), transparent 50%);
        }

        .country-card {
            position: relative;
            overflow: hidden;
        }

        .country-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 197, 15, 0.3), transparent);
            transition: left 0.5s;
        }

        .country-card:hover::before {
            left: 100%;
        }

        .stagger-1 { animation-delay: 0.1s; }
        .stagger-2 { animation-delay: 0.2s; }
        .stagger-3 { animation-delay: 0.3s; }

        .price-badge {
            position: relative;
            display: inline-block;
        }

        .price-badge::after {
            content: '';
            position: absolute;
            top: -5px;
            right: -5px;
            width: 15px;
            height: 15px;
            background: #FF4500;
            border-radius: 50%;
            animation: ping 1.5s cubic-bezier(0, 0, 0.2, 1) infinite;
        }

        @keyframes ping {
            75%, 100% {
                transform: scale(2);
                opacity: 0;
            }
        }

        .zig-zag-border {
            position: relative;
        }

        .zig-zag-border::before {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            right: 0;
            height: 10px;
            background: linear-gradient(135deg, #FFC50F 25%, transparent 25%),
                        linear-gradient(225deg, #FFC50F 25%, transparent 25%);
            background-size: 20px 20px;
            background-position: 0 0, 10px 0;
        }

        .grid-pattern {
            background-image:
                linear-gradient(rgba(255, 197, 15, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 197, 15, 0.05) 1px, transparent 1px);
            background-size: 40px 40px;
        }

    .bottom-nav {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background: #000;
        border-top: 4px solid #FFC50F;
        z-index: 50;
        box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.3);
        padding: 8px 0 4px;
    }

    .nav-grid {
        display: grid;
        grid-template-columns: 1fr 1fr auto 1fr 1fr;
        align-items: end;
        position: relative;
        max-width: 100%;
        margin: 0 auto;
    }

    .nav-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 8px 4px;
        color: #fff;
        transition: all 0.2s ease;
        cursor: pointer;
        position: relative;
    }

    .nav-item.active {
        color: #FFC50F;
    }

    .nav-item.active::before {
        content: '';
        position: absolute;
        top: -4px;
        left: 50%;
        transform: translateX(-50%);
        width: 24px;
        height: 3px;
        background: #FFC50F;
        border-radius: 2px;
    }

    .nav-item:hover {
        color: #FFC50F;
    }

    .nav-icon {
        width: 24px;
        height: 24px;
        margin-bottom: 4px;
        transition: transform 0.2s ease;
    }

    .nav-item:hover .nav-icon {
        transform: scale(1.1);
    }

    .nav-label {
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
    }

    /* Center Button */
    .center-button-wrapper {
        position: relative;
        display: flex;
        justify-content: center;
        margin-bottom: 8px;
    }

    .center-button {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #FFC50F 0%, #FFB300 100%);
        color: #000;
        border-radius: 50%;
        border: 4px solid #fff;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        box-shadow: 0 4px 20px rgba(255, 197, 15, 0.5);
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
        top: -30px;
        margin: 0 8px;
    }

    .center-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 25px rgba(255, 197, 15, 0.6);
    }

    .esim-icon {
        font-size: 36px;
        margin-bottom: 4px;
        color: #000;
    }

    .center-label {
        font-size: 12px;
        font-weight: 800;
        position: absolute;
        bottom: -20px;
        color: #000;
        white-space: nowrap;
        background: #FFC50F;
        padding: 3px 10px;
        border-radius: 14px;
        border: 2px solid #fff;
    }

    @media (min-width: 768px) {
        .bottom-nav {
            display: none;
        }
    }

    
    .card-shadow-yellow {
        box-shadow: 0 10px 40px rgba(255, 197, 15, 0.2);
        transition: all 0.3s ease;
    }
    .card-shadow-yellow:hover {
        box-shadow: 0 20px 60px rgba(255, 197, 15, 0.4);
    }
    .product-card-header {
        background-image: url('https://images.unsplash.com/photo-1724568834522-81eb8e5c048c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxiYWxpJTIwYmVhY2glMjB0cm9waWNhbHxlbnwxfHx8fDE3NjQ2Njg2MjN8MA&ixlib=rb-4.1.0&q=80&w=1080');
        background-size: cover;
        background-position: center;
        position: relative;
    }
    .product-card-header::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(255, 197, 15, 0.7), rgba(255, 215, 0, 0.5));
        z-index: 1;
    }
    .flag-container {
        position: relative;
        z-index: 10;
    }
    .product-initial {
        position: relative;
        z-index: 5;
    }

        .card-shadow-yellow {
        box-shadow: 0 10px 40px rgba(255, 197, 15, 0.2);
        transition: all 0.3s ease;
    }
    .card-shadow-yellow:hover {
        box-shadow: 0 20px 60px rgba(255, 197, 15, 0.4);
    }
    .product-card-header {
        background-image: url('https://images.unsplash.com/photo-1724568834522-81eb8e5c048c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxiYWxpJTIwYmVhY2glMjB0cm9waWNhbHxlbnwxfHx8fDE3NjQ2Njg2MjN8MA&ixlib=rb-4.1.0&q=80&w=1080');
        background-size: cover;
        background-position: center;
        position: relative;
    }
    .product-card-header::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.1));
        z-index: 1;
    }
</style>
</head>
<body class="bg-white">

    <!-- Header / Top Bar -->
<!-- Header / Top Bar -->
<header class="sticky top-0 z-50 bg-black/95 backdrop-blur-md border-b-4 border-[#FFC50F]">
    <div class="max-w-7xl mx-auto px-4 py-4">

        <!-- Desktop Layout -->
        <div class="hidden md:flex items-center justify-between gap-6">

            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('index') }}" class="block">
                    <img
                        src="{{ asset('resources/assets/img/Logo-transparent 1.png') }}"
                        alt="RavConnect Logo"
                        class="h-12 w-auto drop-shadow-2xl"
                    >
                </a>
            </div>

            <!-- Search Bar - Desktop -->
            <div class="flex-1 max-w-xl" x-data="{ open: false, results: [], loading: false, query: '' }">
                <div class="relative w-full">
                    <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input
                        type="text"
                        placeholder="Cari eSIM atau negara tujuan..."
                        class="w-full pl-12 pr-4 py-3 bg-white/10 border-2 border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-[#FFC50F] focus:bg-white/20 transition"
                        x-model="query"
                        @input.debounce.400ms="if(query.length > 1){ loading=true; fetch('/search?q='+encodeURIComponent(query)).then(r=>r.json()).then(data=>{results=data;open=true;loading=false;}) } else { open=false; results=[]; }"
                        @focus="if(results.length) open=true"
                        @blur="setTimeout(()=>open=false,200)"
                    >

                    <!-- Search Results Dropdown -->
                    <div x-show="open" x-cloak class="absolute left-0 mt-2 w-full bg-white rounded-xl shadow-2xl z-50 border border-gray-200 max-h-80 overflow-y-auto">
                        <template x-if="loading">
                            <div class="p-4 text-center text-gray-400">Memuat...</div>
                        </template>
                        <template x-if="!loading && results.length === 0 && query.length > 1">
                            <div class="p-4 text-center text-gray-400">Tidak ditemukan</div>
                        </template>
                        <template x-for="item in results" :key="item.type+'-'+item.id">
                            <a :href="item.url" class="px-5 py-3 hover:bg-[#FFF8E1] transition flex items-center gap-3 border-b last:border-b-0 border-gray-100">
                                <template x-if="item.type==='product'">
                                    <span class="w-8 h-8 rounded bg-[#FFF3CD] flex items-center justify-center text-[#FFC50F] font-black text-lg">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                    </span>
                                </template>
                                <template x-if="item.type==='country'">
                                    <span class="w-8 h-8 rounded bg-[#E3F2FD] flex items-center justify-center text-[#2196F3] font-black text-lg">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2a10 10 0 100 20 10 10 0 000-20zm0 0v20m0-20C7.03 2 2 7.03 2 12s5.03 10 10 10 10-5.03 10-10S16.97 2 12 2z"/></svg>
                                    </span>
                                </template>
                                <span class="flex-1">
                                    <span class="block font-bold text-gray-900" x-text="item.name"></span>
                                    <span class="block text-xs text-gray-500" x-text="item.type==='product' ? 'eSIM Product' : 'Country'"></span>
                                </span>
                            </a>
                        </template>
                    </div>
                </div>
            </div>

            <!-- Navigation Menu -->
            <div class="flex items-center gap-4">
                <!-- Desktop Menu Dropdown -->
                <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                    <button @click="open = !open" class="p-3 rounded-lg hover:bg-white/10 border border-white/20 transition flex items-center gap-2">
                        <svg class="w-6 h-6 text-[#FFC50F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <span class="font-bold text-white">Menu</span>
                    </button>

                    <div x-show="open" x-cloak class="absolute right-0 mt-2 w-64 bg-black rounded-xl shadow-2xl z-50 border border-[#FFC50F] py-4">
                        <a href="/" class="flex items-center gap-3 px-6 py-3 hover:bg-white/10 transition text-white hover:text-[#FFC50F]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span>Home</span>
                        </a>
<a href="/countries" class="flex items-center gap-3 px-6 py-3 hover:bg-white/10 transition text-white hover:text-[#FFC50F]">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
    </svg>
    <span>Browse</span>
</a>
                        <a href="/my_esim" class="flex items-center gap-3 px-6 py-3 hover:bg-white/10 transition text-white hover:text-[#FFC50F]">
                            <i class="fas fa-sim-card w-5 h-5"></i>
                            <span>My eSIM</span>
                        </a>
                        <a href="/support" class="flex items-center gap-3 px-6 py-3 hover:bg-white/10 transition text-white hover:text-[#FFC50F]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Support</span>
                        </a>
                        <div class="border-t border-white/20 my-2"></div>
                        @auth
                        <form method="POST" action="{{ route('logout') }}" class="px-6 py-3">
                            @csrf
                            <button type="submit" class="flex items-center gap-2 w-full text-left text-white hover:text-red-500 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
                                </svg>
                                <span>Logout</span>
                            </button>
                        </form>
                        @endauth
                    </div>
                </div>

                <!-- Auth Buttons -->
                @guest
                <a href="{{ route('login') }}" class="flex items-center gap-2 px-5 py-2.5 text-white hover:text-[#FFC50F] transition-all border border-white/20 rounded-lg hover:border-[#FFC50F]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span class="font-semibold">Masuk</span>
                </a>
                <a href="{{ route('register') }}" class="px-5 py-2.5 bg-[#FFC50F] text-black rounded-lg hover:bg-[#FFD700] transition-all font-bold shadow-lg shadow-[#FFC50F]/50 hover:shadow-xl hover:shadow-[#FFC50F]/60">
                    Daftar
                </a>
                @else
                <span class="text-white font-semibold">Welcome, {{ auth()->user()->name }}</span>
                @endguest

                <!-- Cart Dropdown -->
                <div class="relative" x-data="cartDropdown()" x-init="initCartDropdown()" @click.outside="open = false">
                    <button
                        class="relative p-3 hover:bg-white/10 rounded-lg transition-all border border-white/20 hover:border-[#FFC50F]"
                        @click="open = !open"
                    >
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center font-bold">
                            {{ count(session('cart', [])) }}
                        </span>
                    </button>

                    <!-- Cart Dropdown Content -->
                    <div x-show="open" x-cloak class="absolute right-0 mt-2 w-96 bg-white rounded-xl shadow-2xl z-50 border border-gray-200">
                        <div class="p-6">
                            <!-- Header -->
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-xl font-bold text-gray-900">Keranjang Belanja</h3>
                                <button @click="open = false" class="text-gray-400 hover:text-gray-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>

                            @php $cart = session('cart', []); @endphp

                            @if(count($cart) > 0)
                                <!-- Cart Items -->
                                <div class="max-h-96 overflow-y-auto space-y-4 mb-6">
                                    @foreach($cart as $item)
                                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg border border-gray-100">
                                        <div class="flex-1 min-w-0">
                                            <h4 class="font-semibold text-gray-900 text-sm truncate">{{ $item['name'] }}</h4>
                                            <p class="text-[#FFC50F] font-bold text-sm mt-1">
                                                Rp {{ number_format($item['price'], 0, ',', '.') }}
                                            </p>
                                            @if(isset($item['quota']))
                                            <p class="text-gray-500 text-xs mt-1">{{ $item['quota'] }} • {{ $item['validity'] }}</p>
                                            @endif
                                        </div>
                                        <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="text-red-500 hover:text-red-700 p-2 transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                    @endforeach
                                </div>

                                <!-- Footer -->
                                <div class="border-t border-gray-200 pt-4">
                                    <div class="flex justify-between items-center mb-4">
                                        <span class="text-gray-600 font-medium">Total:</span>
                                        <span class="text-xl font-bold text-[#FFC50F]">
                                            Rp {{ number_format(array_sum(array_column($cart, 'price')), 0, ',', '.') }}
                                        </span>
                                    </div>
                                    <div class="flex gap-3">
                                        <a
                                            href="{{ route('cart') }}"
                                            class="flex-1 bg-gray-500 text-white py-3 px-4 rounded-lg text-center font-semibold hover:bg-gray-600 transition-colors"
                                            @click="open = false"
                                        >
                                            Lihat Keranjang
                                        </a>
                                        <a
                                            href="{{ route('checkout') }}"
                                            class="flex-1 bg-gradient-to-r from-[#FFC50F] to-[#FFD700] text-black py-3 px-4 rounded-lg text-center font-semibold hover:from-[#FFD700] hover:to-[#FFC50F] transition-all shadow-lg hover:shadow-xl"
                                            @click="open = false"
                                        >
                                            Checkout
                                        </a>
                                    </div>
                                </div>
                            @else
                                <!-- Empty State -->
                                <div class="text-center py-8">
                                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-gray-500 text-lg mb-2">Keranjang belanja kosong</p>
                                    <p class="text-gray-400 text-sm">Tambahkan produk untuk melanjutkan</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Layout -->
        <div class="md:hidden">
            <!-- Mobile Search, Cart, Login/Logout (no logo/menu) -->
            <div class="flex items-center gap-2 w-full justify-center">
                <div class="relative flex-1 max-w-xs" x-data="{ open: false, results: [], loading: false, query: '' }">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input
                        type="text"
                        placeholder="Cari eSIM..."
                        class="w-full pl-9 pr-2 py-2 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-[#FFC50F] focus:bg-white/20 transition text-sm"
                        x-model="query"
                        @input.debounce.400ms="if(query.length > 1){ loading=true; fetch('/search?q='+encodeURIComponent(query)).then(r=>r.json()).then(data=>{results=data;open=true;loading=false;}) } else { open=false; results=[]; }"
                        @focus="if(results.length) open=true"
                        @blur="setTimeout(()=>open=false,200)"
                    >
                    <div x-show="open" x-cloak class="absolute left-0 mt-2 w-full bg-white rounded-lg shadow-xl z-50 border border-gray-200 max-h-64 overflow-y-auto text-sm">
                        <template x-if="loading">
                            <div class="p-3 text-center text-gray-400">Memuat...</div>
                        </template>
                        <template x-if="!loading && results.length === 0 && query.length > 1">
                            <div class="p-3 text-center text-gray-400">Tidak ditemukan</div>
                        </template>
                        <template x-for="item in results" :key="item.type+'-'+item.id">
                            <a :href="item.url" class="px-4 py-2 hover:bg-[#FFF8E1] transition flex items-center gap-2 border-b last:border-b-0 border-gray-100">
                                <template x-if="item.type==='product'">
                                    <span class="w-7 h-7 rounded bg-[#FFF3CD] flex items-center justify-center text-[#FFC50F] font-black text-base">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                    </span>
                                </template>
                                <template x-if="item.type==='country'">
                                    <span class="w-7 h-7 rounded bg-[#E3F2FD] flex items-center justify-center text-[#2196F3] font-black text-base">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2a10 10 0 100 20 10 10 0 000-20zm0 0v20m0-20C7.03 2 2 7.03 2 12s5.03 10 10 10 10-5.03 10-10S16.97 2 12 2z"/></svg>
                                    </span>
                                </template>
                                <span class="flex-1">
                                    <span class="block font-bold text-gray-900" x-text="item.name"></span>
                                    <span class="block text-xs text-gray-500" x-text="item.type==='product' ? 'eSIM Product' : 'Country'"></span>
                                </span>
                            </a>
                        </template>
                    </div>
                </div>
                <!-- Cart Button -->
                <a href="{{ route('cart') }}" class="relative shrink-0 p-2 rounded-lg bg-white/10 border border-white/20 hover:bg-white/20 transition flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center font-bold">
                        {{ count(session('cart', [])) }}
                    </span>
                </a>
                <!-- Login/Logout Button -->
                @guest
                <a href="{{ route('login') }}" class="px-3 py-2 bg-[#FFC50F] text-black rounded-lg font-bold text-sm shadow hover:bg-[#FFD700] transition shrink-0 flex items-center justify-center">Login</a>
                @endguest
                @auth
                <form method="POST" action="{{ route('logout') }}" class="shrink-0 flex items-center justify-center">
                    @csrf
                    <button type="submit" class="px-3 py-2 bg-red-500 text-white rounded-lg font-bold text-sm shadow hover:bg-red-600 transition flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
                        </svg>
                        Logout
                    </button>
                </form>
                @endauth
            </div>
        </div>

    </div>
</header>

<script>
function cartDropdown() {
    return {
        open: false,
        initCartDropdown() {
            if (window.location.search.includes('cart=open')) {
                this.open = true;
            }
        }
    }
}
</script>




@php
    use App\Helpers\ContentHelper;
    $heroText = ContentHelper::getHeroBannerText();
    $heroImg = ContentHelper::getHeroBannerImage();
    $heroPromo = ContentHelper::getHeroPromo();
    $heroDiscount = ContentHelper::getHeroDiscount();
    $heroStats = ContentHelper::getHeroStats();
@endphp

<!-- Hero Banner - Creative Asymmetric Layout -->
<section class="relative bg-black overflow-hidden min-h-screen flex items-center">
    <!-- Animated Background -->
    <div class="absolute inset-0 blob-gradient"></div>
    <div class="absolute top-20 right-10 w-96 h-96 bg-[#FFC50F] rounded-full decorative-circle opacity-20"></div>
    <div class="absolute bottom-20 left-10 w-80 h-80 bg-[#FFD700] rounded-full decorative-circle opacity-20"></div>
    <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-[#FFA500] rounded-full decorative-circle opacity-10"></div>

    <!-- Grid Pattern Overlay -->
    <div class="absolute inset-0 grid-pattern opacity-30"></div>

    <div class="max-w-7xl mx-auto px-4 py-20 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left Side - Text Content -->
            <div class="space-y-8 text-white">
                <!-- Promo Badge -->
                <div class="inline-flex items-center gap-3 bg-linear-to-r from-red-500 to-orange-500 px-6 py-3 rounded-full transform -rotate-2 hover:rotate-0 transition-all shadow-2xl">
                    <span class="text-3xl">🔥</span>
                    <div>
                        <div class="font-black text-sm">{{ $heroPromo }}</div>
                        <div class="text-xs opacity-90">{{ $heroDiscount }}</div>
                    </div>
                </div>

                <div>
                    <h1 class="text-white mb-6 leading-tight">{!! $heroText !!}</h1>
                    <p class="text-xl text-gray-300 mb-8 max-w-lg">
                        Koneksi internet <span class="text-[#FFC50F] font-bold">global di {{ $heroStats['countries'] }} negara</span>. Aktifkan eSim dalam hitungan detik, tanpa ribet!
                    </p>
                </div>

                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('countries.index') }}">
                    <button class="group relative bg-[#FFC50F] text-black px-10 py-5 rounded-2xl font-black text-lg hover:bg-[#FFD700] transition-all shadow-2xl shadow-[#FFC50F]/50 hover:shadow-[#FFC50F]/70 hover:scale-105">
                        <span class="relative z-10">Beli Sekarang</span>
                        <div class="absolute inset-0 bg-white/20 rounded-2xl transform scale-0 group-hover:scale-100 transition-transform"></div>
                    </button>
                    </a>

                </div>

                <!-- Stats -->
                <div class="grid grid-cols-3 gap-6 pt-8">
                    <div class="relative group">
                        <div class="absolute inset-0 bg-[#FFC50F]/20 rounded-xl transform group-hover:scale-110 transition-transform"></div>
                        <div class="relative p-4 text-center">
                            <div class="text-4xl font-black" style="color:#F0AC06">{{ $heroStats['countries'] }}</div>
                            <div class="text-sm text-gray-400 font-semibold">Negara</div>
                        </div>
                    </div>
                    <div class="relative group">
                        <div class="absolute inset-0 bg-[#FFC50F]/20 rounded-xl transform group-hover:scale-110 transition-transform"></div>
                        <div class="relative p-4 text-center">
                            <div class="text-4xl font-black" style="color:#F0AC06">{{ $heroStats['users'] }}</div>
                            <div class="text-sm text-gray-400 font-semibold">Pengguna</div>
                        </div>
                    </div>
                    <div class="relative group">
                        <div class="absolute inset-0 bg-[#FFC50F]/20 rounded-xl transform group-hover:scale-110 transition-transform"></div>
                        <div class="relative p-4 text-center">
                            <div class="text-4xl font-black" style="color:#F0AC06">{{ $heroStats['rating'] }}</div>
                            <div class="text-sm text-gray-400 font-semibold">Rating</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Creative Image Layout -->
            <div class="relative lg:h-[600px] hidden lg:block">
                <!-- Main Image -->
                <div class="absolute top-0 right-0 w-4/5 h-4/5 transform rotate-3 hover:rotate-0 transition-all duration-500 group">
                    <div class="absolute inset-0 bg-[#FFC50F] rounded-3xl transform group-hover:scale-105 transition-transform"></div>
                    @if($heroImg)
                        <img src="{{ $heroImg }}" alt="Hero Banner" class="relative w-full h-full object-cover rounded-3xl shadow-2xl border-4 border-white/20" />
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-400 bg-gray-100 rounded-3xl">No hero image</div>
                    @endif
                </div>
                <div class="absolute bottom-10 left-0 bg-white rounded-2xl p-6 shadow-2xl transform -rotate-6 hover:rotate-0 transition-all">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 bg-gradient-to-br from-[#FFC50F] to-[#FFA500] rounded-xl flex items-center justify-center">
                                <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="text-2xl font-black text-black">Instant</div>
                                <div class="text-sm text-gray-600">Aktivasi Cepat</div>
                            </div>
                        </div>
                    </div>

                    <div class="absolute top-10 left-10 bg-gradient-to-br from-[#FFC50F] to-[#FFD700] rounded-2xl p-5 shadow-2xl transform rotate-6 hover:rotate-0 transition-all">
                        <div class="text-center">
                            <div class="text-3xl font-black" style="color:#000000">Rp 50k</div>
                            <div class="text-xs text-black/70 font-bold">Start From</div>
                        </div>
            </div>
        </div>
    </div>
</section>

    <!-- Country Coverage Section - Bento Box Style -->
    <section class="relative py-24 bg-linear-to-b from-gray-50 to-white overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-[#FFC50F]/10 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <!-- Section Header -->
            <div class="text-center mb-16 relative">
                <div class="inline-block mb-4">
                    <span class="bg-[#FFC50F] text-black px-6 py-2 rounded-full font-black text-sm tracking-wider">JANGKAUAN GLOBAL</span>
                </div>
                <h2 class="text-gray-900 mb-6">
                    Pilih <span class="text-[#FFC50F]">eSIM</span> Terpopuler
                </h2>
                <p class="text-xl text-gray-600 mb-10 max-w-2xl mx-auto">
                    Pilihan eSIM terbaik untuk perjalanan Anda, tersedia di berbagai negara
                </p>
            </div>

            <!-- Product Cards List -->
            @if(isset($products) && count($products) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($products as $product)
                        <!-- Product Card Component -->
                        <div class="relative group bg-white rounded-3xl overflow-hidden border-4 border-[#FFC50F]/30 hover:border-[#FFC50F] transition-all card-shadow-yellow transform hover:-translate-y-2">
                            <!-- Header with Country Image Background -->
                            <div class="relative h-40 md:h-48 lg:h-56 overflow-hidden" style="background: none;">
                                @php
                                    $countryImg = null;
                                    if ($product->countries && $product->countries->count()) {
                                        $country = $product->countries->first();
                                        $countryImg = $country->image_url ?: 'https://flagcdn.com/w320/' . strtolower($country->code) . '.png';
                                    }
                                @endphp
                                @if($countryImg)
                                    <img src="{{ $countryImg }}" alt="{{ $country->name }}" class="absolute inset-0 w-full h-full object-cover z-0" />
                                @else
                                    <div class="absolute inset-0 w-full h-full bg-gray-100 flex items-center justify-center text-gray-400 rounded-3xl z-0">No image</div>
                                @endif
                                <!-- Subtle black overlay tint, fading bottom to top -->
                                <div class="absolute inset-0 w-full h-full z-5 pointer-events-none" style="background: linear-gradient(to top, rgba(0,0,0,0.35) 0%, rgba(0,0,0,0.10) 60%, rgba(0,0,0,0.0) 100%);"></div>
                                <!-- Flag positioned in bottom-left corner with modern styling -->
                                @php
                                    $flag = null;
                                    if ($product->countries && $product->countries->count()) {
                                        $country = $product->countries->first();
                                        $flag = $country->code ? 'https://flagcdn.com/48x36/' . strtolower($country->code) . '.png' : null;
                                    }
                                @endphp
                                @if($flag)
                                    <div class="absolute bottom-4 left-4 z-10 bg-white rounded-xl shadow-xl p-2 border border-gray-100 group-hover:scale-110 transition-transform">
                                        <img src="{{ $flag }}" alt="{{ $country->name }}" class="w-12 h-9 md:w-16 md:h-12 object-cover rounded-lg">
                                    </div>
                                @else
                                    <div class="absolute bottom-4 left-4 z-10 bg-white rounded-xl shadow-xl p-2 border border-gray-100 group-hover:scale-110 transition-transform">
                                        <img src="{{ asset('images/products/default.png') }}" alt="{{ $product->name }}" class="w-12 h-9 md:w-16 md:h-12 object-cover rounded-lg">
                                    </div>
                                @endif
                            </div>

                            <div class="p-6">
                                <h3 class="text-gray-900 mb-3 font-bold text-lg">{{ $product->name }}</h3>
                                <div class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $product->description }}</div>

                                <!-- Info grid with better spacing -->
                                <div class="space-y-3 mb-6">
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs text-gray-500 font-semibold">Kuota</span>
                                        @if($product->quota)
                                            @if($product->quota >= 1024)
                                                <span class="font-black text-gray-900">{{ number_format($product->quota / 1024, 2) }}GB</span>
                                            @else
                                                <span class="font-black text-gray-900">{{ $product->quota }}MB</span>
                                            @endif
                                        @else
                                            <span class="font-black text-gray-900">Unlimited</span>
                                        @endif
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs text-gray-500 font-semibold">Masa Aktif</span>
                                        <span class="font-black text-gray-900">{{ $product->validity }} Hari</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs text-gray-500 font-semibold">Operator</span>
                                        <span class="font-black text-gray-900">{{ $product->operator }}</span>
                                    </div>

                                    <!-- Price with more emphasis -->
                                    <div class="flex items-center justify-between pt-3 border-t-2 border-gray-100">
                                        <span class="text-sm text-gray-700 font-bold">Harga</span>
                                        <span class="text-2xl font-black" style="color:#F0AC06">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                    </div>
                                </div>

                                <a href="{{ route('products.show', $product->id) }}" class="w-full block bg-gradient-to-r from-[#FFC50F] to-[#FFD700] text-black py-3 rounded-2xl hover:from-[#FFD700] hover:to-[#FFC50F] transition-all font-black text-base shadow-xl hover:shadow-2xl transform hover:scale-105 text-center">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center text-gray-400 text-lg py-16">Belum ada produk tersedia.</div>
            @endif
            <!-- End Product Cards List -->


        <div class="text-center mt-10">
            <a href="{{route('countries.index')}}">
                <button class="group px-12 py-5 border-4 border-[#FFC50F] text-black bg-white hover:bg-[#FFC50F] rounded-2xl transition-all font-black text-xl shadow-xl hover:shadow-2xl transform hover:scale-105">
                        <span class="flex items-center gap-3">
                            Lihat Semua Negara
                            <svg class="w-6 h-6 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </span>
                    </button>
                </a>

        </div>
    </section>

    <!-- Informational Sections - Staggered Creative Layout -->
<section class="relative py-24 bg-black overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1644088379091-d574269d422f')] bg-cover bg-center"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 relative z-10">

        <!-- TOP: 2 Cards Same Height -->
        <div class="grid lg:grid-cols-2 gap-12 mb-20 items-stretch">

            <!-- Card A -->
            <div class="relative h-full">
                <div class="absolute -top-10 -left-10 w-32 h-32 bg-[#FFC50F] rounded-full blur-3xl"></div>
                <div class="relative bg-linear-to-br from-[#FFC50F] to-[#FFD700] rounded-[3rem] p-1 h-full">
                    <div class="bg-black rounded-[2.8rem] p-10 h-full flex flex-col">

                        <!-- Icon (Not tilted) -->
                        <div class="w-20 h-20 bg-[#FFC50F] rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-12 h-12 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path>
                            </svg>
                        </div>

                        <h3 class="text-white mb-6">Apa itu eSIM Roaming?</h3>
                        <p class="text-gray-300 text-lg mb-8">
                            eSIM adalah SIM card <span class="text-[#FFC50F] font-bold">digital</span> yang tertanam di perangkat Anda. Tidak perlu kartu fisik, aktifkan secara online!
                        </p>

                        <div class="space-y-4 mt-auto">
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>

                                <span class="text-white font-semibold text-lg">Tanpa kartu fisik</span>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-white font-semibold text-lg">Aktif dalam hitungan menit</span>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-white font-semibold text-lg">Hemat biaya roaming hingga 90%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card B -->
            <div class="relative h-full">
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-[#FFD700] rounded-full blur-3xl"></div>
                <div class="relative bg-linear-to-br from-[#FFD700] to-[#FFA500] rounded-[3rem] p-1 h-full">
                    <div class="bg-black rounded-[2.8rem] p-10 h-full flex flex-col">

                        <!-- Icon (Not tilted) -->
                        <div class="w-20 h-20 bg-linear-to-br from-[#FFD700] to-[#FFA500] rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-12 h-12 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                        </div>

                        <h3 class="text-white mb-6">Cek Perangkat Kamu</h3>
                        <p class="text-gray-300 text-lg mb-8">
                            Pastikan perangkat Anda mendukung <span class="text-[#FFD700] font-bold">eSIM</span> sebelum membeli.
                        </p>

                        <div class="space-y-4 mb-8">
                            <div class="flex items-center gap-3 bg-white/10 rounded-xl p-4 border border-white/20">
                                <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-white font-semibold">iPhone XS & lebih baru</span>
                            </div>

                            <div class="flex items-center gap-3 bg-white/10 rounded-xl p-4 border border-white/20">
                                <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-white font-semibold">Samsung Galaxy S20+</span>
                            </div>

                            <div class="flex items-center gap-3 bg-white/10 rounded-xl p-4 border border-white/20">
                                <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-white font-semibold">Google Pixel 3+</span>
                            </div>
                        </div>

                        <a href="{{route('support')}}">
                            <button class="text-[#FFD700] hover:text-white font-bold text-lg flex items-center gap-2 group mt-auto">
                                <span>Lihat Daftar Lengkap</span>
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- BOTTOM: Long Card -->
        <div class="max-w-4xl mx-auto">
            <div class="relative bg-linear-to-br from-[#FFA500] to-[#FFC50F] rounded-[3rem] p-1">
                <div class="bg-black rounded-[2.8rem] p-12">

                    <div class="text-center mb-12">
                        <div class="w-24 h-24 bg-linear-to-br from-[#FFA500] to-[#FFC50F] rounded-3xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-14 h-14 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>

                        <h3 class="text-white mb-4">Langkah Mudah Pasang eSIM</h3>
                        <p class="text-gray-300 text-lg">3 langkah sederhana untuk terhubung</p>
                    </div>

                    <div class="grid md:grid-cols-3 gap-8">
                        <div class="text-center">
                            <div class="w-20 h-20 bg-[#FFC50F] rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <span class="text-4xl font-black text-black">1</span>
                            </div>
                            <h4 class="text-white mb-3">Beli eSIM</h4>
                            <p class="text-gray-400">Pilih paket yang sesuai kebutuhan Anda.</p>
                        </div>

                        <div class="text-center">
                            <div class="w-20 h-20 bg-[#FFD700] rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <span class="text-4xl font-black text-black">2</span>
                            </div>
                            <h4 class="text-white mb-3">Scan QR Code</h4>
                            <p class="text-gray-400">QR code dikirim via email.</p>
                        </div>

                        <div class="text-center">
                            <div class="w-20 h-20 bg-[#FFA500] rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <span class="text-4xl font-black text-black">3</span>
                            </div>
                            <h4 class="text-white mb-3">Aktifkan</h4>
                            <p class="text-gray-400">eSIM siap dipakai di seluruh dunia!</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>





    <!-- Footer -->
    <footer class="relative bg-linear-to-b from-gray-900 to-black text-white pt-20 pb-8 overflow-hidden">
        <!-- Decorative Background -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#FFC50F] rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-[#FFD700] rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <div class="grid md:grid-cols-4 gap-12 mb-16">
                <!-- Company Info -->
                <div class="space-y-6">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-linear-to-br from-[#FFC50F] to-[#FFD700] rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="text-2xl font-black">RAV<span class="text-[#FFC50F]">CONNECT</span></span>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Solusi eSIM terpercaya untuk perjalanan global Anda. Terhubung di 100+ negara tanpa ribet!
                    </p>
                    <div class="flex gap-3">
                        <button class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center hover:bg-[#FFC50F] hover:text-black transition-all transform hover:scale-110 border border-white/20 hover:border-[#FFC50F]">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </button>
                        <button class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center hover:bg-[#FFC50F] hover:text-black transition-all transform hover:scale-110 border border-white/20 hover:border-[#FFC50F]">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </button>
                        <button class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center hover:bg-[#FFC50F] hover:text-black transition-all transform hover:scale-110 border border-white/20 hover:border-[#FFC50F]">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-white mb-6 font-black">Menu</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-[#FFC50F] transition-all flex items-center gap-2 group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-[#FFC50F] transition-all"></span>
                            Beranda
                        </a></li>
                        <li><a href="/countries" class="text-gray-400 hover:text-[#FFC50F] transition-all flex items-center gap-2 group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-[#FFC50F] transition-all"></span>
                            Browse
                        </a></li>
                        <li><a href="#" class="text-gray-400 hover:text-[#FFC50F] transition-all flex items-center gap-2 group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-[#FFC50F] transition-all"></span>
                            Cara Kerja
                        </a></li>
                        <li><a href="#" class="text-gray-400 hover:text-[#FFC50F] transition-all flex items-center gap-2 group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-[#FFC50F] transition-all"></span>
                            Blog
                        </a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h4 class="text-white mb-6 font-black">Bantuan</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-[#FFC50F] transition-all flex items-center gap-2 group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-[#FFC50F] transition-all"></span>
                            FAQ
                        </a></li>
                        <li><a href="#" class="text-gray-400 hover:text-[#FFC50F] transition-all flex items-center gap-2 group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-[#FFC50F] transition-all"></span>
                            Cara Aktivasi
                        </a></li>
                        <li><a href="#" class="text-gray-400 hover:text-[#FFC50F] transition-all flex items-center gap-2 group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-[#FFC50F] transition-all"></span>
                            Perangkat Support
                        </a></li>
                        <li><a href="#" class="text-gray-400 hover:text-[#FFC50F] transition-all flex items-center gap-2 group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-[#FFC50F] transition-all"></span>
                            Hubungi Kami
                        </a></li>
                    </ul>
                </div>

                <!-- Legal -->
                <div>
                    <h4 class="text-white mb-6 font-black">Legal</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-[#FFC50F] transition-all flex items-center gap-2 group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-[#FFC50F] transition-all"></span>
                            Syarat & Ketentuan
                        </a></li>
                        <li><a href="#" class="text-gray-400 hover:text-[#FFC50F] transition-all flex items-center gap-2 group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-[#FFC50F] transition-all"></span>
                            Kebijakan Privasi
                        </a></li>
                        <li><a href="#" class="text-gray-400 hover:text-[#FFC50F] transition-all flex items-center gap-2 group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-[#FFC50F] transition-all"></span>
                            Pengembalian Dana
                        </a></li>
                        <li><a href="#" class="text-gray-400 hover:text-[#FFC50F] transition-all flex items-center gap-2 group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-[#FFC50F] transition-all"></span>
                            Disclaimer
                        </a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-white/10 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-center md:text-left">
                    <div class="text-gray-400 text-sm">
                        <p>&copy; 2024 <span class="text-[#FFC50F] font-bold">RAVCONNECT</span>. All rights reserved.</p>
                    </div>
                    <div class="text-gray-500 text-xs">
                        <p>Powered by Advanced eSIM Technology ⚡</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bottom Mobile Navigation - Bold Design -->


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<nav class="bottom-nav">
    <div class="nav-grid">
        <!-- Home -->
        <a href="/" class="nav-item{{ request()->is('/') ? ' active' : '' }}">
            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                </path>
            </svg>
            <span class="nav-label">Home</span>
        </a>

        <!-- History -->
        <a href="/history" class="nav-item{{ request()->is('history') ? ' active' : '' }}">
            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                </path>
            </svg>
            <span class="nav-label">History</span>
        </a>

        <!-- Center Button -->
        <div class="center-button-wrapper">
            <a href="/my_esim">
                <button class="center-button">
                    <i class="fas fa-sim-card esim-icon"></i>
                    <span class="center-label">My eSIM</span>
                </button>
            </a>
        </div>

        <!-- Cart -->
        <a href="/cart" class="nav-item{{ request()->is('cart') ? ' active' : '' }}">
            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                </path>
            </svg>
            <span class="nav-label">Cart</span>
        </a>

        <!-- Support -->
        <a href="/support" class="nav-item{{ request()->is('support') ? ' active' : '' }}">
            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                </path>
            </svg>
            <span class="nav-label">Support</span>
        </a>
    </div>
</nav>

<script>
    document.querySelectorAll('.nav-item').forEach(item => {
        item.addEventListener('click', function() {
            document.querySelectorAll('.nav-item').forEach(i => {
                i.classList.remove('active');
            });
            this.classList.add('active');
        });
    });

    function cartDropdown() {
    return {
        open: false,
        initCartDropdown() {
            if (window.location.search.includes('cart=open')) {
                this.open = true;
            }
        }
    }
}
</script>



</body>
</html>
