@extends('vendor.layout')

@section('title', 'Daftar Pesanan')

@section('page-title', 'Daftar Pesanan')

@section('page-subtitle', 'Kelola pesanan yang masuk untuk produk Anda')

@section('content')
    <!-- Filter Tabs -->
    <div class="mb-6 border-b border-gray-200">
        <nav class="-mb-px flex space-x-8">
            <a href="{{ route('vendor.bookings') }}"
                class="border-b-2 {{ !request('status') ? 'border-pink-500 text-pink-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} py-4 px-1 font-medium text-sm">
                Semua Pesanan
            </a>
            <a href="{{ route('vendor.bookings', ['status' => 'proses']) }}"
                class="border-b-2 {{ request('status') == 'proses' ? 'border-pink-500 text-pink-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} py-4 px-1 font-medium text-sm">
                Diproses
            </a>
            <a href="{{ route('vendor.bookings', ['status' => 'berhasil']) }}"
                class="border-b-2 {{ request('status') == 'berhasil' ? 'border-pink-500 text-pink-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} py-4 px-1 font-medium text-sm">
                Selesai
            </a>
        </nav>
    </div>

    <!-- Orders List -->
    @if ($orders->count() > 0)
        <div class="space-y-4">
            @foreach ($orders as $order)
                @php
                    // Calculate vendor's items only
                    $vendorItems = $order->orderitems->filter(function ($item) use ($vendor) {
                        return $item->product->vendor_id == $vendor->id;
                    });
                    $totalVendor = $vendorItems->sum(function ($item) {
                        return $item->quantity * $item->price;
                    });
                @endphp
                <div class="bg-white rounded-xl border border-gray-100 overflow-hidden hover:shadow-md transition-shadow">
                    <!-- Order Header -->
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-200 flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div>
                                <span class="text-xs text-gray-500">Order ID:</span>
                                <span
                                    class="text-sm font-semibold text-gray-900">#{{ $order->order_id ?? $order->id }}</span>
                            </div>
                            <div class="h-4 w-px bg-gray-300"></div>
                            <div>
                                <span class="text-xs text-gray-500">Tanggal:</span>
                                <span class="text-sm text-gray-900">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                            </div>
                            <div class="h-4 w-px bg-gray-300"></div>
                            <div>
                                <span class="text-xs text-gray-500">Pelanggan:</span>
                                <span class="text-sm font-medium text-gray-900">{{ $order->user->name }}</span>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            @if ($order->payment_status == 'paid')
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    Terbayar
                                </span>
                            @else
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Pending
                                </span>
                            @endif

                            @if ($order->oder_status == 'berhasil')
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    Selesai
                                </span>
                            @else
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Diproses
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Order Items (Vendor's products only) -->
                    <div class="px-6 py-4">
                        <div class="space-y-3">
                            @foreach ($vendorItems->take(2) as $item)
                                <div class="flex items-center space-x-4">
                                    @if ($item->product->images->count() > 0)
                                        <img src="{{ Storage::url($item->product->images->first()->image) }}"
                                            alt="{{ $item->product->name }}" class="h-16 w-16 object-cover rounded-lg">
                                    @else
                                        <div class="h-16 w-16 bg-gray-200 rounded-lg flex items-center justify-center">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </div>
                                    @endif
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-sm font-medium text-gray-900 truncate">{{ $item->product->name }}
                                        </h4>
                                        <p class="text-xs text-gray-500">Jumlah: {{ $item->quantity }} x Rp
                                            {{ number_format($item->price, 0, ',', '.') }}</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm font-semibold text-gray-900">Rp
                                            {{ number_format($item->quantity * $item->price, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            @endforeach

                            @if ($vendorItems->count() > 2)
                                <p class="text-sm text-gray-500">+{{ $vendorItems->count() - 2 }} produk lainnya</p>
                            @endif
                        </div>
                    </div>

                    <!-- Order Footer -->
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex items-center justify-between">
                        <div>
                            <span class="text-sm text-gray-600">Total untuk Anda:</span>
                            <span class="ml-2 text-lg font-bold text-pink-600">Rp
                                {{ number_format($totalVendor, 0, ',', '.') }}</span>
                        </div>
                        <a href="{{ route('vendor.bookings.detail', $order->id) }}"
                            class="inline-flex items-center px-4 py-2 border border-pink-500 text-pink-600 hover:bg-pink-50 rounded-lg text-sm font-medium transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $orders->appends(['status' => request('status')])->links() }}
        </div>
    @else
        <div class="bg-white rounded-lg shadow p-12 text-center">
            <svg class="mx-auto h-24 w-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                </path>
            </svg>
            <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada pesanan</h3>
            <p class="mt-2 text-sm text-gray-500">
                @if (request('status'))
                    Tidak ada pesanan dengan status {{ request('status') }}.
                @else
                    Pesanan akan muncul di sini ketika pelanggan membeli produk Anda.
                @endif
            </p>
        </div>
    @endif
@endsection
