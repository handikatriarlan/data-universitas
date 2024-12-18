<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\JumlahMahasiswaBerprestasi;
use Illuminate\Support\Facades\Validator;

class JumlahMahasiswaBerprestasiController extends Controller
{
    public function index()
    {
        $jumlahMahasiswaBerprestasis = JumlahMahasiswaBerprestasi::all();

        return view('jumlah-mahasiswa-berprestasi.index', [
            'jumlahMahasiswaBerprestasis' => $jumlahMahasiswaBerprestasis,
        ]);
    }

    public function store(Request $r)
    {
        $messages = [
            'required' => 'Kolom :attribute harus diisikan',
            'unique' => ':attribute sudah terdaftar',
            'string' => ':attribute harus berupa teks',
            'size' => ':attribute harus berukuran :size karakter',
            'between' => ':attribute harus di antara :min dan :max karakter',
            'not_in' => ':attribute Harus Dipilih',
            'email' => ':attribute Format Email Salah'
        ];

        $data = [
            "tgl_transaksi" => $r->tgl_transaksi,
            "fakultas" => $r->fakultas,
            "jurusan" => $r->jurusan,
            "prodi" => $r->prodi,
            "kategori" => $r->kategori,
            "bidang" => $r->bidang,
            "jenis" => $r->jenis,
            "jumlah" => $r->jumlah,
        ];

        $rules = [
            'tgl_transaksi' => 'required|date',
            'fakultas' => 'required|string|max:100',
            'jurusan' => 'required|string|max:100',
            'prodi' => 'required|string|max:100',
            'kategori' => 'required|string|max:100',
            'bidang' => 'required|string|max:100',
            'jenis' => 'required|string|max:50',
            'jumlah' => 'required|integer',
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => implode(', ', $validator->errors()->all())
            ]);
        }

        try {
            $data = JumlahMahasiswaBerprestasi::create([
                "tgl_transaksi" => $r->tgl_transaksi,
                "fakultas" => $r->fakultas,
                "jurusan" => $r->jurusan,
                "prodi" => $r->prodi,
                "kategori" => $r->kategori,
                "bidang" => $r->bidang,
                "jenis" => $r->jenis,
                "jumlah" => $r->jumlah,
            ]);

            if ($data) {
                return response()->json([
                    'status' => true,
                    'data' => $data
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => 'Gagal Menambahkan Data',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'an error occurred : ' . $e->getMessage(),
            ]);
        }
    }

    public function edit(Request $r)
    {
        try {
            $user = JumlahMahasiswaBerprestasi::where('id', $r->id)->first();

            if ($user) {
                return response()->json([
                    'status' => 1,
                    'data' => $user
                ]);
            }

            return response()->json([
                'status' => 0,
                'message' => "Data tidak ditemukan"
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function update(Request $r)
    {
        $messages = [
            'required' => 'Kolom :attribute harus diisikan',
            'unique' => ':attribute sudah terdaftar',
            'string' => ':attribute harus berupa teks',
            'size' => ':attribute harus berukuran :size karakter',
            'between' => ':attribute harus di antara :min dan :max karakter',
            'not_in' => ':attribute Harus Dipilih',
            'email' => ':attribute Format Email Salah'
        ];

        $data = [
            "tgl_transaksi" => $r->tgl_transaksi,
            "fakultas" => $r->fakultas,
            "jurusan" => $r->jurusan,
            "prodi" => $r->prodi,
            "kategori" => $r->kategori,
            "bidang" => $r->bidang,
            "jenis" => $r->jenis,
            "jumlah" => $r->jumlah,
        ];

        $rules = [
            'tgl_transaksi' => 'required|date',
            'fakultas' => 'required|string|max:100',
            'jurusan' => 'required|string|max:100',
            'prodi' => 'required|string|max:100',
            'kategori' => 'required|string|max:100',
            'bidang' => 'required|string|max:100',
            'jenis' => 'required|string|max:50',
            'jumlah' => 'required|integer',
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => implode(', ', $validator->errors()->all())
            ]);
        }

        try {
            $data = JumlahMahasiswaBerprestasi::where('id', $r->id)->first();

            if ($data) {
                $data->tgl_transaksi = $r->tgl_transaksi;
                $data->fakultas = $r->fakultas;
                $data->jurusan = $r->jurusan;
                $data->prodi = $r->prodi;
                $data->kategori = $r->kategori;
                $data->bidang = $r->bidang;
                $data->jenis = $r->jenis;
                $data->jumlah = $r->jumlah;
                $data->save();

                return response()->json([
                    'status' => 1
                ]);
            }

            return response()->json([
                'status' => 0,
                'message' => "Data tidak ditemukan"
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function delete(Request $r)
    {
        try {
            $data = JumlahMahasiswaBerprestasi::where('id', $r->id)->first();

            if ($data) {
                $data->delete();
                return response()->json([
                    'status' => 1,
                ]);
            }

            return response()->json([
                'status' => 0,
                'message' => "Data tidak ditemukan"
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ]);
        }
    }
}
