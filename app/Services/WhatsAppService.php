<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    protected $apiUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->apiUrl = env('WHATSAPP_API_URL', 'https://api.fonnte.com/send');
        $this->apiKey = env('WHATSAPP_API_KEY');
    }

    /**
     * Kirim pesan WhatsApp ke nomor tujuan
     */
    public function sendMessage($phoneNumber, $message)
    {
        try {
            // Format nomor telepon
            $phoneNumber = $this->formatPhoneNumber($phoneNumber);

            // Log untuk debugging
            Log::info('Mengirim WhatsApp', [
                'to' => $phoneNumber,
                'api_url' => $this->apiUrl
            ]);

            $response = Http::withHeaders([
                'Authorization' => $this->apiKey,
            ])->asForm()->post($this->apiUrl, [
                'target' => $phoneNumber,
                'message' => $message,
            ]);

            $result = $response->json();

            if ($response->successful() && isset($result['status']) && $result['status'] === true) {
                Log::info('WhatsApp berhasil terkirim', [
                    'to' => $phoneNumber,
                    'response' => $result
                ]);
                return ['success' => true, 'response' => $result];
            }

            Log::error('WhatsApp gagal terkirim', [
                'to' => $phoneNumber,
                'response' => $result
            ]);

            return [
                'success' => false,
                'error' => $result['reason'] ?? 'Gagal mengirim pesan'
            ];

        } catch (\Exception $e) {
            Log::error('WhatsApp exception: ' . $e->getMessage());
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Format nomor telepon untuk WhatsApp
     * 0821xxxxxx -> 62821xxxxxx
     */
    private function formatPhoneNumber($phone)
    {
        // Hanya angka
        $phone = preg_replace('/[^0-9]/', '', $phone);

        // Jika kosong
        if (empty($phone)) {
            return '';
        }

        // Jika diawali 0, ganti jadi 62
        if (substr($phone, 0, 1) === '0') {
            $phone = '62' . substr($phone, 1);
        }

        // Jika diawali 8, tambahkan 62
        if (substr($phone, 0, 1) === '8') {
            $phone = '62' . $phone;
        }

        return $phone;
    }

    /**
     * Template pesan balasan dengan logo Pondok
     * METHOD INI YANG DIPANGGIL DARI ADMINCONTROLLER
     */
    public function sendReplyTemplate($receiverName, $replyMessage, $originalMessage)
    {
        $template = "🏫 *PONDOK PESANTREN AL-IFADAH*\n";
        $template .= "───────────────────\n\n";
        $template .= "Assalamu'alaikum *{$receiverName}*,\n\n";
        $template .= "Terima kasih atas masukannya:\n";
        $template .= "💬 \"{$originalMessage}\"\n\n";
        $template .= "Balasan dari kami:\n";
        $template .= "✅ {$replyMessage}\n\n";
        $template .= "Silakan hubungi kami jika ada pertanyaan lebih lanjut.\n\n";
        $template .= "*Jazakallah Khairan*\n";
        $template .= "Admin Pondok Pesantren Al-Ifadah";

        return $template;
    }

    /**
     * Cek status koneksi WhatsApp
     */
    public function checkConnection()
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => $this->apiKey,
            ])->get('https://api.fonnte.com/api/device');

            return $response->json();
        } catch (\Exception $e) {
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }
}
