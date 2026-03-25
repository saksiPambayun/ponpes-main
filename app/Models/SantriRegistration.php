<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SantriRegistration extends Model
{
    use HasFactory;

    protected $table = 'santri_registrations';

    protected $fillable = [
        'nama_lengkap',
        'nisn',
        'asal_sekolah',
        'tanggal_lahir',
        'alamat',
        'email',
        'no_wali',
        'nama_wali',
        'pekerjaan',
        'dok_kk',
        'dok_akta',
        'status',
        'alasan_penolakan',
        'tanggal_verifikasi',
        'verified_by',
    ];

    protected $casts = [
        'tanggal_lahir'      => 'date',
        'tanggal_verifikasi' => 'datetime',
    ];

    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'pending'  => '<span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">⏳ Pending</span>',
            'diterima' => '<span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs">✅ Diterima</span>',
            'ditolak'  => '<span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-xs">❌ Ditolak</span>',
            default    => '<span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-xs">-</span>',
        };
    }
     public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function verifikator()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }
}
