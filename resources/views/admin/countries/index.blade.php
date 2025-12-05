@extends('layouts.app')

@section('title', 'Countries Management')

@section('content')
<div class="flex min-h-screen">
    @include('admin.partials.sidebar')
    <main class="flex-1 bg-gray-50 py-12 px-8">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-2xl font-black mb-8">Countries Management</h1>
            <form method="POST" action="{{ route('admin.countries.toggle') }}" id="countriesForm">
                @csrf
                <div class="flex gap-4 mb-4">
                    <button type="button" class="px-4 py-2 bg-green-500 text-white rounded font-bold" onclick="selectAllCountries(true)">Select All</button>
                    <button type="button" class="px-4 py-2 bg-red-500 text-white rounded font-bold" onclick="selectAllCountries(false)">Unselect All</button>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach(App\Models\Country::orderBy('name')->get() as $country)
                        <div class="bg-white p-4 rounded shadow flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                @if($country->flag_url)
                                    <img src="{{ $country->flag_url }}" alt="{{ $country->name }}" class="w-8 h-8 rounded">
                                @endif
                                <span class="font-bold">{{ $country->name }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="active_countries[]" value="{{ $country->id }}" {{ $country->active ? 'checked' : '' }} class="country-checkbox">
                                    <span class="text-xs font-semibold">Tampilkan</span>
                                </label>
                                <button type="button" class="ml-2 px-3 py-1 bg-blue-500 text-white rounded text-xs font-bold" onclick="openEditCountry({{ $country->id }})">Edit</button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-6">
                    <button type="submit" class="px-6 py-2 bg-[#FFC50F] rounded font-bold">Simpan Status</button>
                </div>
            </form>
            @include('admin.countries.edit_modal')
            <script>
                function selectAllCountries(select) {
                    document.querySelectorAll('.country-checkbox').forEach(cb => cb.checked = select);
                }
                function openEditCountry(id) {
                    fetch('/admin/countries/json/' + id)
                        .then(res => res.json())
                        .then(data => {
                            window.dispatchEvent(new CustomEvent('open-edit-country', { detail: data }));
                        });
                }
            </script>
        </div>
    </main>
</div>
@endsection
