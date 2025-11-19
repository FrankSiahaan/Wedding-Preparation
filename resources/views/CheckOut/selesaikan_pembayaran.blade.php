<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - WeddingMart</title>
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

    <!-- Back Button -->
    <div class="bg-white border-b border-gray-100 py-3">
        <div class="max-w-7xl mx-auto px-6">
            <a href="#" class="inline-flex items-center text-red-500 hover:text-red-600 text-sm font-medium">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-6 py-8">

        <!-- Page Title - Center -->
        <div class="text-center mb-10">
            <h1 class="text-2xl font-bold text-gray-900 mb-2">Selesaikan Pembayaran Anda</h1>
        </div>

        <!-- Virtual Account Card -->
        <div class="bg-gradient-to-br from-pink-50 to-pink-100 rounded-2xl shadow-sm border border-pink-200 p-8 mb-6">

            <h2 class="text-xl font-bold text-gray-900 mb-6">Virtual Account</h2>

            <!-- Virtual Account Number -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-800 mb-3">Nomor Virtual Account</label>
                <div class="flex items-center space-x-3">
                    <input type="text" value="8808123456789012" readonly
                        class="flex-1 px-4 py-3 bg-white border-0 rounded-lg text-gray-900 font-mono text-lg font-semibold focus:outline-none">
                    <button onclick="copyToClipboard()"
                        class="px-4 py-3 bg-white hover:bg-gray-50 border border-gray-200 rounded-lg transition">
                        <i class="far fa-copy text-gray-700"></i>
                    </button>
                </div>
            </div>

            <!-- Total Payment -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-800 mb-3">Total Pembayaran</label>
                <input type="text" value="Rp 2.750.000" readonly
                    class="w-full px-4 py-3 bg-white border-0 rounded-lg text-gray-900 font-semibold text-lg focus:outline-none">
            </div>

        </div>

        <!-- Payment Instructions Card -->
        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl shadow-sm border border-blue-200 p-8 mb-6">

            <h3 class="text-lg font-bold text-blue-900 mb-4">Cara Pembayaran:</h3>

            <ol class="space-y-3 text-blue-800">
                <li class="flex items-start">
                    <span class="font-bold mr-2">1.</span>
                    <span class="text-sm">Buka aplikasi mobile banking atau ATM</span>
                </li>
                <li class="flex items-start">
                    <span class="font-bold mr-2">2.</span>
                    <span class="text-sm">Pilih menu "Transfer" atau "Bayar"</span>
                </li>
                <li class="flex items-start">
                    <span class="font-bold mr-2">3.</span>
                    <span class="text-sm">Pilih "Virtual Account" atau "Rekening Virtual"</span>
                </li>
                <li class="flex items-start">
                    <span class="font-bold mr-2">4.</span>
                    <span class="text-sm">Masukkan nomor Virtual Account di atas</span>
                </li>
                <li class="flex items-start">
                    <span class="font-bold mr-2">5.</span>
                    <span class="text-sm">Masukkan nominal sesuai total pembayaran</span>
                </li>
                <li class="flex items-start">
                    <span class="font-bold mr-2">6.</span>
                    <span class="text-sm">Konfirmasi dan selesaikan pembayaran</span>
                </li>
            </ol>

        </div>

        <!-- Action Button -->
        <div class="flex justify-end">
            <button
                class="px-8 py-3 bg-gradient-to-r from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 rounded-lg text-white font-semibold shadow-md transition">
                Lanjutkan
            </button>
        </div>

    </div>

    <script>
        function copyToClipboard() {
            const vaNumber = '8808123456789012';
            navigator.clipboard.writeText(vaNumber).then(() => {
                alert('Nomor Virtual Account berhasil disalin!');
            }).catch(err => {
                console.error('Gagal menyalin: ', err);
            });
        }
    </script>

</body>

</html>
