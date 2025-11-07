<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Detail Produk - WeddingMart</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-dvh bg-gray-50 text-gray-900 font-sans">

  {{-- HEADER --}}
  <header class="bg-white sticky top-0 z-50 border-b border-gray-100">
    <div class="container mx-auto px-4 max-w-6xl">
      <nav class="flex items-center justify-between h-14">
        {{-- Logo --}}
        <a href="#" class="flex items-center gap-2.5 shrink-0">
          <div class="w-8 h-8 rounded-full grid place-items-center bg-yellow-50 ring-1 ring-yellow-100">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="#C7A434" stroke-width="1.5" aria-hidden="true">
              <path d="M12 21s-6.716-4.319-9.192-8.055C1.113 10.16 2.02 7.5 4.41 6.5 6.08 5.8 7.93 6.3 9 7.6c1.07-1.3 2.92-1.8 4.59-1.1 2.39 1 3.3 3.66 1.6 6.45C18.72 16.68 12 21 12 21Z"/>
            </svg>
          </div>
          <div class="leading-tight">
            <div class="text-base font-semibold text-gray-900">WeddingMart</div>
            <div class="text-[10px] text-gray-500 -mt-0.5">Marketplace Pernikahan Terpercaya</div>
          </div>
        </a>

        {{-- Search pill --}}
        <div class="hidden md:flex flex-1 max-w-2xl mx-4">
          <div class="relative w-full">
            <input type="text" placeholder="Cari gaun pengantin, dekorasi, fotografi, dan lainnya..."
              class="w-full pl-9 pr-3 py-2 rounded-full text-sm bg-pink-50/70 placeholder-pink-400 border border-pink-100 focus:border-pink-300 focus:outline-none focus:ring-2 focus:ring-pink-200" />
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-pink-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.3-4.3M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15z"/>
            </svg>
          </div>
        </div>

        {{-- Actions --}}
        <div class="flex items-center gap-3">
          <button class="hidden sm:grid place-items-center w-8 h-8 rounded-full border border-gray-200 text-gray-700 hover:bg-gray-50">
            <svg class="w-4.5 h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
              <path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
          </button>
          <button class="grid place-items-center w-8 h-8 rounded-full border border-gray-200 text-gray-700 hover:bg-gray-50">
            <svg class="w-4.5 h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
              <path d="M6 6h15l-1.5 9h-12L6 6Z"/><path d="M6 6l-1-3H2"/><circle cx="9.5" cy="20" r="1.4"/><circle cx="17.5" cy="20" r="1.4"/>
            </svg>
          </button>
          <a href="#" class="hidden sm:flex items-center gap-1.5 pl-1.5 pr-2.5 py-1 rounded-full border border-pink-100 bg-pink-50/60">
            <span class="grid place-items-center w-6.5 h-6.5 rounded-full bg-pink-100 text-pink-700">
              <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                <circle cx="12" cy="8.4" r="3.1"/><path d="M4 20a8 8 0 0 1 16 0"/>
              </svg>
            </span>
            <span class="text-[13px] text-gray-700">Sari Dewi</span>
          </a>
        </div>
      </nav>
    </div>
  </header>

  {{-- MAIN CONTENT --}}
  <main class="container mx-auto px-4 max-w-6xl py-4">
    
    {{-- Wrapper dengan spacing konsisten --}}
    <div class="space-y-4">
      
      {{-- Product Detail Section --}}
      <div class="grid lg:grid-cols-2 gap-4">
      
      {{-- LEFT COLUMN: Product Images Only --}}
      <div class="bg-white rounded-lg border border-gray-100 p-4">
        {{-- Main Image - Diperkecil --}}
        <div class="bg-gray-50 rounded-lg overflow-hidden mb-3 max-w-sm mx-auto">
          <img src="https://images.unsplash.com/photo-1594736797933-d0501ba2fe65?auto=format&fit=crop&w=600&q=80" 
               alt="Gaun Pengantin" 
               class="w-full aspect-square object-cover">
        </div>

        {{-- Thumbnail Images --}}
        <div class="grid grid-cols-4 gap-2 max-w-sm mx-auto">
          <button class="bg-white rounded-lg overflow-hidden border-2 border-pink-500">
            <img src="https://images.unsplash.com/photo-1594736797933-d0501ba2fe65?auto=format&fit=crop&w=200&q=80" 
                 alt="Thumbnail 1" 
                 class="w-full aspect-square object-cover">
          </button>
          <button class="bg-white rounded-lg overflow-hidden border border-gray-200 hover:border-pink-300">
            <img src="https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=200&q=80" 
                 alt="Thumbnail 2" 
                 class="w-full aspect-square object-cover">
          </button>
          <button class="bg-white rounded-lg overflow-hidden border border-gray-200 hover:border-pink-300">
            <img src="https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?auto=format&fit=crop&w=200&q=80" 
                 alt="Thumbnail 3" 
                 class="w-full aspect-square object-cover">
          </button>
          <button class="bg-white rounded-lg overflow-hidden border border-gray-200 hover:border-pink-300">
            <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=200&q=80" 
                 alt="Thumbnail 4" 
                 class="w-full aspect-square object-cover">
          </button>
        </div>
      </div>

      {{-- RIGHT COLUMN: Product Info --}}
      <div class="flex items-center">
        {{-- Product Title & Rating --}}
        <div class="bg-white rounded-lg p-3 mb-3 border border-gray-100 w-full">
          <h1 class="text-sm font-bold text-gray-900 mb-1.5">Gaun Pengantin Mewah Collection Premium</h1>
          
          <div class="flex items-center gap-2 mb-2">
            <div class="flex items-center gap-0.5">
              <span class="text-yellow-500 font-semibold text-xs">4.8</span>
              <div class="flex gap-0.5">
                <svg class="w-3 h-3 fill-yellow-500" viewBox="0 0 24 24">
                  <path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/>
                </svg>
                <svg class="w-3 h-3 fill-yellow-500" viewBox="0 0 24 24">
                  <path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/>
                </svg>
                <svg class="w-3 h-3 fill-yellow-500" viewBox="0 0 24 24">
                  <path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/>
                </svg>
                <svg class="w-3 h-3 fill-yellow-500" viewBox="0 0 24 24">
                  <path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/>
                </svg>
                <svg class="w-3 h-3 fill-gray-300" viewBox="0 0 24 24">
                  <path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/>
                </svg>
              </div>
              <span class="text-[10px] text-gray-500">(89 ulasan)</span>
            </div>
            <div class="border-l border-gray-300 pl-2">
              <span class="text-[10px] text-gray-600">197 Terjual</span>
            </div>
          </div>

          {{-- Price --}}
          <div class="mb-2.5">
            <div class="text-lg font-bold text-pink-600">Rp 15.000.000</div>
          </div>

          {{-- Pilih Ukuran --}}
          <div class="mb-2">
            <label class="block text-[10px] font-semibold text-gray-900 mb-1">Pilih Ukuran</label>
            <select class="w-full px-2.5 py-1.5 border border-gray-300 rounded-lg text-xs focus:outline-none focus:ring-1 focus:ring-pink-500">
              <option>Pilih ukuran</option>
              <option>S</option>
              <option>M</option>
              <option>L</option>
              <option>XL</option>
              <option>Custom</option>
            </select>
          </div>

          {{-- Pilih Warna --}}
          <div class="mb-2">
            <label class="block text-[10px] font-semibold text-gray-900 mb-1">Pilih Warna</label>
            <select class="w-full px-2.5 py-1.5 border border-gray-300 rounded-lg text-xs focus:outline-none focus:ring-1 focus:ring-pink-500">
              <option>Pilih warna</option>
              <option>Putih Gading</option>
              <option>Putih Murni</option>
              <option>Champagne</option>
              <option>Krem</option>
            </select>
          </div>

          {{-- Quantity --}}
          <div class="mb-2.5">
            <label class="block text-[10px] font-semibold text-gray-900 mb-1">Jumlah</label>
            <div class="flex items-center gap-2">
              <button class="w-7 h-7 rounded-lg border border-gray-300 hover:bg-gray-50 flex items-center justify-center">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                </svg>
              </button>
              <input type="number" value="1" min="1" class="w-14 text-center py-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-pink-500 text-xs">
              <button class="w-7 h-7 rounded-lg border border-gray-300 hover:bg-gray-50 flex items-center justify-center">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
              </button>
            </div>
          </div>

          {{-- Action Buttons --}}
          <div class="flex gap-2 mb-2">
            <button class="flex-1 bg-pink-600 hover:bg-pink-700 text-white font-medium py-2 text-xs rounded-lg transition-colors">
              Beli Sekarang
            </button>
            <button class="flex-1 bg-white border-2 border-pink-600 text-pink-600 hover:bg-pink-50 font-medium py-2 text-xs rounded-lg transition-colors flex items-center justify-center gap-1">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
              </svg>
              Tambah ke Keranjang
            </button>
          </div>

          {{-- Features Badges - Dipindah ke Kanan --}}
          <div class="grid grid-cols-3 gap-1.5">
            <div class="bg-gray-50 rounded-lg p-1.5 text-center border border-gray-200">
              <div class="w-5 h-5 rounded-full bg-green-50 mx-auto mb-0.5 grid place-items-center">
                <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                  <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
              </div>
              <div class="text-[9px] font-medium text-gray-900 leading-tight">Garansi 30 Hari</div>
            </div>
            <div class="bg-gray-50 rounded-lg p-1.5 text-center border border-gray-200">
              <div class="w-5 h-5 rounded-full bg-blue-50 mx-auto mb-0.5 grid place-items-center">
                <svg class="w-3 h-3 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/>
                  <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"/>
                </svg>
              </div>
              <div class="text-[9px] font-medium text-gray-900 leading-tight">Free Ongkir</div>
            </div>
            <div class="bg-gray-50 rounded-lg p-1.5 text-center border border-gray-200">
              <div class="w-5 h-5 rounded-full bg-pink-50 mx-auto mb-0.5 grid place-items-center">
                <svg class="w-3 h-3 text-pink-600" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                </svg>
              </div>
              <div class="text-[9px] font-medium text-gray-900 leading-tight">Free Fitting 3x</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Description Section --}}
    <div class="bg-white rounded-lg p-4 mb-3 border border-gray-100">
      <h2 class="text-base font-bold text-gray-900 mb-3">Deskripsi Produk</h2>
      <div class="text-sm text-gray-700 leading-relaxed space-y-2">
        <p>Gaun pengantin mewah dengan desain klasik dan elegan. Dibuat dengan bahan premium berkualitas tinggi dengan detail renda yang sangat indah. Sempurna untuk hari istimewa Anda dengan cutting yang mengikuti lekuk tubuh secara sempurna.</p>
        
        <div class="mt-3">
          <h3 class="font-semibold text-gray-900 mb-1.5 text-sm">Keunggulan Produk:</h3>
          <ul class="list-disc list-inside space-y-1 text-gray-700 text-sm">
            <li>Bahan premium berkualitas tinggi</li>
            <li>Detail renda handmade</li>
            <li>Cutting yang sempurna</li>
            <li>Include petticoat</li>
            <li>Free fitting hingga 3x</li>
            <li>Garansi 30 hari</li>
          </ul>
        </div>
      </div>
      </div>

      {{-- Vendor Info Section - Full Width --}}
      <div class="bg-white rounded-lg p-4 border border-gray-100">
      <div class="flex items-center gap-3 mb-3">
        <div class="w-12 h-12 rounded-full bg-pink-100 grid place-items-center shrink-0">
          <svg class="w-6 h-6 text-pink-600" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
          </svg>
        </div>
        <div class="flex-1">
          <h3 class="font-semibold text-gray-900 text-sm">Wedding Paradise</h3>
          <div class="flex items-center gap-1 mt-0.5">
            <svg class="w-3.5 h-3.5 fill-yellow-500" viewBox="0 0 24 24">
              <path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/>
            </svg>
            <span class="text-xs font-medium">4.9</span>
            <span class="text-xs text-gray-500">(234 ulasan)</span>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-2 gap-3 mb-3">
        <div class="text-center py-2 bg-gray-50 rounded-lg border border-gray-100">
          <div class="text-xs text-gray-600">Rating Toko</div>
          <div class="text-sm font-semibold text-gray-900">4.9</div>
        </div>
        <div class="text-center py-2 bg-gray-50 rounded-lg border border-gray-100">
          <div class="text-xs text-gray-600">Produk</div>
          <div class="text-sm font-semibold text-gray-900">99+</div>
        </div>
      </div>

      <div class="grid grid-cols-2 gap-3">
        <button class="py-2 border border-gray-300 rounded-lg text-xs font-medium hover:bg-gray-50 flex items-center justify-center gap-1.5">
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
          </svg>
          Chat Penjual
        </button>
        <button class="py-2 border border-gray-300 rounded-lg text-xs font-medium hover:bg-gray-50">
          Kunjungi Toko
        </button>
      </div>
      </div>

      {{-- Reviews Section --}}
      <div class="bg-white rounded-lg p-4 border border-gray-100">
      <h2 class="text-base font-bold text-gray-900 mb-3">Ulasan Pembeli (89)</h2>

      {{-- Rating Summary --}}
      <div class="flex items-center gap-6 mb-4 pb-4 border-b">
        <div class="text-center">
          <div class="text-3xl font-bold text-gray-900 mb-1">4.8</div>
          <div class="flex justify-center mb-0.5">
            <svg class="w-4 h-4 fill-yellow-500" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>
            <svg class="w-4 h-4 fill-yellow-500" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>
            <svg class="w-4 h-4 fill-yellow-500" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>
            <svg class="w-4 h-4 fill-yellow-500" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>
            <svg class="w-4 h-4 fill-gray-300" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>
          </div>
          <div class="text-[10px] text-gray-500">89 ulasan</div>
        </div>

        <div class="flex-1 space-y-1.5">
          <div class="flex items-center gap-2">
            <div class="flex items-center gap-1 w-10">
              <span class="text-[10px]">5</span>
              <svg class="w-2.5 h-2.5 fill-yellow-500" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>
            </div>
            <div class="flex-1 h-1.5 bg-gray-200 rounded-full overflow-hidden">
              <div class="h-full bg-yellow-500" style="width: 67%"></div>
            </div>
            <span class="text-[10px] text-gray-600 w-6 text-right">60</span>
          </div>
          <div class="flex items-center gap-2">
            <div class="flex items-center gap-1 w-10">
              <span class="text-[10px]">4</span>
              <svg class="w-2.5 h-2.5 fill-yellow-500" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>
            </div>
            <div class="flex-1 h-1.5 bg-gray-200 rounded-full overflow-hidden">
              <div class="h-full bg-yellow-500" style="width: 16%"></div>
            </div>
            <span class="text-[10px] text-gray-600 w-6 text-right">14</span>
          </div>
          <div class="flex items-center gap-2">
            <div class="flex items-center gap-1 w-10">
              <span class="text-[10px]">3</span>
              <svg class="w-2.5 h-2.5 fill-yellow-500" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>
            </div>
            <div class="flex-1 h-1.5 bg-gray-200 rounded-full overflow-hidden">
              <div class="h-full bg-yellow-500" style="width: 6%"></div>
            </div>
            <span class="text-[10px] text-gray-600 w-6 text-right">5</span>
          </div>
          <div class="flex items-center gap-2">
            <div class="flex items-center gap-1 w-10">
              <span class="text-[10px]">2</span>
              <svg class="w-2.5 h-2.5 fill-yellow-500" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>
            </div>
            <div class="flex-1 h-1.5 bg-gray-200 rounded-full overflow-hidden">
              <div class="h-full bg-yellow-500" style="width: 6%"></div>
            </div>
            <span class="text-[10px] text-gray-600 w-6 text-right">5</span>
          </div>
          <div class="flex items-center gap-2">
            <div class="flex items-center gap-1 w-10">
              <span class="text-[10px]">1</span>
              <svg class="w-2.5 h-2.5 fill-yellow-500" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>
            </div>
            <div class="flex-1 h-1.5 bg-gray-200 rounded-full overflow-hidden">
              <div class="h-full bg-yellow-500" style="width: 6%"></div>
            </div>
            <span class="text-[10px] text-gray-600 w-6 text-right">5</span>
          </div>
        </div>
      </div>

      {{-- Review Items - Grid Card Format --}}
      <div class="grid gap-3">
        {{-- Review 1 --}}
        <div class="bg-gray-50 rounded-lg p-3 border border-gray-200">
          <div class="flex items-start gap-2 mb-2">
            <div class="w-8 h-8 rounded-full bg-pink-100 grid place-items-center shrink-0">
              <span class="text-xs font-semibold text-pink-600">S</span>
            </div>
            <div class="flex-1">
              <div class="flex items-center gap-2 mb-0.5">
                <span class="font-semibold text-xs">Sarah M.</span>
                <div class="flex">
                  <svg class="w-3 h-3 fill-yellow-500" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>
                  <svg class="w-3 h-3 fill-yellow-500" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>
                  <svg class="w-3 h-3 fill-yellow-500" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>
                  <svg class="w-3 h-3 fill-yellow-500" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>
                  <svg class="w-3 h-3 fill-yellow-500" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>
                </div>
              </div>
              <p class="text-[10px] text-gray-500 mb-1.5">2 minggu lalu</p>
            </div>
          </div>
          <p class="text-xs text-gray-700 mb-2">Gaun yang sangat indah! Kualitasnya luar biasa dan pelayanannya excellent. Sangat merekomendasikan!</p>
          <div class="text-[10px] text-gray-500 mb-2">Varian: Size M, Putih Gading</div>
          
          {{-- Review Images --}}
          <div class="flex gap-1.5">
            <img src="https://images.unsplash.com/photo-1594736797933-d0501ba2fe65?auto=format&fit=crop&w=100&q=80" 
                 alt="Review" 
                 class="w-14 h-14 rounded-lg object-cover border border-gray-300">
            <img src="https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=100&q=80" 
                 alt="Review" 
                 class="w-14 h-14 rounded-lg object-cover border border-gray-300">
          </div>
        </div>

        {{-- Review 2 --}}
        <div class="bg-gray-50 rounded-lg p-3 border border-gray-200">
          <div class="flex items-start gap-2 mb-2">
            <div class="w-8 h-8 rounded-full bg-blue-100 grid place-items-center shrink-0">
              <span class="text-xs font-semibold text-blue-600">D</span>
            </div>
            <div class="flex-1">
              <div class="flex items-center gap-2 mb-0.5">
                <span class="font-semibold text-xs">Diana L.</span>
                <div class="flex">
                  <svg class="w-3 h-3 fill-yellow-500" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>
                  <svg class="w-3 h-3 fill-yellow-500" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>
                  <svg class="w-3 h-3 fill-yellow-500" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>
                  <svg class="w-3 h-3 fill-yellow-500" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>
                  <svg class="w-3 h-3 fill-yellow-500" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>
                </div>
              </div>
              <p class="text-[10px] text-gray-500 mb-1.5">1 bulan lalu</p>
            </div>
          </div>
          <p class="text-xs text-gray-700 mb-2">Perfect! Gaunnya sesuai ekspektasi, fitting-nya juga pas banget. Vendor sangat responsif.</p>
          <div class="text-[10px] text-gray-500">Varian: Size L, Putih Murni</div>
        </div>

        {{-- Review 3 --}}
        <div class="bg-gray-50 rounded-lg p-3 border border-gray-200">
          <div class="flex items-start gap-2 mb-2">
            <div class="w-8 h-8 rounded-full bg-green-100 grid place-items-center shrink-0">
              <span class="text-xs font-semibold text-green-600">M</span>
            </div>
            <div class="flex-1">
              <div class="flex items-center gap-2 mb-0.5">
                <span class="font-semibold text-xs">Melinda K.</span>
                <div class="flex">
                  <svg class="w-3 h-3 fill-yellow-500" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>
                  <svg class="w-3 h-3 fill-yellow-500" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>
                  <svg class="w-3 h-3 fill-yellow-500" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>
                  <svg class="w-3 h-3 fill-yellow-500" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>
                  <svg class="w-3 h-3 fill-gray-300" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>
                </div>
              </div>
              <p class="text-[10px] text-gray-500 mb-1.5">2 bulan lalu</p>
            </div>
          </div>
          <p class="text-xs text-gray-700 mb-2">Gaun cantik sekali, tapi delivery agak telat. Overall satisfied dengan produknya.</p>
              <div class="text-[10px] text-gray-500">Varian: Size L, Champagne</div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </main>

    <!-- FOOTER (ultra-compact) -->
  <footer class="bg-white border-t">
    <div class="container mx-auto px-4 max-w-6xl py-2.5 text-center text-xs text-gray-500">
      &copy; {{ now()->year }} WeddingMart • Marketplace Persiapan Pernikahan Terpercaya
    </div>
  </footer>
  
</body>
</html>
