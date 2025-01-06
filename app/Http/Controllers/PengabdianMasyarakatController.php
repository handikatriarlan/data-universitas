<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\PengabdianMasyarakat;
use Illuminate\Support\Facades\Validator;

class PengabdianMasyarakatController extends Controller
{
    public function index()
    {
        $pengabdianMasyarakats = PengabdianMasyarakat::all();

        return view('pengabdian-masyarakat.index', [
            'pengabdianMasyarakats' => $pengabdianMasyarakats,
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
            "jumlah" => $r->jumlah,
        ];

        $rules = [
            'tgl_transaksi' => 'required|date',
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
            $data = PengabdianMasyarakat::create([
                "tgl_transaksi" => $r->tgl_transaksi,
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
            $user = PengabdianMasyarakat::where('id', $r->id)->first();

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
            "jumlah" => $r->jumlah,
        ];

        $rules = [
            'tgl_transaksi' => 'required|date',
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
            $data = PengabdianMasyarakat::where('id', $r->id)->first();

            if ($data) {
                $data->tgl_transaksi = $r->tgl_transaksi;
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
            $data = PengabdianMasyarakat::where('id', $r->id)->first();

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
