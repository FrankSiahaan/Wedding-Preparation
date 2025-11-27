<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Alamat Saya - WeddingMart</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-dvh bg-gray-50 text-gray-900 font-sans">

    {{-- HEADER --}}
    <header class="bg-white sticky top-0 z-50 border-b border-gray-100">
        <div class="container mx-auto px-4 max-w-7xl">
            <nav class="flex items-center justify-between h-14">
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 shrink-0">
                    <div class="w-8 h-8 rounded-full grid place-items-center bg-yellow-50 ring-1 ring-yellow-100">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="#C7A434" stroke-width="1.5">
                            <path
                                d="M12 21s-6.716-4.319-9.192-8.055C1.113 10.16 2.02 7.5 4.41 6.5 6.08 5.8 7.93 6.3 9 7.6c1.07-1.3 2.92-1.8 4.59-1.1 2.39 1 3.3 3.66 1.6 6.45C18.72 16.68 12 21 12 21Z" />
                        </svg>
                    </div>
                    <div class="leading-tight">
                        <div class="text-base font-semibold text-gray-900">WeddingMart</div>
                        <div class="text-[10px] text-gray-500 -mt-0.5">Marketplace Pernikahan Terpercaya</div>
                    </div>
                </a>

                <div class="flex items-center gap-3">
                    <a href="{{ route('user.orders') }}"
                        class="grid place-items-center w-8 h-8 rounded-full border border-gray-200 text-gray-700 hover:bg-gray-50">
                        <svg class="w-4.5 h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.6">
                            <path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </a>
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
                        class="flex items-center gap-1.5 pl-1.5 pr-2.5 py-1 rounded-full border border-pink-100 bg-pink-50/60">
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

    <main class="container mx-auto px-4 max-w-7xl py-6">
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-50 border border-green-200 rounded-lg text-green-700 text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-lg text-red-700 text-sm">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid lg:grid-cols-4 gap-6">
            {{-- Sidebar --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg border border-gray-100 p-4">
                    <div class="text-center mb-4">
                        <div class="w-20 h-20 mx-auto rounded-full bg-pink-100 grid place-items-center mb-3">
                            <svg class="w-10 h-10 text-pink-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-900">{{ auth()->user()->name }}</h3>
                        <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
                    </div>

                    <nav class="space-y-1">
                        <a href="{{ route('user.profile') }}"
                            class="flex items-center gap-2 px-3 py-2 text-gray-700 hover:bg-gray-50 rounded-lg text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Profile Saya
                        </a>
                        <a href="{{ route('user.orders') }}"
                            class="flex items-center gap-2 px-3 py-2 text-gray-700 hover:bg-gray-50 rounded-lg text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            Pesanan Saya
                        </a>
                        <a href="{{ route('user.addresses') }}"
                            class="flex items-center gap-2 px-3 py-2 bg-pink-50 text-pink-600 rounded-lg text-sm font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Alamat Saya
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center gap-2 px-3 py-2 text-red-600 hover:bg-red-50 rounded-lg text-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Keluar
                            </button>
                        </form>
                    </nav>
                </div>
            </div>

            {{-- Main Content --}}
            <div class="lg:col-span-3">
                <div class="bg-white rounded-lg border border-gray-100 p-6">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Alamat Saya</h2>
                            <p class="text-sm text-gray-500 mt-1">Kelola alamat pengiriman Anda</p>
                        </div>
                        <button onclick="openAddModal()"
                            class="px-4 py-2 bg-pink-600 hover:bg-pink-700 text-white text-sm font-medium rounded-lg transition-colors">
                            + Tambah Alamat Baru
                        </button>
                    </div>

                    @if ($addresses->isEmpty())
                        <div class="text-center py-12">
                            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Belum Ada Alamat</h3>
                            <p class="text-sm text-gray-500 mb-4">Tambahkan alamat pengiriman untuk mempermudah proses
                                checkout</p>
                            <button onclick="openAddModal()"
                                class="px-6 py-2 bg-pink-600 hover:bg-pink-700 text-white text-sm font-medium rounded-lg transition-colors">
                                Tambah Alamat
                            </button>
                        </div>
                    @else
                        <div class="space-y-4">
                            @foreach ($addresses as $address)
                                <div
                                    class="border border-gray-200 rounded-lg p-4 hover:border-pink-300 transition-colors">
                                    <div class="flex justify-between items-start">
                                        <div class="flex-1">
                                            <div class="flex items-center gap-2 mb-2">
                                                <h3 class="font-semibold text-gray-900">{{ $address->recipient_name }}
                                                </h3>
                                                @if ($address->is_default)
                                                    <span
                                                        class="px-2 py-0.5 bg-pink-50 text-pink-600 text-xs font-medium rounded">
                                                        Utama
                                                    </span>
                                                @endif
                                            </div>
                                            <p class="text-sm text-gray-600 mb-1">{{ $address->phone }}</p>
                                            <p class="text-sm text-gray-700 leading-relaxed">
                                                {{ $address->address }}
                                                @if ($address->street)
                                                    <br>{{ $address->street }}
                                                @endif
                                                <br>{{ $address->city }}, {{ $address->province }}
                                                {{ $address->postal_code }}
                                            </p>
                                        </div>
                                        <div class="flex gap-2 ml-4">
                                            @if (!$address->is_default)
                                                <form action="{{ route('user.address.set-primary', $address->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit"
                                                        class="px-3 py-1.5 text-xs text-pink-600 hover:bg-pink-50 border border-pink-200 rounded font-medium transition-colors">
                                                        Jadikan Utama
                                                    </button>
                                                </form>
                                            @endif
                                            <button
                                                onclick="openEditModal({{ $address->id }}, '{{ addslashes($address->recipient_name) }}', '{{ $address->phone }}', '{{ addslashes($address->address) }}', '{{ $address->city }}', '{{ $address->province }}', '{{ $address->postal_code }}')"
                                                class="px-3 py-1.5 text-xs text-gray-600 hover:bg-gray-50 border border-gray-200 rounded font-medium transition-colors">
                                                Edit
                                            </button>
                                            @if (!$address->is_default)
                                                <form action="{{ route('user.address.delete', $address->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus alamat ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="px-3 py-1.5 text-xs text-red-600 hover:bg-red-50 border border-red-200 rounded font-medium transition-colors">
                                                        Hapus
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-white border-t mt-12">
        <div class="container mx-auto px-4 max-w-7xl py-3 text-center text-xs text-gray-500">
            &copy; {{ now()->year }} WeddingMart • Marketplace Persiapan Pernikahan Terpercaya
        </div>
    </footer>

    {{-- Modal Tambah Alamat --}}
    <div id="addAddressModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="sticky top-0 bg-white border-b border-gray-100 p-6 rounded-t-xl">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Tambah Alamat Baru</h3>
                        <p class="text-sm text-gray-500 mt-1">Lengkapi informasi alamat pengiriman Anda</p>
                    </div>
                    <button onclick="closeAddAddressModal()"
                        class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <form action="{{ route('user.address.store') }}" method="POST" class="p-6 space-y-5">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Penerima <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="recipient_name" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                            placeholder="Masukkan nama penerima">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Nomor Telepon <span class="text-red-500">*</span>
                        </label>
                        <input type="tel" name="phone" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                            placeholder="08xxxxxxxxxx">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Alamat Lengkap <span class="text-red-500">*</span>
                    </label>
                    <textarea name="address" required rows="3"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent resize-none"
                        placeholder="Contoh: Jl. Merdeka No. 123, Kelurahan Pasar Baru, RT 01/RW 05"></textarea>
                </div>

                <input type="hidden" name="street" value="">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Kota <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="city" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                            placeholder="Jakarta">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Provinsi <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="province" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                            placeholder="DKI Jakarta">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Kode Pos <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="postal_code" required maxlength="5"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                            placeholder="12345">
                    </div>
                </div>

                <div class="flex items-start gap-3 p-4 bg-pink-50 border border-pink-100 rounded-lg">
                    <input type="checkbox" name="is_default" id="is_default" value="1"
                        class="w-5 h-5 mt-0.5 text-pink-600 border-gray-300 rounded focus:ring-pink-500 cursor-pointer">
                    <label for="is_default" class="text-sm text-gray-700 cursor-pointer">
                        <span class="font-medium">Jadikan sebagai alamat utama</span>
                        <p class="text-xs text-gray-500 mt-1">Alamat ini akan digunakan sebagai alamat pengiriman
                            default</p>
                    </label>
                </div>

                <div class="flex gap-3 pt-2 border-t border-gray-100">
                    <button type="button" onclick="closeAddAddressModal()"
                        class="flex-1 px-5 py-2.5 border-2 border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition-colors">
                        Batal
                    </button>
                    <button type="submit"
                        class="flex-1 px-5 py-2.5 bg-pink-600 hover:bg-pink-700 text-white rounded-lg font-medium shadow-sm hover:shadow transition-all">
                        <span class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Simpan Alamat
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Edit Alamat --}}
    <div id="editAddressModal" style="display: none;"
        class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="sticky top-0 bg-white border-b border-gray-100 p-6 rounded-t-xl">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Edit Alamat</h3>
                        <p class="text-sm text-gray-500 mt-1">Perbarui informasi alamat pengiriman Anda</p>
                    </div>
                    <button onclick="closeEditAddressModal()"
                        class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <form id="editAddressForm" method="POST" class="p-6 space-y-5">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Penerima <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="recipient_name" id="edit_recipient_name" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                            placeholder="Masukkan nama penerima">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Nomor Telepon <span class="text-red-500">*</span>
                        </label>
                        <input type="tel" name="phone" id="edit_phone" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                            placeholder="08xxxxxxxxxx">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Alamat Lengkap <span class="text-red-500">*</span>
                    </label>
                    <textarea name="address" id="edit_address" required rows="3"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent resize-none"
                        placeholder="Contoh: Jl. Merdeka No. 123, Kelurahan Pasar Baru, RT 01/RW 05"></textarea>
                </div>

                <input type="hidden" name="street" id="edit_street" value="">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Kota <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="city" id="edit_city" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                            placeholder="Jakarta">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Provinsi <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="province" id="edit_province" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                            placeholder="DKI Jakarta">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Kode Pos <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="postal_code" id="edit_postal_code" required maxlength="5"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent"
                            placeholder="12345">
                    </div>
                </div>

                <div class="flex gap-3 pt-2 border-t border-gray-100">
                    <button type="button" onclick="closeEditAddressModal()"
                        class="flex-1 px-5 py-2.5 border-2 border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition-colors">
                        Batal
                    </button>
                    <button type="submit"
                        class="flex-1 px-5 py-2.5 bg-pink-600 hover:bg-pink-700 text-white rounded-lg font-medium shadow-sm hover:shadow transition-all">
                        <span class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Simpan Perubahan
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openAddModal() {
            document.getElementById('addAddressModal').style.display = 'flex';
        }

        function closeAddAddressModal() {
            document.getElementById('addAddressModal').style.display = 'none';
        }

        function openEditModal(id, name, phone, address, city, province, postalCode) {
            document.getElementById('editAddressForm').action = `/addresses/${id}`;
            document.getElementById('edit_recipient_name').value = name;
            document.getElementById('edit_phone').value = phone;
            document.getElementById('edit_address').value = address;
            document.getElementById('edit_city').value = city;
            document.getElementById('edit_province').value = province;
            document.getElementById('edit_postal_code').value = postalCode;
            document.getElementById('edit_street').value = '';

            document.getElementById('editAddressModal').style.display = 'flex';
        }

        function closeEditAddressModal() {
            document.getElementById('editAddressModal').style.display = 'none';
        }

        // Close modals when clicking outside
        document.getElementById('addAddressModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeAddAddressModal();
            }
        });

        document.getElementById('editAddressModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeEditAddressModal();
            }
        });
    </script>

</body>

</html>
