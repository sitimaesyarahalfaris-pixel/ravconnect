@extends('layouts.app')

@section('title', 'Manage Products')

@section('content')
<div class="flex min-h-screen">
    @include('admin.partials.sidebar')
    <main class="flex-1 bg-gray-50 py-12 px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-black text-gray-900">Product Management</h1>
                    <p class="text-gray-600 mt-1">Manage your eSIM products and stock inventory</p>
                </div>
                <div class="text-sm text-gray-600 bg-white px-4 py-2 rounded-lg shadow">
                    <span class="font-semibold">Logged in as:</span> {{ auth()->user()->name }}
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

            <!-- Add Product Button -->
            <div class="mb-6">
                <button class="px-6 py-3 bg-gradient-to-r from-[#FFC50F] to-[#FFD700] text-black rounded-xl font-black shadow-lg hover:shadow-xl transition-all hover:scale-105 flex items-center gap-2" onclick="openProductModal()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="16"></line>
                        <line x1="8" y1="12" x2="16" y2="12"></line>
                    </svg>
                    Tambah Produk Baru
                </button>
            </div>

            <!-- Products Table -->
            <div class="overflow-x-auto bg-white rounded-2xl shadow-xl border border-gray-200">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-[#FFC50F]/20 to-[#FFD700]/20 border-b-2 border-[#FFC50F]">
                            <th class="px-6 py-4 text-left font-black text-gray-900">ID</th>
                            <th class="px-6 py-4 text-left font-black text-gray-900">Product Name</th>
                            <th class="px-6 py-4 text-left font-black text-gray-900">Country</th>
                            <th class="px-6 py-4 text-left font-black text-gray-900">Price</th>
                            <th class="px-6 py-4 text-left font-black text-gray-900">Quota</th>
                            <th class="px-6 py-4 text-left font-black text-gray-900">Stock</th>
                            <th class="px-6 py-4 text-left font-black text-gray-900">Validity</th>
                            <th class="px-6 py-4 text-center font-black text-gray-900">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($products as $product)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 font-bold text-gray-700">#{{ $product->id }}</td>
                            <td class="px-6 py-4">
                                <div class="font-bold text-gray-900">{{ $product->name }}</div>
                                <div class="text-xs text-gray-500">{{ $product->operator }}</div>
                            </td>
                            <td class="px-6 py-4">
                                @if($product->country)
                                    <div class="flex items-center gap-2">
                                        <img src="https://flagcdn.com/24x18/{{ strtolower($product->country->code) }}.png" alt="{{ $product->country->name }}" class="w-6 h-4 rounded shadow">
                                        <span class="font-semibold text-gray-700">{{ $product->country->name }}</span>
                                    </div>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-black text-[#FFC50F] text-lg">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-semibold text-gray-700">
                                    @if($product->quota >= 1024)
                                        {{ number_format($product->quota / 1024, 2) }}GB
                                    @else
                                        {{ $product->quota }}MB
                                    @endif
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold {{ $product->stock > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $product->stock }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-semibold text-gray-700">{{ $product->validity }} Days</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <button class="px-4 py-2 bg-blue-500 text-white rounded-lg font-bold hover:bg-blue-600 transition shadow hover:shadow-lg" onclick="editProduct({{ $product->id }})" title="Edit Product">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="inline">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                    </button>
                                    <button class="px-4 py-2 bg-green-500 text-white rounded-lg font-bold hover:bg-green-600 transition shadow hover:shadow-lg" onclick="openStockModal({{ $product->id }})" title="Manage eSIM Stock">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="inline">
                                            <rect x="2" y="7" width="20" height="15" rx="2" ry="2"></rect>
                                            <polyline points="17 2 12 7 7 2"></polyline>
                                        </svg>
                                    </button>
                                    <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}" onsubmit="return confirm('Are you sure you want to delete this product and all its eSIM stock?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg font-bold hover:bg-red-600 transition shadow hover:shadow-lg" title="Delete Product">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="inline">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="px-6 py-12 text-center text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-4 opacity-30">
                                    <rect x="2" y="7" width="20" height="15" rx="2" ry="2"></rect>
                                    <polyline points="17 2 12 7 7 2"></polyline>
                                </svg>
                                <p class="font-bold text-lg">No products found</p>
                                <p class="text-sm mt-2">Click "Tambah Produk Baru" to add your first product</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

<!-- Product Modal -->
<div id="productModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-2xl p-8 w-full max-w-2xl shadow-2xl border-4 border-[#FFC50F]/30 max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-2xl font-black text-gray-900" id="productModalTitle">Tambah Produk</h3>
            <button onclick="closeProductModal()" class="text-gray-400 hover:text-gray-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
        <form id="productForm" method="POST" action="{{ route('admin.products.store') }}">
            @csrf
            <input type="hidden" name="_method" id="productFormMethod" value="">
            <input type="hidden" name="id" id="productId">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block font-bold mb-2 text-gray-700">Product Name *</label>
                    <input type="text" name="name" id="productName" required class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-[#FFC50F] focus:outline-none transition" placeholder="e.g. Thailand Unlimited 7 Days">
                </div>

                <div>
                    <label class="block font-bold mb-2 text-gray-700">Country *</label>
                    <select name="country_id" id="productCountry" required class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-[#FFC50F] focus:outline-none transition">
                        <option value="">-- Select Country --</option>
                        @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block font-bold mb-2 text-gray-700">Price (Rp) *</label>
                    <input type="text" name="price_display" id="productPriceDisplay" required class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-[#FFC50F] focus:outline-none transition" placeholder="Rp 10.000">
                    <input type="hidden" name="price" id="productPrice">
                </div>

                <div>
                    <label class="block font-bold mb-2 text-gray-700">Quota *</label>
                    <input type="text" name="quota_display" id="productQuotaDisplay" required class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-[#FFC50F] focus:outline-none transition" placeholder="e.g. 500MB or 2GB">
                    <input type="hidden" name="quota" id="productQuota">
                    <p class="text-xs text-gray-500 mt-1">Enter with MB or GB suffix</p>
                </div>

                <div>
                    <label class="block font-bold mb-2 text-gray-700">Validity (days) *</label>
                    <input type="number" name="validity" id="productValidity" required class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-[#FFC50F] focus:outline-none transition" placeholder="7">
                </div>

                <div>
                    <label class="block font-bold mb-2 text-gray-700">Operator *</label>
                    <input type="text" name="operator" id="productOperator" required class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-[#FFC50F] focus:outline-none transition" placeholder="e.g. AIS, Telkomsel">
                </div>

                <div class="md:col-span-2">
                    <label class="block font-bold mb-2 text-gray-700">Description</label>
                    <textarea name="description" id="productDescription" rows="3" class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-[#FFC50F] focus:outline-none transition" placeholder="Product description (optional)"></textarea>
                </div>
            </div>

            <div class="flex justify-end gap-3 mt-6 pt-6 border-t-2 border-gray-100">
                <button type="button" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-bold hover:bg-gray-300 transition" onclick="closeProductModal()">Cancel</button>
                <button type="submit" class="px-6 py-3 bg-gradient-to-r from-[#FFC50F] to-[#FFD700] text-black rounded-lg font-black shadow-lg hover:shadow-xl transition hover:scale-105">Save Product</button>
            </div>
        </form>
    </div>
</div>

<!-- eSIM Stock Modal -->
<div id="stockModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-2xl p-8 w-full max-w-5xl shadow-2xl border-4 border-[#FFC50F]/30 max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-2xl font-black text-gray-900" id="stockModalTitle">eSIM Stock Management</h3>
            <button onclick="closeStockModal()" class="text-gray-400 hover:text-gray-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>

        <!-- Stock List -->
        <div id="stockList" class="mb-8"></div>

        <!-- Add/Edit Stock Form -->
        <div class="bg-gradient-to-r from-[#FFC50F]/10 to-[#FFD700]/10 rounded-xl p-6 border-2 border-[#FFC50F]/30">
            <h4 class="font-black text-lg mb-4 text-gray-900" id="stockFormTitle">Add New eSIM Stock</h4>
            <form id="stockForm">
                <input type="hidden" name="product_id" id="stockProductId">
                <input type="hidden" name="stock_id" id="stockId">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block font-bold mb-2 text-gray-700">ICCID *</label>
                        <input type="text" name="iccid" id="stockIccid" required class="w-full border-2 border-gray-300 rounded-lg px-4 py-2 focus:border-[#FFC50F] focus:outline-none transition" placeholder="8901234567890123456">
                    </div>
                    <div>
                        <label class="block font-bold mb-2 text-gray-700">Activation Code *</label>
                        <input type="text" name="activation_code" id="stockActivationCode" required class="w-full border-2 border-gray-300 rounded-lg px-4 py-2 focus:border-[#FFC50F] focus:outline-none transition" placeholder="ABCD-1234-EFGH">
                    </div>
                    <div>
                        <label class="block font-bold mb-2 text-gray-700">SM-DP+ Address *</label>
                        <input type="text" name="smdp_plus" id="stockSmdpPlus" required class="w-full border-2 border-gray-300 rounded-lg px-4 py-2 focus:border-[#FFC50F] focus:outline-none transition" placeholder="sm-dp.example.com">
                    </div>
                    <div>
                        <label class="block font-bold mb-2 text-gray-700">QR Code Image</label>
                        <input type="file" name="qr_image_file" id="stockQrImageFile" class="w-full border-2 border-gray-300 rounded-lg px-4 py-2 focus:border-[#FFC50F] focus:outline-none transition" accept="image/*">
                        <input type="hidden" name="qr_image_url" id="stockQrImageUrl">
                        <p class="text-xs text-gray-500 mt-1">Optional - Upload QR code image</p>
                    </div>
                </div>

                <div class="flex justify-end gap-3 pt-4">
                    <button type="button" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg font-bold hover:bg-gray-300 transition" onclick="resetStockForm()">Reset Form</button>
                    <button type="submit" class="px-6 py-2 bg-gradient-to-r from-[#FFC50F] to-[#FFD700] text-black rounded-lg font-black shadow-lg hover:shadow-xl transition hover:scale-105" id="stockFormSubmitBtn">Add Stock</button>
                </div>
            </form>
        </div>
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
    }

    // Quota normalization (MB/GB)
    const quotaDisplay = document.getElementById('productQuotaDisplay');
    const quotaHidden = document.getElementById('productQuota');
    if (quotaDisplay && quotaHidden) {
        quotaDisplay.addEventListener('input', function() {
            let val = quotaDisplay.value.trim().toUpperCase();
            let mb = 0;
            if (val.includes('GB')) {
                mb = parseFloat(val.replace(/[^\d.]/g, '')) * 1024;
            } else if (val.includes('MB')) {
                mb = parseFloat(val.replace(/[^\d.]/g, ''));
            } else if (!isNaN(val) && val !== '') {
                mb = parseFloat(val);
            }
            quotaHidden.value = mb ? Math.round(mb) : '';
        });
    }

    function openProductModal() {
        document.getElementById('productModal').classList.remove('hidden');
        document.getElementById('productModalTitle').innerText = 'Tambah Produk';
        document.getElementById('productForm').action = '{{ route('admin.products.store') }}';
        document.getElementById('productFormMethod').value = '';
        document.getElementById('productId').value = '';
        document.getElementById('productName').value = '';
        document.getElementById('productCountry').value = '';
        document.getElementById('productPriceDisplay').value = '';
        document.getElementById('productPrice').value = '';
        document.getElementById('productQuotaDisplay').value = '';
        document.getElementById('productQuota').value = '';
        document.getElementById('productValidity').value = '';
        document.getElementById('productOperator').value = '';
        document.getElementById('productDescription').value = '';
    }

    function closeProductModal() {
        document.getElementById('productModal').classList.add('hidden');
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
            if (val.includes('GB')) {
                mb = parseFloat(val.replace(/[^\d.]/g, '')) * 1024;
            } else if (val.includes('MB')) {
                mb = parseFloat(val.replace(/[^\d.]/g, ''));
            } else if (!isNaN(val) && val !== '') {
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
                document.getElementById('productName').value = data.name || '';
                document.getElementById('productCountry').value = data.country_id ?? (data.country ? data.country.id : '');
                document.getElementById('productPriceDisplay').value = data.price ? 'Rp ' + Number(data.price).toLocaleString('id-ID') : '';
                document.getElementById('productPrice').value = data.price || '';

                let quotaVal = '';
                if (data.quota >= 1024) {
                    quotaVal = (data.quota / 1024) + 'GB';
                } else if (data.quota > 0) {
                    quotaVal = data.quota + 'MB';
                }
                document.getElementById('productQuotaDisplay').value = quotaVal;
                document.getElementById('productQuota').value = data.quota || '';
                document.getElementById('productValidity').value = data.validity ?? '';
                document.getElementById('productOperator').value = data.operator ?? '';
                document.getElementById('productDescription').value = data.description ?? '';
            });
    }

    function openStockModal(productId) {
        document.getElementById('stockModal').classList.remove('hidden');
        document.getElementById('stockProductId').value = productId;
        document.getElementById('stockModalTitle').innerText = 'eSIM Stock Management - Product #' + productId;
        resetStockForm();
        loadStockList(productId);
    }

    function closeStockModal() {
        document.getElementById('stockModal').classList.add('hidden');
    }

    function loadStockList(productId) {
        fetch(`/admin/products/${productId}/stocks`, { headers: { 'Accept': 'application/json' } })
            .then(res => res.json())
            .then(data => {
                let html = '<div class="mb-4"><h4 class="font-black text-lg text-gray-900 mb-3">Current eSIM Stock</h4></div>';
                if (data.length === 0) {
                    html += '<div class="text-center py-8 text-gray-400 bg-gray-50 rounded-xl border-2 border-dashed border-gray-200"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-3 opacity-30"><rect x="2" y="7" width="20" height="15" rx="2" ry="2"></rect><polyline points="17 2 12 7 7 2"></polyline></svg><p class="font-bold">No eSIM stock available</p><p class="text-sm mt-1">Add your first eSIM stock using the form below</p></div>';
                } else {
                    html += '<div class="overflow-x-auto bg-white rounded-xl border-2 border-gray-200"><table class="min-w-full text-sm"><thead><tr class="bg-gray-50 border-b-2 border-gray-200"><th class="px-4 py-3 text-left font-bold text-gray-700">ICCID</th><th class="px-4 py-3 text-left font-bold text-gray-700">Activation Code</th><th class="px-4 py-3 text-left font-bold text-gray-700">SM-DP+</th><th class="px-4 py-3 text-left font-bold text-gray-700">Status</th><th class="px-4 py-3 text-center font-bold text-gray-700">Actions</th></tr></thead><tbody class="divide-y divide-gray-100">';
                    data.forEach(stock => {
                        const statusColor = stock.status === 'available' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800';
                        html += `<tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 font-mono text-xs">${stock.iccid ?? '-'}</td>
                            <td class="px-4 py-3 font-mono text-xs">${stock.activation_code ?? '-'}</td>
                            <td class="px-4 py-3 font-mono text-xs">${stock.smdp_plus ?? '-'}</td>
                            <td class="px-4 py-3"><span class="inline-flex px-2 py-1 rounded-full text-xs font-bold ${statusColor}">${stock.status}</span></td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <button class="px-3 py-1 bg-blue-500 text-white rounded-lg font-bold hover:bg-blue-600 transition text-xs" onclick='editStock(${JSON.stringify(stock)})'>Edit</button>
                                    <button class="px-3 py-1 bg-red-500 text-white rounded-lg font-bold hover:bg-red-600 transition text-xs" onclick='deleteStock(${stock.id}, ${productId})'>Delete</button>
                                </div>
                            </td>
                        </tr>`;
                    });
                    html += '</tbody></table></div>';
                }
                document.getElementById('stockList').innerHTML = html;
            });
    }

    function resetStockForm() {
        document.getElementById('stockId').value = '';
        document.getElementById('stockIccid').value = '';
        document.getElementById('stockActivationCode').value = '';
        document.getElementById('stockSmdpPlus').value = '';
        document.getElementById('stockQrImageFile').value = '';
        document.getElementById('stockQrImageUrl').value = '';
        document.getElementById('stockFormTitle').innerText = 'Add New eSIM Stock';
        document.getElementById('stockFormSubmitBtn').innerText = 'Add Stock';
    }

    function editStock(stock) {
        document.getElementById('stockId').value = stock.id;
        document.getElementById('stockIccid').value = stock.iccid || '';
        document.getElementById('stockActivationCode').value = stock.activation_code || '';
        document.getElementById('stockSmdpPlus').value = stock.smdp_plus || '';
        document.getElementById('stockQrImageFile').value = '';
        document.getElementById('stockQrImageUrl').value = stock.qr_image_url || '';
        document.getElementById('stockFormTitle').innerText = 'Edit eSIM Stock #' + stock.id;
        document.getElementById('stockFormSubmitBtn').innerText = 'Update Stock';
        // Enable all inputs for editing
        document.getElementById('stockIccid').removeAttribute('readonly');
        document.getElementById('stockActivationCode').removeAttribute('readonly');
        document.getElementById('stockSmdpPlus').removeAttribute('readonly');
        document.getElementById('stockQrImageFile').removeAttribute('readonly');
        // Scroll to form
        document.getElementById('stockForm').scrollIntoView({ behavior: 'smooth' });
    }

    document.getElementById('stockForm').onsubmit = function(e) {
        e.preventDefault();
        const productId = document.getElementById('stockProductId').value;
        const stockId = document.getElementById('stockId').value;
        const iccid = document.getElementById('stockIccid').value;
        const activationCode = document.getElementById('stockActivationCode').value;
        const smdpPlus = document.getElementById('stockSmdpPlus').value;
        const qrImageFile = document.getElementById('stockQrImageFile').files[0];
        const qrImageUrl = document.getElementById('stockQrImageUrl').value;

        const formData = new FormData();
        formData.append('iccid', iccid);
        formData.append('activation_code', activationCode);
        formData.append('smdp_plus', smdpPlus);
        if (qrImageFile) {
            formData.append('qr_image_file', qrImageFile);
        }
        formData.append('qr_image_url', qrImageUrl);

        const url = stockId ? `/admin/products/${productId}/stocks/${stockId}` : `/admin/products/${productId}/stocks`;
        const method = stockId ? 'POST' : 'POST';

        if (stockId) {
            formData.append('_method', 'PUT');
        }

        fetch(url, {
            method: method,
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData
        })
        .then(res => res.json())
        .then(result => {
            loadStockList(productId); // Refresh stock list immediately
            resetStockForm();
            showToast(result.message || 'Stock saved successfully!', 'success');
        })
        .catch(err => {
            showToast('Error saving stock: ' + err.message, 'error');
        });
    };

    // Toast notification function
    function showToast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = `fixed top-6 right-6 z-[9999] px-6 py-4 rounded-xl shadow-lg font-bold text-white transition-all ${type === 'success' ? 'bg-green-600' : 'bg-red-600'}`;
        toast.innerText = message;
        document.body.appendChild(toast);
        setTimeout(() => {
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 500);
        }, 2500);
    }

    function deleteStock(stockId, productId) {
        if (!confirm('Are you sure you want to delete this eSIM stock?')) return;

        fetch(`/admin/products/${productId}/stocks/${stockId}`, {
            method: 'DELETE',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(res => res.json())
        .then(result => {
            loadStockList(productId);
            showToast(result.message || 'Stock deleted successfully!', 'success');
        })
        .catch(err => {
            showToast('Error deleting stock: ' + err.message, 'error');
        });
    }
</script>
@endsection
