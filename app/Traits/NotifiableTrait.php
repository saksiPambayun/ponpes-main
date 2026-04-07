<?php

namespace App\Traits;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

trait NotifiableTrait
{
    /**
     * Kirim notifikasi ke user
     */
    public function sendNotification($userId, $title, $message, $type = 'info', $relatedId = null, $relatedType = null)
    {
        // Simpan ke database
        $notification = Notification::create([
            'user_id' => $userId,
            'title' => $title,
            'message' => $message,
            'type' => $type,
            'related_id' => $relatedId,
            'related_type' => $relatedType,
        ]);

        return $notification;
    }

    /**
     * Kirim notifikasi ke banyak user
     */
    public function sendBulkNotification($userIds, $title, $message, $type = 'info')
    {
        $notifications = [];
        foreach ($userIds as $userId) {
            $notifications[] = [
                'user_id' => $userId,
                'title' => $title,
                'message' => $message,
                'type' => $type,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Notification::insert($notifications);
        return true;
    }

    /**
     * Kirim notifikasi + email
     */
    public function sendNotificationWithEmail($userId, $title, $message, $type = 'info', $relatedId = null, $relatedType = null)
    {
        // Kirim notifikasi web
        $this->sendNotification($userId, $title, $message, $type, $relatedId, $relatedType);

        // Kirim email
        $user = User::find($userId);
        if ($user && $user->email) {
            try {
                Mail::send([], [], function ($mail) use ($user, $title, $message) {
                    $mail->to($user->email)
                         ->subject($title)
                         ->html($message);
                });
            } catch (\Exception $e) {
                // Log error email
                \Log::error('Email gagal dikirim: ' . $e->getMessage());
            }
        }

        return true;
    }

    /**
     * Notifikasi untuk perubahan status santri
     */
    public function notifySantriStatus($santri, $oldStatus, $newStatus)
    {
        $userId = $santri->user_id;

        $statusText = [
            'pending' => 'Menunggu',
            'diterima' => 'Diterima',
            'ditolak' => 'Ditolak'
        ];

        $title = "Status Pendaftaran Santri";

        if ($newStatus == 'diterima') {
            $message = "Halo, pendaftaran santri atas nama **{$santri->nama_lengkap}** telah **DITERIMA**. Silakan lanjutkan ke tahap selanjutnya.";
            $type = 'success';
        } elseif ($newStatus == 'ditolak') {
            $message = "Halo, pendaftaran santri atas nama **{$santri->nama_lengkap}** telah **DITOLAK**. Silakan hubungi admin untuk informasi lebih lanjut.";
            $type = 'danger';
        } else {
            $message = "Halo, pendaftaran santri atas nama **{$santri->nama_lengkap}** statusnya berubah menjadi **{$statusText[$newStatus]}**.";
            $type = 'info';
        }

        // Kirim notifikasi web
        $this->sendNotification($userId, $title, $message, $type, $santri->id, 'santri');

        // Kirim email juga
        $this->sendNotificationEmail($userId, $title, $message);
    }

    /**
     * Kirim email notifikasi
     */
    public function sendNotificationEmail($userId, $title, $message)
    {
        $user = User::find($userId);
        if ($user && $user->email) {
            try {
                Mail::send([], [], function ($mail) use ($user, $title, $message) {
                    $mail->to($user->email)
                         ->subject($title)
                         ->html("
                            <html>
                            <head><title>{$title}</title></head>
                            <body>
                                <h2>{$title}</h2>
                                <p>" . nl2br($message) . "</p>
                                <br>
                                <p>Terima kasih,<br>Tim Yayasan</p>
                            </body>
                            </html>
                         ");
                });
            } catch (\Exception $e) {
                \Log::error('Email notification gagal: ' . $e->getMessage());
            }
        }
    }
}
