<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasi extends Model
{
    use HasFactory;

    protected $table = 'struktur_organisasi';

    protected $fillable = [
        'nama',
        'jabatan',
        'divisi',
        'urutan',
        'foto',
        'telepon',
        'email',
        'deskripsi',
    ];

    protected $casts = [
        'urutan' => 'integer',
    ];

    // Label divisi
    public static function divisiOptions(): array
    {
        return [
            'pengurus'  => 'Pengurus',
            'pengawas'  => 'Pengawas',
            'pelaksana' => 'Pelaksana',
            'lainnya'   => 'Lainnya',
        ];
    }
    
    // Scope urut
    public function scopeTerurut($query)
    {
        return $query->orderBy('divisi')->orderBy('urutan')->orderBy('nama');
    }
}