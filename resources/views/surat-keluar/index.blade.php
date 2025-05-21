@extends('layouts.app')

@section('title', 'Surat Keluar-SIPEDES')

@section('content')
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
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap Pemohon</label>
            <input type="text" name="nama_lengkap_pemohon" id="nama" class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">NIK</label>
            <input type="text" name="nik" id="nik" class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
        </div>

        <div class="md:col-span-2">
        <label for="kode_keperluan" class="block text-sm font-medium text-gray-700 mb-1">Kode Arsip & Keperluan</label>
        <select id="kode_keperluan" name="kode_keperluan" required
            class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none">
            <option value="">-- Pilih Kode Arsip & Keperluan --</option>
            <option value="2|Penghargaan">2 - Penghargaan</option>
            <option value="3|Hari Raya/Hari Besar">3 - Hari Raya/Hari Besar</option>
            <option value="5|Undangan">5 - Undangan</option>
            <option value="10|Urusan Dalam">10 - Urusan Dalam</option>
            <option value="20|Peralatan">20 - Peralatan</option>
            <option value="40|Perpustakaan">40 - Perpustakaan</option>
            <option value="50|Perencanaan">50 - Perencanaan</option>
            <option value="70|Penelitian">70 - Penelitian</option>
            <option value="90|Perjalanan Dinas">90 - Perjalanan Dinas</option>
            <option value="100|Pemerintahan">100 - Pemerintahan</option>
            <option value="200|Politik">200 - Politik</option>
            <option value="210|Kepartaian">210 - Kepartaian</option>
            <option value="300|Keamanan & Ketertiban Umum">300 - Keamanan & Ketertiban Umum</option>
            <option value="400|Kesejahteraan Rakyat">400 - Kesejahteraan Rakyat</option>
            <option value="500|Perekonomian">500 - Perekonomian</option>
            <option value="600|Pekerjaan Umum">600 - Pekerjaan Umum</option>
            <option value="700|Pengawasan">700 - Pengawasan</option>
            <option value="800|Kepegawaian">800 - Kepegawaian</option>
            <option value="900|Keuangan">900 - Keuangan</option>
        </select>
        </div>
        <!-- <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Keperluan</label>
            <input type="text" name="keperluan" class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
        </div> -->

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Hasil Pelayanan</label>
            <input type="text" name="hasil_pelayanan" class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
        </div>

        <!-- <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kode Arsip</label>
            <input type="text" name="kode_arsip" class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
        </div> -->

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
            <input type="text" name="keterangan" class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>
        </div>

        <div class="pt-4">
        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-xl transition duration-200">
            Simpan
        </button>
        </div>
        </div>
    </form>
</div>
@endsection