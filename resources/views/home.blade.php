@extends('layouts.app')

@section('title', 'Beranda-SIPEDES')

@section('content')

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

  <!-- Artikel Section -->
  <section id="artikel" class="container mx-auto px-6 py-12 max-w-6xl">
    <h2 class="text-3xl font-bold text-green-700 mb-8 text-center">Artikel Terbaru</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Card Artikel 1 -->
      <article class="bg-white rounded-2xl shadow-md hover:shadow-xl transition p-6 flex flex-col">
        <img src="{{ asset('assets/images/artikel1.jpg') }}" alt="Judul Artikel 1" class="rounded-xl mb-4 object-cover h-48 w-full">
        <h3 class="text-xl font-semibold mb-2">Meningkatkan Pelayanan Digital di Desa Setro</h3>
        <p class="text-gray-600 flex-grow">Digitalisasi administrasi desa memudahkan masyarakat dalam pengurusan surat tanpa harus datang langsung ke kantor desa.</p>
        <a href="#" class="mt-4 text-green-700 font-semibold hover:underline">Baca Selengkapnya &rarr;</a>
      </article>

      <!-- Card Artikel 2 -->
      <article class="bg-white rounded-2xl shadow-md hover:shadow-xl transition p-6 flex flex-col">
        <img src="{{ asset('assets/images/artikel2.jpg') }}" alt="Judul Artikel 2" class="rounded-xl mb-4 object-cover h-48 w-full">
        <h3 class="text-xl font-semibold mb-2">Potensi Pertanian Desa Setro</h3>
        <p class="text-gray-600 flex-grow">Desa Setro memiliki tanah subur dan banyak petani yang produktif, menjadikan sektor pertanian sebagai tulang punggung ekonomi.</p>
        <a href="#" class="mt-4 text-green-700 font-semibold hover:underline">Baca Selengkapnya &rarr;</a>
      </article>

      <!-- Card Artikel 3 -->
      <article class="bg-white rounded-2xl shadow-md hover:shadow-xl transition p-6 flex flex-col">
        <img src="{{ asset('assets/images/artikel3.jpg') }}" alt="Judul Artikel 3" class="rounded-xl mb-4 object-cover h-48 w-full">
        <h3 class="text-xl font-semibold mb-2">Wisata Alam Desa Setro yang Menawan</h3>
        <p class="text-gray-600 flex-grow">Keindahan alam dan budaya lokal desa Setro menjadi daya tarik wisata yang terus berkembang pesat.</p>
        <a href="#" class="mt-4 text-green-700 font-semibold hover:underline">Baca Selengkapnya &rarr;</a>
      </article>
    </div>
  </section>

  <script>
    // Toggle mobile menu
    const btn = document.getElementById('menu-btn');
    const menu = document.getElementById('menu');

    btn.addEventListener('click', () => {
      menu.classList.toggle('hidden');
    });
  </script>

@endsection
