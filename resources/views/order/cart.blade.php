@extends('layouts.app')

@section('title', 'Shopping Cart - RAVCONNECT')

@section('content')
<!-- Hero Section -->
<section class="relative py-16 bg-gradient-to-br from-[#FFC50F] via-[#FFD700] to-[#FFA500] overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
    </div>
    
    <div class="max-w-4xl mx-auto px-4 relative z-10">
        <div class="text-center">
            <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full border-2 border-white/40 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
                <span class="text-black font-bold text-sm">Your Cart</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-black text-black mb-3">Shopping Cart</h1>
            <p class="text-lg text-black/80">Review your selected eSIM packages</p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="relative py-12 bg-gradient-to-b from-gray-50 to-white min-h-screen">
    <div class="max-w-4xl mx-auto px-4">
        
        <div id="cart-items">
            @php 
                $cart = session('cart', []); 
                $total = 0;
            @endphp
            
            @if(count($cart) === 0)
                <!-- Empty Cart State -->
                <div class="max-w-xl mx-auto">
                    <div class="bg-white rounded-3xl shadow-xl border-2 border-gray-100 p-12 text-center">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-black text-gray-900 mb-3">Your Cart is Empty</h2>
                        <p class="text-gray-600 mb-8 text-lg">Start shopping to add items to your cart</p>
                        <a href="/countries" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-[#FFC50F] to-[#FFD700] text-black rounded-2xl font-black text-lg shadow-xl hover:shadow-2xl hover:scale-105 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                            </svg>
                            Browse eSIM Products
                        </a>
                    </div>
                </div>
            @else
                <!-- Cart Items -->
                <div class="bg-white rounded-3xl shadow-xl border-2 border-gray-100 p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-black text-gray-900 mb-6 flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F]">
                            <rect x="2" y="7" width="20" height="15" rx="2" ry="2"></rect>
                            <polyline points="17 2 12 7 7 2"></polyline>
                        </svg>
                        Cart Items ({{ count($cart) }})
                    </h2>
                    
                    <div class="space-y-4">
                        @foreach($cart as $item)
                            @php $total += $item['price']; @endphp
                            <div class="flex flex-col md:flex-row items-start md:items-center gap-4 bg-gradient-to-r from-gray-50 to-white rounded-2xl shadow-md p-5 border-2 border-gray-200 hover:border-[#FFC50F]/50 transition-all group">
                                <!-- Icon -->
                                <div class="w-14 h-14 bg-gradient-to-br from-[#FFC50F] to-[#FFD700] rounded-xl flex items-center justify-center shadow-lg flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                                        <rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect>
                                        <line x1="12" y1="18" x2="12.01" y2="18"></line>
                                    </svg>
                                </div>
                                
                                <!-- Product Info -->
                                <div class="flex-1">
                                    <h3 class="font-black text-lg text-gray-900 mb-1">{{ $item['name'] }}</h3>
                                    @if(isset($item['description']) && $item['description'])
                                        <p class="text-gray-600 text-sm mb-2">{{ $item['description'] }}</p>
                                    @endif
                                    <div class="flex flex-wrap gap-2 text-xs">
                                        <span class="inline-flex items-center gap-1 px-2 py-1 bg-blue-100 text-blue-700 rounded-lg font-semibold">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                            </svg>
                                            {{ $item['quota'] ?? '-' }}
                                        </span>
                                        <span class="inline-flex items-center gap-1 px-2 py-1 bg-green-100 text-green-700 rounded-lg font-semibold">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                            </svg>
                                            {{ $item['validity'] ?? '-' }}
                                        </span>
                                        <span class="inline-flex items-center gap-1 px-2 py-1 bg-purple-100 text-purple-700 rounded-lg font-semibold">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M5 12.55a11 11 0 0 1 14.08 0"></path>
                                                <path d="M1.42 9a16 16 0 0 1 21.16 0"></path>
                                                <path d="M8.53 16.11a6 6 0 0 1 6.95 0"></path>
                                                <line x1="12" y1="20" x2="12.01" y2="20"></line>
                                            </svg>
                                            {{ $item['operator'] ?? '-' }}
                                        </span>
                                    </div>
                                </div>
                                
                                <!-- Price and Remove -->
                                <div class="flex items-center gap-4 w-full md:w-auto justify-between md:justify-end">
                                    <div class="font-black text-2xl text-[#FFC50F]">Rp {{ number_format($item['price'], 0, ',', '.') }}</div>
                                    <form method="POST" action="{{ route('cart.remove', $item['id']) }}">
                                        @csrf
                                        <button type="submit" class="flex items-center gap-2 px-4 py-2.5 bg-red-500 hover:bg-red-600 text-white rounded-xl font-bold text-sm shadow-md hover:shadow-lg hover:scale-105 transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                            Remove
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Cart Summary -->
                <div class="bg-white rounded-3xl shadow-xl border-2 border-gray-100 p-6 md:p-8 mb-8">
                    <h2 class="text-2xl font-black text-gray-900 mb-6 flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F]">
                            <line x1="12" y1="1" x2="12" y2="23"></line>
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                        </svg>
                        Order Summary
                    </h2>

                    <div class="space-y-3 mb-6">
                        <div class="flex items-center justify-between text-gray-700">
                            <span class="font-semibold">Subtotal ({{ count($cart) }} items)</span>
                            <span class="font-bold">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex items-center justify-between text-gray-700">
                            <span class="font-semibold">Service Fee</span>
                            <span class="font-bold text-green-600">FREE</span>
                        </div>
                        <div class="border-t-2 border-gray-200 pt-3">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-xl text-gray-900">Total Amount</span>
                                <span class="font-black text-3xl text-[#FFC50F]">Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('checkout') }}" class="w-full flex items-center justify-center gap-2 px-8 py-4 bg-gradient-to-r from-[#FFC50F] to-[#FFD700] text-black rounded-2xl font-black text-lg shadow-xl hover:shadow-2xl hover:scale-105 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                        Proceed to Checkout
                    </a>
                </div>

                <!-- Continue Shopping -->
                <div class="text-center">
                    <a href="/countries" class="inline-flex items-center gap-2 text-gray-700 hover:text-[#FFC50F] font-bold transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                        Continue Shopping
                    </a>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
