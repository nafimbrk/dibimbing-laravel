<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\DosenProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class DosenController extends Controller
{
    public function index()
    {
        $dosens = DosenProfile::with('user')->get();

        return view('admin.dosen.index', compact('dosens'));
    }
    public function create()
    {
        return view('admin.dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'nip' => 'nullable|string|max:50',
            'prodi' => 'nullable|string|max:100',
            'fakultas' => 'nullable|string|max:100', // kalau nanti kamu tambahkan fakultas
            'foto' => 'nullable|image|max:2048', // jika kamu pakai gambar
        ]);

        // 1. Buat akun user untuk dosen
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'dosen',
        ]);

        // 2. Simpan profile dosen
        $dosen = new DosenProfile([
            'nip' => $request->nip,
            'prodi' => $request->prodi,
            'fakultas' => $request->fakultas,
            'status_bimbingan' => false,
        ]);

        // Handle upload gambar jika ada
        if ($request->hasFile('foto')) {
            $filename = $request->file('foto')->store('dosen_photos', 'public');
            $dosen->foto = $filename;
        }

        $user->dosenProfile()->save($dosen); // Relasi hasOne dari User ke DosenProfile

        return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil ditambahkan!');
    }

    public function edit($id)
{
    $dosen = DosenProfile::with('user')->findOrFail($id);
    return view('admin.dosen.edit', compact('dosen'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'password' => 'nullable|string|min:6|confirmed',
        'nip' => 'nullable|string|max:50',
        'prodi' => 'nullable|string|max:100',
        'fakultas' => 'nullable|string|max:100',
        'foto' => 'nullable|image|max:2048',
    ]);

    $dosen = DosenProfile::findOrFail($id);
    $user = $dosen->user;

    // Cek jika email berubah, validasi unik
    if ($user->email !== $request->email) {
        $request->validate(['email' => 'unique:users,email']);
    }

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
    ]);

    $data = [
        'nip' => $request->nip,
        'prodi' => $request->prodi,
        'fakultas' => $request->fakultas,
    ];

    // Handle foto baru
    if ($request->hasFile('foto')) {
        // Hapus foto lama jika ada
        if ($dosen->foto && Storage::disk('public')->exists($dosen->foto)) {
            Storage::disk('public')->delete($dosen->foto);
        }

        $filename = $request->file('foto')->store('dosen_photos', 'public');
        $data['foto'] = $filename;
    }

    $dosen->update($data);

    return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil diperbarui.');
}

public function destroy($id)
{
    $dosen = DosenProfile::findOrFail($id);

    // Hapus foto jika ada
    if ($dosen->foto && Storage::disk('public')->exists($dosen->foto)) {
        Storage::disk('public')->delete($dosen->foto);
    }

    $dosen->delete();

    return redirect()->route('admin.dosen.index')->with('success', 'Data dosen berhasil dihapus.');
}


public function toggleStatus($id)
{
    $dosen = DosenProfile::findOrFail($id);
    $dosen->status_bimbingan = !$dosen->status_bimbingan;
    $dosen->save();

    return redirect()->back();
}

}
