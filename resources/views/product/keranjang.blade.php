<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Keranjang Belanja - WeddingMart</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-dvh bg-gray-50 text-gray-900 font-sans">

    {{-- HEADER --}}
    <header class="bg-white sticky top-0 z-50 border-b border-gray-100">
        <div class="container mx-auto px-4 max-w-6xl">
            <nav class="flex items-center justify-between h-14">
                {{-- Logo --}}
                <a href="#" class="flex items-center gap-2.5 shrink-0">
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
                        <input type="text" placeholder="Cari gaun pengantin, dekorasi, fotografi, dan lainnya..."
                            class="w-full pl-9 pr-3 py-2 rounded-full text-sm bg-pink-50/70 placeholder-pink-400 border border-pink-100 focus:border-pink-300 focus:outline-none focus:ring-2 focus:ring-pink-200" />
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-pink-300" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.3-4.3M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15z" />
                        </svg>
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
                        class="grid place-items-center w-8 h-8 rounded-full border border-gray-200 text-gray-700 hover:bg-gray-50">
                        <svg class="w-4.5 h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.6">
                            <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </a>
                </div>
            </nav>
        </div>
    </header>

    {{-- MAIN CONTENT --}}
    <main class="container mx-auto px-4 max-w-6xl py-6">

        {{-- Page Title --}}
        <div class="mb-8">
            <h1 class="text-lg font-bold text-gray-900">Keranjang Belanja</h1>
        </div>

        {{-- Cart Content Grid --}}
        <div class="grid lg:grid-cols-[1fr_380px] gap-6 mb-8">

            {{-- LEFT: Cart Items --}}
            <div class="bg-white rounded-lg border border-gray-100 p-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-base font-semibold text-gray-900">Produk yang Dipilih</h2>
                    <div class="flex items-center gap-1.5">
                        <input type="checkbox" id="selectAll"
                            class="w-4 h-4 rounded border-gray-300 text-pink-600 focus:ring-pink-500">
                        <label for="selectAll" class="text-xs text-gray-600 cursor-pointer">Pilih Semua</label>
                    </div>
                </div>

                {{-- Cart Item --}}
                <div class="flex gap-3.5 pb-4 mb-4 border-b border-gray-100">
                    {{-- Checkbox --}}
                    <div class="flex items-center">
                        <input type="checkbox"
                            class="w-4 h-4 rounded border-gray-300 text-pink-600 focus:ring-pink-500">
                    </div>

                    {{-- Product Image --}}
                    <div class="w-24 h-24 bg-gray-100 rounded-lg overflow-hidden shrink-0">
                        <img src="https://images.unsplash.com/photo-1594736797933-d0501ba2fe65?auto=format&fit=crop&w=300&q=80"
                            alt="Gaun Pengantin" class="w-full h-full object-cover">
                    </div>

                    {{-- Product Info --}}
                    <div class="flex-1 min-w-0">
                        {{-- Product Title & Vendor --}}
                        <div class="mb-2">
                            <h3 class="text-sm font-semibold text-gray-900 mb-0.5 line-clamp-2">Gaun Pengantin Mewah
                                Collection Premium</h3>
                            <div class="flex items-center gap-1 text-xs text-gray-500">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                <span>Atelier Bride</span>
                            </div>
                        </div>

                        {{-- Price & Quantity --}}
                        <div class="flex items-center justify-between">
                            <div class="text-lg font-bold text-pink-600">Rp 15.000.000</div>

                            {{-- Quantity Controls --}}
                            <div class="flex items-center gap-2">
                                <button
                                    class="w-7 h-7 rounded border border-gray-300 hover:bg-gray-50 flex items-center justify-center text-gray-600">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 12H4" />
                                    </svg>
                                </button>
                                <input type="number" value="1" min="1"
                                    class="w-14 h-7 text-center border border-gray-300 rounded text-sm font-medium focus:outline-none focus:ring-1 focus:ring-pink-500">
                                <button
                                    class="w-7 h-7 rounded border border-gray-300 hover:bg-gray-50 flex items-center justify-center text-gray-600">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Delete Button --}}
                    <div class="flex items-center">
                        <button
                            class="w-8 h-8 rounded hover:bg-red-50 flex items-center justify-center text-gray-400 hover:text-red-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Cart Item 2 (Example with different product) --}}
                <div class="flex gap-3.5 pb-4 border-b border-gray-100">
                    {{-- Checkbox --}}
                    <div class="flex items-center">
                        <input type="checkbox"
                            class="w-4 h-4 rounded border-gray-300 text-pink-600 focus:ring-pink-500">
                    </div>

                    {{-- Product Image --}}
                    <div class="w-24 h-24 bg-gray-100 rounded-lg overflow-hidden shrink-0">
                        <img src="https://images.unsplash.com/photo-1515377905703-c4788e51af15?auto=format&fit=crop&w=300&q=80"
                            alt="Cincin Kawin" class="w-full h-full object-cover">
                    </div>

                    {{-- Product Info --}}
                    <div class="flex-1 min-w-0">
                        {{-- Product Title & Vendor --}}
                        <div class="mb-2">
                            <h3 class="text-sm font-semibold text-gray-900 mb-0.5 line-clamp-2">Cincin Kawin Emas 18K
                                Premium</h3>
                            <div class="flex items-center gap-1 text-xs text-gray-500">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                <span>Golden Ring Studio</span>
                            </div>
                        </div>

                        {{-- Price & Quantity --}}
                        <div class="flex items-center justify-between">
                            <div class="text-lg font-bold text-pink-600">Rp 8.500.000</div>

                            {{-- Quantity Controls --}}
                            <div class="flex items-center gap-2">
                                <button
                                    class="w-7 h-7 rounded border border-gray-300 hover:bg-gray-50 flex items-center justify-center text-gray-600">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 12H4" />
                                    </svg>
                                </button>
                                <input type="number" value="2" min="1"
                                    class="w-14 h-7 text-center border border-gray-300 rounded text-sm font-medium focus:outline-none focus:ring-1 focus:ring-pink-500">
                                <button
                                    class="w-7 h-7 rounded border border-gray-300 hover:bg-gray-50 flex items-center justify-center text-gray-600">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Delete Button --}}
                    <div class="flex items-center">
                        <button
                            class="w-8 h-8 rounded hover:bg-red-50 flex items-center justify-center text-gray-400 hover:text-red-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Empty State (Hidden when has items) --}}
                {{-- <div class="text-center py-12">
          <svg class="w-16 h-16 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
          </svg>
          <p class="text-gray-500 text-sm">Keranjang belanja Anda kosong</p>
        </div> --}}
            </div>

            {{-- RIGHT: Order Summary --}}
            <div class="bg-white rounded-lg border border-gray-100 p-4 h-fit sticky top-20">
                <h2 class="text-base font-semibold text-gray-900 mb-4">Ringkasan Pesanan</h2>

                {{-- Summary Details --}}
                <div class="space-y-2 mb-3 pb-3 border-b border-gray-100">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Subtotal (3 item)</span>
                        <span class="font-medium text-gray-900">Rp 32.000.000</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Biaya Layanan</span>
                        <span class="font-medium text-gray-900">Rp 500.000</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Asuransi Pengiriman</span>
                        <span class="font-medium text-gray-900">Rp 250.000</span>
                    </div>
                </div>

                {{-- Promo/Voucher --}}
                <div class="mb-4 pb-4 border-b border-gray-100">
                    <button
                        class="w-full flex items-center justify-between text-sm text-gray-700 hover:text-pink-600 transition-colors">
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                            <span class="font-medium">Gunakan Voucher</span>
                        </div>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>

                {{-- Total --}}
                <div class="flex justify-between items-center mb-4">
                    <span class="text-sm font-semibold text-gray-900">TOTAL PEMBAYARAN</span>
                    <div class="text-right">
                        <div class="text-xl font-bold text-gray-900">Rp 32.750.000</div>
                        <div class="text-[10px] text-gray-500">Termasuk PPN</div>
                    </div>
                </div>

                {{-- Checkout Button --}}
                <button
                    class="w-full bg-pink-600 hover:bg-pink-700 text-white font-semibold py-2.5 rounded-lg text-sm transition-colors shadow-sm">
                    Lanjutkan ke Pembayaran
                </button>

                {{-- Additional Info --}}
                <div class="mt-3 flex items-start gap-1.5 text-xs text-gray-500">
                    <svg class="w-3.5 h-3.5 mt-0.5 text-green-600 shrink-0" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <span>Pembayaran aman dilindungi sistem enkripsi</span>
                </div>
            </div>
        </div>

        {{-- Product Recommendations --}}
        <div class="bg-white rounded-lg border border-gray-100 p-4">
            <div class="flex items-end justify-between mb-4">
                <div>
                    <h2 class="text-[18px] md:text-[20px] font-bold text-gray-900 leading-tight">Produk Rekomendasi
                    </h2>
                    <p class="text-gray-600 text-xs md:text-sm mt-0.5">Produk terpopuler dari vendor terpercaya</p>
                </div>
                <a href="#"
                    class="inline-flex items-center gap-1.5 rounded-full border border-pink-200 bg-pink-50 text-pink-700 text-xs font-medium px-3 py-1.5 hover:bg-pink-100 transition-colors">
                    Lihat Semua
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            {{-- Products Grid - 6 columns --}}
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4 md:gap-5">

                {{-- Card 1 --}}
                <article
                    class="bg-white border rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="aspect-3/2 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1594736797933-d0501ba2fe65?auto=format&fit=crop&w=800&q=80"
                            alt="Gaun Pengantin Mewah Collection" class="w-full h-full object-cover">
                    </div>
                    <div class="p-3">
                        <div class="flex items-center gap-2 text-[11px] text-gray-700 mb-1">
                            <span
                                class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded-full bg-yellow-100 text-yellow-800">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z" />
                                </svg>4.8
                            </span><span class="text-gray-500">(97 ulasan)</span>
                        </div>
                        <h3 class="font-semibold text-gray-900 text-[14.5px] leading-snug">Gaun Pengantin Mewah
                            Collection</h3>
                        <p class="text-[11px] text-gray-500 mt-0.5">Atelier Bride</p>
                        <div class="mt-2">
                            <div class="text-pink-600 font-bold text-sm">Rp 15.000.000</div>
                            <div class="text-[11px] text-gray-400 line-through">Rp 20.000.000</div>
                        </div>
                    </div>
                </article>

                {{-- Card 2 --}}
                <article
                    class="bg-white border rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="aspect-3/2 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1465495976277-4387d4b0e4a6?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                            alt="Cincin Kawin Emas 18K" class="w-full h-full object-cover"
                            referrerpolicy="no-referrer">
                    </div>
                    <div class="p-3">
                        <div class="flex items-center gap-2 text-[11px] text-gray-700 mb-1">
                            <span
                                class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded-full bg-yellow-100 text-yellow-800">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z" />
                                </svg>4.9
                            </span><span class="text-gray-500">(137 ulasan)</span>
                        </div>
                        <h3 class="font-semibold text-gray-900 text-[14.5px] leading-snug">Cincin Kawin Emas 18K</h3>
                        <p class="text-[11px] text-gray-500 mt-0.5">Golden Ring Studio</p>
                        <div class="mt-2">
                            <div class="text-pink-600 font-bold text-sm">Rp 8.500.000</div>
                            <div class="text-[11px] text-gray-400 line-through">Rp 10.000.000</div>
                        </div>
                    </div>
                </article>

                {{-- Card 3 --}}
                <article
                    class="bg-white border rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="aspect-3/2 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=800&q=80"
                            alt="Paket Dekorasi Pelaminan Premium" class="w-full h-full object-cover">
                    </div>
                    <div class="p-3">
                        <div class="flex items-center gap-2 text-[11px] text-gray-700 mb-1">
                            <span
                                class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded-full bg-yellow-100 text-yellow-800">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z" />
                                </svg>4.7
                            </span><span class="text-gray-500">(112 ulasan)</span>
                        </div>
                        <h3 class="font-semibold text-gray-900 text-[14.5px] leading-snug">Paket Dekorasi Pelaminan
                            Premium</h3>
                        <p class="text-[11px] text-gray-500 mt-0.5">Floral Dreams</p>
                        <div class="mt-2">
                            <div class="text-pink-600 font-bold text-sm">Rp 25.000.000</div>
                            <div class="text-[11px] text-gray-400 line-through">Rp 30.000.000</div>
                        </div>
                    </div>
                </article>

                {{-- Card 4 --}}
                <article
                    class="bg-white border rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="aspect-3/2 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=800&q=80"
                            alt="Paket Fotografi Wedding Premium" class="w-full h-full object-cover">
                    </div>
                    <div class="p-3">
                        <div class="flex items-center gap-2 text-[11px] text-gray-700 mb-1">
                            <span
                                class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded-full bg-yellow-100 text-yellow-800">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z" />
                                </svg>4.9
                            </span><span class="text-gray-500">(104 ulasan)</span>
                        </div>
                        <h3 class="font-semibold text-gray-900 text-[14.5px] leading-snug">Paket Fotografi Wedding
                            Premium</h3>
                        <p class="text-[11px] text-gray-500 mt-0.5">Capture Moments</p>
                        <div class="mt-2">
                            <div class="text-pink-600 font-bold text-sm">Rp 12.000.000</div>
                            <div class="text-[11px] text-gray-400 line-through">Rp 15.000.000</div>
                        </div>
                    </div>
                </article>

                {{-- Card 5 --}}
                <article
                    class="bg-white border rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="aspect-3/2 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1507146426996-ef05306b995a?auto=format&fit=crop&w=800&q=80"
                            alt="Paket Venue Romantis Tepi Kolam" class="w-full h-full object-cover">
                    </div>
                    <div class="p-3">
                        <div class="flex items-center gap-2 text-[11px] text-gray-700 mb-1">
                            <span
                                class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded-full bg-yellow-100 text-yellow-800">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z" />
                                </svg>4.6
                            </span><span class="text-gray-500">(89 ulasan)</span>
                        </div>
                        <h3 class="font-semibold text-gray-900 text-[14.5px] leading-snug">Paket Venue Romantis Tepi
                            Kolam</h3>
                        <p class="text-[11px] text-gray-500 mt-0.5">Emerald Hall</p>
                        <div class="mt-2">
                            <div class="text-pink-600 font-bold text-sm">Rp 35.000.000</div>
                            <div class="text-[11px] text-gray-400 line-through">Rp 42.000.000</div>
                        </div>
                    </div>
                </article>

                {{-- Card 6 --}}
                <article
                    class="bg-white border rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="aspect-3/2 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=800&q=80"
                            alt="Paket Katering Premium" class="w-full h-full object-cover">
                    </div>
                    <div class="p-3">
                        <div class="flex items-center gap-2 text-[11px] text-gray-700 mb-1">
                            <span
                                class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded-full bg-yellow-100 text-yellow-800">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z" />
                                </svg>4.7
                            </span><span class="text-gray-500">(76 ulasan)</span>
                        </div>
                        <h3 class="font-semibold text-gray-900 text-[14.5px] leading-snug">Paket Katering Premium</h3>
                        <p class="text-[11px] text-gray-500 mt-0.5">Prima Catering</p>
                        <div class="mt-2">
                            <div class="text-pink-600 font-bold text-sm">Rp 28.000.000</div>
                            <div class="text-[11px] text-gray-400 line-through">Rp 33.000.000</div>
                        </div>
                    </div>
                </article>

            </div>
        </div>

    </main>


    <!-- FOOTER (ultra-compact) -->
    <footer class="bg-white border-t">
        <div class="container mx-auto px-4 max-w-6xl py-2.5 text-center text-xs text-gray-500">
            &copy; {{ now()->year }} WeddingMart • Marketplace Persiapan Pernikahan Terpercaya
        </div>
    </footer>

</body>

</html>
