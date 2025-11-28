@extends('layouts.app')

@section('title', 'Manage Product Stocks')

@section('content')
<div class="flex min-h-screen">
    @include('admin.partials.sidebar')
    <main class="flex-1 bg-gray-50 py-12 px-8">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-black">Product Stocks</h1>
                <div class="text-sm text-gray-600">Logged in as: {{ auth()->user()->name }}</div>
            </div>

            <div class="overflow-x-auto bg-white rounded-xl shadow p-4">
        <table class="min-w-full">
            <thead>
                <tr class="bg-[#FFC50F]/10 text-black">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Product ID</th>
                    <th class="px-4 py-2">Content</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Created</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stocks as $s)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $s->id }}</td>
                    <td class="px-4 py-2">{{ $s->product_id }}</td>
                    <td class="px-4 py-2">{{ Str::limit($s->content, 60) }}</td>
                    <td class="px-4 py-2">{{ $s->status }}</td>
                    <td class="px-4 py-2">{{ $s->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">{{ $stocks->links() }}</div>
            </div>
        </div>
    </main>
</div>
@endsection
