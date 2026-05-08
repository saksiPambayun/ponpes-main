<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiayaPendaftaran extends Model
{
    use HasFactory;

    protected $table = 'biaya_pendaftaran';

    protected $fillable = [
        'nama_biaya',
        'nominal',
        'keterangan',
        'status',
        'urutan'
    ];

    protected $casts = [
        'nominal' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // Scope untuk biaya aktif
    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif');
    }

    // Accessor untuk format nominal Rupiah
    public function getNominalFormattedAttribute()
    {
        return 'Rp. ' . number_format($this->nominal, 0, ',', '.');
    }
}
