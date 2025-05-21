@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow mt-10">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Data Penduduk</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penduduk.update', $penduduk) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="nik" class="block font-medium text-gray-700">NIK</label>
            <input type="text" name="nik" id="nik" maxlength="16" value="{{ old('nik', $penduduk->nik) }}"
                class="w-full border rounded px-3 py-2 @error('nik') border-red-500 @enderror" required>
        </div>

        <div>
            <label for="nama" class="block font-medium text-gray-700">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $penduduk->nama) }}"
                class="w-full border rounded px-3 py-2 @error('nama') border-red-500 @enderror" required>
        </div>

        <div>
            <label for="alamat" class="block font-medium text-gray-700">Alamat</label>
            <textarea name="alamat" id="alamat" rows="3"
                class="w-full border rounded px-3 py-2 @error('alamat') border-red-500 @enderror" required>{{ old('alamat', $penduduk->alamat) }}</textarea>
        </div>

        <div>
            <label for="jenis_kelamin" class="block font-medium text-gray-700">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin"
                class="w-full border rounded px-3 py-2 @error('jenis_kelamin') border-red-500 @enderror">
                <option value="" disabled>Pilih Jenis Kelamin</option>
                <option value="L" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div>
            <label for="tempat_lahir" class="block font-medium text-gray-700">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir', $penduduk->tempat_lahir) }}"
                class="w-full border rounded px-3 py-2 @error('tempat_lahir') border-red-500 @enderror">
        </div>

        <div>
            <label for="tanggal_lahir" class="block font-medium text-gray-700">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $penduduk->tanggal_lahir) }}"
                class="w-full border rounded px-3 py-2 @error('tanggal_lahir') border-red-500 @enderror">
        </div>

        <div>
            <label for="agama" class="block font-medium text-gray-700">Agama</label>
            <input type="text" name="agama" id="agama" value="{{ old('agama', $penduduk->agama) }}"
                class="w-full border rounded px-3 py-2 @error('agama') border-red-500 @enderror">
        </div>

        <div>
            <label for="status_perkawinan" class="block font-medium text-gray-700">Status Perkawinan</label>
            <input type="text" name="status_perkawinan" id="status_perkawinan" value="{{ old('status_perkawinan', $penduduk->status_perkawinan) }}"
                class="w-full border rounded px-3 py-2 @error('status_perkawinan') border-red-500 @enderror">
        </div>

        <div>
            <label for="pekerjaan" class="block font-medium text-gray-700">Pekerjaan</label>
            <input type="text" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan', $penduduk->pekerjaan) }}"
                class="w-full border rounded px-3 py-2 @error('pekerjaan') border-red-500 @enderror">
        </div>

        <div>
            <label for="kewarganegaraan" class="block font-medium text-gray-700">Kewarganegaraan</label>
            <input type="text" name="kewarganegaraan" id="kewarganegaraan" value="{{ old('kewarganegaraan', $penduduk->kewarganegaraan) }}"
                class="w-full border rounded px-3 py-2 @error('kewarganegaraan') border-red-500 @enderror">
        </div>

        <div class="pt-4">
            <button type="submit" class="bg-blue-600 text-white py-2 px-6 rounded hover:bg-blue-700">Update</button>
            <a href="{{ route('penduduk.index') }}" class="ml-4 text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
@endsection
