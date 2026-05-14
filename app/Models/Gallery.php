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
    $badges = [
        'kegiatan' => '<span class="badge-kategori badge-kegiatan" style="color: #005F02; background: white; border: 1px solid #005F02;">Kegiatan</span>',
        'prestasi' => '<span class="badge-kategori badge-prestasi" style="color: #0f4d1c; background: white; border: 1px solid #0f4d1c;">Prestasi</span>',
        'umum' => '<span class="badge-kategori badge-umum" style="color: #1e7e34; background: white; border: 1px solid #1e7e34;">Umum</span>',
    ];

    return $badges[$this->kategori] ?? '<span class="badge-kategori badge-default">' . ucfirst($this->kategori) . '</span>';
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
