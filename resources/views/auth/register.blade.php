<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Sistem Persuratan Desa Setro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-green-100 to-green-300 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
        <!-- Logo & Judul -->
        <div class="text-center mb-6">
            <img src="{{ asset('assets/images/Logo Desa-Setro.jpeg') }}"
                 alt="Logo Desa Setro"
                 class="w-24 h-auto mx-auto rounded-full mb-2 object-contain" />
            <h1 class="text-2xl font-bold text-green-700">Registrasi Akun</h1>
            <p class="text-sm text-gray-500">Sistem Persuratan Desa Setro</p>
        </div>

        <!-- Flash Error -->
        @if ($errors->any())
            <div class="mb-4 text-sm text-red-700 bg-red-100 border border-red-300 rounded p-3">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Register -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold">Nama</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" />
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-semibold">Password</label>
                <input id="password" type="password" name="password" required
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 font-semibold">Konfirmasi Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" />
            </div>

            <!-- Tombol Register -->
            <button type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-5 rounded-lg transition">
                Daftar
            </button>
        </form>

        <!-- Sudah Punya Akun -->
        <div class="mt-6 text-center text-sm text-gray-600">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-green-700 hover:underline">Masuk di sini</a>
        </div>
    </div>

</body>
</html>
