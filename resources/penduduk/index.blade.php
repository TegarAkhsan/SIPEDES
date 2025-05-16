<div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow mt-10">
  <h2 class="text-2xl font-semibold text-gray-800 mb-6">Data Penduduk</h2>
  <form method="GET" action="{{ route('penduduk.index') }}">
    <input type="text" name="nik" placeholder="Cari berdasarkan NIK..." class="input w-full mb-4">
    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-xl">Cari</button>
  </form>
  @isset($penduduk)
  <div class="mt-6">
    <h3 class="text-lg font-semibold">Hasil:</h3>
    <p><strong>Nama:</strong> {{ $penduduk->nama }}</p>
    <p><strong>NIK:</strong> {{ $penduduk->nik }}</p>
    <p><strong>Alamat:</strong> {{ $penduduk->alamat }}</p>
    <!-- Tambahkan data lainnya -->
  </div>
  @endisset
</div>