<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Profile - WeddingMart</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-dvh bg-gray-50 text-gray-900 font-sans">

    {{-- HEADER --}}
    <header class="bg-white sticky top-0 z-50 border-b border-gray-100">
        <div class="container mx-auto px-4 max-w-7xl">
            <nav class="flex items-center justify-between h-14">
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 shrink-0">
                    <div class="w-8 h-8 rounded-full grid place-items-center bg-yellow-50 ring-1 ring-yellow-100">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="#C7A434" stroke-width="1.5">
                            <path
                                d="M12 21s-6.716-4.319-9.192-8.055C1.113 10.16 2.02 7.5 4.41 6.5 6.08 5.8 7.93 6.3 9 7.6c1.07-1.3 2.92-1.8 4.59-1.1 2.39 1 3.3 3.66 1.6 6.45C18.72 16.68 12 21 12 21Z" />
                        </svg>
                    </div>
                    <div class="leading-tight">
                        <div class="text-base font-semibold text-gray-900">WeddingMart</div>
                        <div class="text-[10px] text-gray-500 -mt-0.5">Marketplace Pernikahan Terpercaya</div>
                    </div>
                </a>

                <div class="flex items-center gap-3">
                    <a href="{{ route('user.orders') }}"
                        class="grid place-items-center w-8 h-8 rounded-full border border-gray-200 text-gray-700 hover:bg-gray-50">
                        <svg class="w-4.5 h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.6">
                            <path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </a>
                    <a href="{{ route('cart.index') }}"
                        class="grid place-items-center w-8 h-8 rounded-full border border-gray-200 text-gray-700 hover:bg-gray-50">
                        <svg class="w-4.5 h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.6">
                            <path d="M6 6h15l-1.5 9h-12L6 6Z" />
                            <path d="M6 6l-1-3H2" />
                            <circle cx="9.5" cy="20" r="1.4" />
                            <circle cx="17.5" cy="20" r="1.4" />
                        </svg>
                    </a>
                    <a href="{{ route('user.profile') }}"
                        class="flex items-center gap-1.5 pl-1.5 pr-2.5 py-1 rounded-full border border-pink-100 bg-pink-50/60">
                        <span class="grid place-items-center w-6.5 h-6.5 rounded-full bg-pink-100 text-pink-700">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.6">
                                <circle cx="12" cy="8.4" r="3.1" />
                                <path d="M4 20a8 8 0 0 1 16 0" />
                            </svg>
                        </span>
                        <span class="text-[13px] text-gray-700">{{ $user->name }}</span>
                    </a>
                </div>
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-4 max-w-7xl py-6">
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-50 border border-green-200 rounded-lg text-green-700 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid lg:grid-cols-4 gap-6">
            {{-- Sidebar --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg border border-gray-100 p-4">
                    <div class="text-center mb-4">
                        <div class="w-20 h-20 mx-auto rounded-full bg-pink-100 grid place-items-center mb-3">
                            <svg class="w-10 h-10 text-pink-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-900">{{ $user->name }}</h3>
                        <p class="text-xs text-gray-500">{{ $user->email }}</p>
                    </div>

                    <nav class="space-y-1">
                        <a href="{{ route('user.profile') }}"
                            class="flex items-center gap-2 px-3 py-2 bg-pink-50 text-pink-600 rounded-lg text-sm font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Profile Saya
                        </a>
                        <a href="{{ route('user.orders') }}"
                            class="flex items-center gap-2 px-3 py-2 text-gray-700 hover:bg-gray-50 rounded-lg text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            Pesanan Saya
                        </a>
                        <a href="{{ route('user.addresses') }}"
                            class="flex items-center gap-2 px-3 py-2 text-gray-700 hover:bg-gray-50 rounded-lg text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Alamat Saya
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center gap-2 px-3 py-2 text-red-600 hover:bg-red-50 rounded-lg text-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Keluar
                            </button>
                        </form>
                    </nav>
                </div>
            </div>

            {{-- Main Content --}}
            <div class="lg:col-span-3">
                <div class="bg-white rounded-lg border border-gray-100 p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold text-gray-900">Profile Saya</h2>
                        <a href="{{ route('user.profile.edit') }}"
                            class="px-4 py-2 bg-pink-600 hover:bg-pink-700 text-white text-sm font-medium rounded-lg transition-colors">
                            Edit Profile
                        </a>
                    </div>

                    <div class="space-y-4">
                        <div class="grid grid-cols-3 gap-4">
                            <div class="text-sm text-gray-500">Nama Lengkap</div>
                            <div class="col-span-2 text-sm font-medium text-gray-900">{{ $user->name }}</div>
                        </div>

                        <div class="grid grid-cols-3 gap-4">
                            <div class="text-sm text-gray-500">Email</div>
                            <div class="col-span-2 text-sm font-medium text-gray-900">{{ $user->email }}</div>
                        </div>

                        <div class="grid grid-cols-3 gap-4">
                            <div class="text-sm text-gray-500">No. Telepon</div>
                            <div class="col-span-2 text-sm font-medium text-gray-900">
                                {{ $user->phone ?? '-' }}
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-4">
                            <div class="text-sm text-gray-500">Tanggal Bergabung</div>
                            <div class="col-span-2 text-sm font-medium text-gray-900">
                                {{ $user->created_at->format('d F Y') }}
                            </div>
                        </div>

                        <div class="border-t border-gray-100 my-4"></div>

                        <div class="grid grid-cols-3 gap-4">
                            <div class="text-sm text-gray-500">Alamat</div>
                            <div class="col-span-2">
                                @if ($user->addresses && $user->addresses->isNotEmpty())
                                    @php
                                        $primaryAddress =
                                            $user->addresses->where('is_primary', true)->first() ??
                                            $user->addresses->first();
                                    @endphp
                                    <div class="text-sm font-medium text-gray-900 mb-2">
                                        {{ $primaryAddress->recipient_name }}
                                        <span class="text-xs text-gray-500">({{ $primaryAddress->phone }})</span>
                                    </div>
                                    <div class="text-sm text-gray-700">
                                        {{ $primaryAddress->address_line1 }}
                                        @if ($primaryAddress->address_line2)
                                            <br>{{ $primaryAddress->address_line2 }}
                                        @endif
                                        <br>{{ $primaryAddress->city }}, {{ $primaryAddress->province }}
                                        {{ $primaryAddress->postal_code }}
                                    </div>
                                    @if ($primaryAddress->is_primary)
                                        <span
                                            class="inline-block mt-2 px-2 py-1 bg-pink-50 text-pink-600 text-xs font-medium rounded">
                                            Alamat Utama
                                        </span>
                                    @endif
                                @else
                                    <div class="text-sm text-gray-500">
                                        Belum ada alamat tersimpan
                                    </div>
                                @endif
                                <a href="{{ route('user.addresses') }}"
                                    class="inline-block mt-3 text-sm text-pink-600 hover:text-pink-700 font-medium">
                                    Kelola Alamat →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Stats Cards --}}
                <div class="grid grid-cols-3 gap-4 mt-6">
                    <div class="bg-white rounded-lg border border-gray-100 p-4 text-center">
                        <div class="text-2xl font-bold text-gray-900 mb-1">0</div>
                        <div class="text-xs text-gray-500">Total Pesanan</div>
                    </div>
                    <div class="bg-white rounded-lg border border-gray-100 p-4 text-center">
                        <div class="text-2xl font-bold text-gray-900 mb-1">0</div>
                        <div class="text-xs text-gray-500">Menunggu Konfirmasi</div>
                    </div>
                    <div class="bg-white rounded-lg border border-gray-100 p-4 text-center">
                        <div class="text-2xl font-bold text-gray-900 mb-1">0</div>
                        <div class="text-xs text-gray-500">Selesai</div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-white border-t mt-12">
        <div class="container mx-auto px-4 max-w-7xl py-3 text-center text-xs text-gray-500">
            &copy; {{ now()->year }} WeddingMart • Marketplace Persiapan Pernikahan Terpercaya
        </div>
    </footer>

</body>

</html>
