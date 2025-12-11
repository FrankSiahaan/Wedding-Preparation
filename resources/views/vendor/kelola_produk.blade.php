<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk - WeddingMart</title>
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
                        <a href="#"
                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition">
                            <i class="fas fa-th-large w-5"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition">
                            <i class="fas fa-box w-5"></i>
                            <span>Produk Saya</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition">
                            <i class="fas fa-user w-5"></i>
                            <span>Profile Usaha</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition">
                            <i class="fas fa-calendar-check w-5"></i>
                            <span>Daftar Pesanan</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center space-x-3 px-4 py-3 text-red-500 hover:bg-red-50 rounded-lg transition">
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
                        <p class="text-sm font-medium text-white"><?php echo auth()->user()->name; ?></p>
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
                        <h2 class="text-2xl font-semibold text-gray-800">Kelola Produk</h2>
                        <p class="text-sm text-gray-500">Atur dan kelola produk Anda</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button class="relative hover:scale-110 transition">
                            <i class="fas fa-bell text-gray-600 text-xl"></i>
                            <span
                                class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">2</span>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Content Area -->
            <div class="p-8">

                <!-- Action Button -->
                <div class="flex justify-end mb-6">
                    <button
                        class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-2.5 rounded-lg font-medium shadow-md transition flex items-center space-x-2">
                        <i class="fas fa-plus"></i>
                        <span>Tambah Produk</span>
                    </button>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

                    <!-- Product Card 1 -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition flex flex-col">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1519167758481-83f29da8c2b6?w=400&h=300&fit=crop"
                                alt="Grand Ballroom" class="w-full h-48 object-cover">
                            <span
                                class="absolute top-3 right-3 bg-green-500 text-white text-xs px-3 py-1 rounded-full font-medium">Aktif</span>
                        </div>
                        <div class="p-4 flex flex-col flex-grow">
                            <div class="mb-3">
                                <div class="flex items-start mb-2">
                                    <i class="fas fa-home text-gray-700 text-base mr-2 mt-1"></i>
                                    <h3 class="text-sm font-bold text-gray-900 leading-tight">Grand Ballroom Crystal
                                        Palace</h3>
                                </div>
                                <p class="text-sm text-gray-600 leading-relaxed h-10">Ballroom mewah dengan kapasitas
                                    500 tamu. Dilengkapi dengan crystal...</p>
                            </div>

                            <!-- Stats -->
                            <div class="flex items-center space-x-3 text-sm text-gray-600 mb-4">
                                <div class="flex items-center space-x-1">
                                    <i class="fas fa-eye"></i>
                                    <span>1245</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <i class="fas fa-calendar"></i>
                                    <span>23</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <span>4.8</span>
                                </div>
                            </div>

                            <!-- Price -->
                            <p class="text-lg font-bold text-pink-500 mb-4">Rp 25.000.000</p>

                            <!-- Action Buttons -->
                            <div class="flex space-x-3 mt-auto">
                                <button
                                    class="flex-1 bg-white hover:bg-gray-50 text-gray-700 py-2.5 rounded-lg text-sm font-medium transition flex items-center justify-center space-x-2 border border-gray-300">
                                    <i class="fas fa-pen-to-square"></i>
                                    <span>Edit</span>
                                </button>
                                <button
                                    class="flex-1 bg-white hover:bg-pink-50 text-pink-500 py-2.5 rounded-lg text-sm font-medium transition flex items-center justify-center space-x-2 border border-pink-300">
                                    <i class="fas fa-trash"></i>
                                    <span>Hapus</span>
                                </button>
                            </div>
                        </div>
                    </div>


                    <!-- Product Card 2 -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition flex flex-col">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?w=400&h=300&fit=crop"
                                alt="Garden Wedding" class="w-full h-48 object-cover">
                            <span
                                class="absolute top-3 right-3 bg-green-500 text-white text-xs px-3 py-1 rounded-full font-medium">Aktif</span>
                        </div>
                        <div class="p-4 flex flex-col flex-grow">
                            <div class="mb-3">
                                <div class="flex items-start mb-2">
                                    <i class="fas fa-home text-gray-700 text-base mr-2 mt-1"></i>
                                    <h3 class="text-sm font-bold text-gray-900 leading-tight">Garden Wedding Package
                                        Premium</h3>
                                </div>
                                <p class="text-sm text-gray-600 leading-relaxed h-10">Venue outdoor dengan taman yang
                                    indah. Cocok untuk wedding intimate...</p>
                            </div>

                            <!-- Stats -->
                            <div class="flex items-center space-x-3 text-sm text-gray-600 mb-4">
                                <div class="flex items-center space-x-1">
                                    <i class="fas fa-eye"></i>
                                    <span>892</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <i class="fas fa-calendar"></i>
                                    <span>15</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <span>4.9</span>
                                </div>
                            </div>

                            <!-- Price -->
                            <p class="text-lg font-bold text-pink-500 mb-4">Rp 18.000.000</p>

                            <!-- Action Buttons -->
                            <div class="flex space-x-3 mt-auto">
                                <button
                                    class="flex-1 bg-white hover:bg-gray-50 text-gray-700 py-2.5 rounded-lg text-sm font-medium transition flex items-center justify-center space-x-2 border border-gray-300">
                                    <i class="fas fa-pen-to-square"></i>
                                    <span>Edit</span>
                                </button>
                                <button
                                    class="flex-1 bg-white hover:bg-pink-50 text-pink-500 py-2.5 rounded-lg text-sm font-medium transition flex items-center justify-center space-x-2 border border-pink-300">
                                    <i class="fas fa-trash"></i>
                                    <span>Hapus</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 3 -->
                    <div
                        class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition flex flex-col">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1478146896981-b80fe463b330?w=400&h=300&fit=crop"
                                alt="Rooftop Sunset" class="w-full h-48 object-cover">
                            <span
                                class="absolute top-3 right-3 bg-green-500 text-white text-xs px-3 py-1 rounded-full font-medium">Aktif</span>
                        </div>
                        <div class="p-4 flex flex-col flex-grow">
                            <div class="mb-3">
                                <div class="flex items-start mb-2">
                                    <i class="fas fa-home text-gray-700 text-base mr-2 mt-1"></i>
                                    <h3 class="text-sm font-bold text-gray-900 leading-tight">Rooftop Sunset Venue</h3>
                                </div>
                                <p class="text-sm text-gray-600 leading-relaxed h-10">Venue rooftop dengan pemandangan
                                    sunset yang mempesona, kapasitas 15...</p>
                            </div>

                            <!-- Stats -->
                            <div class="flex items-center space-x-3 text-sm text-gray-600 mb-4">
                                <div class="flex items-center space-x-1">
                                    <i class="fas fa-eye"></i>
                                    <span>456</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <i class="fas fa-calendar"></i>
                                    <span>10</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <span>4.7</span>
                                </div>
                            </div>

                            <!-- Price -->
                            <p class="text-lg font-bold text-pink-500 mb-4">Rp 15.000.000</p>

                            <!-- Action Buttons -->
                            <div class="flex space-x-3 mt-auto">
                                <button
                                    class="flex-1 bg-white hover:bg-gray-50 text-gray-700 py-2.5 rounded-lg text-sm font-medium transition flex items-center justify-center space-x-2 border border-gray-300">
                                    <i class="fas fa-pen-to-square"></i>
                                    <span>Edit</span>
                                </button>
                                <button
                                    class="flex-1 bg-white hover:bg-pink-50 text-pink-500 py-2.5 rounded-lg text-sm font-medium transition flex items-center justify-center space-x-2 border border-pink-300">
                                    <i class="fas fa-trash"></i>
                                    <span>Hapus</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 4 -->
                    <div
                        class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition flex flex-col">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=400&h=300&fit=crop"
                                alt="Beach Wedding" class="w-full h-48 object-cover">
                            <span
                                class="absolute top-3 right-3 bg-green-500 text-white text-xs px-3 py-1 rounded-full font-medium">Aktif</span>
                        </div>
                        <div class="p-4 flex flex-col flex-grow">
                            <div class="mb-3">
                                <div class="flex items-start mb-2">
                                    <i class="fas fa-home text-gray-700 text-base mr-2 mt-1"></i>
                                    <h3 class="text-sm font-bold text-gray-900 leading-tight">Beach Wedding Paradise
                                    </h3>
                                </div>
                                <p class="text-sm text-gray-600 leading-relaxed h-10">Venue pantai dengan pemandangan
                                    laut yang menawan. Kapasitas 200 tamu...</p>
                            </div>

                            <!-- Stats -->
                            <div class="flex items-center space-x-3 text-sm text-gray-600 mb-4">
                                <div class="flex items-center space-x-1">
                                    <i class="fas fa-eye"></i>
                                    <span>678</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <i class="fas fa-calendar"></i>
                                    <span>18</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <span>4.6</span>
                                </div>
                            </div>

                            <!-- Price -->
                            <p class="text-lg font-bold text-pink-500 mb-4">Rp 20.000.000</p>

                            <!-- Action Buttons -->
                            <div class="flex space-x-3 mt-auto">
                                <button
                                    class="flex-1 bg-white hover:bg-gray-50 text-gray-700 py-2.5 rounded-lg text-sm font-medium transition flex items-center justify-center space-x-2 border border-gray-300">
                                    <i class="fas fa-pen-to-square"></i>
                                    <span>Edit</span>
                                </button>
                                <button
                                    class="flex-1 bg-white hover:bg-pink-50 text-pink-500 py-2.5 rounded-lg text-sm font-medium transition flex items-center justify-center space-x-2 border border-pink-300">
                                    <i class="fas fa-trash"></i>
                                    <span>Hapus</span>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </main>

    </div>

</body>

</html>
