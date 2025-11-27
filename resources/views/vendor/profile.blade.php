@extends('vendor.layout')

@section('title', 'Profil Usaha')

@section('page-title', 'Profil Usaha')

@section('page-subtitle', 'Kelola informasi toko Anda')

@section('content')
    <!-- Profile Form -->
    <div class="bg-white rounded-xl border border-gray-100 p-6">
        <form action="{{ route('vendor.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Logo Preview -->
            <div class="mb-6 text-center">
                @if ($vendor->logo)
                    <img src="{{ Storage::url($vendor->logo) }}" alt="Logo" id="logoPreview"
                        class="mx-auto h-32 w-32 object-cover rounded-full border-4 border-pink-500">
                @else
                    <div id="logoPreview"
                        class="mx-auto h-32 w-32 bg-gray-200 rounded-full border-4 border-pink-500 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                @endif
            </div>

            <!-- Logo Upload -->
            <div class="mb-6">
                <label for="logo" class="block text-sm font-medium text-gray-700 mb-2">Logo Usaha
                    (Opsional)</label>
                <input type="file" id="logo" name="logo" accept="image/*" onchange="previewLogo(event)"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent @error('logo') border-red-500 @enderror">
                @error('logo')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Vendor Name -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Usaha
                    *</label>
                <input type="text" id="name" name="name" value="{{ old('name', $vendor->name) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                <input type="email" id="email" name="email" value="{{ old('email', $vendor->email) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone -->
            <div class="mb-6">
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon
                    *</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', $vendor->phone) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent @error('phone') border-red-500 @enderror">
                @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Address -->
            <div class="mb-6">
                <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Alamat *</label>
                <textarea id="address" name="address" rows="3" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent @error('address') border-red-500 @enderror">{{ old('address', $vendor->address) }}</textarea>
                @error('address')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi
                    Usaha</label>
                <textarea id="description" name="description" rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent @error('description') border-red-500 @enderror">{{ old('description', $vendor->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <p class="text-sm text-gray-500 mt-1">Ceritakan tentang usaha Anda kepada calon pelanggan</p>
            </div>

            <!-- Buttons -->
            <div class="flex items-center space-x-4">
                <button type="submit"
                    class="px-6 py-3 bg-pink-500 hover:bg-pink-600 text-white font-semibold rounded-lg transition">
                    Simpan Perubahan
                </button>
                <a href="{{ route('vendor.dashboard') }}"
                    class="px-6 py-3 bg-gray-300 hover:bg-gray-400 text-gray-700 font-semibold rounded-lg transition">
                    Kembali ke Dashboard
                </a>
            </div>
        </form>
    </div>

    <!-- Additional Info -->
    <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
        <div class="flex">
            <svg class="w-5 h-5 text-blue-500 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div>
                <h3 class="text-sm font-medium text-blue-900">Informasi</h3>
                <p class="text-sm text-blue-700 mt-1">Pastikan informasi yang Anda berikan akurat dan lengkap.
                    Informasi ini akan ditampilkan pada halaman toko Anda yang dapat dilihat oleh pelanggan.</p>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function previewLogo(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('logoPreview');
                    preview.innerHTML =
                        `<img src="${e.target.result}" alt="Logo Preview" class="mx-auto h-32 w-32 object-cover rounded-full border-4 border-pink-500">`;
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
