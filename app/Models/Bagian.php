<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bagian extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bagians';
    protected $fillable = [
        // 'karyawan_id',
        'departemen_id',
        'nama',
    ];

    public function karyawan(): HasMany
    {
        return $this->hasMany(Karyawan::class, 'bagian_id');
    }

    public function bagian(): HasMany
    {
        return $this->hasMany(Departemen::class, 'departemen_id');
    }
}
