@extends('layouts.app')

@section('title', 'Countries Management - RAVCONNECT')

@section('content')
<!-- Load Alpine.js for this page -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>

<div class="flex min-h-screen bg-gray-50">
    @include('admin.partials.sidebar')

    <main class="flex-1">
        <!-- Hero Header -->
        <div class="relative bg-gradient-to-br from-[#FFC50F] via-[#FFD700] to-[#FFA500] py-12 px-8 overflow-hidden">
            <!-- Animated Background -->
            <div class="absolute inset-0 overflow-hidden opacity-20">
                <div class="absolute -top-24 -right-24 w-96 h-96 bg-white rounded-full blur-3xl"></div>
                <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            </div>

            <div class="max-w-7xl mx-auto relative z-10">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="inline-flex items-center gap-2 bg-black/10 backdrop-blur-sm px-4 py-2 rounded-full border-2 border-black/20 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                            </svg>
                            <span class="text-black font-bold text-sm">Administration Panel</span>
                        </div>
                        <h1 class="text-4xl md:text-5xl font-black text-black mb-2">Countries Management</h1>
                        <p class="text-lg text-black/80">Manage available countries and their visibility</p>
                    </div>
                    <div class="hidden lg:flex items-center gap-3 bg-white/20 backdrop-blur-sm px-6 py-3 rounded-2xl border-2 border-white/40">
                        <div class="w-10 h-10 bg-gradient-to-br from-black to-gray-800 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <div>
                            <div class="text-xs text-black/70">Logged in as</div>
                            <div class="font-black text-black">{{ auth()->user()->name }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-8 py-12">

            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="mb-8 p-6 bg-gradient-to-r from-green-50 to-green-100 border-2 border-green-300 rounded-2xl shadow-xl" x-data="{ show: true }" x-show="show" x-transition>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <div class="font-black text-green-900 text-lg">{{ session('success') }}</div>
                        </div>
                        <button @click="show = false" class="text-green-700 hover:text-green-900">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-8 p-6 bg-gradient-to-r from-red-50 to-red-100 border-2 border-red-300 rounded-2xl shadow-xl" x-data="{ show: true }" x-show="show" x-transition>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                </svg>
                            </div>
                            <div class="font-black text-red-900 text-base">{{ session('error') }}</div>
                        </div>
                        <button @click="show = false" class="text-red-700 hover:text-red-900">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            <!-- Countries Form -->
            <form method="POST" action="{{ route('admin.countries.toggle') }}" id="countriesForm">
                @csrf

                <!-- Action Buttons -->
                <div class="mb-8 flex flex-wrap gap-4">
                    <button type="button"
                        class="px-6 py-3 bg-gradient-to-r from-green-600 to-green-700 text-black rounded-xl font-black shadow-lg hover:shadow-xl transition-all hover:scale-105 flex items-center gap-2"
                        onclick="selectAllCountries(true)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Select All
                    </button>

                    <button type="button"
                        class="px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 text-black rounded-xl font-black shadow-lg hover:shadow-xl transition-all hover:scale-105 flex items-center gap-2"
                        onclick="selectAllCountries(false)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                        Unselect All
                    </button>
                </div>

                <!-- Countries Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    @foreach($countries as $country)
                        <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-100 overflow-hidden hover:shadow-xl transition-all hover:scale-105 group">
                            <!-- Country Header Image (if exists) -->
                            @if($country->image_url)
                                <div class="h-32 bg-gradient-to-br from-gray-200 to-gray-300 overflow-hidden">
                                    <img src="{{ $country->image_url }}" alt="{{ $country->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                </div>
                            @else
                                <div class="h-32 bg-gradient-to-br from-[#FFC50F] to-[#FFD700] flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-black/20">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="2" y1="12" x2="22" y2="12"></line>
                                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                    </svg>
                                </div>
                            @endif

                            <div class="p-5">
                                <div class="flex items-center gap-3 mb-4">
                                    @if($country->flag_url)
                                        <img src="{{ $country->flag_url }}" alt="{{ $country->name }}" class="w-10 h-10 rounded-full border-2 border-gray-200 shadow-sm">
                                    @else
                                        <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400">
                                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                                <circle cx="9" cy="9" r="2"></circle>
                                                <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path>
                                            </svg>
                                        </div>
                                    @endif
                                    <div class="flex-1">
                                        <h3 class="font-black text-gray-900 text-lg">{{ $country->name }}</h3>
                                        <p class="text-xs text-gray-500 font-mono">{{ strtoupper($country->code) }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between pt-4 border-t-2 border-gray-100">
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="checkbox"
                                               name="active_countries[]"
                                               value="{{ $country->id }}"
                                               {{ $country->active ? 'checked' : '' }}
                                               class="country-checkbox w-5 h-5 text-[#FFC50F] border-gray-300 rounded focus:ring-[#FFC50F] cursor-pointer">
                                        <span class="text-sm font-bold text-gray-700">
                                            {{ $country->active ? 'Visible' : 'Hidden' }}
                                        </span>
                                    </label>
                                    <button type="button"
                                            class="px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-700 text-black rounded-lg font-bold text-sm shadow-md hover:shadow-lg transition-all hover:scale-105 flex items-center gap-2"
                                            onclick="openEditCountry({{ $country->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                        Edit
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Save Button -->
                <div class="flex justify-end">
                    <button type="submit" class="px-8 py-4 bg-gradient-to-r from-[#FFC50F] to-[#FFD700] text-black rounded-xl font-black shadow-lg hover:shadow-xl transition-all hover:scale-105 flex items-center gap-2 text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                            <polyline points="17 21 17 13 7 13 7 21"></polyline>
                            <polyline points="7 3 7 8 15 8"></polyline>
                        </svg>
                        Save Visibility Status
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>

<!-- Edit Country Modal -->
<div id="editCountryModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4" onclick="closeEditCountry(event)">
    <div class="bg-white rounded-3xl shadow-2xl max-w-3xl w-full max-h-[90vh] overflow-y-auto" onclick="event.stopPropagation()">
        <!-- Modal Header -->
        <div class="bg-gradient-to-r from-[#FFC50F] to-[#FFD700] p-6 sticky top-0 z-10">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-black rounded-xl flex items-center justify-center shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-black text-black">Edit Country</h2>
                        <p class="text-sm text-black/80 mt-1">Update country information and images</p>
                    </div>
                </div>
                <button onclick="closeEditCountry()" class="w-10 h-10 bg-black/10 hover:bg-black/20 rounded-xl flex items-center justify-center transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Modal Body -->
        <form id="editCountryForm" method="POST" enctype="multipart/form-data" class="p-8">
            @csrf
            @method('PUT')

            <!-- Current Images Preview -->
            <div id="currentImagesPreview" class="mb-6 grid grid-cols-2 gap-4">
                <!-- Will be populated by JavaScript -->
            </div>

            <!-- Country Name -->
            <div class="mb-6">
                <label for="edit_name" class="block font-black text-gray-900 mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F]">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="2" y1="12" x2="22" y2="12"></line>
                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                    </svg>
                    Country Name
                    <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       name="name"
                       id="edit_name"
                       class="w-full border-2 border-gray-300 rounded-xl px-4 py-3 focus:border-[#FFC50F] focus:outline-none transition-all"
                       placeholder="e.g., Indonesia"
                       required>
            </div>

            <!-- Country Code -->
            <div class="mb-6">
                <label for="edit_code" class="block font-black text-gray-900 mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#FFC50F]">
                        <polyline points="16 18 22 12 16 6"></polyline>
                        <polyline points="8 6 2 12 8 18"></polyline>
                    </svg>
                    Country Code (2 letters)
                    <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       name="code"
                       id="edit_code"
                       class="w-full border-2 border-gray-300 rounded-xl px-4 py-3 focus:border-[#FFC50F] focus:outline-none transition-all font-mono uppercase"
                       placeholder="e.g., ID"
                       maxlength="2"
                       required>
            </div>

            <!-- Flag URL -->
            <div class="mb-6">
                <label for="edit_flag_url" class="block font-black text-gray-900 mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600">
                        <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path>
                        <line x1="4" y1="22" x2="4" y2="15"></line>
                    </svg>
                    Flag URL (Optional)
                </label>
                <input type="text"
                       name="flag_url"
                       id="edit_flag_url"
                       class="w-full border-2 border-gray-300 rounded-xl px-4 py-3 focus:border-[#FFC50F] focus:outline-none transition-all font-mono text-sm"
                       placeholder="https://example.com/flag.png">
                <p class="mt-2 text-xs text-gray-500 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="16" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                    </svg>
                    URL for the country flag icon (circular)
                </p>
            </div>

            <!-- Header Image Upload -->
            <div class="mb-6">
                <label for="edit_image" class="block font-black text-gray-900 mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-purple-600">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <circle cx="9" cy="9" r="2"></circle>
                        <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path>
                    </svg>
                    Header Image (Optional)
                </label>
                <div class="relative">
                    <input type="file"
                           name="image"
                           id="edit_image"
                           accept="image/jpeg,image/png,image/jpg,image/gif"
                           class="w-full border-2 border-gray-300 rounded-xl px-4 py-3 focus:border-[#FFC50F] focus:outline-none transition-all file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[#FFC50F] file:text-black file:font-bold hover:file:bg-[#FFD700] file:cursor-pointer"
                           onchange="previewNewImage(this)">
                </div>
                <p class="mt-2 text-xs text-gray-500 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="16" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                    </svg>
                    Banner image for country page header. Max 2MB (JPEG, PNG, JPG, GIF)
                </p>

                <!-- New Image Preview -->
                <div id="newImagePreview" class="mt-4 hidden">
                    <div class="p-4 bg-gradient-to-r from-green-50 to-green-100 border-2 border-green-300 rounded-xl">
                        <div class="flex items-center gap-3 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-600">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span class="font-bold text-green-900">New Image Preview</span>
                        </div>
                        <img id="newImagePreviewImg" src="" alt="New image preview" class="w-full h-48 object-cover rounded-xl border-2 border-green-300">
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-4 justify-end pt-6 border-t-2 border-gray-100">
                <button type="button"
                        onclick="closeEditCountry()"
                        class="px-6 py-3 bg-gradient-to-r from-gray-200 to-gray-300 text-gray-800 rounded-xl font-black shadow-md hover:shadow-lg transition-all hover:scale-105 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                    Cancel
                </button>
                <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-[#FFC50F] to-[#FFD700] text-black rounded-xl font-black shadow-lg hover:shadow-xl transition-all hover:scale-105 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                        <polyline points="17 21 17 13 7 13 7 21"></polyline>
                        <polyline points="7 3 7 8 15 8"></polyline>
                    </svg>
                    Update Country
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    [x-cloak] { display: none !important; }

    /* Smooth modal animation */
    #editCountryModal {
        animation: fadeIn 0.2s ease-out;
    }

    #editCountryModal > div {
        animation: slideUp 0.3s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideUp {
        from { transform: translateY(20px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    /* Custom scrollbar for modal */
    #editCountryModal > div::-webkit-scrollbar {
        width: 8px;
    }
    #editCountryModal > div::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    #editCountryModal > div::-webkit-scrollbar-thumb {
        background: #FFC50F;
        border-radius: 10px;
    }
    #editCountryModal > div::-webkit-scrollbar-thumb:hover {
        background: #FFD700;
    }
</style>

<script>
    function selectAllCountries(value) {
        document.querySelectorAll('.country-checkbox').forEach(cb => cb.checked = value);
    }

    async function openEditCountry(countryId) {
        try {
            // Fetch country data
            const response = await fetch(`/admin/countries/json/${countryId}`);
            const country = await response.json();

            // Populate form
            document.getElementById('edit_name').value = country.name || '';
            document.getElementById('edit_code').value = country.code || '';
            document.getElementById('edit_flag_url').value = country.flag_url || '';

            // Set form action
            document.getElementById('editCountryForm').action = `/admin/countries/${countryId}`;

            // Show current images
            let imagesHTML = '';

            if (country.flag_url) {
                imagesHTML += `
                    <div class="p-4 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl border-2 border-blue-200">
                        <div class="flex items-center gap-2 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600">
                                <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path>
                                <line x1="4" y1="22" x2="4" y2="15"></line>
                            </svg>
                            <span class="font-bold text-blue-900 text-sm">Current Flag</span>
                        </div>
                        <img src="${country.flag_url}" alt="Flag" class="w-20 h-20 rounded-full border-2 border-blue-300 shadow-md object-cover mx-auto">
                    </div>
                `;
            }

            if (country.image_url) {
                imagesHTML += `
                    <div class="p-4 bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl border-2 border-purple-200">
                        <div class="flex items-center gap-2 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-purple-600">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="9" cy="9" r="2"></circle>
                                <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path>
                            </svg>
                            <span class="font-bold text-purple-900 text-sm">Current Header</span>
                        </div>
                        <img src="${country.image_url}" alt="Header" class="w-full h-32 rounded-xl border-2 border-purple-300 shadow-md object-cover">
                    </div>
                `;
            }

            if (!imagesHTML) {
                imagesHTML = `
                    <div class="col-span-2 p-4 bg-gray-50 rounded-xl border-2 border-dashed border-gray-300 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400 mx-auto mb-2">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <circle cx="9" cy="9" r="2"></circle>
                            <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path>
                        </svg>
                        <p class="text-gray-500 text-sm font-bold">No images uploaded yet</p>
                    </div>
                `;
            }

            document.getElementById('currentImagesPreview').innerHTML = imagesHTML;

            // Reset new image preview
            document.getElementById('newImagePreview').classList.add('hidden');
            document.getElementById('edit_image').value = '';

            // Show modal
            document.getElementById('editCountryModal').classList.remove('hidden');

        } catch (error) {
            console.error('Error fetching country data:', error);
            alert('Failed to load country data. Please try again.');
        }
    }

    function closeEditCountry(event) {
        if (!event || event.target === event.currentTarget) {
            document.getElementById('editCountryModal').classList.add('hidden');
        }
    }

    function previewNewImage(input) {
        const preview = document.getElementById('newImagePreview');
        const previewImg = document.getElementById('newImagePreviewImg');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImg.src = e.target.result;
                preview.classList.remove('hidden');
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.classList.add('hidden');
        }
    }

    // Close modal on ESC key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeEditCountry();
        }
    });

    // Form submission
    document.getElementById('editCountryForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const form = e.target;
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalBtnText = submitBtn.innerHTML;

        // Disable button and show loading
        submitBtn.disabled = true;
        submitBtn.innerHTML = `
            <svg class="animate-spin h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Updating...
        `;

        try {
            const formData = new FormData(form);

            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                }
            });

            if (response.ok) {
                // Success - reload page to show updated data
                window.location.reload();
            } else {
                // Error
                const data = await response.json();
                alert(data.message || 'Failed to update country. Please try again.');
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
            }
        } catch (error) {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnText;
        }
    });
</script>
@endsection
