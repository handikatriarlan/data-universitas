<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\UndianController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProdukInovasiController;
use App\Http\Controllers\TenagaPendidikController;
use App\Http\Controllers\JumlahMahasiswaController;
use App\Http\Controllers\PublikasiPenelitianController;
use App\Http\Controllers\PengabdianMasyarakatController;
use App\Http\Controllers\JumlahMahasiswaBerprestasiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingPageController::class, 'index']);
Route::redirect('/home', '/dashboard');

Route::get('/daftar', [PesertaController::class, 'pendaftaran']);
Route::post('/daftar', [PesertaController::class, 'store']);

Route::post('/daftar-peserta/generated-qrcode', [PesertaController::class, 'generatedQr']);
Route::get('/daftar-peserta/load-data', [PesertaController::class, 'loadData']);

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginCheck']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/undian', [UndianController::class, 'index']);
    Route::get('/load-number', [UndianController::class, 'generateNumber']);

    Route::get('/monitor', [MonitorController::class, 'index']);
    Route::get('/monitor/check', [MonitorController::class, 'getUser']);

    Route::get('/daftar-peserta', [PesertaController::class, 'index']);
    Route::get('/daftar-peserta/edit-data', [PesertaController::class, 'edit']);
    Route::post('/daftar-peserta/update-data', [PesertaController::class, 'update']);
    Route::post('/daftar-peserta/delete-data', [PesertaController::class, 'delete']);
    Route::get('/daftar-peserta/detail-peserta/{id}', [PesertaController::class, 'detail']);
    Route::post('/daftar-peserta/status-daftar', [PesertaController::class, 'statusDaftar']);

    Route::get('/daftar-admin', [AdminController::class, 'index']);
    Route::post('/daftar-admin/store-admin', [AdminController::class, 'store']);
    Route::get('/daftar-admin/edit-data', [AdminController::class, 'edit']);
    Route::post('/daftar-admin/update-data', [AdminController::class, 'update']);
    Route::post('/daftar-admin/update-password', [AdminController::class, 'updatePassword']);
    Route::post('/daftar-admin/delete-data', [AdminController::class, 'delete']);
    
    Route::get('/daftar-jumlah-mahasiswa-berprestasi', [JumlahMahasiswaBerprestasiController::class, 'index']);
    Route::post('/daftar-jumlah-mahasiswa-berprestasi/store', [JumlahMahasiswaBerprestasiController::class, 'store']);
    Route::get('/daftar-jumlah-mahasiswa-berprestasi/edit', [JumlahMahasiswaBerprestasiController::class, 'edit']);
    Route::post('/daftar-jumlah-mahasiswa-berprestasi/update', [JumlahMahasiswaBerprestasiController::class, 'update']);
    Route::post('/daftar-jumlah-mahasiswa-berprestasi/delete', [JumlahMahasiswaBerprestasiController::class, 'delete']);
    
    Route::get('/daftar-tenaga-pendidik', [TenagaPendidikController::class, 'index']);
    Route::post('/daftar-tenaga-pendidik/store', [TenagaPendidikController::class, 'store']);
    Route::get('/daftar-tenaga-pendidik/edit', [TenagaPendidikController::class, 'edit']);
    Route::post('/daftar-tenaga-pendidik/update', [TenagaPendidikController::class, 'update']);
    Route::post('/daftar-tenaga-pendidik/delete', [TenagaPendidikController::class, 'delete']);
    
    Route::get('/daftar-inovasi', [ProdukInovasiController::class, 'index']);
    Route::post('/daftar-inovasi/store', [ProdukInovasiController::class, 'store']);
    Route::get('/daftar-inovasi/edit', [ProdukInovasiController::class, 'edit']);
    Route::post('/daftar-inovasi/update', [ProdukInovasiController::class, 'update']);
    Route::post('/daftar-inovasi/delete', [ProdukInovasiController::class, 'delete']);

    Route::get('/daftar-alumni', [AlumniController::class, 'index']);
    Route::post('/daftar-alumni/store', [AlumniController::class, 'store']);
    Route::get('/daftar-alumni/edit', [AlumniController::class, 'edit']);
    Route::post('/daftar-alumni/update', [AlumniController::class, 'update']);
    Route::post('/daftar-alumni/delete', [AlumniController::class, 'delete']);

    Route::get('/daftar-pengabdian', [PengabdianMasyarakatController::class, 'index']);
    Route::post('/daftar-pengabdian/store', [PengabdianMasyarakatController::class, 'store']);
    Route::get('/daftar-pengabdian/edit', [PengabdianMasyarakatController::class, 'edit']);
    Route::post('/daftar-pengabdian/update', [PengabdianMasyarakatController::class, 'update']);
    Route::post('/daftar-pengabdian/delete', [PengabdianMasyarakatController::class, 'delete']);

    Route::get('/daftar-penelitian', [PublikasiPenelitianController::class, 'index']);
    Route::post('/daftar-penelitian/store', [PublikasiPenelitianController::class, 'store']);
    Route::get('/daftar-penelitian/edit', [PublikasiPenelitianController::class, 'edit']);
    Route::post('/daftar-penelitian/update', [PublikasiPenelitianController::class, 'update']);
    Route::post('/daftar-penelitian/delete', [PublikasiPenelitianController::class, 'delete']);
    
    Route::get('/daftar-jumlah-mahasiswa', [JumlahMahasiswaController::class, 'index']);
    Route::post('/daftar-jumlah-mahasiswa/store', [JumlahMahasiswaController::class, 'store']);
    Route::get('/daftar-jumlah-mahasiswa/edit', [JumlahMahasiswaController::class, 'edit']);
    Route::post('/daftar-jumlah-mahasiswa/update', [JumlahMahasiswaController::class, 'update']);
    Route::post('/daftar-jumlah-mahasiswa/delete', [JumlahMahasiswaController::class, 'delete']);
    
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('/storage-link', function () {
    $targetStorage = storage_path('app/public');
    $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/file_uploaded';
    symlink($targetStorage, $linkFolder);
});
