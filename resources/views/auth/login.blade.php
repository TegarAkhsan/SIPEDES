<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Persuratan Desa Setro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-green-100 to-green-300 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
        <!-- Logo & Judul -->
        <div class="text-center mb-6">
            <img src="{{ asset('assets/images/Logo Desa-Setro.jpeg') }}"
                 alt="Logo Desa Setro"
                 class="w-24 h-auto mx-auto rounded-full mb-2 object-contain" />
            <h1 class="text-2xl font-bold text-green-700">Sistem Persuratan</h1>
            <p class="text-sm text-gray-500">Desa Setro</p>
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 text-sm text-green-700 bg-green-100 border border-green-300 rounded p-3">
                {{ session('status') }}
            </div>
        @endif
        
        <!-- Flash Message Error -->
        @if (session('error'))
            <div class="mb-4 text-sm text-red-700 bg-red-100 border border-red-300 rounded p-3">
                {{ session('error') }}
            </div>
        @endif

        <!-- Form Login -->
        <form method="POST" action="{{ route('login') }}">
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

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-semibold">Password</label>
                <input id="password" type="password" name="password" required
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" />
                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Checkbox + Lupa Password -->
            <div class="flex items-center justify-between mb-4">
                <label class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" name="remember"
                           class="text-green-600 rounded border-gray-300 focus:ring-green-500">
                    <span class="ml-2 text-sm text-gray-700">Ingat saya</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm text-green-700 hover:underline" href="{{ route('password.request') }}">
                        Lupa password?
                    </a>
                @endif
            </div>

            <!-- Tombol Login -->
            <button type="submit"
                class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-5 rounded-lg transition">
                Masuk
            </button>
        </form>

        <!-- Daftar -->
        <div class="mt-6 text-center text-sm text-gray-600">
            Belum punya akun? <a href="{{ route('register') }}" class="text-green-700 hover:underline">Daftar di sini</a>
        </div>
    </div>

</body>
</html>
