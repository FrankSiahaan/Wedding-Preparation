<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Profil Saya - WeddingMart</title>
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

  {{-- MAIN CONTENT --}}
  <main class="container mx-auto px-4 max-w-5xl py-6">
    
    <div class="bg-white rounded-lg shadow-sm p-6">
      
      {{-- Header --}}
      <div class="mb-6">
        <h1 class="text-xl font-bold text-gray-900 mb-1">Profil Saya</h1>
        <p class="text-xs text-gray-600">Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</p>
      </div>

      <div class="flex flex-col lg:flex-row gap-6">
        
        {{-- Left Side - Form --}}
        <div class="flex-1">
          <form class="space-y-4">
            
            {{-- Username --}}
            <div class="flex flex-col sm:flex-row sm:items-center gap-2">
              <label class="w-28 text-xs text-gray-600 shrink-0">Username</label>
              <div class="flex-1 text-xs text-gray-900">alyatriswani</div>
            </div>

            {{-- Nama --}}
            <div class="flex flex-col sm:flex-row sm:items-center gap-2">
              <label class="w-28 text-xs text-gray-600 shrink-0">Nama</label>
              <input type="text" 
                     class="flex-1 px-3 py-1.5 border border-gray-300 rounded text-xs focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                     placeholder="Masukkan nama Anda">
            </div>

            {{-- Email --}}
            <div class="flex flex-col sm:flex-row sm:items-center gap-2">
              <label class="w-28 text-xs text-gray-600 shrink-0">Email</label>
              <div class="flex-1 flex items-center gap-2">
                <span class="text-xs text-gray-900">al**********@gmail.com</span>
                <button type="button" class="text-xs text-blue-600 hover:text-blue-700">Ubah</button>
              </div>
            </div>

            {{-- Nomor Telepon --}}
            <div class="flex flex-col sm:flex-row sm:items-center gap-2">
              <label class="w-28 text-xs text-gray-600 shrink-0">Nomor Telepon</label>
              <div class="flex-1 flex items-center gap-2">
                <span class="text-xs text-gray-900">***********17</span>
                <button type="button" class="text-xs text-blue-600 hover:text-blue-700">Ubah</button>
              </div>
            </div>

            {{-- Jenis Kelamin --}}
            <div class="flex flex-col sm:flex-row sm:items-start gap-2">
              <label class="w-28 text-xs text-gray-600 shrink-0 pt-1.5">Jenis Kelamin</label>
              <div class="flex-1 flex gap-4">
                <label class="flex items-center gap-1.5 cursor-pointer">
                  <input type="radio" name="gender" value="male" class="w-3.5 h-3.5 text-orange-600 focus:ring-orange-500">
                  <span class="text-xs text-gray-700">Laki-laki</span>
                </label>
                <label class="flex items-center gap-1.5 cursor-pointer">
                  <input type="radio" name="gender" value="female" class="w-3.5 h-3.5 text-orange-600 focus:ring-orange-500">
                  <span class="text-xs text-gray-700">Perempuan</span>
                </label>
                <label class="flex items-center gap-1.5 cursor-pointer">
                  <input type="radio" name="gender" value="other" class="w-3.5 h-3.5 text-orange-600 focus:ring-orange-500">
                  <span class="text-xs text-gray-700">Lainnya</span>
                </label>
              </div>
            </div>

            {{-- Tanggal Lahir --}}
            <div class="flex flex-col sm:flex-row sm:items-start gap-2">
              <label class="w-28 text-xs text-gray-600 shrink-0 pt-1.5">Tanggal lahir</label>
              <div class="flex-1 flex flex-wrap gap-2">
                <select class="px-2 py-1.5 border border-gray-300 rounded text-xs text-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 min-w-[100px]">
                  <option value="">Tanggal</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                  <option value="21">21</option>
                  <option value="22">22</option>
                  <option value="23">23</option>
                  <option value="24">24</option>
                  <option value="25">25</option>
                  <option value="26">26</option>
                  <option value="27">27</option>
                  <option value="28">28</option>
                  <option value="29">29</option>
                  <option value="30">30</option>
                  <option value="31">31</option>
                </select>
                <select class="px-2 py-1.5 border border-gray-300 rounded text-xs text-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 min-w-[120px]">
                  <option value="">Bulan</option>
                  <option value="1">Januari</option>
                  <option value="2">Februari</option>
                  <option value="3">Maret</option>
                  <option value="4">April</option>
                  <option value="5">Mei</option>
                  <option value="6">Juni</option>
                  <option value="7">Juli</option>
                  <option value="8">Agustus</option>
                  <option value="9">September</option>
                  <option value="10">Oktober</option>
                  <option value="11">November</option>
                  <option value="12">Desember</option>
                </select>
                <select class="px-2 py-1.5 border border-gray-300 rounded text-xs text-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 min-w-[100px]">
                  <option value="">Tahun</option>
                  <option value="2025">2025</option>
                  <option value="2024">2024</option>
                  <option value="2023">2023</option>
                  <option value="2022">2022</option>
                  <option value="2021">2021</option>
                  <option value="2020">2020</option>
                  <option value="2019">2019</option>
                  <option value="2018">2018</option>
                  <option value="2017">2017</option>
                  <option value="2016">2016</option>
                  <option value="2015">2015</option>
                  <option value="2014">2014</option>
                  <option value="2013">2013</option>
                  <option value="2012">2012</option>
                  <option value="2011">2011</option>
                  <option value="2010">2010</option>
                  <option value="2009">2009</option>
                  <option value="2008">2008</option>
                  <option value="2007">2007</option>
                  <option value="2006">2006</option>
                  <option value="2005">2005</option>
                  <option value="2004">2004</option>
                  <option value="2003">2003</option>
                  <option value="2002">2002</option>
                  <option value="2001">2001</option>
                  <option value="2000">2000</option>
                  <option value="1999">1999</option>
                  <option value="1998">1998</option>
                  <option value="1997">1997</option>
                  <option value="1996">1996</option>
                  <option value="1995">1995</option>
                  <option value="1994">1994</option>
                  <option value="1993">1993</option>
                  <option value="1992">1992</option>
                  <option value="1991">1991</option>
                  <option value="1990">1990</option>
                </select>
              </div>
            </div>

            {{-- Submit Button --}}
            <div class="flex flex-col sm:flex-row sm:items-center gap-2">
              <div class="w-28 shrink-0"></div>
              <div class="flex-1">
                <button type="submit" 
                        class="px-6 py-1.5 bg-orange-600 hover:bg-orange-700 text-white text-xs font-medium rounded transition-colors">
                  Simpan
                </button>
              </div>
            </div>

          </form>
        </div>

        {{-- Right Side - Profile Picture --}}
        <div class="lg:w-64 flex flex-col items-center justify-start pt-3 border-l border-gray-200 pl-6">
          <div class="w-24 h-24 rounded-full overflow-hidden bg-gray-100 mb-3">
            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=300&q=80" 
                 alt="Profile Picture" 
                 class="w-full h-full object-cover">
          </div>
          <button type="button" class="px-4 py-1.5 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded text-xs transition-colors">
            Pilih Gambar
          </button>
          <div class="mt-3 text-center">
            <p class="text-[10px] text-gray-500">Ukuran gambar: maks. 1 MB</p>
            <p class="text-[10px] text-gray-500">Format gambar: .JPEG, .PNG</p>
          </div>
        </div>

      </div>

    </div>

  </main>

  {{-- FOOTER --}}
  <footer class="bg-white border-t mt-37">
    <div class="container mx-auto px-4 max-w-5xl py-2.5 text-center text-xs text-gray-500">
      &copy; {{ now()->year }} WeddingMart • Marketplace Persiapan Pernikahan Terpercaya
    </div>
  </footer>

</body>
</html>
