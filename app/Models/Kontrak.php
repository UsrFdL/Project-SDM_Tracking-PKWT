<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kontrak extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'kontraks';
    protected $dates = [
        'tglMulai',
        'tglSelesai',
    ];
    protected $fillable = [
        'karyawan_nik',
        'lamaKontrak',
    ];

    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_nik', 'nik');
    }
}
