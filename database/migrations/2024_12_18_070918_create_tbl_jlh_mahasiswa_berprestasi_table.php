<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_jlh_mahasiswa_berprestasi', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_transaksi');
            $table->string('fakultas', 100);
            $table->string('jurusan', 100);
            $table->string('prodi', 100);
            $table->string('kategori', 100);
            $table->string('bidang', 100);
            $table->string('jenis', 50);
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_jlh_mahasiswa_berprestasi');
    }
};
