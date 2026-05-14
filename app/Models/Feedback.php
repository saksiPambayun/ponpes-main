<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'is_read',
        'is_replied',
        'reply_message',
        'replied_at',
        'replied_by',
        'whatsapp_reply',
        'whatsapp_replied_at',
        'whatsapp_reply_status'
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'is_replied' => 'boolean',
        'created_at' => 'datetime',
        'replied_at' => 'datetime',
        'whatsapp_replied_at' => 'datetime',
    ];

    public function replier()
    {
        return $this->belongsTo(User::class, 'replied_by');
    }

    public function markAsRead()
    {
        if (!$this->is_read) {
            $this->update(['is_read' => true]);
        }
    }

    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    public function hasPhoneNumber()
    {
        return !empty($this->phone);
    }

    public function getFormattedPhone()
    {
        $phone = preg_replace('/[^0-9]/', '', $this->phone);

        // Ubah 08xxx jadi 628xxx
        if (substr($phone, 0, 1) === '0') {
            $phone = '62' . substr($phone, 1);
        }

        // Ubah 8xxx jadi 628xxx
        if (substr($phone, 0, 1) === '8') {
            $phone = '62' . $phone;
        }

        return $phone;
    }
}
