<?php
// includes/mail_helper.php
require_once __DIR__ . '/../config/mail_config.php';

/**
 * Kirim email ke admin ketika user baru mendaftar
 */
function sendNewUserNotificationToAdmin($user_data) {
    $mail = getMailer();
    
    try {
        // Ambil semua email admin dari database
        global $conn;
        $query = "SELECT email, username FROM users WHERE role = 'admin'";
        $result = $conn->query($query);
        
        while($admin = $result->fetch_assoc()) {
            // Kirim email ke masing-masing admin
            $mail->clearAddresses();
            $mail->addAddress($admin['email'], $admin['username']);
            
            // Konten email
            $mail->isHTML(true);
            $mail->Subject = '👤 User Baru Mendaftar - ' . date('d/m/Y H:i');
            
            // Template email HTML
            $mail->Body = "
            <!DOCTYPE html>
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; }
                    .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                    .header { background: #4CAF50; color: white; padding: 20px; text-align: center; }
                    .content { background: #f9f9f9; padding: 20px; }
                    .footer { background: #333; color: white; padding: 10px; text-align: center; font-size: 12px; }
                    table { width: 100%; border-collapse: collapse; }
                    td { padding: 10px; border-bottom: 1px solid #ddd; }
                    .label { font-weight: bold; width: 30%; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <h2>📢 User Baru Mendaftar</h2>
                    </div>
                    <div class='content'>
                        <p>Halo <b>{$admin['username']}</b>,</p>
                        <p>Ada user baru yang mendaftar di aplikasi:</p>
                        
                        <table>
                            <tr>
                                <td class='label'>Username</td>
                                <td>: <b>{$user_data['username']}</b></td>
                            </tr>
                            <tr>
                                <td class='label'>Email</td>
                                <td>: {$user_data['email']}</td>
                            </tr>
                            <tr>
                                <td class='label'>Tanggal Daftar</td>
                                <td>: " . date('d-m-Y H:i:s') . "</td>
                            </tr>
                            <tr>
                                <td class='label'>Total User</td>
                                <td>: " . getTotalUsers() . " user</td>
                            </tr>
                        </table>
                        
                        <p style='margin-top: 20px;'>
                            <a href='http://localhost/project-anda/admin/users.php' 
                               style='background: #4CAF50; color: white; padding: 10px 20px; 
                                      text-decoration: none; border-radius: 5px;'>
                                🔍 Lihat Detail User
                            </a>
                        </p>
                    </div>
                    <div class='footer'>
                        <p>Email ini dikirim otomatis oleh sistem. Harap tidak membalas email ini.</p>
                    </div>
                </div>
            </body>
            </html>
            ";
            
            // Plain text version
            $mail->AltBody = "Halo {$admin['username']},\n\n" .
                             "User baru telah mendaftar:\n" .
                             "Username: {$user_data['username']}\n" .
                             "Email: {$user_data['email']}\n" .
                             "Tanggal: " . date('d-m-Y H:i:s') . "\n\n" .
                             "Total User: " . getTotalUsers() . " user\n\n" .
                             "Lihat di: http://localhost/project-anda/admin/users.php";
            
            $mail->send();
        }
        
        return true;
    } catch (Exception $e) {
        error_log("Gagal kirim email: " . $mail->ErrorInfo);
        return false;
    }
}

/**
 * Kirim email selamat datang ke user baru
 */
function sendWelcomeEmailToUser($user_data) {
    $mail = getMailer();
    
    try {
        $mail->addAddress($user_data['email'], $user_data['username']);
        
        $mail->isHTML(true);
        $mail->Subject = '🎉 Selamat Datang di Aplikasi Kami!';
        
        $mail->Body = "
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: #2196F3; color: white; padding: 20px; text-align: center; }
                .content { background: #f9f9f9; padding: 20px; }
                .footer { background: #333; color: white; padding: 10px; text-align: center; font-size: 12px; }
                .button { background: #2196F3; color: white; padding: 12px 30px; 
                          text-decoration: none; border-radius: 5px; display: inline-block; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>🎉 Selamat Datang, {$user_data['username']}!</h2>
                </div>
                <div class='content'>
                    <p>Halo <b>{$user_data['username']}</b>,</p>
                    <p>Terima kasih telah mendaftar di aplikasi kami. Akun Anda telah berhasil dibuat.</p>
                    
                    <h3>📋 Detail Akun Anda:</h3>
                    <table>
                        <tr>
                            <td>Username</td>
                            <td>: <b>{$user_data['username']}</b></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>: {$user_data['email']}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Daftar</td>
                            <td>: " . date('d-m-Y H:i:s') . "</td>
                        </tr>
                    </table>
                    
                    <div style='text-align: center; margin: 30px 0;'>
                        <a href='http://localhost/project-anda/login.php' class='button'>
                            🔐 Login Sekarang
                        </a>
                    </div>
                    
                    <h3>✨ Yang Bisa Anda Lakukan:</h3>
                    <ul>
                        <li>Lengkapi profil Anda</li>
                        <li>Jelajahi fitur-fitur kami</li>
                        <li>Hubungi admin jika ada pertanyaan</li>
                    </ul>
                </div>
                <div class='footer'>
                    <p>Email ini dikirim otomatis. Harap tidak membalas email ini.</p>
                    <p>&copy; 2024 Aplikasi Kami. All rights reserved.</p>
                </div>
            </div>
        </body>
        </html>
        ";
        
        $mail->AltBody = "Selamat Datang {$user_data['username']}!\n\n" .
                         "Terima kasih telah mendaftar.\n\n" .
                         "Detail Akun:\n" .
                         "Username: {$user_data['username']}\n" .
                         "Email: {$user_data['email']}\n" .
                         "Tanggal Daftar: " . date('d-m-Y H:i:s') . "\n\n" .
                         "Login di: http://localhost/project-anda/login.php";
        
        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Gagal kirim email welcome: " . $mail->ErrorInfo);
        return false;
    }
}

/**
 * Kirim email notifikasi ke user ketika didaftarkan oleh admin
 */
function sendUserAddedByAdminEmail($user_data, $admin_data) {
    $mail = getMailer();
    
    try {
        $mail->addAddress($user_data['email'], $user_data['username']);
        
        $mail->isHTML(true);
        $mail->Subject = '🎉 Akun Anda Telah Dibuat oleh Admin';
        
        $mail->Body = "
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: #FF9800; color: white; padding: 20px; text-align: center; }
                .content { background: #f9f9f9; padding: 20px; }
                .warning { background: #fff3cd; color: #856404; padding: 15px; border-radius: 5px; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>🎉 Akun Anda Telah Dibuat!</h2>
                </div>
                <div class='content'>
                    <p>Halo <b>{$user_data['username']}</b>,</p>
                    <p>Admin <b>{$admin_data['username']}</b> telah membuatkan akun untuk Anda.</p>
                    
                    <h3>📋 Detail Akun:</h3>
                    <table>
                        <tr>
                            <td>Username</td>
                            <td>: <b>{$user_data['username']}</b></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>: {$user_data['email']}</td>
                        </tr>
                        <tr>
                            <td>Dibuat oleh</td>
                            <td>: {$admin_data['username']} (Admin)</td>
                        </tr>
                    </table>
                    
                    <div class='warning'>
                        <p><strong>⚠️ Informasi Penting:</strong></p>
                        <p>Untuk keamanan, silakan login dan segera ganti password Anda.</p>
                    </div>
                    
                    <div style='text-align: center; margin: 30px 0;'>
                        <a href='http://localhost/project-anda/login.php' 
                           style='background: #FF9800; color: white; padding: 12px 30px; 
                                  text-decoration: none; border-radius: 5px; display: inline-block;'>
                            🔐 Login Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </body>
        </html>
        ";
        
        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Gagal kirim email: " . $mail->ErrorInfo);
        return false;
    }
}

/**
 * Helper function untuk total user
 */
function getTotalUsers() {
    global $conn;
    $result = mysqli_query($conn, "SELECT COUNT(*) as total FROM users WHERE role='user'");
    $data = mysqli_fetch_assoc($result);
    return $data['total'];
}
?>