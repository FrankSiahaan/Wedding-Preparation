<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Pesanan Saya - WeddingMart</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-dvh bg-gray-50 text-gray-900 font-sans">

    {{-- HEADER --}}
    <header class="bg-white sticky top-0 z-50 border-b border-gray-100">
        <div class="container mx-auto px-4 max-w-7xl">
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
                    <a href="{{ route('user.orders') }}"
                        class="grid place-items-center w-8 h-8 rounded-full border border-gray-200 text-gray-700 hover:bg-gray-50">
                        <svg class="w-4.5 h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.6">
                            <path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </a>
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

    <main class="container mx-auto px-4 max-w-7xl py-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Pesanan Saya</h1>

        @if ($transactions->count() > 0)
            <div class="space-y-4">
                @foreach ($transactions as $transaction)
                    <div class="bg-white rounded-lg border border-gray-100 p-4">
                        {{-- Order Header --}}
                        <div class="flex justify-between items-start mb-4 pb-4 border-b border-gray-100">
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                    <span class="text-sm text-gray-600">Order ID:
                                        <strong>#{{ $transaction->id }}</strong></span>
                                </div>
                                <p class="text-xs text-gray-500">{{ $transaction->created_at->format('d F Y, H:i') }}
                                </p>
                            </div>
                            <div class="text-right">
                                <span
                                    class="inline-block px-3 py-1 rounded-full text-xs font-medium 
                                    @if ($transaction->order_status == 'pending') bg-yellow-100 text-yellow-700
                                    @elseif($transaction->order_status == 'processing') bg-blue-100 text-blue-700
                                    @elseif($transaction->order_status == 'completed') bg-green-100 text-green-700
                                    @else bg-red-100 text-red-700 @endif">
                                    {{ ucfirst($transaction->order_status) }}
                                </span>
                            </div>
                        </div>

                        {{-- Order Items --}}
                        <div class="space-y-3 mb-4">
                            @foreach ($transaction->orderitems->take(2) as $item)
                                <div class="flex items-center gap-3">
                                    @if ($item->product->images && $item->product->images->count() > 0)
                                        <img src="{{ asset('storage/' . $item->product->images->first()->image) }}"
                                            alt="{{ $item->product->name }}" class="w-16 h-16 object-cover rounded-lg">
                                    @else
                                        <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center">
                                            <span class="text-xs text-gray-400">No Image</span>
                                        </div>
                                    @endif
                                    <div class="flex-1">
                                        <h3 class="text-sm font-semibold text-gray-900">{{ $item->product->name }}
                                        </h3>
                                        <p class="text-xs text-gray-500">{{ $item->quantity }}x Rp
                                            {{ number_format($item->price, 0, ',', '.') }}</p>
                                    </div>
                                    <div class="text-sm font-semibold text-gray-900">
                                        Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                    </div>
                                </div>
                            @endforeach

                            @if ($transaction->orderitems->count() > 2)
                                <p class="text-xs text-gray-500 text-center">
                                    +{{ $transaction->orderitems->count() - 2 }} produk lainnya
                                </p>
                            @endif
                        </div>

                        {{-- Order Footer --}}
                        <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                            <div>
                                <span class="text-xs text-gray-600">Total Belanja:</span>
                                <span class="ml-2 text-lg font-bold text-pink-600">
                                    Rp {{ number_format($transaction->total, 0, ',', '.') }}
                                </span>
                            </div>
                            <a href="{{ route('user.order.detail', $transaction->id) }}"
                                class="px-4 py-2 border border-pink-600 text-pink-600 hover:bg-pink-50 rounded-lg text-sm font-medium transition-colors">
                                Lihat Detail
                            </a>
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
        <div class="container mx-auto px-4 max-w-7xl py-3 text-center text-xs text-gray-500">
            &copy; {{ now()->year }} WeddingMart • Marketplace Persiapan Pernikahan Terpercaya
        </div>
    </footer>

</body>

</html>
