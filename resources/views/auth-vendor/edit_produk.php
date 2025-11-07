<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - WeddingMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    
    <div class="min-h-screen py-8">
        <div class="max-w-2xl mx-auto px-4">
            
            <!-- Header -->
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Edit Produk</h1>
                <p class="text-sm text-gray-500">Lengkapi informasi produk Anda dengan detail</p>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                
                <form action="#" method="POST" enctype="multipart/form-data">
                    <p class="text-sm text-gray-500">Lengkapi informasi produk Anda dengan detail</p>
                </div>

                <form>
                    
                    
                    <!-- Foto Produk -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Foto Produk <span class="text-red-500">*</span>
                        </label>
                        <div class="rounded-lg overflow-hidden" id="imageContainer">
                            <img src="https://images.unsplash.com/photo-1519167758481-83f29da8ae8d?w=800" alt="Grand Ballroom" class="w-full h-64 object-cover" id="productImage">
                        </div>
                        <input type="file" name="image" id="imageInput" class="hidden" accept="image/*">
                    </div>

                    <!-- Nama Produk -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Produk <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" value="Grand Ballroom Crystal Palace" class="w-full px-4 py-3 bg-pink-50 border border-pink-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 text-gray-700">
                    </div>

                    <!-- Harga -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Harga (IDR) <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="price" value="250000000" class="w-full px-4 py-3 bg-pink-50 border border-pink-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 text-gray-700">
                    </div>

                    <!-- Status -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <div class="flex items-center space-x-2">
                            <div class="relative inline-block w-12 h-6 transition duration-200 ease-in-out">
                                <input type="checkbox" name="status" id="status-toggle" value="1" checked class="absolute w-12 h-6 transition-colors duration-300 rounded-full appearance-none cursor-pointer peer bg-gray-300 checked:bg-pink-500 peer-checked:border-pink-500 peer-checked:before:translate-x-full before:inline-block before:w-5 before:h-5 before:transform before:rounded-full before:bg-white before:shadow before:transition before:duration-300 before:absolute before:top-0.5 before:left-0.5">
                            </div>
                            <label for="status-toggle" class="text-sm font-medium text-pink-500 cursor-pointer">Aktif</label>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi <span class="text-red-500">*</span>
                        </label>
                        <textarea name="description" rows="3" class="w-full px-4 py-3 bg-pink-50 border border-pink-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 text-gray-700 resize-none">Ballroom mewah dengan kapasitas 500 tamu. Dilengkapi dengan crystal chandelier dan stage premium.</textarea>
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-gray-200 my-6"></div>

                    <!-- Informasi Venue Section -->
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Venue</h3>

                    <!-- Tipe Venue -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tipe Venue</label>
                        <input type="text" name="venue_type" value="Indoor" class="w-full px-4 py-3 bg-pink-50 border border-pink-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 text-gray-700">
                    </div>

                    <!-- Kapasitas Tamu -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kapasitas Tamu</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500">
                                <i class="fas fa-users"></i>
                            </span>
                            <input type="number" name="capacity" value="500" class="w-full pl-12 pr-4 py-3 bg-pink-50 border border-pink-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 text-gray-700">
                        </div>
                    </div>

                    <!-- Lokasi -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                            <input type="text" name="location" value="Jakarta Selatan" class="w-full pl-12 pr-4 py-3 bg-pink-50 border border-pink-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 text-gray-700">
                        </div>
                    </div>

                    <!-- Fasilitas -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-3">Fasilitas</label>
                        <div class="grid grid-cols-2 gap-3">
                            <button type="button" data-facility="AC" class="facility-btn px-4 py-3 bg-gray-50 text-gray-700 rounded-lg text-sm font-medium border border-gray-200">
                                AC
                            </button>
                            <button type="button" data-facility="Sound System" class="facility-btn px-4 py-3 bg-gray-50 text-gray-700 rounded-lg text-sm font-medium border border-gray-200">
                                Sound System
                            </button>
                            <button type="button" data-facility="Proyektor" class="facility-btn px-4 py-3 bg-gray-50 text-gray-700 rounded-lg text-sm font-medium border border-gray-200">
                                Proyektor
                            </button>
                            <button type="button" data-facility="WiFi" class="facility-btn px-4 py-3 bg-gray-50 text-gray-700 rounded-lg text-sm font-medium border border-gray-200">
                                WiFi
                            </button>
                            <button type="button" data-facility="Parking" class="facility-btn px-4 py-3 bg-gray-50 text-gray-700 rounded-lg text-sm font-medium border border-gray-200">
                                Parking
                            </button>
                            <button type="button" data-facility="Katering Area" class="facility-btn px-4 py-3 bg-gray-50 text-gray-700 rounded-lg text-sm font-medium border border-gray-200">
                                Katering Area
                            </button>
                            <button type="button" class="px-4 py-3 bg-pink-50 text-pink-500 rounded-lg text-sm font-medium border border-pink-200">
                                Bridal Room
                            </button>
                            <button type="button" class="px-4 py-3 bg-gray-100 hover:bg-pink-50 text-gray-700 hover:text-pink-500 rounded-lg text-sm font-medium transition border border-gray-200 hover:border-pink-300">
                                Stage
                            </button>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-3 mt-8">
                        <button type="button" class="flex-1 bg-white hover:bg-pink-50 text-pink-500 py-3 rounded-lg text-sm font-medium transition border-2 border-pink-200">
                            Batal
                        </button>
                        <button type="submit" class="flex-1 bg-green-500 hover:bg-green-600 text-white py-3 rounded-lg text-sm font-medium transition shadow-md flex items-center justify-center space-x-2">
                            <i class="fas fa-save"></i>
                            <span>Simpan Perubahan</span>
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>

</body>
</html>