@extends('layouts.app')

@section('title', 'Data Penduduk')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">
  <h1 class="text-3xl font-bold text-green-800 mb-8">Data Penduduk Desa Setro</h1>

  <!-- Form pencarian dan tombol tambah -->
  <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
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

  <div class="overflow-x-auto rounded-lg shadow-md border border-gray-200">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-green-100">
          <tr>
            <th class="px-4 py-3 text-left text-sm font-semibold text-green-800">No</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-green-800">NIK</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-green-800">Nama Lengkap</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-green-800">Alamat</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-green-800">Jenis Kelamin</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-green-800">Tempat/Tanggal Lahir</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-green-800">Agama</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-green-800">Status Perkawinan</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-green-800">Pekerjaan</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-green-800">Kewarganegaraan</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-green-800">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @forelse ($penduduk as $i => $p)
            <tr class="hover:bg-green-50">
              <td class="px-4 py-2 text-sm text-gray-700">{{ $i + $penduduk->firstItem() }}</td>
              <td class="px-4 py-2 text-sm text-gray-700">{{ $p->nik }}</td>
              <td class="px-4 py-2 text-sm font-medium text-green-900">{{ $p->nama }}</td>
              <td class="px-4 py-2 text-sm text-gray-700 max-w-xs truncate" title="{{ $p->alamat }}">{{ $p->alamat }}</td>
              <td class="px-4 py-2 text-sm text-gray-700">{{ $p->jenis_kelamin }}</td>
              <td class="px-4 py-2 text-sm text-gray-700 whitespace-nowrap">
                {{ $p->tempat_lahir }}, {{ \Carbon\Carbon::parse($p->tanggal_lahir)->format('d M Y') }}
              </td>
              <td class="px-4 py-2 text-sm text-gray-700">{{ $p->agama }}</td>
              <td class="px-4 py-2 text-sm text-gray-700">{{ $p->status_perkawinan }}</td>
              <td class="px-4 py-2 text-sm text-gray-700">{{ $p->pekerjaan }}</td>
              <td class="px-4 py-2 text-sm text-gray-700">{{ $p->kewarganegaraan }}</td>
              <td class="px-4 py-2 text-sm text-gray-700">
                <div class="flex items-center gap-3">
                  <a href="{{ route('penduduk.edit', $p) }}" class="text-blue-600 hover:underline" aria-label="Edit {{ $p->nama }}">Edit</a>
                  <form action="{{ route('penduduk.destroy', $p) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline" aria-label="Hapus {{ $p->nama }}">Hapus</button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="11" class="px-4 py-8 text-center text-gray-500">Data penduduk tidak ditemukan.</td>
            </tr>
          @endforelse
        </tbody>
    </table>
  </div>

  <div class="mt-6">
    {{ $penduduk->withQueryString()->links() }}
  </div>
</div>
@endsection
