<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SantriRegistration extends Model
{
    use HasFactory, SoftDeletes;

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
        'pekerjaan_wali',
        'foto',
        'kk',
        'status',
        'alasan_penolakan',
        'tanggal_verifikasi',
        'verified_by'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_verifikasi' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
