<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JumlahMahasiswa;
use Exception;
use Illuminate\Support\Facades\Validator;

class JumlahMahasiswaController extends Controller
{
    public function index()
    {
        $jumlahMahasiswas = JumlahMahasiswa::all();

        return view('jumlah-mahasiswa.index', [
            'jumlahMahasiswas' => $jumlahMahasiswas,
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
            "jumlah" => $r->jumlah,
        ];

        $rules = [
            'tgl_transaksi' => 'required|date',
            'fakultas' => 'required|string|max:100',
            'jurusan' => 'required|string|max:100',
            'prodi' => 'required|string|max:100',
            'kategori' => 'required|string|max:100',
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
            $data = JumlahMahasiswa::create([
                "tgl_transaksi" => $r->tgl_transaksi,
                "fakultas" => $r->fakultas,
                "jurusan" => $r->jurusan,
                "prodi" => $r->prodi,
                "kategori" => $r->kategori,
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
            $user = JumlahMahasiswa::where('id', $r->id)->first();

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
            "jumlah" => $r->jumlah,
        ];

        $rules = [
            'tgl_transaksi' => 'required|date',
            'fakultas' => 'required|string|max:100',
            'jurusan' => 'required|string|max:100',
            'prodi' => 'required|string|max:100',
            'kategori' => 'required|string|max:100',
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
            $data = JumlahMahasiswa::where('id', $r->id)->first();

            if ($data) {
                $data->tgl_transaksi = $r->tgl_transaksi;
                $data->fakultas = $r->fakultas;
                $data->jurusan = $r->jurusan;
                $data->prodi = $r->prodi;
                $data->kategori = $r->kategori;
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
            $data = JumlahMahasiswa::where('id', $r->id)->first();

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
