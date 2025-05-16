<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Home - Sistem Persuratan Desa Setro</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-green-200 to-blue-100 min-h-screen flex flex-col">

  <!-- Navbar -->
    <nav class="bg-white shadow-md">
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
        <!-- Mobile menu button -->
        <button id="menu-btn" class="md:hidden focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
        </button>
    </div>
    <!-- Mobile menu -->
    <div id="menu" class="hidden md:hidden px-6 pb-4 space-y-3 bg-white">
        <a href="{{ route('home') }}" class="block text-green-700 font-semibold hover:underline">Beranda</a>
        <a href="{{ route('surat-masuk.index') }}" class="block text-green-700 font-semibold hover:underline">Surat Masuk</a>
        <a href="{{ route('surat-keluar.index') }}" class="block text-green-700 font-semibold hover:underline">Surat Keluar</a>
        <a href="{{ route('arsip.index') }}" class="block text-green-700 font-semibold hover:underline">Arsip</a>
        <a href="{{ route('penduduk.index') }}" class="block text-green-700 font-semibold hover:underline">Data Penduduk</a>
        <a href="{{ route('tentang') }}" class="block text-green-700 font-semibold hover:underline">Tentang Desa</a>
    </div>
    </nav>
    <!-- End Navbar -->



  <!-- Hero Section -->
  <main class="flex-grow container mx-auto px-6 py-16 flex flex-col md:flex-row items-center gap-12 max-w-6xl">
    <div class="md:w-1/2 text-center md:text-left">
      <h1 class="text-5xl font-extrabold text-green-800 mb-6 leading-tight">
        Selamat Datang di Sistem Persuratan <br /> Desa Setro
      </h1>
      <p class="text-gray-700 text-lg mb-6">
        Platform modern berbasis web untuk mengelola surat masuk dan keluar di Desa Setro secara efisien dan digital. 
        Mempermudah administrasi desa dengan teknologi terkini demi pelayanan terbaik bagi masyarakat.
      </p>
      <a href="#tentang" class="inline-block bg-green-700 text-white px-6 py-3 rounded-full font-semibold hover:bg-green-800 transition">
        Pelajari Lebih Lanjut
      </a>
    </div>
    <div class="md:w-1/2">
      <img 
        src="{{ asset('assets/images/BalaiDesa-Setro.jpeg') }}" 
        alt="Pemandangan Desa Setro" 
        class="rounded-3xl shadow-lg object-cover w-full max-h-[400px]" />
    </div>
  </main>

  <!-- Tentang Desa Section -->
  <section id="tentang" class="bg-white shadow-lg rounded-3xl container mx-auto px-6 py-12 max-w-4xl text-center">
    <h2 class="text-3xl font-bold text-green-700 mb-6">Tentang Desa Setro</h2>
    <p class="text-gray-700 leading-relaxed text-lg max-w-3xl mx-auto">
      Desa Setro merupakan desa yang asri dengan penduduk yang ramah dan tradisi budaya yang kuat. 
      Berlokasi di tengah perbukitan yang hijau, desa ini mengandalkan sektor pertanian dan pariwisata sebagai sumber utama penghidupan. 
      Dengan dukungan teknologi melalui sistem persuratan digital ini, Desa Setro terus maju dan berkomitmen memberikan pelayanan terbaik bagi warganya.
    </p>
  </section>

  <script>
    // Toggle mobile menu
    const btn = document.getElementById('menu-btn');
    const menu = document.getElementById('menu');

    btn.addEventListener('click', () => {
      menu.classList.toggle('hidden');
    });
  </script>
</body>
</html>
