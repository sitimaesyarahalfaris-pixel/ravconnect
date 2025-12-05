@extends('layouts.app')

@section('title', 'Manage Orders - RAVCONNECT')

@section('content')
<div class="flex min-h-screen">
    @include('admin.partials.sidebar')

    <main class="flex-1 bg-gray-50 py-12 px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-black text-gray-900">Order Management</h1>
                    <p class="text-gray-600 mt-1">Track and manage all customer orders</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="text-sm text-gray-600 bg-white px-4 py-2 rounded-lg shadow">
                        <span class="font-semibold">Logged in as:</span> {{ auth()->user()->name }}
                    </div>
                    <form method="GET" action="{{ route('admin.orders.export') }}" target="_blank">
                        <button type="submit" class="flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-[#FFC50F] to-[#FFD700] text-black font-bold rounded-lg shadow-lg hover:shadow-xl transition-all hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                                <rect x="6" y="14" width="12" height="8"></rect>
                            </svg>
                            Export
                        </button>
                    </form>
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

            <!-- Search and Filter Bar -->
            <div class="bg-white rounded-2xl shadow-xl border-2 border-[#FFC50F]/30 p-6 mb-8">
                <form method="GET" action="{{ route('admin.orders.index') }}" class="flex flex-col md:flex-row gap-4">
                    <!-- Search Input -->
                    <div class="flex-1">
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="m21 21-4.35-4.35"></path>
                            </svg>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by ID, name, email, or WhatsApp..." class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#FFC50F] focus:outline-none font-semibold">
                        </div>
                    </div>

                    <!-- Status Filter -->
                    <div class="w-full md:w-48">
                        <select name="status" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#FFC50F] focus:outline-none font-semibold">
                            <option value="">All Status</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="expired" {{ request('status') == 'expired' ? 'selected' : '' }}>Expired</option>
                            <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>

                    <!-- Date Filter -->
                    <div class="w-full md:w-48">
                        <input type="date" name="date" value="{{ request('date') }}" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#FFC50F] focus:outline-none font-semibold">
                    </div>

                    <!-- Filter Button -->
                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-[#FFC50F] to-[#FFD700] text-black font-bold rounded-xl shadow-lg hover:shadow-xl transition-all hover:scale-105 flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                        </svg>
                        Filter
                    </button>

                    <!-- Reset Button -->
                    @if(request()->hasAny(['search', 'status', 'date']))
                        <a href="{{ route('admin.orders.index') }}" class="px-6 py-3 bg-gray-200 text-gray-700 font-bold rounded-xl shadow hover:shadow-lg transition-all hover:scale-105 flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"></path>
                                <path d="M21 3v5h-5"></path>
                                <path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"></path>
                                <path d="M3 21v-5h5"></path>
                            </svg>
                            Reset
                        </a>
                    @endif
                </form>
            </div>

            <!-- Orders Table -->
            <div class="bg-white rounded-2xl shadow-xl border-2 border-[#FFC50F]/30 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gradient-to-r from-[#FFC50F]/20 to-[#FFD700]/20">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-black text-gray-900 uppercase tracking-wider">
                                    Order ID
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-black text-gray-900 uppercase tracking-wider">
                                    Customer
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-black text-gray-900 uppercase tracking-wider">
                                    Product
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-black text-gray-900 uppercase tracking-wider">
                                    Amount
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-black text-gray-900 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-black text-gray-900 uppercase tracking-wider">
                                    Delivery
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-black text-gray-900 uppercase tracking-wider">
                                    Date
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-black text-gray-900 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse($orders as $order)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <!-- Order ID -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-black text-gray-900">#{{ $order->id }}</div>
                                    </div>
                                </td>

                                <!-- Customer -->
                                <td class="px-6 py-4">
                                    <div class="text-sm">
                                        <div class="font-bold text-gray-900">{{ $order->name }}</div>
                                        <div class="text-xs text-gray-600">{{ $order->email }}</div>
                                        @if($order->whatsapp)
                                            <div class="text-xs text-gray-500 flex items-center gap-1 mt-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                                </svg>
                                                {{ $order->whatsapp }}
                                            </div>
                                        @endif
                                    </div>
                                </td>

                                <!-- Product -->
                                <td class="px-6 py-4">
                                    <div class="text-sm">
                                        <div class="font-bold text-gray-900">{{ $order->product ? $order->product->name : ($order->product_id ? \App\Models\Product::find($order->product_id)->name : '-') }}</div>
                                        @if($order->product)
                                            <div class="text-xs text-gray-600">{{ $order->product->quota }} · {{ $order->product->validity }} days</div>
                                        @endif
                                    </div>
                                </td>

                                <!-- Amount -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-black text-gray-900">Rp {{ number_format($order->total ?? $order->price, 0, ',', '.') }}</div>
                                </td>

                                <!-- Payment Status -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($order->status === 'paid')
                                        <span class="px-3 py-1 inline-flex items-center gap-1 text-xs font-bold rounded-full bg-green-100 text-green-800 border border-green-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <polyline points="20 6 9 17 4 12"></polyline>
                                            </svg>
                                            Paid
                                        </span>
                                    @elseif($order->status === 'pending')
                                        <span class="px-3 py-1 inline-flex items-center gap-1 text-xs font-bold rounded-full bg-blue-100 text-blue-800 border border-blue-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <polyline points="12 6 12 12 16 14"></polyline>
                                            </svg>
                                            Pending
                                        </span>
                                    @elseif($order->status === 'expired')
                                        <span class="px-3 py-1 inline-flex items-center gap-1 text-xs font-bold rounded-full bg-gray-100 text-gray-800 border border-gray-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <line x1="15" y1="9" x2="9" y2="15"></line>
                                                <line x1="9" y1="9" x2="15" y2="15"></line>
                                            </svg>
                                            Expired
                                        </span>
                                    @else
                                        <span class="px-3 py-1 inline-flex items-center gap-1 text-xs font-bold rounded-full bg-red-100 text-red-800 border border-red-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                            </svg>
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    @endif
                                </td>

                                <!-- Delivery Status -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($order->delivery_status === 'delivered')
                                        <span class="px-3 py-1 inline-flex items-center gap-1 text-xs font-bold rounded-full bg-green-100 text-green-800 border border-green-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <rect x="1" y="3" width="15" height="13"></rect>
                                                <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                                <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                                <circle cx="18.5" cy="18.5" r="2.5"></circle>
                                            </svg>
                                            Delivered
                                        </span>
                                    @elseif($order->delivery_status === 'processing')
                                        <span class="px-3 py-1 inline-flex items-center gap-1 text-xs font-bold rounded-full bg-yellow-100 text-yellow-800 border border-yellow-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <polyline points="12 6 12 12 16 14"></polyline>
                                            </svg>
                                            Processing
                                        </span>
                                    @else
                                        <span class="px-3 py-1 inline-flex items-center gap-1 text-xs font-bold rounded-full bg-gray-100 text-gray-800 border border-gray-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="12" cy="12" r="10"></circle>
                                            </svg>
                                            Pending
                                        </span>
                                    @endif
                                </td>

                                <!-- Date -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 font-semibold">{{ $order->created_at->format('d M Y') }}</div>
                                    <div class="text-xs text-gray-500">{{ $order->created_at->format('H:i') }}</div>
                                </td>


                                <!-- Actions -->
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center gap-2">

                                        {{-- Show "View Details" only when order is paid --}}
                                        @if($order->status === 'paid')
                                            <button
                                                onclick="loadOrderDetail({{ $order->id }})"
                                                class="p-2 bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200 transition-colors"
                                                title="View Details"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                </svg>
                                            </button>
                                        @endif

                                        {{-- Mark as Paid (only show if pending) --}}
                                        @if($order->status === 'pending')
                                            <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="paid">
                                                <button type="submit"
                                                        class="p-2 bg-green-100 text-green-600 rounded-lg hover:bg-green-200 transition-colors"
                                                        title="Mark as Paid">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <polyline points="20 6 9 17 4 12"></polyline>
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif

                                        {{-- Delete button --}}
                                        <form action="{{ route('admin.orders.destroy', $order->id) }}"
                                            method="POST" class="inline"
                                            onsubmit="return confirm('Are you sure you want to delete this order?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition-colors"
                                                    title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                </svg>
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="text-gray-300 mb-4">
                                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                            <line x1="1" y1="10" x2="23" y2="10"></line>
                                        </svg>
                                        <p class="text-gray-500 font-bold text-lg">No orders found</p>
                                        <p class="text-gray-400 text-sm mt-1">Try adjusting your search or filter criteria</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($orders->hasPages())
                    <div class="bg-gray-50 px-6 py-4 border-t-2 border-gray-100">
                        {{ $orders->links() }}
                    </div>
                @endif
            </div>

            <!-- Quick Info -->
            <div class="mt-6 p-4 bg-blue-50 border-2 border-blue-200 rounded-xl">
                <div class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 flex-shrink-0 mt-0.5">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="16" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                    </svg>
                    <div>
                        <p class="text-sm font-bold text-blue-900">Quick Tips:</p>
                        <p class="text-sm text-blue-700 mt-1">
                            • Click the eye icon to view full order details • Use filters to find specific orders • Expired orders can be manually marked as paid if payment is confirmed
                        </p>
                    </div>
                </div>
            </div>

            <!-- ORDER DETAIL MODAL -->
            <div id="orderDetailModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 hidden">
                <div class="bg-white rounded-2xl p-8 w-full max-w-4xl shadow-2xl border-4 border-[#FFC50F]/30 max-h-[90vh] overflow-y-auto">

                    <!-- Header -->
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-black text-gray-900">Order Detail</h3>
                        <button onclick="closeOrderDetailModal()" class="text-gray-400 hover:text-gray-600 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>

                    <!-- Order Content -->
                    <div id="orderDetailContent" class="bg-gradient-to-r from-[#FFC50F]/10 to-[#FFD700]/10 rounded-xl p-6 border-2 border-[#FFC50F]/30">

                        <h4 class="font-black text-xl mb-4 text-gray-900">Order Information</h4>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <div>
                                <p class="text-gray-600 text-sm font-bold">Order ID</p>
                                <p class="text-gray-900 font-black text-lg" id="od_id"></p>
                            </div>

                            <div>
                                <p class="text-gray-600 text-sm font-bold">Product</p>
                                <p class="text-gray-900 font-black text-lg" id="od_product_name"></p>
                            </div>

                            <div>
                                <p class="text-gray-600 text-sm font-bold">Name</p>
                                <p class="text-gray-900 font-black text-lg" id="od_name"></p>
                            </div>

                            <div>
                                <p class="text-gray-600 text-sm font-bold">Email</p>
                                <p class="text-gray-900 font-black text-lg" id="od_email"></p>
                            </div>

                            <div>
                                <p class="text-gray-600 text-sm font-bold">WhatsApp</p>
                                <p class="text-gray-900 font-black text-lg" id="od_whatsapp"></p>
                            </div>

                            <div>
                                <p class="text-gray-600 text-sm font-bold">Status</p>
                                <p class="text-gray-900 font-black text-lg" id="od_status"></p>
                            </div>

                            <div>
                                <p class="text-gray-600 text-sm font-bold">Delivery Status</p>
                                <p class="text-gray-900 font-black text-lg" id="od_delivery_status"></p>
                            </div>

                            <div>
                                <p class="text-gray-600 text-sm font-bold">Total</p>
                                <p class="text-gray-900 font-black text-lg" id="od_total"></p>
                            </div>

                            <div>
                                <p class="text-gray-600 text-sm font-bold">Created At</p>
                                <p class="text-gray-900 font-black text-lg" id="od_created"></p>
                            </div>

                            <div>
                                <p class="text-gray-600 text-sm font-bold">Updated At</p>
                                <p class="text-gray-900 font-black text-lg" id="od_updated"></p>
                            </div>

                        </div>

                        <!-- eSIM Stock Details Section -->
                        <div id="esimStockSection" class="mt-6 pt-6 border-t-2 border-[#FFC50F]/30">
                            <h4 class="font-black text-lg mb-4 text-gray-900">eSIM Stock Information</h4>
                            <div id="esimStockContent" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <p class="text-gray-600 text-sm font-bold">Stock ID</p>
                                    <p class="text-gray-900 font-black text-lg" id="od_esim_id">-</p>
                                </div>
                                <div>
                                    <p class="text-gray-600 text-sm font-bold">Status</p>
                                    <p class="text-gray-900 font-black text-lg" id="od_esim_status">-</p>
                                </div>
                                <div>
                                    <p class="text-gray-600 text-sm font-bold">SKU</p>
                                    <p class="text-gray-900 font-black text-lg" id="od_esim_sku">-</p>
                                </div>
                                <div>
                                    <p class="text-gray-600 text-sm font-bold">ICCID</p>
                                    <p class="text-gray-900 font-black text-lg" id="od_esim_iccid">-</p>
                                </div>
                                <div>
                                    <p class="text-gray-600 text-sm font-bold">Activation Code</p>
                                    <p class="text-gray-900 font-black text-lg" id="od_esim_activation_code">-</p>
                                </div>
                                <div>
                                    <p class="text-gray-600 text-sm font-bold">SMDP+</p>
                                    <p class="text-gray-900 font-black text-lg" id="od_esim_smdp_plus">-</p>
                                </div>
                                <div>
                                    <p class="text-gray-600 text-sm font-bold">Assigned At</p>
                                    <p class="text-gray-900 font-black text-lg" id="od_esim_assigned_at">-</p>
                                </div>
                                <div>
                                    <p class="text-gray-600 text-sm font-bold">QR Image URL</p>
                                    <p class="text-gray-900 font-black text-lg" id="od_esim_qr_image_url">-</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="flex justify-end mt-6">
                        <button onclick="closeOrderDetailModal()" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg font-bold hover:bg-gray-300 transition">
                            Close
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </main>
</div>

<script>
fetch(`/admin/orders/${orderId}/detail`)

function openOrderDetailModal(order) {
    document.getElementById("od_id").innerText = order.id;
    document.getElementById("od_product_name").innerText = order.product?.name ?? "-";
    document.getElementById("od_name").innerText = order.name ?? "-";
    document.getElementById("od_email").innerText = order.email ?? "-";
    document.getElementById("od_whatsapp").innerText = order.whatsapp ?? "-";
    document.getElementById("od_status").innerText = order.status;
    document.getElementById("od_delivery_status").innerText = order.delivery_status;
    document.getElementById("od_total").innerText = "Rp " + order.total.toLocaleString();
    document.getElementById("od_created").innerText = order.created_at;
    document.getElementById("od_updated").innerText = order.updated_at;

    // Populate eSIM Stock details
    if (order.esim_stock) {
        document.getElementById("od_esim_id").innerText = order.esim_stock.id ?? "-";
        document.getElementById("od_esim_status").innerText = order.esim_stock.status ?? "-";
        document.getElementById("od_esim_sku").innerText = order.esim_stock.sku ?? "-";
        document.getElementById("od_esim_iccid").innerText = order.esim_stock.iccid ?? "-";
        document.getElementById("od_esim_activation_code").innerText = order.esim_stock.activation_code ?? "-";
        document.getElementById("od_esim_smdp_plus").innerText = order.esim_stock.smdp_plus ?? "-";
        document.getElementById("od_esim_assigned_at").innerText = order.esim_stock.assigned_at ?? "-";
        document.getElementById("od_esim_qr_image_url").innerText = order.esim_stock.qr_image_url ?? "-";
    } else {
        document.getElementById("od_esim_id").innerText = "-";
        document.getElementById("od_esim_status").innerText = "-";
        document.getElementById("od_esim_sku").innerText = "-";
        document.getElementById("od_esim_iccid").innerText = "-";
        document.getElementById("od_esim_activation_code").innerText = "-";
        document.getElementById("od_esim_smdp_plus").innerText = "-";
        document.getElementById("od_esim_assigned_at").innerText = "-";
        document.getElementById("od_esim_qr_image_url").innerText = "-";
    }

    // Show modal
    document.getElementById("orderDetailModal").classList.remove("hidden");
}

function closeOrderDetailModal() {
    document.getElementById("orderDetailModal").classList.add("hidden");
}

async function loadOrderDetail(orderId) {
    try {
        const res = await fetch(`/admin/orders/${orderId}`);
        const data = await res.json();

        openOrderDetailModal(data); // 👉 buka modal
    } catch (err) {
        console.error(err);
        alert("Failed to load order detail.");
    }
}
</script>
@endsection
