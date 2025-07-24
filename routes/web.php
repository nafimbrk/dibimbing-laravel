<?php

use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenDashboardController;
use App\Http\Controllers\PengajuanController;
use Illuminate\Support\Facades\Route;






Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

// Route::get('/pengajuan', [PengajuanController::class, 'create'])->name('pengajuan.create');
// Route::post('/pengajuan', [PengajuanController::class, 'store'])->name('pengajuan.store');
// Route::get('/pengajuan/sukses', function () {
//     return view('pengajuan.sukses');
// })->name('pengajuan.sukses');

Route::prefix('admin/dosen')->name('admin.dosen.')->group(function () {
    Route::get('/index', [DosenController::class, 'index'])->name('index');
    Route::get('/create', [DosenController::class, 'create'])->name('create');
    Route::post('/store', [DosenController::class, 'store'])->name('store');

    Route::get('/{id}/edit', [DosenController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [DosenController::class, 'update'])->name('update');
    Route::delete('/{id}/destroy', [DosenController::class, 'destroy'])->name('destroy');
});

Route::patch('/dosen/{id}/toggle-status', [DosenController::class, 'toggleStatus'])->name('dosen.toggleStatus');

Route::get('/pembimbing', [PengajuanController::class, 'index'])->name('pengajuan.index');
Route::get('/pengajuan', [PengajuanController::class, 'create'])->name('pengajuan.create');
Route::post('/pengajuan', [PengajuanController::class, 'store'])->name('pengajuan.store');

Route::get('/pengajuan/sukses', function () {
    return view('pengajuan.sukses');
})->name('pengajuan.sukses');

Route::middleware(['auth', 'role:dosen'])->group(function () {
    Route::get('/dashboard-dosen', [DosenDashboardController::class, 'index'])->name('dashboard.dosen');
});

Route::patch('/pengajuan/{id}/terima', [DosenDashboardController::class, 'terima'])->name('pengajuan.terima');
Route::patch('/pengajuan/{id}/tolak', [DosenDashboardController::class, 'tolak'])->name('pengajuan.tolak');


Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/loginD', [AuthController::class, 'showLoginD'])->name('loginD');
Route::post('/loginD', [AuthController::class, 'loginD']);
