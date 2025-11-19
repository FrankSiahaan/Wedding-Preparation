<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Metode Pembayaran - WeddingMart</title>
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
            <h1 class="text-2xl font-bold text-gray-900 mb-2">Checkout</h1>
            <p class="text-sm text-gray-600">Selesaikan pesanan Anda</p>
        </div>

        <!-- Progress Steps -->
        <div class="mb-10">
            <div class="flex items-center justify-center gap-3">

                <!-- Step 1 - Completed -->
                <div class="flex items-center bg-pink-100 rounded-full px-5 py-2.5 gap-2.5">
                    <div
                        class="w-9 h-9 bg-red-500 rounded-full flex items-center justify-center text-white flex-shrink-0">
                        <i class="fas fa-check text-xs"></i>
                    </div>
                    <span class="text-sm font-semibold text-red-600 whitespace-nowrap">Alamat Pengiriman</span>
                </div>

                <!-- Line 1 -->
                <div class="w-12 h-0.5 bg-red-400"></div>

                <!-- Step 2 - Active -->
                <div class="flex items-center bg-pink-100 rounded-full px-5 py-2.5 gap-2.5">
                    <div
                        class="w-9 h-9 bg-red-500 rounded-full flex items-center justify-center text-white flex-shrink-0">
                        <i class="fas fa-credit-card text-xs"></i>
                    </div>
                    <span class="text-sm font-semibold text-red-600 whitespace-nowrap">Metode Pembayaran</span>
                </div>

                <!-- Line 2 -->
                <div class="w-12 h-0.5 bg-gray-300"></div>

                <!-- Step 3 - Inactive -->
                <div class="flex items-center bg-gray-100 rounded-full px-5 py-2.5 gap-2.5">
                    <div
                        class="w-9 h-9 bg-gray-400 rounded-full flex items-center justify-center text-white flex-shrink-0">
                        <i class="fas fa-box text-xs"></i>
                    </div>
                    <span class="text-sm font-semibold text-gray-500 whitespace-nowrap">Konfirmasi Pesanan</span>
                </div>

            </div>
        </div>

        <div class="grid grid-cols-3 gap-6">

            <!-- Left Section - Payment Methods -->
            <div class="col-span-2">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

                    <div class="flex items-center mb-5">
                        <svg class="w-5 h-5 text-pink-600 mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                        <h2 class="text-base font-bold text-gray-900">Metode Pembayaran</h2>
                    </div>
                    <p class="text-sm text-gray-500 mb-6">Pilih metode pembayaran yang Anda inginkan</p>

                    <form action="{{ route('checkout.confirmation') }}" method="POST">
                        @csrf
                        <!-- Payment Options -->
                        <div class="space-y-3 mb-6">

                            <!-- Transfer Bank -->
                            <label class="block cursor-pointer">
                                <input type="radio" name="payment_method" value="bank_transfer" class="peer sr-only"
                                    required>
                                <div
                                    class="border-2 border-gray-200 rounded-lg p-4 peer-checked:border-pink-500 peer-checked:bg-pink-50 hover:border-pink-300 transition">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-blue-100 rounded flex items-center justify-center">
                                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-sm font-semibold text-gray-900">Transfer Bank</p>
                                                <p class="text-xs text-gray-500">BCA, BNI, BRI, Mandiri</p>
                                            </div>
                                        </div>
                                        <svg class="w-5 h-5 text-pink-600 hidden peer-checked:block" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </label>

                            <!-- E-Wallet -->
                            <label class="block cursor-pointer">
                                <input type="radio" name="payment_method" value="e_wallet" class="peer sr-only">
                                <div
                                    class="border-2 border-gray-200 rounded-lg p-4 peer-checked:border-pink-500 peer-checked:bg-pink-50 hover:border-pink-300 transition">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                                <svg class="w-5 h-5 text-green-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-sm font-semibold text-gray-900">E-Wallet</p>
                                                <p class="text-xs text-gray-500">GoPay, OVO, DANA, ShopeePay</p>
                                            </div>
                                        </div>
                                        <svg class="w-5 h-5 text-pink-600 hidden peer-checked:block"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </label>

                            <!-- COD -->
                            <label class="block cursor-pointer">
                                <input type="radio" name="payment_method" value="cod" class="peer sr-only">
                                <div
                                    class="border-2 border-gray-200 rounded-lg p-4 peer-checked:border-pink-500 peer-checked:bg-pink-50 hover:border-pink-300 transition">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-10 h-10 bg-yellow-100 rounded flex items-center justify-center">
                                                <svg class="w-5 h-5 text-yellow-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-sm font-semibold text-gray-900">Bayar di Tempat (COD)
                                                </p>
                                                <p class="text-xs text-gray-500">Bayar saat barang diterima</p>
                                            </div>
                                        </div>
                                        <svg class="w-5 h-5 text-pink-600 hidden peer-checked:block"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </label>

                        </div>

                        <!-- Action Buttons -->
                        <div class="flex gap-3">
                            <a href="{{ route('checkout.shipping') }}"
                                class="flex-1 px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition text-center">
                                Kembali
                            </a>
                            <button type="submit"
                                class="flex-1 px-6 py-3 bg-pink-600 hover:bg-pink-700 rounded-lg text-white font-semibold shadow-md transition">
                                Lanjut ke Konfirmasi
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            <!-- Right Section - Order Summary -->
            <div class="col-span-1">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 sticky top-6">

                    <h3 class="text-base font-bold text-gray-900 mb-4">Ringkasan Pesanan</h3>

                    <!-- Shipping Address -->
                    <div class="mb-4 pb-4 border-b">
                        <h4 class="text-xs font-semibold text-gray-500 mb-2">ALAMAT PENGIRIMAN</h4>
                        <p class="text-sm font-semibold text-gray-900">{{ $address->recipient_name }}</p>
                        <p class="text-xs text-gray-600 mt-1">{{ $address->phone }}</p>
                        <p class="text-xs text-gray-600 mt-1">
                            {{ $address->address }}, {{ $address->city }}, {{ $address->province }}
                            {{ $address->postal_code }}
                        </p>
                    </div>

                    <!-- Product Items -->
                    <div class="space-y-3 mb-4 pb-4 border-b max-h-64 overflow-y-auto">
                        @foreach ($cart->cartitems as $item)
                            <div class="flex items-start gap-3">
                                @if ($item->product->images && $item->product->images->count() > 0)
                                    <img src="{{ asset('storage/' . $item->product->images->first()->image) }}"
                                        alt="{{ $item->product->name }}" class="w-14 h-14 rounded-lg object-cover">
                                @else
                                    <div class="w-14 h-14 rounded-lg bg-gray-100 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-sm font-semibold text-gray-900 mb-1 line-clamp-2">
                                        {{ $item->product->name }}</h4>
                                    <p class="text-xs text-gray-500">Qty: {{ $item->quantity }}</p>
                                    <p class="text-sm font-bold text-pink-600 mt-1">Rp
                                        {{ number_format($item->subtotal, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Summary -->
                    <div class="space-y-2 mb-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Subtotal ({{ $cart->cartitems->count() }} item)</span>
                            <span class="text-gray-900 font-medium">Rp
                                {{ number_format($cartTotal, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <!-- Total -->
                    <div class="pt-4 border-t border-gray-200">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-base font-bold text-gray-900">Total</span>
                            <span class="text-xl font-bold text-pink-600">Rp
                                {{ number_format($cartTotal, 0, ',', '.') }}</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</body>

</html>
