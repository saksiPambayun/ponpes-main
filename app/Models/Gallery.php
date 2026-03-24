<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galleries';

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'kategori',
        'tanggal_kegiatan',
        'is_active',
        'urut'
    ];

    protected $casts = [
        'tanggal_kegiatan' => 'date',
        'is_active' => 'boolean',
        'urut' => 'integer'
    ];

    // Accessor untuk kategori dengan badge
    public function getKategoriBadgeAttribute()
    {
        return match($this->kategori) {
            'kegiatan' => '<span class="badge badge-primary">Kegiatan</span>',
            'prestasi' => '<span class="badge badge-success">Prestasi</span>',
            'umum' => '<span class="badge badge-info">Umum</span>',
            default => '<span class="badge badge-secondary">' . $this->kategori . '</span>',
        };
    }

    // Accessor untuk status dengan badge
    public function getStatusBadgeAttribute()
    {
        return $this->is_active 
            ? '<span class="badge badge-success">Aktif</span>'
            : '<span class="badge badge-danger">Tidak Aktif</span>';
    }

    // Scope untuk filter kategori
    public function scopeKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    // Scope untuk filter status aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk pencarian
    public function scopeSearch($query, $term)
    {
        return $query->where('judul', 'LIKE', "%{$term}%")
                     ->orWhere('deskripsi', 'LIKE', "%{$term}%");
    }
}