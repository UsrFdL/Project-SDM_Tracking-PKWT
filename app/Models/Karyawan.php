<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Karyawan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'karyawans';
    protected $fillable = [
        'nama',
        'nik',
        'nip',
        'divisi_id',
        'departemen_id',
        'bagian_id',
    ];

    public function divisi(): BelongsTo
    {
        return $this->belongsTo(Divisi::class, 'divisi_id');
    }

    public function departemen(): BelongsTo
    {
        return $this->belongsTo(departemen::class, 'departemen_id');
    }

    public function bagian(): BelongsTo
    {
        return $this->belongsTo(Bagian::class, 'bagian_id');
    }

    public function kontrak(): HasOne
    {
        return $this->hasOne(Kontrak::class);
    }
}
