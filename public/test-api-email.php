<?php
// test-api-mail.php

$apiToken = 'fe75642c35a96c810d8a453d2d9c0084';

$data = [
    'from' => ['email' => 'admin@yayasan.com', 'name' => 'Yayasan Management'],
    'to' => [['email' => 'pinundi4@gmail.com', 'name' => 'User']],
    'subject' => 'Kode OTP Registrasi',
    'text' => 'Kode OTP Anda adalah: 123456',
    'category' => 'OTP'
];

// GANTI ENDPOINT URL INI
$url = 'https://sandbox.api.mailtrap.io/api/send/4610122';

$options = [
    'http' => [
        'header' => "Content-Type: application/json\r\nAuthorization: Bearer $apiToken\r\n",
        'method' => 'POST',
        'content' => json_encode($data),
    ]
];

$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);
$httpCode = $http_response_header[0];

echo "HTTP Code: $httpCode\n";
echo "Response: $response\n";