@extends('layouts.app')

@section('title', 'Surat Masuk-SIPEDES')

@section('content')

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

      <!-- <div>
        <label for="no_surat" class="block text-gray-800 font-semibold mb-2">No Surat</label>
        <input type="text" id="no_surat" name="no_surat" placeholder="No Surat" required
          class="w-full px-5 py-3 border border-gray-300 rounded-2xl focus:outline-none focus:ring-4 focus:ring-green-400 transition" />
      </div> -->

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
        <label for="kode_perihal" class="block text-gray-800 font-semibold mb-2">Kode Surat & Perihal</label>
        <select id="kode_perihal" name="kode_perihal" required
          class="w-full px-5 py-3 border border-gray-300 rounded-2xl focus:outline-none focus:ring-4 focus:ring-green-400 transition">
          <option value="">-- Pilih Kode & Perihal Surat --</option>
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
@endsection