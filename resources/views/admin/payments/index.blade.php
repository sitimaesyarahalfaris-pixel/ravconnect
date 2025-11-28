@extends('layouts.app')

@section('title', 'Manage Payments')

@section('content')
<div class="flex min-h-screen">
    @include('admin.partials.sidebar')
    <main class="flex-1 bg-gray-50 py-12 px-8">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-black">Payment Management</h1>
                <div class="text-sm text-gray-600">Logged in as: {{ auth()->user()->name }}</div>
            </div>

            <div class="overflow-x-auto bg-white rounded-xl shadow p-4">
        <table class="min-w-full">
            <thead>
                <tr class="bg-[#FFC50F]/10 text-black">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Order ID</th>
                    <th class="px-4 py-2">Amount</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Created</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $payment->id }}</td>
                    <td class="px-4 py-2">{{ $payment->order_id }}</td>
                    <td class="px-4 py-2">Rp {{ number_format($payment->amount ?? 0, 0, ',', '.') }}</td>
                    <td class="px-4 py-2">{{ $payment->status }}</td>
                    <td class="px-4 py-2">{{ $payment->created_at }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('admin.payments.show', $payment->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">{{ $payments->links() }}</div>
            </div>
        </div>
    </main>
</div>
@endsection
