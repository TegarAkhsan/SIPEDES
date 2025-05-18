@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

  <!-- Konten Arsip -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 bg-white rounded-xl shadow mt-10 mb-10">
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

    <div class="overflow-x-auto min-h-[300px]">
      <table class="w-full min-w-full table-auto border border-gray-300">
        <thead class="bg-gray-100 text-gray-700">
          <tr>
            <th class="p-3 border text-left">No</th>
            <th class="p-3 border text-left">Jenis Surat</th>
            <th class="p-3 border text-left">Nama</th>
            <th class="p-3 border text-left">Tanggal</th>
            <th class="p-3 border text-left">Perihal / Keperluan</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($arsip as $i => $item)
            <tr class="hover:bg-gray-50">
              <td class="p-3 border">{{ $i + 1 }}</td>
              <td class="p-3 border">{{ $item['jenis'] }}</td>
              <td class="p-3 border">
                {{ $item['nama'] ?? ($item->user->nama ?? '-') }}
              </td>
              <td class="p-3 border">{{ \Carbon\Carbon::parse($item['tanggal'])->format('d M Y') }}</td>
              <td class="p-3 border">{{ $item['perihal'] }}</td>
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
@endsection
