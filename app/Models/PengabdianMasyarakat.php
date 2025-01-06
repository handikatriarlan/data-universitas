<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengabdianMasyarakat extends Model
{
    use HasFactory;

    protected $table = 'tbl_pengabdian_masyarakat';

    protected $guarded = ['id'];
}
