<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alamat Pengiriman - WeddingMart</title>
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

    <!-- Back Button -->
    <div class="bg-white border-b border-gray-100 py-3">
        <div class="max-w-7xl mx-auto px-6">
            <a href="#" class="inline-flex items-center text-red-500 hover:text-red-600 text-sm font-medium">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali ke Keranjang
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-6 py-8">
        
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
                    <div class="w-9 h-9 bg-red-500 rounded-full flex items-center justify-center text-white flex-shrink-0">
                        <i class="fas fa-map-marker-alt text-xs"></i>
                    </div>
                    <span class="text-sm font-semibold text-red-600 whitespace-nowrap">Alamat Pengiriman</span>
                </div>

                <!-- Line 1 -->
                <div class="w-12 h-0.5 bg-gray-300"></div>

                <!-- Step 2 - Inactive -->
                <div class="flex items-center bg-gray-100 rounded-full px-5 py-2.5 gap-2.5">
                    <div class="w-9 h-9 bg-gray-400 rounded-full flex items-center justify-center text-white flex-shrink-0">
                        <i class="fas fa-credit-card text-xs"></i>
                    </div>
                    <span class="text-sm font-semibold text-gray-500 whitespace-nowrap">Metode Pembayaran</span>
                </div>

                <!-- Line 2 -->
                <div class="w-12 h-0.5 bg-gray-300"></div>

                <!-- Step 3 - Inactive -->
                <div class="flex items-center bg-gray-100 rounded-full px-5 py-2.5 gap-2.5">
                    <div class="w-9 h-9 bg-gray-400 rounded-full flex items-center justify-center text-white flex-shrink-0">
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

                    <form action="#" method="POST">
                        
                        <!-- Nama Lengkap & Nomor Telepon -->
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap *</label>
                                <input type="text" placeholder="Nama Lengkap" class="w-full px-4 py-2.5 bg-pink-50 border-0 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 text-sm" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon *</label>
                                <input type="tel" placeholder="Nomor Telepon" class="w-full px-4 py-2.5 bg-pink-50 border-0 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 text-sm" required>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                            <input type="email" placeholder="Email Anda" class="w-full px-4 py-2.5 bg-pink-50 border-0 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 text-sm" required>
                        </div>

                        <!-- Alamat Lengkap Label -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap *</label>
                        </div>

                        <!-- Kota, Provinsi, Kode Pos -->
                        <div class="grid grid-cols-3 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kota *</label>
                                <select class="w-full px-4 py-2.5 bg-pink-50 border-0 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 text-sm text-gray-500" required>
                                    <option value="">Pilih kota</option>
                                    <option value="jakarta">Jakarta</option>
                                    <option value="bandung">Bandung</option>
                                    <option value="surabaya">Surabaya</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Provinsi *</label>
                                <select class="w-full px-4 py-2.5 bg-pink-50 border-0 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 text-sm text-gray-500" required>
                                    <option value="">Pilih provinsi</option>
                                    <option value="jawa-barat">Jawa Barat</option>
                                    <option value="jawa-timur">Jawa Timur</option>
                                    <option value="jawa-tengah">Jawa Tengah</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kode Pos *</label>
                                <input type="text" placeholder="12345" class="w-full px-4 py-2.5 bg-pink-50 border-0 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 text-sm" required>
                            </div>
                        </div>

                        <!-- Alamat Detail -->
                        <div class="mb-4">
                            <textarea placeholder="Masukkan alamat lengkap (nama jalan, nomor rumah, RT/RW)" rows="3" class="w-full px-4 py-2.5 bg-pink-50 border-0 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 text-sm resize-none" required></textarea>
                        </div>

                        <!-- Catatan Pengiriman -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Catatan Pengiriman (Opsional)</label>
                            <textarea placeholder="Catatan khusus untuk kurir (opsional)" rows="2" class="w-full px-4 py-2.5 bg-pink-50 border-0 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300 text-sm resize-none"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="w-full px-6 py-3 bg-gradient-to-r from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 rounded-lg text-white font-semibold shadow-md transition">
                            Lanjut ke Pembayaran
                        </button>

                    </form>

                </div>
            </div>

            <!-- Right Section - Order Summary -->
            <div class="col-span-1">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 sticky top-6">
                    
                    <h3 class="text-base font-bold text-gray-900 mb-4">Ringkasan Pesanan</h3>

                    <!-- Product Item -->
                    <div class="flex items-start space-x-3 mb-4 pb-4 border-b">
                        <img src="https://via.placeholder.com/60x60/e5e7eb/9ca3af?text=Dress" alt="Product" class="w-14 h-14 rounded-lg object-cover">
                        <div class="flex-1">
                            <h4 class="text-sm font-semibold text-gray-900 mb-1">Gaun Pengantin Mewah Collection Premium</h4>
                            <p class="text-xs text-gray-500">Quantity: 1</p>
                            <p class="text-sm font-bold text-red-500 mt-1">Rp 15.000.000</p>
                        </div>
                    </div>

                    <!-- Summary -->
                    <div class="space-y-2 mb-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="text-gray-900 font-medium">Rp 15.000.000</span>
                        </div>
                    </div>

                    <!-- Total -->
                    <div class="pt-4 border-t border-gray-200">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-base font-bold text-gray-900">Total</span>
                            <span class="text-xl font-bold text-red-500">Rp 15.000.000</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</body>
</html>