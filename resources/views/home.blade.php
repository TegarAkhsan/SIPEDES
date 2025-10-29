@extends('layouts.app')

@section('title', 'Beranda - SIPEDES')

@section('content')
<!-- Hero Section -->
<main class="flex-grow bg-gradient-to-br from-green-50 to-green-100">
  <div class="container mx-auto px-6 py-20 flex flex-col md:flex-row items-center gap-12 max-w-7xl">
      <div class="absolute inset-0">
    <img src="{{ asset('assets/images/BalaiDesa-Setro.jpeg') }}" alt="Desa Setro"
         class="w-full h-full object-cover opacity-10">
  </div>


    <!-- Hero Text -->
    <div class="md:w-1/2 text-center md:text-left space-y-6 animate-fade-in">
      <h1 class="text-5xl md:text-6xl font-extrabold text-green-800 leading-tight">
        Selamat Datang di<br />
        <span class="text-green-600">Sistem Persuratan Desa Setro</span>
      </h1>
      <p class="text-gray-700 text-lg leading-relaxed">
        Platform digital modern untuk mengelola surat masuk dan keluar di Desa Setro.
        Sederhana, cepat, dan transparan demi pelayanan publik yang efisien dan ramah teknologi.
      </p>
      <a href="#tentang"
        class="inline-block bg-green-700 hover:bg-green-800 text-white px-8 py-3 rounded-full font-semibold shadow-md transition-transform transform hover:-translate-y-1 hover:shadow-lg">
        Pelajari Lebih Lanjut
      </a>
    </div>

    <!-- Hero Image -->
    <div class="md:w-1/2 flex justify-center">
      <div class="relative w-full max-w-md">
        <img
          src="{{ asset('assets/images/BalaiDesa-Setro.jpeg') }}"
          alt="Pemandangan Desa Setro"
          class="rounded-3xl shadow-2xl object-cover w-full max-h-[420px] transform hover:scale-105 transition duration-500" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-3xl"></div>
      </div>
    </div>
  </div>
</main>

<!-- Tentang Section -->
<section id="tentang" class="py-16 bg-white relative">
  <div class="container mx-auto px-6 max-w-6xl text-center">
    <h2 class="text-4xl font-bold text-green-700 mb-6 relative inline-block">
      Tentang Desa Setro
      <span class="block h-1 w-20 bg-green-500 mx-auto mt-2 rounded-full"></span>
    </h2>

    <p class="text-gray-700 leading-relaxed text-lg max-w-3xl mx-auto">
      Desa Setro merupakan desa yang asri dengan penduduk ramah dan tradisi budaya yang kuat.
      Terletak di kawasan perbukitan hijau, desa ini mengandalkan sektor pertanian dan pariwisata sebagai sumber utama kehidupan.
      Melalui sistem persuratan digital SIPEDES, Desa Setro bertransformasi menuju pelayanan publik yang efektif dan akuntabel.
    </p>

    <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Card 1 -->
      <div class="bg-green-50 p-8 rounded-2xl shadow hover:shadow-lg transition">
        <h3 class="text-xl font-semibold text-green-700 mb-2">Digitalisasi Surat</h3>
        <p class="text-gray-600 text-sm leading-relaxed">
          Mengelola surat masuk dan keluar secara digital untuk efisiensi dan transparansi.
        </p>
      </div>
      <!-- Card 2 -->
      <div class="bg-green-50 p-8 rounded-2xl shadow hover:shadow-lg transition">
        <h3 class="text-xl font-semibold text-green-700 mb-2">Pelayanan Masyarakat</h3>
        <p class="text-gray-600 text-sm leading-relaxed">
          Memberikan kemudahan akses bagi warga untuk pengajuan dan pemantauan surat.
        </p>
      </div>
      <!-- Card 3 -->
      <div class="bg-green-50 p-8 rounded-2xl shadow hover:shadow-lg transition">
        <h3 class="text-xl font-semibold text-green-700 mb-2">Desa Maju & Transparan</h3>
        <p class="text-gray-600 text-sm leading-relaxed">
          Mendorong kemajuan tata kelola desa yang profesional dan berbasis data.
        </p>
      </div>
    </div>
  </div>

  <!-- Background Shape -->
  <div class="absolute top-0 left-0 w-full h-24 bg-gradient-to-b from-green-100 to-transparent -z-10"></div>
</section>

<!-- Simple Fade-in Animation -->
<style>
  @keyframes fade-in {
    0% { opacity: 0; transform: translateY(10px); }
    100% { opacity: 1; transform: translateY(0); }
  }
  .animate-fade-in { animation: fade-in 1s ease-in-out; }
</style>

<script>
  // Toggle mobile menu
  const btn = document.getElementById('menu-btn');
  const menu = document.getElementById('menu');
  if (btn && menu) {
    btn.addEventListener('click', () => menu.classList.toggle('hidden'));
  }
</script>
@endsection
