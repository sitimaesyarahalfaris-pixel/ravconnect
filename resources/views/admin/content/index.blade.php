@extends('layouts.app')

@section('title', 'Content Management')

@section('content')
<div class="flex min-h-screen">
    @include('admin.partials.sidebar')
    <main class="flex-1 bg-gray-50 py-12 px-8">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-black">Content Management</h1>
                <div class="text-sm text-gray-600">Logged in as: {{ auth()->user()->name }}</div>
            </div>

            <form method="POST" action="{{ url('admin/content/update') }}" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 gap-6">

                    <div class="bg-white p-6 rounded shadow">
                        <label class="font-bold">Hero Banner Discount (e.g. Diskon 20% untuk Pelanggan Baru!)</label>
                        <input type="text" name="hero_discount" class="w-full border rounded p-2 mb-2" value="{{ $hero_discount->value ?? '' }}">
                        <input type="hidden" name="key" value="hero_discount">
                        <div class="mt-2"><button class="px-4 py-2 bg-[#FFC50F] rounded font-bold">Save</button></div>
                    </div>
                    <div class="bg-white p-6 rounded shadow">
                        <label class="font-bold">Hero Banner Tagline (main headline)</label>
                        <input type="text" name="hero_banner_text" class="w-full border rounded p-2 mb-2" value="{{ $hero_banner_text->value ?? '' }}">
                        <input type="hidden" name="key" value="hero_banner_text">
                        <div class="mt-2"><button class="px-4 py-2 bg-[#FFC50F] rounded font-bold">Save</button></div>
                    </div>
                </div>
            </form>

            <form method="POST" action="{{ url('admin/content/update') }}" enctype="multipart/form-data">
                @csrf
                <div class="bg-white p-6 rounded shadow">
                    <label class="font-bold">Hero Banner Image</label>
                    <input type="file" name="hero_banner_img" class="w-full border rounded p-2 mb-2">
                    @php
                        $imgUrl = $hero_banner_img_url ?? null;
                        if ($imgUrl && !str_starts_with($imgUrl, 'http')) {
                            $imgPath = public_path(parse_url($imgUrl, PHP_URL_PATH));
                            if (!file_exists($imgPath)) {
                                $imgUrl = null;
                            }
                        }
                    @endphp
                    @if(!empty($imgUrl))
                        <div class="mb-2"><img src="{{ $imgUrl }}" alt="Hero Banner" class="max-w-xs rounded shadow"></div>
                    @else
                        <div class="mb-2 text-gray-400 italic">No hero banner image uploaded.</div>
                    @endif
                    <div class="mt-2"><button type="submit" class="px-4 py-2 bg-[#FFC50F] rounded font-bold">Save Image</button></div>
                </div>
            </form>

            <form method="POST" action="{{ url('admin/content/update') }}" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 gap-6">
                    <div class="bg-white p-6 rounded shadow">
                        <label class="font-bold">Hero Banner Stats: Countries</label>
                        <input type="text" name="hero_stat_countries" class="w-full border rounded p-2 mb-2" value="{{ $hero_stat_countries->value ?? '100+' }}">
                        <input type="hidden" name="key" value="hero_stat_countries">
                        <div class="mt-2"><button class="px-4 py-2 bg-[#FFC50F] rounded font-bold">Save</button></div>
                    </div>
                    <div class="bg-white p-6 rounded shadow">
                        <label class="font-bold">Hero Banner Stats: Users</label>
                        <input type="text" name="hero_stat_users" class="w-full border rounded p-2 mb-2" value="{{ $hero_stat_users->value ?? '50K+' }}">
                        <input type="hidden" name="key" value="hero_stat_users">
                        <div class="mt-2"><button class="px-4 py-2 bg-[#FFC50F] rounded font-bold">Save</button></div>
                    </div>
                    <div class="bg-white p-6 rounded shadow">
                        <label class="font-bold">Hero Banner Stats: Rating</label>
                        <input type="text" name="hero_stat_rating" class="w-full border rounded p-2 mb-2" value="{{ $hero_stat_rating->value ?? '4.9★' }}">
                        <input type="hidden" name="key" value="hero_stat_rating">
                        <div class="mt-2"><button class="px-4 py-2 bg-[#FFC50F] rounded font-bold">Save</button></div>
                    </div>
                </div>
            </form>

            <form method="POST" action="{{ url('admin/content/update-recommended-products') }}">
                @csrf
                <div class="bg-white p-6 rounded shadow mb-6">
                    <label class="font-bold mb-2 block">Pilih Produk yang Direkomendasikan</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-2">
                        @foreach(App\Models\Product::where('active', true)->orderBy('name')->get() as $product)
                            <label class="flex items-center space-x-2 border rounded p-2">
                                <input type="checkbox" name="recommended_products[]" value="{{ $product->id }}" {{ (isset($recommended_product_ids) && in_array($product->id, $recommended_product_ids)) ? 'checked' : '' }}>
                                <span>{{ $product->name }} - Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            </label>
                        @endforeach
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="px-4 py-2 bg-[#FFC50F] rounded font-bold">Simpan Pilihan</button>
                    </div>
                </div>
            </form>

            <div class="mt-6 bg-white p-6 rounded shadow">
                <h2 class="font-bold mb-3">Recommended Products</h2>
                <div class="grid grid-cols-3 gap-4">
                    @foreach($recommended_products as $p)
                    <div class="border p-3 rounded">
                        <div class="font-bold">{{ $p->name }}</div>
                        <div class="text-sm">Rp {{ number_format($p->price ?? 0, 0, ',', '.') }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
