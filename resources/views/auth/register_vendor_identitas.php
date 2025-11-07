<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Registration - Verifikasi Identitas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

<div class="min-h-screen py-8 px-4 sm:px-6 lg:px-8">
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

        <!-- Main Card -->
        <div class="bg-white rounded-lg shadow-md p-8">
            
            <!-- Title -->
            <div class="text-center mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Vendor Registration</h2>
                <p class="text-sm text-gray-500">Selesaikan Registrasi Anda</p>
            </div>

            <!-- Section Header -->
            <div class="mb-6">
                <h3 class="text-base font-semibold text-gray-800 mb-1">Verifikasi Identitas</h3>
                <p class="text-sm text-gray-500">Buat Identitas login Anda</p>
            </div>

            <form action="#" method="POST" class="space-y-5">
                @csrf

                <!-- Username Field -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-2">
                        Username
                    </label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username"
                        placeholder="Username"
                        class="w-full px-4 py-2.5 bg-pink-50 border border-pink-100 rounded-md focus:ring-2 focus:ring-pink-300 focus:border-transparent outline-none transition text-gray-700 placeholder-gray-400"
                    >
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        Password <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password"
                        placeholder="Password"
                        required
                        class="w-full px-4 py-2.5 bg-pink-50 border border-pink-100 rounded-md focus:ring-2 focus:ring-pink-300 focus:border-transparent outline-none transition text-gray-700 placeholder-gray-400"
                    >
                </div>

                <!-- Confirm Password Field -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                        Konfirmasi Password
                    </label>
                    <input 
                        type="password" 
                        id="password_confirmation" 
                        name="password_confirmation"
                        placeholder="Konfirmasi Password"
                        class="w-full px-4 py-2.5 bg-pink-50 border border-pink-100 rounded-md focus:ring-2 focus:ring-pink-300 focus:border-transparent outline-none transition text-gray-700 placeholder-gray-400"
                    >
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-between items-center pt-6">
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

        <!-- Progress Indicator (Optional) -->
        <div class="flex justify-center mt-6 space-x-2">
            <div class="w-2 h-2 bg-pink-500 rounded-full"></div>
            <div class="w-2 h-2 bg-gray-300 rounded-full"></div>
            <div class="w-2 h-2 bg-gray-300 rounded-full"></div>
        </div>

    </div>
</div>

</body>
</html>