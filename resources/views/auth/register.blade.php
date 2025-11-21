@extends('layouts.app')
@section('title', 'Register - RAVCONNECT')
@section('content')
<div class="max-w-md mx-auto mt-16 bg-white p-8 rounded-xl shadow">
    <h1 class="text-2xl font-black mb-6">Register</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-4">
            <label class="block font-bold mb-1">Name</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block font-bold mb-1">Email</label>
            <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block font-bold mb-1">Password</label>
            <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block font-bold mb-1">Confirm Password</label>
            <input type="password" name="password_confirmation" class="w-full border rounded px-3 py-2" required>
        </div>
        <button type="submit" class="w-full py-3 bg-[#FFC50F] text-black font-black rounded-xl shadow hover:bg-[#FFD700] transition">Register</button>
    </form>
    <div class="mt-4 text-center">
        <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Already have an account? Login</a>
    </div>
</div>
@endsection
