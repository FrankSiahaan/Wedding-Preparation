<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Proses Pembayaran - WeddingMart</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Midtrans Snap JS -->
    <script
        src="{{ config('midtrans.isProduction') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
</head>

<body class="bg-gray-50">

    {{-- HEADER --}}
    <header class="bg-white sticky top-0 z-50 border-b border-gray-100">
        <div class="container mx-auto px-4 max-w-6xl">
            <nav class="flex items-center justify-between h-14">
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 shrink-0">
                    <div class="w-8 h-8 rounded-full grid place-items-center bg-yellow-50 ring-1 ring-yellow-100">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="#C7A434" stroke-width="1.5">
                            <path
                                d="M12 21s-6.716-4.319-9.192-8.055C1.113 10.16 2.02 7.5 4.41 6.5 6.08 5.8 7.93 6.3 9 7.6c1.07-1.3 2.92-1.8 4.59-1.1 2.39 1 3.3 3.66 1.6 6.45C18.72 16.68 12 21 12 21Z" />
                        </svg>
                    </div>
                    <div class="leading-tight">
                        <div class="text-base font-semibold text-gray-900">WeddingMart</div>
                        <div class="text-[10px] text-gray-500 -mt-0.5">Marketplace Pernikahan Terpercaya</div>
                    </div>
                </a>

                <div class="flex items-center gap-3">
                    <a href="{{ route('user.profile') }}"
                        class="flex items-center gap-1.5 pl-1.5 pr-2.5 py-1 rounded-full border border-pink-100 bg-pink-50/60">
                        <span class="grid place-items-center w-6.5 h-6.5 rounded-full bg-pink-100 text-pink-700">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.6">
                                <circle cx="12" cy="8.4" r="3.1" />
                                <path d="M4 20a8 8 0 0 1 16 0" />
                            </svg>
                        </span>
                        <span class="text-[13px] text-gray-700">{{ auth()->user()->name }}</span>
                    </a>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <div class="min-h-screen flex items-center justify-center px-6 py-12">
        <div class="max-w-md w-full text-center">

            <!-- Loading Animation -->
            <div class="mb-8">
                <div class="inline-block">
                    <svg class="animate-spin h-16 w-16 text-pink-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                </div>
            </div>

            <!-- Title -->
            <h1 class="text-2xl font-bold text-gray-900 mb-3">Memproses Pembayaran</h1>
            <p class="text-gray-600 mb-6">Mohon tunggu, kami sedang mempersiapkan halaman pembayaran Anda...</p>

            <!-- Transaction Info -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
                <div class="flex justify-between items-center mb-3">
                    <span class="text-sm text-gray-600">Order ID:</span>
                    <span class="text-sm font-semibold text-gray-900">{{ $transaction->order_id }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Total Pembayaran:</span>
                    <span class="text-lg font-bold text-pink-600">Rp
                        {{ number_format($transaction->total, 0, ',', '.') }}</span>
                </div>
            </div>

            <!-- Info -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <p class="text-sm text-blue-800">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Jika pop-up pembayaran tidak muncul, klik tombol di bawah ini
                </p>
                <button id="pay-button"
                    class="mt-4 w-full px-6 py-3 bg-pink-600 hover:bg-pink-700 rounded-lg text-white font-semibold shadow-md transition">
                    Buka Halaman Pembayaran
                </button>
            </div>

            <!-- Back Link -->
            <div class="mt-6">
                <a href="{{ route('user.orders') }}" class="text-sm text-gray-600 hover:text-pink-600 transition">
                    ← Kembali ke Pesanan Saya
                </a>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        // Snap Token
        var snapToken = '{{ $snapToken }}';
        var transactionId = {{ $transaction->id }};

        // Auto trigger payment on page load
        window.addEventListener('load', function() {
            setTimeout(function() {
                snap.pay(snapToken, {
                    onSuccess: function(result) {
                        console.log('Payment success:', result);
                        window.location.href =
                            "{{ route('checkout.success', ['transaction' => $transaction->id]) }}";
                    },
                    onPending: function(result) {
                        console.log('Payment pending:', result);
                        alert(
                        'Pembayaran Anda sedang diproses. Silakan selesaikan pembayaran.');
                        window.location.href = "{{ route('user.orders') }}";
                    },
                    onError: function(result) {
                        console.log('Payment error:', result);
                        alert(
                        'Terjadi kesalahan saat memproses pembayaran. Silakan coba lagi.');
                        window.location.href = "{{ route('user.orders') }}";
                    },
                    onClose: function() {
                        console.log('Payment popup closed');
                        alert(
                            'Anda menutup halaman pembayaran. Silakan selesaikan pembayaran dari menu Pesanan Saya.');
                        window.location.href = "{{ route('user.orders') }}";
                    }
                });
            }, 1000);
        });

        // Manual trigger for pay button
        document.getElementById('pay-button').addEventListener('click', function() {
            snap.pay(snapToken, {
                onSuccess: function(result) {
                    window.location.href =
                        "{{ route('checkout.success', ['transaction' => $transaction->id]) }}";
                },
                onPending: function(result) {
                    alert('Pembayaran Anda sedang diproses. Silakan selesaikan pembayaran.');
                    window.location.href = "{{ route('user.orders') }}";
                },
                onError: function(result) {
                    alert('Terjadi kesalahan saat memproses pembayaran. Silakan coba lagi.');
                    window.location.href = "{{ route('user.orders') }}";
                },
                onClose: function() {
                    alert(
                        'Anda menutup halaman pembayaran. Silakan selesaikan pembayaran dari menu Pesanan Saya.');
                    window.location.href = "{{ route('user.orders') }}";
                }
            });
        });
    </script>

</body>

</html>
