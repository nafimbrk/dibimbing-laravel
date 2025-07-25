<x-layout_auth title="Login">
    <div class="max-w-md mx-auto mt-20 bg-white p-6 rounded shadow">
        <div class="mb-6 text-center">
            <h1 class="text-3xl font-bold text-purple-700 mb-2">Selamat Datang Admin!</h1>
<p class="text-sm text-gray-600">Silakan masuk untuk mengelola data dosen, mahasiswa, dan pengajuan pembimbing.</p>

        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium">Email</label>
                <input type="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500" required value="{{ old('email') }}">
                @error('email') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Password</label>
                <input type="password" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500" required>
                @error('password') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="w-full bg-purple-600 text-white py-2 rounded hover:bg-purple-700">Login</button>
        </form>

        <p class="mt-4 text-sm text-center">
            Belum punya akun? <a href="{{ route('register') }}" class="text-purple-600 hover:underline">Daftar di sini</a>
        </p>
    </div>
</x-layout_auth>
