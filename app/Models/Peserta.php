<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peserta extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function nomorUndian(): BelongsTo{
        return $this->belongsTo(NomorUndian::class);
    }
}
