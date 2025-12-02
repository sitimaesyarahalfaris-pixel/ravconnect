@extends('layouts.app')

@section('title', 'Checkout - RAVCONNECT')

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
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                </svg>
                <span class="text-black font-bold text-sm">Secure Checkout</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-black text-black mb-3">Checkout</h1>
            <p class="text-lg text-black/80">Complete your purchase securely</p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="relative py-12 bg-gradient-to-b from-gray-50 to-white min-h-screen">
    <div class="max-w-4xl mx-auto px-4">
        
        <!-- Order Summary Card -->
        <div class="bg-white rounded-3xl shadow-xl border-2 border-gray-100 p-8 mb-8">
            <h2 class="text-2xl font-black text-gray-900 mb-6 flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F]">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
                Order Summary
            </h2>
            
            @php $cart = session('cart', []); $total = 0; @endphp
            @if(count($cart) === 0)
                <div class="text-center py-16">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                    </div>
                    <p class="text-gray-500 font-semibold">Your cart is empty</p>
                    <a href="/countries" class="inline-block mt-4 px-6 py-3 bg-gradient-to-r from-[#FFC50F] to-[#FFD700] text-black rounded-2xl font-bold shadow-lg hover:shadow-xl transition-all hover:scale-105">
                        Browse Products
                    </a>
                </div>
            @else
                <div class="space-y-4 mb-6">
                    @foreach($cart as $item)
                        @php $total += $item['price']; @endphp
                        <div class="flex items-center gap-4 bg-gradient-to-r from-gray-50 to-white rounded-2xl shadow-md p-5 border-2 border-gray-200 hover:border-[#FFC50F]/50 transition-all">
                            <div class="w-12 h-12 bg-gradient-to-br from-[#FFC50F] to-[#FFD700] rounded-xl flex items-center justify-center shadow-lg flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                                    <rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect>
                                    <line x1="12" y1="18" x2="12.01" y2="18"></line>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="font-black text-base text-gray-900 mb-1">{{ $item['name'] }}</div>
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
                            <div class="font-black text-xl text-[#FFC50F]">Rp {{ number_format($item['price'], 0, ',', '.') }}</div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Total -->
                <div class="border-t-2 border-gray-200 pt-6">
                    <div class="flex items-center justify-between bg-gradient-to-r from-[#FFC50F]/10 to-[#FFD700]/10 rounded-2xl p-6 border-2 border-[#FFC50F]/30">
                        <span class="font-bold text-xl text-gray-900">Total Amount:</span>
                        <span class="font-black text-3xl text-[#FFC50F]">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                </div>
            @endif
        </div>

        @if(count($cart) > 0)
        <!-- Payment Method Card -->
        <form method="POST" action="{{ route('checkout.process') }}" class="bg-white rounded-3xl shadow-xl border-2 border-gray-100 p-8">
            @csrf
            <h2 class="text-2xl font-black text-gray-900 mb-6 flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F]">
                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                    <line x1="1" y1="10" x2="23" y2="10"></line>
                </svg>
                Payment Method
            </h2>
            
            @php
                // Filter payment methods - only show QRIS Instant (not regular QRIS), ShopeePay and DANA
                $filteredMethods = collect($paymentMethods)
                    ->where('status', 'aktif')
                    ->filter(function($method) {
                        $type = strtolower($method['type']);
                        $name = strtolower($method['name'] ?? '');
                        $metode = strtolower($method['metode'] ?? '');
                        
                        // Show VA
                        if ($type === 'va') {
                            return true;
                        }
                        
                        // For e-wallets
                        if ($type === 'ewallet') {
                            // Show QRIS Instant but hide regular QRIS
                            if (str_contains($name, 'qris') || str_contains($metode, 'qris')) {
                                // Only allow if it contains "instant"
                                return str_contains($name, 'instant') || str_contains($metode, 'instant');
                            }
                            
                            // Show ShopeePay
                            if (str_contains($name, 'shopeepay') || str_contains($metode, 'shopeepay')) {
                                return true;
                            }
                            
                            // Show DANA
                            if (str_contains($name, 'dana') || str_contains($metode, 'dana')) {
                                return true;
                            }
                            
                            return false;
                        }
                        
                        // Hide bank transfers
                        return false;
                    });
                
                $groupOrder = ['ewallet', 'va'];
                $grouped = $filteredMethods
                    ->groupBy(fn($m) => strtolower($m['type']))
                    ->sortBy(fn($v, $k) => array_search($k, $groupOrder));
                
                $groupLabel = [
                    'ewallet' => 'Instant payment with E-Wallet',
                    'va' => 'Payment via Virtual Account',
                ];
                $groupTitle = [
                    'ewallet' => 'E-Wallet',
                    'va' => 'Virtual Account',
                ];
            @endphp
            
            <div class="space-y-8">
                @foreach($groupOrder as $group)
                    @if(isset($grouped[$group]))
                        <!-- Group Header -->
                        <div>
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-[#FFC50F] to-[#FFD700] rounded-xl flex items-center justify-center shadow-lg">
                                    @if($group === 'ewallet')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                            <line x1="1" y1="10" x2="23" y2="10"></line>
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                                            <rect x="2" y="7" width="20" height="15" rx="2" ry="2"></rect>
                                            <polyline points="17 2 12 7 7 2"></polyline>
                                        </svg>
                                    @endif
                                </div>
                                <div>
                                    <div class="font-black text-lg text-gray-900">{{ $groupTitle[$group] ?? ucfirst($group) }}</div>
                                    <div class="text-xs text-gray-600">{{ $groupLabel[$group] ?? '' }}</div>
                                </div>
                            </div>
                            
                            <!-- Payment Options -->
                            <div class="space-y-3">
                                @foreach($grouped[$group] as $method)
                                    @php
                                        $totalBiaya = $total + ($method['fee'] ?? 0) + round($total * (($method['fee_persen'] ?? 0) / 100));
                                        $displayName = $method['name'];
                                    @endphp
                                    <label class="group flex items-center gap-4 p-5 border-2 rounded-2xl cursor-pointer transition-all shadow-md hover:shadow-xl hover:scale-[1.02] {{ old('payment_method') == $method['metode'] ? 'border-[#FFC50F] bg-gradient-to-r from-yellow-50 to-white shadow-xl scale-[1.02]' : 'border-gray-200 bg-white hover:border-[#FFC50F]/50' }}">
                                        <input type="radio" name="payment_method" value="{{ $method['metode'] }}" class="w-5 h-5 text-[#FFC50F] focus:ring-[#FFC50F] focus:ring-2" {{ old('payment_method') == $method['metode'] ? 'checked' : '' }} required>
                                        
                                        <div class="w-16 h-16 rounded-xl bg-white border-2 border-gray-200 p-2 flex items-center justify-center group-hover:border-[#FFC50F]/50 transition-all {{ old('payment_method') == $method['metode'] ? 'border-[#FFC50F]' : '' }}">
                                            <img src="{{ $method['img_url'] }}" alt="{{ $displayName }}" class="w-full h-full object-contain">
                                        </div>
                                        
                                        <div class="flex-1">
                                            <div class="font-black text-base text-gray-900 mb-1">{{ $displayName }}</div>
                                            @if(($method['fee'] ?? 0) > 0 || ($method['fee_persen'] ?? 0) > 0)
                                                <div class="text-xs text-gray-500">
                                                    <span class="inline-flex items-center gap-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                            <path d="M12 16v-4"></path>
                                                            <path d="M12 8h.01"></path>
                                                        </svg>
                                                        Admin fee included
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                        
                                        <div class="text-right">
                                            <div class="font-black text-2xl text-[#FFC50F]">Rp {{ number_format($totalBiaya, 0, ',', '.') }}</div>
                                            @if(($method['fee'] ?? 0) > 0 || ($method['fee_persen'] ?? 0) > 0)
                                                <div class="text-xs text-gray-400 mt-1">+ Rp {{ number_format(($method['fee'] ?? 0) + round($total * (($method['fee_persen'] ?? 0) / 100)), 0, ',', '.') }} fee</div>
                                            @endif
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            
            <!-- Submit Button -->
            <button type="submit" class="w-full mt-8 bg-gradient-to-r from-[#FFC50F] to-[#FFD700] text-black py-4 rounded-2xl font-black text-lg shadow-xl hover:shadow-2xl hover:scale-105 transition-all flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                </svg>
                Continue to Payment
            </button>
            
            <!-- Trust Badges -->
            <div class="mt-6 flex items-center justify-center gap-6 text-xs text-gray-500">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-600">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                    <span class="font-semibold">Secure Payment</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                    <span class="font-semibold">Encrypted</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-purple-600">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    <span class="font-semibold">Trusted</span>
                </div>
            </div>
        </form>
        @endif
    </div>
</section>
@endsection