@extends('layouts.app')

@section('title', 'Tentang Desa Setro-SIPEDES')

@section('content')
<section class="max-w-5xl mx-auto px-6 py-12 bg-white rounded-xl shadow-lg mt-10 mb-10">

  <h1 class="text-4xl font-bold text-green-700 mb-8 text-center">Tentang Desa Setro</h1>

  <!-- Deskripsi -->
  <div class="mb-10">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Deskripsi</h2>
    <p class="text-gray-700 leading-relaxed text-lg">
      Desa Setro adalah sebuah desa yang terletak di wilayah perbukitan dengan panorama alam yang asri dan sejuk. Penduduknya mayoritas bermata pencaharian di bidang pertanian dan pariwisata lokal yang kental dengan budaya tradisional. Desa ini dikenal dengan keramahan warganya serta komitmen tinggi dalam menjaga kelestarian alam dan adat istiadat setempat.
    </p>
  </div>

  <!-- Keunggulan -->
  <div class="mb-10">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Keunggulan Desa Setro</h2>
    <ul class="list-disc list-inside text-gray-700 space-y-2 text-lg">
      <li>Lingkungan yang asri dengan udara bersih dan pemandangan alam yang memukau.</li>
      <li>Budaya tradisional yang masih terjaga dan menjadi daya tarik wisata.</li>
      <li>Kemajuan teknologi dengan sistem persuratan digital yang memudahkan pelayanan publik.</li>
      <li>Masyarakat yang ramah, gotong royong, dan berorientasi pada kemajuan desa.</li>
    </ul>
  </div>

  <!-- Visi -->
  <div class="mb-10">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Visi</h2>
    <p class="text-gray-700 text-lg leading-relaxed">
      Menjadi desa yang maju, mandiri, dan berbudaya, dengan pemanfaatan teknologi digital yang efektif untuk meningkatkan kualitas hidup masyarakat dan menjaga kelestarian alam serta tradisi lokal.
    </p>
  </div>

  <!-- Misi -->
  <div>
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Misi</h2>
    <ol class="list-decimal list-inside text-gray-700 space-y-2 text-lg">
      <li>Mendorong pengembangan sektor pertanian dan pariwisata yang berkelanjutan.</li>
      <li>Meningkatkan pelayanan publik melalui digitalisasi administrasi desa.</li>
      <li>Melestarikan adat istiadat dan budaya lokal melalui pendidikan dan kegiatan masyarakat.</li>
      <li>Membangun sinergi antar warga untuk menciptakan lingkungan yang harmonis dan produktif.</li>
    </ol>
  </div>

</section>
@endsection
