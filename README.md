Tentu, ini adalah draft `README.md` yang disesuaikan khusus untuk proyek "Wedding Preparation" kamu, berdasarkan struktur file dan teknologi yang terlihat (Laravel 12, Midtrans, Socialite, Tailwind, dll.).

Silakan buat file baru bernama `README.md` (atau timpa yang lama) dan salin konten berikut:

-----

# Wedding Preparation Platform

Aplikasi berbasis web untuk perencanaan pernikahan yang menghubungkan calon pengantin dengan vendor pernikahan. Platform ini memungkinkan pengguna untuk mencari produk/jasa, melakukan pemesanan, dan pembayaran secara online, serta memungkinkan vendor untuk mengelola produk dan pesanan mereka.

## 🛠️ Teknologi yang Digunakan

  * **Framework Backend:** Laravel 12.x
  * **Bahasa:** PHP ^8.2
  * **Database:** MySQL
  * **Frontend:** Blade Templates, Tailwind CSS
  * **Build Tool:** Vite
  * **Payment Gateway:** Midtrans
  * **Autentikasi Sosial:** Laravel Socialite (Google & Facebook)

## 📋 Prasyarat Sistem

Sebelum memulai, pastikan komputer kamu memiliki:

  * [PHP](https://www.php.net/downloads) \>= 8.2
  * [Composer](https://getcomposer.org/)
  * [Node.js](https://nodejs.org/) & NPM
  * [MySQL](https://www.mysql.com/) (atau MariaDB)

## 🚀 Cara Install & Menjalankan Project

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di komputer lokal (localhost):

### 1\. Clone Repositori

Clone proyek ini ke dalam folder komputer kamu:

```bash
git clone https://github.com/username-kamu/wedding-preparation.git
cd wedding-preparation
```

### 2\. Install Dependensi PHP

Jalankan perintah ini untuk mengunduh semua library PHP yang dibutuhkan:

```bash
composer install
```

### 3\. Install Dependensi Frontend

Install library JavaScript (Tailwind, Vite, dll):

```bash
npm install
```

### 4\. Konfigurasi Environment (.env)

Salin file contoh konfigurasi `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Atau jika di Windows (Command Prompt):

```cmd
copy .env.example .env
```

Buka file `.env` dan sesuaikan konfigurasi berikut:

  * **Database**: Sesuaikan dengan kredensial database lokal kamu.

    ```ini
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=weddingpreparation  # Pastikan buat database ini di MySQL
    DB_USERNAME=root
    DB_PASSWORD=password_kamu
    ```

  * **Midtrans (Payment Gateway)**: Masukkan Server Key & Client Key dari dashboard Midtrans kamu.

    ```ini
    MIDTRANS_SERVER_KEY=masukkan_server_key_disini
    MIDTRANS_CLIENT_KEY=masukkan_client_key_disini
    MIDTRANS_IS_PRODUCTION=false
    ```

  * **Social Login (Opsional)**: Jika ingin mengaktifkan login Google/Facebook.

    ```ini
    GOOGLE_CLIENT_ID=...
    GOOGLE_CLIENT_SECRET=...
    FACEBOOK_CLIENT_ID=...
    FACEBOOK_CLIENT_SECRET=...
    ```

### 5\. Generate Application Key

Buat kunci enkripsi aplikasi Laravel:

```bash
php artisan key:generate
```

### 6\. Migrasi Database & Seeding

Jalankan migrasi untuk membuat tabel-tabel di database. Tambahkan opsi `--seed` jika ingin mengisi data dummy awal (seperti admin atau kategori default).

```bash
php artisan migrate --seed
```

### 7\. Jalankan Project

Buka dua terminal terpisah untuk menjalankan server backend dan frontend secara bersamaan.

**Terminal 1 (Backend Laravel):**

```bash
php artisan serve
```

**Terminal 2 (Frontend Vite):**

```bash
npm run dev
```

Akses aplikasi di browser melalui: `http://127.0.0.1:8000`

## 📖 Cara Penggunaan

### Untuk Pengguna (User/Calon Pengantin)

1.  **Registrasi/Login:** Buat akun baru atau login menggunakan Google/Facebook.
2.  **Jelajahi Vendor:** Cari vendor pernikahan berdasarkan kategori.
3.  **Pemesanan:** Pilih produk/paket, masukkan ke keranjang, dan lakukan Checkout.
4.  **Pembayaran:** Lakukan pembayaran melalui gateway Midtrans.
5.  **Review:** Berikan ulasan setelah pesanan selesai.
6.  **Manajemen Profil:** Atur alamat pengiriman dan edit profil di menu User.

### Untuk Vendor

1.  **Daftar Vendor:** Masuk ke halaman registrasi vendor (`/auth/vendor/register`).
2.  **Verifikasi:** Lengkapi data identitas usaha dan informasi vendor.
3.  **Dashboard Vendor:** Kelola pesanan yang masuk (`booking request`).
4.  **Kelola Produk:** Tambah, edit, atau hapus produk/jasa yang ditawarkan.

## 📂 Struktur Folder Penting

  * `app/Http/Controllers`: Logika backend (Product, Cart, Transaction, Vendor, dll).
  * `app/Models`: Model database (User, Vendor, Product, Transaction, dll).
  * `database/migrations`: Struktur skema database.
  * `resources/views`: Tampilan antarmuka (Frontend Blade).
      * `auth-vendor`: Halaman login/register khusus vendor.
      * `CheckOut`: Proses checkout & pembayaran.
      * `vendor`: Dashboard manajemen untuk vendor.

## 🧪 Testing (Opsional)

Untuk menjalankan unit test:

```bash
php artisan test
```

-----

*Dibuat untuk keperluan Proyek Wedding Preparation.*