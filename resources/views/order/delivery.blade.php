@extends('layouts.app')

@section('title', 'Payment Status - RAVCONNECT')

@section('content')
<!-- Hero Section -->
<section class="relative py-16 bg-linear-to-br from-[#F0AC06] via-[#FFD700] to-[#FFA500] overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-3xl mx-auto px-4 relative z-10">
        <div class="text-center">
            <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full border-2 border-white/40 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M12 16v-4"></path>
                    <path d="M12 8h.01"></path>
                </svg>
                <span class="text-black font-bold text-sm">Payment Information</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-black text-black mb-3">Payment Status</h1>
            <p class="text-lg text-black/80">Complete your payment to receive your eSIM</p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="relative py-12 bg-gradient-to-b from-gray-50 to-white min-h-screen">
    <div class="max-w-3xl mx-auto px-4">

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="mb-8 p-6 bg-linear-to-r from-green-50 to-green-100 border-2 border-green-300 rounded-3xl shadow-xl">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <div class="font-black text-green-900 text-lg">{{ session('success') }}</div>
                    </div>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-8 p-6 bg-linear-to-r from-red-50 to-red-100 border-2 border-red-300 rounded-3xl shadow-xl">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <div class="font-black text-red-900 text-base">{{ session('error') }}</div>
                    </div>
                </div>
            </div>
        @endif

        {{-- Only show payment error if there is no valid payment --}}
        @if(!isset($payment) || empty($payment) || !isset($payment['id']) || empty($payment['id']))
            <div class="mb-8 p-6 bg-linear-to-r from-red-50 to-red-100 border-2 border-red-300 rounded-3xl shadow-xl">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <div class="font-black text-red-900 text-base">Payment not found. Please check your payment link or contact support.</div>
                    </div>
                </div>
            </div>
        @endif

        {{-- Only show payment instructions if valid payment exists --}}
        @if(isset($payment) && !empty($payment) && isset($payment['id']) && !empty($payment['id']))
            <!-- Payment Instructions Card -->
            <div class="bg-white rounded-3xl shadow-xl border-2 border-gray-100 p-8 mb-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-black text-gray-900 flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#F0AC06]">
                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                            <line x1="1" y1="10" x2="23" y2="10"></line>
                        </svg>
                        Payment Instructions
                    </h2>
                    @if(isset($payment['id']) && ($payment['status'] ?? $payment['status']) === 'pending')
                        <form method="POST" action="{{ route('payment.cancel') }}">
                            @csrf
                            <input type="hidden" name="deposit_id" value="{{ $payment['id'] }}">
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-xl font-bold text-sm shadow hover:bg-red-600 hover:scale-105 transition-all flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                </svg>
                                Cancel Payment
                            </button>
                        </form>
                    @endif
                </div>

                <!-- DEBUG: Show QR Image URL -->
                <div class="text-xs text-gray-500 mb-2">QR Image: {{ $payment['qr_image'] ?? 'EMPTY' }}</div>
                <!-- QR Code Payment -->
                @if(!empty($payment['qr_image']))
                    <div class="flex flex-col items-center mb-8 p-6 bg-linear-to-br from-gray-50 to-white rounded-2xl border-2 border-gray-200">
                        <div class="w-64 h-64 bg-white rounded-2xl p-4 shadow-lg mb-4 border-2 border-[#F0AC06]/30">
                            <img src="{{ $payment['qr_image'] }}" alt="Payment QR Code" class="w-full h-full object-contain">
                        </div>
                        <div class="text-center">
                            <div class="font-bold text-gray-900 mb-1">Scan QR Code</div>
                            <div class="text-sm text-gray-600">Open your payment app and scan the QR code above</div>
                        </div>
                    </div>
                @endif

                <!-- Bank Transfer / Virtual Account -->
                @if(isset($payment['bank']) && (isset($payment['tujuan']) || isset($payment['nomor_va'])))
                    <div class="mb-6 p-6 bg-linear-to-br from-blue-50 to-blue-100 rounded-2xl border-2 border-blue-200">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-semibold text-blue-900">Bank:</span>
                                <span class="font-black text-blue-900 text-lg">{{ $payment['bank'] ?? '-' }}</span>
                            </div>

                            @if(isset($payment['tujuan']))
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-semibold text-blue-900">Account Number:</span>
                                    <span class="font-mono font-black text-blue-900 text-xl">{{ $payment['tujuan'] }}</span>
                                </div>
                            @elseif(isset($payment['nomor_va']))
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-semibold text-blue-900">Virtual Account:</span>
                                    <span class="font-mono font-black text-blue-900 text-xl">{{ $payment['nomor_va'] }}</span>
                                </div>
                            @endif

                            <div class="flex items-center justify-between">
                                <span class="text-sm font-semibold text-blue-900">Account Name:</span>
                                <span class="font-bold text-blue-900">{{ $payment['atas_nama'] ?? '-' }}</span>
                            </div>

                            @if(isset($payment['tambahan']) && $payment['tambahan'])
                                <div class="flex items-center justify-between pt-3 border-t-2 border-blue-300">
                                    <span class="text-sm font-semibold text-blue-900">Unique Code:</span>
                                    <span class="font-mono font-black text-blue-900 text-xl">{{ $payment['tambahan'] }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- E-Wallet Payment Link -->
                @if(isset($payment['url']) && $payment['url'])
                    <div class="mb-6">
                        <a href="{{ $payment['url'] }}" target="_blank" class="w-full flex items-center justify-center gap-3 px-6 py-4 bg-linear-to-r from-blue-500 to-blue-600 text-white rounded-2xl font-black text-lg shadow-xl hover:shadow-2xl hover:scale-105 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                <line x1="1" y1="10" x2="23" y2="10"></line>
                            </svg>
                            Pay Now via E-Wallet
                        </a>
                    </div>
                @endif

                <!-- Payment Amount -->
                <div class="p-6 bg-linear-to-r from-[#F0AC06]/10 to-[#FFD700]/10 rounded-2xl border-2 border-[#F0AC06]/30 mb-6">
                    <div class="flex items-center justify-between">
                        <span class="font-bold text-gray-900 text-lg">Total Amount to Pay:</span>
                        <span class="font-black text-3xl" style="color:#F0AC06">
                            Rp {{ isset($payment['nominal']) && $payment['nominal'] ? number_format($payment['nominal'], 0, ',', '.') : (isset($payment['amount']) && $payment['amount'] ? number_format($payment['amount'], 0, ',', '.') : '-') }}
                        </span>
                    </div>
                </div>

                <!-- Expiry Time -->
                @if(isset($payment['expired_at']))
                    <div class="flex items-center justify-center gap-2 text-sm text-gray-600 bg-gray-100 rounded-xl p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-red-500">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                        <span class="font-semibold">Payment expires at: <span class="font-black text-red-600">{{ $payment['expired_at'] }}</span></span>
                    </div>
                @endif
            </div>
        @endif

        <!-- Live Status Card -->
        @if(isset($statusData) && ($statusData['status'] ?? '') !== 'success')
            <div id="status-box" class="bg-white rounded-3xl shadow-xl border-2 border-gray-100 p-8 mb-8">
                <h2 class="text-2xl font-black text-gray-900 mb-6 flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#F0AC06]">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 16v-4"></path>
                        <path d="M12 8h.01"></path>
                    </svg>
                    Live Payment Status
                </h2>
                <div class="flex items-center justify-between mb-6 p-6 bg-linear-to-r from-gray-50 to-white rounded-2xl border-2 border-gray-200">
                    <div class="flex items-center gap-4">
                        <span id="status-text" class="uppercase font-black text-2xl {{ ($statusData['status'] ?? '') === 'success' ? 'text-green-600' : (($statusData['status'] ?? '') === 'pending' ? 'text-yellow-600' : 'text-red-600') }}">
                            {{ $statusData['status'] ?? '-' }}
                        </span>
                    </div>
                    <div class="text-center">
                        <span id="status-counter" class="text-xs text-gray-500"></span>
                    </div>
                </div>
                <div style="display: none;">
                    <span id="status-metode">{{ $statusData['metode'] ?? '-' }}</span>
                    <span id="status-nominal">{{ number_format($statusData['nominal'] ?? 0, 0, ',', '.') }}</span>
                    <span id="status-fee">{{ number_format($statusData['fee'] ?? 0, 0, ',', '.') }}</span>
                    <span id="status-balance">{{ number_format($statusData['get_balance'] ?? 0, 0, ',', '.') }}</span>
                    <span id="status-created">{{ $statusData['created_at'] ?? '-' }}</span>
                </div>
                <button id="refresh-status" type="button" class="w-full bg-gradient-to-r from-[#F0AC06] to-[#FFD700] text-black py-4 rounded-2xl font-black text-lg shadow-xl hover:shadow-2xl hover:scale-105 transition-all flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="23 4 23 10 17 10"></polyline>
                        <polyline points="1 20 1 14 7 14"></polyline>
                        <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                    </svg>
                    Refresh Status Now
                </button>
            </div>
            <script>
            let refreshCounter = 5;
            let lastStatus = null;
            function updatePaymentInstructions(data) {
                // Update QR code
                if (data.qr_image) {
                    const qrImg = document.querySelector('img[alt="Payment QR Code"]');
                    if (qrImg) qrImg.src = data.qr_image;
                    document.querySelector('.text-xs.text-gray-500').innerText = 'QR Image: ' + data.qr_image;
                }
                // Update bank info
                if (data.bank) {
                    document.querySelectorAll('.font-black.text-blue-900.text-lg').forEach(e => e.innerText = data.bank);
                }
                if (data.tujuan) {
                    document.querySelectorAll('.font-mono.text-blue-900.text-xl').forEach(e => e.innerText = data.tujuan);
                } else if (data.nomor_va) {
                    document.querySelectorAll('.font-mono.text-blue-900.text-xl').forEach(e => e.innerText = data.nomor_va);
                }
                if (data.atas_nama) {
                    document.querySelectorAll('.font-bold.text-blue-900').forEach(e => e.innerText = data.atas_nama);
                }
                if (data.tambahan) {
                    document.querySelectorAll('.font-mono.text-blue-900.text-xl').forEach(e => e.innerText = data.tambahan);
                }
                // Update e-wallet link
                if (data.url) {
                    document.querySelectorAll('a[target="_blank"]').forEach(e => e.href = data.url);
                }
                // Update amount
                if (data.nominal || data.amount) {
                    document.querySelectorAll('.font-black.text-3xl').forEach(e => e.innerText = 'Rp ' + (data.nominal ? parseInt(data.nominal).toLocaleString('id-ID') : parseInt(data.amount).toLocaleString('id-ID')));
                }
                // Update expiry
                if (data.expired_at) {
                    document.querySelectorAll('.font-black.text-red-600').forEach(e => e.innerText = data.expired_at);
                }
                // Update status badge
                const statusText = document.getElementById('status-text');
                if (statusText && data.payment_status) {
                    statusText.innerText = data.payment_status;
                    statusText.className = 'uppercase font-black text-2xl ' +
                        (data.payment_status === 'SUCCESS' ? 'text-green-600' : (data.payment_status === 'PENDING' ? 'text-yellow-600' : 'text-red-600'));
                }
                // Success handling
                if (data.is_successful && lastStatus !== 'success') {
                    lastStatus = 'success';
                    fetch("{{ route('payment.successUpdate') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ deposit_id: '{{ $payment['id'] ?? '' }}' })
                    }).then(() => { window.location.reload(); });
                } else {
                    lastStatus = data.payment_status;
                }
            }
            function fetchPaymentInstructions() {
                fetch("{{ route('payment.instructions') }}?payment_id={{ $payment['id'] ?? '' }}")
                    .then(res => res.json())
                    .then(data => {
                        updatePaymentInstructions(data);
                    });
            }
            document.getElementById('refresh-status').addEventListener('click', function() {
                var btn = this;
                btn.disabled = true;
                btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="animate-spin"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg> Loading...';
                refreshCounter = 5;
                document.getElementById('status-counter').innerText = refreshCounter + 's';
                fetchPaymentInstructions();
                setTimeout(() => {
                    btn.disabled = false;
                    btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg> Refresh Status Now';
                }, 1200);
            });
            setInterval(() => {
                refreshCounter--;
                document.getElementById('status-counter').innerText = refreshCounter + 's';
                if (refreshCounter <= 0) {
                    fetchPaymentInstructions();
                    refreshCounter = 5;
                }
            }, 1000);
            document.getElementById('status-counter').innerText = refreshCounter + 's';
            // Initial fetch to sync status and instructions on page load
            fetchPaymentInstructions();
            </script>
        @endif
        @if(isset($statusData) && ($statusData['status'] ?? '') === 'success')
            <div class="bg-white rounded-3xl shadow-xl border-2 border-gray-100 p-8 mb-8 text-center">
                <h2 class="text-2xl font-black text-green-700 mb-6 flex items-center justify-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-600">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    Payment Successful!
                </h2>
                <div class="text-lg text-gray-700 mb-4">Your eSIM has been assigned and delivered. You can view it in <a href="/my-esim" class="text-[#F0AC06] font-bold underline">My eSIM</a>.</div>
            </div>
        @endif

        <!-- Info Card -->
        <div class="bg-linear-to-br from-blue-50 to-blue-100 rounded-3xl shadow-xl border-2 border-blue-200 p-8 mb-8">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 16v-4"></path>
                        <path d="M12 8h.01"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <div class="font-black text-blue-900 text-lg mb-2">What's Next?</div>
                    <div class="text-blue-800 text-sm leading-relaxed">
                        Complete your payment using the instructions above. Once payment is confirmed, your eSIM will be automatically sent to your email within minutes. You can also check your eSIM status in the "My eSIM" section.
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="/" class="flex-1 flex items-center justify-center gap-2 px-8 py-4 bg-gradient-to-r from-[#F0AC06] to-[#FFD700] text-black rounded-2xl font-black text-lg shadow-xl hover:shadow-2xl hover:scale-105 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                Back to Home
            </a>
            <a href="/my-esim" class="flex-1 flex items-center justify-center gap-2 px-8 py-4 bg-white border-2 border-[#F0AC06] text-[#F0AC06] rounded-2xl font-black text-lg shadow-md hover:bg-[#F0AC06] hover:text-black hover:scale-105 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect>
                    <line x1="12" y1="18" x2="12.01" y2="18"></line>
                </svg>
                My eSIM
            </a>
        </div>
    </div>
</section>
@endsection
