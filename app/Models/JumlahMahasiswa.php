<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JumlahMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'tbl_jlh_mahasiswa';

    protected $guarded = ['id'];
}
