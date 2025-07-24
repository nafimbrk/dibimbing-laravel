<x-layout title="Daftar Dosen">

    @if (session('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition
        class="fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded shadow z-50">
        {{ session('success') }}
    </div>
    @endif

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-purple-700">Daftar Dosen</h1>
        <a href="{{ route('admin.dosen.create') }}"
            class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded shadow transition">
            + Tambah Dosen
        </a>
    </div>

    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-purple-100 text-purple-700">
                <tr>
                    <th class="px-6 py-3 font-medium">#</th>
                    <th class="px-6 py-3 font-medium">Foto</th>
                    <th class="px-6 py-3 font-medium">Nama</th>
                    <th class="px-6 py-3 font-medium">Email</th>
                    <th class="px-6 py-3 font-medium">NIP</th>
                    <th class="px-6 py-3 font-medium">Prodi</th>
                    <th class="px-6 py-3 font-medium">Status Bimbingan</th>
                    <th class="px-6 py-3 font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dosens as $index => $dosen)
                <tr class="border-b hover:bg-purple-50">
                    <td class="px-6 py-3">{{ $index + 1 }}</td>
                    <td class="px-6 py-3">
                        @if ($dosen->foto)
                        <img src="{{ asset('storage/' . $dosen->foto) }}"
                            class="w-20 h-20 object-cover rounded-full shadow">
                        @else
                        <div class="w-20 h-20 rounded-full bg-gray-200 flex items-center justify-center text-gray-500">
                            N/A
                        </div>
                        @endif
                    </td>
                    <td class="px-6 py-3">{{ $dosen->user->name }}</td>
                    <td class="px-6 py-3">{{ $dosen->user->email }}</td>
                    <td class="px-6 py-3">{{ $dosen->nip ?? '-' }}</td>
                    <td class="px-6 py-3">{{ $dosen->prodi ?? '-' }}</td>
                    <td class="px-6 py-3">
                        <form action="{{ route('dosen.toggleStatus', $dosen->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="inline-block px-2 py-1 text-xs rounded {{ $dosen->status_bimbingan ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $dosen->status_bimbingan ? 'Aktif' : 'Nonaktif' }}
                            </button>
                        </form>
                    </td>

                    <td class="px-6 py-3">
                        <a href="{{ route('admin.dosen.edit', $dosen->id) }}"
                            class="text-blue-600 hover:underline mr-2">Edit</a>

                        {{-- Optional delete button --}}
                        <form action="{{ route('admin.dosen.destroy', $dosen->id) }}" method="POST" class="inline"
                            onsubmit="return confirm('Yakin ingin mengubah status?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')"
                                class="text-red-500 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-4 text-center text-gray-500">Belum ada data dosen.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-layout>
