<x-layout>
<div class="max-w-xl mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-6 text-center text-purple-700">Tambah Dosen</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.dosen.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5 bg-white p-6 rounded-xl shadow-md">
        @csrf

        <div>
            <label class="block font-medium text-gray-700">Nama</label>
            <input type="text" name="name" value="{{ old('name') }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-purple-500">
            @error('name') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block font-medium text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email') }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-purple-500">
            @error('email') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block font-medium text-gray-700">Password</label>
            <input type="password" name="password"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-purple-500">
            @error('password') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>


        <div>
            <label class="block font-medium text-gray-700">NIP</label>
            <input type="text" name="nip" value="{{ old('nip') }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-purple-500">
            @error('nip') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block font-medium text-gray-700">Fakultas</label>
            <input type="text" name="fakultas" value="{{ old('fakultas') }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-purple-500">
            @error('fakultas') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block font-medium text-gray-700">Program Studi</label>
            <input type="text" name="prodi" value="{{ old('prodi') }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-purple-500">
            @error('prodi') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>

        <div>
    <label class="block font-medium text-gray-700">Foto (Opsional)</label>
    <input type="file" name="foto" id="fotoInput"
        class="mt-1 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:border file:rounded file:text-sm file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100">
    @error('foto') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror

    <!-- Preview -->
    <div class="mt-3">
        <img id="fotoPreview" src="#" alt="Preview Foto" class="hidden w-40 h-40 object-cover rounded shadow">
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('fotoInput').addEventListener('change', function(event) {
        const [file] = event.target.files;
        const preview = document.getElementById('fotoPreview');

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('hidden');
        } else {
            preview.src = '#';
            preview.classList.add('hidden');
        }
    });
</script>
@endpush


        <div class="flex justify-end">
            <a href="{{ route('admin.dosen.index') }}"
               class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Kembali</a>
            <button type="submit"
                    class="ml-2 px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700 transition">
                Simpan
            </button>
        </div>
    </form>
</div>
</x-layout>
