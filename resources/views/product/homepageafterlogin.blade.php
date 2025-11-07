<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>WeddingMart - Marketplace Persiapan Pernikahan Terpercaya</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-dvh bg-gray-50 text-gray-900 font-sans">

  <!-- HEADER (compact) -->
  <header class="bg-white">
    <div class="container mx-auto px-4 max-w-6xl">
      <nav class="flex items-center justify-between h-14">
        <!-- Logo -->
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

        <!-- Search pill -->
        <div class="hidden md:flex flex-1 max-w-2xl mx-4">
          <div class="relative w-full">
            <input type="text" placeholder="Cari gaun pengantin, dekorasi, fotografi, dan lainnya..."
              class="w-full pl-9 pr-3 py-2 rounded-full text-sm bg-pink-50/70 placeholder-pink-400 border border-pink-100 focus:border-pink-300 focus:outline-none focus:ring-2 focus:ring-pink-200" />
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-pink-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.3-4.3M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15z"/>
            </svg>
          </div>
        </div>

        <!-- Actions -->
        <div class="flex items-center gap-3">
          <button class="hidden sm:grid place-items-center w-8 h-8 rounded-full border border-gray-200 text-gray-700 hover:bg-gray-50">
            <svg class="w-4.5 h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M3 7l9 4 9-4M3 7l9-4 9 4M3 7v10l9 4 9-4V7"/></svg>
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
          <button class="md:hidden grid place-items-center w-8 h-8 rounded-full border border-gray-200 text-gray-700 hover:bg-gray-50">
            <svg class="w-4.5 h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
          </button>
        </div>
      </nav>
    </div>
    <div class="border-t border-pink-100/70"></div>
  </header>

  <main>
    <!-- HERO (compact) -->
    <section class="min-h-[56vh] md:min-h-[64vh] bg-gradient-to-br from-pink-50 via-pink-100 to-white flex items-center">
      <div class="container mx-auto px-4 max-w-6xl">
        <div class="grid lg:grid-cols-2 gap-8 items-center">
          <div class="space-y-6">
            <div class="space-y-3">
              <h1 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight">
                Wujudkan Pernikahan<br><span class="text-pink-600">Impian Anda</span>
              </h1>
              <p class="text-base md:text-[17px] text-gray-600 leading-relaxed max-w-md">
                Temukan semua kebutuhan pernikahan Anda dalam satu platform. Dari
                gaun pengantin hingga venue, kami menyediakan vendor terpercaya dengan kualitas terbaik.
              </p>
            </div>
            <div class="flex flex-wrap gap-3">
              <a href="#" class="px-6 py-2.5 bg-pink-600 text-white font-semibold rounded-xl hover:bg-pink-700 transition-colors shadow-md text-sm">Mulai Belanja</a>
              <button class="px-6 py-2.5 border border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 transition-colors text-sm">Lihat Sebagai Vendor</button>
            </div>
          </div>
          <div class="relative">
            <div class="relative bg-white rounded-2xl shadow-xl overflow-hidden">
              <img src="https://images.unsplash.com/photo-1594736797933-d0501ba2fe65?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Wedding Dress" class="w-full h-80 md:h-88 object-cover">
              <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
            </div>
            <div class="absolute -top-3 -right-3 w-20 h-20 bg-pink-100 rounded-full opacity-60"></div>
            <div class="absolute -bottom-3 -left-3 w-14 h-14 bg-yellow-100 rounded-full opacity-60"></div>
          </div>
        </div>
      </div>
    </section>

    <!-- KATEGORI PRODUK (rapat ke bawah) -->
    <section class="pt-8 pb-4 bg-white">
      <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-8">
          <h2 class="text-2xl md:text-[28px] font-bold text-gray-900">Kategori Produk</h2>
          <p class="text-gray-600 text-sm md:text-base">Temukan semua kebutuhan pernikahan Anda</p>
        </div>

        <div class="grid grid-cols-3 md:grid-cols-5 gap-6">
          <!-- Dekorasi -->
          <div class="text-center group cursor-pointer">
            <div class="w-14 h-14 mx-auto mb-3 bg-pink-100 rounded-full flex items-center justify-center group-hover:bg-pink-200 transition-colors">
              <svg class="w-7 h-7 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
            <h3 class="font-semibold text-gray-900 text-sm">Dekorasi</h3>
            <p class="text-xs text-gray-500 mt-0.5">300+</p>
          </div>
          <!-- Fotografi -->
          <div class="text-center group cursor-pointer">
            <div class="w-14 h-14 mx-auto mb-3 bg-blue-100 rounded-full flex items-center justify-center group-hover:bg-blue-200 transition-colors">
              <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <h3 class="font-semibold text-gray-900 text-sm">Fotografi</h3>
            <p class="text-xs text-gray-500 mt-0.5">150+</p>
          </div>
          <!-- Katering -->
          <div class="text-center group cursor-pointer">
            <div class="w-14 h-14 mx-auto mb-3 bg-green-100 rounded-full flex items-center justify-center group-hover:bg-green-200 transition-colors">
              <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"/></svg>
            </div>
            <h3 class="font-semibold text-gray-900 text-sm">Katering</h3>
            <p class="text-xs text-gray-500 mt-0.5">85+</p>
          </div>
          <!-- Venue -->
          <div class="text-center group cursor-pointer">
            <div class="w-14 h-14 mx-auto mb-3 bg-purple-100 rounded-full flex items-center justify-center group-hover:bg-purple-200 transition-colors">
              <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
            </div>
            <h3 class="font-semibold text-gray-900 text-sm">Venue</h3>
            <p class="text-xs text-gray-500 mt-0.5">75+</p>
          </div>
          <!-- Pakaian -->
          <div class="text-center group cursor-pointer">
            <div class="w-14 h-14 mx-auto mb-3 bg-yellow-100 rounded-full flex items-center justify-center group-hover:bg-yellow-200 transition-colors">
              <svg class="w-7 h-7 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            </div>
            <h3 class="font-semibold text-gray-900 text-sm">Pakaian</h3>
            <p class="text-xs text-gray-500 mt-0.5">200+</p>
          </div>
        </div>
            </div>
            <h3 class="font-semibold text-gray-900 text-sm">Lainnya</h3>
            <p class="text-xs text-gray-500 mt-0.5"></p>
          </div>
        </div>
      </div>
    </section>

    <!-- PRODUK PILIHAN (judul kecil, jarak atas pendek, 6 kolom) -->
    <section class="pt-3 pb-8 bg-gray-50">
      <div class="mx-auto px-4 max-w-7xl">
        <div class="flex items-end justify-between mb-4">
          <div>
            <h2 class="text-[18px] md:text-[20px] font-bold text-gray-900 leading-tight">Produk Pilihan</h2>
            <p class="text-gray-600 text-xs md:text-sm mt-0.5">Produk terpopuler dari vendor terpercaya</p>
          </div>
          <a href="#" class="inline-flex items-center gap-1.5 rounded-full border border-pink-200 bg-pink-50 text-pink-700 text-xs font-medium px-3 py-1.5 hover:bg-pink-100 transition-colors">
            Lihat Semua
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
          </a>
        </div>

        <!-- 2 → 3 → 4 → 6 kolom -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4 md:gap-5">
          <!-- Card 1 -->
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

          <!-- Card 2 -->
          <article class="bg-white border rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
            <div class="aspect-[3/2] overflow-hidden">
              <img src="https://images.unsplash.com/photo-1465495976277-4387d4b0e4a6?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="Cincin Kawin Emas 18K" class="w-full h-full object-cover" referrerpolicy="no-referrer">
            </div>
            <div class="p-3">
              <div class="flex items-center gap-2 text-[11px] text-gray-700 mb-1">
                <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded-full bg-yellow-100 text-yellow-800">
                  <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>4.9
                </span><span class="text-gray-500">(137 ulasan)</span>
              </div>
              <h3 class="font-semibold text-gray-900 text-[14.5px] leading-snug">Cincin Kawin Emas 18K</h3>
              <p class="text-[11px] text-gray-500 mt-0.5">Golden Ring Studio</p>
              <div class="mt-2"><div class="text-pink-600 font-bold text-sm">Rp 8.500.000</div><div class="text-[11px] text-gray-400 line-through">Rp 10.000.000</div></div>
            </div>
          </article>

          <!-- Card 3 -->
          <article class="bg-white border rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
            <div class="aspect-[3/2] overflow-hidden">
              <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=800&q=80" alt="Paket Dekorasi Pelaminan Premium" class="w-full h-full object-cover">
            </div>
            <div class="p-3">
              <div class="flex items-center gap-2 text-[11px] text-gray-700 mb-1">
                <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded-full bg-yellow-100 text-yellow-800">
                  <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>4.7
                </span><span class="text-gray-500">(112 ulasan)</span>
              </div>
              <h3 class="font-semibold text-gray-900 text-[14.5px] leading-snug">Paket Dekorasi Pelaminan Premium</h3>
              <p class="text-[11px] text-gray-500 mt-0.5">Floral Dreams</p>
              <div class="mt-2"><div class="text-pink-600 font-bold text-sm">Rp 25.000.000</div><div class="text-[11px] text-gray-400 line-through">Rp 30.000.000</div></div>
            </div>
          </article>

          <!-- Card 4 -->
          <article class="bg-white border rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
            <div class="aspect-[3/2] overflow-hidden">
              <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=800&q=80" alt="Paket Fotografi Wedding Premium" class="w-full h-full object-cover">
            </div>
            <div class="p-3">
              <div class="flex items-center gap-2 text-[11px] text-gray-700 mb-1">
                <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded-full bg-yellow-100 text-yellow-800">
                  <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>4.9
                </span><span class="text-gray-500">(104 ulasan)</span>
              </div>
              <h3 class="font-semibold text-gray-900 text-[14.5px] leading-snug">Paket Fotografi Wedding Premium</h3>
              <p class="text-[11px] text-gray-500 mt-0.5">Capture Moments</p>
              <div class="mt-2"><div class="text-pink-600 font-bold text-sm">Rp 12.000.000</div><div class="text-[11px] text-gray-400 line-through">Rp 15.000.000</div></div>
            </div>
          </article>

          <!-- Card 5 -->
          <article class="bg-white border rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
            <div class="aspect-[3/2] overflow-hidden">
              <img src="https://images.unsplash.com/photo-1507146426996-ef05306b995a?auto=format&fit=crop&w=800&q=80" alt="Paket Venue Romantis Tepi Kolam" class="w-full h-full object-cover">
            </div>
            <div class="p-3">
              <div class="flex items-center gap-2 text-[11px] text-gray-700 mb-1">
                <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded-full bg-yellow-100 text-yellow-800">
                  <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>4.6
                </span><span class="text-gray-500">(89 ulasan)</span>
              </div>
              <h3 class="font-semibold text-gray-900 text-[14.5px] leading-snug">Paket Venue Romantis Tepi Kolam</h3>
              <p class="text-[11px] text-gray-500 mt-0.5">Emerald Hall</p>
              <div class="mt-2"><div class="text-pink-600 font-bold text-sm">Rp 35.000.000</div><div class="text-[11px] text-gray-400 line-through">Rp 42.000.000</div></div>
            </div>
          </article>

          <!-- Card 6 -->
          <article class="bg-white border rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
            <div class="aspect-[3/2] overflow-hidden">
              <img src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=800&q=80" alt="Paket Katering Premium" class="w-full h-full object-cover">
            </div>
            <div class="p-3">
              <div class="flex items-center gap-2 text-[11px] text-gray-700 mb-1">
                <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded-full bg-yellow-100 text-yellow-800">
                  <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.401 8.168L12 18.896 4.665 23.165l1.401-8.168L.132 9.21l8.2-1.192z"/></svg>4.7
                </span><span class="text-gray-500">(76 ulasan)</span>
              </div>
              <h3 class="font-semibold text-gray-900 text-[14.5px] leading-snug">Paket Katering Premium</h3>
              <p class="text-[11px] text-gray-500 mt-0.5">Prima Catering</p>
              <div class="mt-2"><div class="text-pink-600 font-bold text-sm">Rp 28.000.000</div><div class="text-[11px] text-gray-400 line-through">Rp 33.000.000</div></div>
            </div>
          </article>
        </div>
      </div>
    </section>
  </main>

  <!-- FOOTER (ultra-compact) -->
  <footer class="bg-white border-t">
    <div class="container mx-auto px-4 max-w-6xl py-2.5 text-center text-xs text-gray-500">
      &copy; {{ now()->year }} WeddingMart • Marketplace Persiapan Pernikahan Terpercaya
    </div>
  </footer>

</body>
</html>
