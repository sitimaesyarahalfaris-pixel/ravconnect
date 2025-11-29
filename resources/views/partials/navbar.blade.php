<!-- Header / Top Bar -->
<header class="sticky top-0 z-50 bg-black/95 backdrop-blur-md border-b-4 border-[#FFC50F]">
    <div class="max-w-7xl mx-auto px-4 py-4">  <!-- py-4 cukup untuk header -->
        <div class="flex items-center justify-between gap-6">

            <!-- Logo - center vertikal -->
            <div class="flex items-center">
                <a href="{{ route('index') }}" class="block">
                    <img
                        src="{{ asset('resources/assets/img/Logo-transparent 1.png') }}"
                        alt="RavConnect Logo"
                        class="h-12 w-auto drop-shadow-2xl"
                        style="max-width:160px; min-height:40px;"
                    >
                </a>
            </div>

            <!-- Search Bar - Desktop -->
            <div class="hidden md:flex flex-1 max-w-xl relative" x-data="{ open: false, results: [], loading: false, query: '' }">
                <div class="relative w-full">
                    <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input type="text" placeholder="Cari eSIM atau negara tujuan..."
                        class="w-full pl-12 pr-4 py-3 bg-white/10 border-2 border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-[#FFC50F] focus:bg-white/20 transition"
                        x-model="query"
                        @input.debounce.400ms="if(query.length > 1){ loading=true; fetch('/search?q='+encodeURIComponent(query)).then(r=>r.json()).then(data=>{results=data;open=true;loading=false;}) } else { open=false; results=[]; }"
                        @focus="if(results.length) open=true"
                        @blur="setTimeout(()=>open=false,200)"
                    >
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

            <!-- Right Side Actions -->
            <div class="flex items-center gap-3">
                @guest
                    <a href="{{ route('login') }}" class="hidden md:flex items-center gap-2 px-5 py-2.5 text-white hover:text-[#FFC50F] transition-all border border-white/20 rounded-lg hover:border-[#FFC50F']">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="font-semibold">Masuk</span>
                    </a>
                    <a href="{{ route('register') }}" class="hidden md:block px-5 py-2.5 bg-[#FFC50F] text-black rounded-lg hover:bg-[#FFD700] transition-all font-bold shadow-lg shadow-[#FFC50F]/50 hover:shadow-xl hover:shadow-[#FFC50F]/60">
                        Daftar
                    </a>
                @else
                    <div class="hidden md:flex items-center gap-3">
                        <span class="text-white font-semibold">Welcome, {{ auth()->user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-transparent text-white border border-white/20 rounded hover:bg-white/10 transition">Logout</button>
                        </form>
                    </div>
                @endguest

                <!-- Cart Dropdown -->
                <div class="relative" x-data="cartDropdown()" x-init="initCartDropdown()">
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

                    <!-- Dropdown Content -->
                    <div
                        x-show="open"
                        x-cloak
                        class="absolute right-0 mt-2 w-96 bg-white rounded-xl shadow-2xl z-50 border border-gray-200"
                        @click.outside="open = false"
                    >
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
                                                Rp {{ number_format($item['price'] * 1000, 0, ',', '.') }}
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
                                            Rp {{ number_format(array_sum(array_column($cart, 'price')) * 1000, 0, ',', '.') }}
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

        <!-- Mobile Search -->
        <div class="md:hidden mt-4">
            <div class="relative w-full">
                <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <input type="text" placeholder="Cari eSIM atau negara..."
                    class="w-full pl-12 pr-4 py-3 bg-white/10 border-2 border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-[#FFC50F] focus:bg-white/20 transition">
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

