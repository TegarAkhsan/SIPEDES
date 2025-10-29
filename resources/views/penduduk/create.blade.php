@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-xl shadow-lg p-8 mt-12 mb-12">
    <h2 class="text-3xl font-extrabold text-green-800 mb-8 border-b-4 border-green-600 pb-2">Tambah Data Penduduk</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-5 py-3 rounded-md mb-6">
            <ul class="list-disc pl-6 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penduduk.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="nik" class="block mb-2 font-semibold text-gray-800">NIK</label>
            <input type="text" name="nik" id="nik" maxlength="16" value="{{ old('nik') }}"
                class="w-full border border-gray-300 rounded-md px-4 py-3 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('nik') border-red-500 @enderror"
                placeholder="Masukkan NIK" required>
        </div>

        <div>
            <label for="nama" class="block mb-2 font-semibold text-gray-800">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                class="w-full border border-gray-300 rounded-md px-4 py-3 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('nama') border-red-500 @enderror"
                placeholder="Masukkan nama lengkap" required>
        </div>

        <div>
            <label for="alamat" class="block mb-2 font-semibold text-gray-800">Alamat</label>
            <textarea name="alamat" id="alamat" rows="4"
                class="w-full border border-gray-300 rounded-md px-4 py-3 placeholder-gray-400 resize-none focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('alamat') border-red-500 @enderror"
                placeholder="Masukkan alamat lengkap" required>{{ old('alamat') }}</textarea>
        </div>

        <div>
            <label for="jenis_kelamin" class="block mb-2 font-semibold text-gray-800">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin"
                class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('jenis_kelamin') border-red-500 @enderror" required>
                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div>
            <label class="block mb-2 font-semibold text-gray-800">Tempat / Tanggal Lahir</label>
            <div class="flex flex-col sm:flex-row gap-4">
                <input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="{{ old('tempat_lahir') }}"
                    class="flex-1 border border-gray-300 rounded-md px-4 py-3 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('tempat_lahir') border-red-500 @enderror"
                    required>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                    class="flex-1 border border-gray-300 rounded-md px-4 py-3 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('tanggal_lahir') border-red-500 @enderror"
                    required>
            </div>
            @error('tempat_lahir')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
            @error('tanggal_lahir')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="agama" class="block mb-2 font-semibold text-gray-800">Agama</label>
            <input type="text" name="agama" id="agama" value="{{ old('agama') }}"
                class="w-full border border-gray-300 rounded-md px-4 py-3 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('agama') border-red-500 @enderror"
                placeholder="Masukkan agama" required>
        </div>

        <div>
            <label for="status_perkawinan" class="block mb-2 font-semibold text-gray-800">Status Perkawinan</label>
            <input type="text" name="status_perkawinan" id="status_perkawinan" value="{{ old('status_perkawinan') }}"
                class="w-full border border-gray-300 rounded-md px-4 py-3 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('status_perkawinan') border-red-500 @enderror"
                placeholder="Masukkan status perkawinan" required>
        </div>

        <div>
            <label for="pekerjaan" class="block mb-2 font-semibold text-gray-800">Pekerjaan</label>
            <input type="text" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan') }}"
                class="w-full border border-gray-300 rounded-md px-4 py-3 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('pekerjaan') border-red-500 @enderror"
                placeholder="Masukkan pekerjaan" required>
        </div>

        <div>
            <label for="kewarganegaraan" class="block mb-2 font-semibold text-gray-800">Kewarganegaraan</label>
            <input type="text" name="kewarganegaraan" id="kewarganegaraan" value="{{ old('kewarganegaraan') }}"
                class="w-full border border-gray-300 rounded-md px-4 py-3 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('kewarganegaraan') border-red-500 @enderror"
                placeholder="Masukkan kewarganegaraan" required>
        </div>

        <div class="pt-6 flex items-center gap-4">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-8 rounded-lg transition duration-300">Simpan</button>
            <a href="{{ route('penduduk.index') }}" class="text-red-600 hover:underline font-semibold">Batal</a>
        </div>
    </form>
</div>
@endsection
