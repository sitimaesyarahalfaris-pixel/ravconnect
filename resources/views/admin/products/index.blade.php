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
                        <button class="px-3 py-1 bg-green-500 text-white rounded" onclick="openStockModal({{ $product->id }})">eSIM Stock</button>
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
                    <input type="text" name="price_display" id="productPriceDisplay" class="w-full border rounded px-3 py-2" placeholder="Rp 10.000">
                    <input type="hidden" name="price" id="productPrice">
                </div>
                <div class="mb-4">
                    <label class="block font-bold mb-1">Stock</label>
                    <input type="number" name="stock" id="productStock" class="w-full border rounded px-3 py-2">
                </div>
                <div class="mb-4">
                    <label class="block font-bold mb-1">Quota</label>
                    <input type="text" name="quota_display" id="productQuotaDisplay" class="w-full border rounded px-3 py-2" placeholder="e.g. 500MB or 2GB">
                    <input type="hidden" name="quota" id="productQuota">
                </div>
                <div class="mb-4">
                    <label class="block font-bold mb-1">Validity (days)</label>
                    <input type="text" name="validity" id="productValidity" class="w-full border rounded px-3 py-2">
                </div>
                <div class="mb-4">
                    <label class="block font-bold mb-1">Operator</label>
                    <input type="text" name="operator" id="productOperator" class="w-full border rounded px-3 py-2">
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

<!-- eSIM Stock Modal -->
<div id="stockModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-xl p-8 w-full max-w-2xl shadow-xl">
        <h3 class="text-lg font-bold mb-4" id="stockModalTitle">eSIM Stock Management</h3>
        <div id="stockList" class="mb-6"></div>
        <form id="stockForm">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <input type="hidden" name="product_id" id="stockProductId">
                <div>
                    <label class="block font-bold mb-1">ICCID</label>
                    <input type="text" name="iccid" id="stockIccid" class="w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="block font-bold mb-1">Activation Code</label>
                    <input type="text" name="activation_code" id="stockActivationCode" class="w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="block font-bold mb-1">SM-DP+</label>
                    <input type="text" name="smdp_plus" id="stockSmdpPlus" class="w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="block font-bold mb-1">QR Image URL</label>
                    <input type="text" name="qr_image_url" id="stockQrImageUrl" class="w-full border rounded px-3 py-2">
                </div>
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" class="px-4 py-2 bg-gray-300 rounded" onclick="closeStockModal()">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-[#FFC50F] text-black rounded font-bold">Add Stock</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Rupiah formatting for price input
    const priceDisplay = document.getElementById('productPriceDisplay');
    const priceHidden = document.getElementById('productPrice');
    if (priceDisplay && priceHidden) {
        priceDisplay.addEventListener('input', function() {
            let value = priceDisplay.value.replace(/[^\d]/g, '');
            priceHidden.value = value;
            priceDisplay.value = value ? 'Rp ' + Number(value).toLocaleString('id-ID') : '';
        });
        priceDisplay.addEventListener('focus', function() {
            let value = priceHidden.value;
            priceDisplay.value = value ? 'Rp ' + Number(value).toLocaleString('id-ID') : '';
        });
    }

    // Quota normalization (MB/GB)
    const quotaDisplay = document.getElementById('productQuotaDisplay');
    const quotaHidden = document.getElementById('productQuota');
    if (quotaDisplay && quotaHidden) {
        quotaDisplay.addEventListener('input', function() {
            let val = quotaDisplay.value.trim().toUpperCase();
            let mb = 0;
            if (val.endsWith('GB')) {
                mb = parseFloat(val.replace('GB', '').trim()) * 1024;
            } else if (val.endsWith('MB')) {
                mb = parseFloat(val.replace('MB', '').trim());
            } else if (!isNaN(val)) {
                mb = parseFloat(val);
            }
            quotaHidden.value = mb ? Math.round(mb) : '';
        });
    }

    function openProductModal() {
        document.getElementById('productModal').classList.remove('hidden');
        document.getElementById('productModalTitle').innerText = 'Tambah Produk';
        document.getElementById('productForm').action = '{{ route('admin.products.store') }}';
        document.getElementById('productId').value = '';
        document.getElementById('productFormMethod').value = '';
        document.getElementById('productName').value = '';
        document.getElementById('productCountry').value = '';
        document.getElementById('productPriceDisplay').value = '';
        document.getElementById('productPrice').value = '';
        document.getElementById('productStock').value = '';
        document.getElementById('productQuotaDisplay').value = '';
        document.getElementById('productQuota').value = '';
        document.getElementById('productValidity').value = '';
        document.getElementById('productOperator').value = '';
    }

    function closeProductModal() {
        document.getElementById('productModal').classList.add('hidden');
    }

    function formatRupiah(input) {
        let value = input.value.replace(/[^\d]/g, '');
        if (!value) { input.value = ''; return; }
        value = parseInt(value, 10).toLocaleString('id-ID');
        input.value = 'Rp ' + value;
    }

    function parseRupiah(str) {
        return parseInt(str.replace(/[^\d]/g, ''), 10) || 0;
    }

    function parseQuota(str) {
        str = str.trim().toUpperCase();
        if (str.endsWith('GB')) {
            let num = parseFloat(str.replace('GB', '').trim());
            return Math.round(num * 1024); // convert GB to MB
        } else if (str.endsWith('MB')) {
            let num = parseFloat(str.replace('MB', '').trim());
            return Math.round(num);
        } else if (!isNaN(str)) {
            return Math.round(parseFloat(str)); // assume MB
        }
        return 0;
    }

    function formatQuotaDisplay(mb) {
        if (mb >= 1024 && mb % 1024 === 0) {
            return (mb / 1024) + ' GB';
        }
        return mb + ' MB';
    }

    document.getElementById('productForm').onsubmit = function(e) {
        // Ensure price and quota hidden fields are set
        if (priceDisplay && priceHidden) {
            let value = priceDisplay.value.replace(/[^\d]/g, '');
            priceHidden.value = value;
        }
        if (quotaDisplay && quotaHidden) {
            let val = quotaDisplay.value.trim().toUpperCase();
            let mb = 0;
            if (val.endsWith('GB')) {
                mb = parseFloat(val.replace('GB', '').trim()) * 1024;
            } else if (val.endsWith('MB')) {
                mb = parseFloat(val.replace('MB', '').trim());
            } else if (!isNaN(val)) {
                mb = parseFloat(val);
            }
            quotaHidden.value = mb ? Math.round(mb) : '';
        }
    };

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
                document.getElementById('productPriceDisplay').value = data.price ? 'Rp ' + Number(data.price).toLocaleString('id-ID') : '';
                document.getElementById('productPrice').value = data.price;
                let quotaVal = '';
                if (data.quota >= 1024) {
                    quotaVal = (data.quota / 1024) + 'GB';
                } else if (data.quota > 0) {
                    quotaVal = data.quota + 'MB';
                }
                document.getElementById('productQuotaDisplay').value = quotaVal;
                document.getElementById('productQuota').value = data.quota;
                document.getElementById('productStock').value = data.stock;
                document.getElementById('productValidity').value = data.validity ?? '';
                document.getElementById('productOperator').value = data.operator ?? '';
            });
    }

    function openStockModal(productId) {
        document.getElementById('stockModal').classList.remove('hidden');
        document.getElementById('stockProductId').value = productId;
        document.getElementById('stockModalTitle').innerText = 'eSIM Stock Management';
        // Fetch and show stock list
        fetch(`/admin/products/${productId}/stocks`, { headers: { 'Accept': 'application/json' } })
            .then(res => res.json())
            .then(data => {
                let html = '<div class="mb-2 font-bold">Existing eSIM Stocks:</div>';
                if (data.length === 0) {
                    html += '<div class="text-gray-400">No eSIM stock available.</div>';
                } else {
                    html += '<div class="overflow-x-auto"><table class="min-w-full text-xs"><thead><tr><th>ICCID</th><th>Activation Code</th><th>SM-DP+</th><th>Status</th><th>Action</th></tr></thead><tbody>';
                    data.forEach(stock => {
                        html += `<tr><td>${stock.iccid ?? '-'}</td><td>${stock.activation_code ?? '-'}</td><td>${stock.smdp_plus ?? '-'}</td><td>${stock.status}</td><td><button class='text-red-500' onclick='deleteStock(${stock.id}, ${productId})'>Delete</button></td></tr>`;
                    });
                    html += '</tbody></table></div>';
                }
                document.getElementById('stockList').innerHTML = html;
            });
    }

    function closeStockModal() {
        document.getElementById('stockModal').classList.add('hidden');
    }

    document.getElementById('stockForm').onsubmit = function(e) {
        e.preventDefault();
        const productId = document.getElementById('stockProductId').value;
        const iccid = document.getElementById('stockIccid').value;
        const activationCode = document.getElementById('stockActivationCode').value;
        const smdpPlus = document.getElementById('stockSmdpPlus').value;
        const qrImageUrl = document.getElementById('stockQrImageUrl').value;
        fetch(`/admin/products/${productId}/stocks`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: JSON.stringify({ iccid, activation_code: activationCode, smdp_plus: smdpPlus, qr_image_url: qrImageUrl })
        }).then(res => res.json()).then(() => {
            openStockModal(productId);
            document.getElementById('stockForm').reset();
        });
    };

    function deleteStock(stockId, productId) {
        fetch(`/admin/products/${productId}/stocks/${stockId}`, {
            method: 'DELETE',
            headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
        }).then(res => res.json()).then(() => {
            openStockModal(productId);
        });
    }
</script>
@endsection
