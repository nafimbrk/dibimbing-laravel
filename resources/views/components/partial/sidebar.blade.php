{{-- <aside class="w-64 bg-white border-r shadow-sm hidden md:block">
    <div class="p-6 text-lg font-semibold">
        <a href="/" class="text-blue-600">📘 MyFinance</a>
    </div>
    <nav class="px-4">
        <ul class="space-y-2">
            <li>
                <a href="/" class="block px-4 py-2 rounded hover:bg-blue-100">
                    🏠 Dashboard
                </a>
            </li>
            <li>
                <a href="/transactions" class="block px-4 py-2 rounded hover:bg-blue-100">
                    💸 Transactions
                </a>
            </li>
            <li>
                <a href="/categories" class="block px-4 py-2 rounded hover:bg-blue-100">
                    📂 Categories
                </a>
            </li>
            <li>
                <a href="/report" class="block px-4 py-2 rounded hover:bg-blue-100">
                    📊 Reports
                </a>
            </li>
        </ul>
    </nav>
</aside> --}}


<aside class="w-64 bg-gradient-to-b from-purple-600 to-pink-500 text-white shadow-lg">
    <div class="p-6 text-xl font-bold">📚 Dibimbing</div>
    <nav class="mt-4 flex flex-col gap-2 px-4">
        <a href="{{ url('/dashboard') }}" class="px-4 py-2 rounded hover:bg-purple-700 transition">Dashboard</a>
        @if (Auth::user()->role === 'admin')
        <a href="{{ route('admin.dosen.index') }}" class="px-4 py-2 rounded hover:bg-purple-700 transition">Dosen</a>
        @else
                <a href="{{ route('dashboard.dosen') }}" class="px-4 py-2 rounded hover:bg-purple-700 transition">Mahasiswa</a>
        @endif
        {{-- <a href="{{ route('transaction.index') }}" class="px-4 py-2 rounded hover:bg-purple-700 transition">Transaksi</a>
        <a href="{{ route('report.index') }}" class="px-4 py-2 rounded hover:bg-purple-700 transition">Laporan</a> --}}
    </nav>
</aside>
