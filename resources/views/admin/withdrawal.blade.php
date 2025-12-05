@extends('layouts.app')

@section('title', 'Admin Withdrawal - RAVCONNECT')

@section('content')
<!-- Load Alpine.js for this page -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>

<div class="flex min-h-screen bg-gray-50">
    @include('admin.partials.sidebar')

    <main class="flex-1">
        <!-- Hero Header -->
        <div class="relative bg-gradient-to-br from-[#FFC50F] via-[#FFD700] to-[#FFA500] py-12 px-8 overflow-hidden">
            <!-- Animated Background -->
            <div class="absolute inset-0 overflow-hidden opacity-20">
                <div class="absolute -top-24 -right-24 w-96 h-96 bg-white rounded-full blur-3xl"></div>
                <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            </div>

            <div class="max-w-7xl mx-auto relative z-10">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="inline-flex items-center gap-2 bg-black/10 backdrop-blur-sm px-4 py-2 rounded-full border-2 border-black/20 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                            <span class="text-black font-bold text-sm">Withdrawal Management</span>
                        </div>
                        <h1 class="text-4xl md:text-5xl font-black text-black mb-2">Pencairan Dana</h1>
                        <p class="text-lg text-black/80">Withdraw your revenue to your registered bank account</p>
                    </div>
                    <div class="hidden lg:flex items-center gap-3 bg-white/20 backdrop-blur-sm px-6 py-3 rounded-2xl border-2 border-white/40">
                        <div class="w-10 h-10 bg-gradient-to-br from-black to-gray-800 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <div>
                            <div class="text-xs text-black/70">Logged in as</div>
                            <div class="font-black text-black">{{ auth()->user()->name }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-5xl mx-auto px-8 py-12">

            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="mb-8 p-6 bg-gradient-to-r from-green-50 to-green-100 border-2 border-green-300 rounded-2xl shadow-xl" x-data="{ show: true }" x-show="show" x-transition>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <div class="font-black text-green-900 text-lg">{{ session('success') }}</div>
                        </div>
                        <button @click="show = false" class="text-green-700 hover:text-green-900">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-8 p-6 bg-gradient-to-r from-red-50 to-red-100 border-2 border-red-300 rounded-2xl shadow-xl" x-data="{ show: true }" x-show="show" x-transition>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                </svg>
                            </div>
                            <div class="font-black text-red-900 text-base">{{ session('error') }}</div>
                        </div>
                        <button @click="show = false" class="text-red-700 hover:text-red-900">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            <!-- Available Revenue Card -->
            <div class="mb-8 bg-gradient-to-br from-green-500 via-green-600 to-green-700 rounded-3xl shadow-2xl border-2 border-green-400 overflow-hidden relative">
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute -top-12 -right-12 w-64 h-64 bg-white rounded-full blur-3xl"></div>
                    <div class="absolute -bottom-12 -left-12 w-64 h-64 bg-white rounded-full blur-3xl"></div>
                </div>

                <div class="p-8 relative z-10">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center border-2 border-white/40">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                        <line x1="1" y1="10" x2="23" y2="10"></line>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-white/80 text-sm font-bold">Total Revenue Tersedia</p>
                                    <h2 class="text-4xl font-black text-white">Rp {{ number_format($revenue, 0, ',', '.') }}</h2>
                                </div>
                            </div>
                            <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full border border-white/40">
                                <div class="w-2 h-2 bg-green-200 rounded-full animate-pulse"></div>
                                <span class="text-white text-xs font-bold">Available for withdrawal</span>
                            </div>
                        </div>
                        <div class="hidden md:block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="text-white/20">
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Withdrawal Account Information Card -->
            @if(isset($withdrawalInfo) && !empty($withdrawalInfo['bank_code']))
            <div class="mb-8 bg-white rounded-3xl shadow-xl border-2 border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-[#FFC50F] to-[#FFD700] p-6">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-black rounded-xl flex items-center justify-center shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-black text-black">Withdrawal Account</h2>
                            <p class="text-sm text-black/80 mt-1">Your registered withdrawal destination</p>
                        </div>
                    </div>
                </div>

                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Bank/E-Wallet Info -->
                        <div class="p-5 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl border-2 border-blue-200">
                            <div class="flex items-center gap-2 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600">
                                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                </svg>
                                <span class="text-sm font-bold text-blue-900">Bank / E-Wallet</span>
                            </div>
                            <div class="font-black text-xl text-blue-900">{{ $withdrawalInfo['bank_name'] }}</div>
                            <div class="text-xs text-blue-700 mt-1 font-mono">Code: {{ $withdrawalInfo['bank_code'] }}</div>
                        </div>

                        <!-- Account Number -->
                        <div class="p-5 bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl border-2 border-purple-200">
                            <div class="flex items-center gap-2 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-purple-600">
                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                </svg>
                                <span class="text-sm font-bold text-purple-900">Account Number</span>
                            </div>
                            <div class="font-black text-xl text-purple-900 font-mono">{{ $withdrawalInfo['account_number'] }}</div>
                        </div>

                        <!-- Account Holder -->
                        <div class="p-5 bg-gradient-to-br from-green-50 to-green-100 rounded-2xl border-2 border-green-200">
                            <div class="flex items-center gap-2 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-600">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <span class="text-sm font-bold text-green-900">Account Holder</span>
                            </div>
                            <div class="font-black text-xl text-green-900">{{ $withdrawalInfo['account_holder'] }}</div>
                        </div>

                        <!-- Additional Info -->
                        <div class="p-5 bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl border-2 border-gray-200">
                            <div class="flex items-center gap-2 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-600">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                </svg>
                                <span class="text-sm font-bold text-gray-900">Contact Info</span>
                            </div>
                            @if(!empty($withdrawalInfo['email']))
                                <div class="text-sm text-gray-700 mb-1">
                                    <span class="font-bold">Email:</span> {{ $withdrawalInfo['email'] }}
                                </div>
                            @endif
                            @if(!empty($withdrawalInfo['phone']))
                                <div class="text-sm text-gray-700">
                                    <span class="font-bold">Phone:</span> {{ $withdrawalInfo['phone'] }}
                                </div>
                            @endif
                            @if(empty($withdrawalInfo['email']) && empty($withdrawalInfo['phone']))
                                <div class="text-sm text-gray-500 italic">No contact info</div>
                            @endif
                        </div>
                    </div>

                    @if(!empty($withdrawalInfo['note']))
                    <div class="mt-6 p-4 bg-yellow-50 border-2 border-yellow-200 rounded-xl">
                        <div class="flex items-start gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-yellow-600 mt-0.5">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                            <div>
                                <div class="font-bold text-yellow-900 text-sm mb-1">Note:</div>
                                <div class="text-yellow-800 text-sm">{{ $withdrawalInfo['note'] }}</div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @else
            <!-- No Withdrawal Account Set -->
            <div class="mb-8 p-8 bg-gradient-to-r from-orange-50 to-orange-100 border-2 border-orange-300 rounded-3xl shadow-xl">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 bg-orange-500 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-black text-orange-900 text-xl mb-2">No Withdrawal Account Set</h3>
                        <p class="text-orange-800 mb-4">Please configure your withdrawal account in System Settings before requesting a withdrawal.</p>
                        <a href="{{ url('admin/system/settings') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-orange-600 to-orange-700 text-white rounded-xl font-black shadow-lg hover:shadow-xl transition-all hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                            Go to System Settings
                        </a>
                    </div>
                </div>
            </div>
            @endif

            <!-- Withdrawal Form -->
            @if(isset($withdrawalInfo) && !empty($withdrawalInfo['bank_code']))
            <div class="bg-white rounded-3xl shadow-xl border-2 border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-gray-900 to-black p-6">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-[#FFC50F] rounded-xl flex items-center justify-center shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                                <path d="M21 12V7H5a2 2 0 0 1 0-4h14v4"></path>
                                <path d="M3 5v14a2 2 0 0 0 2 2h16v-5"></path>
                                <path d="M18 12a2 2 0 0 0 0 4h4v-4Z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-black text-white">Request Withdrawal</h2>
                            <p class="text-sm text-gray-300 mt-1">Enter the amount you want to withdraw</p>
                        </div>
                    </div>
                </div>

                <div class="p-8">
                    <form id="admin-withdrawal-form" method="POST" action="{{ route('admin.withdrawal.submit') }}">
                        @csrf

                        <!-- Amount Input -->
                        <div class="mb-8">
                            <label for="nominal" class="block font-black text-gray-900 mb-3 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F]">
                                    <line x1="12" y1="1" x2="12" y2="23"></line>
                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                </svg>
                                Nominal Pencairan (Rp)
                                <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-black text-lg">Rp</div>
                                <input type="number"
                                       name="nominal"
                                       id="nominal"
                                       class="w-full border-2 border-gray-300 rounded-xl px-4 py-4 pl-14 text-xl font-black focus:border-[#FFC50F] focus:outline-none transition-all"
                                       min="10000"
                                       max="{{ $revenue }}"
                                       placeholder="0"
                                       required
                                       oninput="formatCurrency(this)">
                            </div>
                            <div class="mt-2 flex items-center gap-2 text-sm text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                </svg>
                                <span>Minimum: Rp 10.000 | Maximum: Rp {{ number_format($revenue, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <!-- Quick Amount Buttons -->
                        <div class="mb-8">
                            <label class="block font-black text-gray-900 mb-3">Quick Amount Selection</label>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                @php
                                    $quickAmounts = [100000, 250000, 500000, 1000000];
                                @endphp
                                @foreach($quickAmounts as $amount)
                                    @if($amount <= $revenue)
                                    <button type="button"
                                            onclick="setAmount({{ $amount }})"
                                            class="px-4 py-3 bg-gradient-to-r from-gray-100 to-gray-200 border-2 border-gray-300 rounded-xl font-bold text-gray-900 hover:from-[#FFC50F] hover:to-[#FFD700] hover:border-[#FFC50F] hover:text-black transition-all hover:scale-105 shadow-sm">
                                        Rp {{ number_format($amount, 0, ',', '.') }}
                                    </button>
                                    @endif
                                @endforeach
                                @if($revenue > 0)
                                <button type="button"
                                        onclick="setAmount({{ $revenue }})"
                                        class="px-4 py-3 bg-gradient-to-r from-green-100 to-green-200 border-2 border-green-400 rounded-xl font-bold text-green-900 hover:from-green-500 hover:to-green-600 hover:text-white transition-all hover:scale-105 shadow-sm">
                                    All (Rp {{ number_format($revenue, 0, ',', '.') }})
                                </button>
                                @endif
                            </div>
                        </div>

                        <!-- Optional Note -->
                        <div class="mb-8">
                            <label for="note" class="block font-black text-gray-900 mb-3 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-500">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                                Catatan (Optional)
                            </label>
                            <textarea name="note"
                                      id="note"
                                      rows="4"
                                      class="w-full border-2 border-gray-300 rounded-xl px-4 py-3 focus:border-[#FFC50F] focus:outline-none transition-all resize-none"
                                      placeholder="Tambahkan catatan untuk pencairan ini (opsional)..."></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit" class="px-8 py-4 bg-gradient-to-r from-[#FFC50F] to-[#FFD700] text-black rounded-xl font-black shadow-lg hover:shadow-xl transition-all hover:scale-105 flex items-center gap-2 text-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 12V7H5a2 2 0 0 1 0-4h14v4"></path>
                                    <path d="M3 5v14a2 2 0 0 0 2 2h16v-5"></path>
                                    <path d="M18 12a2 2 0 0 0 0 4h4v-4Z"></path>
                                </svg>
                                Request Withdrawal
                            </button>
                        </div>
                    </form>

                    <!-- Result Display -->
                    <div id="admin-withdrawal-result" class="mt-8"></div>
                </div>
            </div>
            @endif

        </div>
    </main>
</div>

<style>
    [x-cloak] { display: none !important; }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }

    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
</style>

<script>
    function setAmount(amount) {
        document.getElementById('nominal').value = amount;
    }

    function formatCurrency(input) {
        // Remove non-numeric characters
        let value = input.value.replace(/[^0-9]/g, '');
        input.value = value;
    }

    document.getElementById('admin-withdrawal-form').addEventListener('submit', async function(e) {
        e.preventDefault();
        const form = e.target;
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalBtnText = submitBtn.innerHTML;

        // Disable button and show loading
        submitBtn.disabled = true;
        submitBtn.innerHTML = `
            <svg class="animate-spin h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Processing...
        `;

        const data = new FormData(form);

        try {
            const res = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value,
                    'Accept': 'application/json',
                },
                body: data
            });

            const result = await res.json();
            let html = '';

            if(result.status) {
                html = `
                    <div class='p-6 bg-gradient-to-r from-green-50 to-green-100 border-2 border-green-300 rounded-2xl shadow-xl'>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-black text-green-900 text-xl mb-2">${result.message}</h3>
                                ${result.data ? `
                                    <div class="space-y-2 mt-4">
                                        <div class="p-4 bg-white rounded-xl border border-green-200">
                                            <div class="grid grid-cols-2 gap-4 text-sm">
                                                <div>
                                                    <span class="text-gray-600">Transaction ID:</span>
                                                    <div class="font-black text-gray-900 font-mono">${result.data.id || '-'}</div>
                                                </div>
                                                <div>
                                                    <span class="text-gray-600">Reference ID:</span>
                                                    <div class="font-black text-gray-900 font-mono">${result.data.reff_id || '-'}</div>
                                                </div>
                                                <div>
                                                    <span class="text-gray-600">Amount:</span>
                                                    <div class="font-black text-green-700">Rp ${result.data.nominal ? result.data.nominal.toLocaleString('id-ID') : '0'}</div>
                                                </div>
                                                <div>
                                                    <span class="text-gray-600">Fee:</span>
                                                    <div class="font-black text-gray-900">Rp ${result.data.fee ? result.data.fee.toLocaleString('id-ID') : '0'}</div>
                                                </div>
                                                <div>
                                                    <span class="text-gray-600">Total:</span>
                                                    <div class="font-black text-green-700">Rp ${result.data.total ? result.data.total.toLocaleString('id-ID') : '0'}</div>
                                                </div>
                                                <div>
                                                    <span class="text-gray-600">Status:</span>
                                                    <div class="font-black text-yellow-700 uppercase">${result.data.status || 'pending'}</div>
                                                </div>
                                            </div>
                                        </div>
                                        ${result.data.created_at ? `
                                            <div class="text-xs text-gray-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="inline">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <polyline points="12 6 12 12 16 14"></polyline>
                                                </svg>
                                                Created at: ${result.data.created_at}
                                            </div>
                                        ` : ''}
                                    </div>
                                ` : ''}
                            </div>
                        </div>
                    </div>
                `;

                // Reset form
                form.reset();

                // Scroll to result
                setTimeout(() => {
                    document.getElementById('admin-withdrawal-result').scrollIntoView({ behavior: 'smooth' });
                }, 100);

            } else {
                html = `
                    <div class='p-6 bg-gradient-to-r from-red-50 to-red-100 border-2 border-red-300 rounded-2xl shadow-xl'>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-black text-red-900 text-lg">${result.message || 'Terjadi kesalahan.'}</h3>
                            </div>
                        </div>
                    </div>
                `;
            }

            document.getElementById('admin-withdrawal-result').innerHTML = html;

        } catch (error) {
            document.getElementById('admin-withdrawal-result').innerHTML = `
                <div class='p-6 bg-gradient-to-r from-red-50 to-red-100 border-2 border-red-300 rounded-2xl shadow-xl'>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="15" y1="9" x2="9" y2="15"></line>
                                <line x1="9" y1="9" x2="15" y2="15"></line>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-black text-red-900 text-lg">Network error occurred.</h3>
                            <p class="text-red-800 text-sm mt-1">Please check your connection and try again.</p>
                        </div>
                    </div>
                </div>
            `;
        } finally {
            // Re-enable button
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnText;
        }
    });
</script>
@endsection
    