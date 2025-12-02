<aside class="w-full md:w-64 bg-black/95 text-white py-8 px-6 flex-shrink-0 border-r-4 border-[#FFC50F]">
    <div class="flex items-center gap-3 mb-10">
        <img src="{{ asset('resources/assets/img/Logo-transparent.png') }}" alt="RavConnect Logo" class="h-10 w-auto">
        <span class="font-black text-xl">Admin</span>
    </div>
    <nav class="space-y-4">
        <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 rounded-lg hover:bg-[#FFC50F]/20 font-bold">Dashboard</a>
        <a href="{{ route('admin.products.index') }}" class="block py-2 px-4 rounded-lg hover:bg-[#FFC50F]/20 font-bold">Products</a>
        <a href="{{ route('admin.orders.index') }}" class="block py-2 px-4 rounded-lg hover:bg-[#FFC50F]/20 font-bold">Orders</a>
        {{-- <a href="{{ route('admin.payments.index') }}" class="block py-2 px-4 rounded-lg hover:bg-[#FFC50F]/20 font-bold">Payments</a> --}}
        {{-- <a href="{{ route('admin.product-stocks.index') }}" class="block py-2 px-4 rounded-lg hover:bg-[#FFC50F]/20 font-bold">Stock</a> --}}
        <a href="{{ route('admin.users.index') }}" class="block py-2 px-4 rounded-lg hover:bg-[#FFC50F]/20 font-bold">Users</a>
        <a href="{{ url('admin/content') }}" class="block py-2 px-4 rounded-lg hover:bg-[#FFC50F]/20 font-bold">Content</a>
        <a href="{{ url('admin/system/settings') }}" class="block py-2 px-4 rounded-lg hover:bg-[#FFC50F]/20 font-bold">Settings</a>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="w-full text-left py-2 px-4 rounded-lg hover:bg-[#FFC50F]/20 font-bold text-red-400">Logout</button>
        </form>
    </nav>
</aside>
