@extends('vendor.layout')

@section('title', 'Detail Pesanan')

@section('page-title', 'Detail Pesanan')

@section('page-subtitle', 'Informasi lengkap tentang pesanan')

@section('content')
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('vendor.bookings') }}" class="inline-flex items-center text-sm text-gray-600 hover:text-pink-600">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali ke Daftar Pesanan
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Order Details -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Order Info Card -->
            <div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900">Informasi Pesanan</h2>
                </div>
                <div class="px-6 py-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Order ID</p>
                            <p class="text-base font-semibold text-gray-900">
                                #{{ $transaction->order_id ?? $transaction->id }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Tanggal Pesanan</p>
                            <p class="text-base font-medium text-gray-900">
                                {{ $transaction->created_at->format('d M Y, H:i') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Status Pembayaran</p>
                            <div class="mt-1">
                                @if ($transaction->payment_status == 'paid')
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        Terbayar
                                    </span>
                                @else
                                    <span
                                        class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Pending
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Status Pesanan</p>
                            <div class="mt-1">
                                @if ($transaction->oder_status == 'berhasil')
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
                    </div>
                </div>
            </div>

            <!-- Products Card -->
            <div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900">Produk Pesanan</h2>
                </div>
                <div class="divide-y divide-gray-200">
                    @foreach ($transaction->orderitems as $item)
                        <div class="px-6 py-4">
                            <div class="flex items-start space-x-4">
                                @if ($item->product->images->count() > 0)
                                    <img src="{{ Storage::url($item->product->images->first()->image) }}"
                                        alt="{{ $item->product->name }}"
                                        class="h-20 w-20 object-cover rounded-lg flex-shrink-0">
                                @else
                                    <div
                                        class="h-20 w-20 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-base font-medium text-gray-900">{{ $item->product->name }}</h3>

                                    @if ($item->variant)
                                        <div class="mt-2 flex flex-wrap gap-2">
                                            @foreach ($item->variant->attributeValues as $attributeValue)
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-pink-100 text-pink-800">
                                                    {{ $attributeValue->attribute->name }}: {{ $attributeValue->value }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @endif

                                    <div class="mt-2 flex items-center space-x-4 text-sm text-gray-500">
                                        <span>Harga: Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                                        <span>×</span>
                                        <span>Jumlah: {{ $item->quantity }}</span>
                                    </div>
                                </div>
                                <div class="text-right flex-shrink-0">
                                    <p class="text-lg font-semibold text-gray-900">
                                        Rp {{ number_format($item->quantity * $item->price, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Total -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                    <div class="flex justify-between items-center">
                        <span class="text-base font-semibold text-gray-900">Total untuk Anda</span>
                        <span class="text-xl font-bold text-pink-600">
                            Rp
                            {{ number_format(
                                $transaction->orderitems->sum(function ($item) {
                                    return $item->quantity * $item->price;
                                }),
                                0,
                                ',',
                                '.',
                            ) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Customer & Shipping Info -->
        <div class="space-y-6">
            <!-- Customer Info -->
            <div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900">Informasi Pelanggan</h2>
                </div>
                <div class="px-6 py-4 space-y-3">
                    <div>
                        <p class="text-sm text-gray-500">Nama</p>
                        <p class="text-base font-medium text-gray-900">{{ $transaction->user->name }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Email</p>
                        <p class="text-base text-gray-900">{{ $transaction->user->email }}</p>
                    </div>
                    @if ($transaction->user->phone)
                        <div>
                            <p class="text-sm text-gray-500">Telepon</p>
                            <p class="text-base text-gray-900">{{ $transaction->user->phone }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Shipping Address -->
            @if ($transaction->address)
                <div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900">Alamat Pengiriman</h2>
                    </div>
                    <div class="px-6 py-4">
                        <div class="space-y-2">
                            <p class="text-base font-medium text-gray-900">{{ $transaction->address->recipient_name }}</p>
                            <p class="text-sm text-gray-600">{{ $transaction->address->phone }}</p>
                            <p class="text-sm text-gray-600 leading-relaxed">
                                {{ $transaction->address->address }}<br>
                                {{ $transaction->address->city }}, {{ $transaction->address->province }}<br>
                                {{ $transaction->address->postal_code }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
