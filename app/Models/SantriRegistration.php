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
        'jenis_kelamin',           // TAMBAHKAN INI
        'nisn',
        'asal_sekolah',
        'tempat_lahir',             // TAMBAHKAN INI
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
        'announcement_date',
        'angkatan',                // TAMBAHKAN INI
        'alasan_penolakan',        // TAMBAHKAN INI
        'tanggal_verifikasi',      // TAMBAHKAN INI
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_verifikasi' => 'datetime',
        'announcement_date' => 'datetime',
        'angkatan' => 'integer',
    ];

    // ==================== RELATIONSHIPS ====================

    /**
     * Relasi ke tabel registration_waves
     */
    public function wave()
    {
        return $this->belongsTo(RegistrationWave::class, 'wave_id');
    }

    /**
     * Relasi ke tabel users
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // ==================== SCOPES ====================

    /**
     * Scope untuk santri yang statusnya pending
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope untuk santri yang diterima
     */
    public function scopeDiterima($query)
    {
        return $query->where('status', 'diterima');
    }

    /**
     * Scope untuk santri yang ditolak
     */
    public function scopeDitolak($query)
    {
        return $query->where('status', 'ditolak');
    }

    /**
     * Scope filter berdasarkan angkatan
     */
    public function scopeByAngkatan($query, $tahun)
    {
        if ($tahun) {
            return $query->where('angkatan', $tahun);
        }
        return $query;
    }

    /**
     * Scope filter berdasarkan jenis kelamin
     */
    public function scopeByJenisKelamin($query, $jenis)
    {
        if ($jenis && in_array($jenis, ['Laki-laki', 'Perempuan'])) {
            return $query->where('jenis_kelamin', $jenis);
        }
        return $query;
    }

    // ==================== ACCESSORS & MUTATORS ====================

    /**
     * Get formatted angkatan
     */
    public function getAngkatanFormattedAttribute()
    {
        return $this->angkatan ?: date('Y', strtotime($this->created_at));
    }

    /**
     * Get status badge HTML
     */
    public function getStatusBadgeAttribute()
    {
        $badges = [
            'pending' => '<span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">Menunggu</span>',
            'diterima' => '<span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Diterima</span>',
            'ditolak' => '<span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">Ditolak</span>',
        ];

        return $badges[$this->status] ?? '<span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-800">' . $this->status . '</span>';
    }

    /**
     * Get jenis kelamin badge HTML
     */
    public function getJenisKelaminBadgeAttribute()
    {
        if ($this->jenis_kelamin == 'Laki-laki') {
            return '<span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-700"><i class="fas fa-mars mr-1"></i> Laki-laki</span>';
        }
        return '<span class="px-2 py-1 text-xs rounded-full bg-pink-100 text-pink-700"><i class="fas fa-venus mr-1"></i> Perempuan</span>';
    }

    /**
     * Get foto URL
     */
    public function getFotoUrlAttribute()
    {
        if ($this->foto && \Storage::disk('public')->exists($this->foto)) {
            return \Storage::url($this->foto);
        }
        return null;
    }

    /**
     * Get KK URL
     */
    public function getKkUrlAttribute()
    {
        if ($this->kk && \Storage::disk('public')->exists($this->kk)) {
            return \Storage::url($this->kk);
        }
        return null;
    }

    // ==================== HELPER METHODS ====================

    /**
     * Cek apakah pendaftaran sudah diverifikasi
     */
    public function isVerified()
    {
        return in_array($this->status, ['diterima', 'ditolak']);
    }

    /**
     * Cek apakah pendaftaran diterima
     */
    public function isAccepted()
    {
        return $this->status == 'diterima';
    }

    /**
     * Cek apakah pendaftaran ditolak
     */
    public function isRejected()
    {
        return $this->status == 'ditolak';
    }

    /**
     * Cek apakah masih pending
     */
    public function isPending()
    {
        return $this->status == 'pending';
    }
}
