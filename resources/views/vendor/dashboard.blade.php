<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dashboard Vendor - WeddingMart</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-dvh bg-gray-50 text-gray-900 font-sans">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg border-r border-gray-100 fixed left-0 top-0 h-screen flex flex-col">

            <!-- Logo -->
            <div class="p-6 border-b border-gray-100 flex-shrink-0">
                <div class="flex items-center gap-2.5">
                    <div class="w-10 h-10 rounded-full grid place-items-center bg-pink-50 ring-1 ring-pink-100">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="#EC4899" stroke-width="1.5">
                            <path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <span class="text-lg font-bold text-gray-800">Vendor Panel</span>
                </div>
            </div>

            <!-- Navigation Menu -->
            <nav class="p-4 flex-1 overflow-y-auto">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('vendor.dashboard') }}"
                            class="flex items-center gap-3 px-4 py-3 bg-pink-50 text-pink-700 rounded-lg font-medium">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('vendor.products') }}"
                            class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                            <span>Produk Saya</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('vendor.profile') }}"
                            class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span>Profil Usaha</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('vendor.bookings') }}"
                            class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            <span>Booking Request</span>
                        </a>
                    </li>
                    <li class="pt-2 border-t border-gray-100">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center gap-3 px-4 py-3 text-red-500 hover:bg-red-50 rounded-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <span>Keluar</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>

            <!-- User Profile at Bottom -->
            <div class="p-4 border-t border-gray-100 bg-pink-50 flex-shrink-0">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-pink-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-pink-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="8.4" r="3.1" />
                            <path d="M4 20a8 8 0 0 1 16 0" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-900 font-medium text-sm truncate">{{ auth()->user()->name }}</p>
                        <p class="text-gray-600 text-xs">{{ $vendor->name }}</p>
                    </div>
                </div>
            </div>

        </aside>

        <!-- Main Content -->
        <main class="flex-1 bg-gray-50 ml-64">

            <!-- Header -->
            <header class="bg-white border-b border-gray-100">
                <div class="flex items-center justify-between px-8 py-5">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Selamat Datang, {{ $vendor->name }}!</h1>
                        <p class="text-sm text-gray-500 mt-0.5">Kelola produk dan pesanan Anda di sini</p>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="p-8">
                {{-- Stats Cards --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
                    {{-- Total Produk --}}
                    <div class="bg-white rounded-xl border border-gray-100 p-6">
                        <div class="flex items-center justify-between mb-3">
                            <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                        </div>
                        <div class="text-3xl font-bold text-gray-900 mb-1">{{ $totalProducts }}</div>
                        <div class="text-sm text-gray-600">Total Produk</div>
                        <div class="text-xs text-green-600 mt-2">{{ $activeProducts }} Aktif</div>
                    </div>

                    {{-- Total Terjual --}}
                    <div class="bg-white rounded-xl border border-gray-100 p-6">
                        <div class="flex items-center justify-between mb-3">
                            <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                            </div>
                        </div>
                        <div class="text-3xl font-bold text-gray-900 mb-1">{{ number_format($totalSold) }}</div>
                        <div class="text-sm text-gray-600">Produk Terjual</div>
                    </div>

                    {{-- Total Pendapatan --}}
                    <div class="bg-white rounded-xl border border-gray-100 p-6">
                        <div class="flex items-center justify-between mb-3">
                            <div class="w-12 h-12 rounded-xl bg-pink-50 flex items-center justify-center">
                                <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="text-2xl font-bold text-gray-900 mb-1">Rp
                            {{ number_format($totalRevenue, 0, ',', '.') }}</div>
                        <div class="text-sm text-gray-600">Total Pendapatan</div>
                    </div>

                    {{-- Rating --}}
                    <div class="bg-white rounded-xl border border-gray-100 p-6">
                        <div class="flex items-center justify-between mb-3">
                            <div class="w-12 h-12 rounded-xl bg-purple-50 flex items-center justify-center">
                                <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z" />
                                </svg>
                            </div>
                        </div>
                        <div class="text-3xl font-bold text-gray-900 mb-1">{{ number_format($avgRating, 1) }}</div>
                        <div class="text-sm text-gray-600">Rating Rata-rata</div>
                        <div class="text-xs text-gray-500 mt-2">{{ $totalReviews }} Ulasan</div>
                    </div>
                </div>

                {{-- Content Grid --}}
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                    {{-- Recent Products --}}
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-xl border border-gray-100">
                            <div class="p-5 border-b border-gray-100">
                                <h2 class="text-lg font-bold text-gray-900">Produk Terbaru</h2>
                            </div>
                            <div class="p-5">
                                @if ($recentProducts->count() > 0)
                                    <div class="space-y-4">
                                        @foreach ($recentProducts as $product)
                                            <div
                                                class="flex items-center gap-4 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                                {{-- Product Image --}}
                                                <div class="w-16 h-16 rounded-lg overflow-hidden bg-gray-100 shrink-0">
                                                    @if ($product->images && $product->images->count() > 0)
                                                        <img src="{{ asset('storage/' . $product->images->first()->image) }}"
                                                            alt="{{ $product->name }}"
                                                            class="w-full h-full object-cover">
                                                    @else
                                                        <div class="w-full h-full flex items-center justify-center">
                                                            <svg class="w-8 h-8 text-gray-400" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                            </svg>
                                                        </div>
                                                    @endif
                                                </div>

                                                {{-- Product Info --}}
                                                <div class="flex-1 min-w-0">
                                                    <h3 class="font-semibold text-gray-900 text-sm truncate">
                                                        {{ $product->name }}</h3>
                                                    <p class="text-sm text-gray-600 mt-0.5">Rp
                                                        {{ number_format($product->price, 0, ',', '.') }}</p>
                                                    <div class="flex items-center gap-3 mt-1">
                                                        <span class="text-xs text-gray-500">
                                                            {{ $product->orderitems->sum('quantity') }} Terjual
                                                        </span>
                                                        @if ($product->reviews->count() > 0)
                                                            <span
                                                                class="text-xs text-pink-600 flex items-center gap-1">
                                                                <svg class="w-3 h-3" fill="currentColor"
                                                                    viewBox="0 0 24 24">
                                                                    <path
                                                                        d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z" />
                                                                </svg>
                                                                {{ number_format($product->reviews->avg('rating'), 1) }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                {{-- Status Badge --}}
                                                <div>
                                                    @if ($product->is_active)
                                                        <span
                                                            class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">Aktif</span>
                                                    @else
                                                        <span
                                                            class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">Nonaktif</span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-center py-8">
                                        <svg class="w-16 h-16 mx-auto text-gray-300 mb-3" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                        </svg>
                                        <p class="text-gray-500 text-sm">Belum ada produk</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Recent Orders --}}
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-xl border border-gray-100">
                            <div class="p-5 border-b border-gray-100">
                                <h2 class="text-lg font-bold text-gray-900">Pesanan Terbaru</h2>
                            </div>
                            <div class="p-5">
                                @if ($recentOrders->count() > 0)
                                    <div class="space-y-4">
                                        @foreach ($recentOrders as $order)
                                            <div class="p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                                <div class="flex items-start justify-between mb-2">
                                                    <div class="flex-1 min-w-0">
                                                        <h4 class="font-semibold text-sm text-gray-900 truncate">
                                                            {{ $order->product->name }}
                                                        </h4>
                                                        <p class="text-xs text-gray-500 mt-0.5">
                                                            {{ $order->transaction->user->name }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="flex items-center justify-between mt-2">
                                                    <span class="text-xs text-gray-600">{{ $order->quantity }}x</span>
                                                    <span class="text-sm font-semibold text-gray-900">
                                                        Rp
                                                        {{ number_format($order->price * $order->quantity, 0, ',', '.') }}
                                                    </span>
                                                </div>
                                                <div class="mt-2 text-xs text-gray-400">
                                                    {{ $order->created_at->diffForHumans() }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-center py-8">
                                        <svg class="w-16 h-16 mx-auto text-gray-300 mb-3" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                        <p class="text-gray-500 text-sm">Belum ada pesanan</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </main>

    </div>

</body>

</html>
