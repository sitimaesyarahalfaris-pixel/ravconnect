@extends('layouts.app')

@section('title', 'My eSIM - RAVCONNECT')

@section('content')
<div class="max-w-2xl mx-auto py-10 px-4">
    <h1 class="text-3xl font-black mb-8 text-[#FFC50F]">My eSIM</h1>
    @if($esims->isEmpty())
        <div class="text-center text-gray-400 py-20">Belum ada eSIM yang kamu miliki.</div>
    @else
        <div class="grid gap-6">
            @foreach($esims as $esim)
                <div class="bg-white rounded-xl shadow border p-6 flex flex-col md:flex-row gap-6 items-center">
                    <img src="{{ $esim->qr_image_url }}" alt="QR eSIM" class="w-32 h-32 object-contain rounded border">
                    <div class="flex-1">
                        <div class="font-bold text-lg text-gray-900 mb-2">
                            {{ $esim->product->name ?? '-' }}
                        </div>
                        <div class="text-sm text-gray-700 mb-1">ICCID: <span class="font-mono">{{ $esim->iccid }}</span></div>
                        <div class="text-sm text-gray-700 mb-1">Activation Code: <span class="font-mono">{{ $esim->activation_code }}</span></div>
                        <div class="text-sm text-gray-700 mb-1">SM-DP+: <span class="font-mono">{{ $esim->smdp_plus }}</span></div>
                        <div class="text-xs text-gray-500">Assigned at: {{ $esim->pivot->assigned_at }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
