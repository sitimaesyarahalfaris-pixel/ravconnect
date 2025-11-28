@extends('layouts.app')
@section('title', 'Login - RAVCONNECT')
@section('content')
<div class="max-w-md mx-auto mt-16 bg-white p-8 rounded-xl shadow">
    <h1 class="text-2xl font-black mb-6">Login</h1>
    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-4">
            <label class="block font-bold mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded px-3 py-2" required autofocus>
        </div>
        <div class="mb-4">
            <label class="block font-bold mb-1">Password</label>
            <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
        </div>
        <button type="submit" class="w-full py-3 bg-[#FFC50F] text-black font-black rounded-xl shadow hover:bg-[#FFD700] transition">Login</button>
    </form>
    <div class="mt-4 text-center">
        <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Don't have an account? Register</a>
    </div>
</div>
@endsection
