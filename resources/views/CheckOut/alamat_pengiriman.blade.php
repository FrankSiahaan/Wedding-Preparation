<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Alamat Pengiriman - WeddingMart</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">

    {{-- HEADER --}}
    <header class="bg-white sticky top-0 z-50 border-b border-gray-100">
        <div class="container mx-auto px-4 max-w-6xl">
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

    {{-- Back Button --}}
    <div class="bg-white border-b border-gray-100 py-3">
        <div class="container mx-auto px-4 max-w-6xl">
            <a href="{{ route('cart.index') }}"
                class="inline-flex items-center text-pink-600 hover:text-pink-700 text-sm font-medium">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Keranjang
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-6 py-8">

        {{-- Flash Messages --}}
        @if (session('error'))
            <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-red-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <p class="text-sm font-semibold text-red-800">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if (session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 rounded-lg p-4">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-green-600 shrink-0" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <div>
                        <p class="text-sm font-semibold text-green-800">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Page Title - Center -->
        <div class="text-center mb-10">
            <h1 class="text-2xl font-bold text-gray-900 mb-2">Checkout</h1>
            <p class="text-sm text-gray-600">Selesaikan pesanan Anda</p>
        </div>

        <!-- Progress Steps -->
        <div class="mb-10">
            <div class="flex items-center justify-center gap-3">

                <!-- Step 1 - Active -->
                <div class="flex items-center bg-pink-100 rounded-full px-5 py-2.5 gap-2.5">
                    <div
                        class="w-9 h-9 bg-red-500 rounded-full flex items-center justify-center text-white flex-shrink-0">
                        <i class="fas fa-map-marker-alt text-xs"></i>
                    </div>
                    <span class="text-sm font-semibold text-red-600 whitespace-nowrap">Alamat Pengiriman</span>
                </div>

                <!-- Line -->
                <div class="w-12 h-0.5 bg-gray-300"></div>

                <!-- Step 2 - Inactive -->
                <div class="flex items-center bg-gray-100 rounded-full px-5 py-2.5 gap-2.5">
                    <div
                        class="w-9 h-9 bg-gray-400 rounded-full flex items-center justify-center text-white flex-shrink-0">
                        <i class="fas fa-box text-xs"></i>
                    </div>
                    <span class="text-sm font-semibold text-gray-500 whitespace-nowrap">Konfirmasi Pesanan</span>
                </div>

            </div>
        </div>

        <div class="grid grid-cols-3 gap-6">

            <!-- Left Section - Address Form -->
            <div class="col-span-2">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">

                    <div class="flex items-center mb-5">
                        <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>
                        <h2 class="text-base font-bold text-gray-900">Alamat Pengiriman</h2>
                    </div>

                    {{-- Daftar Alamat yang Tersimpan --}}
                    @if ($addresses && $addresses->count() > 0)
                        <div class="mb-6">
                            <h3 class="text-sm font-semibold text-gray-900 mb-3">Pilih Alamat Tersimpan</h3>
                            <form action="{{ route('checkout.confirmation') }}" method="POST">
                                @csrf
                                <div class="space-y-3">
                                    @foreach ($addresses as $address)
                                        <label class="block">
                                            <input type="radio" name="address_id" value="{{ $address->id }}"
                                                class="peer sr-only" required>
                                            <div
                                                class="border-2 border-gray-200 rounded-lg p-4 cursor-pointer peer-checked:border-pink-500 peer-checked:bg-pink-50 hover:border-pink-300 transition">
                                                <div class="flex justify-between items-start">
                                                    <div class="flex-1">
                                                        <p class="font-semibold text-gray-900 mb-1">
                                                            {{ $address->recipient_name }}</p>
                                                        <p class="text-sm text-gray-600 mb-1">{{ $address->phone }}</p>
                                                        <p class="text-sm text-gray-600">{{ $address->address }},
                                                            {{ $address->city }}, {{ $address->province }}
                                                            {{ $address->postal_code }}</p>
                                                    </div>
                                                    <svg class="w-5 h-5 text-pink-600 hidden peer-checked:block"
                                                        fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>

                                <button type="submit"
                                    class="w-full mt-6 px-6 py-3 bg-pink-600 hover:bg-pink-700 rounded-lg text-white font-semibold shadow-md transition">
                                    Lanjut ke Konfirmasi
                                </button>
                            </form>
                        </div>

                        <div class="relative my-6">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-4 bg-white text-gray-500">atau tambah alamat baru</span>
                            </div>
                        </div>
                    @endif

                    {{-- Error Messages --}}
                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-red-600 shrink-0 mt-0.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div class="flex-1">
                                    <h3 class="text-sm font-semibold text-red-800 mb-1">Terjadi Kesalahan</h3>
                                    <ul class="list-disc list-inside text-sm text-red-700 space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('checkout.confirmation') }}" method="POST">
                        @csrf

                        <input type="hidden" name="use_new_address" value="1">

                        <!-- Nama Lengkap & Nomor Telepon -->
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap *</label>
                                <input type="text" name="recipient_name"
                                    value="{{ old('recipient_name', auth()->user()->name) }}"
                                    placeholder="Nama Lengkap"
                                    class="w-full px-4 py-2.5 bg-pink-50 border-0 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 text-sm @error('recipient_name') ring-2 ring-red-500 @enderror"
                                    required>
                                @error('recipient_name')
                                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon *</label>
                                <input type="tel" name="phone" value="{{ old('phone') }}"
                                    placeholder="08xxxxxxxxxx"
                                    class="w-full px-4 py-2.5 bg-pink-50 border-0 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 text-sm @error('phone') ring-2 ring-red-500 @enderror"
                                    required>
                                @error('phone')
                                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Kota, Provinsi, Kode Pos -->
                        <div class="grid grid-cols-3 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kota *</label>
                                <input type="text" name="city" value="{{ old('city') }}"
                                    placeholder="Nama Kota"
                                    class="w-full px-4 py-2.5 bg-pink-50 border-0 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 text-sm @error('city') ring-2 ring-red-500 @enderror"
                                    required>
                                @error('city')
                                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Provinsi *</label>
                                <input type="text" name="province" value="{{ old('province') }}"
                                    placeholder="Nama Provinsi"
                                    class="w-full px-4 py-2.5 bg-pink-50 border-0 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 text-sm @error('province') ring-2 ring-red-500 @enderror"
                                    required>
                                @error('province')
                                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kode Pos *</label>
                                <input type="text" name="postal_code" value="{{ old('postal_code') }}"
                                    placeholder="12345"
                                    class="w-full px-4 py-2.5 bg-pink-50 border-0 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 text-sm @error('postal_code') ring-2 ring-red-500 @enderror"
                                    required>
                                @error('postal_code')
                                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Alamat Detail -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap *</label>
                            <textarea name="address" placeholder="Masukkan alamat lengkap (nama jalan, nomor rumah, RT/RW)" rows="3"
                                class="w-full px-4 py-2.5 bg-pink-50 border-0 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 text-sm resize-none @error('address') ring-2 ring-red-500 @enderror"
                                required>{{ old('address') }}</textarea>
                            @error('address')
                                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full px-6 py-3 bg-pink-600 hover:bg-pink-700 rounded-lg text-white font-semibold shadow-md transition">
                            Lanjut ke Konfirmasi
                        </button>

                    </form>

                </div>
            </div>

            <!-- Right Section - Order Summary -->
            <div class="col-span-1">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 sticky top-6">

                    <h3 class="text-base font-bold text-gray-900 mb-4">Ringkasan Pesanan</h3>

                    <!-- Product Items -->
                    <div class="space-y-3 mb-4 pb-4 border-b max-h-96 overflow-y-auto">
                        @foreach ($cart->cartitems as $item)
                            <div class="flex items-start gap-3">
                                @if ($item->product->images && $item->product->images->count() > 0)
                                    <img src="{{ asset('storage/' . $item->product->images->first()->image) }}"
                                        alt="{{ $item->product->name }}" class="w-14 h-14 rounded-lg object-cover">
                                @else
                                    <div class="w-14 h-14 rounded-lg bg-gray-100 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-sm font-semibold text-gray-900 mb-1 line-clamp-2">
                                        {{ $item->product->name }}</h4>
                                    <p class="text-xs text-gray-500">{{ $item->product->vendor->name ?? 'Vendor' }}
                                    </p>
                                    <p class="text-xs text-gray-500">Qty: {{ $item->quantity }}</p>
                                    <p class="text-sm font-bold text-pink-600 mt-1">Rp
                                        {{ number_format($item->subtotal, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Summary -->
                    <div class="space-y-2 mb-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Subtotal ({{ $cart->cartitems->count() }} item)</span>
                            <span class="text-gray-900 font-medium">Rp
                                {{ number_format($cartTotal, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <!-- Total -->
                    <div class="pt-4 border-t border-gray-200">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-base font-bold text-gray-900">Total</span>
                            <span class="text-xl font-bold text-pink-600">Rp
                                {{ number_format($cartTotal, 0, ',', '.') }}</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <script>
        // Debug form submission
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('form');
            forms.forEach((form, index) => {
                form.addEventListener('submit', function(e) {
                    console.log(`Form ${index + 1} submitted`);
                    console.log('Form data:', new FormData(form));

                    // Check if all required fields are filled
                    const requiredFields = form.querySelectorAll('[required]');
                    let allFilled = true;
                    requiredFields.forEach(field => {
                        if (!field.value.trim()) {
                            allFilled = false;
                            console.log('Empty field:', field.name);
                        }
                    });

                    if (!allFilled) {
                        console.log('Some required fields are empty');
                    }
                });
            });
        });
    </script>

</body>

</html>
