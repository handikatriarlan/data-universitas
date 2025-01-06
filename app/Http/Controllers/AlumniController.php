<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlumniController extends Controller
{
    public function index()
    {
        $alumnis = Alumni::all();

        return view('alumni.index', [
            'alumnis' => $alumnis,
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
            "bekerja" => $r->bekerja,
            "belum_bekerja" => $r->belum_bekerja,
            "lanjut_kuliah" => $r->lanjut_kuliah,
            "wiraswasta" => $r->wiraswasta,
        ];

        $rules = [
            'tgl_transaksi' => 'required|date',
            'fakultas' => 'required|string|max:100',
            'jurusan' => 'required|string|max:100',
            'prodi' => 'required|string|max:100',
            'bekerja' => 'required|integer',
            'belum_bekerja' => 'required|integer',
            'lanjut_kuliah' => 'required|integer',
            'wiraswasta' => 'required|integer',
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => implode(', ', $validator->errors()->all())
            ]);
        }

        try {
            $data = Alumni::create([
                "tgl_transaksi" => $r->tgl_transaksi,
                "fakultas" => $r->fakultas,
                "jurusan" => $r->jurusan,
                "prodi" => $r->prodi,
                "bekerja" => $r->bekerja,
                "belum_bekerja" => $r->belum_bekerja,
                "lanjut_kuliah" => $r->lanjut_kuliah,
                "wiraswasta" => $r->wiraswasta,
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
            $user = Alumni::where('id', $r->id)->first();

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
            "bekerja" => $r->bekerja,
            "belum_bekerja" => $r->belum_bekerja,
            "lanjut_kuliah" => $r->lanjut_kuliah,
            "wiraswasta" => $r->wiraswasta,
        ];

        $rules = [
            'tgl_transaksi' => 'required|date',
            'fakultas' => 'required|string|max:100',
            'jurusan' => 'required|string|max:100',
            'prodi' => 'required|string|max:100',
            'bekerja' => 'required|integer',
            'belum_bekerja' => 'required|integer',
            'lanjut_kuliah' => 'required|integer',
            'wiraswasta' => 'required|integer',
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => implode(', ', $validator->errors()->all())
            ]);
        }

        try {
            $data = Alumni::where('id', $r->id)->first();

            if ($data) {
                $data->tgl_transaksi = $r->tgl_transaksi;
                $data->fakultas = $r->fakultas;
                $data->jurusan = $r->jurusan;
                $data->prodi = $r->prodi;
                $data->belum_bekerja = $r->belum_bekerja;
                $data->lanjut_kuliah = $r->lanjut_kuliah;
                $data->wiraswasta = $r->wiraswasta;
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
            $data = Alumni::where('id', $r->id)->first();

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
