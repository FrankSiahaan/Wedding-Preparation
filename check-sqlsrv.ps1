# Panduan Install SQL Server Driver untuk PHP 8.4

Write-Host "=== SQL Server Driver Installation Guide ===" -ForegroundColor Cyan
Write-Host ""

$phpDir = "C:\laragon\bin\php\php-8.4.12-Win32-vs17-x64"
$extDir = "$phpDir\ext"
$phpIni = "$phpDir\php.ini"

Write-Host "PHP Info:" -ForegroundColor Yellow
Write-Host "  Directory: $phpDir"
Write-Host "  Extension Dir: $extDir"
Write-Host "  php.ini: $phpIni"
Write-Host ""

Write-Host "Langkah-langkah instalasi:" -ForegroundColor Green
Write-Host ""
Write-Host "1. Download ODBC Driver 17/18 for SQL Server" -ForegroundColor White
Write-Host "   URL: https://aka.ms/downloadmsodbcsql" -ForegroundColor Gray
Write-Host "   Atau: https://go.microsoft.com/fwlink/?linkid=2249004" -ForegroundColor Gray
Write-Host ""

Write-Host "2. Install ODBC Driver (double-click file yang didownload)" -ForegroundColor White
Write-Host ""

Write-Host "3. Download PHP SQL Server Driver" -ForegroundColor White
Write-Host "   URL: https://github.com/microsoft/msphpsql/releases" -ForegroundColor Gray
Write-Host "   Pilih versi terbaru (SQLSRV-5.12.0 atau lebih baru)" -ForegroundColor Gray
Write-Host ""

Write-Host "4. Extract dan copy 2 file DLL ini ke folder ext:" -ForegroundColor White
Write-Host "   - php_pdo_sqlsrv_84_ts_x64.dll  (atau php_pdo_sqlsrv_83_ts_x64.dll)" -ForegroundColor Gray
Write-Host "   - php_sqlsrv_84_ts_x64.dll      (atau php_sqlsrv_83_ts_x64.dll)" -ForegroundColor Gray
Write-Host "   Destination: $extDir" -ForegroundColor Gray
Write-Host ""

Write-Host "5. Edit php.ini dan tambahkan baris berikut:" -ForegroundColor White
Write-Host "   extension=php_pdo_sqlsrv_84_ts_x64" -ForegroundColor Gray
Write-Host "   extension=php_sqlsrv_84_ts_x64" -ForegroundColor Gray
Write-Host "   (atau gunakan versi 83 jika DLL untuk 84 tidak ada)" -ForegroundColor Gray
Write-Host ""

Write-Host "6. Restart Laragon" -ForegroundColor White
Write-Host ""

Write-Host "7. Verifikasi dengan command:" -ForegroundColor White
Write-Host "   php -m | Select-String sqlsrv" -ForegroundColor Gray
Write-Host ""

# Cek apakah DLL sudah ada
Write-Host "=== Checking Current Status ===" -ForegroundColor Cyan
Write-Host ""

$dll84_1 = Test-Path "$extDir\php_pdo_sqlsrv_84_ts_x64.dll"
$dll84_2 = Test-Path "$extDir\php_sqlsrv_84_ts_x64.dll"
$dll83_1 = Test-Path "$extDir\php_pdo_sqlsrv_83_ts_x64.dll"
$dll83_2 = Test-Path "$extDir\php_sqlsrv_83_ts_x64.dll"

if ($dll84_1 -or $dll83_1) {
    Write-Host "✓ php_pdo_sqlsrv DLL found" -ForegroundColor Green
} else {
    Write-Host "✗ php_pdo_sqlsrv DLL NOT found" -ForegroundColor Red
}

if ($dll84_2 -or $dll83_2) {
    Write-Host "✓ php_sqlsrv DLL found" -ForegroundColor Green
} else {
    Write-Host "✗ php_sqlsrv DLL NOT found" -ForegroundColor Red
}

Write-Host ""

# Cek php.ini
$iniContent = Get-Content -Path $phpIni -Raw
if ($iniContent -match "extension.*sqlsrv") {
    Write-Host "✓ php.ini has sqlsrv extension configured" -ForegroundColor Green
} else {
    Write-Host "✗ php.ini does NOT have sqlsrv extension" -ForegroundColor Red
}

Write-Host ""
Write-Host "Jika semua ✓ (hijau), restart Laragon dan test koneksi!" -ForegroundColor Yellow
