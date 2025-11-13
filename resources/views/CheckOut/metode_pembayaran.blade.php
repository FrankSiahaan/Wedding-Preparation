<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - WeddingMart</title>
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
                
                <!-- Step 1 - Completed -->
                <div class="flex items-center bg-pink-100 rounded-full px-5 py-2.5 gap-2.5">
                    <div class="w-9 h-9 bg-red-500 rounded-full flex items-center justify-center text-white flex-shrink-0">
                        <i class="fas fa-check text-xs"></i>
                    </div>
                    <span class="text-sm font-semibold text-red-600 whitespace-nowrap">Alamat Pengiriman</span>
                </div>

                <!-- Line 1 -->
                <div class="w-12 h-0.5 bg-red-400"></div>

                <!-- Step 2 - Active -->
                <div class="flex items-center bg-pink-100 rounded-full px-5 py-2.5 gap-2.5">
                    <div class="w-9 h-9 bg-red-500 rounded-full flex items-center justify-center text-white flex-shrink-0">
                        <i class="fas fa-credit-card text-xs"></i>
                    </div>
                    <span class="text-sm font-semibold text-red-600 whitespace-nowrap">Metode Pembayaran</span>
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
            
            <!-- Left Section - Payment Methods -->
            <div class="col-span-2">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    
                    <div class="flex items-center mb-5">
                        <i class="fas fa-credit-card text-gray-700 mr-2"></i>
                        <h2 class="text-base font-bold text-gray-900">Metode Pembayaran</h2>
                    </div>
                    <p class="text-xs text-gray-500 mb-6">Pilih metode pembayaran yang Anda inginkan</p>

                    <!-- Payment Options -->
                    <div class="space-y-3">
                        
                        <!-- Credit Card -->
                        <div class="border border-gray-200 rounded-lg p-4 hover:border-pink-300 cursor-pointer transition">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-red-50 rounded flex items-center justify-center">
                                        <i class="fas fa-credit-card text-red-500"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900">Kartu Kredit/Debit</p>
                                        <p class="text-xs text-gray-500">Visa, Mastercard, JCB</p>
                                    </div>
                                </div>
                                <div class="flex space-x-1">
                                    <span class="px-2 py-1 bg-blue-600 text-white text-xs font-semibold rounded">VISA</span>
                                    <span class="px-2 py-1 bg-red-600 text-white text-xs font-semibold rounded">MC</span>
                                </div>
                            </div>
                        </div>

                        <!-- Transfer Bank - Selected -->
                        <div class="border-2 border-red-500 bg-red-50 rounded-lg p-4 cursor-pointer">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-3">
                                    <input type="radio" name="payment" checked class="w-4 h-4 text-red-500">
                                    <div class="w-10 h-10 bg-blue-500 rounded flex items-center justify-center">
                                        <i class="fas fa-university text-white"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900">Transfer Bank</p>
                                        <p class="text-xs text-gray-500">BCA, BNI, BRI, Mandiri</p>
                                    </div>
                                </div>
                                <div class="flex space-x-1">
                                    <span class="px-2 py-1 bg-blue-500 text-white text-xs font-semibold rounded">BCA</span>
                                    <span class="px-2 py-1 bg-orange-500 text-white text-xs font-semibold rounded">BNI</span>
                                    <span class="px-2 py-1 bg-blue-600 text-white text-xs font-semibold rounded">BRI</span>
                                </div>
                            </div>

                            <!-- Bank Selection -->
                            <div class="space-y-2 pl-7">
                                <label class="flex items-center space-x-3 p-3 bg-white rounded-lg cursor-pointer hover:bg-gray-50">
                                    <input type="radio" name="bank" class="w-4 h-4">
                                    <img src="https://upload.wikimedia.org/wikipedia/id/thumb/5/55/BNI_logo.svg/200px-BNI_logo.svg.png" alt="BNI" class="h-6">
                                    <span class="text-sm text-gray-700">BNI</span>
                                </label>

                                <label class="flex items-center space-x-3 p-3 bg-white rounded-lg cursor-pointer hover:bg-gray-50">
                                    <input type="radio" name="bank" class="w-4 h-4">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Bank_BRI_logo.svg/200px-Bank_BRI_logo.svg.png" alt="BRI" class="h-6">
                                    <span class="text-sm text-gray-700">BRI</span>
                                </label>

                                <label class="flex items-center space-x-3 p-3 bg-blue-50 border-2 border-blue-500 rounded-lg cursor-pointer">
                                    <input type="radio" name="bank" checked class="w-4 h-4 text-blue-500">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Bank_Central_Asia.svg/200px-Bank_Central_Asia.svg.png" alt="BCA" class="h-6">
                                    <span class="text-sm text-gray-900 font-semibold">BCA</span>
                                </label>
                            </div>
                        </div>

                        <!-- E-Wallet -->
                        <div class="border border-gray-200 rounded-lg p-4 hover:border-pink-300 cursor-pointer transition">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-green-50 rounded-full flex items-center justify-center">
                                        <i class="fas fa-wallet text-green-500"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900">E-Wallet</p>
                                        <p class="text-xs text-gray-500">GoPay, OVO, DANA, ShopeePay</p>
                                    </div>
                                </div>
                                <div class="flex space-x-1">
                                    <span class="px-2 py-1 bg-green-500 text-white text-xs font-semibold rounded">GP</span>
                                    <span class="px-2 py-1 bg-purple-500 text-white text-xs font-semibold rounded">OVO</span>
                                    <span class="px-2 py-1 bg-blue-500 text-white text-xs font-semibold rounded">DN</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-3 mt-6">
                        <button class="flex-1 px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition">
                            Kembali
                        </button>
                        <button class="flex-1 px-6 py-3 bg-gradient-to-r from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 rounded-lg text-white font-semibold shadow-md transition">
                            Lanjut ke Konfirmasi
                        </button>
                    </div>

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