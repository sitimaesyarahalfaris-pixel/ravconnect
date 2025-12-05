@extends('layouts.app')

@section('title', 'Manage Users - RAVCONNECT')

@section('content')
<div class="flex min-h-screen">
    @include('admin.partials.sidebar')

    <main class="flex-1 bg-gray-50 py-12 px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-black text-gray-900">User Management</h1>
                    <p class="text-gray-600 mt-1">Manage all registered users and administrators</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="text-sm text-gray-600 bg-white px-4 py-2 rounded-lg shadow">
                        <span class="font-semibold">Logged in as:</span> {{ auth()->user()->name }}
                    </div>

                </div>
            </div>

            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="mb-6 p-4 rounded-xl bg-green-100 border-2 border-green-300 text-green-800 font-bold flex items-center justify-between">
                    <span>✓ {{ session('success') }}</span>
                    <button onclick="this.parentElement.remove()" class="text-green-600 hover:text-green-800">&times;</button>
                </div>
            @endif
            @if(session('error'))
                <div class="mb-6 p-4 rounded-xl bg-red-100 border-2 border-red-300 text-red-800 font-bold flex items-center justify-between">
                    <span>✗ {{ session('error') }}</span>
                    <button onclick="this.parentElement.remove()" class="text-red-600 hover:text-red-800">&times;</button>
                </div>
            @endif

            <!-- Search and Filter Bar -->
            <div class="bg-white rounded-2xl shadow-xl border-2 border-[#FFC50F]/30 p-6 mb-8">
                <form method="GET" action="{{ route('admin.users.index') }}" class="flex flex-col md:flex-row gap-4">
                    <!-- Search Input -->
                    <div class="flex-1">
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="m21 21-4.35-4.35"></path>
                            </svg>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name, email, or WhatsApp..." class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#FFC50F] focus:outline-none font-semibold">
                        </div>
                    </div>

                    <!-- Role Filter -->
                    <div class="w-full md:w-48">
                        <select name="role" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#FFC50F] focus:outline-none font-semibold">
                            <option value="">All Roles</option>
                            <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>User</option>
                        </select>
                    </div>

                    <!-- Sort By -->
                    <div class="w-full md:w-48">
                        <select name="sort" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#FFC50F] focus:outline-none font-semibold">
                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest First</option>
                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                            <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name A-Z</option>
                        </select>
                    </div>

                    <!-- Filter Button -->
                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-[#FFC50F] to-[#FFD700] text-black font-bold rounded-xl shadow-lg hover:shadow-xl transition-all hover:scale-105 flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                        </svg>
                        Filter
                    </button>

                    <!-- Reset Button -->
                    @if(request()->hasAny(['search', 'role', 'sort']))
                        <a href="{{ route('admin.users.index') }}" class="px-6 py-3 bg-gray-200 text-gray-700 font-bold rounded-xl shadow hover:shadow-lg transition-all hover:scale-105 flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"></path>
                                <path d="M21 3v5h-5"></path>
                                <path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"></path>
                                <path d="M3 21v-5h5"></path>
                            </svg>
                            Reset
                        </a>
                    @endif
                </form>
            </div>

            <div x-data="userModal()">
                <!-- Users Table -->
                <div class="bg-white rounded-2xl shadow-xl border-2 border-[#FFC50F]/30 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gradient-to-r from-[#FFC50F]/20 to-[#FFD700]/20">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-black text-gray-900 uppercase tracking-wider">
                                        User ID
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-black text-gray-900 uppercase tracking-wider">
                                        User Info
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-black text-gray-900 uppercase tracking-wider">
                                        Contact
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-black text-gray-900 uppercase tracking-wider">
                                        Role
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-black text-gray-900 uppercase tracking-wider">
                                        Orders
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-black text-gray-900 uppercase tracking-wider">
                                        Registered
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-black text-gray-900 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100">
                                @forelse($users as $user)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <!-- User ID -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-black text-gray-900">#{{ $user->id }}</div>
                                    </td>

                                    <!-- User Info -->
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-12 w-12">
                                                <div class="h-12 w-12 rounded-full bg-gradient-to-br from-[#FFC50F] to-[#FFD700] flex items-center justify-center shadow-lg">
                                                    <span class="text-black font-black text-lg">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-bold text-gray-900">{{ $user->name }}</div>
                                                <div class="text-xs text-gray-500">{{ $user->email }}</div>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Contact -->
                                    <td class="px-6 py-4">
                                        <div class="text-sm">
                                            @if($user->whatsapp)
                                                <div class="flex items-center gap-2 text-gray-900 font-semibold">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-500">
                                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                                    </svg>
                                                    {{ $user->whatsapp }}
                                                </div>
                                            @else
                                                <span class="text-xs text-gray-400 font-semibold">No WhatsApp</span>
                                            @endif
                                        </div>
                                    </td>

                                    <!-- Role -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($user->is_admin)
                                            <span class="px-3 py-1 inline-flex items-center gap-1 text-xs font-bold rounded-full bg-gradient-to-r from-purple-100 to-purple-200 text-purple-800 border-2 border-purple-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"></path>
                                                </svg>
                                                Admin
                                            </span>
                                        @else
                                            <span class="px-3 py-1 inline-flex items-center gap-1 text-xs font-bold rounded-full bg-gray-100 text-gray-700 border-2 border-gray-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                                User
                                            </span>
                                        @endif
                                    </td>

                                    <!-- Orders Count -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-2">
                                            <div class="p-2 bg-blue-100 rounded-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600">
                                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                                </svg>
                                            </div>
                                            <span class="text-sm font-black text-gray-900">{{ $user->orders_count ?? 0 }}</span>
                                        </div>
                                    </td>

                                    <!-- Registered Date -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 font-semibold">{{ $user->created_at->format('d M Y') }}</div>
                                        <div class="text-xs text-gray-500">{{ $user->created_at->format('H:i') }}</div>
                                    </td>

                                    <!-- Actions -->
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex items-center gap-2">


                                            <!-- Pencil icon for Edit (button, not anchor) -->
                                            <button @click.prevent="fetchUser({{ $user->id }})" type="button" class="p-2 bg-yellow-100 text-yellow-600 rounded-lg hover:bg-yellow-200 transition-colors" title="Edit User">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"></path>
                                                </svg>
                                            </button>

                                            @if(!$user->is_admin || auth()->user()->id !== $user->id)
                                                <form action="{{ route('admin.users.toggle-admin', $user->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="p-2 {{ $user->is_admin ? 'bg-orange-100 text-orange-600 hover:bg-orange-200' : 'bg-purple-100 text-purple-600 hover:bg-purple-200' }} rounded-lg transition-colors" title="{{ $user->is_admin ? 'Revoke Admin' : 'Make Admin' }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endif

                                            @if(auth()->user()->id !== $user->id)
                                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this user? All their orders will also be deleted.');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition-colors" title="Delete">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="text-gray-300 mb-4">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="9" cy="7" r="4"></circle>
                                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                            </svg>
                                            <p class="text-gray-500 font-bold text-lg">No users found</p>
                                            <p class="text-gray-400 text-sm mt-1">Try adjusting your search or filter criteria</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($users->hasPages())
                        <div class="bg-gray-50 px-6 py-4 border-t-2 border-gray-100">
                            {{ $users->links() }}
                        </div>
                    @endif
                </div>

                <!-- Enhanced Edit User Modal -->
                <div x-show="showEditModal"
                     x-cloak
                     @keydown.escape.window="closeModal"
                     @click.self="closeModal"
                     class="fixed inset-0 z-50 flex items-center justify-center p-4"
                     style="background-color: rgba(0, 0, 0, 0.5); backdrop-filter: blur(4px);"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0">
                    <div class="bg-white rounded-2xl shadow-xl p-8 w-full max-w-md relative"
                         x-transition:enter="transition ease-out duration-300 transform"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-200 transform"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95">
                        <button @click="closeModal" class="absolute top-3 right-3 text-gray-400 hover:text-black text-xl">&times;</button>
                        <h3 class="text-xl font-black mb-4">Edit User</h3>
                        <template x-if="selectedUser">
                            <form method="POST" :action="'/admin/users/' + selectedUser.id" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label class="block text-sm font-bold mb-1">Name</label>
                                    <input type="text" name="name" x-model="selectedUser.name" class="w-full border rounded px-3 py-2">
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-bold mb-1">Email</label>
                                    <input type="email" name="email" x-model="selectedUser.email" class="w-full border rounded px-3 py-2">
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-bold mb-1">Password <span class="text-xs text-gray-500">(leave blank to keep unchanged)</span></label>
                                    <input type="password" name="password" class="w-full border rounded px-3 py-2">
                                </div>
                                <div class="mb-4">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="is_admin" value="1" x-model="selectedUser.is_admin">
                                        <span class="ml-2">Admin</span>
                                    </label>
                                </div>
                                <div class="flex gap-2 mt-6">
                                    <button type="submit" class="bg-[#FFC50F] text-black font-bold px-4 py-2 rounded hover:bg-[#FFD700]">Save</button>
                                    <button type="button" @click="closeModal" class="bg-gray-200 text-gray-700 font-bold px-4 py-2 rounded hover:bg-gray-300">Cancel</button>
                                </div>
                            </form>
                        </template>
                    </div>
                </div>
            </div>

            <!-- User Roles Info -->
            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-4 bg-purple-50 border-2 border-purple-200 rounded-xl">
                    <div class="flex items-start gap-3">
                        <div class="p-2 bg-purple-200 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-purple-600">
                                <path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-purple-900">Admin Users</p>
                            <p class="text-sm text-purple-700 mt-1">
                                Admins have full access to all management features including products, orders, users, and system settings.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="p-4 bg-blue-50 border-2 border-blue-200 rounded-xl">
                    <div class="flex items-start gap-3">
                        <div class="p-2 bg-blue-200 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12.01" y2="8"></line>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-blue-900">Quick Actions</p>
                            <p class="text-sm text-blue-700 mt-1">
                                • Click the star icon to toggle admin privileges • You cannot delete or modify your own account • All user orders are preserved in history
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
function userModal() {
    return {
        showEditModal: false,
        selectedUser: null,
        closeModal() { this.showEditModal = false; this.selectedUser = null; },
        async fetchUser(id) {
            try {
                const res = await fetch(`/admin/users/${id}/json`);
                if (!res.ok) throw new Error('Failed to fetch user');
                this.selectedUser = await res.json();
                this.showEditModal = true;
            } catch (e) {
                alert('Could not fetch user data.');
            }
        }
    };
}
</script>
@endsection
