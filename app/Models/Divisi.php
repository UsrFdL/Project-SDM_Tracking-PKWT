<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Divisi extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'divisis';
    protected $fillable = [
        // 'karyawan_id',
        'nama',
    ];

    public function karyawan(): HasMany
    {
        return $this->hasMany(Karyawan::class, 'divisi_id');
    }

    public function departemen(): HasMany
    {
        return $this->hasMany(departemen::class, 'divisi_id');
    }
}
