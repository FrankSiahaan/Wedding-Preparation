<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - WeddingMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">

    <!-- Header -->
    <header class="bg-white border-b border-gray-100 py-3">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center">
                
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-gradient-to-br from-yellow-400 to-yellow-300 rounded-lg flex items-center justify-center">
                        <i class="fas fa-heart text-white text-base"></i>
                    </div>
                    <div>
                        <h1 class="text-base font-bold text-gray-900">WeddingMart</h1>
                        <p class="text-xs text-gray-500">Marketplace Pernikahan Terpercaya</p>
                    </div>
                </div>

                <!-- Search Bar -->
                <div class="flex-1 max-w-xl mx-8">
                    <div class="relative">
                        <input type="text" placeholder="Cari gaun pengantin, dekorasi, fotografi, dan lainnya..." class="w-full pl-10 pr-4 py-2 bg-pink-50 border-0 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-200 text-sm text-gray-700">
                        <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-pink-300 text-sm"></i>
                    </div>
                </div>

                <!-- Right Icons -->
                <div class="flex items-center space-x-4">
                    <button class="text-gray-600 hover:text-pink-500">
                        <i class="fas fa-gift text-xl"></i>
                    </button>
                    <button class="text-gray-600 hover:text-pink-500">
                        <i class="fas fa-shopping-cart text-xl"></i>
                    </button>
                    <div class="flex items-center space-x-2 bg-pink-50 rounded-full px-3 py-1.5">
                        <i class="fas fa-user-circle text-pink-400 text-lg"></i>
                        <span class="text-sm text-gray-700">Sari Dewi</span>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <!-- Back Button -->
    <div class="bg-white border-b border-gray-100 py-3">
        <div class="max-w-7xl mx-auto px-6">
            <a href="#" class="inline-flex items-center text-red-500 hover:text-red-600 text-sm font-medium">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-6 py-8">
        
        <!-- Page Title - Center -->
        <div class="text-center mb-10">
            <h1 class="text-2xl font-bold text-gray-900 mb-2">Selesaikan Pembayaran Anda</h1>
        </div>

        <!-- Virtual Account Card -->
        <div class="bg-gradient-to-br from-pink-50 to-pink-100 rounded-2xl shadow-sm border border-pink-200 p-8 mb-6">
            
            <h2 class="text-xl font-bold text-gray-900 mb-6">Virtual Account</h2>

            <!-- Virtual Account Number -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-800 mb-3">Nomor Virtual Account</label>
                <div class="flex items-center space-x-3">
                    <input type="text" value="8808123456789012" readonly class="flex-1 px-4 py-3 bg-white border-0 rounded-lg text-gray-900 font-mono text-lg font-semibold focus:outline-none">
                    <button onclick="copyToClipboard()" class="px-4 py-3 bg-white hover:bg-gray-50 border border-gray-200 rounded-lg transition">
                        <i class="far fa-copy text-gray-700"></i>
                    </button>
                </div>
            </div>

            <!-- Total Payment -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-800 mb-3">Total Pembayaran</label>
                <input type="text" value="Rp 2.750.000" readonly class="w-full px-4 py-3 bg-white border-0 rounded-lg text-gray-900 font-semibold text-lg focus:outline-none">
            </div>

        </div>

        <!-- Payment Instructions Card -->
        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl shadow-sm border border-blue-200 p-8 mb-6">
            
            <h3 class="text-lg font-bold text-blue-900 mb-4">Cara Pembayaran:</h3>

            <ol class="space-y-3 text-blue-800">
                <li class="flex items-start">
                    <span class="font-bold mr-2">1.</span>
                    <span class="text-sm">Buka aplikasi mobile banking atau ATM</span>
                </li>
                <li class="flex items-start">
                    <span class="font-bold mr-2">2.</span>
                    <span class="text-sm">Pilih menu "Transfer" atau "Bayar"</span>
                </li>
                <li class="flex items-start">
                    <span class="font-bold mr-2">3.</span>
                    <span class="text-sm">Pilih "Virtual Account" atau "Rekening Virtual"</span>
                </li>
                <li class="flex items-start">
                    <span class="font-bold mr-2">4.</span>
                    <span class="text-sm">Masukkan nomor Virtual Account di atas</span>
                </li>
                <li class="flex items-start">
                    <span class="font-bold mr-2">5.</span>
                    <span class="text-sm">Masukkan nominal sesuai total pembayaran</span>
                </li>
                <li class="flex items-start">
                    <span class="font-bold mr-2">6.</span>
                    <span class="text-sm">Konfirmasi dan selesaikan pembayaran</span>
                </li>
            </ol>

        </div>

        <!-- Action Button -->
        <div class="flex justify-end">
            <button class="px-8 py-3 bg-gradient-to-r from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 rounded-lg text-white font-semibold shadow-md transition">
                Lanjutkan
            </button>
        </div>

    </div>

    <script>
        function copyToClipboard() {
            const vaNumber = '8808123456789012';
            navigator.clipboard.writeText(vaNumber).then(() => {
                alert('Nomor Virtual Account berhasil disalin!');
            }).catch(err => {
                console.error('Gagal menyalin: ', err);
            });
        }
    </script>

</body>
</html>