@extends('layouts.app')

@section('title', 'Browse Countries')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-16">
    <h1 class="text-3xl font-black mb-8">Browse Countries</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach(App\Models\Country::where('active', true)->orderBy('name')->get() as $country)
            <a href="{{ route('countries.show', $country->id) }}" class="block bg-white rounded-xl shadow p-6 hover:shadow-lg transition">
                <div class="flex items-center gap-4 mb-4">
                    @if($country->flag_url)
                        <img src="{{ $country->flag_url }}" alt="{{ $country->name }}" class="w-10 h-10 rounded">
                    @endif
                    <span class="font-bold text-lg">{{ $country->name }}</span>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
