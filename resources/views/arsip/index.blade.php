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

  <!-- Konten Arsip -->
  <div class="max-w-5xl mx-auto p-6 bg-white rounded-xl shadow mt-10 mb-10">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Pencarian Arsip</h2>

    <form method="GET" action="{{ route('arsip.index') }}" class="mb-4">
      <input
        type="text"
        name="search"
        placeholder="Cari No Agenda, Nama atau Tanggal..."
        value="{{ request('search') }}"
        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-400 focus:outline-none"
      >
    </form>

    <div class="overflow-x-auto">
      <table class="w-full table-auto border border-gray-200">
        <thead class="bg-gray-100 text-gray-700">
          <tr>
            <th class="p-2 border text-left">No</th>
            <th class="p-2 border text-left">Jenis Surat</th>
            <th class="p-2 border text-left">Nama</th>
            <th class="p-2 border text-left">Tanggal</th>
            <th class="p-2 border text-left">Perihal / Keperluan</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($arsip as $i => $item)
            <tr class="hover:bg-gray-50">
              <td class="p-2 border">{{ $i + 1 }}</td>
              <td class="p-2 border">{{ $item['jenis'] }}</td>
              <td class="p-2 border">{{ $item['nama'] }}</td>
              <td class="p-2 border">{{ \Carbon\Carbon::parse($item['tanggal'])->format('d M Y') }}</td>
              <td class="p-2 border">{{ $item['perihal'] }}</td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="p-4 text-center text-gray-500">Data arsip tidak ditemukan.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>


