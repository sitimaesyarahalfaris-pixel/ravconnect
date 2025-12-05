@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-8 rounded shadow">
    <h1 class="text-2xl font-black mb-6">Edit User</h1>
    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block font-bold mb-1">Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block font-bold mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block font-bold mb-1">Password <span class="text-xs text-gray-500">(leave blank to keep unchanged)</span></label>
            <input type="password" name="password" class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="inline-flex items-center">
                <input type="checkbox" name="is_admin" value="1" {{ $user->is_admin ? 'checked' : '' }}>
                <span class="ml-2">Admin</span>
            </label>
        </div>
        <div class="flex gap-2 mt-6">
            <button type="submit" class="bg-[#FFC50F] text-black font-bold px-4 py-2 rounded hover:bg-[#FFD700]">Save</button>
            <a href="{{ route('admin.users.index') }}" class="bg-gray-200 text-gray-700 font-bold px-4 py-2 rounded hover:bg-gray-300">Cancel</a>
        </div>
    </form>
</div>
@endsection
