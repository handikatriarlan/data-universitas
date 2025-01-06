<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\PublikasiPenelitian;
use Illuminate\Support\Facades\Validator;

class PublikasiPenelitianController extends Controller
{
    public function index()
    {
        $publikasiPenelitians = PublikasiPenelitian::all();

        return view('publikasi-penelitian.index', [
            'publikasiPenelitians' => $publikasiPenelitians,
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
            "unit" => $r->unit,
            "nasional" => $r->nasional,
            "internasional" => $r->internasional,
            "internasional_index" => $r->internasional_index,
            "prosiding" => $r->prosiding,
            "seminar" => $r->seminar,
            "kategori" => $r->kategori,
        ];

        $rules = [
            'tgl_transaksi' => 'required|date',
            'unit' => 'required|string|max:100',
            'nasional' => 'required|integer|max:100',
            'internasional' => 'required|integer|max:100',
            'internasional_index' => 'required|integer|max:100',
            'prosiding' => 'required|integer|max:100',
            'seminar' => 'required|integer|max:50',
            'kategori' => 'required|string',
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => implode(', ', $validator->errors()->all())
            ]);
        }

        try {
            $data = PublikasiPenelitian::create([
                "tgl_transaksi" => $r->tgl_transaksi,
                "unit" => $r->unit,
                "nasional" => $r->nasional,
                "internasional" => $r->internasional,
                "internasional_index" => $r->internasional_index,
                "prosiding" => $r->prosiding,
                "seminar" => $r->seminar,
                "kategori" => $r->kategori,
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
            $user = PublikasiPenelitian::where('id', $r->id)->first();

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
            "unit" => $r->unit,
            "nasional" => $r->nasional,
            "internasional" => $r->internasional,
            "internasional_index" => $r->internasional_index,
            "prosiding" => $r->prosiding,
            "seminar" => $r->seminar,
            "kategori" => $r->kategori,
        ];

        $rules = [
            'tgl_transaksi' => 'required|date',
            'unit' => 'required|string|max:100',
            'nasional' => 'required|integer|max:100',
            'internasional' => 'required|integer|max:100',
            'internasional_index' => 'required|integer|max:100',
            'prosiding' => 'required|integer|max:100',
            'seminar' => 'required|integer|max:50',
            'kategori' => 'required|string',
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => implode(', ', $validator->errors()->all())
            ]);
        }

        try {
            $data = PublikasiPenelitian::where('id', $r->id)->first();

            if ($data) {
                $data->tgl_transaksi = $r->tgl_transaksi;
                $data->unit = $r->unit;
                $data->nasional = $r->nasional;
                $data->internasional = $r->internasional;
                $data->internasional_index = $r->internasional_index;
                $data->prosiding = $r->prosiding;
                $data->seminar = $r->seminar;
                $data->kategori = $r->kategori;
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
            $data = PublikasiPenelitian::where('id', $r->id)->first();

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
