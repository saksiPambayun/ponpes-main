<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profil_yayasan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_yayasan');
            $table->string('singkatan')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('logo')->nullable();
            $table->string('foto_gedung')->nullable();
            $table->year('tahun_berdiri')->nullable();
            $table->string('no_akta')->nullable();
            $table->string('no_sk_kemenkumham')->nullable();
            $table->string('npwp')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_yayasan');
    }
};