<x-layout title="Dashboard">
    <div class="p-6 bg-gray-100 min-h-screen">

        @if (Auth::user()->role === 'admin')
            <h1 class="text-2xl font-bold mb-6">Ringkasan Dosen</h1>

   <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <div class="bg-blue-100 p-5 rounded-xl shadow">
        <h2 class="text-lg font-semibold mb-1">Total Dosen</h2>
        <p class="text-2xl font-bold text-blue-700">
            {{ $totalDosen }}
        </p>
    </div>

    <div class="bg-green-100 p-5 rounded-xl shadow">
        <h2 class="text-lg font-semibold mb-1">Dosen Aktif (Bisa Dibimbing)</h2>
        <p class="text-2xl font-bold text-green-700">
            {{ $totalDosenAktif }}
        </p>
    </div>

    <div class="bg-red-100 p-5 rounded-xl shadow">
        <h2 class="text-lg font-semibold mb-1">Dosen Tidak Aktif</h2>
        <p class="text-2xl font-bold text-red-700">
            {{ $totalDosenTidakAktif }}
        </p>
    </div>
</div>
@else
<h1 class="text-2xl font-bold mb-6">Ringkasan Mahasiswa</h1>

   <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <div class="bg-blue-100 p-5 rounded-xl shadow">
        <h2 class="text-lg font-semibold mb-1">Total Pengajuan</h2>
        <p class="text-2xl font-bold text-blue-700">
            {{ $totalPengajuan  }}
        </p>
    </div>

    <div class="bg-green-100 p-5 rounded-xl shadow">
        <h2 class="text-lg font-semibold mb-1">Menunggu</h2>
        <p class="text-2xl font-bold text-green-700">
            {{ $totalDiterima }}
        </p>
    </div>

    <div class="bg-red-100 p-5 rounded-xl shadow">
        <h2 class="text-lg font-semibold mb-1">Diterima</h2>
        <p class="text-2xl font-bold text-red-700">
            {{ $totalDitolak }}
        </p>
    </div>
</div>
        @endif


</div>

</x-layout>
