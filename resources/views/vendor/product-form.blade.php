@extends('vendor.layout')

@section('title', isset($product) ? 'Edit Produk' : 'Tambah Produk')

@section('page-title', isset($product) ? 'Edit Produk' : 'Tambah Produk')

@section('page-subtitle', isset($product) ? 'Perbarui informasi produk' : 'Tambahkan produk baru ke toko Anda')

@section('content')
    <!-- Form -->
    <div class="bg-white rounded-xl border border-gray-100 p-6">
        <form action="{{ isset($product) ? route('vendor.products.update', $product->id) : route('vendor.products.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($product))
                @method('PUT')
            @endif

            <!-- Product Name -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Produk *</label>
                <input type="text" id="name" name="name" value="{{ old('name', $product->name ?? '') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi
                    *</label>
                <textarea id="description" name="description" rows="4" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent @error('description') border-red-500 @enderror">{{ old('description', $product->description ?? '') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Price and Stock -->
            <div class="grid grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Harga (Rp)
                        *</label>
                    <input type="number" id="price" name="price" value="{{ old('price', $product->price ?? '') }}"
                        required min="0" step="0.01"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent @error('price') border-red-500 @enderror">
                    @error('price')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="stock" class="block text-sm font-medium text-gray-700 mb-2">Stok *</label>
                    <input type="number" id="stock" name="stock" value="{{ old('stock', $product->stock ?? '') }}"
                        required min="0"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent @error('stock') border-red-500 @enderror">
                    @error('stock')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Category -->
            <div class="mb-6">
                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Kategori
                    *</label>
                <select id="category_id" name="category_id" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent @error('category_id') border-red-500 @enderror">
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div class="mb-6">
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1"
                        {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}
                        class="w-4 h-4 text-pink-600 border-gray-300 rounded focus:ring-pink-500">
                    <span class="ml-2 text-sm text-gray-700">Produk Aktif</span>
                </label>
            </div>

            <!-- Product Variants -->
            <div class="mb-6 border-t pt-6">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Varian Produk</h3>
                        <p class="text-sm text-gray-500 mt-1">Tambahkan pilihan seperti ukuran, warna, dll (opsional)</p>
                    </div>
                    <button type="button" onclick="addAttribute()"
                        class="px-4 py-2 bg-pink-500 hover:bg-pink-600 text-white text-sm font-medium rounded-lg transition">
                        <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Atribut
                    </button>
                </div>

                <!-- Info -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-4">
                    <div class="flex gap-3">
                        <svg class="w-5 h-5 text-blue-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-sm text-blue-700">
                            <p class="font-medium mb-1">Cara menggunakan varian produk:</p>
                            <ol class="list-decimal ml-4 space-y-1">
                                <li>Klik "Tambah Atribut" untuk menambahkan jenis varian (contoh: Ukuran, Warna)</li>
                                <li>Isi nama atribut dan nilai-nilainya dipisahkan koma (contoh: XL, L, M, S)</li>
                                <li>Sistem akan otomatis membuat kombinasi varian</li>
                                <li>Isi SKU, harga, dan stok untuk setiap varian</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <!-- Attributes Container -->
                <div id="attributesContainer" class="space-y-4">
                    <!-- Attribute items will be added here dynamically -->
                </div>

                <!-- Variants Preview -->
                <div id="variantsPreview" class="mt-6 hidden">
                    <h4 class="text-md font-semibold text-gray-900 mb-3">Kombinasi Varian</h4>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <div id="variantsTable" class="space-y-3">
                            <!-- Variant combinations will be shown here -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Images -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Gambar Produk
                    {{ isset($product) ? '(Opsional - biarkan kosong jika tidak ingin mengubah)' : '*' }}
                </label>
                <div class="flex items-center gap-3">
                    <label for="imageInput"
                        class="flex-1 cursor-pointer bg-white px-4 py-3 border-2 border-dashed border-gray-300 rounded-lg hover:border-pink-500 transition">
                        <div class="text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>
                            <p class="mt-2 text-sm text-gray-600">
                                <span class="font-semibold text-pink-600">Klik untuk upload</span> atau drag & drop
                            </p>
                            <p class="text-xs text-gray-500 mt-1">PNG, JPG hingga 2MB (Maksimal 5 foto)</p>
                        </div>
                    </label>
                    <input type="file" name="images[]" multiple accept="image/*" id="imageInput"
                        {{ isset($product) ? '' : 'required' }} class="hidden" onchange="previewImages(event)">
                </div>
                @error('images')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                @error('images.*')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

                <!-- Selected Files Info -->
                <div id="fileInfo" class="mt-3 text-sm text-gray-600 hidden">
                    <span id="fileCount">0</span> foto dipilih
                </div>

                <!-- Image Preview -->
                <div id="imagePreview" class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
                    @if (isset($product) && $product->images->count() > 0)
                        @foreach ($product->images as $image)
                            <div class="relative group">
                                <img src="{{ Storage::url($image->image) }}" alt="Product Image"
                                    class="h-32 w-full object-cover rounded-lg border-2 border-gray-200">
                                <span
                                    class="absolute top-2 right-2 bg-blue-500 text-white text-xs px-2 py-1 rounded shadow">Existing</span>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex items-center gap-3 mt-6">
                <button type="submit"
                    class="px-5 py-2.5 bg-pink-500 hover:bg-pink-600 text-white font-medium rounded-lg transition">
                    {{ isset($product) ? 'Update Produk' : 'Simpan Produk' }}
                </button>
                <a href="{{ route('vendor.products') }}"
                    class="px-5 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-lg transition">
                    Kembali
                </a>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        const MAX_FILES = 5;
        const MAX_SIZE = 2 * 1024 * 1024; // 2MB in bytes
        let selectedFiles = [];
        let attributeCount = 0;
        let attributes = [];

        function previewImages(event) {
            const files = Array.from(event.target.files);
            const previewContainer = document.getElementById('imagePreview');
            const fileInfo = document.getElementById('fileInfo');
            const fileCount = document.getElementById('fileCount');

            // Validate number of files
            if (files.length > MAX_FILES) {
                alert(`Maksimal ${MAX_FILES} foto yang dapat diupload!`);
                event.target.value = '';
                return;
            }

            // Validate file sizes
            const oversizedFiles = files.filter(file => file.size > MAX_SIZE);
            if (oversizedFiles.length > 0) {
                alert(`Beberapa file melebihi ukuran maksimal 2MB!`);
                event.target.value = '';
                return;
            }

            // Store selected files
            selectedFiles = files;

            // Clear only new previews (keep existing images if editing)
            const newPreviews = previewContainer.querySelectorAll('.new-preview');
            newPreviews.forEach(preview => preview.remove());

            // Show file count
            if (files.length > 0) {
                fileInfo.classList.remove('hidden');
                fileCount.textContent = files.length;
            } else {
                fileInfo.classList.add('hidden');
            }

            // Preview each file
            files.forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.className = 'relative group new-preview';
                    div.innerHTML = `
                        <img src="${e.target.result}" alt="Preview ${index + 1}" class="h-32 w-full object-cover rounded-lg border-2 border-pink-300">
                        <span class="absolute top-2 right-2 bg-green-500 text-white text-xs px-2 py-1 rounded shadow">Baru</span>
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all rounded-lg flex items-center justify-center">
                            <button type="button" onclick="removePreview(this, ${index})" 
                                class="opacity-0 group-hover:opacity-100 bg-red-500 text-white rounded-full p-2 hover:bg-red-600 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                        <div class="absolute bottom-2 left-2 bg-gray-900 bg-opacity-75 text-white text-xs px-2 py-1 rounded">
                            ${(file.size / 1024).toFixed(0)} KB
                        </div>
                    `;
                    previewContainer.appendChild(div);
                }
                reader.readAsDataURL(file);
            });
        }

        function removePreview(button, index) {
            // Remove from visual preview
            button.closest('.new-preview').remove();

            // Create new FileList without the removed file
            const dt = new DataTransfer();
            selectedFiles.forEach((file, i) => {
                if (i !== index) {
                    dt.items.add(file);
                }
            });

            // Update input files
            const input = document.getElementById('imageInput');
            input.files = dt.files;
            selectedFiles = Array.from(dt.files);

            // Update file count
            const fileCount = document.getElementById('fileCount');
            const fileInfo = document.getElementById('fileInfo');
            if (selectedFiles.length > 0) {
                fileCount.textContent = selectedFiles.length;
            } else {
                fileInfo.classList.add('hidden');
            }

            // Refresh previews
            const event = {
                target: input
            };
            previewImages(event);
        }

        // Drag and drop functionality
        const dropZone = document.querySelector('label[for="imageInput"]');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, () => {
                dropZone.classList.add('border-pink-500', 'bg-pink-50');
            });
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, () => {
                dropZone.classList.remove('border-pink-500', 'bg-pink-50');
            });
        });

        dropZone.addEventListener('drop', function(e) {
            const input = document.getElementById('imageInput');
            input.files = e.dataTransfer.files;
            previewImages({
                target: input
            });
        });

        // ===== VARIANT MANAGEMENT =====

        function addAttribute() {
            attributeCount++;
            const container = document.getElementById('attributesContainer');
            const attributeId = `attr_${attributeCount}`;

            const attributeDiv = document.createElement('div');
            attributeDiv.className = 'border border-gray-200 rounded-lg p-4 bg-white';
            attributeDiv.id = attributeId;
            attributeDiv.innerHTML = `
                <div class="flex items-start gap-4">
                    <div class="flex-1 space-y-3">
                        <!-- Attribute Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Atribut <span class="text-gray-400">(contoh: Ukuran, Warna)</span>
                            </label>
                            <input type="text" 
                                name="attributes[${attributeCount}][name]" 
                                placeholder="Contoh: Ukuran"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                                onchange="updateVariants()">
                        </div>
                        
                        <!-- Attribute Values -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nilai-nilai <span class="text-gray-400">(pisahkan dengan koma)</span>
                            </label>
                            <input type="text" 
                                name="attributes[${attributeCount}][values]" 
                                placeholder="Contoh: XL, L, M, S"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                                onchange="updateVariants()">
                            <p class="text-xs text-gray-500 mt-1">Pisahkan setiap nilai dengan koma (,)</p>
                        </div>
                        
                        <!-- Values Preview -->
                        <div class="flex flex-wrap gap-2" id="valuesPreview_${attributeCount}">
                            <!-- Value tags will appear here -->
                        </div>
                    </div>
                    
                    <!-- Remove Button -->
                    <button type="button" onclick="removeAttribute('${attributeId}')" 
                        class="flex-shrink-0 p-2 text-red-500 hover:bg-red-50 rounded-lg transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </button>
                </div>
            `;

            container.appendChild(attributeDiv);

            // Add input listener for value preview
            const valuesInput = attributeDiv.querySelector(`input[name="attributes[${attributeCount}][values]"]`);
            valuesInput.addEventListener('input', function() {
                updateValuePreview(attributeCount, this.value);
            });
        }

        function updateValuePreview(attrIndex, valuesString) {
            const previewDiv = document.getElementById(`valuesPreview_${attrIndex}`);
            if (!previewDiv) return;

            // Clear previous preview
            previewDiv.innerHTML = '';

            if (!valuesString.trim()) return;

            // Split by comma and create tags
            const values = valuesString.split(',').map(v => v.trim()).filter(v => v);
            values.forEach(value => {
                const tag = document.createElement('span');
                tag.className = 'inline-flex items-center px-3 py-1 rounded-full text-sm bg-pink-100 text-pink-700';
                tag.textContent = value;
                previewDiv.appendChild(tag);
            });
        }

        function removeAttribute(attributeId) {
            const element = document.getElementById(attributeId);
            if (element) {
                element.remove();
                updateVariants();
            }
        }

        function updateVariants() {
            // Collect all attributes
            attributes = [];
            const container = document.getElementById('attributesContainer');
            const attributeDivs = container.querySelectorAll('div[id^="attr_"]');

            attributeDivs.forEach((div, index) => {
                const nameInput = div.querySelector('input[name*="[name]"]');
                const valuesInput = div.querySelector('input[name*="[values]"]');

                if (nameInput && valuesInput && nameInput.value && valuesInput.value) {
                    const values = valuesInput.value.split(',').map(v => v.trim()).filter(v => v);
                    if (values.length > 0) {
                        attributes.push({
                            name: nameInput.value.trim(),
                            values: values
                        });
                    }
                }
            });

            // Generate variant combinations
            if (attributes.length > 0) {
                generateVariantCombinations();
            } else {
                document.getElementById('variantsPreview').classList.add('hidden');
            }
        }

        function generateVariantCombinations() {
            const variantsTable = document.getElementById('variantsTable');
            const variantsPreview = document.getElementById('variantsPreview');

            if (attributes.length === 0) {
                variantsPreview.classList.add('hidden');
                return;
            }

            // Generate all combinations
            const combinations = cartesianProduct(attributes.map(attr => attr.values));
            variantsTable.innerHTML = '';

            combinations.forEach((combination, index) => {
                const variantName = combination.join(' - ');
                const sku = generateSKU(combination);

                const variantDiv = document.createElement('div');
                variantDiv.className = 'bg-white border border-gray-200 rounded-lg p-4';
                variantDiv.innerHTML = `
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <!-- Variant Name -->
                        <div class="md:col-span-2">
                            <label class="block text-xs font-medium text-gray-600 mb-1">Varian</label>
                            <div class="px-3 py-2 bg-gray-50 rounded text-sm font-medium text-gray-900">
                                ${variantName}
                            </div>
                            <input type="hidden" name="variants[${index}][name]" value="${variantName}">
                            ${combination.map((val, i) => `
                                    <input type="hidden" name="variants[${index}][attributes][${i}][name]" value="${attributes[i].name}">
                                    <input type="hidden" name="variants[${index}][attributes][${i}][value]" value="${val}">
                                `).join('')}
                        </div>
                        
                        <!-- SKU -->
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">SKU</label>
                            <input type="text" 
                                name="variants[${index}][sku]" 
                                value="${sku}"
                                placeholder="SKU"
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                        </div>
                        
                        <!-- Price -->
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">Harga (Rp)</label>
                            <input type="number" 
                                name="variants[${index}][price]" 
                                placeholder="0"
                                min="0"
                                step="0.01"
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                        </div>
                        
                        <!-- Stock -->
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">Stok</label>
                            <input type="number" 
                                name="variants[${index}][stock]" 
                                placeholder="0"
                                min="0"
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                        </div>
                    </div>
                `;
                variantsTable.appendChild(variantDiv);
            });

            variantsPreview.classList.remove('hidden');
        }

        function cartesianProduct(arrays) {
            if (arrays.length === 0) return [
                []
            ];
            if (arrays.length === 1) return arrays[0].map(item => [item]);

            const result = [];
            const restProduct = cartesianProduct(arrays.slice(1));

            arrays[0].forEach(item => {
                restProduct.forEach(combination => {
                    result.push([item, ...combination]);
                });
            });

            return result;
        }

        function generateSKU(combination) {
            // Generate SKU from combination (e.g., XL-BLK, L-WHT)
            return combination
                .map(val => val.substring(0, 3).toUpperCase())
                .join('-') + '-' + Date.now().toString().slice(-4);
        }

        // Load existing variants when editing
        @if (isset($product) && $product->attributes->count() > 0)
            document.addEventListener('DOMContentLoaded', function() {
                // Load existing attributes
                @foreach ($product->attributes as $index => $attribute)
                    attributeCount++;
                    const container = document.getElementById('attributesContainer');
                    const attributeId = `attr_${attributeCount}`;
                    const values = [
                        @foreach ($attribute->values as $value)
                            '{{ $value->value }}',
                        @endforeach
                    ];
                    const valuesString = values.join(', ');

                    const attributeDiv = document.createElement('div');
                    attributeDiv.className = 'border border-gray-200 rounded-lg p-4 bg-white';
                    attributeDiv.id = attributeId;
                    attributeDiv.innerHTML = `
                    <div class="flex items-start gap-4">
                        <div class="flex-1 space-y-3">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Atribut <span class="text-gray-400">(contoh: Ukuran, Warna)</span>
                                </label>
                                <input type="text" 
                                    name="attributes[${attributeCount}][name]" 
                                    value="{{ $attribute->name }}"
                                    placeholder="Contoh: Ukuran"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                                    onchange="updateVariants()">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Nilai-nilai <span class="text-gray-400">(pisahkan dengan koma)</span>
                                </label>
                                <input type="text" 
                                    name="attributes[${attributeCount}][values]" 
                                    value="${valuesString}"
                                    placeholder="Contoh: XL, L, M, S"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                                    onchange="updateVariants()">
                                <p class="text-xs text-gray-500 mt-1">Pisahkan setiap nilai dengan koma (,)</p>
                            </div>
                            <div class="flex flex-wrap gap-2" id="valuesPreview_${attributeCount}">
                                ${values.map(val => `<span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-pink-100 text-pink-700">${val}</span>`).join('')}
                            </div>
                        </div>
                        <button type="button" onclick="removeAttribute('${attributeId}')" 
                            class="flex-shrink-0 p-2 text-red-500 hover:bg-red-50 rounded-lg transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>
                `;

                    container.appendChild(attributeDiv);

                    const valuesInput = attributeDiv.querySelector(
                        `input[name="attributes[${attributeCount}][values]"]`);
                    valuesInput.addEventListener('input', function() {
                        updateValuePreview(attributeCount, this.value);
                    });
                @endforeach

                // Trigger variant generation with loaded attributes
                setTimeout(() => {
                    updateVariants();

                    // Load existing variant prices and stocks
                    @if ($product->variants->count() > 0)
                        const variantData = {
                            @foreach ($product->variants as $variant)
                                '{{ $variant->attributeValues->pluck('value')->join(' - ') }}': {
                                    sku: '{{ $variant->sku }}',
                                    price: '{{ $variant->price }}',
                                    stock: '{{ $variant->stock }}'
                                },
                            @endforeach
                        };

                        // Wait for variants to be generated
                        setTimeout(() => {
                            const variantInputs = document.querySelectorAll('#variantsTable > div');
                            variantInputs.forEach(variantDiv => {
                                const variantName = variantDiv.querySelector(
                                    'div[class*="font-medium"]').textContent.trim();
                                if (variantData[variantName]) {
                                    const data = variantData[variantName];
                                    variantDiv.querySelector('input[name*="[sku]"]').value =
                                        data.sku;
                                    variantDiv.querySelector('input[name*="[price]"]')
                                        .value = data.price;
                                    variantDiv.querySelector('input[name*="[stock]"]')
                                        .value = data.stock;
                                }
                            });
                        }, 100);
                    @endif
                }, 100);
            });
        @endif
    </script>
@endsection
