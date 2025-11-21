@extends('layouts.app')

@section('title', 'Admin Panel - RAVCONNECT')

@section('content')
<div class="flex flex-col md:flex-row min-h-screen">
    <!-- Sidebar -->
    <aside class="w-full md:w-64 bg-black/95 text-white py-8 px-6 flex-shrink-0 border-r-4 border-[#FFC50F]">
        <div class="flex items-center gap-3 mb-10">
            <img src="{{ asset('resources/assets/img/Logo-transparent.png') }}" alt="RavConnect Logo" class="h-10 w-auto">
            <span class="font-black text-xl">Admin Panel</span>
        </div>
        <nav class="space-y-4">
            <a href="#dashboard" class="block py-2 px-4 rounded-lg hover:bg-[#FFC50F]/20 font-bold">Dashboard</a>
            <a href="#products" class="block py-2 px-4 rounded-lg hover:bg-[#FFC50F]/20 font-bold">Products</a>
            <a href="#orders" class="block py-2 px-4 rounded-lg hover:bg-[#FFC50F]/20 font-bold">Orders</a>
            <a href="#payments" class="block py-2 px-4 rounded-lg hover:bg-[#FFC50F]/20 font-bold">Payments</a>
            <a href="#stock" class="block py-2 px-4 rounded-lg hover:bg-[#FFC50F]/20 font-bold">Stock</a>
            <a href="#content" class="block py-2 px-4 rounded-lg hover:bg-[#FFC50F]/20 font-bold">Content</a>
            <a href="#settings" class="block py-2 px-4 rounded-lg hover:bg-[#FFC50F]/20 font-bold">Settings</a>
        </nav>
    </aside>
    <!-- Main Content -->
    <main class="flex-1 bg-gray-50 py-12 px-6">
        <!-- Dashboard Section -->
        <section id="dashboard" class="mb-12">
            <h1 class="text-3xl font-black text-gray-900 mb-6">Dashboard</h1>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mb-8">
                <div class="bg-white rounded-2xl shadow p-6 border-2 border-[#FFC50F]/20 flex flex-col items-center">
                    <div class="text-2xl font-black text-[#FFC50F]">{{ $stats['orders_total'] ?? 0 }}</div>
                    <div class="text-xs text-gray-500 font-bold">Total Pesanan</div>
                </div>
                <div class="bg-white rounded-2xl shadow p-6 border-2 border-[#FFC50F]/20 flex flex-col items-center">
                    <div class="text-2xl font-black text-blue-500">{{ $stats['orders_pending'] ?? 0 }}</div>
                    <div class="text-xs text-gray-500 font-bold">Pending</div>
                </div>
                <div class="bg-white rounded-2xl shadow p-6 border-2 border-[#FFC50F]/20 flex flex-col items-center">
                    <div class="text-2xl font-black text-green-500">{{ $stats['orders_paid'] ?? 0 }}</div>
                    <div class="text-xs text-gray-500 font-bold">Paid</div>
                </div>
                <div class="bg-white rounded-2xl shadow p-6 border-2 border-[#FFC50F]/20 flex flex-col items-center">
                    <div class="text-2xl font-black text-gray-400">{{ $stats['orders_expired'] ?? 0 }}</div>
                    <div class="text-xs text-gray-500 font-bold">Expired</div>
                </div>
                <div class="bg-white rounded-2xl shadow p-6 border-2 border-[#FFC50F]/20 flex flex-col items-center">
                    <div class="text-2xl font-black text-[#FFC50F]">{{ $stats['products_total'] ?? 0 }}</div>
                    <div class="text-xs text-gray-500 font-bold">Jumlah Produk</div>
                </div>
                <div class="bg-white rounded-2xl shadow p-6 border-2 border-[#FFC50F]/20 flex flex-col items-center">
                    <div class="text-2xl font-black text-green-600">Rp {{ number_format($stats['revenue_total'] ?? 0, 0, ',', '.') }}</div>
                    <div class="text-xs text-gray-500 font-bold">Pendapatan</div>
                </div>
                <div class="bg-white rounded-2xl shadow p-6 border-2 border-[#FFC50F]/20 flex flex-col items-center">
                    <div class="text-2xl font-black text-[#FFC50F]">{{ $stats['stock_total'] ?? 0 }}</div>
                    <div class="text-xs text-gray-500 font-bold">Stok Tersisa</div>
                </div>
            </div>
        </section>
        <!-- Product Management Section -->
        <section id="products" class="mb-12">
            <h2 class="text-xl font-bold mb-4">Product Management</h2>
            <button class="mb-4 px-6 py-3 bg-[#FFC50F] text-black rounded-xl font-black shadow hover:bg-[#FFD700] transition" onclick="openProductModal()">Tambah Produk</button>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-xl shadow">
                    <thead>
                        <tr class="bg-[#FFC50F]/10 text-black">
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Country</th>
                            <th class="px-4 py-2">Price</th>
                            <th class="px-4 py-2">Stock</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $product->id }}</td>
                            <td class="px-4 py-2">{{ $product->name }}</td>
                            <td class="px-4 py-2">{{ $product->country->name ?? '-' }}</td>
                            <td class="px-4 py-2">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="px-4 py-2">{{ $product->stock }}</td>
                            <td class="px-4 py-2 flex gap-2">
                                <button class="px-3 py-1 bg-blue-500 text-white rounded" onclick="editProduct({{ $product->id }})">Edit</button>
                                <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}" onsubmit="return confirm('Delete this product?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Product Modal (hidden by default) -->
            <div id="productModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
                <div class="bg-white rounded-xl p-8 w-full max-w-lg shadow-xl">
                    <h3 class="text-lg font-bold mb-4" id="productModalTitle">Tambah Produk</h3>
                    <form id="productForm" method="POST" action="{{ route('admin.products.store') }}">
                        @csrf
                        <input type="hidden" name="id" id="productId">
                        <div class="mb-4">
                            <label class="block font-bold mb-1">Name</label>
                            <input type="text" name="name" id="productName" class="w-full border rounded px-3 py-2">
                        </div>
                        <div class="mb-4">
                            <label class="block font-bold mb-1">Country</label>
                            <select name="country_id" id="productCountry" class="w-full border rounded px-3 py-2">
                                @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block font-bold mb-1">Price</label>
                            <input type="number" name="price" id="productPrice" class="w-full border rounded px-3 py-2">
                        </div>
                        <div class="mb-4">
                            <label class="block font-bold mb-1">Stock</label>
                            <input type="number" name="stock" id="productStock" class="w-full border rounded px-3 py-2">
                        </div>
                        <div class="flex justify-end gap-2">
                            <button type="button" class="px-4 py-2 bg-gray-300 rounded" onclick="closeProductModal()">Cancel</button>
                            <button type="submit" class="px-4 py-2 bg-[#FFC50F] text-black rounded font-bold">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <script>
                function openProductModal() {
                    document.getElementById('productModal').classList.remove('hidden');
                    document.getElementById('productModalTitle').innerText = 'Tambah Produk';
                    document.getElementById('productForm').action = '{{ route('admin.products.store') }}';
                    document.getElementById('productId').value = '';
                    document.getElementById('productName').value = '';
                    document.getElementById('productCountry').value = '';
                    document.getElementById('productPrice').value = '';
                    document.getElementById('productStock').value = '';
                }
                function closeProductModal() {
                    document.getElementById('productModal').classList.add('hidden');
                }
                function editProduct(id) {
                    // AJAX fetch product data and fill modal fields
                    fetch(`/admin/products/${id}`)
                        .then(res => res.json())
                        .then(data => {
                            document.getElementById('productModal').classList.remove('hidden');
                            document.getElementById('productModalTitle').innerText = 'Edit Produk';
                            document.getElementById('productForm').action = `/admin/products/${id}`;
                            document.getElementById('productId').value = data.id;
                            document.getElementById('productName').value = data.name;
                            document.getElementById('productCountry').value = data.country_id;
                            document.getElementById('productPrice').value = data.price;
                            document.getElementById('productStock').value = data.stock;
                        });
                }
            </script>
        </section>
        <!-- Digital Stock Management Section -->
        <section id="stock" class="mb-12">
            <h2 class="text-xl font-bold mb-4">Digital Stock Management</h2>
            <div>Upload Stok, Tabel Stok, Auto/Manual Assign</div>
        </section>
        <!-- Order Management Section -->
        <section id="orders" class="mb-12">
            <h2 class="text-xl font-bold mb-4">Order Management</h2>
            <div>Filter, Detail, Manual Delivery, Resend Email</div>
        </section>
        <!-- Payment Management Section -->
        <section id="payments" class="mb-12">
            <h2 class="text-xl font-bold mb-4">Payment Gateway Settings</h2>
            <div>API Key, Webhook, QRIS</div>
        </section>
        <!-- Content Management Section -->
        <section id="content" class="mb-12">
            <h2 class="text-xl font-bold mb-4">Website Content Settings</h2>
            <div>Edit Banner, FAQ, Info, Rekomendasi, Kontak, Social Media, Logo, Footer</div>
        </section>
        <!-- System Settings Section -->
        <section id="settings" class="mb-12">
            <h2 class="text-xl font-bold mb-4">System Settings</h2>
            <div>SMTP, WhatsApp CS, Website Title, Meta SEO</div>
        </section>
    </main>
</div>
@endsection
