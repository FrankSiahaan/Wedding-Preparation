<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Vendor - WeddingMart</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">

    <!-- Login Container -->
    <div class="bg-white rounded-2xl shadow-lg max-w-md w-full p-8">

        <!-- Logo & Title -->
        <div class="text-center mb-8">
            <div class="flex justify-center mb-4">
                <div
                    class="w-16 h-16 bg-linear-to-br from-yellow-100 to-yellow-50 rounded-full flex items-center justify-center">
                    <svg class="w-10 h-10 text-yellow-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5" aria-hidden="true">
                        <path
                            d="M12 21s-6.716-4.319-9.192-8.055C1.113 10.16 2.02 7.5 4.41 6.5 6.08 5.8 7.93 6.3 9 7.6c1.07-1.3 2.92-1.8 4.59-1.1 2.39 1 3.3 3.66 1.6 6.45C18.72 16.68 12 21 12 21Z"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
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

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-red-600 shrink-0 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="flex-1">
                        @foreach ($errors->all() as $error)
                            <p class="text-sm text-red-800">{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <!-- Login Form -->
        <form action="{{ route('vendor.login.store') }}" method="POST">
            @csrf

            <!-- Email Input -->
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-900 mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="masukkan email anda"
                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-transparent text-sm"
                    required>
            </div>

            <!-- Password Input -->
            <div class="mb-2">
                <label class="block text-sm font-semibold text-gray-900 mb-2">Password</label>
                <input type="password" name="password" placeholder="masukkan password anda"
                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-transparent text-sm"
                    required>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center">
                    <input type="checkbox" name="remember"
                        class="w-4 h-4 text-pink-600 border-gray-300 rounded focus:ring-pink-500">
                    <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                </label>
            </div>

            <!-- Login Button -->
            <button type="submit"
                class="w-full bg-gradient-to-r from-pink-400 to-pink-500 hover:from-pink-500 hover:to-pink-600 text-white font-semibold py-3 rounded-lg transition shadow-md">
                Login ke Dashboard
            </button>

            <!-- Customer Login Link -->
            <div class="mt-6 pt-6 border-t border-gray-200">
                <p class="text-center text-sm text-gray-600">
                    Bukan vendor?
                    <a href="{{ route('login') }}" class="text-pink-600 hover:text-pink-700 font-medium">Login sebagai
                        Customer</a>
                </p>
            </div>

        </form>

    </div>

</body>

</html>
