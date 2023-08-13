<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departemen extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'departemens';
    protected $fillable = [
        // 'karyawan_id',
        'divisi_id',
        'nama',
    ];

    public function karyawan(): HasMany
    {
        return $this->hasMany(Karyawan::class, 'departemen_id');
    }

    public function bagian(): BelongsTo
    {
        return $this->belongsTo(Bagian::class, 'bagian_id');
    }

    public function divisi(): HasMany
    {
        return $this->hasMany(Divisi::class, 'divisi_id');
    }
}
