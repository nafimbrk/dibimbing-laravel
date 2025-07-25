<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanBimbingan;
use App\Models\DosenProfile;
use Illuminate\Support\Facades\Storage;

class PengajuanController extends Controller
{
    public function index()
{
    $dosenProfiles = DosenProfile::all();
    return view('pengajuan.index', compact('dosenProfiles'));
}

    public function create()
    {
        $dosenAktif = DosenProfile::with('user')->where('status_bimbingan', true)->get();
        return view('pengajuan.create', compact('dosenAktif'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'nama_mahasiswa' => 'required|string|max:255',
        //     'nim' => 'required|string|max:50',
        //     'fakultas' => 'nullable|string|max:100',
        //     'prodi' => 'nullable|string|max:100',
        //     'judul' => 'required|string',
        //     'deskripsi' => 'nullable|string',
        //     'dosen_profile_id' => 'required|exists:dosen_profiles,id',
        //     'file_path' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        // ]);

        $path = null;
        if ($request->hasFile('file_path')) {
            $path = $request->file('file_path')->store('pengajuan_files', 'public');
        }

        PengajuanBimbingan::create([
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'nim' => $request->nim,
            'fakultas' => $request->fakultas,
            'prodi' => $request->prodi,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'dosen_profile_id' => $request->dosen_profile_id,
            'file_path' => $path,
        ]);

        return redirect()->route('pengajuan.sukses');
    }

    public function destroy($id)
{
    $pengajuan = PengajuanBimbingan::findOrFail($id);

    // jika ada file, hapus dulu dari storage
    if ($pengajuan->file_path) {
        Storage::disk('public')->delete($pengajuan->file_path);
    }

    $pengajuan->delete();

    return back()->with('success', 'Pengajuan berhasil dihapus.');
}

}

