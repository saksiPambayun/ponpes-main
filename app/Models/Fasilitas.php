<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = 'fasilitas';

    protected $fillable = [
        'nama_fasilitas',
        'kategori',
        'jumlah',
        'deskripsi',
        'kondisi',
        'lokasi',
        'tanggal_pengadaan',
        'foto',
        'keterangan'
    ];

    protected $casts = [
        'tanggal_pengadaan' => 'date',
        'jumlah' => 'integer'
    ];

    // Accessor untuk kondisi dengan badge
    public function getKondisiBadgeAttribute()
    {
        return match($this->kondisi) {
            'Baik' => '<span class="badge badge-success">Baik</span>',
            'Rusak Ringan' => '<span class="badge badge-warning">Rusak Ringan</span>',
            'Rusak Berat' => '<span class="badge badge-danger">Rusak Berat</span>',
            default => '<span class="badge badge-secondary">' . $this->kondisi . '</span>',
        };
    }

    // Scope untuk filter kondisi
    public function scopeKondisi($query, $kondisi)
    {
        return $query->where('kondisi', $kondisi);
    }

    // Scope untuk pencarian
    public function scopeSearch($query, $term)
    {
        return $query->where('nama_fasilitas', 'LIKE', "%{$term}%")
                     ->orWhere('kategori', 'LIKE', "%{$term}%")
                     ->orWhere('lokasi', 'LIKE', "%{$term}%");
    }
}