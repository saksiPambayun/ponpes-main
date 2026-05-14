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
        'nominal' => 'decimal:2',  // Sesuai dengan migration decimal(15,2)
        'urutan' => 'integer',
        'status' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // Scope untuk biaya aktif
    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif');
    }

    // Scope untuk biaya nonaktif
    public function scopeNonaktif($query)
    {
        return $query->where('status', 'nonaktif');
    }

    // Accessor untuk format nominal Rupiah
    public function getNominalFormattedAttribute()
    {
        return 'Rp ' . number_format($this->nominal, 0, ',', '.');
    }

    // Accessor untuk status badge HTML
    public function getStatusBadgeAttribute()
    {
        if ($this->status == 'aktif') {
            return '<span class="badge bg-success px-3 py-2">✓ Aktif</span>';
        }
        return '<span class="badge bg-secondary px-3 py-2">✗ Nonaktif</span>';
    }

    // Mutator untuk memastikan nominal disimpan dengan benar
    public function setNominalAttribute($value)
    {
        // Hapus titik dan koma, konversi ke float
        $cleanValue = preg_replace('/[^0-9]/', '', $value);
        $this->attributes['nominal'] = (float) $cleanValue;
    }

    // Boot method untuk set default urutan
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->urutan)) {
                $maxUrutan = static::max('urutan');
                $model->urutan = $maxUrutan + 1;
            }
        });
    }

    // Helper untuk cek apakah biaya aktif
    public function isAktif()
    {
        return $this->status === 'aktif';
    }

    // Helper untuk cek apakah biaya nonaktif
    public function isNonaktif()
    {
        return $this->status === 'nonaktif';
    }
}
