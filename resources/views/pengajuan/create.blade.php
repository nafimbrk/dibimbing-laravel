<x-layout title="Pengajuan Pembimbing">
    <div class="max-w-2xl mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Form Pengajuan Pembimbing Skripsi</h2>

    @if (session('success'))
        <div class="p-4 bg-green-100 text-green-700 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block">Nama Mahasiswa</label>
            <input type="text" name="nama_mahasiswa" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-purple-500" required>
        </div>

        <div>
            <label class="block">NIM</label>
            <input type="number" name="nim" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-purple-500" required>
        </div>

        <div>
            <label class="block">Fakultas</label>
            <select name="fakultas" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-purple-500" required>
                <option value="">-- Pilih Fakultas --</option>
                    <option value="Teknik">Teknik</option>
            </select>
        </div>

        <div>
            <label class="block">Prodi</label>
            <select name="prodi" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-purple-500" required>
                <option value="">-- Pilih Prodi --</option>
                    <option value="Informatika">Informatika</option>
            </select>
        </div>

        <div>
            <label class="block">Judul Skripsi</label>
            <textarea name="judul" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-purple-500" required></textarea>
        </div>

        <div>
            <label class="block">Deskripsi (opsional)</label>
            <textarea name="deskripsi" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-purple-500"></textarea>
        </div>

        <div>
            <label class="block">Pilih Dosen Pembimbing</label>
            <select name="dosen_profile_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-purple-500" required>
                <option value="">-- Pilih Dosen --</option>
                @foreach($dosenAktif as $dosen)
                    <option value="{{ $dosen->id }}">{{ $dosen->user->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block">Upload File (opsional, PDF/DOC)</label>
            <input type="file" name="file_path" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-purple-500">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Kirim Pengajuan</button>
    </form>
</div>
</x-layout>
