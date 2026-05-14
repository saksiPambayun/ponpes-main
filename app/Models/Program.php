<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $table = 'programs';

    protected $fillable = [
        'nama_program',
        'deskripsi',
        'kategori',
        'status',
        'tanggal_mulai',
        'tanggal_selesai',
        'gambar',
    ];

    protected $casts = [
        'tanggal_mulai'   => 'date',
        'tanggal_selesai' => 'date',
    ];

    // Scope filter by kategori
    public function scopeKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    // Scope filter by status
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}