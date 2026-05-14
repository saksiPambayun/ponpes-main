<?php

namespace App\Services;

use Mailtrap\MailtrapClient;
use Mailtrap\Mailable\Email;

class MailtrapService
{
    protected $client;
    
    public function __construct()
    {
        $this->client = new MailtrapClient(env('MAILTRAP_API_TOKEN'));
    }
    
    public function send($to, $subject, $body)
    {
        try {
            $email = (new Email())
                ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                ->to($to)
                ->subject($subject)
                ->text($body);
            
            $this->client->send($email);
            return true;
        } catch (\Exception $e) {
            \Log::error('Mailtrap API Error: ' . $e->getMessage());
            return false;
        }
    }
}