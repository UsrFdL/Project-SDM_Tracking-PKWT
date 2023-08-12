<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kontrak extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'divisis';
    protected $fillable = [
        'karyawan_nik',
        'lamaKontrak',
        'tglMulai',
        'tglSelesai',
    ];
}
