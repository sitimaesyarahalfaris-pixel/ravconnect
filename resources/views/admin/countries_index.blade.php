@extends('layouts.app')

@section('title', 'Manage Countries')

@section('content')
<div class="flex min-h-screen">
    @include('admin.partials.sidebar')
    <main class="flex-1 bg-gray-50 py-12 px-8">
        <div class="max-w-4xl mx-auto">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-black">Country Management</h1>
                <div class="flex items-center gap-4">
                    <div class="text-sm text-gray-600">Logged in as: {{ auth()->user()->name }}</div>
                    <a href="{{ route('admin.countries.create') }}" class="px-4 py-2 bg-green-600 text-white rounded font-bold hover:bg-green-700 transition">Add Country</a>
                </div>
            </div>

            <div class="bg-white p-6 rounded shadow mb-8">
                <h2 class="font-bold mb-4">Countries</h2>
                <table class="min-w-full text-sm">
                    <thead>
                        <tr>
                            <th class="text-left p-2">Name</th>
                            <th class="text-left p-2">Header Image</th>
                            <th class="text-left p-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($countries as $country)
                        <tr class="border-b">
                            <td class="p-2">{{ $country->name }}</td>
                            <td class="p-2">
                                @if($country->image_url)
                                    <img src="{{ $country->image_url }}" alt="Header" class="h-12 rounded shadow">
                                @else
                                    <span class="text-gray-400">No image</span>
                                @endif
                            </td>
                            <td class="p-2">
                                <a href="{{ route('admin.countries.edit', $country->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
@endsection
