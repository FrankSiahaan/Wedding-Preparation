<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Keranjang Belanja - WeddingMart</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-dvh bg-gray-50 text-gray-900 font-sans">

    {{-- Toast Notification --}}
    <div id="toast"
        class="fixed top-4 right-4 z-50 transform translate-x-[500px] transition-transform duration-300 ease-in-out">
        <div class="bg-white rounded-lg shadow-lg border-l-4 border-green-500 p-4 flex items-center gap-3 min-w-[320px]">
            <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <div class="flex-1">
                <p class="font-semibold text-gray-900" id="toast-title">Berhasil!</p>
                <p class="text-sm text-gray-600" id="toast-message">Operasi berhasil</p>
            </div>
            <button onclick="hideToast()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    {{-- HEADER --}}
    <header class="bg-white sticky top-0 z-50 border-b border-gray-100">
        <div class="container mx-auto px-4 max-w-7xl">
            <nav class="flex items-center justify-between h-14">
                {{-- Logo --}}
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
                        </form>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="flex items-center gap-3">
                    <a href="{{ route('cart.index') }}"
                        class="grid place-items-center w-8 h-8 rounded-full border border-pink-200 text-pink-600 bg-pink-50">
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
                        <span class="text-[13px] text-gray-700">{{ auth()->user()->name ?? 'Guest' }}</span>
                    </a>
                </div>
            </nav>
        </div>
    </header>

    {{-- MAIN CONTENT --}}
    <main class="container mx-auto px-4 max-w-7xl py-6">

        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    showToast('Berhasil!', '{{ session('success') }}', 'success');
                });
            </script>
        @endif

        @if (session('error'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    showToast('Error!', '{{ session('error') }}', 'error');
                });
            </script>
        @endif

        <h1 class="text-2xl font-bold text-gray-900 mb-6">Keranjang Belanja</h1>

        @if ($cart && $cart->cartitems->count() > 0)
            <div class="grid lg:grid-cols-3 gap-6">

                {{-- LEFT COLUMN: Cart Items --}}
                <div class="lg:col-span-2 space-y-4">
                    <div class="bg-white rounded-lg border border-gray-100 p-4">
                        <h2 class="text-base font-semibold text-gray-900 mb-4">Produk yang Dipilih
                            ({{ $cart->cartitems->count() }})</h2>

                        <div class="space-y-4">
                            @foreach ($cart->cartitems as $item)
                                <div class="flex items-start gap-4 pb-4 border-b border-gray-100 last:border-0">
                                    {{-- Product Image --}}
                                    <a href="{{ route('product.detail', $item->product_id) }}">
                                        @if ($item->product->images && $item->product->images->count() > 0)
                                            <img src="{{ asset('storage/' . $item->product->images->first()->image) }}"
                                                alt="{{ $item->product->name }}"
                                                class="w-20 h-24 object-cover rounded-lg">
                                        @else
                                            <div
                                                class="w-20 h-24 bg-gray-200 rounded-lg flex items-center justify-center">
                                                <span class="text-xs text-gray-400">No Image</span>
                                            </div>
                                        @endif
                                    </a>

                                    {{-- Product Details --}}
                                    <div class="flex-1">
                                        <a href="{{ route('product.detail', $item->product_id) }}">
                                            <h3 class="text-sm font-semibold text-gray-900 mb-1 hover:text-pink-600">
                                                {{ $item->product->name }}
                                            </h3>
                                        </a>
                                        <p class="text-xs text-gray-500 mb-2">{{ $item->product->vendor->name ?? '' }}
                                        </p>
                                        <p class="text-pink-600 font-bold text-base mb-3">
                                            Rp {{ number_format($item->price, 0, ',', '.') }}
                                        </p>

                                        {{-- Quantity Controls --}}
                                        <div class="flex items-center gap-2">
                                            <form action="{{ route('cart.update', $item->id) }}" method="POST"
                                                class="flex items-center gap-2">
                                                @csrf
                                                @method('PUT')
                                                <button type="button"
                                                    class="decrease-qty w-7 h-7 border border-gray-300 rounded hover:bg-gray-50 flex items-center justify-center"
                                                    data-item-id="{{ $item->id }}">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M20 12H4" />
                                                    </svg>
                                                </button>
                                                <input type="number" name="quantity" value="{{ $item->quantity }}"
                                                    min="1"
                                                    class="quantity-input w-12 text-center py-1 border border-gray-300 rounded text-xs"
                                                    data-item-id="{{ $item->id }}"
                                                    data-price="{{ $item->price }}">
                                                <button type="button"
                                                    class="increase-qty w-7 h-7 border border-gray-300 rounded hover:bg-gray-50 flex items-center justify-center"
                                                    data-item-id="{{ $item->id }}">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M12 4v16m8-8H4" />
                                                    </svg>
                                                </button>
                                            </form>
                                            <span class="text-xs text-gray-500 ml-2">
                                                Subtotal: <strong>Rp
                                                    {{ number_format($item->subtotal, 0, ',', '.') }}</strong>
                                            </span>
                                        </div>
                                    </div>

                                    {{-- Delete Button --}}
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-gray-400 hover:text-red-500 transition-colors"
                                            onclick="return confirm('Yakin ingin menghapus item ini?')">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- RIGHT COLUMN: Order Summary --}}
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg border border-gray-100 p-4 sticky top-20">
                        <h2 class="text-base font-semibold text-gray-900 mb-4">Ringkasan Pesanan</h2>

                        <div class="space-y-3 mb-4">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Subtotal ({{ $cart->cartitems->count() }} item)</span>
                                <span class="font-semibold">Rp {{ number_format($cartTotal, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <div class="border-t border-gray-200 my-4"></div>

                        <div class="flex justify-between items-center mb-6">
                            <span class="text-base font-bold text-gray-900">TOTAL</span>
                            <span class="text-lg font-bold text-pink-600">Rp
                                {{ number_format($cartTotal, 0, ',', '.') }}</span>
                        </div>

                        <a href="{{ route('checkout.shipping') }}"
                            class="block w-full py-3 bg-pink-600 hover:bg-pink-700 rounded-lg text-white font-semibold text-center transition-colors">
                            Checkout
                        </a>

                        <a href="{{ route('product') }}"
                            class="block w-full mt-2 py-2 border border-gray-300 hover:bg-gray-50 rounded-lg text-gray-700 font-medium text-center text-sm transition-colors">
                            Lanjut Belanja
                        </a>
                    </div>
                </div>

            </div>
        @else
            {{-- Empty Cart State --}}
            <div class="bg-white rounded-lg border border-gray-100 p-12 text-center">
                <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Keranjang Belanja Kosong</h3>
                <p class="text-gray-500 mb-6">Belum ada produk yang ditambahkan ke keranjang</p>
                <a href="{{ route('product') }}"
                    class="inline-block px-6 py-3 bg-pink-600 hover:bg-pink-700 rounded-lg text-white font-semibold transition-colors">
                    Mulai Belanja
                </a>
            </div>
        @endif

    </main>

    {{-- FOOTER --}}
    <footer class="bg-white border-t mt-12">
        <div class="container mx-auto px-4 max-w-7xl py-3 text-center text-xs text-gray-500">
            &copy; {{ now()->year }} WeddingMart • Marketplace Persiapan Pernikahan Terpercaya
        </div>
    </footer>

    {{-- Quantity Update Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Decrease quantity
            document.querySelectorAll('.decrease-qty').forEach(btn => {
                btn.addEventListener('click', function() {
                    const itemId = this.dataset.itemId;
                    const input = document.querySelector(
                        `.quantity-input[data-item-id="${itemId}"]`);
                    let currentValue = parseInt(input.value);
                    if (currentValue > 1) {
                        input.value = currentValue - 1;
                        updateCart(itemId, currentValue - 1);
                    }
                });
            });

            // Increase quantity
            document.querySelectorAll('.increase-qty').forEach(btn => {
                btn.addEventListener('click', function() {
                    const itemId = this.dataset.itemId;
                    const input = document.querySelector(
                        `.quantity-input[data-item-id="${itemId}"]`);
                    let currentValue = parseInt(input.value);
                    input.value = currentValue + 1;
                    updateCart(itemId, currentValue + 1);
                });
            });

            // Direct input change
            document.querySelectorAll('.quantity-input').forEach(input => {
                input.addEventListener('change', function() {
                    const itemId = this.dataset.itemId;
                    const quantity = parseInt(this.value);
                    if (quantity >= 1) {
                        updateCart(itemId, quantity);
                    } else {
                        this.value = 1;
                    }
                });
            });

            function updateCart(itemId, quantity) {
                fetch(`/cart/${itemId}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            quantity: quantity
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Reload page to update totals
                            location.reload();
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }

            // Toast Notification Functions
            window.showToast = function(title, message, type = 'success') {
                const toast = document.getElementById('toast');
                const toastTitle = document.getElementById('toast-title');
                const toastMessage = document.getElementById('toast-message');
                const toastIcon = toast.querySelector('.w-10');

                // Update content
                toastTitle.textContent = title;
                toastMessage.textContent = message;

                // Update style based on type
                if (type === 'success') {
                    toast.querySelector('.border-l-4').classList.remove('border-red-500');
                    toast.querySelector('.border-l-4').classList.add('border-green-500');
                    toastIcon.classList.remove('bg-red-100');
                    toastIcon.classList.add('bg-green-100');
                    toastIcon.querySelector('svg').classList.remove('text-red-600');
                    toastIcon.querySelector('svg').classList.add('text-green-600');
                    toastIcon.querySelector('svg').innerHTML =
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />';
                } else {
                    toast.querySelector('.border-l-4').classList.remove('border-green-500');
                    toast.querySelector('.border-l-4').classList.add('border-red-500');
                    toastIcon.classList.remove('bg-green-100');
                    toastIcon.classList.add('bg-red-100');
                    toastIcon.querySelector('svg').classList.remove('text-green-600');
                    toastIcon.querySelector('svg').classList.add('text-red-600');
                    toastIcon.querySelector('svg').innerHTML =
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />';
                }

                // Show toast
                toast.style.transform = 'translateX(0)';

                // Auto hide after 3 seconds
                setTimeout(() => {
                    hideToast();
                }, 3000);
            }

            window.hideToast = function() {
                const toast = document.getElementById('toast');
                toast.style.transform = 'translateX(500px)';
            }
        });
    </script>

</body>

</html>
