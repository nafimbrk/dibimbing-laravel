<?php

namespace App\Http\Controllers;

use App\Models\DosenProfile;
use App\Models\PengajuanBimbingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
public function index()
{
    if (Auth::user()->role == 'admin') {
    $totalDosen = DosenProfile::count();
    $totalDosenAktif = DosenProfile::where('status_bimbingan', true)->count();
    $totalDosenTidakAktif = DosenProfile::where('status_bimbingan', false)->count();

    return view('dashboard', compact(
        'totalDosen',
        'totalDosenAktif',
        'totalDosenTidakAktif'
    ));
} else if (Auth::user()->role == 'dosen') {
    $userId = Auth::id(); // asumsinya ini ID user dosen

    $totalPengajuan = PengajuanBimbingan::where('dosen_profile_id', $userId)->count();
    $totalMenunggu = PengajuanBimbingan::where('dosen_profile_id', $userId)->where('status', 'menunggu')->count();
    $totalDiterima = PengajuanBimbingan::where('dosen_profile_id', $userId)->where('status', 'diterima')->count();
    $totalDitolak = PengajuanBimbingan::where('dosen_profile_id', $userId)->where('status', 'ditolak')->count();

    return view('dashboard', compact(
        'totalPengajuan',
        'totalMenunggu',
        'totalDiterima',
        'totalDitolak'
    ));
}

}

}
