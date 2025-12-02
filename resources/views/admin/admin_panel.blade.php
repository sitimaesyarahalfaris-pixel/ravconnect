@extends('layouts.app')

@section('title', 'Admin Panel - RAVCONNECT')

@section('content')
<div class="flex min-h-screen">
    @include('admin.partials.sidebar')

    <!-- Main Content -->
    <main class="flex-1 bg-gray-50 py-12 px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-black text-gray-900">Dashboard Overview</h1>
                    <p class="text-gray-600 mt-1">Welcome back, {{ auth()->user()->name }}! Here's your business summary.</p>
                </div>
                <div class="text-sm text-gray-600 bg-white px-4 py-2 rounded-lg shadow">
                    <span class="font-semibold">Last updated:</span> {{ now()->format('d M Y, H:i') }}
                </div>
            </div>

            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="mb-6 p-4 rounded-xl bg-green-100 border-2 border-green-300 text-green-800 font-bold flex items-center justify-between">
                    <span>✓ {{ session('success') }}</span>
                    <button onclick="this.parentElement.remove()" class="text-green-600 hover:text-green-800">&times;</button>
                </div>
            @endif
            @if(session('error'))
                <div class="mb-6 p-4 rounded-xl bg-red-100 border-2 border-red-300 text-red-800 font-bold flex items-center justify-between">
                    <span>✗ {{ session('error') }}</span>
                    <button onclick="this.parentElement.remove()" class="text-red-600 hover:text-red-800">&times;</button>
                </div>
            @endif

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Orders Card -->
                <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-xl border-2 border-[#FFC50F]/30 p-6 hover:shadow-2xl transition-all hover:scale-105">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-gradient-to-br from-[#FFC50F] to-[#FFD700] rounded-xl shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-gray-400 uppercase">Total</span>
                    </div>
                    <div class="text-3xl font-black text-gray-900 mb-1">{{ number_format($stats['orders_total'] ?? 0) }}</div>
                    <div class="text-sm text-gray-600 font-semibold">Total Orders</div>
                </div>

                <!-- Pending Orders Card -->
                <div class="bg-gradient-to-br from-white to-blue-50 rounded-2xl shadow-xl border-2 border-blue-300/30 p-6 hover:shadow-2xl transition-all hover:scale-105">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-gradient-to-br from-blue-400 to-blue-500 rounded-xl shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-blue-400 uppercase">Pending</span>
                    </div>
                    <div class="text-3xl font-black text-blue-600 mb-1">{{ number_format($stats['orders_pending'] ?? 0) }}</div>
                    <div class="text-sm text-gray-600 font-semibold">Awaiting Payment</div>
                </div>

                <!-- Paid Orders Card -->
                <div class="bg-gradient-to-br from-white to-green-50 rounded-2xl shadow-xl border-2 border-green-300/30 p-6 hover:shadow-2xl transition-all hover:scale-105">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-gradient-to-br from-green-400 to-green-500 rounded-xl shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-green-400 uppercase">Success</span>
                    </div>
                    <div class="text-3xl font-black text-green-600 mb-1">{{ number_format($stats['orders_paid'] ?? 0) }}</div>
                    <div class="text-sm text-gray-600 font-semibold">Completed Orders</div>
                </div>

                <!-- Expired Orders Card -->
                <div class="bg-gradient-to-br from-white to-gray-100 rounded-2xl shadow-xl border-2 border-gray-300/30 p-6 hover:shadow-2xl transition-all hover:scale-105">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-gradient-to-br from-gray-400 to-gray-500 rounded-xl shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="15" y1="9" x2="9" y2="15"></line>
                                <line x1="9" y1="9" x2="15" y2="15"></line>
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-gray-400 uppercase">Expired</span>
                    </div>
                    <div class="text-3xl font-black text-gray-600 mb-1">{{ number_format($stats['orders_expired'] ?? 0) }}</div>
                    <div class="text-sm text-gray-600 font-semibold">Expired Orders</div>
                </div>
            </div>

            <!-- Secondary Stats Row -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Revenue Card -->
                <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl shadow-xl p-6 text-white hover:shadow-2xl transition-all hover:scale-105">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-white/20 backdrop-blur-sm rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-bold uppercase opacity-80">Revenue</span>
                    </div>
                    <div class="text-2xl font-black mb-1">Rp {{ number_format($stats['revenue_total'] ?? 0, 0, ',', '.') }}</div>
                    <div class="text-sm opacity-90 font-semibold">Total Revenue</div>
                </div>

                <!-- Products Card -->
                <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl shadow-xl p-6 text-white hover:shadow-2xl transition-all hover:scale-105">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-white/20 backdrop-blur-sm rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="7" width="20" height="15" rx="2" ry="2"></rect>
                                <polyline points="17 2 12 7 7 2"></polyline>
                            </svg>
                        </div>
                        <span class="text-xs font-bold uppercase opacity-80">Products</span>
                    </div>
                    <div class="text-2xl font-black mb-1">{{ number_format($stats['products_total'] ?? 0) }}</div>
                    <div class="text-sm opacity-90 font-semibold">Available Products</div>
                </div>

                <!-- Stock Card -->
                <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl shadow-xl p-6 text-white hover:shadow-2xl transition-all hover:scale-105">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-white/20 backdrop-blur-sm rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>
                        </div>
                        <span class="text-xs font-bold uppercase opacity-80">Inventory</span>
                    </div>
                    <div class="text-2xl font-black mb-1">{{ number_format($stats['stock_total'] ?? 0) }}</div>
                    <div class="text-sm opacity-90 font-semibold">eSIM Stock Available</div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-2xl shadow-xl border-2 border-[#FFC50F]/30 p-8 mb-8">
                <h2 class="text-2xl font-black text-gray-900 mb-6 flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F]">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                    Quick Actions
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a href="{{ route('admin.products.index') }}" class="flex items-center gap-4 p-4 bg-gradient-to-r from-[#FFC50F]/10 to-[#FFD700]/10 border-2 border-[#FFC50F]/30 rounded-xl hover:shadow-lg transition-all hover:scale-105 group">
                        <div class="p-3 bg-gradient-to-br from-[#FFC50F] to-[#FFD700] rounded-xl shadow-lg group-hover:scale-110 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                                <rect x="2" y="7" width="20" height="15" rx="2" ry="2"></rect>
                                <polyline points="17 2 12 7 7 2"></polyline>
                            </svg>
                        </div>
                        <div>
                            <div class="font-black text-gray-900">Manage Products</div>
                            <div class="text-xs text-gray-600">Add or edit products</div>
                        </div>
                    </a>

                    <a href="{{ route('admin.orders.index') }}" class="flex items-center gap-4 p-4 bg-gradient-to-r from-blue-100/50 to-blue-200/50 border-2 border-blue-300/30 rounded-xl hover:shadow-lg transition-all hover:scale-105 group">
                        <div class="p-3 bg-gradient-to-br from-blue-400 to-blue-500 rounded-xl shadow-lg group-hover:scale-110 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                <line x1="1" y1="10" x2="23" y2="10"></line>
                            </svg>
                        </div>
                        <div>
                            <div class="font-black text-gray-900">View Orders</div>
                            <div class="text-xs text-gray-600">Check order status</div>
                        </div>
                    </a>

                    <a href="{{ route('admin.users.index') }}" class="flex items-center gap-4 p-4 bg-gradient-to-r from-purple-100/50 to-purple-200/50 border-2 border-purple-300/30 rounded-xl hover:shadow-lg transition-all hover:scale-105 group">
                        <div class="p-3 bg-gradient-to-br from-purple-400 to-purple-500 rounded-xl shadow-lg group-hover:scale-110 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="font-black text-gray-900">Manage Users</div>
                            <div class="text-xs text-gray-600">User management</div>
                        </div>
                    </a>

                    
                </div>
            </div>

            <!-- Recent Activity / System Status -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- System Status -->
                <div class="bg-white rounded-2xl shadow-xl border-2 border-[#FFC50F]/30 p-6">
                    <h3 class="text-xl font-black text-gray-900 mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F]">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                        System Status
                    </h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg border border-green-200">
                            <div class="flex items-center gap-3">
                                <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                                <span class="font-bold text-gray-700">API Connection</span>
                            </div>
                            <span class="text-xs font-bold text-green-600 bg-green-100 px-3 py-1 rounded-full">Online</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg border border-green-200">
                            <div class="flex items-center gap-3">
                                <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                                <span class="font-bold text-gray-700">Database</span>
                            </div>
                            <span class="text-xs font-bold text-green-600 bg-green-100 px-3 py-1 rounded-full">Connected</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg border border-blue-200">
                            <div class="flex items-center gap-3">
                                <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                                <span class="font-bold text-gray-700">Payment Gateway</span>
                            </div>
                            <span class="text-xs font-bold text-blue-600 bg-blue-100 px-3 py-1 rounded-full">Active</span>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="bg-white rounded-2xl shadow-xl border-2 border-[#FFC50F]/30 p-6">
                    <h3 class="text-xl font-black text-gray-900 mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F]">
                            <line x1="12" y1="20" x2="12" y2="10"></line>
                            <line x1="18" y1="20" x2="18" y2="4"></line>
                            <line x1="6" y1="20" x2="6" y2="16"></line>
                        </svg>
                        Business Metrics
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-bold text-gray-600">Order Success Rate</span>
                                <span class="text-sm font-black text-green-600">
                                    {{ $stats['orders_total'] > 0 ? number_format(($stats['orders_paid'] / $stats['orders_total']) * 100, 1) : 0 }}%
                                </span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-gradient-to-r from-green-400 to-green-600 h-2.5 rounded-full transition-all" style="width: {{ $stats['orders_total'] > 0 ? ($stats['orders_paid'] / $stats['orders_total']) * 100 : 0 }}%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-bold text-gray-600">Stock Level</span>
                                <span class="text-sm font-black text-[#FFC50F]">{{ number_format($stats['stock_total'] ?? 0) }} units</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-gradient-to-r from-[#FFC50F] to-[#FFD700] h-2.5 rounded-full transition-all" style="width: {{ min(100, ($stats['stock_total'] ?? 0) / 10) }}%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-bold text-gray-600">Active Products</span>
                                <span class="text-sm font-black text-purple-600">{{ number_format($stats['products_total'] ?? 0) }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-gradient-to-r from-purple-400 to-purple-600 h-2.5 rounded-full transition-all" style="width: {{ min(100, ($stats['products_total'] ?? 0) * 10) }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
