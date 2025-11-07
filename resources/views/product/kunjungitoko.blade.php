<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Atelier Bride - WeddingMart</title>
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
          <button class="grid place-items-center w-8 h-8 rounded-full border border-gray-200 text-gray-700 hover:bg-gray-50 relative">
            <svg class="w-4.5 h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
              <path d="M6 6h15l-1.5 9h-12L6 6Z"/><path d="M6 6l-1-3H2"/><circle cx="9.5" cy="20" r="1.4"/><circle cx="17.5" cy="20" r="1.4"/>
            </svg>
            <span class="absolute -top-1 -right-1 w-4 h-4 bg-pink-600 text-white text-[9px] font-bold rounded-full grid place-items-center">3</span>
          </button>
          <button class="grid place-items-center w-8 h-8 rounded-full border border-gray-200 text-gray-700 hover:bg-gray-50">
            <svg class="w-4.5 h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
              <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
          </button>
        </div>
      </nav>
    </div>
  </header>

  {{-- VENDOR PROFILE --}}
  <section class="bg-white border-b border-gray-100">
    <div class="container mx-auto px-4 max-w-6xl py-6">
      <div class="flex flex-col md:flex-row gap-6">
        
        {{-- Vendor Avatar & Info --}}
        <div class="flex gap-4 items-start">
          {{-- Avatar --}}
          <div class="w-24 h-24 rounded-full bg-gradient-to-br from-pink-100 to-purple-100 flex items-center justify-center shrink-0 ring-4 ring-pink-50">
            <svg class="w-12 h-12 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
            </svg>
          </div>

          {{-- Vendor Details --}}
          <div class="flex-1">
            <div class="flex items-start justify-between mb-2">
              <div>
                <h1 class="text-xl font-bold text-gray-900 mb-1">Atelier Bride</h1>
                <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                  </svg>
                  <span>Jakarta Pusat, DKI Jakarta</span>
                </div>
              </div>

              {{-- Follow Button --}}
              <button class="px-4 py-2 bg-pink-600 hover:bg-pink-700 text-white text-sm font-semibold rounded-lg transition-colors flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Ikuti Toko
              </button>
            </div>

            {{-- Stats --}}
            <div class="flex items-center gap-6 mb-3">
              <div class="flex items-center gap-1.5">
                <svg class="w-4 h-4 fill-yellow-500" viewBox="0 0 24 24">
                  <path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/>
                </svg>
                <span class="text-sm font-semibold text-gray-900">4.9</span>
                <span class="text-sm text-gray-500">(847 ulasan)</span>
              </div>
              <div class="text-sm text-gray-600">
                <span class="font-semibold text-gray-900">156</span> Produk
              </div>
              <div class="text-sm text-gray-600">
                <span class="font-semibold text-gray-900">12.5k</span> Pengikut
              </div>
            </div>

            {{-- Description --}}
            <p class="text-sm text-gray-600 leading-relaxed mb-3">
              Spesialis gaun pengantin mewah dengan desain eksklusif. Melayani custom design dan ready-to-wear. Pengalaman 15+ tahun di industri wedding fashion.
            </p>

            {{-- Quick Actions --}}
            <div class="flex flex-wrap gap-2">
              <button class="px-3 py-1.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-medium rounded-lg transition-colors flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                </svg>
                Chat Penjual
              <button class="px-3 py-1.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-medium rounded-lg transition-colors flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                </svg>
                Bagikan
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- PRODUCTS SECTION --}}
  <main class="container mx-auto px-4 max-w-6xl py-6">
    
    {{-- Section Header --}}
    <div class="flex items-center justify-between mb-4">
      <h2 class="text-lg font-bold text-gray-900">Semua Produk</h2>
      
      {{-- Filter & Sort --}}
      <div class="flex items-center gap-2">
        <select class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-pink-500">
          <option>Terbaru</option>
          <option>Harga Terendah</option>
          <option>Harga Tertinggi</option>
          <option>Terlaris</option>
          <option>Rating Tertinggi</option>
        </select>
      </div>
    </div>

    {{-- Products Grid - 6 columns like homepage --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4 md:gap-5">
      
      {{-- Product Card 1 --}}
      <article class="bg-white border rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
        <div class="aspect-[3/2] overflow-hidden">
          <img src="https://images.unsplash.com/photo-1594736797933-d0501ba2fe65?auto=format&fit=crop&w=800&q=80" alt="Gaun Pengantin Mewah Collection" class="w-full h-full object-cover">
        </div>
        <div class="p-3">
          <div class="flex items-center gap-2 text-[11px] text-gray-700 mb-1">
            <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded-full bg-yellow-100 text-yellow-800">
              <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>4.8
            </span><span class="text-gray-500">(97 ulasan)</span>
          </div>
          <h3 class="font-semibold text-gray-900 text-[14.5px] leading-snug">Gaun Pengantin Mewah Collection</h3>
          <p class="text-[11px] text-gray-500 mt-0.5">Atelier Bride</p>
          <div class="mt-2"><div class="text-pink-600 font-bold text-sm">Rp 15.000.000</div><div class="text-[11px] text-gray-400 line-through">Rp 20.000.000</div></div>
        </div>
      </article>

      {{-- Product Card 2 --}}
      <article class="bg-white border rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
        <div class="aspect-[3/2] overflow-hidden">
          <img src="https://images.unsplash.com/photo-1465495976277-4387d4b0e4a6?auto=format&fit=crop&w=800&q=80" alt="Gaun Pengantin Modern Elegant" class="w-full h-full object-cover">
        </div>
        <div class="p-3">
          <div class="flex items-center gap-2 text-[11px] text-gray-700 mb-1">
            <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded-full bg-yellow-100 text-yellow-800">
              <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>4.9
            </span><span class="text-gray-500">(124 ulasan)</span>
          </div>
          <h3 class="font-semibold text-gray-900 text-[14.5px] leading-snug">Gaun Pengantin Modern Elegant</h3>
          <p class="text-[11px] text-gray-500 mt-0.5">Atelier Bride</p>
          <div class="mt-2"><div class="text-pink-600 font-bold text-sm">Rp 12.500.000</div><div class="text-[11px] text-gray-400 line-through">Rp 15.000.000</div></div>
        </div>
      </article>

      {{-- Product Card 3 --}}
      <article class="bg-white border rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
        <div class="aspect-[3/2] overflow-hidden">
          <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=800&q=80" alt="Wedding Dress Classic White" class="w-full h-full object-cover">
        </div>
        <div class="p-3">
          <div class="flex items-center gap-2 text-[11px] text-gray-700 mb-1">
            <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded-full bg-yellow-100 text-yellow-800">
              <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>4.7
            </span><span class="text-gray-500">(89 ulasan)</span>
          </div>
          <h3 class="font-semibold text-gray-900 text-[14.5px] leading-snug">Wedding Dress Classic White</h3>
          <p class="text-[11px] text-gray-500 mt-0.5">Atelier Bride</p>
          <div class="mt-2"><div class="text-pink-600 font-bold text-sm">Rp 18.000.000</div><div class="text-[11px] text-gray-400 line-through">Rp 22.000.000</div></div>
        </div>
      </article>

      {{-- Product Card 4 --}}
      <article class="bg-white border rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
        <div class="aspect-[3/2] overflow-hidden">
          <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=800&q=80" alt="Bridal Gown Custom Design" class="w-full h-full object-cover">
        </div>
        <div class="p-3">
          <div class="flex items-center gap-2 text-[11px] text-gray-700 mb-1">
            <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded-full bg-yellow-100 text-yellow-800">
              <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>5.0
            </span><span class="text-gray-500">(156 ulasan)</span>
          </div>
          <h3 class="font-semibold text-gray-900 text-[14.5px] leading-snug">Bridal Gown Custom Design</h3>
          <p class="text-[11px] text-gray-500 mt-0.5">Atelier Bride</p>
          <div class="mt-2"><div class="text-pink-600 font-bold text-sm">Rp 22.000.000</div><div class="text-[11px] text-gray-400 line-through">Rp 28.000.000</div></div>
        </div>
      </article>

      {{-- Product Card 5 --}}
      <article class="bg-white border rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
        <div class="aspect-[3/2] overflow-hidden">
          <img src="https://images.unsplash.com/photo-1507146426996-ef05306b995a?auto=format&fit=crop&w=800&q=80" alt="Simple Elegant Wedding Dress" class="w-full h-full object-cover">
        </div>
        <div class="p-3">
          <div class="flex items-center gap-2 text-[11px] text-gray-700 mb-1">
            <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded-full bg-yellow-100 text-yellow-800">
              <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>4.8
            </span><span class="text-gray-500">(67 ulasan)</span>
          </div>
          <h3 class="font-semibold text-gray-900 text-[14.5px] leading-snug">Simple Elegant Wedding Dress</h3>
          <p class="text-[11px] text-gray-500 mt-0.5">Atelier Bride</p>
          <div class="mt-2"><div class="text-pink-600 font-bold text-sm">Rp 9.500.000</div><div class="text-[11px] text-gray-400 line-through">Rp 12.000.000</div></div>
        </div>
      </article>

      {{-- Product Card 6 --}}
      <article class="bg-white border rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
        <div class="aspect-[3/2] overflow-hidden">
          <img src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=800&q=80" alt="Luxury Bridal Collection" class="w-full h-full object-cover">
        </div>
        <div class="p-3">
          <div class="flex items-center gap-2 text-[11px] text-gray-700 mb-1">
            <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded-full bg-yellow-100 text-yellow-800">
              <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>4.9
            </span><span class="text-gray-500">(143 ulasan)</span>
          </div>
          <h3 class="font-semibold text-gray-900 text-[14.5px] leading-snug">Luxury Bridal Collection 2025</h3>
          <p class="text-[11px] text-gray-500 mt-0.5">Atelier Bride</p>
          <div class="mt-2"><div class="text-pink-600 font-bold text-sm">Rp 25.000.000</div><div class="text-[11px] text-gray-400 line-through">Rp 30.000.000</div></div>
        </div>
      </article>

    </div>

    {{-- Pagination --}}
    <div class="flex items-center justify-center gap-2 mt-8">
      <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
      </button>
      <button class="px-3 py-2 bg-pink-600 text-white rounded-lg text-sm font-medium">1</button>
      <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">2</button>
      <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">3</button>
      <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
      </button>
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
