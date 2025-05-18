<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Sistem Persuratan Desa Setro')</title>

  <!-- Favicon -->
  <link rel="icon" href="{{ asset('Logo Kab-Gresik.jpg') }}" type="image/png" />

  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-green-200 to-blue-100 min-h-screen flex flex-col">

  <!-- Navbar -->
  <nav class="sticky top-0 bg-white shadow-md z-50">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">
      <div class="flex items-center space-x-3">
        <a href="{{ route('home') }}">
          <img src="{{ asset('assets/images/Logo Desa-Setro.jpeg') }}" alt="Logo Desa Setro" class="w-12 h-12 rounded-full object-cover" />
        </a>
        <a href="{{ route('home') }}" class="font-bold text-xl text-green-700 hover:underline">Desa Setro</a>
      </div>

      <ul class="hidden md:flex space-x-8 text-gray-700 font-semibold">
        <li><a href="{{ route('home') }}" class="hover:text-green-700 transition">Beranda</a></li>
        <li><a href="{{ route('surat-masuk.index') }}" class="hover:text-green-700 transition">Surat Masuk</a></li>
        <li><a href="{{ route('surat-keluar.index') }}" class="hover:text-green-700 transition">Surat Keluar</a></li>
        <li><a href="{{ route('arsip.index') }}" class="hover:text-green-700 transition">Arsip</a></li>
        <li><a href="{{ route('penduduk.index') }}" class="hover:text-green-700 transition">Data Penduduk</a></li>
        <li><a href="{{ route('tentang') }}" class="hover:text-green-700 transition">Tentang Desa</a></li>
      </ul>

      <!-- Auth Buttons -->
      <div class="hidden md:flex items-center space-x-4">
        @auth
          <span class="text-sm text-gray-600">Halo, {{ Auth::user()->name }}</span>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-semibold">
              Logout
            </button>
          </form>
        @else
          <a href="{{ route('login') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-semibold">
            Login
          </a>
        @endauth
      </div>

      <!-- Mobile menu button -->
      <button id="menu-btn" class="md:hidden focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>
    </div>

    <!-- Mobile Menu -->
    <div id="menu" class="hidden md:hidden px-6 pb-4 space-y-3 bg-white">
      <a href="{{ route('home') }}" class="block text-green-700 font-semibold hover:underline">Beranda</a>
      <a href="{{ route('surat-masuk.index') }}" class="block text-green-700 font-semibold hover:underline">Surat Masuk</a>
      <a href="{{ route('surat-keluar.index') }}" class="block text-green-700 font-semibold hover:underline">Surat Keluar</a>
      <a href="{{ route('arsip.index') }}" class="block text-green-700 font-semibold hover:underline">Arsip</a>
      <a href="{{ route('penduduk.index') }}" class="block text-green-700 font-semibold hover:underline">Data Penduduk</a>
      <a href="{{ route('tentang') }}" class="block text-green-700 font-semibold hover:underline">Tentang Desa</a>

      @auth
        <span class="block text-sm text-gray-600">Halo, {{ Auth::user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="w-full text-left text-red-600 font-semibold hover:underline">Logout</button>
        </form>
      @else
        <a href="{{ route('login') }}" class="block text-green-700 font-semibold hover:underline">Login</a>
      @endauth
    </div>
  </nav>
  <!-- End Navbar -->

  <!-- Konten Halaman -->
  <main class="flex-grow">
    @yield('content')
  </main>

  <!-- JS Tambahan jika ada -->
  @yield('scripts')

  <!-- Script toggle menu -->
  <script>
    const btn = document.getElementById('menu-btn');
    const menu = document.getElementById('menu');
    btn?.addEventListener('click', () => {
      menu.classList.toggle('hidden');
    });
  </script>

  <!-- Footer -->
  <footer class="bg-green-800 text-green-100 py-10 mt-12">
  <div class="container mx-auto px-6 max-w-6xl">
    <div class="flex flex-col md:flex-row justify-between gap-10">
      
      <!-- Tentang -->
      <div class="md:w-1/3">
        <h3 class="text-xl font-semibold mb-4">Tentang Desa Setro</h3>
        <p class="text-green-200 leading-relaxed">
          Desa Setro adalah desa asri dengan tradisi kuat dan komunitas ramah. Kami berkomitmen menggunakan teknologi untuk pelayanan publik terbaik.
        </p>
      </div>

      <!-- Navigasi -->
      <div class="md:w-1/3">
        <h3 class="text-xl font-semibold mb-4">Navigasi</h3>
        <ul>
          <li><a href="{{ route('home') }}" class="hover:underline hover:text-green-300 transition">Beranda</a></li>
          <li><a href="{{ route('surat-masuk.index') }}" class="hover:underline hover:text-green-300 transition">Surat Masuk</a></li>
          <li><a href="{{ route('surat-keluar.index') }}" class="hover:underline hover:text-green-300 transition">Surat Keluar</a></li>
          <li><a href="{{ route('arsip.index') }}" class="hover:underline hover:text-green-300 transition">Arsip</a></li>
          <li><a href="{{ route('penduduk.index') }}" class="hover:underline hover:text-green-300 transition">Data Penduduk</a></li>
          <li><a href="{{ route('tentang') }}" class="hover:underline hover:text-green-300 transition">Tentang Desa</a></li>
        </ul>
      </div>

      <!-- Kontak -->
      <div class="md:w-1/3">
        <h3 class="text-xl font-semibold mb-4">Kontak Kami</h3>
        <p>Email: <a href="mailto:info@desasetro.id" class="hover:underline hover:text-green-300">info@desasetro.id</a></p>
        <p>Telepon: <a href="tel:+621234567890" class="hover:underline hover:text-green-300">+62 123 4567 890</a></p>
        <p>Alamat: Jl. Raya Desa Setro No.123, Kabupaten, Provinsi</p>

        <div class="flex space-x-4 mt-4">
          <a href="#" aria-label="Facebook" class="hover:text-green-300 transition">
            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M22,12A10,10 0 1,0 12,22A10,10 0 0,0 22,12M14.12,12H12.5V18H9.5V12H8V9.5H9.5V8.17C9.5,7.04 10.12,5.5 12,5.5H14V8H13.25C12.73,8 12.5,8.3 12.5,8.67V9.5H14L13.63,12Z"/></svg>
          </a>
          <a href="#" aria-label="Twitter" class="hover:text-green-300 transition">
            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M22.46 6c-.77.35-1.6.59-2.46.7a4.26 4.26 0 0 0 1.88-2.36 8.5 8.5 0 0 1-2.7 1.03 4.24 4.24 0 0 0-7.22 3.87 12.04 12.04 0 0 1-8.75-4.43 4.25 4.25 0 0 0 1.31 5.67 4.21 4.21 0 0 1-1.92-.53v.05a4.25 4.25 0 0 0 3.4 4.16 4.28 4.28 0 0 1-1.91.07 4.26 4.26 0 0 0 3.97 2.96A8.5 8.5 0 0 1 2 19.54a12 12 0 0 0 6.5 1.9c7.8 0 12.07-6.46 12.07-12.07 0-.18-.01-.36-.02-.54A8.6 8.6 0 0 0 22.46 6z"/></svg>
          </a>
          <a href="#" aria-label="Instagram" class="hover:text-green-300 transition">
            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2zm4.25 3.5a4.5 4.5 0 1 0 0 9 4.5 4.5 0 0 0 0-9zm5.5-.75a1.25 1.25 0 1 0 0 2.5 1.25 1.25 0 0 0 0-2.5z"/></svg>
          </a>
        </div>
      </div>

    </div>

    <div class="border-t border-green-700 mt-10 pt-6 text-center text-green-300 text-sm">
      &copy; {{ date('Y') }} Desa Setro. Semua hak cipta dilindungi.
    </div>
  </div>
</footer>

</body>
</html>
