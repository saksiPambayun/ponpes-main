<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SantriRegistration extends Model
{
    use HasFactory;

    protected $table = 'santri_registrations';

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'nisn',
        'asal_sekolah',
        'tanggal_lahir',
        'alamat',
        'email',
        'no_wali',
        'nama_wali',
        'pekerjaan_wali',
        'kk',
        'foto',
        'status',
        'wave_id',
        'acceptance_status',
        'acceptance_note',
        'announcement_date'
    ];

    // ==================== RELATIONSHIPS ====================

    /**
     * Relasi ke tabel registration_waves
     */
    public function wave()
    {
        return $this->belongsTo(RegistrationWave::class, 'wave_id');
    }
}
