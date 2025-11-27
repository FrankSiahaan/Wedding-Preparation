<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil - WeddingMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-50">

    <!-- Header -->
    <header class="bg-white sticky top-0 z-50 border-b border-gray-100">
        <div class="container mx-auto px-4 max-w-6xl">
            <nav class="flex items-center justify-between h-14">
                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 shrink-0">
                    <div class="w-8 h-8 rounded-full grid place-items-center bg-yellow-50 ring-1 ring-yellow-100">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="#C7A434" stroke-width="1.5"
                            aria-hidden="true">
                            <path
                                d="M12 21s-6.716-4.319-9.192-8.055C1.113 10.16 2.02 7.5 4.41 6.5 6.08 5.8 7.93 6.3 9 7.6c1.07-1.3 2.92-1.8 4.59-1.1 2.39 1 3.3 3.66 1.6 6.45C18.72 16.68 12 21 12 21Z" />
                        </svg>
                    </div>
                    <div class="leading-tight">
                        <div class="text-base font-semibold text-gray-900">WeddingMart</div>
                        <div class="text-[10px] text-gray-500 -mt-0.5">Marketplace Pernikahan Terpercaya</div>
                    </div>
                </a>

                {{-- Search pill --}}
                <div class="hidden md:flex flex-1 max-w-2xl mx-4">
                    <div class="relative w-full">
                        <form action="{{ route('product.search') }}" method="GET">
                            <input type="search" name="search" autocomplete="off"
                                placeholder="Cari gaun pengantin, dekorasi, fotografi, dan lainnya..."
                                class="w-full pl-9 pr-3 py-2 rounded-full text-sm bg-pink-50/70 placeholder-pink-400 border border-pink-100 focus:border-pink-300 focus:outline-none focus:ring-2 focus:ring-pink-200" />
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-pink-300"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-4.3-4.3M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15z" />
                            </svg>
                        </form>
                    </div>
                </div>

                {{-- Actions --}}
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
                        class="hidden sm:flex items-center gap-1.5 pl-1.5 pr-2.5 py-1 rounded-full border border-pink-100 bg-pink-50/60 hover:bg-pink-100/80 transition-colors">
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
    <div class="min-h-[calc(100vh-80px)] flex items-center justify-center px-6">

        <div class="max-w-2xl w-full text-center">

            <!-- Success Icon -->
            <div class="flex justify-center mb-8">
                <div class="w-32 h-32 bg-green-500 rounded-full flex items-center justify-center">
                    <i class="fas fa-check text-white text-6xl"></i>
                </div>
            </div>

            <!-- Success Title -->
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Pembayaran Berhasil!</h1>

            <!-- Success Message -->
            <p class="text-gray-600 mb-6 text-base">Terima kasih telah melakukan pembayaran. Pesanan Anda sedang
                diproses.</p>

            <!-- Order Details Card -->
            <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6 mb-8 text-left">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Detail Pesanan</h2>

                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Order ID:</span>
                        <span class="text-sm font-semibold text-gray-900">{{ $transaction->order_id }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Total Pembayaran:</span>
                        <span class="text-base font-bold text-pink-600">Rp
                            {{ number_format($transaction->total, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Status Pembayaran:</span>
                        <span class="text-sm font-semibold text-green-600 bg-green-50 px-3 py-1 rounded-full">
                            {{ ucfirst($transaction->payment_status ?? 'Pending') }}
                        </span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Tanggal:</span>
                        <span class="text-sm text-gray-900">{{ $transaction->created_at->format('d M Y, H:i') }}</span>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row justify-center gap-4">

                <!-- Lihat Pesanan Button -->
                <a href="{{ route('user.orders') }}"
                    class="px-8 py-3 bg-gradient-to-r from-pink-400 to-pink-500 hover:from-pink-500 hover:to-pink-600 rounded-full text-white font-semibold shadow-md transition min-w-[200px]">
                    Lihat Pesanan Saya
                </a>

                <!-- Kembali ke Beranda Button -->
                <a href="{{ route('home') }}"
                    class="px-8 py-3 bg-white border-2 border-pink-400 hover:bg-pink-50 rounded-full text-pink-600 font-semibold shadow-md transition min-w-[200px]">
                    Kembali ke Beranda
                </a>

            </div>

        </div>

    </div>

</body>

</html>
