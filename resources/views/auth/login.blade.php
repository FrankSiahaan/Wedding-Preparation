<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Login — WeddingMart</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-50 flex items-center justify-center px-4 py-8">
    <div class="w-full max-w-md">
        {{-- Card Login --}}
        <div class="bg-white rounded-2xl shadow-lg p-8">
            {{-- Logo & Brand --}}
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-linear-to-br from-yellow-100 to-yellow-50 rounded-full mb-4">
                    <svg class="w-10 h-10 text-yellow-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5" aria-hidden="true">
                        <path
                            d="M12 21s-6.716-4.319-9.192-8.055C1.113 10.16 2.02 7.5 4.41 6.5 6.08 5.8 7.93 6.3 9 7.6c1.07-1.3 2.92-1.8 4.59-1.1 2.39 1 3.3 3.66 1.6 6.45C18.72 16.68 12 21 12 21Z"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-gray-900">WeddingMart</h1>
                <p class="text-sm text-gray-500 mt-1">Marketplace Pernikahan Terpercaya</p>
            </div>

            {{-- Google Login Button --}}
            <a href="#"
                class="w-full flex items-center justify-center gap-3 px-4 py-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors mb-6">
                <svg class="w-5 h-5" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill="#4285F4"
                        d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                    <path fill="#34A853"
                        d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                    <path fill="#FBBC05"
                        d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                    <path fill="#EA4335"
                        d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                </svg>
                <span class="font-medium text-gray-700">Log In dengan Google</span>
            </a>

            {{-- Divider --}}
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-200"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-white text-gray-500">atau Login dengan Email</span>
                </div>
            </div>

            {{-- Login Form --}}
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                {{-- Email Field --}}
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-900 mb-2">Email</label>
                    <input id="email" name="email" type="email" required placeholder="Masukkan email Anda"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-pink-500 focus:ring-2 focus:ring-pink-500 text-sm placeholder-gray-400 transition-colors"
                        {{ old('email') }} />
                    @error('email')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password Field --}}
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-900 mb-2">Password</label>
                    <div class="relative">
                        <input id="password" name="password" type="password" required
                            placeholder="Masukkan password Anda"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-pink-500 focus:ring-2 focus:ring-pink-500 text-sm placeholder-gray-400 pr-12 transition-colors" />
                        <button type="button" id="togglePass"
                            class="absolute inset-y-0 right-0 px-4 flex items-center text-gray-400 hover:text-gray-600 transition-colors"
                            aria-label="Tampilkan password">
                            <svg id="eyeIcon" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke-width="1.8" d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7Z" />
                                <circle cx="12" cy="12" r="3" stroke-width="1.8" />
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                    <div class="mt-2 text-right">
                        <a href="#"
                            class="text-sm text-pink-600 hover:text-pink-700 font-medium transition-colors">Lupa
                            sandi?</a>
                    </div>
                </div>

                <button type="submit"
                    class="w-full inline-flex justify-center items-center rounded-xl bg-pink-600 text-white font-semibold py-3 hover:bg-pink-700 transition">
                    Login
                </button>
            </form>

            <p class="text-center text-sm text-gray-600 mt-6">
                Belum punya akun?
                <a href="{{ route('register') }}"
                    class="font-semibold text-pink-600 hover:text-pink-700 transition-colors">Daftar</a>
            </p>
        </div>
    </div>

    <script>
        (function() {
            const input = document.getElementById('password');
            const btn = document.getElementById('togglePass');
            const icon = document.getElementById('eyeIcon');
            if (!btn) return;
            btn.addEventListener('click', () => {
                const showing = input.type === 'text';
                input.type = showing ? 'password' : 'text';
                btn.setAttribute('aria-label', showing ? 'Tampilkan password' : 'Sembunyikan password');
                icon.innerHTML = showing ?
                    '<path stroke-width="1.8" d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7Z"/><circle cx="12" cy="12" r="3" stroke-width="1.8"/>' :
                    '<path stroke-width="1.8" d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7Z"/><circle cx="12" cy="12" r="3" stroke-width="1.8"/><path stroke-width="1.8" d="M3 3l18 18"/>';
            });
        })();
    </script>
</body>

</html>
