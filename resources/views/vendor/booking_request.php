<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Request - WeddingMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    
    <div class="flex min-h-screen">
        
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md fixed h-full">
            
            <!-- Logo & Brand -->
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-pink-500 rounded-xl flex items-center justify-center">
                        <i class="fas fa-box text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-gray-800">Vendor Panel</h1>
                    </div>
                    <button class="ml-auto text-gray-600 hover:text-gray-800">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Menu Navigation -->
            <nav class="p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="#" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition">
                            <i class="fas fa-th-large w-5"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition">
                            <i class="fas fa-box w-5"></i>
                            <span>Produk Saya</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition">
                            <i class="fas fa-user w-5"></i>
                            <span>Profile Usaha</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-3 px-4 py-3 text-pink-500 bg-pink-50 rounded-lg transition">
                            <i class="fas fa-calendar-check w-5"></i>
                            <span>Booking Request</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-3 px-4 py-3 text-red-500 hover:bg-red-50 rounded-lg transition">
                            <i class="fas fa-sign-out-alt w-5"></i>
                            <span>Keluar</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- User Profile at Bottom -->
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-200 bg-pink-500">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-pink-500"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-white">Sari Dewi</p>
                        <p class="text-xs text-pink-100">Venue</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64">
            
            <!-- Top Bar -->
            <header class="bg-white shadow-sm sticky top-0 z-10 border-b border-gray-200">
                <div class="flex items-center justify-between px-8 py-4">
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-800">Booking Request</h2>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button class="relative hover:scale-110 transition">
                            <i class="fas fa-bell text-gray-600 text-xl"></i>
                            <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Content Area -->
            <div class="p-8">
                
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <!-- Pending -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border-l-4 border-yellow-400">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Pending</p>
                                <h3 class="text-3xl font-bold text-gray-900">1</h3>
                            </div>
                            <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-clock text-yellow-500 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Approved -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border-l-4 border-green-400">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Approved</p>
                                <h3 class="text-3xl font-bold text-gray-900">1</h3>
                            </div>
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-check-circle text-green-500 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Rejected -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border-l-4 border-red-400">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Rejected</p>
                                <h3 class="text-3xl font-bold text-gray-900">1</h3>
                            </div>
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-times-circle text-red-500 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Booking List -->
                <div class="space-y-4">
                    
                    <!-- Booking Item 1 - Pending -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                        <div class="p-6">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-gray-600"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900">Rina & Ahmad</h3>
                                        <p class="text-xs text-gray-500">08123456789</p>
                                    </div>
                                </div>
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-medium rounded-full">Menunggu</span>
                            </div>

                            <div class="bg-blue-50 rounded-lg p-4 mb-4">
                                <p class="text-xs text-gray-500 mb-2">Produk</p>
                                <h4 class="font-bold text-gray-900 mb-2">Grand Ballroom Crystal Palace</h4>
                                <div class="flex items-center space-x-4 text-xs text-gray-600 mb-2">
                                    <div class="flex items-center space-x-1">
                                        <i class="fas fa-calendar"></i>
                                        <span>Tanggal Acara</span>
                                    </div>
                                    <span class="font-medium">15/12/2025</span>
                                </div>
                                <div class="flex items-center space-x-4 text-xs text-gray-600">
                                    <div class="flex items-center space-x-1">
                                        <i class="fas fa-comment"></i>
                                        <span>Pesan</span>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-700 mt-1">Kami tertarik dengan venue ini, apakah paket termasuk katering?</p>
                            </div>

                            <div class="flex space-x-3">
                                <button class="flex-1 bg-green-500 hover:bg-green-600 text-white py-2.5 rounded-lg text-sm font-medium transition flex items-center justify-center space-x-2">
                                    <i class="fas fa-check"></i>
                                    <span>Setuju</span>
                                </button>
                                <button class="flex-1 bg-white hover:bg-pink-50 text-pink-500 py-2.5 rounded-lg text-sm font-medium transition flex items-center justify-center space-x-2 border border-pink-300">
                                    <i class="fas fa-times"></i>
                                    <span>Tolak</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Item 2 - Approved -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                        <div class="p-6">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-gray-600"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900">Siti & Budi</h3>
                                        <p class="text-xs text-gray-500">08198765432</p>
                                    </div>
                                </div>
                                <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">Disetujui</span>
                            </div>

                            <div class="bg-blue-50 rounded-lg p-4 mb-4">
                                <p class="text-xs text-gray-500 mb-2">Produk</p>
                                <h4 class="font-bold text-gray-900 mb-2">Garden Wedding Package Premium</h4>
                                <div class="flex items-center space-x-4 text-xs text-gray-600 mb-2">
                                    <div class="flex items-center space-x-1">
                                        <i class="fas fa-calendar"></i>
                                        <span>Tanggal Acara</span>
                                    </div>
                                    <span class="font-medium">20/01/2026</span>
                                </div>
                                <div class="flex items-center space-x-4 text-xs text-gray-600">
                                    <div class="flex items-center space-x-1">
                                        <i class="fas fa-comment"></i>
                                        <span>Pesan</span>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-700 mt-1">Mohon info detail terkait wedding outdoor yang tersedia.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Item 3 - Rejected -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                        <div class="p-6">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-gray-600"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900">Dewi & Andi</h3>
                                        <p class="text-xs text-gray-500">08234567890</p>
                                    </div>
                                </div>
                                <span class="px-3 py-1 bg-red-100 text-red-700 text-xs font-medium rounded-full">Ditolak</span>
                            </div>

                            <div class="bg-blue-50 rounded-lg p-4 mb-4">
                                <p class="text-xs text-gray-500 mb-2">Produk</p>
                                <h4 class="font-bold text-gray-900 mb-2">Rooftop Sunset Venue</h4>
                                <div class="flex items-center space-x-4 text-xs text-gray-600 mb-2">
                                    <div class="flex items-center space-x-1">
                                        <i class="fas fa-calendar"></i>
                                        <span>Tanggal Acara</span>
                                    </div>
                                    <span class="font-medium">25/10/2025</span>
                                </div>
                                <div class="flex items-center space-x-4 text-xs text-gray-600">
                                    <div class="flex items-center space-x-1">
                                        <i class="fas fa-comment"></i>
                                        <span>Pesan</span>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-700 mt-1">Apakah tersedia untuk tanggal ini?</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </main>

    </div>

</body>
</html>