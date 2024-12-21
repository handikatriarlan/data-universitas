<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukInovasi extends Model
{
    use HasFactory;

    protected $table = 'tbl_produk_inovasi';

    protected $guarded = ['id'];
}
