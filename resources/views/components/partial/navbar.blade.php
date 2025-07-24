<header class="bg-white shadow px-6 py-4 flex justify-end items-center">
    <div class="flex items-center gap-4">
        <span class="text-sm text-gray-600">Halo, {{ Auth::user()->name ?? 'User' }}</span>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                Logout
            </button>
        </form>
    </div>
</header>
