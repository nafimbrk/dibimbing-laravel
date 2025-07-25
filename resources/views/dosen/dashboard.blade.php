<x-layout>
<div class="max-w-5xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Dashboard Dosen</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @forelse ($pengajuans as $item)
            <div class="bg-white shadow p-4 rounded-lg relative">
                @if($item->status === 'ditolak')
    <form action="{{ route('pengajuan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengajuan ini?')" class="absolute top-2 right-2">
        @csrf
        @method('DELETE')
        <button class="text-gray-400 hover:text-red-600 text-2xl leading-none">&times;</button>
    </form>
@endif
                <h2 class="font-semibold text-lg">{{ $item->nama_mahasiswa }} ({{ $item->nim }})</h2>
                <p class="text-sm text-gray-600 mb-1"><strong>Judul:</strong> {{ $item->judul }}</p>
                <p class="text-sm text-gray-600 mb-1"><strong>Fakultas/Prodi:</strong> {{ $item->fakultas }}/{{ $item->prodi }}</p>
                <p class="text-sm text-gray-600 mb-1"><strong>Status:</strong>
                    <span class="inline-block px-2 py-1 text-xs rounded
                        @if($item->status === 'diterima') bg-green-100 text-green-700
                        @elseif($item->status === 'ditolak') bg-red-100 text-red-700
                        @else bg-yellow-100 text-yellow-700 @endif">
                        {{ ucfirst($item->status) }}
                    </span>
                </p>
                @if($item->file_path)
                    <a href="{{ asset('storage/'.$item->file_path) }}" class="text-blue-600 text-sm underline" target="_blank">Lihat file</a>
                @endif
                <div class="mt-2 flex space-x-2">
                    <form action="{{ route('pengajuan.terima', $item->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="bg-green-600 text-white text-sm px-3 py-1 rounded hover:bg-green-700">Terima</button>
                    </form>
                    <form action="{{ route('pengajuan.tolak', $item->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="bg-red-600 text-white text-sm px-3 py-1 rounded hover:bg-red-700">Tolak</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-600">Belum ada pengajuan bimbingan.</p>
        @endforelse
    </div>
</div>
</x-layout>
