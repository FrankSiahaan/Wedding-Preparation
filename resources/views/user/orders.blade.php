<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Pesanan Saya - WeddingMart</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="min-h-dvh bg-gray-50 text-gray-900 font-sans" x-data="{ filter: 'all' }">

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

    <main class="container mx-auto px-4 max-w-6xl py-6">
        {{-- Back Button --}}
        <a href="{{ route('home') }}"
            class="inline-flex items-center text-pink-600 hover:text-pink-700 text-sm font-medium mb-6">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali
        </a>

        <h1 class="text-2xl font-bold text-gray-900 mb-4">Pesanan Saya</h1>
        <p class="text-sm text-gray-600 mb-6">Kelola dan lacak semua pesanan Anda</p>

        {{-- Filter Tabs --}}
        <div class="bg-white rounded-lg border border-gray-200 mb-6">
            <div class="flex border-b border-gray-200">
                <button @click="filter = 'all'"
                    :class="filter === 'all' ? 'text-pink-600 border-b-2 border-pink-600 bg-pink-50' :
                        'text-gray-600 hover:bg-gray-50'"
                    class="flex-1 px-4 py-3 text-sm font-medium transition-colors">
                    Semua
                </button>
                <button @click="filter = 'proses'"
                    :class="filter === 'proses' ? 'text-pink-600 border-b-2 border-pink-600 bg-pink-50' :
                        'text-gray-600 hover:bg-gray-50'"
                    class="flex-1 px-4 py-3 text-sm font-medium transition-colors">
                    Diproses
                </button>
                <button @click="filter = 'berhasil'"
                    :class="filter === 'berhasil' ? 'text-pink-600 border-b-2 border-pink-600 bg-pink-50' :
                        'text-gray-600 hover:bg-gray-50'"
                    class="flex-1 px-4 py-3 text-sm font-medium transition-colors">
                    Selesai
                </button>
            </div>
        </div>

        @if ($transactions->count() > 0)
            <div class="space-y-4">
                @foreach ($transactions as $transaction)
                    <div x-show="filter === 'all' || filter === '{{ $transaction->oder_status }}'"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                        {{-- Order Header --}}
                        <div class="px-4 py-3 bg-gray-50 border-b border-gray-200">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-xs text-gray-600">ID Pesanan</p>
                                    <p class="text-sm font-semibold text-gray-900">
                                        {{ $transaction->order_id ?? 'WM-' . str_pad($transaction->id, 4, '0', STR_PAD_LEFT) }}
                                    </p>
                                </div>
                                <div class="text-right">
                                    <p class="text-xs text-gray-600">Tanggal Pemesanan</p>
                                    <p class="text-sm text-gray-900">
                                        {{ $transaction->created_at->format('d M Y, H:i') }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- Order Items --}}
                        <div class="p-4">
                            @foreach ($transaction->orderitems as $item)
                                <div class="flex gap-3 mb-4 last:mb-0">
                                    @if ($item->product->images && $item->product->images->count() > 0)
                                        <img src="{{ asset('storage/' . $item->product->images->first()->image) }}"
                                            alt="{{ $item->product->name }}"
                                            class="w-16 h-16 object-cover rounded-lg flex-shrink-0">
                                    @else
                                        <div
                                            class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    @endif
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-sm font-medium text-gray-900 mb-1">{{ $item->product->name }}
                                        </h3>
                                        <p class="text-xs text-gray-500 mb-1">
                                            @if ($item->product->vendor)
                                                Penjual: {{ $item->product->vendor->name }}
                                            @endif
                                        </p>
                                        <p class="text-xs text-gray-600">Jumlah: {{ $item->quantity }}</p>
                                    </div>
                                    <div class="text-right flex-shrink-0">
                                        <p class="text-sm font-semibold text-pink-600">Rp
                                            {{ number_format($item->price, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Order Footer --}}
                        <div class="px-4 py-3 bg-gray-50 border-t border-gray-200">
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-sm text-gray-600">Total Pesanan</span>
                                <span class="text-lg font-bold text-gray-900">Rp
                                    {{ number_format($transaction->total, 0, ',', '.') }}</span>
                            </div>

                            <div class="flex flex-col gap-2">
                                {{-- Status Badge --}}
                                <div class="flex items-center gap-2 text-sm">
                                    @if ($transaction->oder_status == 'berhasil')
                                        <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-green-600 font-medium">Pesanan Selesai</span>
                                    @else
                                        <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-blue-600 font-medium">Sedang Diproses</span>
                                    @endif
                                </div>

                                {{-- Action Buttons --}}
                                <div class="flex flex-wrap gap-2">
                                    @if ($transaction->oder_status == 'proses')
                                        {{-- Tandai Selesai Button --}}
                                        <form action="{{ route('user.order.complete', $transaction->id) }}"
                                            method="POST" class="flex-1 min-w-[140px]"
                                            onsubmit="return confirm('Apakah Anda yakin pesanan sudah diterima?')">
                                            @csrf
                                            <button type="submit"
                                                class="w-full px-4 py-2 border border-green-500 text-green-600 hover:bg-green-50 rounded-lg text-sm font-medium transition-colors flex items-center justify-center gap-2">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Tandai Selesai
                                            </button>
                                        </form>
                                    @endif

                                    {{-- Beli Ulang Button --}}
                                    @if ($transaction->orderitems->count() > 0)
                                        @php
                                            $firstItem = $transaction->orderitems->first();
                                            $checkoutUrl =
                                                route('checkout.shipping') .
                                                '?buy_now=1&product_id=' .
                                                $firstItem->product_id .
                                                '&quantity=' .
                                                $firstItem->quantity;
                                        @endphp
                                        <button onclick="window.location.href='{{ $checkoutUrl }}'"
                                            class="flex-1 min-w-[120px] px-4 py-2 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg text-sm font-medium transition-colors">
                                            Beli Ulang
                                        </button>
                                    @endif

                                    {{-- Beri Ulasan Button --}}
                                    <button type="button"
                                        onclick="window.location.href='{{ route('user.review.create', $transaction->id) }}'"
                                        class="flex-1 min-w-[130px] px-4 py-2 border-2 border-yellow-500 text-yellow-600 hover:bg-yellow-50 rounded-lg text-sm font-semibold transition-colors flex items-center justify-center gap-2">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        Beri Ulasan
                                    </button>

                                    {{-- Detail Pesanan Button --}}
                                    <button
                                        onclick="window.location.href='{{ route('user.order.detail', $transaction->id) }}'"
                                        class="flex-1 min-w-[140px] px-4 py-2 bg-pink-600 hover:bg-pink-700 text-white text-sm font-medium rounded-lg transition-colors">
                                        Detail Pesanan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            {{-- Empty State --}}
            <div class="bg-white rounded-lg border border-gray-100 p-12 text-center">
                <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Pesanan</h3>
                <p class="text-gray-500 mb-6">Anda belum memiliki pesanan apapun</p>
                <a href="{{ route('product') }}"
                    class="inline-block px-6 py-3 bg-pink-600 hover:bg-pink-700 rounded-lg text-white font-semibold transition-colors">
                    Mulai Belanja
                </a>
            </div>
        @endif
    </main>

    <footer class="bg-white border-t mt-12">
        <div class="container mx-auto px-4 max-w-6xl py-3 text-center text-xs text-gray-500">
            &copy; {{ now()->year }} WeddingMart • Marketplace Persiapan Pernikahan Terpercaya
        </div>
    </footer>
