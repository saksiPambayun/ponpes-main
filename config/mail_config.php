<?php
// config/mail_config.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../vendor/autoload.php'; // Jika pakai composer
// atau require sekali set path ke PHPMailer

function getMailer() {
    $mail = new PHPMailer(true);
    
    // Konfigurasi SMTP (sesuaikan dengan email Anda)
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';                    // Server SMTP
    $mail->SMTPAuth   = true;                                
    $mail->Username   = 'emailanda@gmail.com';               // Email Anda
    $mail->Password   = 'passwordaplikasi';                   // Password atau App Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      // TLS/SSL
    $mail->Port       = 587;                                 // Port Gmail: 587 (TLS), 465 (SSL)
    
    // Pengirim
    $mail->setFrom('emailanda@gmail.com', 'Nama Aplikasi');
    
    return $mail;
}

// Untuk Gmail, Anda perlu:
// 1. Aktifkan 2FA
// 2. Buat App Password: https://myaccount.google.com/apppasswords
?>