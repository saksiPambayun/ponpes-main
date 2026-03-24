<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('struktur_organisasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan');
            $table->enum('divisi', [
                'pengurus', 'pengawas', 'pelaksana', 'lainnya'
            ])->default('pelaksana');
            $table->integer('urutan')->default(0)->comment('Urutan tampil');
            $table->string('foto')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->text('deskripsi')->nullable();
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('struktur_organisasi');
    }
};