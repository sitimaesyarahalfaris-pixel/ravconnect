@extends('layouts.app')

@section('title', 'System Settings - RAVCONNECT')

@section('content')
<!-- Load Alpine.js for this page -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>

<div class="flex min-h-screen bg-gray-50">
    @include('admin.partials.sidebar')

    <main class="flex-1">
        <!-- Hero Header -->
        <div class="relative py-8 px-8 overflow-hidden">
            <!-- Animated Background -->
            <div class="absolute inset-0 overflow-hidden opacity-20">
                <div class="absolute -top-24 -right-24 w-96 h-96 bg-white rounded-full blur-3xl"></div>
                <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            </div>

            <div class="max-w-7xl mx-auto relative z-10">
                <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-black">System Settings</h1>
                <div class="text-sm text-gray-600">Logged in as: {{ auth()->user()->name }}</div>
            </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-8 py-12">

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

            <div class="grid grid-cols-1 gap-8">

                <!-- API Keys & Settings Section -->
                {{-- @if(!empty($settings))
                <div class="bg-white rounded-3xl shadow-xl border-2 border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-gray-900 to-black p-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-[#FFC50F] rounded-xl flex items-center justify-center shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-black text-white">API Keys & Configuration</h2>
                                <p class="text-sm text-gray-300 mt-1">Manage your system API keys and settings</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-8">
                        <form method="POST" action="{{ url('admin/system/settings/update') }}">
                            @csrf
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                @foreach($settings as $s)
                                <div class="group">
                                    <label class="block font-black text-gray-900 mb-2 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F]">
                                            <path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path>
                                        </svg>
                                        {{ ucwords(str_replace('_', ' ', $s->key)) }}
                                    </label>
                                    <div class="relative">
                                        <input type="text"
                                               name="settings[{{ $s->key }}]"
                                               class="w-full border-2 border-gray-300 rounded-xl px-4 py-3 focus:border-[#FFC50F] focus:outline-none transition-all font-mono text-sm group-hover:border-gray-400"
                                               value="{{ $s->value }}"
                                               placeholder="Enter {{ $s->key }}">
                                        <div class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="mt-8 flex justify-end">
                                <button type="submit" class="px-8 py-4 bg-gradient-to-r from-[#FFC50F] to-[#FFD700] text-black rounded-xl font-black shadow-lg hover:shadow-xl transition-all hover:scale-105 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                        <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                        <polyline points="7 3 7 8 15 8"></polyline>
                                    </svg>
                                    Save API Settings
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @endif --}}

                <!-- Payment Methods Section -->
                <div class="bg-white rounded-3xl shadow-xl border-2 border-gray-100 overflow-hidden" x-data="{ searchPayment: '' }">
                    <div class="bg-gradient-to-r from-[#FFC50F] to-[#FFD700] p-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-black rounded-xl flex items-center justify-center shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-black text-black">Payment Methods</h2>
                                <p class="text-sm text-black/80 mt-1">Enable or disable available payment options for customers</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-8">
                        <!-- Currently Active Payment Methods Display -->
                        @if(isset($availablePaymentMethods) && count($availablePaymentMethods) > 0)
                        <div class="mb-8 p-6 bg-gradient-to-r from-blue-50 to-blue-100 border-2 border-blue-300 rounded-2xl">
                            <div class="flex items-center gap-3 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                <h3 class="font-black text-blue-900">Currently Active Payment Methods ({{ count($availablePaymentMethods) }})</h3>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                @foreach($availablePaymentMethods as $activeMethod)
                                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-white border-2 border-blue-400 rounded-xl shadow-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-600">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="16 12 12 8 8 12"></polyline>
                                            <line x1="12" y1="16" x2="12" y2="8"></line>
                                        </svg>
                                        <span class="font-bold text-blue-900">{{ $activeMethod }}</span>
                                    </span>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <form method="POST" action="{{ url('admin/system/settings/update') }}">
                            @csrf

                            <!-- Search Bar -->
                            <div class="mb-6">
                                <div class="relative">
                                    <input type="text"
                                           x-model="searchPayment"
                                           placeholder="Search payment methods..."
                                           class="w-full border-2 border-gray-300 rounded-xl px-4 py-3 pl-12 focus:border-blue-500 focus:outline-none transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <path d="m21 21-4.35-4.35"></path>
                                    </svg>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
                                @foreach($paymentMethods as $method)
                                    @php
                                        $typeColors = [
                                            'qris' => 'from-purple-50 to-purple-100 border-purple-300',
                                            'va' => 'from-blue-50 to-blue-100 border-blue-300',
                                            'ewallet' => 'from-green-50 to-green-100 border-green-300',
                                            'retail' => 'from-orange-50 to-orange-100 border-orange-300',
                                        ];
                                        $color = $typeColors[$method['type']] ?? 'from-gray-50 to-gray-100 border-gray-300';
                                    @endphp
                                    <label class="bg-gradient-to-br {{ $color }} border-2 rounded-2xl p-4 cursor-pointer hover:shadow-lg transition-all group relative overflow-hidden"
                                           x-show="'{{ strtolower($method['name']) }}'.includes(searchPayment.toLowerCase()) || '{{ strtolower($method['type']) }}'.includes(searchPayment.toLowerCase())"
                                           x-transition>
                                        <div class="flex items-start gap-3">
                                            <input type="checkbox"
                                                   name="available_payment_methods[]"
                                                   value="{{ $method['metode'] }}"
                                                   {{ (isset($availablePaymentMethods) && in_array($method['metode'], $availablePaymentMethods)) ? 'checked' : '' }}
                                                   class="mt-1 w-5 h-5 text-[#FFC50F] border-gray-300 rounded focus:ring-[#FFC50F] cursor-pointer">
                                            <div class="flex-1">
                                                <div class="font-black text-gray-900">{{ $method['name'] }}</div>
                                                <div class="text-xs text-gray-600 mt-1 flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                        <circle cx="12" cy="7" r="4"></circle>
                                                    </svg>
                                                    {{ ucfirst($method['type']) }}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Checkmark overlay when selected -->
                                        <div class="absolute top-2 right-2 w-6 h-6 bg-green-500 rounded-full items-center justify-center hidden group-has-[:checked]:flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                                                <polyline points="20 6 9 17 4 12"></polyline>
                                            </svg>
                                        </div>
                                    </label>
                                @endforeach
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="px-8 py-4 bg-gradient-to-r from-[#FFC50F] to-[#FFD700] text-black rounded-xl font-black shadow-lg hover:shadow-xl transition-all hover:scale-105 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                        <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                        <polyline points="7 3 7 8 15 8"></polyline>
                                    </svg>
                                    Save Payment Methods
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Withdrawal Account Info Section -->
                <div class="bg-white rounded-3xl shadow-xl border-2 border-gray-100 overflow-hidden" x-data="{
                    bankSearch: '',
                    selectedBank: '{{ $withdrawalInfo['bank_name'] ?? '' }}',
                    showBankList: false
                }">
                    <div class="bg-gradient-to-r from-[#FFC50F] to-[#FFD700] p-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-black rounded-xl flex items-center justify-center shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                                    <line x1="12" y1="1" x2="12" y2="23"></line>
                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-black text-black">Akun Pencairan</h2>
                                <p class="text-sm text-black/80 mt-1">Atur akun pencairan anda disini</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-8">
                        <form method="POST" action="{{ route('admin.system.save_withdrawal_info') }}">
                            @csrf

                            <!-- Bank Selection -->
                            <div class="mb-6 p-6 bg-gradient-to-br from-gray-50 to-white rounded-2xl border-2 border-gray-200">
                                <label class="block font-black text-gray-900 mb-3 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-600">
                                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                    </svg>
                                    Pilih Bank / E-Wallet
                                </label>

                                <!-- Search Input -->
                                <div class="relative mb-4">
                                    <input type="text"
                                           x-model="bankSearch"
                                           @focus="showBankList = true"
                                           placeholder="Cari bank/ewallet (ketik untuk mencari)..."
                                           class="w-full border-2 border-gray-300 rounded-xl px-4 py-3 pl-12 focus:border-green-500 focus:outline-none transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <path d="m21 21-4.35-4.35"></path>
                                    </svg>
                                </div>

                                <!-- Bank List -->
                                <div x-show="showBankList"
                                     x-transition
                                     class="max-h-64 overflow-y-auto border-2 border-gray-300 rounded-xl bg-white shadow-lg">
                                    @foreach($bankList as $bank)
                                        <div class="bank-item cursor-pointer hover:bg-gradient-to-r hover:from-green-50 hover:to-green-100 p-4 border-b border-gray-100 last:border-0 transition-all group"
                                             data-bank-code="{{ $bank['bank_code'] }}"
                                             data-bank-name="{{ $bank['bank_name'] }}"
                                             x-show="'{{ strtolower($bank['bank_name']) }}'.includes(bankSearch.toLowerCase()) || '{{ strtolower($bank['bank_code']) }}'.includes(bankSearch.toLowerCase())"
                                             @click.stop="selectedBank = '{{ $bank['bank_name'] }}'; showBankList = false; bankSearch = ''; document.getElementById('withdraw_bank_code').value = '{{ $bank['bank_code'] }}'; document.getElementById('withdraw_bank_name').value = '{{ $bank['bank_name'] }}'">
                                            <div class="flex justify-between items-center">
                                                <div>
                                                    <div class="font-bold text-gray-900 group-hover:text-green-700 transition-colors">{{ $bank['bank_name'] }}</div>
                                                    <div class="text-xs text-gray-500 mt-1">Code: {{ $bank['bank_code'] }}</div>
                                                </div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400 group-hover:text-green-600 transition-colors">
                                                    <polyline points="9 18 15 12 9 6"></polyline>
                                                </svg>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Selected Bank Display -->
                                <div x-show="selectedBank"
                                     x-transition
                                     class="mt-4 p-4 bg-gradient-to-r from-green-50 to-green-100 border-2 border-green-300 rounded-xl">
                                    <div class="flex items-center gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-600">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        <span class="font-bold text-green-900">Selected: <span x-text="selectedBank"></span></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Hidden Inputs -->
                            <input type="hidden" id="withdraw_bank_code" name="withdraw_bank_code" value="{{ $withdrawalInfo['withdraw_bank_code'] ?? '' }}">
                            <input type="hidden" id="withdraw_bank_name" name="withdraw_bank_name" value="{{ $withdrawalInfo['withdraw_bank_name'] ?? '' }}">

                            <!-- Account Details -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block font-black text-gray-900 mb-2 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-600">
                                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                            <line x1="1" y1="10" x2="23" y2="10"></line>
                                        </svg>
                                        Nomor Rekening / E-Wallet
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text"
                                           name="withdraw_account_number"
                                           class="w-full border-2 border-gray-300 rounded-xl px-4 py-3 focus:border-green-500 focus:outline-none transition-all font-mono"
                                           value="{{ $withdrawalInfo['withdraw_account_number'] ?? '' }}"
                                           placeholder="08123456789 atau 1234567890"
                                           required>
                                </div>

                                <div>
                                    <label class="block font-black text-gray-900 mb-2 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-600">
                                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        Nama Pemilik Rekening
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text"
                                           name="withdraw_account_holder"
                                           class="w-full border-2 border-gray-300 rounded-xl px-4 py-3 focus:border-green-500 focus:outline-none transition-all"
                                           value="{{ $withdrawalInfo['withdraw_account_holder'] ?? '' }}"
                                           placeholder="John Doe"
                                           required>
                                </div>

                                <div>
                                    <label class="block font-black text-gray-900 mb-2 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-500">
                                            <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                                            <path d="m2 7 8.97 5.7a1.94 1.94 0 0 0 2.06 0L22 7"></path>
                                        </svg>
                                        Email (Opsional)
                                    </label>
                                    <input type="email"
                                           name="withdraw_email"
                                           class="w-full border-2 border-gray-300 rounded-xl px-4 py-3 focus:border-green-500 focus:outline-none transition-all"
                                           value="{{ $withdrawalInfo['withdraw_email'] ?? '' }}"
                                           placeholder="admin@example.com">
                                </div>

                                <div>
                                    <label class="block font-black text-gray-900 mb-2 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-500">
                                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                        </svg>
                                        No. Telepon (Opsional)
                                    </label>
                                    <input type="text"
                                           name="withdraw_phone"
                                           class="w-full border-2 border-gray-300 rounded-xl px-4 py-3 focus:border-green-500 focus:outline-none transition-all"
                                           value="{{ $withdrawalInfo['withdraw_phone'] ?? '' }}"
                                           placeholder="+62812345678">
                                </div>
                            </div>

                            <!-- Notes -->
                            {{-- <div class="mb-6">
                                <label class="block font-black text-gray-900 mb-2 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-500">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                    Catatan (Opsional)
                                </label>
                                <textarea name="withdraw_note"
                                          rows="4"
                                          class="w-full border-2 border-gray-300 rounded-xl px-4 py-3 focus:border-green-500 focus:outline-none transition-all resize-none"
                                          placeholder="Tambahkan catatan tambahan untuk informasi penarikan...">{{ $withdrawalInfo['withdraw_note'] ?? '' }}</textarea>
                            </div> --}}

                            <div class="flex justify-end">
                                <button type="submit" class="px-8 py-4 bg-gradient-to-r from-[#FFC50F] to-[#FFD700] text-black rounded-xl font-black shadow-lg hover:shadow-xl transition-all hover:scale-105 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                        <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                        <polyline points="7 3 7 8 15 8"></polyline>
                                    </svg>
                                    Save Akun Pencairan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </main>
</div>

<style>
    [x-cloak] { display: none !important; }

    /* Custom scrollbar */
    .overflow-y-auto::-webkit-scrollbar {
        width: 8px;
    }
    .overflow-y-auto::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    .overflow-y-auto::-webkit-scrollbar-thumb {
        background: #FFC50F;
        border-radius: 10px;
    }
    .overflow-y-auto::-webkit-scrollbar-thumb:hover {
        background: #FFD700;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const bankItems = document.querySelectorAll('.bank-item');
        const codeInput = document.getElementById('withdraw_bank_code');
        const nameInput = document.getElementById('withdraw_bank_name');

        bankItems.forEach(item => {
            item.addEventListener('click', function() {
                const code = this.getAttribute('data-bank-code');
                const name = this.getAttribute('data-bank-name');
                codeInput.value = code;
                nameInput.value = name;

                // Visual feedback
                bankItems.forEach(i => i.classList.remove('bg-green-100', 'border-green-500'));
                this.classList.add('bg-green-100', 'border-green-500');
            });
        });
    });
</script>
@endsection
