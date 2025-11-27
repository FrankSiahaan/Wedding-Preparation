<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - WeddingMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    
    <div class="min-h-screen py-8">
        <div class="max-w-2xl mx-auto px-4">
            
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center space-x-3 mb-2">
                    <button onclick="window.history.back()" class="text-gray-600 hover:text-gray-800">
                        <i class="fas fa-arrow-left text-xl"></i>
                    </button>
                    <h1 class="text-2xl font-bold text-gray-800">Tambah Produk</h1>
                </div>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                
                <!-- Title Section -->
                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-1">Tambah Produk Baru</h2>
                    <p class="text-sm text-gray-500">Lengkapi informasi produk Anda dengan detail</p>
                </div>

                <form action="#" method="POST" enctype="multipart/form-data">
                    
                    <!-- Foto Produk -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Foto Produk <span class="text-red-500">*</span>
                        </label>
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-12 text-center hover:border-pink-400 transition cursor-pointer" id="uploadArea">
                            <input type="file" name="image" id="imageInput" class="hidden" accept="image/*">
                            <div class="flex flex-col items-center" id="uploadPlaceholder">
                                <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mb-3">
                                    <i class="fas fa-camera text-pink-500 text-2xl"></i>
                                </div>
                                <p class="text-sm text-gray-600">Klik untuk upload foto</p>
                                <p class="text-xs text-gray-400 mt-1">PNG, JPG hingga 10MB</p>
                            </div>
                            <div id="imagePreview" class="hidden">
                                <img id="previewImg" src="" alt="Preview" class="max-h-48 mx-auto rounded-lg">
                                <button type="button" id="removeImage" class="mt-3 text-sm text-red-500 hover:text-red-700">
                                    <i class="fas fa-times"></i> Hapus Foto
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Nama Produk -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Produk <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" placeholder="Grand Ballroom Crystal Palace" class="w-full px-4 py-3 bg-pink-50 border border-pink-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 text-gray-700" required>
                    </div>

                    <!-- Harga -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Harga (IDR) <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="price" placeholder="250000000" class="w-full px-4 py-3 bg-pink-50 border border-pink-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 text-gray-700" required>
                    </div>

                    <!-- Status -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <div class="flex items-center space-x-2">
                            <div class="relative inline-block w-12 h-6 transition duration-200 ease-in-out">
                                <input type="checkbox" name="status" id="status-toggle" value="1" class="absolute w-12 h-6 transition-colors duration-300 rounded-full appearance-none cursor-pointer peer bg-gray-300 checked:bg-pink-500 peer-checked:border-pink-500 peer-checked:before:translate-x-full before:inline-block before:w-5 before:h-5 before:transform before:rounded-full before:bg-white before:shadow before:transition before:duration-300 before:absolute before:top-0.5 before:left-0.5">
                            </div>
                            <label for="status-toggle" class="text-sm font-medium text-pink-500 cursor-pointer">Aktif</label>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi <span class="text-red-500">*</span>
                        </label>
                        <textarea name="description" rows="3" placeholder="Ballroom mewah dengan kapasitas 500 tamu. Dilengkapi dengan crystal chandelier dan stage premium." class="w-full px-4 py-3 bg-pink-50 border border-pink-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 text-gray-700 resize-none" required></textarea>
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-gray-200 my-6"></div>

                    <!-- Informasi Venue Section -->
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Venue</h3>

                    <!-- Tipe Venue -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tipe Venue</label>
                        <input type="text" name="venue_type" placeholder="Indoor" class="w-full px-4 py-3 bg-pink-50 border border-pink-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 text-gray-700">
                    </div>

                    <!-- Kapasitas Tamu -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kapasitas Tamu</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500">
                                <i class="fas fa-users"></i>
                            </span>
                            <input type="number" name="capacity" placeholder="500" class="w-full pl-12 pr-4 py-3 bg-pink-50 border border-pink-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 text-gray-700">
                        </div>
                    </div>

                    <!-- Lokasi -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                            <input type="text" name="location" placeholder="Jakarta Selatan" class="w-full pl-12 pr-4 py-3 bg-pink-50 border border-pink-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 text-gray-700">
                        </div>
                    </div>

                    <!-- Fasilitas -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-3">Fasilitas</label>
                        <div class="grid grid-cols-2 gap-3">
                            <button type="button" data-facility="AC" class="facility-btn px-4 py-3 bg-gray-50 text-gray-700 rounded-lg text-sm font-medium transition border border-gray-200">
                                AC
                            </button>
                            <button type="button" data-facility="Sound System" class="facility-btn px-4 py-3 bg-gray-50 text-gray-700 rounded-lg text-sm font-medium transition border border-gray-200">
                                Sound System
                            </button>
                            <button type="button" data-facility="Proyektor" class="facility-btn px-4 py-3 bg-gray-50 text-gray-700 rounded-lg text-sm font-medium transition border border-gray-200">
                                Proyektor
                            </button>
                            <button type="button" data-facility="WiFi" class="facility-btn px-4 py-3 bg-gray-50 text-gray-700 rounded-lg text-sm font-medium transition border border-gray-200">
                                WiFi
                            </button>
                            <button type="button" data-facility="Parking" class="facility-btn px-4 py-3 bg-gray-50 text-gray-700 rounded-lg text-sm font-medium transition border border-gray-200">
                                Parking
                            </button>
                            <button type="button" data-facility="Katering Area" class="facility-btn px-4 py-3 bg-gray-50 text-gray-700 rounded-lg text-sm font-medium transition border border-gray-200">
                                Katering Area
                            </button>
                            <button type="button" data-facility="Bridal Room" class="facility-btn px-4 py-3 bg-gray-50 text-gray-700 rounded-lg text-sm font-medium transition border border-gray-200">
                                Bridal Room
                            </button>
                            <button type="button" data-facility="Stage" class="facility-btn px-4 py-3 bg-gray-50 text-gray-700 rounded-lg text-sm font-medium transition border border-gray-200">
                                Stage
                            </button>
                        </div>
                        <!-- Hidden inputs for selected facilities -->
                        <div id="facilitiesHiddenInputs"></div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-3 mt-8">
                        <button type="button" onclick="window.history.back()" class="flex-1 bg-white hover:bg-pink-50 text-pink-500 py-3 rounded-lg text-sm font-medium transition border-2 border-pink-200 text-center">
                            Batal
                        </button>
                        <button type="submit" class="flex-1 bg-green-500 hover:bg-green-600 text-white py-3 rounded-lg text-sm font-medium transition shadow-md flex items-center justify-center space-x-2">
                            <i class="fas fa-save"></i>
                            <span>Tambah Produk</span>
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>

    <script>
        // Image Upload Preview
        const uploadArea = document.getElementById('uploadArea');
        const imageInput = document.getElementById('imageInput');
        const uploadPlaceholder = document.getElementById('uploadPlaceholder');
        const imagePreview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        const removeImage = document.getElementById('removeImage');

        uploadArea.addEventListener('click', () => imageInput.click());

        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    uploadPlaceholder.classList.add('hidden');
                    imagePreview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });

        removeImage.addEventListener('click', (e) => {
            e.stopPropagation();
            imageInput.value = '';
            uploadPlaceholder.classList.remove('hidden');
            imagePreview.classList.add('hidden');
        });

        // Facilities Toggle
        const facilityBtns = document.querySelectorAll('.facility-btn');
        const facilitiesContainer = document.getElementById('facilitiesHiddenInputs');
        const selectedFacilities = new Set();

        facilityBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const facility = this.dataset.facility;
                
                if (selectedFacilities.has(facility)) {
                    // Remove facility
                    selectedFacilities.delete(facility);
                    this.classList.remove('bg-pink-500', 'text-white', 'border-pink-500');
                    this.classList.add('bg-gray-50', 'text-gray-700', 'border-gray-200');
                } else {
                    // Add facility
                    selectedFacilities.add(facility);
                    this.classList.remove('bg-gray-50', 'text-gray-700', 'border-gray-200');
                    this.classList.add('bg-pink-500', 'text-white', 'border-pink-500');
                }
                
                // Update hidden inputs
                updateFacilitiesInputs();
            });
        });

        function updateFacilitiesInputs() {
            facilitiesContainer.innerHTML = '';
            selectedFacilities.forEach(facility => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'facilities[]';
                input.value = facility;
                facilitiesContainer.appendChild(input);
            });
        }
    </script>

</body>
</html>
