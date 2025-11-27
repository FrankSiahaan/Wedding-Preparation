<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Detail Produk - WeddingMart</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @keyframes slideInRight {
            from {
                transform: translateX(400px);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .flash-message {
            animation: slideInRight 0.4s ease-out;
        }

        #mainProductImage {
            transition: opacity 0.3s ease-in-out;
        }

        .thumbnail-btn {
            transition: all 0.2s ease-in-out;
        }

        .thumbnail-btn:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body class="min-h-dvh bg-gray-50 text-gray-900 font-sans">

    {{-- Flash Message --}}
    <div id="flashMessage" class="hidden fixed top-4 right-4 z-[9999]">
        <div
            class="bg-green-100 text-green-800 px-4 py-3 rounded-lg shadow-md flash-message flex items-center gap-2 max-w-sm">
            <svg class="w-5 h-5 text-green-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span class="text-sm font-medium" id="flashMessageText">Barang berhasil ditambahkan ke keranjang!</span>
            <button onclick="hideFlashMessage()" class="text-green-600 hover:text-green-800 ml-2 shrink-0">
            </button>
        </div>
    </div>

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

    {{-- Image Modal --}}
    <div id="imageModal" class="fixed inset-0 z-50 bg-black bg-opacity-75 items-center justify-center p-4"
        style="display: none;" onclick="closeImageModal()">
        <div class="relative max-w-4xl max-h-[90vh]" onclick="event.stopPropagation()">
            <button onclick="closeImageModal()" class="absolute -top-10 right-0 text-white hover:text-gray-300">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <img id="modalImage" src="" alt="Review image" class="max-w-full max-h-[90vh] rounded-lg">
        </div>
    </div>

    {{-- MAIN CONTENT --}}
    <main class="container mx-auto px-4 max-w-6xl py-4">

        {{-- Wrapper dengan spacing konsisten --}}
        <div class="space-y-4">

            {{-- Check for success message --}}
            @if (session('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        showFlashMessage('{{ session('success') }}');
                    });
                </script>
            @endif

            @if (session('error'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        showFlashMessage('{{ session('error') }}');
                    });
                </script>
            @endif

            {{-- Product Detail Section --}}
            <div class="grid lg:grid-cols-2 gap-4">

                {{-- LEFT COLUMN: Product Images Only --}}
                <div class="bg-white rounded-lg border border-gray-100 p-4">
                    {{-- Main Image - Diperkecil --}}
                    <div class="bg-gray-50 rounded-lg overflow-hidden mb-3 max-w-sm mx-auto cursor-pointer"
                        onclick="openImageModal(document.getElementById('mainProductImage').src)">
                        @if ($detail->images && $detail->images->count() > 0)
                            <img id="mainProductImage" src="{{ asset('storage/' . $detail->images->first()->image) }}"
                                alt="{{ $detail->name }}" class="w-full aspect-square object-cover">
                        @else
                            <div class="w-full aspect-square bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-400">No Image</span>
                            </div>
                        @endif
                    </div>

                    {{-- Thumbnail Images --}}
                    <div class="max-w-sm mx-auto">
                        <div class="grid grid-cols-4 gap-2" id="thumbnailContainer">
                            @if ($detail->images && $detail->images->count() > 0)
                                @foreach ($detail->images as $index => $image)
                                    <button onclick="changeMainImage('{{ asset('storage/' . $image->image) }}', this)"
                                        class="thumbnail-btn bg-white rounded-lg overflow-hidden transition-all {{ $index === 0 ? 'border-2 border-pink-500' : 'border border-gray-200 hover:border-pink-300' }}"
                                        data-image-index="{{ $index }}">
                                        <img src="{{ asset('storage/' . $image->image) }}"
                                            alt="Thumbnail {{ $index + 1 }}"
                                            class="w-full aspect-square object-cover">
                                    </button>
                                @endforeach
                            @else
                                @for ($i = 0; $i < 4; $i++)
                                    <div class="bg-white rounded-lg overflow-hidden border border-gray-200">
                                        <div class="w-full aspect-square bg-gray-100 flex items-center justify-center">
                                            <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    </div>
                                @endfor
                            @endif
                        </div>

                        @if ($detail->images && $detail->images->count() > 4)
                            <div class="mt-2 text-center">
                                <button onclick="toggleAllThumbnails()" id="toggleThumbBtn"
                                    class="text-xs text-pink-600 hover:text-pink-700 font-medium flex items-center justify-center gap-1 mx-auto">
                                    <span id="toggleThumbText">Lihat semua foto
                                        ({{ $detail->images->count() }})</span>
                                    <svg id="toggleThumbIcon" class="w-3 h-3 transition-transform" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- RIGHT COLUMN: Product Info --}}
                <div class="flex items-center">
                    {{-- Product Title & Rating --}}
                    <div class="bg-white rounded-lg p-3 mb-3 border border-gray-100 w-full">
                        <h1 class="text-xl font-bold text-gray-900 mb-2">{{ $detail->name }}</h1>

                        <div class="flex items-center gap-2 mb-2">
                            <div class="flex items-center gap-0.5">
                                @php
                                    $avgRating = $detail->reviews->avg('rating') ?? 0;
                                    $totalReviews = $detail->reviews->count();
                                    $totalSold = $detail->orderitems->sum('quantity');
                                @endphp
                                <span
                                    class="text-yellow-500 font-semibold text-xs">{{ number_format($avgRating, 1) }}</span>
                                <div class="flex gap-0.5">
                                    @php
                                        $rating = $avgRating;
                                        $fullStars = floor($rating);
                                        $hasHalfStar = $rating - $fullStars >= 0.5;
                                    @endphp
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $fullStars)
                                            <svg class="w-3 h-3 fill-yellow-500" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z" />
                                            </svg>
                                        @elseif($i == $fullStars + 1 && $hasHalfStar)
                                            <svg class="w-3 h-3 fill-yellow-500" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z" />
                                            </svg>
                                        @else
                                            <svg class="w-3 h-3 fill-gray-300" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z" />
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                                <span class="text-[10px] text-gray-500">({{ $totalReviews }}
                                    ulasan)</span>
                            </div>
                            <div class="border-l border-gray-300 pl-2">
                                <span class="text-[10px] text-gray-600">{{ $totalSold }} Terjual</span>
                            </div>
                        </div>

                        {{-- Price --}}
                        <div class="mb-2.5">
                            <div class="text-lg font-bold text-pink-600">Rp
                                {{ number_format($detail->price, 0, ',', '.') }}</div>
                        </div>

                        {{-- Product Attributes (Dynamic) --}}
                        @if ($detail->attributes && $detail->attributes->count() > 0)
                            @foreach ($detail->attributes as $attribute)
                                <div class="mb-2">
                                    <label class="block text-[10px] font-semibold text-gray-900 mb-1">
                                        Pilih {{ $attribute->name }} <span class="text-red-500">*</span>
                                    </label>
                                    <select name="attribute_{{ $attribute->id }}"
                                        id="attribute_{{ $attribute->id }}"
                                        class="product-attribute w-full px-2.5 py-1.5 border border-gray-300 rounded-lg text-xs focus:outline-none focus:ring-1 focus:ring-pink-500"
                                        data-attribute-name="{{ $attribute->name }}">
                                        <option value="">Pilih {{ strtolower($attribute->name) }}</option>
                                        @foreach ($attribute->values as $value)
                                            <option value="{{ $value->id }}">{{ $value->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endforeach
                            {{-- Error Message Container --}}
                            <div id="attributeError"
                                class="hidden mb-2 text-xs text-red-600 bg-red-50 border border-red-200 rounded-lg px-2 py-1.5">
                            </div>
                        @else
                            {{-- Fallback jika tidak ada attributes --}}
                            <div class="mb-2">
                                <label class="block text-[10px] font-semibold text-gray-900 mb-1">Pilih Ukuran</label>
                                <select
                                    class="w-full px-2.5 py-1.5 border border-gray-300 rounded-lg text-xs focus:outline-none focus:ring-1 focus:ring-pink-500">
                                    <option>Pilih ukuran</option>
                                    <option>S</option>
                                    <option>M</option>
                                    <option>L</option>
                                    <option>XL</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label class="block text-[10px] font-semibold text-gray-900 mb-1">Pilih Warna</label>
                                <select
                                    class="w-full px-2.5 py-1.5 border border-gray-300 rounded-lg text-xs focus:outline-none focus:ring-1 focus:ring-pink-500">
                                    <option>Pilih warna</option>
                                    <option>Putih Gading</option>
                                    <option>Putih Murni</option>
                                    <option>Champagne</option>
                                    <option>Krem</option>
                                </select>
                            </div>
                        @endif

                        {{-- Quantity --}}
                        <div class="mb-2.5">
                            <label class="block text-[10px] font-semibold text-gray-900 mb-1">Jumlah</label>
                            <div class="flex items-center gap-2">
                                <button id="decreaseQty" type="button"
                                    class="w-7 h-7 rounded-lg border border-gray-300 hover:bg-gray-50 flex items-center justify-center transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 12H4" />
                                    </svg>
                                </button>
                                <input type="number" id="quantityInput" value="1" min="1"
                                    max="99"
                                    class="w-14 text-center py-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-pink-500 text-xs">
                                <button id="increaseQty" type="button"
                                    class="w-7 h-7 rounded-lg border border-gray-300 hover:bg-gray-50 flex items-center justify-center transition-colors">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        @auth
                            {{-- Form Add to Cart --}}
                            <form action="{{ route('cart.add') }}" method="POST" id="addToCartForm">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $detail->id }}">
                                <input type="hidden" name="quantity" id="quantity_hidden" value="1">

                                <button type="submit" style="display: none;" id="addToCartSubmit"></button>
                            </form>

                            {{-- Form Buy Now --}}
                            <form action="{{ route('checkout.shipping') }}" method="GET" id="buyNowForm">
                                <input type="hidden" name="buy_now" value="1">
                                <input type="hidden" name="product_id" value="{{ $detail->id }}">
                                <input type="hidden" name="quantity" id="quantity_hidden_buy" value="1">
                            </form>

                            <div class="flex gap-2 mb-2">
                                <button type="button" onclick="buyNow()"
                                    class="flex-1 bg-pink-600 hover:bg-pink-700 text-white font-medium py-2 text-xs rounded-lg transition-colors">
                                    Beli Sekarang
                                </button>
                                <button type="button" onclick="addToCart()" id="addToCartBtn"
                                    class="flex-1 bg-white border-2 border-pink-600 text-pink-600 hover:bg-pink-50 font-medium py-2 text-xs rounded-lg transition-colors flex items-center justify-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <span id="addToCartText">Tambah ke Keranjang</span>
                                </button>
                            </div>
                        @else
                            <div class="flex gap-2 mb-2">
                                <a href="{{ route('login') }}"
                                    class="flex-1 bg-pink-600 hover:bg-pink-700 text-white font-medium py-2 text-xs rounded-lg transition-colors text-center">
                                    Login untuk Membeli
                                </a>
                            </div>
                        @endauth

                        {{-- Stock Information --}}
                        <div class="mb-2">
                            <div class="text-xs text-gray-600">
                                <span class="font-semibold">Stok:</span>
                                <span class="text-gray-900">{{ $detail->stock ?? 'Tersedia' }}</span>
                            </div>
                        </div>

                        {{-- Features Badges --}}
                        <div class="grid grid-cols-3 gap-1.5">
                            <div class="bg-gray-50 rounded-lg p-1.5 text-center border border-gray-200">
                                <div class="w-5 h-5 rounded-full bg-green-50 mx-auto mb-0.5 grid place-items-center">
                                    <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                        <path fill-rule="evenodd"
                                            d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="text-[9px] font-medium text-gray-900 leading-tight">Garansi 30 Hari</div>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-1.5 text-center border border-gray-200">
                                <div class="w-5 h-5 rounded-full bg-blue-50 mx-auto mb-0.5 grid place-items-center">
                                    <svg class="w-3 h-3 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                                        <path
                                            d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z" />
                                    </svg>
                                </div>
                                <div class="text-[9px] font-medium text-gray-900 leading-tight">Free Ongkir</div>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-1.5 text-center border border-gray-200">
                                <div class="w-5 h-5 rounded-full bg-pink-50 mx-auto mb-0.5 grid place-items-center">
                                    <svg class="w-3 h-3 text-pink-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="text-[9px] font-medium text-gray-900 leading-tight">Free Fitting 3x</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Description Section --}}
            <div class="bg-white rounded-lg p-4 mb-3 border border-gray-100">
                <h2 class="text-base font-bold text-gray-900 mb-3">Deskripsi Produk</h2>
                <div class="text-sm text-gray-700 leading-relaxed space-y-2">
                    <p>{{ $detail->description ?? 'Deskripsi produk tidak tersedia.' }}</p>

                    @if ($detail->attributes && $detail->attributes->count() > 0)
                        <div class="mt-3">
                            <h3 class="font-semibold text-gray-900 mb-1.5 text-sm">Spesifikasi Produk:</h3>
                            <ul class="list-disc list-inside space-y-1 text-gray-700 text-sm">
                                @foreach ($detail->attributes as $attribute)
                                    <li>
                                        <strong>{{ $attribute->name }}:</strong>
                                        {{ $attribute->values->pluck('value')->join(', ') }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Vendor Info Section - Full Width --}}
            <div class="bg-white rounded-lg p-4 border border-gray-100">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-12 h-12 rounded-full bg-pink-100 grid place-items-center shrink-0">
                        <svg class="w-6 h-6 text-pink-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold text-gray-900 text-sm">{{ $detail->vendor->name ?? 'Vendor Name' }}
                        </h3>
                        <p class="text-[10px] text-gray-500 mt-0.5">
                            {{ $detail->vendor->address ?? 'Lokasi tidak tersedia' }}
                        </p>
                    </div>
                </div>

                @if ($detail->vendor->description)
                    <div class="mb-3 text-xs text-gray-700 bg-gray-50 p-2 rounded-lg">
                        {{ Str::limit($detail->vendor->description, 100) }}
                    </div>
                @endif

                <div class="grid grid-cols-2 gap-3 mb-3">
                    <div class="text-center py-2 bg-gray-50 rounded-lg border border-gray-100">
                        <div class="text-xs text-gray-600">Produk Terjual</div>
                        @php
                            $totalSoldByVendor = $detail->vendor->products->sum(function ($product) {
                                return $product->orderitems->sum('quantity');
                            });
                        @endphp
                        <div class="text-sm font-semibold text-gray-900">
                            {{ $totalSoldByVendor }}
                        </div>
                    </div>
                    <div class="text-center py-2 bg-gray-50 rounded-lg border border-gray-100">
                        <div class="text-xs text-gray-600">Total Produk</div>
                        <div class="text-sm font-semibold text-gray-900">{{ $detail->vendor->products->count() ?? 0 }}
                        </div>
                    </div>
                </div>

                <div class="flex justify-center">
                    <a href="{{ route('vendor.show', $detail->vendor_id) }}"
                        class="w-full py-2 border border-gray-300 rounded-lg text-xs font-medium hover:bg-gray-50 text-center">
                        Kunjungi Toko
                    </a>
                </div>
            </div>

            {{-- Reviews Section --}}
            <div class="bg-white rounded-lg p-4 border border-gray-100">
                <h2 class="text-base font-bold text-gray-900 mb-3">Ulasan Pembeli
                    ({{ $detail->reviews->count() }})</h2>

                @if ($detail->reviews->count() > 0)
                    {{-- Rating Summary --}}
                    @php
                        $totalReviews = $detail->reviews->count();
                        $avgRating = $detail->avg_rating ?? $detail->reviews->avg('rating');
                        $ratingCounts = [
                            5 => $detail->reviews->where('rating', 5)->count(),
                            4 => $detail->reviews->where('rating', 4)->count(),
                            3 => $detail->reviews->where('rating', 3)->count(),
                            2 => $detail->reviews->where('rating', 2)->count(),
                            1 => $detail->reviews->where('rating', 1)->count(),
                        ];
                    @endphp
                    <div class="flex items-center gap-6 mb-4 pb-4 border-b">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-gray-900 mb-1">{{ number_format($avgRating, 1) }}
                            </div>
                            <div class="flex justify-center mb-0.5">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= floor($avgRating))
                                        <svg class="w-4 h-4 fill-yellow-500" viewBox="0 0 24 24">
                                            <path
                                                d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z" />
                                        </svg>
                                    @else
                                        <svg class="w-4 h-4 fill-gray-300" viewBox="0 0 24 24">
                                            <path
                                                d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z" />
                                        </svg>
                                    @endif
                                @endfor
                            </div>
                            <div class="text-[10px] text-gray-500">{{ $totalReviews }} ulasan</div>
                        </div>

                        <div class="flex-1 space-y-1.5">
                            @foreach ([5, 4, 3, 2, 1] as $star)
                                <div class="flex items-center gap-2">
                                    <div class="flex items-center gap-1 w-10">
                                        <span class="text-[10px]">{{ $star }}</span>
                                        <svg class="w-2.5 h-2.5 fill-yellow-500" viewBox="0 0 24 24">
                                            <path
                                                d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                        @php
                                            $percentage =
                                                $totalReviews > 0 ? ($ratingCounts[$star] / $totalReviews) * 100 : 0;
                                        @endphp
                                        <div class="h-full bg-yellow-500" style="width: {{ $percentage }}%"></div>
                                    </div>
                                    <span
                                        class="text-[10px] text-gray-600 w-6 text-right">{{ $ratingCounts[$star] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Review Items - Grid Card Format --}}
                    <div class="grid gap-3">
                        @foreach ($detail->reviews->take(5) as $review)
                            <div class="bg-gray-50 rounded-lg p-3 border border-gray-200">
                                <div class="flex items-start gap-2 mb-2">
                                    <div class="w-8 h-8 rounded-full bg-pink-100 grid place-items-center shrink-0">
                                        <span class="text-xs font-semibold text-pink-600">
                                            {{ strtoupper(substr($review->user->name ?? 'U', 0, 1)) }}
                                        </span>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2 mb-0.5">
                                            <span class="font-semibold text-xs">{{ $review->user->name }}</span>
                                            <div class="flex">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $review->rating)
                                                        <svg class="w-3 h-3 fill-yellow-500" viewBox="0 0 24 24">
                                                            <path
                                                                d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z" />
                                                        </svg>
                                                    @else
                                                        <svg class="w-3 h-3 fill-gray-300" viewBox="0 0 24 24">
                                                            <path
                                                                d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z" />
                                                        </svg>
                                                    @endif
                                                @endfor
                                            </div>
                                        </div>
                                        <p class="text-[10px] text-gray-500 mb-1.5">
                                            {{ $review->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-700 mb-2">{{ $review->comment }}</p>

                                {{-- Review Images --}}
                                @if (!empty($review->images) && is_array($review->images))
                                    <div class="flex flex-wrap gap-2 mt-2">
                                        @foreach ($review->images as $imagePath)
                                            <div class="relative group w-16 h-16">
                                                <img src="{{ asset('storage/' . $imagePath) }}" alt="Review image"
                                                    class="w-full h-full object-cover rounded-lg border border-gray-200 hover:border-pink-300 cursor-pointer transition-all"
                                                    onclick="openImageModal('{{ asset('storage/' . $imagePath) }}')">
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    @if ($detail->reviews->count() > 5)
                        <div class="mt-3 text-center">
                            <button class="text-xs text-pink-600 hover:text-pink-700 font-medium">
                                Lihat Semua Ulasan ({{ $detail->reviews->count() }})
                            </button>
                        </div>
                    @endif
                @else
                    {{-- No Reviews State --}}
                    <div class="text-center py-8">
                        <svg class="w-16 h-16 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                        <p class="text-sm text-gray-500 mb-1">Belum ada ulasan untuk produk ini</p>
                        <p class="text-xs text-gray-400">Jadilah yang pertama memberikan ulasan</p>
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

    {{-- Add to Cart & Quantity Control JavaScript --}}
    <script>
        // Sync quantity to hidden fields
        function syncQuantity() {
            const quantityInput = document.getElementById('quantityInput');
            const quantityHidden = document.getElementById('quantity_hidden');
            const quantityHiddenBuy = document.getElementById('quantity_hidden_buy');

            if (quantityInput) {
                if (quantityHidden) {
                    quantityHidden.value = quantityInput.value;
                }
                if (quantityHiddenBuy) {
                    quantityHiddenBuy.value = quantityInput.value;
                }
            }
        }

        // Validate product attributes
        function validateAttributes() {
            const attributes = document.querySelectorAll('.product-attribute');
            const errorContainer = document.getElementById('attributeError');
            let isValid = true;
            let errorMessage = '';

            attributes.forEach(function(attribute) {
                if (!attribute.value) {
                    isValid = false;
                    const attributeName = attribute.getAttribute('data-attribute-name');
                    if (errorMessage) {
                        errorMessage += ', ' + attributeName;
                    } else {
                        errorMessage = 'Harap pilih ' + attributeName;
                    }
                    attribute.classList.add('border-red-500');
                } else {
                    attribute.classList.remove('border-red-500');
                }
            });

            if (!isValid && errorContainer) {
                errorContainer.textContent = errorMessage;
                errorContainer.classList.remove('hidden');
                // Auto hide after 3 seconds
                setTimeout(function() {
                    errorContainer.classList.add('hidden');
                }, 3000);
            } else if (errorContainer) {
                errorContainer.classList.add('hidden');
            }

            return isValid;
        }

        // Add to cart function with notification
        function addToCart() {
            // Validate attributes first
            if (!validateAttributes()) {
                return;
            }

            syncQuantity();

            const addToCartBtn = document.getElementById('addToCartBtn');
            const addToCartText = document.getElementById('addToCartText');
            const form = document.getElementById('addToCartForm');

            // Disable button dan ubah text
            if (addToCartBtn) {
                addToCartBtn.disabled = true;
                addToCartBtn.classList.add('opacity-75', 'cursor-not-allowed');
            }

            if (addToCartText) {
                addToCartText.textContent = 'Menambahkan...';
            }

            // Submit form via AJAX
            fetch(form.action, {
                    method: 'POST',
                    body: new FormData(form),
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => {
                    console.log('Response status:', response.status);
                    console.log('Response ok:', response.ok);

                    // Reset button
                    if (addToCartText) {
                        addToCartText.textContent = 'Tambah ke Keranjang';
                    }
                    if (addToCartBtn) {
                        addToCartBtn.disabled = false;
                        addToCartBtn.classList.remove('opacity-75', 'cursor-not-allowed');
                    }

                    // Show flash message regardless of response
                    if (response.ok || response.status === 302) {
                        showFlashMessage('Barang berhasil ditambahkan ke keranjang!');
                    } else {
                        showFlashMessage('Gagal menambahkan produk ke keranjang');
                    }

                    return response;
                })
                .catch(error => {
                    console.error('Error:', error);

                    // Reset button
                    if (addToCartText) {
                        addToCartText.textContent = 'Tambah ke Keranjang';
                    }
                    if (addToCartBtn) {
                        addToCartBtn.disabled = false;
                        addToCartBtn.classList.remove('opacity-75', 'cursor-not-allowed');
                    }

                    showFlashMessage('Terjadi kesalahan saat menambahkan ke keranjang');
                });
        }

        // Buy now function - direct checkout
        function buyNow() {
            // Validate attributes first
            if (!validateAttributes()) {
                return;
            }

            syncQuantity();
            const form = document.getElementById('buyNowForm');
            if (form) {
                form.submit();
            }
        }

        // Remove border error when user selects an option
        document.addEventListener('DOMContentLoaded', function() {
            const attributes = document.querySelectorAll('.product-attribute');
            attributes.forEach(function(attribute) {
                attribute.addEventListener('change', function() {
                    if (this.value) {
                        this.classList.remove('border-red-500');
                        // Check if all attributes are selected
                        const allSelected = Array.from(attributes).every(attr => attr.value);
                        if (allSelected) {
                            const errorContainer = document.getElementById('attributeError');
                            if (errorContainer) {
                                errorContainer.classList.add('hidden');
                            }
                        }
                    }
                });
            });
        });

        // Quantity controls
        (function() {
            const quantityInput = document.getElementById('quantityInput');
            const decreaseBtn = document.getElementById('decreaseQty');
            const increaseBtn = document.getElementById('increaseQty');

            if (!quantityInput || !decreaseBtn || !increaseBtn) return;

            // Sync on input change
            quantityInput.addEventListener('input', syncQuantity);
            quantityInput.addEventListener('change', syncQuantity);

            // Function to update button states
            function updateButtonStates() {
                const currentValue = parseInt(quantityInput.value) || 1;
                const minValue = parseInt(quantityInput.min) || 1;
                const maxValue = parseInt(quantityInput.max) || 99;

                // Disable decrease button if at minimum
                decreaseBtn.disabled = currentValue <= minValue;

                // Disable increase button if at maximum
                increaseBtn.disabled = currentValue >= maxValue;
            }

            // Decrease quantity
            decreaseBtn.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value) || 1;
                const minValue = parseInt(quantityInput.min) || 1;

                if (currentValue > minValue) {
                    quantityInput.value = currentValue - 1;
                    updateButtonStates();
                }
            });

            // Increase quantity
            increaseBtn.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value) || 1;
                const maxValue = parseInt(quantityInput.max) || 99;

                if (currentValue < maxValue) {
                    quantityInput.value = currentValue + 1;
                    updateButtonStates();
                }
            });

            // Handle manual input
            quantityInput.addEventListener('input', function() {
                let value = parseInt(this.value) || 1;
                const minValue = parseInt(this.min) || 1;
                const maxValue = parseInt(this.max) || 99;

                // Validate and constrain value
                if (value < minValue) {
                    this.value = minValue;
                } else if (value > maxValue) {
                    this.value = maxValue;
                }

                updateButtonStates();
            });

            // Handle blur event to ensure valid value
            quantityInput.addEventListener('blur', function() {
                if (!this.value || parseInt(this.value) < 1) {
                    this.value = 1;
                }
                updateButtonStates();
            });

            // Initial state
            updateButtonStates();
        })();

        // Flash Message Functions
        function showFlashMessage(message) {
            console.log('showFlashMessage called with:', message);
            const flashMessage = document.getElementById('flashMessage');
            const flashMessageText = document.getElementById('flashMessageText');

            console.log('flashMessage element:', flashMessage);
            console.log('flashMessageText element:', flashMessageText);

            // Update message
            if (flashMessageText) {
                flashMessageText.textContent = message;
            }

            // Show flash message
            if (flashMessage) {
                flashMessage.classList.remove('hidden');
                console.log('Flash message should now be visible');
            }

            // Auto hide after 4 seconds
            setTimeout(() => {
                hideFlashMessage();
            }, 4000);
        }

        function hideFlashMessage() {
            const flashMessage = document.getElementById('flashMessage');
            flashMessage.classList.add('hidden');
        }

        // Change main product image when thumbnail is clicked
        function changeMainImage(imageSrc, clickedButton) {
            const mainImage = document.getElementById('mainProductImage');

            if (mainImage) {
                // Update main image with fade effect
                mainImage.style.opacity = '0.5';

                setTimeout(() => {
                    mainImage.src = imageSrc;
                    mainImage.style.opacity = '1';
                }, 150);
            }

            // Update active thumbnail border
            const thumbnails = document.querySelectorAll('.thumbnail-btn');
            thumbnails.forEach(btn => {
                btn.classList.remove('border-2', 'border-pink-500');
                btn.classList.add('border', 'border-gray-200');
            });

            if (clickedButton) {
                clickedButton.classList.remove('border', 'border-gray-200');
                clickedButton.classList.add('border-2', 'border-pink-500');
            }
        }

        // Toggle show all thumbnails
        let showingAllThumbnails = false;

        function toggleAllThumbnails() {
            const container = document.getElementById('thumbnailContainer');
            const toggleText = document.getElementById('toggleThumbText');
            const toggleIcon = document.getElementById('toggleThumbIcon');
            const thumbnails = document.querySelectorAll('.thumbnail-btn');

            showingAllThumbnails = !showingAllThumbnails;

            if (showingAllThumbnails) {
                // Show all thumbnails
                thumbnails.forEach((thumb, index) => {
                    thumb.style.display = 'block';
                });
                if (toggleText) toggleText.textContent = 'Sembunyikan foto';
                if (toggleIcon) toggleIcon.style.transform = 'rotate(180deg)';
            } else {
                // Show only first 4 thumbnails
                thumbnails.forEach((thumb, index) => {
                    if (index >= 4) {
                        thumb.style.display = 'none';
                    }
                });
                if (toggleText) toggleText.textContent = 'Lihat semua foto (' + thumbnails.length + ')';
                if (toggleIcon) toggleIcon.style.transform = 'rotate(0deg)';
            }
        }

        // Initialize: hide thumbnails after 4th on page load if more than 4 images
        document.addEventListener('DOMContentLoaded', function() {
            const thumbnails = document.querySelectorAll('.thumbnail-btn');
            if (thumbnails.length > 4) {
                thumbnails.forEach((thumb, index) => {
                    if (index >= 4) {
                        thumb.style.display = 'none';
                    }
                });
            }
        });

        // Image Modal Functions
        function openImageModal(imageSrc) {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');

            if (modal && modalImage) {
                modalImage.src = imageSrc;
                modal.style.display = 'flex';
                document.body.style.overflow = 'hidden';
            }
        }

        function closeImageModal() {
            const modal = document.getElementById('imageModal');

            if (modal) {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        }

        // Close modal with ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeImageModal();
            }
        });
    </script>

</body>

</html>
