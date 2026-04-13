<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('santri', function (Blueprint $table) {
            $table->id();
            
            
            // Data Pribadi
            $table->string('nama_lengkap');
            $table->string('nisn')->unique()->nullable();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            
            // Kontak
            $table->string('email')->unique();
            $table->string('no_hp')->nullable();
            $table->text('alamat');
            
            // Data Pendidikan
            $table->string('asal_sekolah');
            
            // Data Wali
            $table->string('nama_wali');
            $table->string('no_wali');
            $table->string('pekerjaan_wali')->nullable();
            
            // Status Pendaftaran
            $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->text('alasan_penolakan')->nullable();
            $table->timestamp('tanggal_verifikasi')->nullable();
            $table->integer('verified_by')->nullable(); // ID admin yang verifikasi
            
            // Tambahan
            $table->string('foto')->nullable();
            $table->text('kk')->nullable();
            $table->timestamps(); // created_at & updated_at
            $table->softDeletes(); // deleted_at untuk trash
        });
    }

    public function down()
    {
        Schema::dropIfExists('santri');
    }
};