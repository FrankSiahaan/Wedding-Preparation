<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil - WeddingMart</title>
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
    <div class="min-h-[calc(100vh-80px)] flex items-center justify-center px-6">
        
        <div class="max-w-2xl w-full text-center">
            
            <!-- Success Icon -->
            <div class="flex justify-center mb-8">
                <div class="w-32 h-32 bg-green-500 rounded-full flex items-center justify-center">
                    <i class="fas fa-check text-white text-6xl"></i>
                </div>
            </div>

            <!-- Success Title -->
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Pembayaran Berhasil</h1>

            <!-- Success Message -->
            <p class="text-gray-600 mb-12 text-base">Silahkan lanjutkan proses pesanan anda dengan penjual melalui chat</p>

            <!-- Action Buttons -->
            <div class="flex justify-center space-x-4">
                
                <!-- Kembali Button -->
                <a href="/" class="px-8 py-3 bg-gradient-to-r from-pink-400 to-pink-500 hover:from-pink-500 hover:to-pink-600 rounded-full text-white font-semibold shadow-md transition min-w-[200px]">
                    Kembali
                </a>

                <!-- Chat Penjual Button -->
                <a href="#" class="px-8 py-3 bg-gradient-to-r from-pink-400 to-pink-500 hover:from-pink-500 hover:to-pink-600 rounded-full text-white font-semibold shadow-md transition min-w-[200px] flex items-center justify-center space-x-2">
                    <i class="far fa-comment-dots"></i>
                    <span>Chat Penjual</span>
                </a>

            </div>

        </div>

    </div>

</body>
</html>