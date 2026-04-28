<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationWave extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'is_active',
        'quota',
        'registered_count',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function registrations()
    {
        return $this->hasMany(SantriRegistration::class, 'wave_id');
    }

    public function isOpen(): bool
    {
        $now = now();
        return $this->is_active && $now >= $this->start_date && $now <= $this->end_date;
    }

    public function isFull(): bool
    {
        if (!$this->quota) return false;
        return $this->registered_count >= $this->quota;
    }
}