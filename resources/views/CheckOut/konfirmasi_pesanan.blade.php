<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pesanan - WeddingMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">

    <!-- Header -->
    <header class="bg-white border-b border-gray-100 py-3">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center">
                
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-gradient-to-br from-yellow-400 to-yellow-300 rounded-lg flex items-center justify-center">
                        <i class="fas fa-heart text-white text-base"></i>
                    </div>
                    <div>
                        <h1 class="text-base font-bold text-gray-900">WeddingMart</h1>
                        <p class="text-xs text-gray-500">Marketplace Pernikahan Terpercaya</p>
                    </div>
                </div>

                <!-- Search Bar -->
                <div class="flex-1 max-w-xl mx-8">
                    <div class="relative">
                        <input type="text" placeholder="Cari gaun pengantin, dekorasi, fotografi, dan lainnya..." class="w-full pl-10 pr-4 py-2 bg-pink-50 border-0 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-200 text-sm text-gray-700">
                        <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-pink-300 text-sm"></i>
                    </div>
                </div>

                <!-- Right Icons -->
                <div class="flex items-center space-x-4">
                    <button class="text-gray-600 hover:text-pink-500">
                        <i class="fas fa-gift text-xl"></i>
                    </button>
                    <button class="text-gray-600 hover:text-pink-500">
                        <i class="fas fa-shopping-cart text-xl"></i>
                    </button>
                    <div class="flex items-center space-x-2 bg-pink-50 rounded-full px-3 py-1.5">
                        <i class="fas fa-user-circle text-pink-400 text-lg"></i>
                        <span class="text-sm text-gray-700">Sari Dewi</span>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <!-- Sub Header with Back Button -->
    <div class="bg-white border-b border-gray-100 py-4">
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
            <h1 class="text-2xl font-bold text-gray-900 mb-2">Konfirmasi Pesanan</h1>
            <p class="text-sm text-gray-600">Periksa kembali detail pesanan Anda</p>
        </div>

        <!-- Progress Steps -->
        <div class="mb-10">
            <div class="flex items-center justify-center gap-3">
                
                <!-- Step 1 -->
                <div class="flex items-center bg-pink-100 rounded-full px-5 py-2.5 gap-2.5">
                    <div class="w-9 h-9 bg-red-500 rounded-full flex items-center justify-center text-white flex-shrink-0">
                        <i class="fas fa-check text-xs"></i>
                    </div>
                    <span class="text-sm font-semibold text-red-600 whitespace-nowrap">Alamat Pengiriman</span>
                </div>

                <!-- Line 1 -->
                <div class="w-12 h-0.5 bg-red-400"></div>

                <!-- Step 2 -->
                <div class="flex items-center bg-pink-100 rounded-full px-5 py-2.5 gap-2.5">
                    <div class="w-9 h-9 bg-red-500 rounded-full flex items-center justify-center text-white flex-shrink-0">
                        <i class="fas fa-credit-card text-xs"></i>
                    </div>
                    <span class="text-sm font-semibold text-red-600 whitespace-nowrap">Metode Pembayaran</span>
                </div>

                <!-- Line 2 -->
                <div class="w-12 h-0.5 bg-red-400"></div>

                <!-- Step 3 -->
                <div class="flex items-center bg-pink-100 rounded-full px-5 py-2.5 gap-2.5">
                    <div class="w-9 h-9 bg-red-500 rounded-full flex items-center justify-center text-white flex-shrink-0">
                        <i class="fas fa-box text-xs"></i>
                    </div>
                    <span class="text-sm font-semibold text-red-600 whitespace-nowrap">Konfirmasi Pesanan</span>
                </div>

            </div>
        </div>

        <!-- Order Details Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6 overflow-hidden">
            
            <!-- Product Section -->
            <div class="p-5 border-b border-gray-100">
                <div class="flex items-center mb-4">
                    <i class="fas fa-shopping-bag text-red-500 mr-2"></i>
                    <h2 class="text-sm font-bold text-gray-900">Produk Pesanan (4 item)</h2>
                </div>

                <!-- Product Item -->
                <div class="flex items-start space-x-4">
                    <img src="https://via.placeholder.com/80x80/e5e7eb/9ca3af?text=Dress" alt="Wedding Dress" class="w-16 h-16 rounded-lg object-cover">
                    <div class="flex-1">
                        <h3 class="font-semibold text-gray-900 text-sm mb-1">Gaun Pengantin Mewah Collection Premium</h3>
                        <p class="text-xs text-gray-500 mb-0.5">Vendor: Wedding Paradise</p>
                        <p class="text-xs text-gray-500">Jumlah: 1</p>
                    </div>
                    <div class="text-right">
                        <p class="text-base font-bold text-red-500">Rp 15.000.000</p>
                    </div>
                </div>

            </div>

            <!-- Shipping Address Section -->
            <div class="p-5 border-b border-gray-100">
                <div class="flex items-center mb-4">
                    <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>
                    <h2 class="text-sm font-bold text-gray-900">Alamat Pengiriman</h2>
                </div>

                <div>
                    <p class="font-semibold text-gray-900 text-sm mb-1">Sari Dewi</p>
                    <p class="text-xs text-gray-600 mb-2">0812345678990</p>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        Jalan P.I Del<br>
                        Sumatera Utara, Balige<br>
                        Kode Pos: 12345
                    </p>
                </div>
            </div>

            <!-- Payment Method Section -->
            <div class="p-5">
                <div class="flex items-center mb-4">
                    <i class="fas fa-credit-card text-red-500 mr-2"></i>
                    <h2 class="text-sm font-bold text-gray-900">Metode Pembayaran</h2>
                </div>

                <div class="bg-pink-50 rounded-lg p-3 flex items-center space-x-3">
                    <div class="w-9 h-9 bg-blue-600 rounded flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-university text-white text-sm"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 text-sm">Transfer Bank</p>
                        <p class="text-xs text-gray-600">BNI •••• 3456</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Total Payment Card -->
        <div class="bg-gradient-to-r from-pink-50 to-pink-100 rounded-xl border border-pink-200 p-5">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-xs text-gray-600 mb-1">Total Pembayaran</p>
                    <p class="text-2xl font-bold text-red-500">Rp 15.000.000</p>
                </div>
                <button class="bg-gradient-to-r from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 text-white font-semibold px-6 py-2.5 rounded-lg shadow-md transition flex items-center space-x-2 text-sm">
                    <i class="fas fa-shopping-bag text-sm"></i>
                    <span>Buat Pesanan</span>
                </button>
            </div>
        </div>

    </div>

</body>
</html>