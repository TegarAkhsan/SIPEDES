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
    <div class="max-w-4xl mx-auto p-8 bg-white rounded-2xl shadow-md mt-10">
    <h2 class="text-4xl font-extrabold text-green-700 mb-2 text-center drop-shadow-md">Form Surat Keluar</h2>
    <p class="text-center text-gray-600 max-w-xl mx-auto">
      Isi data surat keluar dengan lengkap dan unggah file scan surat untuk dokumentasi digital yang efisien.
    </p>
  
    <form action="{{ route('surat-keluar.store') }}" method="POST" class="space-y-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">No Agenda</label>
            <input type="text" name="no_agenda" class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Keluar</label>
            <input type="date" name="tanggal_keluar" class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">NIK</label>
            <input type="text" name="nik" id="nik" class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Keperluan</label>
            <input type="text" name="keperluan" class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Hasil Pelayanan</label>
            <input type="text" name="hasil_pelayanan" class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kode Arsip</label>
            <input type="text" name="kode_arsip" class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
            <input type="text" name="keterangan" class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>
        </div>

        <div class="pt-4">
        <button type="submit" class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-xl transition duration-200">
            Simpan
        </button>
        </div>
    </form>
</div>
</body>
</html>