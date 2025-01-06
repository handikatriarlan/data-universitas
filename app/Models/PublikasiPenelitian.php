<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublikasiPenelitian extends Model
{
    use HasFactory;

    protected $table = 'tbl_publikasi_penelitian';

    protected $guarded = ['id'];
}
