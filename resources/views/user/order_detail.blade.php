<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Detail Pesanan #{{ $transaction->transaction_code }} - WeddingMart</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-dvh bg-gray-50 text-gray-900 font-sans">

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
                    <a href="{{ route('cart.index') }}"
                        class="grid place-items-center w-8 h-8 rounded-full border border-gray-200 text-gray-700 hover:bg-gray-50">
                        <svg class="w-4.5 h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.6">
                            <path d="M6 6h15l-1.5 9h-12L6 6Z" />
                            <path d="M6 6l-1-3H2" />
                            <circle cx="9.5" cy="20" r="1.4" />
                            <circle cx="17.5" cy="20" r="1.4" />
                        </svg>
                    </a>
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

    {{-- Back Button --}}
    <div class="bg-white border-b border-gray-100 py-3">
        <div class="container mx-auto px-4 max-w-6xl">
            <a href="{{ route('user.orders') }}"
                class="inline-flex items-center text-pink-600 hover:text-pink-700 text-sm font-medium">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Daftar Pesanan
            </a>
        </div>
    </div>

    <main class="container mx-auto px-4 max-w-6xl py-8">

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-green-600 shrink-0" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <p class="text-sm text-green-800 font-medium">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-red-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-sm text-red-800 font-medium">{{ session('error') }}</p>
                </div>
            </div>
        @endif

        <!-- Page Title -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900 mb-2">Detail Pesanan</h1>
            <p class="text-gray-600">Nomor Pesanan: <span
                    class="font-semibold text-pink-600">{{ $transaction->transaction_code }}</span></p>
        </div>

        <div class="grid lg:grid-cols-3 gap-6">

            <!-- Left Section - Order Details -->
            <div class="lg:col-span-2 space-y-6">

                <!-- Order Status Card -->
                <div class="bg-white rounded-xl border border-gray-200 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-bold text-gray-900">Status Pesanan</h2>
                        @if ($transaction->oder_status == 'menunggu')
                            <span
                                class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-semibold rounded-full">Menunggu
                                Pembayaran</span>
                        @elseif($transaction->oder_status == 'proses')
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full">Sedang
                                Diproses</span>
                        @elseif($transaction->oder_status == 'berhasil')
                            <span
                                class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Selesai</span>
                        @elseif($transaction->oder_status == 'dibatalkan')
                            <span
                                class="px-3 py-1 bg-red-100 text-red-700 text-xs font-semibold rounded-full">Dibatalkan</span>
                        @endif
                    </div>

                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Tanggal Pesanan:</span>
                            <span
                                class="font-medium text-gray-900">{{ $transaction->created_at->format('d M Y, H:i') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Status Pembayaran:</span>
                            @if ($transaction->payment_status == 'paid')
                                <span class="font-medium text-green-600">Sudah Dibayar</span>
                            @else
                                <span class="font-medium text-yellow-600">Belum Dibayar</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Shipping Address Card -->
                <div class="bg-white rounded-xl border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Alamat Pengiriman
                    </h2>
                    @if ($transaction->address)
                        <div class="space-y-1 text-sm">
                            <p class="font-semibold text-gray-900">{{ $transaction->address->recipient_name }}</p>
                            <p class="text-gray-600">{{ $transaction->address->phone }}</p>
                            <p class="text-gray-600">{{ $transaction->address->address }}</p>
                            <p class="text-gray-600">{{ $transaction->address->city }},
                                {{ $transaction->address->province }}
                                {{ $transaction->address->postal_code }}</p>
                        </div>
                    @else
                        <p class="text-gray-500 text-sm">Alamat tidak tersedia</p>
                    @endif
                </div>

                <!-- Order Items Card -->
                <div class="bg-white rounded-xl border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Produk yang Dipesan</h2>
                    <div class="space-y-4">
                        @foreach ($transaction->orderitems as $item)
                            <div class="flex gap-4 pb-4 border-b border-gray-100 last:border-0 last:pb-0">
                                @if ($item->product && $item->product->images && $item->product->images->count() > 0)
                                    <img src="{{ asset('storage/' . $item->product->images->first()->image) }}"
                                        alt="{{ $item->product->name }}"
                                        class="w-20 h-20 rounded-lg object-cover flex-shrink-0">
                                @else
                                    <div
                                        class="w-20 h-20 rounded-lg bg-gray-100 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-semibold text-gray-900 mb-1">
                                        {{ $item->product->name ?? 'Produk tidak tersedia' }}</h3>
                                    <p class="text-sm text-gray-500 mb-2">
                                        {{ $item->product->vendor->name ?? 'Vendor' }}</p>
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm text-gray-600">Jumlah: <span
                                                class="font-medium">{{ $item->quantity }}</span></p>
                                        <p class="text-sm font-semibold text-gray-900">Rp
                                            {{ number_format($item->price, 0, ',', '.') }}</p>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-1">Subtotal: Rp
                                        {{ number_format($item->subtotal, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

    </main>

    <footer class="bg-white border-t mt-12">
        <div class="container mx-auto px-4 max-w-6xl py-3 text-center text-xs text-gray-500">
            &copy; {{ now()->year }} WeddingMart • Marketplace Persiapan Pernikahan Terpercaya
        </div>
    </footer>

    <!-- Modal Konfirmasi Tandai Selesai -->
    <div id="completeModal" class="hidden fixed inset-0 z-[100]" style="animation: fadeIn 0.2s ease-out;">
        <!-- Backdrop with blur -->
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>

        <!-- Modal Container -->
        <div class="relative min-h-screen flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full transform transition-all"
                style="animation: slideUp 0.3s ease-out;" onclick="event.stopPropagation()">
                <div class="p-6">
                    <!-- Icon Success -->
                    <div
                        class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-green-100 mb-5 animate-pulse">
                        <svg class="h-12 w-12 text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>

                    <!-- Content -->
                    <div class="text-center">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Konfirmasi Pesanan Selesai</h3>
                        <p class="text-sm text-gray-600 mb-2">Nomor Pesanan:</p>
                        <div class="bg-green-50 border border-green-200 rounded-lg px-4 py-3 mb-4">
                            <p class="text-lg font-bold text-green-900" id="orderCodeToComplete"></p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4 mb-4">
                            <p class="text-sm text-gray-700 leading-relaxed">
                                <svg class="w-5 h-5 inline-block mr-1 text-green-500" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd" />
                                </svg>
                                Apakah Anda sudah menerima pesanan ini dengan baik?
                            </p>
                        </div>
                        <p class="text-xs text-gray-500 leading-relaxed">
                            Dengan menandai pesanan ini selesai, Anda mengkonfirmasi bahwa:<br>
                            • Pesanan telah diterima dengan lengkap<br>
                            • Produk sesuai dengan deskripsi<br>
                            • Tidak ada kerusakan atau kekurangan
                        </p>
                    </div>
                </div>

                <!-- Actions -->
                <div class="bg-gray-50 px-6 py-5 flex gap-3 rounded-b-2xl border-t border-gray-200">
                    <button type="button" onclick="closeCompleteModal()"
                        class="flex-1 px-5 py-3 bg-white border-2 border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-100 hover:border-gray-400 transition-all duration-200 shadow-sm">
                        <svg class="w-5 h-5 inline-block mr-1" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Batal
                    </button>
                    <button type="button" onclick="confirmComplete()"
                        class="flex-1 px-5 py-3 bg-green-600 text-white font-semibold rounded-xl hover:bg-green-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                        <svg class="w-5 h-5 inline-block mr-1" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7" />
                        </svg>
                        Ya, Tandai Selesai
                    </button>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px) scale(0.95);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        #completeModal:not(.hidden) {
            display: block !important;
        }

        @media print {

            header,
            footer,
            button,
            .no-print {
                display: none !important;
            }
        }
    </style>

    <script>
        let currentCompleteId = null;

        function openCompleteModal(orderId, orderCode) {
            currentCompleteId = orderId;
            document.getElementById('orderCodeToComplete').textContent = orderCode;
            document.getElementById('completeModal').classList.remove('hidden');
            // Prevent body scroll
            document.body.style.overflow = 'hidden';
        }

        function closeCompleteModal() {
            currentCompleteId = null;
            document.getElementById('completeModal').classList.add('hidden');
            // Restore body scroll
            document.body.style.overflow = '';
        }

        function confirmComplete() {
            if (currentCompleteId) {
                document.getElementById('complete-form-' + currentCompleteId).submit();
            }
        }

        // Close modal when clicking outside
        document.getElementById('completeModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeCompleteModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeCompleteModal();
            }
        });
    </script>

</body>

</html>
