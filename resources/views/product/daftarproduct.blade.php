<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Semua Produk Wedding - WeddingMart</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-dvh bg-gray-50 text-gray-900 font-sans">

  {{-- HEADER --}}
  <header class="bg-white">
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

  <main class="container mx-auto px-4 max-w-7xl py-8">
    <div class="grid lg:grid-cols-[260px_1fr] gap-6">
      {{-- SIDEBAR FILTER --}}
      <aside class="lg:sticky lg:top-4 h-fit">
        <div class="bg-white rounded-xl p-5 shadow-sm">
          {{-- Filter Header --}}
          <div class="flex items-center justify-between mb-4">
            <h3 class="text-base font-semibold text-gray-900 flex items-center gap-2">
              <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
              </svg>
              Filter Produk
            </h3>
          </div>

          {{-- Kategori Filter --}}
          <div class="mb-6">
            <h4 class="text-sm font-semibold text-gray-900 mb-3">Kategori</h4>
            <div class="space-y-2">
              <label class="flex items-center gap-2 cursor-pointer group">
                <input type="checkbox" checked class="w-4 h-4 rounded border-gray-300 text-pink-600 focus:ring-pink-500">
                <span class="text-sm text-gray-700 group-hover:text-gray-900">Semua</span>
              </label>
              <label class="flex items-center gap-2 cursor-pointer group">
                <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-pink-600 focus:ring-pink-500">
                <span class="text-sm text-gray-700 group-hover:text-gray-900">Salon</span>
              </label>
              <label class="flex items-center gap-2 cursor-pointer group">
                <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-pink-600 focus:ring-pink-500">
                <span class="text-sm text-gray-700 group-hover:text-gray-900">Fotografi</span>
              </label>
              <label class="flex items-center gap-2 cursor-pointer group">
                <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-pink-600 focus:ring-pink-500">
                <span class="text-sm text-gray-700 group-hover:text-gray-900">Katering</span>
              </label>
              <label class="flex items-center gap-2 cursor-pointer group">
                <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-pink-600 focus:ring-pink-500">
                <span class="text-sm text-gray-700 group-hover:text-gray-900">Venue</span>
              </label>
              <label class="flex items-center gap-2 cursor-pointer group">
                <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-pink-600 focus:ring-pink-500">
                <span class="text-sm text-gray-700 group-hover:text-gray-900">Pakaian</span>
              </label>
            </div>
          </div>

          {{-- Lokasi Filter --}}
          <div class="mb-6">
            <h4 class="text-sm font-semibold text-gray-900 mb-3">Lokasi</h4>
            <div class="space-y-2">
              <label class="flex items-center gap-2 cursor-pointer group">
                <input type="radio" name="lokasi" class="w-4 h-4 border-gray-300 text-pink-600 focus:ring-pink-500">
                <span class="text-sm text-gray-700 group-hover:text-gray-900">Semua Lokasi</span>
              </label>
            </div>
          </div>

          {{-- Rentang Harga --}}
          <div class="mb-6">
            <h4 class="text-sm font-semibold text-gray-900 mb-3">Rentang Harga</h4>
            <div class="space-y-3">
              <input type="text" placeholder="Harga Minimum" 
                class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
              <input type="text" placeholder="Harga Maksimum" 
                class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
            </div>
          </div>

          {{-- Button Cari --}}
          <button class="w-full py-2.5 bg-pink-600 hover:bg-pink-700 text-white text-sm font-medium rounded-lg transition-colors">
            Cari
          </button>
        </div>
      </aside>

      {{-- MAIN CONTENT --}}
      <div>
        {{-- Page Header --}}
        <div class="mb-5">
          <h1 class="text-xl font-bold text-gray-900 mb-0.5">Semua Produk Wedding</h1>
          <p class="text-xs text-gray-600">Temukan vendor dan produk terbaik untuk pernikahan impian Anda</p>
        </div>

        {{-- Product Grid - 4 Kolom dengan proporsi pas --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
          {{-- Product Card 1 --}}
          <article class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow overflow-hidden group">
            <div class="aspect-[4/3] overflow-hidden">
              <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=800&q=80" 
                   alt="Paket Dekorasi Pelaminan Premium" 
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            </div>
            <div class="p-4">
              <div class="flex items-center gap-2 mb-2">
                <span class="inline-flex items-center gap-1 text-xs font-medium text-yellow-600">
                  <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                    <path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/>
                  </svg>
                  4.7
                </span>
                <span class="text-xs text-gray-500">(73)</span>
              </div>
              <h3 class="font-semibold text-gray-900 text-sm leading-snug mb-1.5 line-clamp-2">Paket Dekorasi Pelaminan Premium</h3>
              <p class="text-xs text-gray-500 mb-3">📍 Floral Dreams</p>
              <div class="text-pink-600 font-bold text-base">Rp 25.000.000</div>
            </div>
          </article>

          {{-- Product Card 2 --}}
          <article class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow overflow-hidden group">
            <div class="aspect-[4/3] overflow-hidden">
              <img src="https://images.unsplash.com/photo-1594736797933-d0501ba2fe65?auto=format&fit=crop&w=800&q=80" 
                   alt="Gaun Pengantin Mewah Collection" 
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            </div>
            <div class="p-4">
              <div class="flex items-center gap-2 mb-2">
                <span class="inline-flex items-center gap-1 text-xs font-medium text-yellow-600">
                  <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                    <path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/>
                  </svg>
                  4.8
                </span>
                <span class="text-xs text-gray-500">(89)</span>
              </div>
              <h3 class="font-semibold text-gray-900 text-sm leading-snug mb-1.5 line-clamp-2">Gaun Pengantin Mewah Collection</h3>
              <p class="text-xs text-gray-500 mb-3">📍 Angge Bride</p>
              <div class="flex items-baseline gap-2">
                <div class="text-pink-600 font-bold text-base">Rp 15.000.000</div>
                <div class="text-xs text-gray-400 line-through">Rp 20.000.000</div>
              </div>
            </div>
          </article>

          {{-- Product Card 3 --}}
          <article class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow overflow-hidden group">
            <div class="aspect-[4/3] overflow-hidden">
              <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=800&q=80" 
                   alt="Paket Fotografi Wedding Premium" 
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            </div>
            <div class="p-4">
              <div class="flex items-center gap-2 mb-2">
                <span class="inline-flex items-center gap-1 text-xs font-medium text-yellow-600">
                  <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                    <path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/>
                  </svg>
                  4.9
                </span>
                <span class="text-xs text-gray-500">(124)</span>
              </div>
              <h3 class="font-semibold text-gray-900 text-sm leading-snug mb-1.5 line-clamp-2">Paket Fotografi Wedding Premium</h3>
              <p class="text-xs text-gray-500 mb-3">📍 Capture Moments</p>
              <div class="text-pink-600 font-bold text-base">Rp 12.000.000</div>
            </div>
          </article>

          {{-- Product Card 4 --}}
          <article class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow overflow-hidden group">
            <div class="aspect-[4/3] overflow-hidden">
              <img src="https://images.unsplash.com/photo-1555244162-803834f70033?auto=format&fit=crop&w=800&q=80" 
                   alt="Paket Katering Wedding Mewah" 
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            </div>
            <div class="p-4">
              <div class="flex items-center gap-2 mb-2">
                <span class="inline-flex items-center gap-1 text-xs font-medium text-yellow-600">
                  <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                    <path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/>
                  </svg>
                  4.6
                </span>
                <span class="text-xs text-gray-500">(96)</span>
              </div>
              <h3 class="font-semibold text-gray-900 text-sm leading-snug mb-1.5 line-clamp-2">Paket Katering Wedding Mewah</h3>
              <p class="text-xs text-gray-500 mb-3">📍 Istana Rasa</p>
              <div class="text-pink-600 font-bold text-base">Rp 8.000.000</div>
            </div>
          </article>

          {{-- Product Card 5 --}}
          <article class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow overflow-hidden group">
            <div class="aspect-[4/3] overflow-hidden">
              <img src="https://images.unsplash.com/photo-1519167758481-83f29da8a789?auto=format&fit=crop&w=800&q=80" 
                   alt="Venue Pernikahan Garden View" 
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            </div>
            <div class="p-4">
              <div class="flex items-center gap-2 mb-2">
                <span class="inline-flex items-center gap-1 text-xs font-medium text-yellow-600">
                  <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                    <path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/>
                  </svg>
                  4.8
                </span>
                <span class="text-xs text-gray-500">(67)</span>
              </div>
              <h3 class="font-semibold text-gray-900 text-sm leading-snug mb-1.5 line-clamp-2">Venue Pernikahan Garden View</h3>
              <p class="text-xs text-gray-500 mb-3">📍 Paradise Garden</p>
              <div class="text-pink-600 font-bold text-base">Rp 35.000.000</div>
            </div>
          </article>

          {{-- Product Card 6 --}}
          <article class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow overflow-hidden group">
            <div class="aspect-[4/3] overflow-hidden">
              <img src="https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=800&q=80" 
                   alt="Make Up Artist Profesional" 
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            </div>
            <div class="p-4">
              <div class="flex items-center gap-2 mb-2">
                <span class="inline-flex items-center gap-1 text-xs font-medium text-yellow-600">
                  <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                    <path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/>
                  </svg>
                  4.9
                </span>
                <span class="text-xs text-gray-500">(152)</span>
              </div>
              <h3 class="font-semibold text-gray-900 text-sm leading-snug mb-1.5 line-clamp-2">Make Up Artist Profesional</h3>
              <p class="text-xs text-gray-500 mb-3">📍 Bella Beauty Studio</p>
              <div class="text-pink-600 font-bold text-base">Rp 5.000.000</div>
            </div>
          </article>

          {{-- Product Card 7 --}}
          <article class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow overflow-hidden group">
            <div class="aspect-[4/3] overflow-hidden">
              <img src="https://images.unsplash.com/photo-1522673607200-164d1b6ce486?auto=format&fit=crop&w=800&q=80" 
                   alt="Paket Undangan Digital Premium" 
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            </div>
            <div class="p-4">
              <div class="flex items-center gap-2 mb-2">
                <span class="inline-flex items-center gap-1 text-xs font-medium text-yellow-600">
                  <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                    <path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/>
                  </svg>
                  4.7
                </span>
                <span class="text-xs text-gray-500">(43)</span>
              </div>
              <h3 class="font-semibold text-gray-900 text-sm leading-snug mb-1.5 line-clamp-2">Paket Undangan Digital Premium</h3>
              <p class="text-xs text-gray-500 mb-3">📍 DigiWed Invitation</p>
              <div class="text-pink-600 font-bold text-base">Rp 1.500.000</div>
            </div>
          </article>

          {{-- Product Card 8 --}}
          <article class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow overflow-hidden group">
            <div class="aspect-[4/3] overflow-hidden">
              <img src="https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?auto=format&fit=crop&w=800&q=80" 
                   alt="Paket Musik & Entertainment" 
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            </div>
            <div class="p-4">
              <div class="flex items-center gap-2 mb-2">
                <span class="inline-flex items-center gap-1 text-xs font-medium text-yellow-600">
                  <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                    <path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/>
                  </svg>
                  4.8
                </span>
                <span class="text-xs text-gray-500">(78)</span>
              </div>
              <h3 class="font-semibold text-gray-900 text-sm leading-snug mb-1.5 line-clamp-2">Paket Musik & Entertainment</h3>
              <p class="text-xs text-gray-500 mb-3">📍 Harmony Band</p>
              <div class="text-pink-600 font-bold text-base">Rp 10.000.000</div>
            </div>
          </article>

          {{-- Product Card 9 --}}
          <article class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow overflow-hidden group">
            <div class="aspect-[4/3] overflow-hidden">
              <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=800&q=80" 
                   alt="Dekorasi Outdoor Garden" 
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            </div>
            <div class="p-4">
              <div class="flex items-center gap-2 mb-2">
                <span class="inline-flex items-center gap-1 text-xs font-medium text-yellow-600">
                  <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                    <path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/>
                  </svg>
                  4.7
                </span>
                <span class="text-xs text-gray-500">(55)</span>
              </div>
              <h3 class="font-semibold text-gray-900 text-sm leading-snug mb-1.5 line-clamp-2">Dekorasi Outdoor Garden</h3>
              <p class="text-xs text-gray-500 mb-3">📍 Green Concept Decor</p>
              <div class="text-pink-600 font-bold text-base">Rp 18.000.000</div>
            </div>
          </article>

          {{-- Product Card 10 --}}
          <article class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow overflow-hidden group">
            <div class="aspect-[4/3] overflow-hidden">
              <img src="https://images.unsplash.com/photo-1460978812857-470ed1c77af0?auto=format&fit=crop&w=800&q=80" 
                   alt="Wedding Organizer Profesional" 
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            </div>
            <div class="p-4">
              <div class="flex items-center gap-2 mb-2">
                <span class="inline-flex items-center gap-1 text-xs font-medium text-yellow-600">
                  <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                    <path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/>
                  </svg>
                  5.0
                </span>
                <span class="text-xs text-gray-500">(210)</span>
              </div>
              <h3 class="font-semibold text-gray-900 text-sm leading-snug mb-1.5 line-clamp-2">Wedding Organizer Profesional</h3>
              <p class="text-xs text-gray-500 mb-3">📍 Perfect Day WO</p>
              <div class="text-pink-600 font-bold text-base">Rp 20.000.000</div>
            </div>
          </article>

          {{-- Product Card 11 --}}
          <article class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow overflow-hidden group">
            <div class="aspect-[4/3] overflow-hidden">
              <img src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?auto=format&fit=crop&w=800&q=80" 
                   alt="Paket Honeymoon Bali" 
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            </div>
            <div class="p-4">
              <div class="flex items-center gap-2 mb-2">
                <span class="inline-flex items-center gap-1 text-xs font-medium text-yellow-600">
                  <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                    <path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/>
                  </svg>
                  4.9
                </span>
                <span class="text-xs text-gray-500">(188)</span>
              </div>
              <h3 class="font-semibold text-gray-900 text-sm leading-snug mb-1.5 line-clamp-2">Paket Honeymoon Bali</h3>
              <p class="text-xs text-gray-500 mb-3">📍 Paradise Travel</p>
              <div class="text-pink-600 font-bold text-base">Rp 15.000.000</div>
            </div>
          </article>

          {{-- Product Card 12 --}}
          <article class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow overflow-hidden group">
            <div class="aspect-[4/3] overflow-hidden">
              <img src="https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=800&q=80" 
                   alt="Cincin Kawin Emas" 
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            </div>
            <div class="p-4">
              <div class="flex items-center gap-2 mb-2">
                <span class="inline-flex items-center gap-1 text-xs font-medium text-yellow-600">
                  <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                    <path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/>
                  </svg>
                  4.8
                </span>
                <span class="text-xs text-gray-500">(134)</span>
              </div>
              <h3 class="font-semibold text-gray-900 text-sm leading-snug mb-1.5 line-clamp-2">Cincin Kawin Emas Premium</h3>
              <p class="text-xs text-gray-500 mb-3">📍 Golden Ring Jewelry</p>
              <div class="text-pink-600 font-bold text-base">Rp 12.500.000</div>
            </div>
          </article>
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
