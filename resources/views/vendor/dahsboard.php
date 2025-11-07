<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Vendor Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    
    <div class="flex min-h-screen">
        
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg">
            
            <!-- Logo -->
            <div class="p-6 border-b">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-red-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-box text-white text-lg"></i>
                    </div>
                    <span class="text-lg font-bold text-gray-800">Vendor Panel</span>
                </div>
            </div>

            <!-- Navigation Menu -->
            <nav class="p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="#" class="flex items-center space-x-3 px-4 py-3 bg-gray-100 text-gray-900 rounded-lg font-medium">
                            <i class="fas fa-th-large"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                            <i class="fas fa-box"></i>
                            <span>Produk Saya</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                            <i class="fas fa-user"></i>
                            <span>Profile Usaha</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                            <i class="fas fa-calendar-check"></i>
                            <span>Booking Request</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-3 px-4 py-3 text-red-500 hover:bg-red-50 rounded-lg">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Keluar</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- User Profile at Bottom -->
            <div class="absolute bottom-0 left-0 w-64 p-4 border-t bg-pink-400">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                        <span class="text-pink-500 font-bold">SD</span>
                    </div>
                    <div class="flex-1">
                        <p class="text-white font-medium text-sm">Sari Dewi</p>
                        <p class="text-white text-xs opacity-90">Venue</p>
                    </div>
                </div>
            </div>

        </aside>

        <!-- Main Content -->
        <main class="flex-1">
            
            <!-- Header -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between px-8 py-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
                        <p class="text-sm text-gray-500">Ringkasan performa bisnis Anda</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button class="relative">
                            <i class="fas fa-bell text-gray-600 text-xl"></i>
                            <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">2</span>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="p-6">
                <div class="space-y-3 max-w-2xl">
                    
                    <!-- Total Produk Card -->
                    <div class="bg-white rounded-lg shadow-sm p-4">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <p class="text-gray-500 text-xs mb-0.5">Total Produk</p>
                                <h2 class="text-xl font-bold text-gray-900">3</h2>
                                <p class="text-green-500 text-xs font-medium">2 Aktif</p>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button class="text-gray-600 text-xs hover:underline">Masuk</button>
                                <div class="w-11 h-11 bg-blue-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-box text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Pesanan Card -->
                    <div class="bg-white rounded-lg shadow-sm p-4">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <p class="text-gray-500 text-xs mb-0.5">Total Pesanan</p>
                                <h2 class="text-xl font-bold text-gray-900">46</h2>
                                <p class="text-green-500 text-xs font-medium">+12% bulan ini</p>
                            </div>
                            <div class="w-11 h-11 bg-green-400 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-shopping-bag text-white"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Pendapatan Card -->
                    <div class="bg-white rounded-lg shadow-sm p-4">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <p class="text-gray-500 text-xs mb-0.5">Pendapatan</p>
                                <h2 class="text-xl font-bold text-gray-900">Rp965.000.000</h2>
                                <p class="text-green-500 text-xs font-medium">+8% bulan ini</p>
                            </div>
                            <div class="w-11 h-11 bg-pink-300 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-dollar-sign text-white"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </main>

    </div>

</body>
</html>