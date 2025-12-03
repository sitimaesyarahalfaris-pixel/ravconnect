@extends('layouts.app')

@section('title', 'Add Country')

@section('content')
<div class="flex min-h-screen">
    @include('admin.partials.sidebar')
    <main class="flex-1 bg-gray-50 py-12 px-8">
        <div class="max-w-xl mx-auto">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-black">Add Country</h1>
                <div class="text-sm text-gray-600">Logged in as: {{ auth()->user()->name }}</div>
            </div>
            <form method="POST" action="{{ route('admin.countries.store') }}" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
                @csrf
                <div class="mb-4">
                    <label class="font-bold">Country Name</label>
                    <input type="text" name="name" class="w-full border rounded p-2" required>
                </div>
                <div class="mb-4">
                    <label class="font-bold">Country Code (ISO 2-letter, e.g. US, ID)</label>
                    <input type="text" name="code" class="w-full border rounded p-2" maxlength="2" required>
                </div>
                <div class="mb-4">
                    <label class="font-bold">Header Image</label>
                    <input type="file" name="image" class="w-full border rounded p-2 mb-2">
                    <div class="text-xs text-gray-500">Recommended: 1200x400px, JPG/PNG.</div>
                </div>
                <div>
                    <button class="px-4 py-2 bg-[#FFC50F] rounded font-bold">Save</button>
                    <a href="{{ route('admin.countries.index') }}" class="ml-4 text-gray-600 hover:underline">Cancel</a>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection
