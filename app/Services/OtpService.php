<?php

namespace App\Services;

use App\Models\Otp;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OtpService
{
    public function generateOtp($length = 6)
    {
        return str_pad(random_int(0, 999999), $length, '0', STR_PAD_LEFT);
    }

    public function sendViaBrevo($email, $otp, $purpose)
    {
        try {
            $apiKey = env('BREVO_API_KEY');

            $response = Http::withHeaders([
                'api-key' => $apiKey,
                'Content-Type' => 'application/json',
            ])->post('https://api.brevo.com/v3/smtp/email', [
                'sender' => [
                    'name' => env('MAIL_FROM_NAME', 'Pondok Pesantren Al Ifadah'),
                    'email' => env('MAIL_FROM_ADDRESS', 'alifadahpondokpesantren@gmail.com')
                ],
                'to' => [
                    ['email' => $email]
                ],
                'subject' => $this->getOtpSubject($purpose),
                'htmlContent' => $this->getOtpEmailTemplate($otp, $purpose),
            ]);

            if ($response->successful()) {
                // Simpan OTP ke database
                $this->saveOtp($email, $otp, 'email', $purpose);
                Log::info("OTP sent to {$email} via Brevo API");
                return true;
            }

            Log::error("Brevo API Error: " . $response->body());
            return false;

        } catch (\Exception $e) {
            Log::error("Brevo Exception: " . $e->getMessage());
            return false;
        }
    }

    public function sendViaWhatsApp($phoneNumber, $otp, $purpose)
    {
        try {
            $apiKey = env('WHATSAPP_API_KEY');
            $apiUrl = env('WHATSAPP_API_URL', 'https://api.fonnte.com/send');

            $message = "*Pondok Pesantren Al Ifadah*\n\n";
            $message .= "Kode OTP Anda: *{$otp}*\n";
            $message .= "Berlaku selama 10 menit.\n\n";
            $message .= "Jangan berikan kode ini kepada siapapun.";

            $response = Http::withHeaders([
                'Authorization' => $apiKey,
            ])->post($apiUrl, [
                'target' => $phoneNumber,
                'message' => $message,
            ]);

            if ($response->successful()) {
                $this->saveOtp($phoneNumber, $otp, 'whatsapp', $purpose);
                Log::info("OTP sent to {$phoneNumber} via WhatsApp");
                return true;
            }

            Log::error("WhatsApp API Error: " . $response->body());
            return false;

        } catch (\Exception $e) {
            Log::error("WhatsApp Exception: " . $e->getMessage());
            return false;
        }
    }

    private function saveOtp($identifier, $otp, $type, $purpose)
    {
        // Hapus OTP lama yang belum digunakan untuk identifier dan purpose yang sama
        Otp::where('identifier', $identifier)
            ->where('purpose', $purpose)
            ->where('is_used', false)
            ->delete();

        // Simpan OTP baru
        Otp::create([
            'identifier' => $identifier,
            'otp' => $otp,
            'type' => $type,
            'purpose' => $purpose,
            'expires_at' => Carbon::now('Asia/Jakarta')->addMinutes(10),
            'is_used' => false,
        ]);
    }

   public function verifyOtp($identifier, $otp, $purpose)
{
    // Tambahkan logging detail
    \Log::info('Verifying OTP', [
        'identifier' => $identifier,
        'otp' => $otp,
        'purpose' => $purpose,
        'current_time_utc' => Carbon::now('UTC')->toDateTimeString(),
        'current_time_jkt' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
    ]);

    $otpRecord = Otp::where('identifier', $identifier)
        ->where('otp', $otp)
        ->where('purpose', $purpose)
        ->where('is_used', false)
        ->where('expires_at', '>', Carbon::now('Asia/Jakarta')) // Pastikan ini pakai Asia/Jakarta
        ->first();

    if ($otpRecord) {
        \Log::info('OTP Record found:', [
            'expires_at' => $otpRecord->expires_at,
            'now' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
            'is_expired' => Carbon::now('Asia/Jakarta')->gt($otpRecord->expires_at)
        ]);

        $otpRecord->update(['is_used' => true]);
        return true;
    }

    \Log::warning('OTP verification failed - no valid record found');
    return false;
}
    public function checkOtpStatus($identifier, $otp, $purpose)
    {
        $otpRecord = Otp::where('identifier', $identifier)
            ->where('otp', $otp)
            ->where('purpose', $purpose)
            ->where('is_used', false)
            ->first();

        if (!$otpRecord) {
            return ['valid' => false, 'message' => 'OTP tidak ditemukan'];
        }

        $now = Carbon::now('Asia/Jakarta');
        $expiresAt = $otpRecord->expires_at instanceof Carbon ? $otpRecord->expires_at : Carbon::parse($otpRecord->expires_at);
        $isExpired = $now->gt($expiresAt);

        if ($isExpired) {
            return ['valid' => false, 'message' => 'OTP sudah kadaluarsa'];
        }

        return ['valid' => true, 'message' => 'OTP valid'];
    }

    private function getOtpSubject($purpose)
    {
        return match ($purpose) {
            'register' => 'Verifikasi Registrasi - Pondok Pesantren Al Ifadah',
            'verify' => 'Verifikasi Akun - Pondok Pesantren Al Ifadah',
            'login' => 'Kode Login - Pondok Pesantren Al Ifadah',
            default => 'Kode OTP - Pondok Pesantren Al Ifadah',
        };
    }

    private function getOtpEmailTemplate($otp, $purpose)
    {
        $title = match ($purpose) {
            'register' => 'Verifikasi Registrasi',
            'verify' => 'Verifikasi Akun',
            'login' => 'Kode Login',
            default => 'Kode OTP',
        };

        return "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <title>{$title}</title>
        </head>
        <body style='font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px;'>
            <div style='max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.1);'>
                <div style='background-color: #2c3e50; padding: 20px; text-align: center;'>
                    <h1 style='color: #ffffff; margin: 0;'>Pondok Pesantren Al Ifadah</h1>
                </div>
                <div style='padding: 30px;'>
                    <h2 style='color: #2c3e50; margin-top: 0;'>{$title}</h2>
                    <p>Kode OTP Anda adalah:</p>
                    <div style='background-color: #f4f4f4; padding: 20px; text-align: center; border-radius: 5px; margin: 20px 0;'>
                        <span style='font-size: 36px; font-weight: bold; letter-spacing: 5px; color: #2c3e50;'>{$otp}</span>
                    </div>
                    <p style='color: #666;'>Kode ini berlaku selama <strong>10 menit</strong>.</p>
                    <p style='color: #666;'>Jika Anda tidak merasa melakukan permintaan ini, abaikan email ini.</p>
                </div>
                <div style='background-color: #f4f4f4; padding: 15px; text-align: center; font-size: 12px; color: #999;'>
                    <p>&copy; " . date('Y') . " Pondok Pesantren Al Ifadah. All rights reserved.</p>
                </div>
            </div>
        </body>
        </html>
        ";
    }
}
