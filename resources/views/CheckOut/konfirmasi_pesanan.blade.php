<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Konfirmasi Pesanan - WeddingMart</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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

    {{-- Back Button --}}
    <div class="bg-white border-b border-gray-100 py-3">
        <div class="container mx-auto px-4 max-w-6xl">
            <a href="{{ route('checkout.shipping') }}"
                class="inline-flex items-center text-pink-600 hover:text-pink-700 text-sm font-medium">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Alamat
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-6 py-8">

        <!-- Page Title - Center -->
        <div class="text-center mb-10">
            <h1 class="text-2xl font-bold text-gray-900 mb-2">Konfirmasi Pesanan</h1>
            <p class="text-sm text-gray-600">Periksa kembali detail pesanan Anda</p>
        </div>

        <!-- Progress Steps -->
        <div class="mb-10">
            <div class="flex items-center justify-center gap-3">

                <!-- Step 1 - Completed -->
                <div class="flex items-center bg-pink-100 rounded-full px-5 py-2.5 gap-2.5">
                    <div class="w-9 h-9 bg-pink-600 rounded-full flex items-center justify-center text-white shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <span class="text-sm font-semibold text-pink-600 whitespace-nowrap">Alamat Pengiriman</span>
                </div>

                <!-- Line -->
                <div class="w-12 h-0.5 bg-pink-400"></div>

                <!-- Step 2 - Active -->
                <div class="flex items-center bg-pink-100 rounded-full px-5 py-2.5 gap-2.5">
                    <div class="w-9 h-9 bg-pink-600 rounded-full flex items-center justify-center text-white shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <span class="text-sm font-semibold text-pink-600 whitespace-nowrap">Konfirmasi Pesanan</span>
                </div>

            </div>
        </div>

        <!-- Order Details Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6 overflow-hidden">

            <!-- Product Section -->
            <div class="p-6 border-b border-gray-100">
                <div class="flex items-center mb-4">
                    <svg class="w-5 h-5 text-pink-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <h2 class="text-base font-bold text-gray-900">Produk Pesanan ({{ $cart->cartitems->count() }}
                        item)</h2>
                </div>

                <div class="space-y-4">
                    @foreach ($cart->cartitems as $item)
                        <div class="flex items-start gap-4">
                            @if ($item->product->images && $item->product->images->count() > 0)
                                <img src="{{ asset('storage/' . $item->product->images->first()->image) }}"
                                    alt="{{ $item->product->name }}" class="w-16 h-16 rounded-lg object-cover">
                            @else
                                <div class="w-16 h-16 rounded-lg bg-gray-100 flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-900 text-sm mb-1">{{ $item->product->name }}</h3>
                                <p class="text-xs text-gray-500 mb-0.5">Vendor:
                                    {{ $item->product->vendor->name ?? 'Vendor' }}</p>
                                <p class="text-xs text-gray-500">Jumlah: {{ $item->quantity }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-base font-bold text-pink-600">Rp
                                    {{ number_format($item->subtotal, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Shipping Address Section -->
            <div class="p-6">
                <div class="flex items-center mb-4">
                    <svg class="w-5 h-5 text-pink-600 mr-2" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <h2 class="text-base font-bold text-gray-900">Alamat Pengiriman</h2>
                </div>

                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="font-semibold text-gray-900 text-sm mb-1">{{ $address->recipient_name }}</p>
                    <p class="text-xs text-gray-600 mb-2">{{ $address->phone }}</p>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        {{ $address->address }}<br>
                        {{ $address->city }}, {{ $address->province }}<br>
                        Kode Pos: {{ $address->postal_code }}
                    </p>
                </div>
            </div>

        </div>

        <!-- Total Payment Card -->
        <div class="bg-gradient-to-r from-pink-50 to-pink-100 rounded-xl border border-pink-200 p-6">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-xs text-gray-600 mb-1">Total Pembayaran</p>
                    <p class="text-3xl font-bold text-pink-600">Rp {{ number_format($cartTotal, 0, ',', '.') }}</p>
                    <p class="text-xs text-gray-500 mt-1">{{ $cart->cartitems->count() }} item dalam pesanan</p>
                </div>
                <form action="{{ route('checkout.process') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="bg-pink-600 hover:bg-pink-700 text-white font-semibold px-8 py-3.5 rounded-lg shadow-md transition flex items-center gap-2.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <span>Buat Pesanan</span>
                    </button>
                </form>
            </div>
        </div>

    </div>

</body>

</html>
