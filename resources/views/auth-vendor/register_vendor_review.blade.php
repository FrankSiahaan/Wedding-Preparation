<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Registration - Review</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    
    <!-- Header with Logo - Fixed at top with white background -->
    <div class="bg-white border-b border-gray-200 py-4 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center">
                <svg class="w-14 h-14" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- Heart shape -->
                    <path d="M40 25 C35 18, 25 18, 25 28 C25 38, 40 48, 40 48 C40 48, 55 38, 55 28 C55 18, 45 18, 40 25 Z" 
                          stroke="#B8860B" stroke-width="2" fill="none"/>
                    
                    <!-- Top ornament -->
                    <circle cx="40" cy="15" r="2" fill="#B8860B"/>
                    <line x1="40" y1="17" x2="40" y2="22" stroke="#B8860B" stroke-width="1.5"/>
                    
                    <!-- Bottom decorative swirls -->
                    <!-- Left swirl -->
                    <path d="M30 50 Q25 52, 23 56 Q22 58, 24 60" stroke="#B8860B" stroke-width="1.5" fill="none"/>
                    <path d="M23 56 Q20 58, 20 62" stroke="#B8860B" stroke-width="1.5" fill="none"/>
                    
                    <!-- Center bottom -->
                    <path d="M40 50 L40 58" stroke="#B8860B" stroke-width="1.5"/>
                    <circle cx="40" cy="60" r="2.5" stroke="#B8860B" stroke-width="1.5" fill="none"/>
                    
                    <!-- Right swirl -->
                    <path d="M50 50 Q55 52, 57 56 Q58 58, 56 60" stroke="#B8860B" stroke-width="1.5" fill="none"/>
                    <path d="M57 56 Q60 58, 60 62" stroke="#B8860B" stroke-width="1.5" fill="none"/>
                    
                    <!-- Decorative curves connecting to center -->
                    <path d="M35 50 Q37 54, 40 56" stroke="#B8860B" stroke-width="1.5" fill="none"/>
                    <path d="M45 50 Q43 54, 40 56" stroke="#B8860B" stroke-width="1.5" fill="none"/>
                </svg>
                <div class="ml-4">
                    <h1 class="text-xl font-bold text-gray-800">WeddingMart</h1>
                    <p class="text-xs text-gray-500">Marketplace Pernikahan Terpercaya</p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">

            <!-- Main Title - Center aligned -->
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
                    
                    <div class="space-y-0">
                        <!-- Nama Bisnis -->
                        <div class="py-3">
                            <div class="flex items-start">
                                <label class="text-xs text-gray-500 w-32 flex-shrink-0">Nama Bisnis</label>
                                <span class="text-xs text-gray-500 mx-2">:</span>
                                <p class="text-xs text-gray-800 flex-1">{{ $vendor_name ?? '-' }}</p>
                            </div>
                        </div>
                        <hr class="border-gray-300">

                        <!-- Email -->
                        <div class="py-3">
                            <div class="flex items-start">
                                <label class="text-xs text-gray-500 w-32 flex-shrink-0">Email</label>
                                <span class="text-xs text-gray-500 mx-2">:</span>
                                <p class="text-xs text-gray-800 flex-1">{{ $email ?? '-' }}</p>
                            </div>
                        </div>
                        <hr class="border-gray-300">

                        <!-- Nomor Telepon -->
                        <div class="py-3">
                            <div class="flex items-start">
                                <label class="text-xs text-gray-500 w-32 flex-shrink-0">Nomor Telepon</label>
                                <span class="text-xs text-gray-500 mx-2">:</span>
                                <p class="text-xs text-gray-800 flex-1">{{ $phone ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cakupan dan Produk Section -->
                <div class="bg-pink-50 rounded-lg p-5">
                    <h4 class="text-sm font-semibold text-gray-800 mb-4">Cakupan dan Produk</h4>
                    
                    <div class="space-y-0">
                        <!-- Jenis Cakupan -->
                        <div class="py-3">
                            <div class="flex items-start">
                                <label class="text-xs text-gray-500 w-32 flex-shrink-0">Jenis Cakupan</label>
                                <span class="text-xs text-gray-500 mx-2">:</span>
                                <p class="text-xs text-gray-800 flex-1">{{ $coverage ?? '-' }}</p>
                            </div>
                        </div>
                        <hr class="border-gray-300">

                        <!-- Produk -->
                        <div class="py-3">
                            <div class="flex items-start">
                                <label class="text-xs text-gray-500 w-32 flex-shrink-0">Produk</label>
                                <span class="text-xs text-gray-500 mx-2">:</span>
                                <p class="text-xs text-gray-800 flex-1">{{ $products ?? '-' }}</p>
                            </div>
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
