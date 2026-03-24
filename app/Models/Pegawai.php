<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use SoftDeletes;

    protected $table = 'pegawai';

    protected $fillable = [
        'nip',
        'nama',
        'email',
        'no_telepon',
        'jabatan',
        'divisi',
        'status',
        'tipe_pegawai',
        'tanggal_bergabung',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'foto_ktp',
        'foto_npwp',
        'foto_ijazah',
    ];

    protected $casts = [
        'tanggal_bergabung' => 'date',
        'tanggal_lahir'     => 'date',
        'created_at'        => 'datetime',
        'updated_at'        => 'datetime',
        'deleted_at'        => 'datetime',
    ];
}
