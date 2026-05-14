<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class SantriStatusNotification extends Notification
{
    use Queueable;

    protected $santri;

    public function __construct($santri)
    {
        $this->santri = $santri;
    }

    public function via($notifiable)
    {
        return ['mail','database'];
    }

    public function toMail($notifiable)
    {
        if($this->santri->status == 'diterima'){
            return (new MailMessage)
                ->subject('Pendaftaran Santri Diterima')
                ->greeting('Assalamu\'alaikum')
                ->line('Selamat! Pendaftaran santri Anda telah diterima.')
                ->line('Nama: '.$this->santri->nama_lengkap)
                ->line('Silakan login ke dashboard untuk melihat detail.')
                ->action('Lihat Dashboard', url('/user/dashboard'))
                ->line('Terima kasih.');
        }

        return (new MailMessage)
            ->subject('Pendaftaran Santri Ditolak')
            ->greeting('Assalamu\'alaikum')
            ->line('Mohon maaf, pendaftaran santri Anda ditolak.')
            ->line('Nama: '.$this->santri->nama_lengkap)
            ->line('Alasan: '.$this->santri->alasan_penolakan)
            ->action('Lihat Dashboard', url('/user/dashboard'))
            ->line('Silakan perbaiki data jika diperlukan.');
    }

    public function toArray($notifiable)
    {
        return [
            'nama' => $this->santri->nama_lengkap,
            'status' => $this->santri->status,
            'alasan' => $this->santri->alasan_penolakan,
        ];
    }
}
