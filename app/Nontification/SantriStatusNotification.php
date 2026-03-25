<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\SantriRegistration;

class SantriStatusNotification extends Notification
{
    use Queueable;

    protected $santri;

    public function __construct(SantriRegistration $santri)
    {
        $this->santri = $santri;
    }

    public function via($notifiable)
    {
        return ['database']; // simpan ke database
    }

    public function toDatabase($notifiable)
    {
        return [
            'santri_id' => $this->santri->id,
            'nama' => $this->santri->nama_lengkap,
            'status' => $this->santri->status,
            'pesan' => $this->message(),
        ];
    }

    private function message()
    {
        if ($this->santri->status == 'diterima') {
            return 'Selamat! Pendaftaran santri anda diterima.';
        }

        if ($this->santri->status == 'ditolak') {
            return 'Maaf, pendaftaran santri anda ditolak.';
        }

        return 'Pendaftaran santri anda sedang diproses.';
    }
}
