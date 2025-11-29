@extends('layouts.app')

@section('title', 'Admin Panel - RAVCONNECT')

@section('content')
<div class="flex flex-col md:flex-row min-h-screen">
    @include('admin.partials.sidebar')
    <!-- Main Content -->
    <main class="flex-1 bg-gray-50 py-12 px-6">
        <!-- Dashboard Section -->
        <section id="dashboard" class="mb-12">
            <h1 class="text-3xl font-black text-gray-900 mb-6">Dashboard</h1>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mb-8">
                <div class="bg-white rounded-2xl shadow p-6 border-2 border-[#FFC50F]/20 flex flex-col items-center">
                    <div class="text-2xl font-black text-[#FFC50F]">{{ $stats['orders_total'] ?? 0 }}</div>
                    <div class="text-xs text-gray-500 font-bold">Total Pesanan</div>
                </div>
                <div class="bg-white rounded-2xl shadow p-6 border-2 border-[#FFC50F]/20 flex flex-col items-center">
                    <div class="text-2xl font-black text-blue-500">{{ $stats['orders_pending'] ?? 0 }}</div>
                    <div class="text-xs text-gray-500 font-bold">Pending</div>
                </div>
                <div class="bg-white rounded-2xl shadow p-6 border-2 border-[#FFC50F]/20 flex flex-col items-center">
                    <div class="text-2xl font-black text-green-500">{{ $stats['orders_paid'] ?? 0 }}</div>
                    <div class="text-xs text-gray-500 font-bold">Paid</div>
                </div>
                <div class="bg-white rounded-2xl shadow p-6 border-2 border-[#FFC50F]/20 flex flex-col items-center">
                    <div class="text-2xl font-black text-gray-400">{{ $stats['orders_expired'] ?? 0 }}</div>
                    <div class="text-xs text-gray-500 font-bold">Expired</div>
                </div>
                <div class="bg-white rounded-2xl shadow p-6 border-2 border-[#FFC50F]/20 flex flex-col items-center">
                    <div class="text-2xl font-black text-[#FFC50F]">{{ $stats['products_total'] ?? 0 }}</div>
                    <div class="text-xs text-gray-500 font-bold">Jumlah Produk</div>
                </div>
                <div class="bg-white rounded-2xl shadow p-6 border-2 border-[#FFC50F]/20 flex flex-col items-center">
                    <div class="text-2xl font-black text-green-600">Rp {{ number_format($stats['revenue_total'] ?? 0, 0, ',', '.') }}</div>
                    <div class="text-xs text-gray-500 font-bold">Pendapatan</div>
                </div>
                <div class="bg-white rounded-2xl shadow p-6 border-2 border-[#FFC50F]/20 flex flex-col items-center">
                    <div class="text-2xl font-black text-[#FFC50F]">{{ $stats['stock_total'] ?? 0 }}</div>
                    <div class="text-xs text-gray-500 font-bold">Stok Tersisa</div>
                </div>
            </div>
        </section>
        <!-- Product Management Section -->

    </main>
</div>
@endsection
