<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login Vendor - WeddingMart</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">

    <!-- Login Container -->
    <div class="bg-white rounded-2xl shadow-lg max-w-md w-full p-8">

        <!-- Logo & Title -->
        <div class="text-center mb-8">
            <div class="flex justify-center mb-4">
                <div class="w-16 h-16 rounded-full grid place-items-center bg-yellow-50 ring-2 ring-yellow-100">
                    <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="#C7A434" stroke-width="1.5">
                        <path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
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
                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent text-sm @error('email') border-red-300 @enderror"
                    required>
            </div>

            <!-- Password Input -->
            <div class="mb-2" x-data="{ showPassword: false }">
                <label class="block text-sm font-semibold text-gray-900 mb-2">Password</label>
                <div class="relative">
                    <input :type="showPassword ? 'text' : 'password'" name="password"
                        placeholder="masukkan password anda"
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent text-sm pr-12 @error('password') border-red-300 @enderror"
                        required>
                    <button type="button" @click="showPassword = !showPassword"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                        <svg x-show="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg x-show="showPassword" class="w-5 h-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center">
                    <input type="checkbox" name="remember"
                        class="w-4 h-4 text-yellow-600 border-gray-300 rounded focus:ring-yellow-500">
                    <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                </label>
            </div>

            <!-- Login Button -->
            <button type="submit"
                class="w-full bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-3 rounded-lg transition shadow-md">
                Login ke Dashboard
            </button>

            <!-- Customer Login Link -->
            <div class="mt-6 pt-6 border-t border-gray-200">
                <p class="text-center text-sm text-gray-600">
                    Bukan vendor?
                    <a href="{{ route('login') }}" class="text-yellow-600 hover:text-yellow-700 font-medium">Login
                        sebagai Customer</a>
                </p>
            </div>

        </form>

    </div>

</body>

</html>
