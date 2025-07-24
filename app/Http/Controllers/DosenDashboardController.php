<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanBimbingan;
use Illuminate\Support\Facades\Auth;


class DosenDashboardController extends Controller
{
    public function index()
{
    // Ambil ID dosen dari user yang sedang login
    $user = Auth::user();
    $dosen = $user->dosenProfile;

    // Ambil pengajuan bimbingan yang ditujukan ke dosen ini
    $pengajuans = PengajuanBimbingan::where('dosen_profile_id', $dosen->id)->latest()->get();

    return view('dosen.dashboard', compact('pengajuans'));
}

public function terima($id)
{
    $pengajuan = PengajuanBimbingan::findOrFail($id);
    $pengajuan->update(['status' => 'diterima']);

    return redirect()->back();
}

public function tolak($id)
{
    $pengajuan = PengajuanBimbingan::findOrFail($id);
    $pengajuan->update(['status' => 'ditolak']);

    return redirect()->back();
}

}
