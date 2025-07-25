<x-layout_index title="Pengajuan Pembimbing">
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
                    <option value="Teknik">Teknik
                    </option>
                    <option value="Ekonomi">Ekonomi</option>
                    <option value="Kedokteran">Kedokteran</option>
            </select>
        </div>

        <div>
            <label class="block">Prodi</label>
            <select name="prodi" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-purple-500" required>
                <option value="">-- Pilih Prodi --</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Manajemen">Manajemen</option>
                    <option value="Kedokteran Umum">Kedokteran Umum</option>
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
    <label class="block font-medium text-sm text-gray-700">Upload File (opsional, PDF/DOC)</label>
    <input type="file" name="file_path" id="file_path"
           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-purple-500"
           accept=".pdf,.doc,.docx">

    <!-- Ikon & Nama File -->
    <div id="file-info" class="mt-2 flex items-center space-x-2 text-sm text-gray-700 hidden">
        <span id="file-icon" class="text-2xl"></span>
        <span id="file-name"></span>
    </div>

    <!-- Preview PDF -->
    <div id="pdf-preview" class="mt-4 hidden">
        <label class="block font-medium text-sm text-gray-700">Preview PDF:</label>
        <embed id="pdf-embed" src="" type="application/pdf" width="100%" height="400px"
               class="border rounded-lg shadow" />
    </div>
</div>

<script>
    document.getElementById('file_path').addEventListener('change', function (event) {
        const file = event.target.files[0];

        const fileInfo = document.getElementById('file-info');
        const fileNameSpan = document.getElementById('file-name');
        const fileIcon = document.getElementById('file-icon');

        const pdfPreview = document.getElementById('pdf-preview');
        const pdfEmbed = document.getElementById('pdf-embed');

        if (file) {
            const fileName = file.name;
            const fileExt = fileName.split('.').pop().toLowerCase();

            // Tampilkan nama file + ikon
            fileInfo.classList.remove('hidden');
            fileNameSpan.textContent = fileName;

            if (fileExt === 'pdf') {
                fileIcon.textContent = '📄';
                const fileURL = URL.createObjectURL(file);
                pdfEmbed.src = fileURL;
                pdfPreview.classList.remove('hidden');
            } else if (fileExt === 'doc' || fileExt === 'docx') {
                fileIcon.textContent = '📝';
                pdfPreview.classList.add('hidden');
            } else {
                fileIcon.textContent = '📁';
                pdfPreview.classList.add('hidden');
            }
        } else {
            fileInfo.classList.add('hidden');
            pdfPreview.classList.add('hidden');
        }
    });
</script>


        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Kirim Pengajuan</button>
    </form>
</div>
</x-layout_index>
