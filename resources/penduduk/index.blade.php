@extends('layouts.app')

@section('content')
<!-- debug index penduduk loaded -->
<div class="max-w-6xl mx-auto p-6 bg-white rounded-xl shadow mt-10">
  <h2 class="text-2xl font-semibold text-gray-800 mb-6">Data Penduduk</h2>


  <!-- Form pencarian dan tombol tambah diletakkan dalam flex container -->
  <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4 gap-4">
    <form method="GET" action="{{ route('penduduk.index') }}" class="flex flex-col md:flex-row gap-2 flex-grow">
      <input type="text" name="nik" value="{{ request('nik') }}" placeholder="Cari berdasarkan NIK" class="border rounded px-3 py-2 w-full md:w-auto flex-grow" autocomplete="off">
      <input type="text" name="nama" value="{{ request('nama') }}" placeholder="Cari berdasarkan Nama" class="border rounded px-3 py-2 w-full md:w-auto flex-grow" autocomplete="off">
      <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-xl md:w-auto w-full">Cari</button>
    </form>

    <a href="{{ route('penduduk.create') }}" class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg text-center md:w-auto w-full">
      <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
        <line x1="12" y1="5" x2="12" y2="19"></line>
        <line x1="5" y1="12" x2="19" y2="12"></line>
      </svg>
      Tambah Penduduk
    </a>
  </div>

  <table class="w-full table-auto border border-gray-300 rounded-lg">
    <thead>
      <tr class="bg-gray-100 text-left">
        <th class="p-3">NIK</th>
        <th class="p-3">Nama</th>
        <th class="p-3">Alamat</th>
        <th class="p-3">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($penduduk as $item)
      <tr class="border-t">
        <td class="p-3">{{ $item->nik }}</td>
        <td class="p-3">{{ $item->nama }}</td>
        <td class="p-3">{{ $item->alamat }}</td>
        <td class="p-3">
          <a href="{{ route('penduduk.edit', $item) }}" class="text-blue-600 hover:underline mr-2" aria-label="Edit data penduduk {{ $item->nama }}">Edit</a>
          <button type="submit" aria-label="Hapus data penduduk {{ $item->nama }}" class="text-red-600 hover:underline">Hapus</button>
          <form action="{{ route('penduduk.destroy', $item) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus data ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" aria-label="Hapus penduduk {{ $item->nama }}" class="text-red-600 hover:underline">Hapus</button>
          </form>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="4" class="p-3 text-center text-gray-500">Tidak ada data penduduk</td>
      </tr>
      @endforelse
    </tbody>
  </table>

  <div class="mt-4">
    {{ $penduduk->withQueryString()->links() }}
  </div>
</div>
@endsection
