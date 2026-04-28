<?php
// app/Models/User.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role',
        'status',
        'avatar',
        'bio',
        'phone',
        'address',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // ==================== SCOPES ====================

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 'inactive');
    }

    public function scopeAdmins($query)
    {
        return $query->where('role', 'admin');
    }

    public function scopeSuperAdmins($query)
    {
        return $query->where('role', 'superadmin');
    }

    public function scopeUsers($query)
    {
        return $query->where('role', 'user');
    }

    public function scopeExceptSuperAdmin($query)
    {
        return $query->where('role', '!=', 'superadmin');
    }

    // ==================== ROLE CHECKS ====================

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isSuperAdmin(): bool
    {
        return $this->role === 'superadmin';
    }

    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    public function hasAnyRole(array $roles): bool
    {
        return in_array($this->role, $roles);
    }

    // ==================== ACCESSORS & MUTATORS ====================

    public function getAvatarUrlAttribute(): string
    {
        if ($this->avatar && Storage::disk('public')->exists($this->avatar)) {
            return asset('storage/' . $this->avatar);
        }
        return asset('images/default-avatar.png');
    }

    public function getRoleBadgeAttribute(): string
    {
        $badges = [
            'superadmin' => '<span class="badge bg-danger">Super Admin</span>',
            'admin' => '<span class="badge bg-warning text-dark">Admin</span>',
            'user' => '<span class="badge bg-secondary">User</span>',
        ];

        return $badges[$this->role] ?? '<span class="badge bg-secondary">Unknown</span>';
    }

    public function getStatusBadgeAttribute(): string
    {
        if ($this->status === 'active') {
            return '<span class="badge bg-success">Aktif</span>';
        }
        return '<span class="badge bg-danger">Tidak Aktif</span>';
    }

    public function getCreatedAtFormattedAttribute(): string
    {
        return $this->created_at->format('d M Y H:i');
    }

    public function getUpdatedAtFormattedAttribute(): string
    {
        return $this->updated_at->format('d M Y H:i');
    }

    // Mutator untuk mencegah perubahan role ke admin/superadmin dari user biasa
    public function setRoleAttribute($value)
    {
        // Jika user yang sedang login bukan superadmin, tolak perubahan ke role admin/superadmin
        if (in_array($value, ['admin', 'superadmin']) && auth()->check() && !auth()->user()->isSuperAdmin()) {
            throw new \Exception('Tidak diizinkan mengubah role ke admin/superadmin.');
        }
        $this->attributes['role'] = $value;
    }

    // ==================== RELATIONSHIPS ====================

    // Relasi dengan SantriRegistration (jika ada)
    public function santriRegistrations()
    {
        return $this->hasMany(SantriRegistration::class);
    }

    // Relasi dengan Feedback yang dibuat
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    // Relasi dengan Feedback yang dibalas
    public function replies()
    {
        return $this->hasMany(Feedback::class, 'replied_by');
    }

    // ==================== METHODS ====================

    /**
     * Cek apakah user bisa dihapus (superadmin tidak boleh)
     */
    public function isDeletable(): bool
    {
        return $this->role !== 'superadmin';
    }

    /**
     * Override delete method untuk mencegah penghapusan superadmin
     */
    public function delete()
    {
        if ($this->isSuperAdmin()) {
            throw new \Exception('Super Admin tidak boleh dihapus.');
        }
        return parent::delete();
    }

    /**
     * Soft delete dengan pengecekan
     */
    public function safeDelete(): bool
    {
        if ($this->isSuperAdmin()) {
            return false;
        }
        return $this->delete();
    }
}
