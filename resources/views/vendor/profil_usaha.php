<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Usaha - WeddingMart</title>
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
                        <a href="#" class="flex items-center space-x-3 px-4 py-3 text-pink-500 bg-pink-50 rounded-lg transition">
                            <i class="fas fa-user w-5"></i>
                            <span>Profile Usaha</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition">
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
                        <h2 class="text-2xl font-semibold text-gray-800">Profile Usaha</h2>
                        <p class="text-sm text-gray-500">Kelola informasi usaha Anda</p>
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

                <!-- Profile Form -->
                <div class="bg-white rounded-xl shadow-sm p-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-6">Informasi Usaha</h3>

                    <!-- Photo Upload -->
                    <div class="mb-8">
                        <div class="flex items-center space-x-6">
                            <div class="w-24 h-24 rounded-2xl overflow-hidden bg-gray-900 flex items-center justify-center">
                                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=200&h=200&fit=crop" alt="Profile" class="w-full h-full object-cover">
                            </div>
                            <button class="px-6 py-2.5 border-2 border-pink-500 text-pink-500 rounded-lg hover:bg-pink-50 transition flex items-center space-x-2 font-medium">
                                <i class="fas fa-camera"></i>
                                <span>Ganti Foto</span>
                            </button>
                        </div>
                    </div>

                    <!-- Form Fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Nama Usaha -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Usaha</label>
                            <input type="text" value="<?php echo auth()->user()->name; ?>" class="w-full px-4 py-3 bg-pink-50 border border-pink-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 text-gray-700">
                        </div>

                        <!-- Kategori -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                            <input type="text" value="Venue" class="w-full px-4 py-3 bg-pink-50 border border-pink-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 text-gray-700">
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" value="info@weddingparadise.com" class="w-full px-4 py-3 bg-pink-50 border border-pink-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 text-gray-700">
                        </div>

                        <!-- Nomor Telepon -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                            <input type="tel" value="+62 818-2244-5900" class="w-full px-4 py-3 bg-pink-50 border border-pink-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 text-gray-700">
                        </div>

                        <!-- Alamat Usaha (Full Width) -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Usaha</label>
                            <input type="text" value="Indonesia" class="w-full px-4 py-3 bg-pink-50 border border-pink-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 text-gray-700">
                        </div>

                        <!-- Deskripsi Usaha (Full Width) -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Usaha</label>
                            <textarea rows="4" class="w-full px-4 py-3 bg-pink-50 border border-pink-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 text-gray-700 resize-none">Venue Premium Gokil Abizzz</textarea>
                        </div>

                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-4 mt-8">
                        <button class="flex-1 bg-white hover:bg-pink-50 text-pink-500 py-3 rounded-lg text-sm font-medium transition border-2 border-pink-200">
                            Batal
                        </button>
                        <button class="flex-1 bg-green-500 hover:bg-green-600 text-white py-3 rounded-lg text-sm font-medium transition shadow-md">
                            Simpan Perubahan
                        </button>
                    </div>

                </div>

            </div>

        </main>

    </div>

</body>

</html>