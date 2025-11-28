@extends('layouts.app')
@section('title', 'Admin Dashboard')
@section('content')
<div class="flex min-h-screen">
    @include('admin.partials.sidebar')

    <!-- Main -->
    <main class="flex-1 bg-gray-50 py-12 px-8">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-black">Dashboard</h1>
            <div class="text-sm text-gray-600">Logged in as: {{ auth()->user()->name }}</div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="p-4 bg-white rounded shadow">
                <div class="text-sm text-gray-500">Total Orders</div>
                <div class="text-2xl font-bold">{{ $stats['orders_total'] ?? 0 }}</div>
            </div>
            <div class="p-4 bg-white rounded shadow">
                <div class="text-sm text-gray-500">Pending Orders</div>
                <div class="text-2xl font-bold">{{ $stats['orders_pending'] ?? 0 }}</div>
            </div>
            <div class="p-4 bg-white rounded shadow">
                <div class="text-sm text-gray-500">Products</div>
                <div class="text-2xl font-bold">{{ $stats['products_total'] ?? 0 }}</div>
            </div>
        </div>

        <div class="bg-white rounded shadow p-4">
            <h2 class="font-bold mb-4">Products (latest)</h2>
            <table class="w-full text-left">
                <thead>
                    <tr class="text-sm text-gray-600">
                        <th class="p-2">ID</th>
                        <th class="p-2">Name</th>
                        <th class="p-2">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr class="border-t">
                        <td class="p-2">{{ $product->id }}</td>
                        <td class="p-2">{{ $product->name }}</td>
                        <td class="p-2">Rp {{ number_format($product->price ?? 0, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection
