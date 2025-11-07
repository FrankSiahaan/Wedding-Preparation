<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Registration - Review</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto">
        
        <!-- Header with Logo -->
        <div class="flex items-center mb-8">
            <div class="flex items-center">
                <svg class="w-8 h-8 text-pink-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
                <div class="ml-3">
                    <h1 class="text-xl font-bold text-gray-800">WeddingMart</h1>
                    <p class="text-xs text-gray-500">Marketplace Pernikahan Terpercaya</p>
                </div>
            </div>
        </div>

        <!-- Main Title -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-semibold text-gray-800 mb-2">Vendor Registration</h1>
            <p class="text-sm text-gray-500">Selesaikan Registrasi Anda</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-md p-8">
            
            <!-- Section: Review -->
            <div class="mb-6">
                <h3 class="text-base font-semibold text-gray-800 mb-1">Review</h3>
                <p class="text-xs text-gray-500">Tinjau dan kirim aplikasi Anda</p>
            </div>

            <form action="#" method="POST" class="space-y-6">
                @csrf

                <!-- Informasi Bisnis Section -->
                <div class="bg-pink-50 rounded-lg p-5">
                    <h4 class="text-sm font-semibold text-gray-800 mb-4">Informasi Bisnis</h4>
                    
                    <div class="space-y-3">
                        <!-- Nama Bisnis -->
                        <div>
                            <label class="block text-xs text-gray-600 mb-1">Nama Bisnis</label>
                            <p class="text-sm text-gray-800 font-medium">{{ $vendor_name ?? '-' }}</p>
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-xs text-gray-600 mb-1">Email</label>
                            <p class="text-sm text-gray-800 font-medium">{{ $email ?? '-' }}</p>
                        </div>

                        <!-- Nomor Telepon -->
                        <div>
                            <label class="block text-xs text-gray-600 mb-1">Nomor Telepon</label>
                            <p class="text-sm text-gray-800 font-medium">{{ $phone ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Cakupan dan Produk Section -->
                <div class="bg-pink-50 rounded-lg p-5">
                    <h4 class="text-sm font-semibold text-gray-800 mb-4">Cakupan dan Produk</h4>
                    
                    <div class="space-y-3">
                        <!-- Jenis Cakupan -->
                        <div>
                            <label class="block text-xs text-gray-600 mb-1">Jenis Cakupan</label>
                            <p class="text-sm text-gray-800 font-medium">{{ $coverage ?? '-' }}</p>
                        </div>

                        <!-- Produk -->
                        <div>
                            <label class="block text-xs text-gray-600 mb-1">Produk</label>
                            <p class="text-sm text-gray-800 font-medium">{{ $products ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-between items-center pt-4">
                    <button 
                        type="button"
                        onclick="window.history.back()"
                        class="px-8 py-2.5 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300 transition font-medium"
                    >
                        Kembali
                    </button>
                    <button 
                        type="submit"
                        class="px-10 py-2.5 text-white bg-gradient-to-r from-pink-400 to-pink-500 rounded-md hover:from-pink-500 hover:to-pink-600 transition font-medium shadow-md"
                    >
                        Lanjut
                    </button>
                </div>
            </form>

        </div>

        <!-- Progress Indicator -->
        <div class="flex justify-center mt-6 space-x-2">
            <div class="w-2 h-2 bg-pink-500 rounded-full"></div>
            <div class="w-2 h-2 bg-pink-500 rounded-full"></div>
            <div class="w-2 h-2 bg-pink-500 rounded-full"></div>
        </div>

    </div>
</body>
</html>
