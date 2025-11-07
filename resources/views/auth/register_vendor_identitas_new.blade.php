<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Registration - Verifikasi Identitas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto">
        
        <!-- Main Title -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-semibold text-gray-800 mb-2">Vendor Registration</h1>
            <p class="text-sm text-gray-500">Selesaikan Registrasi Anda</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-md p-8">
            
            <!-- Section Header -->
            <div class="mb-6">
                <h3 class="text-base font-semibold text-gray-800 mb-1">Verifikasi identitas</h3>
                <p class="text-xs text-gray-500">Buat Identitas login Anda</p>
            </div>

            <form action="#" method="POST" class="space-y-5">
                @csrf

                <!-- Username Field -->
                <div>
                    <label for="username" class="block text-xs font-medium text-gray-700 mb-2">
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
                    <label for="password" class="block text-xs font-medium text-gray-700 mb-2">
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
                    <label for="password_confirmation" class="block text-xs font-medium text-gray-700 mb-2">
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
    </div>
</body>
</html>
