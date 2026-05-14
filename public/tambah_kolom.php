<?php
// File: tambah_kolom.php
// Upload ke folder public/, lalu akses https://al-ifadah.esolusindo.com/tambah_kolom.php

$host = 'localhost';
$db = 'esolusi2_alifadah';
$user = 'esolusi2_alifadah';
$pass = 'ponpesalifadah';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<h2>🔧 Menambah kolom yang hilang...</h2>";
    
    // CEK & TAMBAH kolom jenis_kelamin
    $cek = $pdo->query("SHOW COLUMNS FROM santri_registrations LIKE 'jenis_kelamin'");
    if ($cek->rowCount() == 0) {
        $pdo->exec("ALTER TABLE santri_registrations ADD COLUMN jenis_kelamin ENUM('Laki-laki','Perempuan') NULL AFTER nama_lengkap");
        echo "<p style='color:green'>✅ Kolom <strong>jenis_kelamin</strong> berhasil ditambahkan!</p>";
    } else {
        echo "<p style='color:blue'>ℹ️ Kolom <strong>jenis_kelamin</strong> sudah ada.</p>";
    }
    
    // CEK & TAMBAH kolom angkatan
    $cek = $pdo->query("SHOW COLUMNS FROM santri_registrations LIKE 'angkatan'");
    if ($cek->rowCount() == 0) {
        $pdo->exec("ALTER TABLE santri_registrations ADD COLUMN angkatan YEAR NULL AFTER status");
        echo "<p style='color:green'>✅ Kolom <strong>angkatan</strong> berhasil ditambahkan!</p>";
    } else {
        echo "<p style='color:blue'>ℹ️ Kolom <strong>angkatan</strong> sudah ada.</p>";
    }
    
    echo "<hr>";
    echo "<h3>✅ SELESAI! Sekarang coba tambah data santri lagi.</h3>";
    echo "<a href='/admin/santri/create' target='_blank'>Klik di sini untuk coba tambah santri</a>";
    
} catch (Exception $e) {
    echo "<p style='color:red'>❌ Error: " . $e->getMessage() . "</p>";
}
?>