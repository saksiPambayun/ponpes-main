<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('santri_registrations', function (Blueprint $table) {
            // Tambahkan kolom yang kurang
            $table->string('nama_wali')->nullable()->after('no_wali');
            $table->string('pekerjaan')->nullable()->after('nama_wali');
            $table->string('foto')->nullable()->after('pekerjaan');
            $table->string('kk')->nullable()->after('foto');
            $table->text('alasan_penolakan')->nullable()->after('status');
            $table->timestamp('tanggal_verifikasi')->nullable()->after('alasan_penolakan');
            $table->foreignId('verified_by')->nullable()->after('tanggal_verifikasi');
        });
    }

    public function down()
    {
        Schema::table('santri_registrations', function (Blueprint $table) {
            $table->dropColumn(['nama_wali', 'pekerjaan', 'foto', 'kk', 'alasan_penolakan', 'tanggal_verifikasi', 'verified_by']);
        });
    }
};
