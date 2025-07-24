<x-layout>
<div class="max-w-xl mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-6 text-center text-purple-700">Edit Dosen</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.dosen.update', $dosen->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5 bg-white p-6 rounded-xl shadow-md">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium text-gray-700">Nama</label>
            <input type="text" name="name" value="{{ old('name', $dosen->user->name) }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-purple-500">
            @error('name') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block font-medium text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email', $dosen->user->email) }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-purple-500">
            @error('email') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block font-medium text-gray-700">Password (opsional)</label>
            <input type="password" name="password"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-purple-500">
            <p class="text-sm text-gray-500">Biarkan kosong jika tidak ingin mengubah password.</p>
            @error('password') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block font-medium text-gray-700">NIP</label>
            <input type="text" name="nip" value="{{ old('nip', $dosen->nip) }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-purple-500">
            @error('nip') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block font-medium text-gray-700">Fakultas</label>
            <input type="text" name="fakultas" value="{{ old('fakultas', $dosen->fakultas ?? '') }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-purple-500">
            @error('fakultas') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block font-medium text-gray-700">Program Studi</label>
            <input type="text" name="prodi" value="{{ old('prodi', $dosen->prodi) }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-purple-500">
            @error('prodi') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>

        <div>
    <label class="block font-medium text-gray-700">Foto (Opsional)</label>
    <input
        type="file"
        name="foto"
        id="fotoInput"
        class="mt-1 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:border file:rounded file:text-sm file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100"
        accept="image/*"
        onchange="previewFoto(event)"
    >

    {{-- Preview jika ada foto sebelumnya --}}
    <div class="mt-2">
        @if ($dosen->foto)
            <img id="previewImage" src="{{ asset('storage/' . $dosen->foto) }}" class="w-32 rounded shadow">
        @else
            <img id="previewImage" class="w-32 hidden rounded shadow">
        @endif
    </div>

    @error('foto')
        <div class="text-red-600 text-sm">{{ $message }}</div>
    @enderror
</div>

{{-- Script Preview --}}
@push('scripts')
<script>
    function previewFoto(event) {
        const [file] = event.target.files;
        const preview = document.getElementById('previewImage');

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('hidden');
        }
    }
</script>
@endpush


        <div class="flex justify-end">
            <a href="{{ route('admin.dosen.index') }}"
               class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Kembali</a>
            <button type="submit"
                    class="ml-2 px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700 transition">
                Update
            </button>
        </div>
    </form>
</div>
</x-layout>
