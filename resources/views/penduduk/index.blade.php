@extends('layouts.app')

@section('title', 'Data Penduduk')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">
  <h1 class="text-3xl font-bold text-green-800 mb-8">Data Penduduk Desa Setro</h1>

  <div class="overflow-x-auto rounded-lg shadow-md border border-gray-200">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-green-100">
        <tr>
          <th class="px-4 py-3 text-left text-sm font-semibold text-green-800">No</th>
          <th class="px-4 py-3 text-left text-sm font-semibold text-green-800">NIK</th>
          <th class="px-4 py-3 text-left text-sm font-semibold text-green-800">Nama Lengkap</th>
          <th class="px-4 py-3 text-left text-sm font-semibold text-green-800">Jenis Kelamin</th>
          <th class="px-4 py-3 text-left text-sm font-semibold text-green-800">Tempat/Tgl Lahir</th>
          <th class="px-4 py-3 text-left text-sm font-semibold text-green-800">Alamat</th>
          <th class="px-4 py-3 text-left text-sm font-semibold text-green-800">Agama</th>
          <th class="px-4 py-3 text-left text-sm font-semibold text-green-800">Pekerjaan</th>
          <th class="px-4 py-3 text-left text-sm font-semibold text-green-800">Status Perkawinan</th>
          <th class="px-4 py-3 text-left text-sm font-semibold text-green-800">Kewarganegaraan</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        @forelse ($penduduk as $i => $p)
          <tr class="hover:bg-green-50">
            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">{{ $i + 1 }}</td>
            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">{{ $p->nik }}</td>
            <td class="px-4 py-2 whitespace-nowrap text-sm font-medium text-green-900">{{ $p->nama_lengkap }}</td>
            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">{{ $p->jenis_kelamin }}</td>
            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">{{ $p->tempat_lahir }}, {{ \Carbon\Carbon::parse($p->tanggal_lahir)->format('d M Y') }}</td>
            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700 max-w-xs truncate" title="{{ $p->alamat }}">{{ $p->alamat }}</td>
            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">{{ $p->agama }}</td>
            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">{{ $p->pekerjaan }}</td>
            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">{{ $p->status_perkawinan }}</td>
            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">{{ $p->kewarganegaraan }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="10" class="px-4 py-8 text-center text-gray-500">Data penduduk tidak ditemukan.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Pagination jika ada -->
  <div class="mt-6">
    {{ $penduduk->links() }}
  </div>
</div>
@endsection
