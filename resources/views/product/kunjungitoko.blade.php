<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Atelier Bride - WeddingMart</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-dvh bg-gray-50 text-gray-900 font-sans">

    {{-- HEADER --}}
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
                            <input type="search" name="search"
                                placeholder="Cari gaun pengantin, dekorasi, fotografi, dan lainnya..."
                                class="w-full pl-9 pr-3 py-2 rounded-full text-sm bg-pink-50/70 placeholder-pink-400 border border-pink-100 focus:border-pink-300 focus:outline-none focus:ring-2 focus:ring-pink-200" />
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-pink-300 pointer-events-none"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-4.3-4.3M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15z" />
                            </svg>
                        </form>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="flex items-center gap-3">
                    @auth
                        <a href="{{ route('cart.index') }}"
                            class="grid place-items-center w-8 h-8 rounded-full border border-gray-200 text-gray-700 hover:bg-gray-50 relative">
                            <svg class="w-4.5 h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.6">
                                <path d="M6 6h15l-1.5 9h-12L6 6Z" />
                                <path d="M6 6l-1-3H2" />
                                <circle cx="9.5" cy="20" r="1.4" />
                                <circle cx="17.5" cy="20" r="1.4" />
                            </svg>
                        </a>
                        <a href="{{ route('user.profile') }}"
                            class="hidden sm:flex items-center gap-1.5 pl-1.5 pr-2.5 py-1 rounded-full border border-pink-100 bg-pink-50/60">
                            <span class="grid place-items-center w-6.5 h-6.5 rounded-full bg-pink-100 text-pink-700">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.6">
                                    <circle cx="12" cy="8.4" r="3.1" />
                                    <path d="M4 20a8 8 0 0 1 16 0" />
                                </svg>
                            </span>
                            <span class="text-[13px] text-gray-700">{{ auth()->user()->name }}</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="px-4 py-1.5 bg-pink-600 hover:bg-pink-700 text-white text-sm font-medium rounded-lg transition-colors">
                            Login
                        </a>
                    @endauth
                </div>
            </nav>
        </div>
    </header>

    {{-- VENDOR PROFILE --}}
    <section class="bg-white border-b border-gray-100">
        <div class="container mx-auto px-4 max-w-6xl py-6">
            <div class="flex flex-col md:flex-row gap-6">

                {{-- Vendor Avatar & Info --}}
                <div class="flex gap-4 items-start">
                    {{-- Avatar --}}
                    @if ($vendor->logo)
                        <div class="w-24 h-24 rounded-full overflow-hidden shrink-0 ring-4 ring-pink-50 shadow-md">
                            <img src="{{ Storage::url($vendor->logo) }}" alt="{{ $vendor->name }}"
                                class="w-full h-full object-cover">
                        </div>
                    @else
                        <div
                            class="w-24 h-24 rounded-full bg-gradient-to-br from-pink-100 to-purple-100 flex items-center justify-center shrink-0 ring-4 ring-pink-50">
                            <svg class="w-12 h-12 text-pink-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                    @endif

                    {{-- Vendor Details --}}
                    <div class="flex-1">
                        <div class="mb-2">
                            <h1 class="text-xl font-bold text-gray-900 mb-1">{{ $vendor->name }}</h1>
                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>{{ $vendor->address ?? 'Lokasi tidak tersedia' }}</span>
                            </div>
                        </div>

                        {{-- Stats --}}
                        <div class="flex items-center gap-6 mb-3">
                            <div class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 fill-yellow-500" viewBox="0 0 24 24">
                                    <path
                                        d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z" />
                                </svg>
                                <span
                                    class="text-sm font-semibold text-gray-900">{{ number_format($avgRating ?? 0, 1) }}</span>
                                <span class="text-sm text-gray-500">({{ number_format($totalReviews ?? 0) }}
                                    ulasan)</span>
                            </div>
                            <div class="text-sm text-gray-600">
                                <span class="font-semibold text-gray-900">{{ $totalProducts }}</span> Produk
                            </div>
                            <div class="text-sm text-gray-600">
                                <span class="font-semibold text-gray-900">{{ number_format($totalSold ?? 0) }}</span>
                                Terjual
                            </div>
                        </div>

                        {{-- Description --}}
                        <p class="text-sm text-gray-600 leading-relaxed">
                            {{ $vendor->description ?? 'Deskripsi toko belum tersedia.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- PRODUCTS SECTION --}}
    <main class="container mx-auto px-4 max-w-6xl py-6">

        {{-- Section Header --}}
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-bold text-gray-900">Semua Produk ({{ $totalProducts }})</h2>

            {{-- Filter & Sort --}}
            <div class="flex items-center gap-2">
                <form method="GET" action="{{ route('vendor.show', $vendor->id) }}">
                    <select name="sort" onchange="this.form.submit()"
                        class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-pink-500">
                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Terbaru</option>
                        <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Harga
                            Terendah</option>
                        <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Harga
                            Tertinggi</option>
                        <option value="best_seller" {{ request('sort') == 'best_seller' ? 'selected' : '' }}>Terlaris
                        </option>
                        <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Rating Tertinggi
                        </option>
                    </select>
                </form>
            </div>
        </div>

        @if ($products->count() > 0)
            {{-- Products Grid - 6 columns like homepage --}}
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4 md:gap-5">

                @foreach ($products as $product)
                    {{-- Product Card --}}
                    <article class="bg-white rounded-xl overflow-hidden hover:shadow-md transition-shadow">
                        <a href="{{ route('product.detail', $product->id) }}" class="block">
                            <div class="aspect-[3/2] overflow-hidden">
                                @if ($product->images && $product->images->count() > 0)
                                    <img src="{{ asset('storage/' . $product->images->first()->image) }}"
                                        alt="{{ $product->name }}"
                                        class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                                @else
                                    <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="p-3">
                                @if ($product->avg_rating > 0)
                                    <div class="flex items-center gap-2 text-[11px] text-gray-700 mb-1">
                                        <span
                                            class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded-full bg-yellow-100 text-yellow-800">
                                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor">
                                                <path
                                                    d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z" />
                                            </svg>
                                            {{ number_format($product->avg_rating, 1) }}
                                        </span>
                                        <span class="text-gray-500">({{ $product->total_review ?? 0 }} ulasan)</span>
                                    </div>
                                @endif
                                <h3 class="font-semibold text-gray-900 text-[14.5px] leading-snug line-clamp-2">
                                    {{ $product->name }}</h3>
                                <p class="text-[11px] text-gray-500 mt-0.5">{{ $vendor->name }}</p>
                                <div class="mt-2">
                                    <div class="text-pink-600 font-bold text-sm">Rp
                                        {{ number_format($product->price, 0, ',', '.') }}</div>
                                    @if ($product->total_sold > 0)
                                        <div class="text-[11px] text-gray-400">{{ $product->total_sold }} Terjual
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </article>
                @endforeach

            </div>
        @else
            {{-- Empty State --}}
            <div class="text-center py-12">
                <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Produk</h3>
                <p class="text-gray-500">Toko ini belum memiliki produk yang tersedia</p>
            </div>
        @endif

        {{-- Pagination --}}
        @if ($products->hasPages())
            <div class="flex items-center justify-center gap-2 mt-8">
                {{-- Previous Button --}}
                @if ($products->onFirstPage())
                    <button
                        class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-400 cursor-not-allowed"
                        disabled>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                @else
                    <a href="{{ $products->previousPageUrl() }}"
                        class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                @endif

                {{-- Page Numbers --}}
                @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                    @if ($page == $products->currentPage())
                        <button
                            class="px-3 py-2 bg-pink-600 text-white rounded-lg text-sm font-medium">{{ $page }}</button>
                    @else
                        <a href="{{ $url }}"
                            class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">{{ $page }}</a>
                    @endif
                @endforeach

                {{-- Next Button --}}
                @if ($products->hasMorePages())
                    <a href="{{ $products->nextPageUrl() }}"
                        class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                @else
                    <button
                        class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-400 cursor-not-allowed"
                        disabled>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                @endif
            </div>
        @endif

    </main>

    <!-- FOOTER (ultra-compact) -->
    <footer class="bg-white border-t">
        <div class="container mx-auto px-4 max-w-6xl py-2.5 text-center text-xs text-gray-500">
            &copy; {{ now()->year }} WeddingMart • Marketplace Persiapan Pernikahan Terpercaya
        </div>
    </footer>

</body>

</html>
