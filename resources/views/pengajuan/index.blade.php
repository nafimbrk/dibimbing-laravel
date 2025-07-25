<x-layout_index>
    <div class="max-w-7xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-semibold mb-6">Pilih Dosen Pembimbing</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach ($dosenProfiles as $dosen)
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-200">
            <div class="flex justify-center mt-6">
                @if ($dosen->foto)
                    <img src="{{ asset('storage/' . $dosen->foto) }}"
                         alt="Foto Dosen"
                         class="w-24 h-24 object-cover rounded-full shadow-lg ring-2 ring-purple-500">
                @else
                    <div class="w-24 h-24 flex items-center justify-center rounded-full bg-gray-200 text-gray-500 text-sm">
                        No Image
                    </div>
                @endif
            </div>

            <div class="p-4 text-center">
                <h2 class="text-xl font-bold text-gray-800">{{ $dosen->nama }}</h2>
                <p class="text-sm text-gray-500">{{ $dosen->user->name }}</p>
                <p class="text-sm text-gray-600 mt-1">{{ $dosen->fakultas }}</p>
                <p class="text-sm text-gray-600">{{ $dosen->prodi }}</p>

                <p class="text-sm mt-2">
                    <span class="font-medium text-gray-700">Status Bimbingan:</span>
                    <span class="inline-block px-2 py-1 text-xs rounded-full
                        {{ $dosen->status_bimbingan ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ $dosen->status_bimbingan ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </p>

                @if ($dosen->status_bimbingan)
                    <a href="{{ route('pengajuan.create', $dosen->id) }}"
                       class="mt-4 inline-block bg-purple-600 hover:bg-purple-700 text-white text-sm px-4 py-2 rounded-lg w-full transition duration-200">
                        Ajukan Bimbingan
                    </a>
                @else
                    <button disabled
                            class="mt-4 inline-block bg-gray-300 text-gray-500 text-sm px-4 py-2 rounded-lg w-full cursor-not-allowed">
                        Tidak Tersedia
                    </button>
                @endif
            </div>
        </div>
    @endforeach
</div>

</div>

</x-layout_index>
