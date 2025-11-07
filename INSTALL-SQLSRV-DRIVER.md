# Cara Install SQL Server Driver untuk PHP 8.4 di Laragon

## Masalah
Error: `could not find driver` saat koneksi ke SQL Server

## Solusi

### Step 1: Install Microsoft ODBC Driver for SQL Server
1. Download dari: https://go.microsoft.com/fwlink/?linkid=2249004
2. Install file yang didownload (msodbcsql.msi)
3. Ikuti wizard instalasi (Next > Accept > Install)

### Step 2: Download PHP SQL Server Extension
1. Buka: https://github.com/microsoft/msphpsql/releases
2. Download file **SQLSRV-5.12.0-Windows.zip** (atau versi terbaru)
3. Extract file ZIP tersebut

### Step 3: Copy DLL Files
Dari folder hasil extract, cari dan copy 2 file DLL berikut:

**Untuk PHP 8.4 (gunakan file dengan nama 84):**
- `php_pdo_sqlsrv_84_ts_x64.dll`
- `php_sqlsrv_84_ts_x64.dll`

**ATAU untuk PHP 8.3 (jika file 84 tidak ada):**
- `php_pdo_sqlsrv_83_ts_x64.dll`
- `php_sqlsrv_83_ts_x64.dll`

**Copy ke folder:**
```
C:\laragon\bin\php\php-8.4.12-Win32-vs17-x64\ext\
```

### Step 4: Edit php.ini
1. Buka file: `C:\laragon\bin\php\php-8.4.12-Win32-vs17-x64\php.ini`
2. Tambahkan di bagian extension (cari baris-baris `extension=`):

```ini
extension=php_pdo_sqlsrv_84_ts_x64
extension=php_sqlsrv_84_ts_x64
```

**ATAU jika menggunakan DLL versi 83:**
```ini
extension=php_pdo_sqlsrv_83_ts_x64
extension=php_sqlsrv_83_ts_x64
```

3. Save file php.ini

### Step 5: Restart Laragon
1. Stop All di Laragon
2. Start All di Laragon

### Step 6: Verifikasi
Jalankan command ini di terminal:
```powershell
php -m | Select-String sqlsrv
```

Jika berhasil, akan muncul:
```
pdo_sqlsrv
sqlsrv
```

### Step 7: Test Koneksi
Jalankan:
```powershell
php test-db.php
```

Atau langsung migration:
```powershell
php artisan migrate
```

## Troubleshooting

### Jika masih error "could not find driver"
1. Pastikan DLL sudah dicopy ke folder `ext` yang benar
2. Pastikan php.ini yang diedit adalah yang benar (cek dengan `php --ini`)
3. Pastikan ODBC Driver 17/18 sudah terinstall
4. Restart Laragon atau restart Windows

### Jika muncul error DLL tidak bisa diload
- Install Visual C++ Redistributable: https://aka.ms/vs/17/release/vc_redist.x64.exe

## Catatan
- Gunakan file yang sesuai dengan PHP version Anda (8.4 atau 8.3)
- Gunakan file **ts** (thread-safe) bukan **nts** (non-thread-safe)
- Gunakan file **x64** (64-bit) sesuai dengan PHP Anda
