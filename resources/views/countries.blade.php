@extends('layouts.app')

@section('title', 'Global eSIM Coverage - RAVCONNECT')

@section('content')
<!-- Hero Section -->
<section class="relative py-16 bg-gradient-to-br from-[#FFC50F] via-[#FFD700] to-[#FFA500] overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <div class="text-center mb-8">
            <div class="inline-flex items-center gap-2 bg-black/20 backdrop-blur-sm px-4 py-2 rounded-full mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="2" y1="12" x2="22" y2="12"></line>
                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                </svg>
                <span class="text-white font-bold text-sm">200+ Countries & Regions</span>
            </div>

            <h1 class="text-4xl md:text-5xl font-black text-black mb-4">
                Stay Connected <span class="text-white">Worldwide</span>
            </h1>
            <p class="text-lg md:text-xl text-black/80 max-w-2xl mx-auto">
                Choose your destination and get instant eSIM coverage. No roaming fees, no SIM card hassle!
            </p>
        </div>

        <!-- Stats Row -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto">
            <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-4 border-2 border-white/40 text-center">
                <div class="text-3xl font-black text-black">{{ $countries->count() }}+</div>
                <div class="text-sm text-black/80 font-bold">Countries</div>
            </div>
            <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-4 border-2 border-white/40 text-center">
                <div class="text-3xl font-black text-black">5 Min</div>
                <div class="text-sm text-black/80 font-bold">Activation</div>
            </div>
            <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-4 border-2 border-white/40 text-center">
                <div class="text-3xl font-black text-black">24/7</div>
                <div class="text-sm text-black/80 font-bold">Support</div>
            </div>
            <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-4 border-2 border-white/40 text-center">
                <div class="text-3xl font-black text-black">4.9★</div>
                <div class="text-sm text-black/80 font-bold">Rating</div>
            </div>
        </div>
    </div>
</section>

<!-- Search & Filter Section -->
<section class="bg-white shadow-lg sticky top-0 z-40 border-b-2 border-gray-100">
    <div class="max-w-7xl mx-auto px-4 py-6" x-data="{
        open: false,
        results: [],
        loading: false,
        query: '',
        region: 'all',
        sort: 'popular',
        showFilters: false
    }">
        <div class="flex flex-col md:flex-row gap-4 items-center">
            <!-- Search Bar -->
            <div class="flex-1 w-full max-w-2xl relative">
                <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <input
                    type="text"
                    placeholder="Search for countries or eSIM packages..."
                    class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border-2 border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:border-[#FFC50F] focus:bg-white transition font-semibold"
                    x-model="query"
                    @input.debounce.400ms="if(query.length > 1){ loading=true; fetch('/search?q='+encodeURIComponent(query)).then(r=>r.json()).then(data=>{results=data;open=true;loading=false;}) } else { open=false; results=[]; }"
                    @focus="if(results.length) open=true"
                    @blur="setTimeout(()=>open=false,200)"
                >

                <!-- Search Results Dropdown -->
                <div x-show="open" x-cloak class="absolute left-0 mt-2 w-full bg-white rounded-2xl shadow-2xl z-50 border-2 border-gray-200 max-h-96 overflow-y-auto">
                    <template x-if="loading">
                        <div class="p-6 text-center">
                            <div class="inline-block animate-spin rounded-full h-8 w-8 border-4 border-[#FFC50F] border-t-transparent"></div>
                            <p class="text-gray-400 font-semibold mt-2">Searching...</p>
                        </div>
                    </template>
                    <template x-if="!loading && results.length === 0 && query.length > 1">
                        <div class="p-6 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="text-gray-300 mx-auto mb-2">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="m21 21-4.35-4.35"></path>
                            </svg>
                            <p class="text-gray-500 font-bold">No results found</p>
                            <p class="text-gray-400 text-sm mt-1">Try different keywords</p>
                        </div>
                    </template>
                    <template x-for="item in results" :key="item.type+'-'+item.id">
                        <a :href="item.url" class="px-5 py-4 hover:bg-[#FFF8E1] transition flex items-center gap-4 border-b last:border-b-0 border-gray-100 group">
                            <template x-if="item.type==='product'">
                                <span class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#FFC50F] to-[#FFD700] flex items-center justify-center text-black shadow-lg group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <rect x="2" y="7" width="20" height="15" rx="2" ry="2"></rect>
                                        <polyline points="17 2 12 7 7 2"></polyline>
                                    </svg>
                                </span>
                            </template>
                            <template x-if="item.type==='country'">
                                <span class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-400 to-blue-500 flex items-center justify-center text-white shadow-lg group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="2" y1="12" x2="22" y2="12"></line>
                                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                    </svg>
                                </span>
                            </template>
                            <span class="flex-1">
                                <span class="block font-bold text-gray-900 group-hover:text-[#FFC50F] transition" x-text="item.name"></span>
                                <span class="block text-xs text-gray-500 font-semibold" x-text="item.type==='product' ? '📱 eSIM Product' : '🌍 Country Destination'"></span>
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400 group-hover:text-[#FFC50F] group-hover:translate-x-1 transition-all">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </a>
                    </template>
                </div>
            </div>

            <!-- Filter Toggle (Mobile) -->
            <button @click="showFilters = !showFilters" class="md:hidden w-full px-4 py-3 bg-gray-100 text-gray-700 font-bold rounded-xl flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                </svg>
                Filters & Sort
            </button>

            <!-- Filters (Desktop Always Visible, Mobile Toggle) -->
            <div class="flex flex-col md:flex-row gap-3 w-full md:w-auto" :class="{'hidden md:flex': !showFilters}">
                <!-- Region Filter -->
                <select x-model="region" class="px-4 py-3.5 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-[#FFC50F] font-bold text-gray-700 cursor-pointer hover:bg-white transition">
                    <option value="all">🌍 All Regions</option>
                    <option value="asia">🌏 Asia</option>
                    <option value="europe">🇪🇺 Europe</option>
                    <option value="americas">🌎 Americas</option>
                    <option value="africa">🌍 Africa</option>
                    <option value="oceania">🌏 Oceania</option>
                </select>

                <!-- Sort By -->
                <select x-model="sort" class="px-4 py-3.5 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-[#FFC50F] font-bold text-gray-700 cursor-pointer hover:bg-white transition">
                    <option value="popular">⭐ Most Popular</option>
                    <option value="name">🔤 A to Z</option>
                    <option value="packages">📦 Most Packages</option>
                    <option value="price">💰 Best Price</option>
                </select>
            </div>
        </div>

        <!-- Active Filters Display -->
        <div class="mt-4 flex flex-wrap gap-2" x-show="region !== 'all' || sort !== 'popular'">
            <span class="text-sm text-gray-600 font-semibold">Active filters:</span>
            <template x-if="region !== 'all'">
                <span class="inline-flex items-center gap-1 px-3 py-1 bg-[#FFC50F]/20 text-[#FFC50F] rounded-lg text-sm font-bold border border-[#FFC50F]/30">
                    <span x-text="region.charAt(0).toUpperCase() + region.slice(1)"></span>
                    <button @click="region = 'all'" class="hover:text-black">&times;</button>
                </span>
            </template>
            <template x-if="sort !== 'popular'">
                <span class="inline-flex items-center gap-1 px-3 py-1 bg-blue-100 text-blue-700 rounded-lg text-sm font-bold border border-blue-200">
                    Sort: <span x-text="sort"></span>
                    <button @click="sort = 'popular'" class="hover:text-blue-900">&times;</button>
                </span>
            </template>
        </div>
    </div>
</section>

<!-- Popular Destinations (Featured) -->
<section class="bg-gradient-to-b from-gray-50 to-white py-12">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl md:text-3xl font-black text-gray-900 flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F]">
                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                    </svg>
                    Popular Destinations
                </h2>
                <p class="text-gray-600 mt-1">Most loved by travelers worldwide</p>
            </div>
            <div class="hidden md:flex items-center gap-2 px-4 py-2 bg-[#FFC50F]/10 rounded-xl border-2 border-[#FFC50F]/30">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F]">
                    <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path>
                </svg>
                <span class="text-sm font-bold text-gray-700">Trending Now</span>
            </div>
        </div>

        <!-- Featured Countries Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-12">
            @php
                $featured = $countries->where('active', true)
                    ->sortByDesc(function($country) {
                        return $country->products_count ?? $country->products->count() ?? 0;
                    })->take(6);
            @endphp

            @foreach($featured as $country)
                <a href="/country/{{ $country->id }}" class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl border-2 border-[#FFC50F]/20 hover:border-[#FFC50F] p-6 transition-all overflow-hidden country-card transform hover:scale-105 duration-300">
                    <!-- Gradient Background on Hover -->
                    <div class="absolute inset-0 bg-gradient-to-br from-[#FFC50F]/5 to-[#FFD700]/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>

                    <div class="relative z-10 flex flex-col items-center">
                        <div class="relative mb-3">
                            <img src="https://flagcdn.com/80x60/{{ strtolower($country->code) }}.png" alt="{{ $country->name }}" class="w-20 h-15 rounded-lg shadow-lg border-2 border-white group-hover:scale-110 transition-transform">
                            <div class="absolute -top-2 -right-2 w-6 h-6 bg-gradient-to-br from-[#FFC50F] to-[#FFD700] rounded-full flex items-center justify-center shadow-lg animate-pulse">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor" class="text-black">
                                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                </svg>
                            </div>
                        </div>
                        <span class="font-black text-gray-900 text-center group-hover:text-[#FFC50F] transition-colors mb-2">{{ $country->name }}</span>
                        <div class="flex items-center gap-1 text-xs text-gray-600 font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="7" width="20" height="15" rx="2" ry="2"></rect>
                                <polyline points="17 2 12 7 7 2"></polyline>
                            </svg>
                            {{ $country->products_count ?? ($country->products->count() ?? 0) }} Plans
                        </div>
                    </div>

                    <!-- Badge -->
                    <div class="absolute top-2 right-2 bg-gradient-to-r from-[#FFC50F] to-[#FFD700] text-black text-xs font-black px-2 py-1 rounded-full shadow-lg border-2 border-white">
                        HOT
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

<!-- All Countries Grid -->
<section class="bg-white py-12">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl md:text-3xl font-black text-gray-900">All Destinations</h2>
                <p class="text-gray-600 mt-1">Browse all {{ $countries->where('active', true)->count() }} available countries</p>
            </div>
            <div class="text-sm text-gray-500 font-semibold">
                Showing {{ $countries->where('active', true)->count() }} countries
            </div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 md:gap-6" id="countriesGrid">
            @foreach($countries as $country)
                @if($country->active)
                    <a href="/country/{{ $country->id }}"
                       class="group flex flex-col items-center bg-white rounded-2xl shadow-md hover:shadow-xl border-2 border-gray-100 hover:border-[#FFC50F] p-5 md:p-6 transition-all country-card relative transform hover:-translate-y-1 duration-300"
                       data-region="{{ strtolower($country->region ?? 'other') }}"
                       data-packages="{{ $country->products_count ?? ($country->products->count() ?? 0) }}"
                       data-name="{{ strtolower($country->name) }}">
                        <!-- Flag -->
                        <div class="relative mb-3">
                            <img src="https://flagcdn.com/64x48/{{ strtolower($country->code) }}.png"
                                 alt="{{ $country->name }}"
                                 class="w-16 h-12 rounded-lg shadow-md border border-gray-200 group-hover:scale-110 transition-transform">
                        </div>

                        <!-- Country Name -->
                        <span class="font-bold text-gray-900 text-sm md:text-base text-center group-hover:text-[#FFC50F] transition-colors mb-2 line-clamp-1">
                            {{ $country->name }}
                        </span>

                        <!-- Package Count -->
                        <div class="flex items-center gap-1 px-3 py-1 bg-gray-100 group-hover:bg-[#FFC50F]/10 rounded-full transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-600 group-hover:text-[#FFC50F]">
                                <rect x="2" y="7" width="20" height="15" rx="2" ry="2"></rect>
                                <polyline points="17 2 12 7 7 2"></polyline>
                            </svg>
                            <span class="text-xs font-bold text-gray-600 group-hover:text-[#FFC50F]">
                                {{ $country->products_count ?? ($country->products->count() ?? 0) }}
                            </span>
                        </div>

                        <!-- Arrow Icon on Hover -->
                        <div class="absolute top-3 right-3 w-6 h-6 bg-[#FFC50F] rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all transform scale-0 group-hover:scale-100 shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>

                        <!-- Edit Button (Admin Only) -->
                        @if(Auth::check() && Auth::user()->is_admin)
                            <button @click.prevent="selectedCountry = {{ $country->toJson() }}; showEditModal = true;" class="absolute bottom-3 right-3 bg-[#FFC50F] text-black text-xs font-bold px-3 py-1 rounded shadow hover:bg-[#FFD700] transition-all z-20">Edit</button>
                        @endif
                    </a>
                @endif
            @endforeach
        </div>
        @if($countries->where('active', true)->count() === 0)
            <div class="text-center py-16">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="text-gray-300 mx-auto mb-4">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="2" y1="12" x2="22" y2="12"></line>
                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                </svg>
                <h3 class="text-xl font-black text-gray-400 mb-2">No Countries Available</h3>
                <p class="text-gray-400">Please check back later</p>
            </div>
        @endif
    </div>
</section>

<!-- Edit Country Modal -->
<div x-data="{ showEditModal: false, selectedCountry: null }" x-show="showEditModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/40">
    <div class="bg-white rounded-2xl shadow-xl p-8 w-full max-w-md relative">
        <button @click="showEditModal = false" class="absolute top-3 right-3 text-gray-400 hover:text-black text-xl">&times;</button>
        <h3 class="text-xl font-black mb-4">Edit Country</h3>
        <form x-ref="editForm" method="POST" action="/admin/countries/update" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" :value="selectedCountry?.id">
            <div class="mb-4">
                <label class="block text-sm font-bold mb-1">Name</label>
                <input type="text" name="name" :value="selectedCountry?.name" class="w-full border rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-1">Code</label>
                <input type="text" name="code" :value="selectedCountry?.code" class="w-full border rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-1">Image</label>
                <input type="file" name="image" class="w-full border rounded px-3 py-2">
                <template x-if="selectedCountry?.image_url">
                    <img :src="selectedCountry.image_url" alt="Flag" class="mt-2 w-16 h-12 rounded border">
                </template>
            </div>
            <div class="flex gap-2 mt-6">
                <button type="submit" class="bg-[#FFC50F] text-black font-bold px-4 py-2 rounded hover:bg-[#FFD700]">Save</button>
                <button type="button" @click="showEditModal = false" class="bg-gray-200 text-gray-700 font-bold px-4 py-2 rounded hover:bg-gray-300">Cancel</button>
            </div>
        </form>
    </div>
</div>

<!-- Alpine.js for filtering (client-side enhancement) -->
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('countryFilter', () => ({
        region: 'all',
        sort: 'popular',

        init() {
            this.$watch('region', () => this.filterCountries());
            this.$watch('sort', () => this.filterCountries());
        },

        filterCountries() {
            const grid = document.getElementById('countriesGrid');
            const cards = Array.from(grid.children);

            // Filter by region
            cards.forEach(card => {
                const cardRegion = card.dataset.region;
                if (this.region === 'all' || cardRegion === this.region) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });

            // Sort
            const visibleCards = cards.filter(card => card.style.display !== 'none');
            visibleCards.sort((a, b) => {
                if (this.sort === 'name') {
                    return a.dataset.name.localeCompare(b.dataset.name);
                } else if (this.sort === 'packages') {
                    return parseInt(b.dataset.packages) - parseInt(a.dataset.packages);
                }
                return 0; // 'popular' keeps original order
            });

            visibleCards.forEach(card => grid.appendChild(card));
        }
    }));
});
</script>

@endsection
