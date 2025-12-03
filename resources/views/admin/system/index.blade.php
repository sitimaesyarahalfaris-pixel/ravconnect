@extends('layouts.app')

@section('title', 'System Settings')

@section('content')
<div class="flex min-h-screen">
    @include('admin.partials.sidebar')
    <main class="flex-1 bg-gray-50 py-12 px-8">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-black">System Settings</h1>
                <div class="text-sm text-gray-600">Logged in as: {{ auth()->user()->name }}</div>
            </div>

            <form method="POST" action="{{ url('admin/system/settings/update') }}">
                @csrf
                <div class="grid grid-cols-1 gap-6">
                    @foreach($settings as $s)
                    <div class="bg-white p-4 rounded shadow">
                        <label class="font-bold">{{ $s->key }}</label>
                        <input type="text" name="value" class="w-full border rounded p-2" value="{{ $s->value }}">
                        <input type="hidden" name="key" value="{{ $s->key }}">
                    </div>
                    @endforeach
                    <div class="bg-white p-4 rounded shadow">
                        <label class="font-bold">Available Payment Methods</label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                            @foreach($paymentMethods as $method)
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="available_payment_methods[]" value="{{ $method['metode'] }}"
                                        {{ (isset($availablePaymentMethods) && in_array($method['metode'], $availablePaymentMethods)) ? 'checked' : '' }}>
                                    {{ $method['name'] }} <span class="text-xs text-gray-400">({{ ucfirst($method['type']) }})</span>
                                </label>
                            @endforeach
                        </div>
                        <div class="mt-2"><button class="px-4 py-2 bg-[#FFC50F] rounded font-bold">Save Available Methods</button></div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection
