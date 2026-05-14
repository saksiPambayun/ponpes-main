<?php
// Menjalankan perintah database tanpa artisan
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

$tableName = 'santri_registrations';

if (!Schema::hasTable($tableName)) {
    die("❌ Tabel '$tableName' tidak ditemukan!\n");
}

if (Schema::hasColumn($tableName, 'jenis_kelamin')) {
    die("✅ Kolom 'jenis_kelamin' sudah ada. Selesai.\n");
}

try {
    Schema::table($tableName, function (Blueprint $table) {
        $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable()->after('nama_lengkap');
    });
    echo "✅ BERHASIL! Kolom 'jenis_kelamin' telah ditambahkan.\n";
} catch (\Exception $e) {
    echo "❌ Gagal: " . $e->getMessage() . "\n";
}