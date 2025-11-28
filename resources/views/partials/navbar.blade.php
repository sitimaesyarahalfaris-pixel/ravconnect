<!-- Header / Top Bar -->
<header class="sticky top-0 z-50 bg-black/95 backdrop-blur-md border-b-4 border-[#FFC50F]">
    <div class="max-w-7xl mx-auto px-4 py-6">  <!-- Increased py-6 for breathing room -->
        <div class="flex items-center justify-between gap-6">

            <!-- Logo - BIG but doesn't force header height -->
            <div class="flex items-center -mt-8 md:-mt-12 lg:-mt-16 mb-[-2rem]">
                <!-- -mt pulls it up, mb negative compensates the space below -->
                <a href="{{ route('index') }}" class="block">
                    <img
                        src="{{ asset('resources/assets/img/Logo-transparent 1.png') }}"
                        alt="RavConnect Logo"
                        class="h-12 md:h-12 lg:h-12 xl:h-12 w-auto drop-shadow-2xl"
                        style="max-width:160px;min-height:40px;"
                    >
                </a>
            </div>

            <!-- Search Bar - Desktop -->
            <div class="hidden md:flex flex-1 max-w-xl">
                <div class="relative w-full">
                    <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input type="text" placeholder="Cari eSIM atau negara tujuan..."
                        class="w-full pl-12 pr-4 py-3 bg-white/10 border-2 border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:border-[#FFC50F] focus:bg-white/20 transition">
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
                            @cs rf
                            <button type="submit" class="px-4 py-2 bg-transparent text-white border border-white/20 rounded hover:bg-white/10 transition">Logout</button>
                        </form>
                    </div>
                @endguest

                <button class="relative p-3 hover:bg-white/10 rounded-lg transition-all border border-white/20 hover:border-[#FFC50F]">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center font-bold">0</span>
                </button>
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
