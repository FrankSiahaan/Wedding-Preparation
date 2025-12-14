# Wedding Preparation Platform

**Wedding Preparation** adalah platform perencanaan pernikahan terintegrasi yang menghubungkan calon pengantin dengan vendor pernikahan. Aplikasi ini memudahkan pengguna mencari vendor, melakukan pemesanan, dan pembayaran secara online, sekaligus memberikan dashboard manajemen lengkap bagi vendor.

Proyek ini menggunakan arsitektur **Client-Server** yang terdiri dari dua repositori terpisah:
1.  **Web App (Client):** Antarmuka pengguna (Frontend) untuk browsing dan transaksi (Laravel 12 + Blade/Tailwind).
2.  **API Service (Server):** Layanan backend yang menyediakan data produk dan logika bisnis (Laravel 12 API).

---

## 🛠️ Teknologi yang Digunakan

* **Backend Framework:** Laravel 12.x
* **Bahasa:** PHP ^8.2
* **Database:** MySQL
* **Frontend:** Blade Templates, Tailwind CSS
* **Build Tool:** Vite
* **Payment Gateway:** Midtrans
* **Autentikasi Sosial:** Laravel Socialite (Google & Facebook)
* **API Communication:** HTTP Client (Guzzle)

---

## 📋 Prasyarat Sistem

Sebelum memulai, pastikan komputer Anda memiliki:
* [PHP](https://www.php.net/downloads) >= 8.2
* [Composer](https://getcomposer.org/)
* [Node.js](https://nodejs.org/) & NPM
* [MySQL](https://www.mysql.com/) (atau MariaDB)

---

## 🚀 Panduan Instalasi & Menjalankan Project

Karena sistem ini terdiri dari dua bagian, **harap install dan jalankan API Service terlebih dahulu**, baru kemudian Web App.

### Bagian 1: Instalasi API Service (Backend)

API ini bertugas menyuplai data ke aplikasi utama.

**1. Clone Repositori API**
```bash
git clone [https://github.com/username-anda/api-weddingpreparation.git](https://github.com/username-anda/api-weddingpreparation.git)
cd api-weddingpreparation
````

**2. Install Dependensi**

```bash
composer install
```

**3. Konfigurasi Environment**
Salin file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Buka file `.env` dan atur koneksi database (Buat database baru, misal: `wedding_api_db`):

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wedding_api_db
DB_USERNAME=root
DB_PASSWORD=password_db_kamu
```

**4. Setup Key & Database**
Generate key dan jalankan migrasi beserta seeder (penting untuk data awal):

```bash
php artisan key:generate
php artisan migrate --seed
```

**5. Jalankan Server API**
Jalankan API pada **port 8001** agar tidak bentrok dengan aplikasi utama:

```bash
php artisan serve --port=8001
```

> **Info:** URL API Anda sekarang aktif di `http://127.0.0.1:8001`

-----

### Bagian 2: Instalasi Web App (Client)

Ini adalah aplikasi utama yang akan diakses oleh pengguna.

**1. Clone Repositori Web App**
Kembali ke folder root komputer Anda, lalu clone repo ini:

```bash
git clone [https://github.com/username-kamu/wedding-preparation.git](https://github.com/username-kamu/wedding-preparation.git)
cd wedding-preparation
```

**2. Install Dependensi (PHP & JS)**

```bash
composer install
npm install
```

**3. Konfigurasi Environment**
Salin file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Buka file `.env` dan sesuaikan konfigurasi berikut:

  * **Database Aplikasi** (Buat database baru, misal: `wedding_app_db`):

    ```ini
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=wedding_app_db
    DB_USERNAME=root
    DB_PASSWORD=password_db_kamu
    ```

  * **Midtrans (Payment Gateway):**

    ```ini
    MIDTRANS_SERVER_KEY=masukkan_server_key_anda
    MIDTRANS_CLIENT_KEY=masukkan_client_key_anda
    MIDTRANS_IS_PRODUCTION=false
    ```

  * **Integrasi API:**
    Pastikan aplikasi tahu kemana harus mengambil data. Tambahkan/Edit baris ini (sesuaikan dengan port API di langkah sebelumnya):

    ```ini
    API_BASE_URL=[http://127.0.0.1:8001/api](http://127.0.0.1:8001/api)
    ```

**4. Generate Key & Migrasi**

```bash
php artisan key:generate
php artisan migrate --seed
```

**5. Jalankan Aplikasi**
Buka dua terminal terpisah:

  * **Terminal 1 (Backend Laravel):**

    ```bash
    php artisan serve
    ```

    *(Berjalan di port default 8000)*

  * **Terminal 2 (Frontend Vite):**

    ```bash
    npm run dev
    ```

Akses aplikasi di browser melalui: **`http://127.0.0.1:8000`**

-----

## 📖 Cara Penggunaan

### Untuk Pengguna (User/Calon Pengantin)

1.  **Registrasi/Login:** Masuk menggunakan email atau Social Login (Google/Facebook).
2.  **Cari Vendor:** Jelajahi berbagai vendor berdasarkan kategori.
3.  **Transaksi:** Pilih paket, masukkan ke keranjang, dan lakukan *Checkout*.
4.  **Pembayaran:** Bayar menggunakan Virtual Account/QRIS via Midtrans.
5.  **Ulasan:** Berikan rating dan review setelah layanan selesai.
6.  **Profil:** Kelola alamat pengiriman dan data diri.

### Untuk Vendor

1.  **Registrasi Vendor:** Daftar melalui halaman khusus vendor (`/auth/vendor/register`).
2.  **Verifikasi:** Isi kelengkapan data usaha.
3.  **Kelola Produk:** Tambah, ubah, atau hapus paket pernikahan yang Anda tawarkan.
4.  **Terima Pesanan:** Pantau dan kelola pesanan masuk di *Booking Request*.

-----

## 📂 Struktur Folder Utama

  * `app/Http/Controllers`: Logika aplikasi (Product, Cart, Transaction, Vendor).
  * `app/Models`: Model Eloquent (User, Vendor, Product, Transaction).
  * `database/migrations`: Definisi skema database.
  * `resources/views`: Tampilan antarmuka (Blade Views).
      * `auth-vendor`: Autentikasi khusus vendor.
      * `CheckOut`: Flow pembayaran.
      * `vendor`: Area dashboard vendor.

-----

## 🧪 Testing (Opsional)

Untuk menjalankan unit testing yang tersedia:

```bash
php artisan test
```

-----

*Dibuat untuk keperluan Proyek Wedding Preparation.*

```
```