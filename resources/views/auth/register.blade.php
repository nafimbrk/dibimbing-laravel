<x-layout_auth title="Register">
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
        <div class="mb-6 text-center">
            <h1 class="text-3xl font-bold mb-2 text-purple-700">Daftar Akun Baru</h1>
            <p class="text-sm text-gray-600">Silakan isi data berikut untuk membuat akun dan mulai mencatat
                keuanganmu.</p>
        </div>
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium">Name</label>
                <input type="text" name="name"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500"
                    required value="{{ old('name') }}">
                @error('name') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Email</label>
                <input type="email" name="email"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500"
                    required value="{{ old('email') }}">
                @error('email') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Password</label>
                <input type="password" name="password"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500"
                    required>
                @error('password') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
            </div>

            <button type="submit"
                class="w-full bg-purple-600 text-white py-2 rounded hover:bg-purple-700">Register</button>
        </form>

        <p class="mt-4 text-sm text-center">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-purple-600">Login di sini</a>
        </p>
    </div>
</x-layout_auth>
