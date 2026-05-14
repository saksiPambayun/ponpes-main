<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilYayasan extends Model
{
    use HasFactory;

    protected $table = 'profil_yayasan';

    protected $fillable = [
        'nama_yayasan',
        'singkatan',
        'deskripsi',
        'visi',
        'misi',
        'alamat',
        'kota',
        'provinsi',
        'kode_pos',
        'telepon',
        'email',
        'website',
        'instagram',
        'facebook',
        'youtube',
        'logo',
        'foto_gedung',
        'tahun_berdiri',
        'no_akta',
        'no_sk_kemenkumham',
        'npwp',
    ];

    /**
     * Ambil profil yayasan (selalu hanya 1 record).
     */
    public static function getProfil(): self
    {
        return self::firstOrCreate(
            ['id' => 1],
            ['nama_yayasan' => 'Nama Yayasan']
        );
    }
}