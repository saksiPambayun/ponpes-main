<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Ganti 'table' menjadi 'create' karena kita membuat tabel dari nol
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('no_telepon')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('divisi')->nullable();
            $table->string('status')->default('aktif');
            $table->string('tipe_pegawai')->nullable();
            $table->date('tanggal_bergabung')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('agama')->nullable();
            $table->text('alamat')->nullable();

            // Kolom untuk Upload File/Foto
            $table->string('foto_ktp')->nullable();
            $table->string('foto_npwp')->nullable();
            $table->string('foto_ijazah')->nullable();

            $table->timestamps();
            $table->softDeletes(); // Ini kolom deleted_at yang hilang tadi
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
