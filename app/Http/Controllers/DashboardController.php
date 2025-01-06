<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Alumni;
use App\Models\Peserta;
use Illuminate\Http\Request;
use App\Models\ProdukInovasi;
use App\Models\TenagaPendidik;
use App\Models\JumlahMahasiswa;
use App\Models\PublikasiPenelitian;
use App\Http\Controllers\Controller;
use App\Models\PengabdianMasyarakat;
use App\Models\JumlahMahasiswaBerprestasi;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            "count_peserta" => Peserta::count(),
            "count_admin" => User::where('role', 'super_admin')->count(),
            "count_jumlah_mahasiswa" => JumlahMahasiswa::count(),
            "count_jumlah_mahasiswa_berprestasi" => JumlahMahasiswaBerprestasi::count(),
            "count_tenaga_pendidik" => TenagaPendidik::count(),
            "count_publikasi_penelitian" => PublikasiPenelitian::count(),
            "count_produk_inovasi" => ProdukInovasi::count(),
            "count_pengabdian_masyarakat" => PengabdianMasyarakat::count(),
            "count_alumni" => Alumni::count(),
            "count_registered" => Peserta::where('status_daftar', 1)->count(),
        ];

        return view('index', $data);
    }
}
