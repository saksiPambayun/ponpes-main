<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Santri extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'santri';

    protected $fillable = [
        'nama_lengkap',
        'nisn',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'email',
        'no_hp',
        'alamat',
        'asal_sekolah',
        'nama_wali',
        'no_wali',
        'pekerjaan_wali',
        'status',
        'alasan_penolakan',
        'tanggal_verifikasi',
        'verified_by',
        'foto',
        'kk',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_verifikasi' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // Accessor untuk umur
    public function getUmurAttribute()
    {
        return $this->tanggal_lahir->age;
    }

    // Accessor untuk status dengan badge
    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'pending' => '<span class="badge badge-pending">⏳ Pending</span>',
            'diterima' => '<span class="badge badge-success">✅ Diterima</span>',
            'ditolak' => '<span class="badge badge-danger">❌ Ditolak</span>',
            default => '<span class="badge badge-secondary">Unknown</span>'
        };
    }

    // Scope untuk filter
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeDiterima($query)
    {
        return $query->where('status', 'diterima');
    }

    public function scopeDitolak($query)
    {
        return $query->where('status', 'ditolak');
    }

    public function scopeSearch($query, $term)
    {
        return $query->where(function($q) use ($term) {
            $q->where('nama_lengkap', 'LIKE', "%{$term}%")
              ->orWhere('nisn', 'LIKE', "%{$term}%")
              ->orWhere('email', 'LIKE', "%{$term}%")
              ->orWhere('asal_sekolah', 'LIKE', "%{$term}%");
        });
    }
}