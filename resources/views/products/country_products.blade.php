@extends('layouts.app')

@section('title', 'eSIM for ' . $country->name . ' - RAVCONNECT')

@section('content')
<!-- Hero Section with Country -->
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
            <span class="text-black font-bold">{{ $country->name }}</span>
        </div>

        <!-- Country Header -->
        <div class="flex flex-col md:flex-row items-center gap-6 mb-8">
            <div class="relative">
                <div class="w-24 h-24 md:w-32 md:h-32 rounded-3xl bg-white/20 backdrop-blur-sm border-4 border-white/40 shadow-2xl p-4 flex items-center justify-center">
                    <img src="{{ 'https://flagcdn.com/w320/' . strtolower($country->code) . '.png' }}" alt="{{ $country->name }}" class="w-full h-full object-contain">
                </div>
                <div class="absolute -bottom-2 -right-2 w-10 h-10 bg-linear-to-br from-green-400 to-green-500 rounded-full flex items-center justify-center shadow-lg border-2 border-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                </div>
            </div>

            <div class="flex-1 text-center md:text-left">
                <h1 class="text-4xl md:text-5xl font-black text-black mb-3">
                    eSIM for {{ $country->name }}
                </h1>
                <p class="text-lg text-black/80 mb-4">
                    Stay connected in {{ $country->name }} with instant activation and reliable coverage
                </p>
                <div class="flex flex-wrap items-center justify-center md:justify-start gap-3">
                    <div class="flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full border-2 border-white/40">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                            <rect x="2" y="7" width="20" height="15" rx="2" ry="2"></rect>
                            <polyline points="17 2 12 7 7 2"></polyline>
                        </svg>
                        <span class="text-black font-bold text-sm">{{ $products->count() }} Plans Available</span>
                    </div>
                    <div class="flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full border-2 border-white/40">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                            <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path>
                        </svg>
                        <span class="text-black font-bold text-sm">Instant Activation</span>
                    </div>
                    <div class="flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full border-2 border-white/40">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                        <span class="text-black font-bold text-sm">Highly Rated</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Search & Filter Section -->
<section class="bg-white shadow-lg sticky top-0 z-40 border-b-2 border-gray-100">
    <div class="max-w-7xl mx-auto px-4 py-6" x-data="{
        showFilters: false,
        dataFilter: 'all',
        validityFilter: 'all',
        sortBy: 'popular',
        priceRange: 'all'
    }">
        <div class="flex flex-col md:flex-row gap-4 items-center">
            <!-- Search Input -->
            <div class="flex-1 w-full max-w-xl relative">
                <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <input
                    type="text"
                    placeholder="Search eSIM plans for {{ $country->name }}..."
                    class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border-2 border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:border-[#FFC50F] focus:bg-white transition font-semibold"
                    id="searchInput"
                >
            </div>

            <!-- Filter Toggle (Mobile) -->
            <button @click="showFilters = !showFilters" class="md:hidden w-full px-4 py-3 bg-linear-to-r from-[#FFC50F] to-[#FFD700] text-black font-bold rounded-xl flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                </svg>
                Filters & Sort
            </button>

            <!-- Filters (Desktop Always Visible, Mobile Toggle) -->
            <div class="flex flex-col md:flex-row gap-3 w-full md:w-auto" :class="{'hidden md:flex': !showFilters}">
                <!-- Data Quota Filter -->
                <select x-model="dataFilter" class="px-4 py-3.5 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-[#FFC50F] font-bold text-gray-700 cursor-pointer hover:bg-white transition">
                    <option value="all">📊 All Data</option>
                    <option value="small">📱 < 3GB</option>
                    <option value="medium">📦 3GB - 10GB</option>
                    <option value="large">🚀 > 10GB</option>
                    <option value="unlimited">♾️ Unlimited</option>
                </select>

                <!-- Validity Filter -->
                <select x-model="validityFilter" class="px-4 py-3.5 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-[#FFC50F] font-bold text-gray-700 cursor-pointer hover:bg-white transition">
                    <option value="all">📅 All Duration</option>
                    <option value="short">⚡ 1-7 days</option>
                    <option value="medium">📆 8-30 days</option>
                    <option value="long">🗓️ 30+ days</option>
                </select>

                <!-- Sort By -->
                <select x-model="sortBy" class="px-4 py-3.5 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-[#FFC50F] font-bold text-gray-700 cursor-pointer hover:bg-white transition">
                    <option value="popular">⭐ Popular</option>
                    <option value="price_low">💰 Price: Low to High</option>
                    <option value="price_high">💎 Price: High to Low</option>
                    <option value="data">📊 Data: High to Low</option>
                </select>
            </div>
        </div>

        <!-- Active Filters -->
        <div class="mt-4 flex flex-wrap gap-2" x-show="dataFilter !== 'all' || validityFilter !== 'all' || sortBy !== 'popular'">
            <span class="text-sm text-gray-600 font-semibold">Active filters:</span>
            <template x-if="dataFilter !== 'all'">
                <span class="inline-flex items-center gap-1 px-3 py-1 bg-[#FFC50F]/20 text-[#FFC50F] rounded-lg text-sm font-bold border border-[#FFC50F]/30">
                    Data: <span x-text="dataFilter"></span>
                    <button @click="dataFilter = 'all'" class="hover:text-black">&times;</button>
                </span>
            </template>
            <template x-if="validityFilter !== 'all'">
                <span class="inline-flex items-center gap-1 px-3 py-1 bg-blue-100 text-blue-700 rounded-lg text-sm font-bold border border-blue-200">
                    Duration: <span x-text="validityFilter"></span>
                    <button @click="validityFilter = 'all'" class="hover:text-blue-900">&times;</button>
                </span>
            </template>
        </div>
    </div>
</section>

<!-- Products Grid -->
<section class="bg-linear-to-b from-gray-50 to-white py-12">
    <div class="max-w-7xl mx-auto px-4">
        <!-- Results Count -->
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-black text-gray-900">
                Available Plans <span class="text-[#FFC50F]">({{ $products->count() }})</span>
            </h2>
            <div class="text-sm text-gray-500 font-semibold">
                Showing all plans for {{ $country->name }}
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8" id="productsGrid">
            @forelse($products as $product)
                @php
                    $stock = \App\Models\ProductStock::where('product_id', $product->id)->where('status', 'available')->count();
                    $flag = null;
                    $flagCountry = null;
                    if ($product->countries && $product->countries->count()) {
                        $flagCountry = $product->countries->first();
                        $flag = $flagCountry->code ? 'https://flagcdn.com/48x36/' . strtolower($flagCountry->code) . '.png' : null;
                    }
                @endphp
                @if($stock > 0)
                <div class="relative group bg-white rounded-3xl overflow-hidden border-4 border-[#FFC50F]/30 hover:border-[#FFC50F] transition-all card-shadow-yellow transform hover:-translate-y-2">
                    <!-- Header with Product Image -->
                    <div class="relative h-40 md:h-48 lg:h-56 overflow-hidden" style="background: none;">
                        @php
                            $countryImg = null;
                            if ($product->countries && $product->count()) {
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
                        @php
                            $flag = null;
                            $flagCountry = null;
                            if ($product->countries && $product->countries->count()) {
                                $flagCountry = $product->countries->first();
                                $flag = $flagCountry->code ? 'https://flagcdn.com/48x36/' . strtolower($flagCountry->code) . '.png' : null;
                            }
                        @endphp
                        @if($flag)
                            <div class="absolute bottom-4 left-4 z-10 bg-white rounded-xl shadow-xl p-2 border border-gray-100 group-hover:scale-110 transition-transform">
                                <img src="{{ $flag }}" alt="{{ $flagCountry->name ?? $country->name }}" class="w-12 h-9 md:w-16 md:h-12 object-cover rounded-lg">
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
                @endif
            @empty
            <!-- Empty State -->
            <div class="col-span-full text-center py-20">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="text-gray-300 mx-auto mb-4">
                    <rect x="2" y="7" width="20" height="15" rx="2" ry="2"></rect>
                    <polyline points="17 2 12 7 7 2"></polyline>
                </svg>
                <h3 class="text-xl font-black text-gray-400 mb-2">No eSIM Plans Available</h3>
                <p class="text-gray-400 mb-4">We don't have any eSIM products for {{ $country->name }} at the moment.</p>
                <a href="/countries" class="inline-block px-6 py-3 bg-linear-to-r from-[#FFC50F] to-[#FFD700] text-black font-bold rounded-xl shadow-lg hover:shadow-xl transition-all hover:scale-105">
                    Browse Other Countries
                </a>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="bg-linear-to-br from-gray-900 to-black py-16">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-black text-white mb-3">Why Choose Our {{ $country->name }} eSIM?</h2>
            <p class="text-gray-400 text-lg">The best way to stay connected in {{ $country->name }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white/5 backdrop-blur-sm border-2 border-white/10 rounded-2xl p-6 hover:bg-white/10 transition-all">
                <div class="w-14 h-14 bg-linear-to-br from-[#FFC50F] to-[#FFD700] rounded-xl flex items-center justify-center mb-4 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                        <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-black text-white mb-2">Instant Delivery</h3>
                <p class="text-gray-400">Get your eSIM QR code instantly via email. Activate within minutes.</p>
            </div>

            <div class="bg-white/5 backdrop-blur-sm border-2 border-white/10 rounded-2xl p-6 hover:bg-white/10 transition-all">
                <div class="w-14 h-14 bg-linear-to-br from-blue-400 to-blue-500 rounded-xl flex items-center justify-center mb-4 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                        <path d="M5 12.55a11 11 0 0 1 14.08 0"></path>
                        <path d="M1.42 9a16 16 0 0 1 21.16 0"></path>
                        <path d="M8.53 16.11a6 6 0 0 1 6.95 0"></path>
                        <line x1="12" y1="20" x2="12.01" y2="20"></line>
                    </svg>
                </div>
                <h3 class="text-xl font-black text-white mb-2">Premium Networks</h3>
                <p class="text-gray-400">Connect to the best local carriers in {{ $country->name }} for reliable coverage.</p>
            </div>

            <div class="bg-white/5 backdrop-blur-sm border-2 border-white/10 rounded-2xl p-6 hover:bg-white/10 transition-all">
                <div class="w-14 h-14 bg-linear-to-br from-green-400 to-green-500 rounded-xl flex items-center justify-center mb-4 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                        <line x1="12" y1="1" x2="12" y2="23"></line>
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-black text-white mb-2">Save Money</h3>
                <p class="text-gray-400">Save up to 90% compared to traditional roaming charges.</p>
            </div>

            <div class="bg-white/5 backdrop-blur-sm border-2 border-white/10 rounded-2xl p-6 hover:bg-white/10 transition-all">
                <div class="w-14 h-14 bg-linear-to-br from-purple-400 to-purple-500 rounded-xl flex items-center justify-center mb-4 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-black text-white mb-2">24/7 Support</h3>
                <p class="text-gray-400">Our customer support team is always ready to help you.</p>
            </div>
        </div>
    </div>
</section>

<!-- Alpine.js Filtering Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const grid = document.getElementById('productsGrid');

    if (searchInput && grid) {
        searchInput.addEventListener('input', function(e) {
            const query = e.target.value.toLowerCase();
            const cards = grid.querySelectorAll('[data-name]');

            cards.forEach(card => {
                const name = card.dataset.name;
                if (name.includes(query)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    }
});

// Alpine.js reactive filtering
document.addEventListener('alpine:init', () => {
    Alpine.effect(() => {
        // This will be triggered by Alpine's reactive data
    });
});
</script>

<style>
@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.7; }
}
</style>

@endsection
