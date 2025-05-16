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

<div class="min-h-screen bg-gradient-to-br from-green-200 to-blue-100 p-10 flex justify-center items-start pt-24">
  <div class="bg-white rounded-3xl shadow-xl max-w-3xl w-full p-12 space-y-8">
    <h2 class="text-4xl font-extrabold text-green-700 mb-2 text-center drop-shadow-md">Form Surat Masuk</h2>
    <p class="text-center text-gray-600 max-w-xl mx-auto">
      Isi data surat masuk dengan lengkap dan unggah file scan surat untuk dokumentasi digital yang efisien.
    </p>

    <form action="{{ route('surat-masuk.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf

      <div>
        <label for="no_agenda" class="block text-gray-800 font-semibold mb-2">No Agenda</label>
        <input type="text" id="no_agenda" name="no_agenda" placeholder="No Agenda" required
          class="w-full px-5 py-3 border border-gray-300 rounded-2xl focus:outline-none focus:ring-4 focus:ring-green-400 transition" />
      </div>

      <div>
        <label for="no_surat" class="block text-gray-800 font-semibold mb-2">No Surat</label>
        <input type="text" id="no_surat" name="no_surat" placeholder="No Surat" required
          class="w-full px-5 py-3 border border-gray-300 rounded-2xl focus:outline-none focus:ring-4 focus:ring-green-400 transition" />
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <label for="tanggal_surat" class="block text-gray-800 font-semibold mb-2">Tanggal Surat</label>
          <input type="date" id="tanggal_surat" name="tanggal_surat" required
            class="w-full px-5 py-3 border border-gray-300 rounded-2xl focus:outline-none focus:ring-4 focus:ring-green-400 transition" />
        </div>

        <div>
          <label for="tanggal_terima" class="block text-gray-800 font-semibold mb-2">Tanggal Terima</label>
          <input type="date" id="tanggal_terima" name="tanggal_terima" required
            class="w-full px-5 py-3 border border-gray-300 rounded-2xl focus:outline-none focus:ring-4 focus:ring-green-400 transition" />
        </div>
      </div>

      <div>
        <label for="pengirim" class="block text-gray-800 font-semibold mb-2">Pengirim</label>
        <input type="text" id="pengirim" name="pengirim" placeholder="Pengirim" required
          class="w-full px-5 py-3 border border-gray-300 rounded-2xl focus:outline-none focus:ring-4 focus:ring-green-400 transition" />
      </div>

      <div>
        <label for="perihal" class="block text-gray-800 font-semibold mb-2">Perihal</label>
        <input type="text" id="perihal" name="perihal" placeholder="Perihal" required
          class="w-full px-5 py-3 border border-gray-300 rounded-2xl focus:outline-none focus:ring-4 focus:ring-green-400 transition" />
      </div>

      <div>
        <label for="file_scan" class="block text-gray-800 font-semibold mb-2">Upload File Scan</label>
        <input type="file" id="file_scan" name="file_scan" required
          class="w-full text-gray-700 rounded-xl border border-gray-300 p-2 focus:outline-none focus:ring-4 focus:ring-green-400 transition" />
      </div>

      <button type="submit"
        class="w-full bg-green-600 hover:bg-green-700 text-white font-extrabold py-4 rounded-3xl shadow-lg transition duration-300">
        Simpan
      </button>
    </form>
  </div>
</div>

</body>
</html>