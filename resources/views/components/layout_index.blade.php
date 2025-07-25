<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'My App' }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<script src="//unpkg.com/alpinejs" defer></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body class="bg-gradient-to-br from-purple-100 via-pink-100 to-purple-50 min-h-screen text-gray-800">
    <div class="min-h-screen flex">
        <div class="flex-1 flex flex-col">
            {{-- Navbar --}}
                   <header class="bg-white shadow px-6 py-4 flex justify-center items-center">
    <div class="flex items-center gap-4 px-3 py-1">
        <h1 class="text-lg font-semibold text-purple-700">Pemilihan Dosen Pembimbing Skripsi</h1>
    </div>
</header>



            {{-- Content --}}
            <main class="p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
    @stack('scripts')
</body>

</html>
