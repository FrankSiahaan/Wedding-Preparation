<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - WeddingMart</title>
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
    <div class="max-w-7xl mx-auto px-6 py-8">

        <!-- Page Title -->
        <h1 class="text-2xl font-bold text-gray-900 mb-8">Keranjang Belanja</h1>

        <div class="grid grid-cols-3 gap-6">

            <!-- Left Section - Products -->
            <div class="col-span-2 space-y-4">

                <!-- Products Section -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Produk yang Dipilih</h2>

                    <!-- Product Item -->
                    <div class="flex items-start space-x-4 pb-6">
                        <!-- Product Image -->
                        <img src="https://images.unsplash.com/photo-1594552072238-4df8b0b51f90?w=200"
                            alt="Gaun Pengantin" class="w-24 h-32 object-cover rounded-lg">

                        <!-- Product Details -->
                        <div class="flex-1">
                            <h3 class="text-base font-semibold text-gray-900 mb-1">Gaun Pengantin Mewah Collection
                                Premium</h3>
                            <p class="text-red-500 font-bold text-lg mb-3">Rp 15.000.000</p>

                            <!-- Quantity Controls -->
                            <div class="flex items-center space-x-3">
                                <button
                                    class="w-8 h-8 border border-gray-300 rounded flex items-center justify-center hover:bg-gray-50">
                                    <i class="fas fa-minus text-gray-600 text-xs"></i>
                                </button>
                                <input type="number" value="1"
                                    class="w-12 text-center border border-gray-300 rounded py-1 text-sm">
                                <button
                                    class="w-8 h-8 border border-gray-300 rounded flex items-center justify-center hover:bg-gray-50">
                                    <i class="fas fa-plus text-gray-600 text-xs"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Delete Button -->
                        <button class="text-gray-400 hover:text-red-500">
                            <i class="fas fa-trash text-lg"></i>
                        </button>
                    </div>

                </div>

                <!-- Recommended Products Section -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-2">Produk Rekomendasi</h2>
                    <p class="text-sm text-gray-500 mb-6">Produk terpopuler dari vendor terpercaya</p>

                    <!-- Product Grid -->
                    <div class="grid grid-cols-4 gap-4">

                        <!-- Product Card 1 -->
                        <div
                            class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition">
                            <img src="https://images.unsplash.com/photo-1594552072238-4df8b0b51f90?w=300" alt="Product"
                                class="w-full h-40 object-cover">
                            <div class="p-3">
                                <div class="flex items-center text-yellow-400 text-xs mb-1">
                                    <i class="fas fa-star"></i>
                                    <span class="text-gray-700 ml-1">4.8 (97 ulasan)</span>
                                </div>
                                <h3 class="text-sm font-semibold text-gray-900 mb-1 line-clamp-2">Gaun Pengantin Mewah
                                    Collection</h3>
                                <p class="text-xs text-gray-500 mb-2">Atelier Bride</p>
                                <p class="text-red-500 font-bold text-sm">Rp 15.000.000</p>
                            </div>
                        </div>

                        <!-- Product Card 2 -->
                        <div
                            class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition">
                            <img src="https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?w=300"
                                alt="Product" class="w-full h-40 object-cover">
                            <div class="p-3">
                                <div class="flex items-center text-yellow-400 text-xs mb-1">
                                    <i class="fas fa-star"></i>
                                    <span class="text-gray-700 ml-1">4.9 (117 ulasan)</span>
                                </div>
                                <h3 class="text-sm font-semibold text-gray-900 mb-1 line-clamp-2">Cincin Kawin Emas 18K
                                </h3>
                                <p class="text-xs text-gray-500 mb-2">Golden Ring Studio</p>
                                <p class="text-red-500 font-bold text-sm">Rp 8.500.000</p>
                            </div>
                        </div>

                        <!-- Product Card 3 -->
                        <div
                            class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition">
                            <img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=300"
                                alt="Product" class="w-full h-40 object-cover">
                            <div class="p-3">
                                <div class="flex items-center text-yellow-400 text-xs mb-1">
                                    <i class="fas fa-star"></i>
                                    <span class="text-gray-700 ml-1">4.7 (112 ulasan)</span>
                                </div>
                                <h3 class="text-sm font-semibold text-gray-900 mb-1 line-clamp-2">Paket Dekorasi
                                    Pelaminan Premium</h3>
                                <p class="text-xs text-gray-500 mb-2">Floral Dreams</p>
                                <p class="text-red-500 font-bold text-sm">Rp 25.000.000</p>
                            </div>
                        </div>

                        <!-- Product Card 4 -->
                        <div
                            class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition">
                            <img src="https://images.unsplash.com/photo-1606800052052-a08af7148866?w=300"
                                alt="Product" class="w-full h-40 object-cover">
                            <div class="p-3">
                                <div class="flex items-center text-yellow-400 text-xs mb-1">
                                    <i class="fas fa-star"></i>
                                    <span class="text-gray-700 ml-1">4.9 (104 ulasan)</span>
                                </div>
                                <h3 class="text-sm font-semibold text-gray-900 mb-1 line-clamp-2">Paket Fotografi
                                    Wedding Premium</h3>
                                <p class="text-xs text-gray-500 mb-2">Capture Moments</p>
                                <p class="text-red-500 font-bold text-sm">Rp 12.000.000</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Right Section - Order Summary -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 sticky top-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Ringkasan Pesanan</h2>

                    <!-- Subtotal -->
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-sm text-gray-600">Subtotal (1 item)</span>
                        <span class="text-sm font-semibold text-gray-900">Rp 15.000.000</span>
                    </div>

                    <div class="border-t border-gray-200 my-4"></div>

                    <!-- Total -->
                    <div class="flex justify-between items-center mb-6">
                        <span class="text-base font-semibold text-gray-900">TOTAL</span>
                        <span class="text-lg font-bold text-gray-900">Rp 15.000.000</span>
                    </div>

                    <!-- Checkout Button -->
                    <button
                        class="w-full py-3 bg-gradient-to-r from-pink-400 to-pink-500 hover:from-pink-500 hover:to-pink-600 rounded-lg text-white font-semibold shadow-md transition">
                        Checkout (Rp 15.000.000)
                    </button>
                </div>
            </div>

        </div>

    </div>

</body>

</html>
