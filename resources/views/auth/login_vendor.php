<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Vendor - WeddingMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
    
    <!-- Login Container -->
    <div class="bg-white rounded-2xl shadow-lg max-w-md w-full p-8">
        
        <!-- Logo & Title -->
        <div class="text-center mb-8">
            <div class="flex justify-center mb-4">
                <div class="w-16 h-16 bg-gradient-to-br from-pink-400 to-pink-300 rounded-full flex items-center justify-center">
                    <i class="fas fa-heart text-white text-2xl"></i>
                </div>
            </div>
            <h1 class="text-2xl font-bold text-gray-900 mb-1">WeddingMart</h1>
            <p class="text-sm text-gray-500">Marketplace Pernikahan Terpercaya</p>
        </div>

        <!-- Login Header -->
        <div class="mb-6">
            <h2 class="text-xl font-bold text-gray-900 mb-1">Login Vendor</h2>
            <p class="text-sm text-gray-500">Masuk ke dashboard vendor Anda</p>
        </div>

        <!-- Login Form -->
        <form action="#" method="POST">
            
            <!-- Google Login Button -->
            <button type="button" class="w-full flex items-center justify-center space-x-3 border-2 border-gray-200 rounded-lg py-3 px-4 mb-4 hover:bg-gray-50 transition">
                <svg class="w-5 h-5" viewBox="0 0 24 24">
                    <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                    <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                    <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                    <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                </svg>
                <span class="text-gray-700 font-medium text-sm">Log In dengan Google</span>
            </button>

            <!-- Divider -->
            <div class="flex items-center my-6">
                <div class="flex-1 border-t border-gray-200"></div>
                <span class="px-4 text-xs text-gray-400">atau Login dengan Email</span>
                <div class="flex-1 border-t border-gray-200"></div>
            </div>

            <!-- Email Input -->
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-900 mb-2">Email</label>
                <input type="email" name="email" placeholder="masukkan email anda" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-transparent text-sm" required>
            </div>

            <!-- Password Input -->
            <div class="mb-2">
                <label class="block text-sm font-semibold text-gray-900 mb-2">Password</label>
                <div class="relative">
                    <input type="password" name="password" id="password" placeholder="masukkan password anda" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-transparent text-sm pr-12" required>
                    <button type="button" onclick="togglePassword()" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                        <i class="fas fa-eye" id="toggleIcon"></i>
                    </button>
                </div>
            </div>

            <!-- Forgot Password Link -->
            <div class="text-right mb-6">
                <a href="#" class="text-sm text-blue-600 hover:underline">Lupa sandi?</a>
            </div>

            <!-- Login Button -->
            <button type="submit" class="w-full bg-gradient-to-r from-pink-400 to-pink-500 hover:from-pink-500 hover:to-pink-600 text-white font-semibold py-3 rounded-lg transition shadow-md">
                Login ke Dashboard
            </button>

            <!-- Register Link -->
            <p class="text-center text-sm text-gray-600 mt-6">
                Belum punya akun vendor? 
                <a href="#" class="text-blue-600 hover:underline font-medium">Daftar Sebagai Vendor</a>
            </p>

        </form>

    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>

</body>
</html>