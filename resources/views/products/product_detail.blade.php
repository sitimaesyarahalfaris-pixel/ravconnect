@extends('layouts.app')

@section('title', $product->name . ' - RAVCONNECT')

@section('content')
<!-- Hero Section -->
<section class="relative py-16 bg-linear-to-br from-[#FFC50F] via-[#FFD700] to-[#FFA500] overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <!-- Breadcrumb -->
        <div class="flex items-center gap-2 text-black/70 text-sm font-semibold mb-6">
            <a href="/" class="hover:text-black transition">Home</a>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
            <a href="/countries" class="hover:text-black transition">Countries</a>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
            @if($product->countries && $product->countries->count())
                <a href="/country/{{ $product->countries->first()->id }}" class="hover:text-black transition">{{ $product->countries->first()->name }}</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            @endif
            <span class="text-black font-bold">{{ $product->name }}</span>
        </div>

        <!-- Product Header -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-8">
            <!-- Left: Flag + Title -->
            <div class="flex items-start gap-6">
                <div class="relative shrink-0">
                    @php
                        $flag = $product->countries && $product->countries->count() ?
                            'https://flagcdn.com/w320/' . strtolower($product->countries->first()->code) . '.png' : null;
                    @endphp
                    @if($flag)
                        <div class="w-32 h-32 rounded-3xl bg-white/20 backdrop-blur-sm border-4 border-white/40 shadow-2xl p-4 flex items-center justify-center">
                            <img src="{{ $flag }}" alt="{{ $product->countries->first()->name }}" class="w-full h-full object-contain">
                        </div>
                        <div class="absolute -bottom-2 -right-2 w-10 h-10 bg-linear-to-br from-green-400 to-green-500 rounded-full flex items-center justify-center shadow-lg border-2 border-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                    @endif
                </div>

                <div class="flex-1">
                    <div class="flex flex-wrap gap-2 mb-3">
                        <span class="inline-flex items-center gap-1 px-3 py-1.5 bg-linear-to-r from-green-400 to-green-500 text-white rounded-full text-xs font-black shadow-lg border-2 border-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            In Stock
                        </span>
                        <span class="inline-flex items-center gap-1 px-3 py-1.5 bg-linear-to-r from-blue-400 to-blue-500 text-white rounded-full text-xs font-black shadow-lg border-2 border-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path>
                            </svg>
                            Instant Activation
                        </span>
                        <span class="inline-flex items-center gap-1 px-3 py-1.5 bg-linear-to-r from-purple-400 to-purple-500 text-white rounded-full text-xs font-black shadow-lg border-2 border-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>
                            4.9 Rating
                        </span>
                    </div>

                    <h1 class="text-3xl md:text-4xl font-black text-black mb-3">{{ $product->name }}</h1>
                    <p class="text-lg text-black/80">{{ $product->description }}</p>
                </div>
            </div>

            <!-- Right: Price + Quick Stats -->
            <div class="shrink-0">
                <div class="bg-white/20 backdrop-blur-sm border-4 border-white/40 rounded-3xl p-6 text-center min-w-[280px]">
                    <div class="text-sm text-black font-bold mb-2">Total Price</div>
                    <div class="text-4xl font-black text-black mb-4">
                        <span class="text-5xl font-black mb-3" style="color:#000000">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                    </div>


                    <div class="flex flex-col gap-2">
                        <div class="flex items-center justify-center gap-2 text-sm text-black font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            10,000+ Users
                        </div>
                        <div class="flex items-center justify-center gap-2 text-sm text-black font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                            Secure Payment
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content - Fully Symmetrical Layout -->
<section class="bg-linear-to-b from-gray-50 to-white py-12">
    <div class="max-w-7xl mx-auto px-4">

        <!-- Mobile CTA -->
        <div class="lg:hidden mb-8">
            @if(session('success'))
                <div class="mb-4 p-3 rounded-xl bg-green-100 border-2 border-green-300 text-green-800 font-bold text-sm text-center animate-bounce">
                    ✓ {{ session('success') }}
                </div>
            @endif
            @if(session('info'))
                <div class="mb-4 p-3 rounded-xl bg-blue-100 border-2 border-blue-300 text-blue-800 font-bold text-sm text-center">
                    ℹ {{ session('info') }}
                </div>
            @endif

            @if (auth()->check())
                <div class="space-y-3">
                    <form method="POST" action="{{ route('cart.add', $product->id) }}?checkout=1">
                        @csrf
                        <button type="submit" class="w-full bg-linear-to-r from-[#F0AC06] to-[#F0AC06] text-black py-4 rounded-2xl font-black text-base shadow-xl hover:shadow-2xl hover:scale-105 transition-all flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path>
                            </svg>
                            Buy Now
                        </button>
                    </form>
                    <form method="POST" action="{{ route('cart.add', $product->id) }}">
                        @csrf
                        <button type="submit" class="w-full bg-white border-2 border-[#F0AC06] text-[#F0AC06] py-3 rounded-2xl font-bold text-base shadow-md hover:bg-[#F0AC06] hover:text-black hover:scale-105 transition-all flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            Add to Cart
                        </button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}" class="w-full bg-linear-to-r from-[#F0AC06] to-[#F0AC06] text-black py-4 rounded-2xl font-black text-lg shadow-xl hover:shadow-2xl hover:scale-105 transition-all text-center block flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                        <polyline points="10 17 15 12 10 7"></polyline>
                        <line x1="15" y1="12" x2="3" y2="12"></line>
                    </svg>
                    Login to Purchase
                </a>
            @endif
        </div>

        <!-- Package Details - Full Width -->
        <div class="bg-white rounded-3xl shadow-xl border-2 border-gray-100 p-8 mb-8">
            <h2 class="text-2xl font-black text-gray-900 mb-6 flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#F0AC06]">
                    <rect x="2" y="7" width="20" height="15" rx="2" ry="2"></rect>
                    <polyline points="17 2 12 7 7 2"></polyline>
                </svg>
                Package Details
            </h2>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Data Quota -->
                <div class="p-6 bg-linear-to-br from-blue-50 to-blue-100 rounded-2xl border-2 border-blue-200 text-center">
                    <div class="w-14 h-14 bg-blue-500 rounded-xl flex items-center justify-center shadow-lg mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                        </svg>
                    </div>
                    <div class="text-xs text-blue-600 font-bold mb-2">Data Quota</div>
                    <div class="font-black text-blue-900 text-3xl">
                        @if($product->quota)
                            @if($product->quota >= 1024)
                                {{ number_format($product->quota / 1024, $product->quota % 1024 == 0 ? 0 : 1) }} GB
                            @else
                                {{ $product->quota }} MB
                            @endif
                        @else
                            <span class="text-xl">♾️ Unlimited</span>
                        @endif
                    </div>
                </div>

                <!-- Validity -->
                <div class="p-6 bg-linear-to-br from-green-50 to-green-100 rounded-2xl border-2 border-green-200 text-center">
                    <div class="w-14 h-14 bg-green-500 rounded-xl flex items-center justify-center shadow-lg mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                    </div>
                    <div class="text-xs text-green-600 font-bold mb-2">Validity Period</div>
                    <div class="font-black text-green-900 text-3xl">{{ $product->validity }} Days</div>
                </div>

                <!-- Price -->
                <div class="p-6 bg-linear-to-br from-yellow-50 to-yellow-100 rounded-2xl border-2 border-yellow-200 text-center">
                    <div class="w-14 h-14 bg-linear-to-br from-[#F0AC06] to-[#F0AC06] rounded-xl flex items-center justify-center shadow-lg mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                            <line x1="12" y1="1" x2="12" y2="23"></line>
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                        </svg>
                    </div>
                    <div class="text-xs text-yellow-600 font-bold mb-2">Package Price</div>
                    <div class="font-black text-[#F0AC06] text-2xl">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                </div>

                <!-- Operator -->
                <div class="p-6 bg-linear-to-br from-purple-50 to-purple-100 rounded-2xl border-2 border-purple-200 text-center">
                    <div class="w-14 h-14 bg-purple-500 rounded-xl flex items-center justify-center shadow-lg mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                            <path d="M5 12.55a11 11 0 0 1 14.08 0"></path>
                            <path d="M1.42 9a16 16 0 0 1 21.16 0"></path>
                            <path d="M8.53 16.11a6 6 0 0 1 6.95 0"></path>
                            <line x1="12" y1="20" x2="12.01" y2="20"></line>
                        </svg>
                    </div>
                    <div class="text-xs text-purple-600 font-bold mb-2">Network Operator</div>
                    <div class="font-black text-purple-900 text-xl">{{ $product->operator }}</div>
                </div>
            </div>
        </div>

        <!-- Perfect Symmetrical 2-Column Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- Coverage Countries -->
            <div class="bg-white rounded-3xl shadow-xl border-2 border-gray-100 p-8 h-full">
                <h2 class="text-2xl font-black text-gray-900 mb-6 flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#F0AC06]">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="2" y1="12" x2="22" y2="12"></line>
                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                    </svg>
                    Coverage Countries
                </h2>
                <p class="text-gray-600 mb-4">This eSIM works in {{ $product->countries->count() }} {{ $product->countries->count() > 1 ? 'countries' : 'country' }}:</p>
                <div class="flex flex-wrap gap-3">
                    @foreach($product->countries as $country)
                        <a href="/country/{{ $country->id }}" class="group inline-flex items-center gap-3 bg-linear-to-r from-gray-50 to-gray-100 border-2 border-gray-200 hover:border-[#F0AC06] rounded-2xl px-4 py-3 text-sm font-bold text-gray-700 hover:text-[#F0AC06] transition-all hover:scale-105 shadow-sm hover:shadow-lg">
                            <img src="https://flagcdn.com/32x24/{{ strtolower($country->code) }}.png" alt="{{ $country->name }}" class="w-8 h-6 rounded shadow">
                            <span>{{ $country->name }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-hover:opacity-100 transition-opacity">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Desktop CTA Card -->
            <div class="hidden lg:block bg-white rounded-3xl shadow-xl border-4 border-[#F0AC06]/30 p-8 h-full">
                <div class="text-center mb-6">
                    <div class="text-sm text-gray-600 font-semibold mb-2">Ready to Purchase?</div>
                    <div class="text-4xl font-black text-[#F0AC06] mb-1">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </div>
                    <div class="text-xs text-gray-500 font-semibold mb-4">All inclusive, no hidden fees</div>
                </div>

                @if(session('success'))
                    <div class="mb-4 p-3 rounded-xl bg-green-100 border-2 border-green-300 text-green-800 font-bold text-sm text-center animate-bounce">
                        ✓ {{ session('success') }}
                    </div>
                @endif
                @if(session('info'))
                    <div class="mb-4 p-3 rounded-xl bg-blue-100 border-2 border-blue-300 text-blue-800 font-bold text-sm text-center">
                        ℹ {{ session('info') }}
                    </div>
                @endif

                @if (auth()->check())
                    <div class="space-y-3 mb-6">
                        <form method="POST" action="{{ route('cart.add', $product->id) }}?checkout=1">
                            @csrf
                            <button type="submit" class="w-full bg-linear-to-r from-[#F0AC06] to-[#F0AC06] text-black py-4 rounded-2xl font-black text-base shadow-xl hover:shadow-2xl hover:scale-105 transition-all flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path>
                                </svg>
                                Buy Now
                            </button>
                        </form>
                        <form method="POST" action="{{ route('cart.add', $product->id) }}">
                            @csrf
                            <button type="submit" class="w-full bg-white border-2 border-[#F0AC06] text-[#F0AC06] py-3 rounded-2xl font-bold text-base shadow-md hover:bg-[#F0AC06] hover:text-black hover:scale-105 transition-all flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                                Add to Cart
                            </button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="w-full bg-linear-to-r from-[#F0AC06] to-[#F0AC06] text-black py-4 rounded-2xl font-black text-base shadow-xl hover:shadow-2xl hover:scale-105 transition-all text-center block flex items-center justify-center gap-2 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                            <polyline points="10 17 15 12 10 7"></polyline>
                            <line x1="15" y1="12" x2="3" y2="12"></line>
                        </svg>
                        Login to Purchase
                    </a>
                @endif

                <!-- Trust Badges -->
                <div class="pt-6 border-t-2 border-gray-100 space-y-3">
                    <div class="flex items-center gap-3 text-sm">
                        <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-600">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        <span class="text-gray-700 font-semibold">Instant email delivery</span>
                    </div>
                    <div class="flex items-center gap-3 text-sm">
                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                        </div>
                        <span class="text-gray-700 font-semibold">Secure payment</span>
                    </div>
                    <div class="flex items-center gap-3 text-sm">
                        <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-purple-600">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 16v-4"></path>
                                <path d="M12 8h.01"></path>
                            </svg>
                        </div>
                        <span class="text-gray-700 font-semibold">24/7 customer support</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Perfect Symmetrical 2-Column Layout: How It Works + Key Features -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- How It Works -->
            <div class="bg-white rounded-3xl shadow-xl border-2 border-gray-100 p-8 h-full">
                <h2 class="text-2xl font-black text-gray-900 mb-6 flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#F0AC06]">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 16v-4"></path>
                        <path d="M12 8h.01"></path>
                    </svg>
                    How It Works
                </h2>
                <div class="space-y-5">
                    <div class="flex gap-4">
                        <div class="shrink-0 w-12 h-12 bg-linear-to-br from-[#F0AC06] to-[#F0AC06] rounded-full flex items-center justify-center text-black font-black text-lg shadow-lg">1</div>
                        <div>
                            <h3 class="font-black text-gray-900 mb-1">Purchase eSIM Package</h3>
                            <p class="text-gray-600 text-sm">Complete your purchase securely online. Receive your eSIM QR code instantly via email.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="shrink-0 w-12 h-12 bg-linear-to-br from-blue-400 to-blue-500 rounded-full flex items-center justify-center text-white font-black text-lg shadow-lg">2</div>
                        <div>
                            <h3 class="font-black text-gray-900 mb-1">Scan QR Code</h3>
                            <p class="text-gray-600 text-sm">Open your phone settings, scan the QR code to install the eSIM profile on your device.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="shrink-0 w-12 h-12 bg-linear-to-br from-green-400 to-green-500 rounded-full flex items-center justify-center text-white font-black text-lg shadow-lg">3</div>
                        <div>
                            <h3 class="font-black text-gray-900 mb-1">Activate & Connect</h3>
                            <p class="text-gray-600 text-sm">Activate your eSIM when you arrive at your destination and enjoy instant connectivity.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Key Features -->
            <div class="bg-linear-to-br from-gray-900 to-black rounded-3xl shadow-xl p-8 text-white h-full">
                <h2 class="text-2xl font-black mb-6 flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#F0AC06]">
                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                    </svg>
                    Key Features
                </h2>
                <div class="space-y-5">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 bg-[#F0AC06] rounded-lg flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold mb-1">No Physical SIM</h3>
                            <p class="text-gray-400 text-sm">100% digital, paperless solution</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 bg-[#F0AC06] rounded-lg flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold mb-1">Instant Activation</h3>
                            <p class="text-gray-400 text-sm">Ready in 5 minutes or less</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 bg-[#F0AC06] rounded-lg flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold mb-1">Keep Your Number</h3>
                            <p class="text-gray-400 text-sm">Use alongside existing SIM</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 bg-[#F0AC06] rounded-lg flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold mb-1">24/7 Support</h3>
                            <p class="text-gray-400 text-sm">Always here to help</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
