@extends('layouts.app')

@section('content')

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
                                <input type="search" name="search" id="search" autocomplete="off"
                                    placeholder="Cari gaun pengantin, dekorasi, fotografi, dan lainnya..."
                                    class="w-full pl-9 pr-3 py-2 rounded-full text-sm bg-pink-50/70 placeholder-pink-400 border border-pink-100 focus:border-pink-300 focus:outline-none focus:ring-2 focus:ring-pink-200" />
                                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-pink-300"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-4.3-4.3M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15z" />
                                </svg>
                                <button type="submit" class="sr-only">Search</button>
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

        <main class="container mx-auto px-4 max-w-7xl py-8">
            <div class="grid lg:grid-cols-[260px_1fr] gap-6">
                {{-- SIDEBAR FILTER --}}
                <aside class="lg:sticky lg:top-4 h-fit">
                    <div class="bg-white rounded-xl p-5 shadow-sm">
                        {{-- Filter Header --}}
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-base font-semibold text-gray-900 flex items-center gap-2">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                </svg>
                                Filter Produk
                            </h3>
                        </div>

                        <form action="{{ route('product.filter') }}" method="POST">
                            @csrf
                            {{-- Kategori Filter --}}
                            <div class="mb-6">
                                <h4 class="text-sm font-semibold text-gray-900 mb-3">Kategori</h4>
                                <div class="space-y-2">
                                    <label class="flex items-center gap-2 cursor-pointer group">
                                        <input type="radio" name="kategori" value=""
                                            {{ !request('kategori') ? 'checked' : '' }}
                                            class="w-4 h-4 border-gray-300 text-pink-600 focus:ring-pink-500">
                                        <span class="text-sm text-gray-700 group-hover:text-gray-900">Semua</span>
                                    </label>
                                    @foreach ($categories as $category)
                                        <label class="flex items-center gap-2 cursor-pointer group">
                                            <input type="radio" name="kategori" value="{{ $category->id }}"
                                                {{ request('kategori') == $category->id ? 'checked' : '' }}
                                                class="w-4 h-4 border-gray-300 text-pink-600 focus:ring-pink-500">
                                            <span
                                                class="text-sm text-gray-700 group-hover:text-gray-900">{{ $category->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Lokasi Filter --}}
                            <div class="mb-6">
                                <h4 class="text-sm font-semibold text-gray-900 mb-3">Lokasi</h4>
                                <div class="space-y-2">
                                    <input type="text" name="lokasi" value="{{ request('lokasi') }}"
                                        placeholder="Masukkan lokasi (opsional)"
                                        class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
                                </div>
                            </div>

                            {{-- Rentang Harga --}}
                            <div class="mb-6">
                                <h4 class="text-sm font-semibold text-gray-900 mb-3">Rentang Harga</h4>
                                <div class="space-y-3">
                                    <input type="number" name="min_price" value="{{ request('min_price') }}"
                                        placeholder="Harga Minimum"
                                        class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
                                    <input type="number" name="max_price" value="{{ request('max_price') }}"
                                        placeholder="Harga Maksimum"
                                        class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
                                </div>
                            </div>

                            {{-- Button Cari --}}
                            <button type="submit"
                                class="w-full py-2.5 bg-pink-600 hover:bg-pink-700 text-white text-sm font-medium rounded-lg transition-colors">
                                Terapkan Filter
                            </button>

                            {{-- Button Reset --}}
                            <a href="{{ route('product') }}"
                                class="block w-full py-2.5 mt-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-lg transition-colors text-center">
                                Reset Filter
                            </a>
                        </form>
                    </div>
                </aside>

                {{-- MAIN CONTENT --}}
                <div>
                    {{-- Page Header --}}
                    <div class="mb-5">
                        <h1 class="text-xl font-bold text-gray-900 mb-0.5">
                            @if (request('search'))
                                Hasil Pencarian: "{{ request('search') }}"
                            @else
                                Produk Wedding - Hasil Filter
                            @endif
                        </h1>
                        <p class="text-xs text-gray-600">
                            Ditemukan {{ $products->count() }} produk
                        </p>
                    </div>

                    {{-- Product Grid - 4 Kolom dengan proporsi pas --}}
                    @if ($products->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
                            @foreach ($products as $product)
                                <article
                                    class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow overflow-hidden group">
                                    <div class="aspect-4/3 overflow-hidden">
                                        @if ($product->images && $product->images->first())
                                            <img src="{{ asset('storage/' . $product->images->first()->image) }}"
                                                alt="{{ $product->name }}"
                                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                        @else
                                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                                <span class="text-gray-400">No Image</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="p-4">
                                        <div class="flex items-center gap-2 mb-2">
                                            <span
                                                class="inline-flex items-center gap-1 text-xs font-medium {{ $product->avg_rating > 0 ? 'text-yellow-600' : 'text-gray-500' }}">
                                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                                    <path
                                                        d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z" />
                                                </svg>
                                                {{ number_format($product->avg_rating ?? 0, 1) }}
                                            </span>
                                            @if ($product->total_review > 0)
                                                <span class="text-xs text-gray-500">({{ $product->total_review }}
                                                    ulasan)</span>
                                            @endif
                                        </div>
                                        <h3 class="font-semibold text-gray-900 text-sm leading-snug mb-1.5 line-clamp-2">
                                            {{ $product->name }}</h3>
                                        <p class="text-xs text-gray-500 mb-3">📍
                                            {{ $product->vendor->address ?? 'Lokasi tidak tersedia' }}</p>
                                        <div class="text-pink-600 font-bold text-base">Rp
                                            {{ number_format($product->price, 0, ',', '.') }}</div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    @else
                        <div class="bg-white rounded-xl p-12 text-center shadow-sm">
                            <svg class="w-20 h-20 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Tidak ada produk ditemukan</h3>
                            <p class="text-sm text-gray-600 mb-4">Coba ubah filter atau kata kunci pencarian Anda</p>
                            <a href="{{ route('product') }}"
                                class="inline-block px-6 py-2.5 bg-pink-600 hover:bg-pink-700 text-white text-sm font-medium rounded-lg transition-colors">
                                Lihat Semua Produk
                            </a>
                        </div>
                    @endif
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
@endsection

</html>
