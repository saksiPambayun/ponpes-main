<?php
// app/Models/Otp.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Otp extends Model
{
    protected $fillable = [
        'identifier', 'otp', 'type', 'purpose', 'expires_at', 'is_used'
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'is_used' => 'boolean',
    ];

    public function isValid()
    {
        // Pastikan menggunakan timezone yang benar
        $now = Carbon::now('Asia/Jakarta');
        $expiresAt = $this->expires_at instanceof Carbon ? $this->expires_at : Carbon::parse($this->expires_at);
        
        return !$this->is_used && $expiresAt->gt($now);
    }
}