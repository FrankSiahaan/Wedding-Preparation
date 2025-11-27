<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Beri Ulasan - WeddingMart</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="min-h-dvh bg-gray-50 text-gray-900 font-sans">

    {{-- HEADER --}}
    <header class="bg-white sticky top-0 z-50 border-b border-gray-100">
        <div class="container mx-auto px-4 max-w-6xl">
            <nav class="flex items-center justify-between h-14">
                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 shrink-0">
                    <div class="w-8 h-8 rounded-full grid place-items-center bg-yellow-50 ring-1 ring-yellow-100">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="#C7A434" stroke-width="1.5"
                            aria-hidden="true">
                            <path
                                d="M12 21s-6.716-4.319-9.192-8.055C1.113 10.16 2.02 7.5 4.41 6.5 6.08 5.8 7.93 6.3 9 7.6c1.07-1.3 2.92-1.8 4.59-1.1 2.39 1 3.3 3.66 1.6 6.45C18.72 16.68 12 21 12 21Z" />
                        </svg>
                    </div>
                    <div class="leading-tight">
                        <div class="text-base font-semibold text-gray-900">WeddingMart</div>
                        <div class="text-[10px] text-gray-500 -mt-0.5">Marketplace Pernikahan Terpercaya</div>
                    </div>
                </a>

                {{-- Actions --}}
                <div class="flex items-center gap-3">
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
                        class="hidden sm:flex items-center gap-1.5 pl-1.5 pr-2.5 py-1 rounded-full border border-pink-100 bg-pink-50/60 hover:bg-pink-100/80 transition-colors">
                        <span class="grid place-items-center w-6.5 h-6.5 rounded-full bg-pink-100 text-pink-700">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.6">
                                <circle cx="12" cy="8.4" r="3.1" />
                                <path d="M4 20a8 8 0 0 1 16 0" />
                            </svg>
                        </span>
                        <span class="text-[13px] text-gray-700">{{ auth()->user()->name }}</span>
                    </a>
                </div>
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-4 max-w-6xl py-6">
        <div class="max-w-3xl mx-auto">
            {{-- Breadcrumb --}}
            <div class="mb-6">
                <a href="{{ route('user.orders') }}"
                    class="inline-flex items-center text-pink-600 hover:text-pink-700 mb-4">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali ke Pesanan
                </a>
                <div class="flex items-center gap-2 mb-2">
                    <svg class="w-6 h-6 text-pink-500" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <h1 class="text-2xl font-bold text-gray-900">Form Ulasan</h1>
                </div>
                <p class="text-sm text-gray-600">Order ID: {{ $transaction->order_id }}</p>
            </div>

            {{-- Review Form --}}
            <form action="{{ route('user.review.store', $transaction->id) }}" method="POST"
                enctype="multipart/form-data" class="space-y-4">
                @csrf

                @foreach ($items as $item)
                    <div class="bg-white rounded-lg border border-gray-200 p-5 shadow-sm">
                        {{-- Product Info --}}
                        <div class="flex gap-3 items-start pb-3 border-b border-gray-200 mb-4">
                            @if ($item->product && $item->product->images && $item->product->images->isNotEmpty())
                                <img src="{{ asset('storage/' . $item->product->images->first()->image) }}"
                                    alt="{{ $item->product->name }}"
                                    class="w-16 h-16 object-cover rounded-lg border border-gray-200">
                            @else
                                <div
                                    class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center border border-gray-200">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif

                            <div class="flex-1 min-w-0">
                                <p class="font-semibold text-gray-900 text-sm mb-1">{{ $item->product->name }}</p>
                                <p class="text-xs text-gray-600">
                                    <span class="font-medium">Vendor:</span>
                                    {{ $item->product->vendor->store_name ?? 'Wedding Paradise' }}
                                </p>
                                @if ($item->productvariant && $item->productvariant->productvariantvalues)
                                    <p class="text-xs text-gray-600 mt-0.5">
                                        Variasi:
                                        {{ $item->productvariant->productvariantvalues->pluck('value')->join(', ') }}
                                    </p>
                                @endif
                                <p class="text-xs text-gray-600 font-medium mt-1">Pesanan ID:
                                    {{ $transaction->order_id }}
                                </p>
                            </div>
                        </div>

                        <input type="hidden" name="reviews[{{ $loop->index }}][product_id]"
                            value="{{ $item->product_id }}">

                        {{-- Rating --}}
                        <div class="mb-4" x-data="{ rating: 0, hover: 0 }">
                            <label class="block text-sm font-medium text-gray-800 mb-2">
                                Rating Produk <span class="text-red-500">*</span>
                            </label>
                            <p class="text-xs text-gray-600 mb-2">Berikan rating berdasarkan kepuasan Anda</p>
                            <div class="flex gap-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    <button type="button" @click="rating = {{ $i }}"
                                        @mouseenter="hover = {{ $i }}" @mouseleave="hover = 0"
                                        class="focus:outline-none">
                                        <svg class="w-8 h-8 transition-colors"
                                            :class="(hover >= {{ $i }} || rating >= {{ $i }}) ?
                                            'text-yellow-400 fill-yellow-400' : 'text-gray-300 fill-gray-300'"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </button>
                                @endfor
                            </div>
                            <input type="hidden" name="reviews[{{ $loop->index }}][rating]" x-model="rating"
                                required>
                            @error('reviews.' . $loop->index . '.rating')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Comment --}}
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-800 mb-2">
                                Tulis Ulasan Anda <span class="text-red-500">*</span>
                            </label>
                            <textarea name="reviews[{{ $loop->index }}][comment]" rows="3"
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 bg-white resize-none placeholder:text-gray-400"
                                placeholder="Ceritakan pengalaman Anda dengan produk ini. Bagaimana kualitasnya? Apakah sesuai ekspektasi? Bagaimana pelayanan vendor?"
                                required>{{ old('reviews.' . $loop->index . '.comment') }}</textarea>
                            @error('reviews.' . $loop->index . '.comment')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Photo Upload (Optional) --}}
                        <div x-data="imageUpload()">
                            <label class="block text-sm font-medium text-gray-800 mb-2">
                                Foto Produk (Opsional)
                            </label>
                            <p class="text-xs text-gray-600 mb-2">Tambahkan foto untuk membantu pembeli lain (maks 5
                                foto)</p>

                            <input type="file" name="reviews[{{ $loop->index }}][images][]"
                                @change="handleFiles($event)" accept="image/jpeg,image/jpg,image/png" multiple
                                class="hidden" id="file-input-{{ $loop->index }}">

                            <label for="file-input-{{ $loop->index }}"
                                class="block border-2 border-dashed border-gray-300 rounded-lg p-6 text-center bg-gray-50 hover:border-pink-400 hover:bg-pink-50 transition-colors cursor-pointer">
                                <svg class="w-10 h-10 text-gray-400 mx-auto mb-2" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <p class="text-xs text-gray-600">Klik untuk upload foto</p>
                                <p class="text-xs text-gray-500 mt-1">PNG, JPG hingga 5MB per foto</p>
                            </label>

                            {{-- Image Preview --}}
                            <div x-show="previews.length > 0" class="mt-3 grid grid-cols-5 gap-2">
                                <template x-for="(preview, index) in previews" :key="index">
                                    <div class="relative group">
                                        <img :src="preview"
                                            class="w-full h-20 object-cover rounded-lg border border-gray-200">
                                        <button type="button" @click="removeImage(index)"
                                            class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- Submit Button --}}
                <div class="flex gap-3 mt-6">
                    <a href="{{ route('user.orders') }}"
                        class="flex-1 px-6 py-2.5 border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition-colors text-center">
                        Batal
                    </a>
                    <button type="submit"
                        class="flex-1 px-6 py-2.5 bg-pink-500 text-white rounded-lg font-medium hover:bg-pink-600 transition-colors">
                        Kirim Ulasan
                    </button>
                </div>
            </form>
        </div>
    </main>

    <footer class="bg-white border-t mt-12">
        <div class="container mx-auto px-4 max-w-6xl py-3 text-center text-xs text-gray-500">
            &copy; {{ now()->year }} WeddingMart • Marketplace Persiapan Pernikahan Terpercaya
        </div>
    </footer>

    <script>
        function imageUpload() {
            return {
                previews: [],
                files: [],

                handleFiles(event) {
                    const fileInput = event.target;
                    const newFiles = Array.from(fileInput.files);

                    // Limit to 5 images
                    const totalFiles = this.files.length + newFiles.length;
                    if (totalFiles > 5) {
                        alert('Maksimal 5 foto');
                        return;
                    }

                    newFiles.forEach(file => {
                        // Validate file size (5MB)
                        if (file.size > 5 * 1024 * 1024) {
                            alert(`File ${file.name} terlalu besar. Maksimal 5MB per foto.`);
                            return;
                        }

                        // Validate file type
                        if (!['image/jpeg', 'image/jpg', 'image/png'].includes(file.type)) {
                            alert(`File ${file.name} bukan format gambar yang valid.`);
                            return;
                        }

                        this.files.push(file);

                        // Create preview
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.previews.push(e.target.result);
                        };
                        reader.readAsDataURL(file);
                    });
                },

                removeImage(index) {
                    this.previews.splice(index, 1);
                    this.files.splice(index, 1);

                    // Update file input
                    const dataTransfer = new DataTransfer();
                    this.files.forEach(file => dataTransfer.items.add(file));
                    const fileInput = this.$el.querySelector('input[type="file"]');
                    if (fileInput) {
                        fileInput.files = dataTransfer.files;
                    }
                }
            }
        }
    </script>

</body>

</html>
