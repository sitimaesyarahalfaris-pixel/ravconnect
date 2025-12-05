@extends('layouts.app')
@section('title', 'Register - RAVCONNECT')
@section('content')

<!-- Split Screen Register -->
<section class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-50 to-white p-4">
    <div class="w-full max-w-6xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-0 bg-white rounded-3xl shadow-2xl overflow-hidden">

            <!-- Left Side - Registration Form -->
            <div class="flex flex-col justify-center p-8 md:p-12 lg:p-16 order-2 lg:order-1">
                <!-- Mobile Logo (Only visible on mobile) -->
                <div class="lg:hidden mb-8 text-center">
                    <div class="inline-flex items-center gap-3 bg-gradient-to-r from-[#FFC50F] to-[#FFD700] px-6 py-3 rounded-2xl shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                            <rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect>
                            <line x1="12" y1="18" x2="12.01" y2="18"></line>
                        </svg>
                        <span class="font-black text-xl text-black">RAVCONNECT</span>
                    </div>
                </div>

                <div class="max-w-md mx-auto w-full">
                    <!-- Header -->
                    <div class="mb-8">
                        <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-2">Create Account</h2>
                        <p class="text-gray-600">Join RAVCONNECT and start your journey</p>
                    </div>

                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 border-2 border-red-200 rounded-2xl p-4">
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 bg-red-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-bold text-red-800 mb-1">Please fix the errors:</h3>
                                    <ul class="space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li class="text-sm text-red-700">• {{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Registration Form -->
                    <form method="POST" action="{{ route('register') }}" class="space-y-4">
                        @csrf

                        <!-- Name Field -->
                        <div>
                            <label class="block font-bold text-gray-900 mb-2">Full Name</label>
                            <div class="relative">
                                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </div>
                                <input
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    class="w-full border-2 border-gray-200 rounded-xl pl-12 pr-4 py-3.5 focus:border-[#FFC50F] focus:outline-none focus:ring-4 focus:ring-[#FFC50F]/10 transition-all text-gray-900"
                                    placeholder="Enter your full name"
                                    required>
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div>
                            <label class="block font-bold text-gray-900 mb-2">Email Address</label>
                            <div class="relative">
                                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                </div>
                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    class="w-full border-2 border-gray-200 rounded-xl pl-12 pr-4 py-3.5 focus:border-[#FFC50F] focus:outline-none focus:ring-4 focus:ring-[#FFC50F]/10 transition-all text-gray-900"
                                    placeholder="your.email@example.com"
                                    required>
                            </div>
                        </div>

                        <!-- WhatsApp Field -->
                        <div>
                            <label class="block font-bold text-gray-900 mb-2">WhatsApp Number</label>
                            <div class="relative">
                                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                    </svg>
                                </div>
                                <input
                                    type="text"
                                    name="whatsapp"
                                    value="{{ old('whatsapp') }}"
                                    class="w-full border-2 border-gray-200 rounded-xl pl-12 pr-4 py-3.5 focus:border-[#FFC50F] focus:outline-none focus:ring-4 focus:ring-[#FFC50F]/10 transition-all text-gray-900"
                                    placeholder="e.g. 6281234567890">
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div>
                            <label class="block font-bold text-gray-900 mb-2">Password</label>
                            <div class="relative">
                                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                </div>
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="w-full border-2 border-gray-200 rounded-xl pl-12 pr-12 py-3.5 focus:border-[#FFC50F] focus:outline-none focus:ring-4 focus:ring-[#FFC50F]/10 transition-all text-gray-900"
                                    placeholder="Create a strong password"
                                    required>
                                <button
                                    type="button"
                                    onclick="togglePassword('password', 'toggleIconPassword')"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-[#FFC50F] transition-colors">
                                    <svg id="toggleIconPassword" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </button>
                            </div>
                            <p class="mt-1.5 text-xs text-gray-600">Must be at least 8 characters</p>
                        </div>

                        <!-- Confirm Password Field -->
                        <div>
                            <label class="block font-bold text-gray-900 mb-2">Confirm Password</label>
                            <div class="relative">
                                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                </div>
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    id="password_confirmation"
                                    class="w-full border-2 border-gray-200 rounded-xl pl-12 pr-12 py-3.5 focus:border-[#FFC50F] focus:outline-none focus:ring-4 focus:ring-[#FFC50F]/10 transition-all text-gray-900"
                                    placeholder="Re-enter your password"
                                    required>
                                <button
                                    type="button"
                                    onclick="togglePassword('password_confirmation', 'toggleIconConfirm')"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-[#FFC50F] transition-colors">
                                    <svg id="toggleIconConfirm" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button
                            type="submit"
                            class="w-full flex items-center justify-center gap-2 py-4 bg-gradient-to-r from-[#FFC50F] to-[#FFD700] text-black rounded-xl font-black text-lg shadow-lg hover:shadow-xl hover:scale-[1.02] transition-all mt-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="8.5" cy="7" r="4"></circle>
                                <polyline points="17 11 19 13 23 9"></polyline>
                            </svg>
                            Create Account
                        </button>

                        <!-- Divider -->
                        <div class="relative my-6">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t-2 border-gray-200"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-4 bg-white text-gray-600 font-semibold">Already a member?</span>
                            </div>
                        </div>

                        <!-- Login Link -->
                        <a href="{{ route('login') }}" class="w-full flex items-center justify-center gap-2 py-4 bg-gray-900 hover:bg-black text-white rounded-xl font-bold text-lg shadow-lg hover:shadow-xl hover:scale-[1.02] transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                                <polyline points="10 17 15 12 10 7"></polyline>
                                <line x1="15" y1="12" x2="3" y2="12"></line>
                            </svg>
                            Login to Account
                        </a>
                    </form>
                </div>
            </div>

            <!-- Right Side - Branding & Visual (Hidden on Mobile, Visible on Desktop) -->
            <div class="hidden lg:flex flex-col justify-center items-center p-12 bg-gradient-to-br from-[#FFC50F] via-[#FFD700] to-[#FFA500] relative overflow-hidden order-1 lg:order-2">
                <!-- Animated Background Elements -->
                <div class="absolute inset-0 overflow-hidden">
                    <div class="absolute top-0 -right-20 w-72 h-72 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
                    <div class="absolute bottom-0 -left-20 w-96 h-96 bg-white/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-white/5 rounded-full blur-2xl"></div>
                </div>

                <!-- Content -->
                <div class="relative z-10 text-center">
                    <!-- Logo/Icon -->
                    <div class="mb-8">
                        <div class="w-32 h-32 mx-auto bg-white/20 backdrop-blur-xl rounded-3xl border-4 border-white/40 shadow-2xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                                <rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect>
                                <line x1="12" y1="18" x2="12.01" y2="18"></line>
                            </svg>
                        </div>
                    </div>

                    <h1 class="text-5xl font-black text-black mb-4">Join RAVCONNECT</h1>
                    <p class="text-xl text-black/80 mb-8 max-w-md">Create your account and get instant access to global eSIM connectivity</p>

                    <!-- Benefits List -->
                    <div class="space-y-4 text-left max-w-md mx-auto">
                        <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20">
                            <div class="w-10 h-10 bg-black/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-black text-black">Free Registration</h3>
                                <p class="text-sm text-black/70">No signup fees or hidden charges</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20">
                            <div class="w-10 h-10 bg-black/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-black text-black">Instant Activation</h3>
                                <p class="text-sm text-black/70">eSIM ready in minutes after purchase</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20">
                            <div class="w-10 h-10 bg-black/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-black text-black">Best Prices</h3>
                                <p class="text-sm text-black/70">Competitive rates worldwide</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20">
                            <div class="w-10 h-10 bg-black/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-black text-black">24/7 Support</h3>
                                <p class="text-sm text-black/70">We're here to help anytime</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
function togglePassword(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);

    if (input.type === 'password') {
        input.type = 'text';
        icon.innerHTML = `
            <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
            <line x1="1" y1="1" x2="23" y2="23"></line>
        `;
    } else {
        input.type = 'password';
        icon.innerHTML = `
            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
            <circle cx="12" cy="12" r="3"></circle>
        `;
    }
}
</script>

<style>
@keyframes pulse {
    0%, 100% {
        opacity: 0.6;
    }
    50% {
        opacity: 0.8;
    }
}

.animate-pulse {
    animation: pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}
</style>

@endsection
