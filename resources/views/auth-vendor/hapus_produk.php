<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Produk - WeddingMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-900 bg-opacity-50 flex items-center justify-center min-h-screen p-4">
    
    <!-- Modal Container -->
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-8">
        
        <!-- Icon -->
        <div class="flex justify-center mb-6">
            <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center">
                <i class="fas fa-trash-alt text-red-500 text-3xl"></i>
            </div>
        </div>

        <!-- Title -->
        <h2 class="text-2xl font-bold text-gray-900 text-center mb-3">Hapus Produk</h2>
        
        <!-- Description -->
        <p class="text-gray-600 text-center mb-8">
            Apakah Anda yakin ingin menghapus produk ini?
        </p>

        <!-- Warning Message -->
        <div class="bg-gray-100 rounded-lg p-4 mb-8">
            <p class="text-sm text-gray-700 text-center">
                Tindakan ini tidak dapat dibatalkan. Produk akan dihapus secara permanen dari sistem.
            </p>
        </div>

        <!-- Action Buttons -->
        <div class="flex space-x-3">
            <button type="button" onclick="window.history.back()" class="flex-1 bg-white hover:bg-gray-50 text-gray-700 py-3 px-6 rounded-lg text-sm font-medium transition border-2 border-gray-200">
                Batal
            </button>
            <button type="button" onclick="confirmDelete()" class="flex-1 bg-red-500 hover:bg-red-600 text-white py-3 px-6 rounded-lg text-sm font-medium transition shadow-md">
                Ya, Hapus
            </button>
        </div>

    </div>

    <script>
        function confirmDelete() {
            // Implement delete logic here
            // Example: submit form or make AJAX request
            alert('Produk berhasil dihapus!');
            window.location.href = '/vendor/kelola-produk'; // Redirect after delete
        }
    </script>

</body>
</html>