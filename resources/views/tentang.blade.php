@extends('layouts.app')

@section('title', 'Tentang Desa Setro - SIPEDES')

@section('content')
<!-- 🌿 Hero Section -->
<section class="relative bg-gradient-to-b from-green-700 via-green-600 to-green-500 text-white overflow-hidden">
  <div class="absolute inset-0">
    <img src="{{ asset('assets/images/BalaiDesa-Setro.jpeg') }}" alt="Desa Setro"
         class="w-full h-full object-cover opacity-25">
  </div>

  <div class="relative container mx-auto max-w-6xl px-6 py-28 flex flex-col md:flex-row items-center gap-12">
    <div class="md:w-3/5 text-center md:text-left space-y-6">
      <h1 class="text-5xl md:text-6xl font-extrabold leading-tight">
        Tentang <span class="text-lime-300">Desa Setro</span>
      </h1>
      <p class="text-green-100 text-lg leading-relaxed">
        Desa Setro merupakan desa yang terletak di wilayah perbukitan dengan panorama alam yang menyejukkan.
        Masyarakatnya dikenal ramah, menjunjung tinggi budaya tradisional, serta memiliki komitmen dalam menjaga
        kelestarian alam. Kini Desa Setro bertransformasi menuju <span class="font-semibold text-lime-200">desa digital</span>
        dengan penerapan sistem persuratan berbasis web (SIPEDES) untuk pelayanan publik yang lebih transparan dan efisien.
      </p>
    </div>
  </div>

  <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-white to-transparent"></div>
</section>

<!-- 🌾 Keunggulan Section -->
<section class="py-20 bg-white">
  <div class="container mx-auto max-w-6xl px-6">
    <div class="text-center mb-14">
      <h2 class="text-4xl font-bold text-green-700">Keunggulan Desa Setro</h2>
      <p class="text-gray-600 mt-3 text-lg">
        Nilai dan potensi yang menjadikan Desa Setro terus tumbuh sebagai desa maju dan berbudaya.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
      <div class="flex gap-4 items-start">
        <span class="text-green-600 text-3xl">🌿</span>
        <p class="text-gray-700 text-lg leading-relaxed">
          Lingkungan yang hijau, udara bersih, dan panorama alam yang memanjakan mata.
        </p>
      </div>
      <div class="flex gap-4 items-start">
        <span class="text-green-600 text-3xl">🏛️</span>
        <p class="text-gray-700 text-lg leading-relaxed">
          Budaya tradisional dan adat istiadat yang tetap lestari dan dijaga oleh masyarakat.
        </p>
      </div>
      <div class="flex gap-4 items-start">
        <span class="text-green-600 text-3xl">💻</span>
        <p class="text-gray-700 text-lg leading-relaxed">
          Penerapan sistem digital SIPEDES untuk mendukung tata kelola desa yang efisien.
        </p>
      </div>
      <div class="flex gap-4 items-start">
        <span class="text-green-600 text-3xl">🤝</span>
        <p class="text-gray-700 text-lg leading-relaxed">
          Warga yang ramah, gotong royong, dan berorientasi pada kemajuan bersama.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- 🌱 Visi & Misi Section -->
<section class="py-20 bg-gradient-to-br from-green-50 to-white">
  <div class="container mx-auto max-w-6xl px-6 grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
    <div>
      <h2 class="text-4xl font-bold text-green-700 mb-4">Visi</h2>
      <p class="text-gray-700 text-lg leading-relaxed">
        Menjadi desa yang maju, mandiri, dan berbudaya dengan memanfaatkan teknologi digital
        untuk meningkatkan kualitas hidup masyarakat serta menjaga kelestarian alam dan tradisi lokal.
      </p>
    </div>

    <div>
      <h2 class="text-4xl font-bold text-green-700 mb-4">Misi</h2>
      <ul class="list-disc list-inside space-y-3 text-gray-700 text-lg leading-relaxed">
        <li>Mendorong pertanian dan pariwisata berkelanjutan berbasis potensi lokal.</li>
        <li>Meningkatkan pelayanan publik melalui inovasi digitalisasi administrasi desa.</li>
        <li>Melestarikan budaya dan kearifan lokal melalui pendidikan dan kegiatan masyarakat.</li>
        <li>Memperkuat kebersamaan antarwarga untuk menciptakan desa yang harmonis dan produktif.</li>
      </ul>
    </div>
  </div>
</section>

<!-- ✨ Animasi Halus -->
<style>
  @keyframes fade-up {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }
  section { animation: fade-up 0.8s ease-out both; }
</style>
@endsection
