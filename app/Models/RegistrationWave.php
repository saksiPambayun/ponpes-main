<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationWave extends Model
{
    use HasFactory;

    protected $table = 'registration_waves';

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'is_active',
        'description',
        'quota',
        'registered_count'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function registrations()
    {
        return $this->hasMany(SantriRegistration::class, 'wave_id');
    }

    public function isOpen()
    {
        $now = now();
        return $this->is_active &&
               $now->between($this->start_date, $this->end_date) &&
               (!$this->quota || $this->registered_count < $this->quota);
    }

    public function getRemainingQuotaAttribute()
    {
        if (!$this->quota) return null;
        return max(0, $this->quota - $this->registered_count);
    }
}
