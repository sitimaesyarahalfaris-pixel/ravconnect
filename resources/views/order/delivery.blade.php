@extends('layouts.app')

@section('title', 'Status Pembayaran - RAVCONNECT')

@section('content')
<section class="relative py-20 bg-linear-to-b from-gray-50 to-white min-h-screen">
    <div class="max-w-2xl mx-auto px-4 relative z-10 text-center">
        <h1 class="text-3xl md:text-4xl font-black text-gray-900 mb-8">Status Pembayaran</h1>
        @if(session('success'))
            <div class="mb-8 p-6 bg-green-100 text-green-800 rounded-xl font-bold text-lg">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-xl font-bold text-base">
                {{ session('error') }}
            </div>
        @endif
        @php $payment = session('payment_data'); @endphp
        @if($payment && isset($payment['id']) && ($payment['status'] ?? $payment['status']) === 'pending')
            <form method="POST" action="{{ route('payment.cancel') }}" class="mb-8">
                @csrf
                <input type="hidden" name="deposit_id" value="{{ $payment['id'] }}">
                <button type="submit" class="inline-block px-8 py-3 bg-red-500 text-white rounded-xl font-bold text-base shadow hover:bg-red-600 transition-all">Batalkan Pembayaran</button>
            </form>
        @endif
        @if($payment)
            @if(empty($payment['id']))
                <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-xl font-bold text-base">
                    Terjadi kesalahan saat membuat permintaan pembayaran. Silakan cek nominal, metode, atau coba metode lain.
                </div>
            @endif
            <div class="mb-8 p-6 bg-white border-2 border-[#FFC50F]/40 rounded-xl text-left shadow-xl mx-auto max-w-lg">
                <h2 class="text-xl font-bold mb-4 text-[#FFC50F]">Instruksi Pembayaran</h2>
                @if(isset($payment['qr_image']))
                    <div class="flex flex-col items-center mb-4">
                        <img src="{{ $payment['qr_image'] }}" alt="QR Pembayaran" class="w-48 h-48 rounded-xl border mb-2">
                        <div class="text-xs text-gray-500 mb-2">Scan QR di aplikasi pembayaran Anda</div>
                    </div>
                @endif
                @if(isset($payment['bank']) && (isset($payment['tujuan']) || isset($payment['nomor_va'])))
                    <div class="mb-2">
                        <span class="font-semibold">Bank:</span> {{ $payment['bank'] ?? '-' }}<br>
                        @if(isset($payment['tujuan']))
                            <span class="font-semibold">No. Rekening:</span> <span class="font-mono text-lg">{{ $payment['tujuan'] }}</span><br>
                        @elseif(isset($payment['nomor_va']))
                            <span class="font-semibold">Nomor Virtual Account:</span> <span class="font-mono text-lg">{{ $payment['nomor_va'] }}</span><br>
                        @endif
                        <span class="font-semibold">Atas Nama:</span> {{ $payment['atas_nama'] ?? '-' }}
                        @if(isset($payment['tambahan']) && $payment['tambahan'])
                            <br><span class="font-semibold">Kode Unik Transfer:</span> <span class="font-mono text-lg">{{ $payment['tambahan'] }}</span>
                        @endif
                    </div>
                @endif
                <div class="mb-2">
                    <span class="font-semibold">Nominal yang harus dibayar:</span>
                    <span class="font-mono text-lg text-[#FFC50F]">Rp {{ isset($payment['nominal']) ? number_format($payment['nominal'], 0, ',', '.') : '-' }}</span>
                    @if(isset($payment['fee']) && $payment['fee'])
                        <br><span class="font-semibold">Biaya Admin:</span> <span class="font-mono text-xs">Rp {{ number_format($payment['fee'], 0, ',', '.') }}</span>
                    @endif
                    @if(isset($payment['get_balance']))
                        <br><span class="font-semibold">Saldo Diterima:</span> <span class="font-mono text-xs">Rp {{ number_format($payment['get_balance'], 0, ',', '.') }}</span>
                    @endif
                </div>
                @if(isset($payment['expired_at']))
                    <div class="text-xs text-gray-500 mb-2">Batas waktu pembayaran: {{ $payment['expired_at'] }}</div>
                @endif
                {{-- @if(isset($payment['qr_string']) && !empty($payment['qr_string']))
                    <div class="mb-2">
                        <span class="font-semibold">QR String:</span>
                        <div class="bg-gray-100 rounded p-2 font-mono text-xs break-all">{{ $payment['qr_string'] }}</div>
                    </div>
                @endif --}}
                @if(isset($payment['url']) && $payment['url'])
                    <div class="mb-2">
                        <span class="font-semibold">Link Pembayaran Ewallet:</span>
                        <a href="{{ $payment['url'] }}" target="_blank" class="inline-block px-4 py-2 bg-blue-500 text-white rounded font-bold hover:bg-blue-600 transition-all mt-1">Bayar Sekarang via Ewallet</a>
                    </div>
                @endif
                <div class="mt-4 text-xs text-gray-500">Status: <span class="font-bold uppercase">{{ $payment['status'] ?? 'pending' }}</span></div>
            </div>
        @endif
        @if(isset($statusData))
            <div id="status-box" class="mb-8 p-4 bg-gray-100 border-l-4 border-[#FFC50F] rounded text-left max-w-lg mx-auto">
                <div class="flex items-center gap-2 mb-2">
                    <span class="font-bold text-gray-700">Status Pembayaran:</span>
                    <span id="status-text" class="uppercase font-black text-base {{ $statusData['status']==='success' ? 'text-green-600' : ($statusData['status']==='pending' ? 'text-yellow-600' : 'text-red-600') }}">
                        {{ $statusData['status'] }}
                    </span>
                </div>
                <div class="text-xs text-gray-500">
                    Metode: <span id="status-metode">{{ $statusData['metode'] ?? '-' }}</span><br>
                    Nominal: Rp <span id="status-nominal">{{ number_format($statusData['nominal'] ?? 0, 0, ',', '.') }}</span><br>
                    Fee: Rp <span id="status-fee">{{ number_format($statusData['fee'] ?? 0, 0, ',', '.') }}</span><br>
                    Saldo diterima: Rp <span id="status-balance">{{ number_format($statusData['get_balance'] ?? 0, 0, ',', '.') }}</span><br>
                    Dibuat: <span id="status-created">{{ $statusData['created_at'] ?? '-' }}</span>
                </div>
                <button id="refresh-status" type="button" class="mt-4 px-6 py-2 bg-[#FFC50F] text-black rounded font-bold shadow hover:bg-[#FFD700] transition-all">Refresh Status</button>
            </div>
            <script>
            document.getElementById('refresh-status').addEventListener('click', function() {
                var btn = this;
                btn.disabled = true;
                btn.innerText = 'Memuat...';
                fetch("{{ route('payment.status') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ deposit_id: '{{ $payment['id'] ?? '' }}' })
                })
                .then(res => res.json())
                .then(data => {
                    if(data.status && data.data) {
                        document.getElementById('status-text').innerText = data.data.status;
                        document.getElementById('status-text').className = 'uppercase font-black text-base ' +
                            (data.data.status === 'success' ? 'text-green-600' : (data.data.status === 'pending' ? 'text-yellow-600' : 'text-red-600'));
                        document.getElementById('status-metode').innerText = data.data.metode || '-';
                        document.getElementById('status-nominal').innerText = parseInt(data.data.nominal).toLocaleString('id-ID');
                        document.getElementById('status-fee').innerText = parseInt(data.data.fee).toLocaleString('id-ID');
                        document.getElementById('status-balance').innerText = parseInt(data.data.get_balance).toLocaleString('id-ID');
                        document.getElementById('status-created').innerText = data.data.created_at || '-';
                    }
                })
                .finally(() => {
                    btn.disabled = false;
                    btn.innerText = 'Refresh Status';
                });
            });
            </script>
        @endif
        <p class="text-gray-700 text-lg mb-8">Silakan selesaikan pembayaran Anda di halaman payment gateway.<br>Setelah pembayaran berhasil, eSIM akan dikirim otomatis ke email Anda.</p>
        <a href="/" class="inline-block px-10 py-4 bg-[#FFC50F] text-black rounded-2xl font-black text-lg shadow-xl hover:bg-[#FFD700] transition-all">Kembali ke Beranda</a>
    </div>
</section>
@endsection
