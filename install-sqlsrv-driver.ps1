# Script untuk install SQL Server Driver untuk PHP 8.4

Write-Host "=== Instalasi SQL Server Driver untuk PHP 8.4 ===" -ForegroundColor Cyan
Write-Host ""

$phpVersion = "8.4"
$phpDir = "C:\laragon\bin\php\php-8.4.12-Win32-vs17-x64"
$phpIni = "$phpDir\php.ini"
$extDir = "$phpDir\ext"

# Cek apakah PHP directory ada
if (-not (Test-Path $phpDir)) {
    Write-Host "Error: PHP directory tidak ditemukan di $phpDir" -ForegroundColor Red
    exit 1
}

Write-Host "PHP Directory: $phpDir" -ForegroundColor Green
Write-Host "Extension Directory: $extDir" -ForegroundColor Green
Write-Host ""

# URL untuk download driver (Microsoft SQL Server Driver untuk PHP 8.3+)
$driverUrl = "https://download.microsoft.com/download/6/9/c/69c15ac2-fc79-4e57-a036-e56f4cc97f95/SQLSRV512.EXE"
$downloadPath = "$env:TEMP\SQLSRV512.EXE"

Write-Host "Mendownload SQL Server Driver..." -ForegroundColor Yellow

try {
    # Download driver
    Invoke-WebRequest -Uri $driverUrl -OutFile $downloadPath -UseBasicParsing
    Write-Host "✓ Download selesai" -ForegroundColor Green
    
    # Extract driver
    Write-Host "Extracting driver..." -ForegroundColor Yellow
    $extractPath = "$env:TEMP\sqlsrv_extracted"
    
    if (Test-Path $extractPath) {
        Remove-Item -Path $extractPath -Recurse -Force
    }
    
    New-Item -ItemType Directory -Path $extractPath | Out-Null
    
    # Self-extracting exe
    Start-Process -FilePath $downloadPath -ArgumentList "/Q", "/C", "/T:$extractPath" -Wait
    
    Write-Host "✓ Extract selesai" -ForegroundColor Green
    
    # Cari file DLL yang tepat untuk PHP 8.3+ (x64, thread-safe)
    $dllFiles = @(
        "php_pdo_sqlsrv_83_ts_x64.dll",
        "php_sqlsrv_83_ts_x64.dll"
    )
    
    Write-Host ""
    Write-Host "Menyalin DLL files ke extension directory..." -ForegroundColor Yellow
    
    foreach ($dll in $dllFiles) {
        $sourcePath = Get-ChildItem -Path $extractPath -Filter $dll -Recurse | Select-Object -First 1
        
        if ($sourcePath) {
            Copy-Item -Path $sourcePath.FullName -Destination "$extDir\$dll" -Force
            Write-Host "✓ Copied: $dll" -ForegroundColor Green
        } else {
            Write-Host "✗ Not found: $dll" -ForegroundColor Red
        }
    }
    
    # Update php.ini
    Write-Host ""
    Write-Host "Mengupdate php.ini..." -ForegroundColor Yellow
    
    $iniContent = Get-Content -Path $phpIni
    $needUpdate = $false
    
    if ($iniContent -notmatch "extension=php_pdo_sqlsrv") {
        Add-Content -Path $phpIni -Value "`nextension=php_pdo_sqlsrv_83_ts_x64"
        Write-Host "✓ Added: extension=php_pdo_sqlsrv_83_ts_x64" -ForegroundColor Green
        $needUpdate = $true
    }
    
    if ($iniContent -notmatch "extension=php_sqlsrv") {
        Add-Content -Path $phpIni -Value "extension=php_sqlsrv_83_ts_x64"
        Write-Host "✓ Added: extension=php_sqlsrv_83_ts_x64" -ForegroundColor Green
        $needUpdate = $true
    }
    
    if (-not $needUpdate) {
        Write-Host "✓ php.ini sudah memiliki konfigurasi yang benar" -ForegroundColor Green
    }
    
    # Cleanup
    Remove-Item -Path $downloadPath -Force -ErrorAction SilentlyContinue
    Remove-Item -Path $extractPath -Recurse -Force -ErrorAction SilentlyContinue
    
    Write-Host ""
    Write-Host "=== Instalasi Selesai ===" -ForegroundColor Cyan
    Write-Host ""
    Write-Host "PENTING: Restart Laragon atau PHP-FPM agar perubahan berlaku!" -ForegroundColor Yellow
    Write-Host ""
    Write-Host "Setelah restart, jalankan:" -ForegroundColor White
    Write-Host "  php -m | Select-String sqlsrv" -ForegroundColor Gray
    Write-Host ""
    
} catch {
    Write-Host ""
    Write-Host "Error: $_" -ForegroundColor Red
    Write-Host ""
    Write-Host "Instalasi manual:" -ForegroundColor Yellow
    Write-Host "1. Download: https://aka.ms/downloadmsodbcsql" -ForegroundColor White
    Write-Host "2. Download: https://docs.microsoft.com/en-us/sql/connect/php/download-drivers-php-sql-server" -ForegroundColor White
    Write-Host "3. Extract dan copy DLL ke: $extDir" -ForegroundColor White
    Write-Host "4. Edit php.ini dan tambahkan:" -ForegroundColor White
    Write-Host "   extension=php_pdo_sqlsrv_83_ts_x64" -ForegroundColor Gray
    Write-Host "   extension=php_sqlsrv_83_ts_x64" -ForegroundColor Gray
}
