<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pegawai';

    protected $fillable = [
    'user_id',
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
    'foto_ijazah'
];

public function user()
{
    return $this->belongsTo(User::class);
}

    protected $casts = [
        'tanggal_bergabung' => 'date',
        'tanggal_lahir'     => 'date',
        'created_at'        => 'datetime',
        'updated_at'        => 'datetime',
        'deleted_at'        => 'datetime',
    ];
}
