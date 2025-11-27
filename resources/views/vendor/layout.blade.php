<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title') - Vendor Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('styles')
</head>

<body class="min-h-dvh bg-gray-50 text-gray-900 font-sans">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg border-r border-gray-100 fixed left-0 top-0 h-screen flex flex-col">

            <!-- Logo -->
            <div class="p-6 border-b border-gray-100 flex-shrink-0">
                <div class="flex items-center gap-2.5">
                    <div class="w-10 h-10 rounded-full grid place-items-center bg-pink-50 ring-1 ring-pink-100">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="#EC4899" stroke-width="1.5">
                            <path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <span class="text-lg font-bold text-gray-800">Vendor Panel</span>
                </div>
            </div>

            <!-- Navigation Menu -->
            <nav class="p-4 flex-1 overflow-y-auto">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('vendor.dashboard') }}"
                            class="flex items-center gap-3 px-4 py-3 {{ Request::routeIs('vendor.dashboard') ? 'bg-pink-50 text-pink-700 font-medium' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('vendor.products') }}"
                            class="flex items-center gap-3 px-4 py-3 {{ Request::routeIs('vendor.products*') ? 'bg-pink-50 text-pink-700 font-medium' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                            <span>Produk Saya</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('vendor.profile') }}"
                            class="flex items-center gap-3 px-4 py-3 {{ Request::routeIs('vendor.profile*') ? 'bg-pink-50 text-pink-700 font-medium' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span>Profil Usaha</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('vendor.bookings') }}"
                            class="flex items-center gap-3 px-4 py-3 {{ Request::routeIs('vendor.bookings*') ? 'bg-pink-50 text-pink-700 font-medium' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            <span>Booking Request</span>
                        </a>
                    </li>
                    <li class="pt-2 border-t border-gray-100">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center gap-3 px-4 py-3 text-red-500 hover:bg-red-50 rounded-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <span>Keluar</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>

            <!-- User Profile at Bottom -->
            <div class="p-4 border-t border-gray-100 bg-pink-50 flex-shrink-0">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-pink-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-pink-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="8.4" r="3.1" />
                            <path d="M4 20a8 8 0 0 1 16 0" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-900 font-medium text-sm truncate">{{ auth()->user()->name }}</p>
                        <p class="text-gray-600 text-xs">{{ $vendor->name ?? 'Vendor' }}</p>
                    </div>
                </div>
            </div>

        </aside>

        <!-- Main Content -->
        <main class="flex-1 bg-gray-50 ml-64">

            <!-- Header -->
            <header class="bg-white border-b border-gray-100">
                <div class="flex items-center justify-between px-8 py-5">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">@yield('page-title')</h1>
                        <p class="text-sm text-gray-500 mt-0.5">@yield('page-subtitle')</p>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-8">
                <!-- Success Message -->
                @if (session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                <!-- Error Message -->
                @if (session('error'))
                    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ session('error') }}
                        </div>
                    </div>
                @endif

                @yield('content')
            </div>

        </main>

    </div>

    @yield('scripts')

</body>

</html>
