@extends('layouts.app')

@section('title', 'Content Management')

@section('content')
<div class="flex min-h-screen">
    @include('admin.partials.sidebar')
    <main class="flex-1 bg-gray-50 py-12 px-8">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-black">Content Management</h1>
                <div class="text-sm text-gray-600">Logged in as: {{ auth()->user()->name }}</div>
            </div>

            <form method="POST" action="{{ url('admin/content/update') }}">
                @csrf
                <div class="grid grid-cols-1 gap-6">
                    <div class="bg-white p-6 rounded shadow">
                        <label class="font-bold">Promo Banner HTML</label>
                        <textarea name="value" class="w-full border rounded p-2" rows="6">{{ $promo_banner->value ?? '' }}</textarea>
                        <input type="hidden" name="key" value="promo_banner">
                        <div class="mt-2"><button class="px-4 py-2 bg-[#FFC50F] rounded font-bold">Save</button></div>
                    </div>
                    <div class="bg-white p-6 rounded shadow">
                        <label class="font-bold">FAQ (JSON or HTML)</label>
                        <textarea name="value" class="w-full border rounded p-2" rows="6">{{ $faq->value ?? '' }}</textarea>
                        <input type="hidden" name="key" value="faq">
                        <div class="mt-2"><button class="px-4 py-2 bg-[#FFC50F] rounded font-bold">Save</button></div>
                    </div>
                    <div class="bg-white p-6 rounded shadow">
                        <label class="font-bold">Contact Info</label>
                        <textarea name="value" class="w-full border rounded p-2" rows="4">{{ $contact_info->value ?? '' }}</textarea>
                        <input type="hidden" name="key" value="contact_info">
                        <div class="mt-2"><button class="px-4 py-2 bg-[#FFC50F] rounded font-bold">Save</button></div>
                    </div>
                </div>
            </form>

            <div class="mt-6 bg-white p-6 rounded shadow">
                <h2 class="font-bold mb-3">Recommended Products</h2>
                <div class="grid grid-cols-3 gap-4">
                    @foreach($recommended_products as $p)
                    <div class="border p-3 rounded">
                        <div class="font-bold">{{ $p->name }}</div>
                        <div class="text-sm">Rp {{ number_format($p->price ?? 0, 0, ',', '.') }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
