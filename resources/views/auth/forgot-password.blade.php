<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Sistem Persuratan Desa Setro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-green-100 to-green-300 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
        <!-- Logo & Judul -->
        <div class="text-center mb-6">
            <img src="{{ asset('assets/images/Logo Desa-Setro.jpeg') }}"
                 alt="Logo Desa Setro"
                 class="w-24 h-auto mx-auto rounded-full mb-2 object-contain" />
            <h1 class="text-2xl font-bold text-green-700">Lupa Password</h1>
            <p class="text-sm text-gray-500">Kami akan kirimkan link reset melalui email</p>
        </div>

        <!-- Informasi -->
        <div class="mb-4 text-sm text-gray-600">
            Masukkan alamat email yang kamu gunakan untuk mendaftar. Kami akan mengirimkan link untuk mengganti password.
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 text-sm text-green-700 bg-green-100 border border-green-300 rounded p-3">
                {{ session('status') }}
            </div>
        @endif

        <!-- Form Lupa Password -->
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" />
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Submit -->
            <button type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-5 rounded-lg transition">
                Kirim Link Reset Password
            </button>
        </form>

        <!-- Kembali ke Login -->
        <div class="mt-6 text-center text-sm text-gray-600">
            Sudah ingat password? <a href="{{ route('login') }}" class="text-green-700 hover:underline">Masuk di sini</a>
        </div>
    </div>

</body>
</html>
