<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\TenagaPendidik;
use Illuminate\Support\Facades\Validator;

class TenagaPendidikController extends Controller
{
    public function index()
    {
        $tenagaPendidiks = TenagaPendidik::all();

        return view('tenaga-pendidik.index', [
            'tenagaPendidiks' => $tenagaPendidiks,
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
            "jurusan" => $r->jurusan,
            "prodi" => $r->prodi,
            "professor_pns" => $r->professor_pns,
            "professor_non_pns" => $r->professor_non_pns,
            "lektor_kepala_pns" => $r->lektor_kepala_pns,
            "lektor_kepala_non_pns" => $r->lektor_kepala_non_pns,
            "lektor_pns" => $r->lektor_pns,
            "lektor_non_pns" => $r->lektor_non_pns,
            "asisten_ahli_pns" => $r->asisten_ahli_pns,
            "asisten_ahli_non_pns" => $r->asisten_ahli_non_pns,
            "tenaga_pengajar_pns" => $r->tenaga_pengajar_pns,
            "tenaga_pengajar_non_pns" => $r->tenaga_pengajar_non_pns,
            "terkualifikasi_s3" => $r->terkualifikasi_s3,
            "terkualifikasi_kompetensi_profesi" => $r->terkualifikasi_kompetensi_profesi,
            "terkualifikasi_praktisi" => $r->terkualifikasi_praktisi,
            "pegawai_pppk" => $r->pegawai_pppk,
            "nidn" => $r->nidn,
        ];

        $rules = [
            'tgl_transaksi' => 'required|date',
            'unit' => 'required|string|max:100',
            'jurusan' => 'required|string|max:100',
            'prodi' => 'required|string|max:100',
            'professor_pns' => 'required|integer',
            'professor_non_pns' => 'required|integer',
            'lektor_kepala_pns' => 'required|integer',
            'lektor_kepala_non_pns' => 'required|integer',
            'lektor_pns' => 'required|integer',
            'lektor_non_pns' => 'required|integer',
            'asisten_ahli_pns' => 'required|integer',
            'asisten_ahli_non_pns' => 'required|integer',
            'tenaga_pengajar_pns' => 'required|integer',
            'tenaga_pengajar_non_pns' => 'required|integer',
            'terkualifikasi_s3' => 'required|integer',
            'terkualifikasi_kompetensi_profesi' => 'required|integer',
            'terkualifikasi_praktisi' => 'required|integer',
            'pegawai_pppk' => 'required|integer',
            'nidn' => 'required|integer',
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => implode(', ', $validator->errors()->all())
            ]);
        }

        try {
            $data = TenagaPendidik::create([
                "tgl_transaksi" => $r->tgl_transaksi,
                "unit" => $r->unit,
                "jurusan" => $r->jurusan,
                "prodi" => $r->prodi,
                "professor_pns" => $r->professor_pns,
                "professor_non_pns" => $r->professor_non_pns,
                "lektor_kepala_pns" => $r->lektor_kepala_pns,
                "lektor_kepala_non_pns" => $r->lektor_kepala_non_pns,
                "lektor_pns" => $r->lektor_pns,
                "lektor_non_pns" => $r->lektor_non_pns,
                "asisten_ahli_pns" => $r->asisten_ahli_pns,
                "asisten_ahli_non_pns" => $r->asisten_ahli_non_pns,
                "tenaga_pengajar_pns" => $r->tenaga_pengajar_pns,
                "tenaga_pengajar_non_pns" => $r->tenaga_pengajar_non_pns,
                "terkualifikasi_s3" => $r->terkualifikasi_s3,
                "terkualifikasi_kompetensi_profesi" => $r->terkualifikasi_kompetensi_profesi,
                "terkualifikasi_praktisi" => $r->terkualifikasi_praktisi,
                "pegawai_pppk" => $r->pegawai_pppk,
                "nidn" => $r->nidn,
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
            $user = TenagaPendidik::where('id', $r->id)->first();

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
            "jurusan" => $r->jurusan,
            "prodi" => $r->prodi,
            "professor_pns" => $r->professor_pns,
            "professor_non_pns" => $r->professor_non_pns,
            "lektor_kepala_pns" => $r->lektor_kepala_pns,
            "lektor_kepala_non_pns" => $r->lektor_kepala_non_pns,
            "lektor_pns" => $r->lektor_pns,
            "lektor_non_pns" => $r->lektor_non_pns,
            "asisten_ahli_pns" => $r->asisten_ahli_pns,
            "asisten_ahli_non_pns" => $r->asisten_ahli_non_pns,
            "tenaga_pengajar_pns" => $r->tenaga_pengajar_pns,
            "tenaga_pengajar_non_pns" => $r->tenaga_pengajar_non_pns,
            "terkualifikasi_s3" => $r->terkualifikasi_s3,
            "terkualifikasi_kompetensi_profesi" => $r->terkualifikasi_kompetensi_profesi,
            "terkualifikasi_praktisi" => $r->terkualifikasi_praktisi,
            "pegawai_pppk" => $r->pegawai_pppk,
            "nidn" => $r->nidn,
        ];

        $rules = [
            'tgl_transaksi' => 'required|date',
            'unit' => 'required|string|max:100',
            'jurusan' => 'required|string|max:100',
            'prodi' => 'required|string|max:100',
            'professor_pns' => 'required|integer',
            'professor_non_pns' => 'required|integer',
            'lektor_kepala_pns' => 'required|integer',
            'lektor_kepala_non_pns' => 'required|integer',
            'lektor_pns' => 'required|integer',
            'lektor_non_pns' => 'required|integer',
            'asisten_ahli_pns' => 'required|integer',
            'asisten_ahli_non_pns' => 'required|integer',
            'tenaga_pengajar_pns' => 'required|integer',
            'tenaga_pengajar_non_pns' => 'required|integer',
            'terkualifikasi_s3' => 'required|integer',
            'terkualifikasi_kompetensi_profesi' => 'required|integer',
            'terkualifikasi_praktisi' => 'required|integer',
            'pegawai_pppk' => 'required|integer',
            'nidn' => 'required|integer',
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => implode(', ', $validator->errors()->all())
            ]);
        }

        try {
            $data = TenagaPendidik::where('id', $r->id)->first();

            if ($data) {
                $data->tgl_transaksi = $r->tgl_transaksi;
                $data->unit = $r->unit;
                $data->jurusan = $r->jurusan;
                $data->prodi = $r->prodi;
                $data->professor_pns = $r->professor_pns;
                $data->professor_non_pns = $r->professor_non_pns;
                $data->lektor_kepala_non_pns = $r->lektor_kepala_non_pns;
                $data->lektor_pns = $r->lektor_pns;
                $data->lektor_non_pns = $r->lektor_non_pns;
                $data->asisten_ahli_pns = $r->asisten_ahli_pns;
                $data->asisten_ahli_non_pns = $r->asisten_ahli_non_pns;
                $data->tenaga_pengajar_pns = $r->tenaga_pengajar_pns;
                $data->tenaga_pengajar_non_pns = $r->tenaga_pengajar_non_pns;
                $data->terkualifikasi_s3 = $r->terkualifikasi_s3;
                $data->terkualifikasi_kompetensi_profesi = $r->terkualifikasi_kompetensi_profesi;
                $data->terkualifikasi_praktisi = $r->terkualifikasi_praktisi;
                $data->pegawai_pppk = $r->pegawai_pppk;
                $data->nidn = $r->nidn;
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
            $data = TenagaPendidik::where('id', $r->id)->first();

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
