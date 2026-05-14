<?php

namespace App\Services;

use Mailtrap\MailtrapClient;
use Mailtrap\Mailable\Email;

class EmailService
{
    protected $client;
    
    public function __construct()
    {
        $this->client = new MailtrapClient('2129846eb2105840569ee7bf97fda6e8');
    }
    
    public function sendOtp($to, $otp, $purpose)
    {
        $email = (new Email())
            ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
            ->to($to)
            ->subject("Kode OTP {$purpose} - Yayasan")
            ->text("Kode OTP Anda untuk {$purpose} adalah: {$otp}\n\nKode ini berlaku 5 menit.");
        
        try {
            $this->client->send($email);
            return true;
        } catch (\Exception $e) {
            \Log::error('Email API failed: ' . $e->getMessage());
            return false;
        }
    }
}