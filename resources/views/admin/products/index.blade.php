@extends('layouts.app')

@section('title', 'Manage Products')

@section('content')
<div class="flex min-h-screen">
    @include('admin.partials.sidebar')
    <main class="flex-1 bg-gray-50 py-12 px-8">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-black">Product Management</h1>
                <div class="text-sm text-gray-600">Logged in as: {{ auth()->user()->name }}</div>
            </div>

            <button class="mb-4 px-6 py-3 bg-[#FFC50F] text-black rounded-xl font-black shadow hover:bg-[#FFD700] transition" onclick="openProductModal()">Tambah Produk</button>

            <div class="overflow-x-auto bg-white rounded-xl shadow p-4">
        <table class="min-w-full">
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

            <!-- Product Modal -->
            <div id="productModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl p-8 w-full max-w-lg shadow-xl">
            <h3 class="text-lg font-bold mb-4" id="productModalTitle">Tambah Produk</h3>
            <form id="productForm" method="POST" action="{{ route('admin.products.store') }}">
                @csrf
                <input type="hidden" name="_method" id="productFormMethod" value="">
                <input type="hidden" name="id" id="productId">
                <div class="mb-4">
                    <label class="block font-bold mb-1">Name</label>
                    <input type="text" name="name" id="productName" class="w-full border rounded px-3 py-2">
                </div>
                <div class="mb-4">
                    <label class="block font-bold mb-1">Country</label>
                    <select name="country_id" id="productCountry" class="w-full border rounded px-3 py-2">
                        <option value="">-- Select Country --</option>
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
        </div>
    </main>
</div>

<script>
    function openProductModal() {
        document.getElementById('productModal').classList.remove('hidden');
        document.getElementById('productModalTitle').innerText = 'Tambah Produk';
        document.getElementById('productForm').action = '{{ route('admin.products.store') }}';
        document.getElementById('productId').value = '';
        document.getElementById('productFormMethod').value = '';
        document.getElementById('productName').value = '';
        document.getElementById('productCountry').value = '';
        document.getElementById('productPrice').value = '';
        document.getElementById('productStock').value = '';
    }
    function closeProductModal() {
        document.getElementById('productModal').classList.add('hidden');
    }
    function editProduct(id) {
        fetch(`/admin/products/${id}`, { headers: { 'Accept': 'application/json' } })
            .then(res => res.json())
            .then(data => {
                document.getElementById('productModal').classList.remove('hidden');
                document.getElementById('productModalTitle').innerText = 'Edit Produk';
                document.getElementById('productForm').action = `/admin/products/${id}`;
                document.getElementById('productFormMethod').value = 'PUT';
                document.getElementById('productId').value = data.id;
                document.getElementById('productName').value = data.name;
                document.getElementById('productCountry').value = data.country_id ?? (data.country ? data.country.id : '');
                document.getElementById('productPrice').value = data.price;
                document.getElementById('productStock').value = data.stock;
            });
    }
</script>
@endsection
