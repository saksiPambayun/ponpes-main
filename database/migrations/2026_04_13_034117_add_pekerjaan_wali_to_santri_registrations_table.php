<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('santri_registrations', function (Blueprint $table) {
            // Tambahkan kolom pekerjaan_wali jika belum ada
            if (!Schema::hasColumn('santri_registrations', 'pekerjaan_wali')) {
                $table->string('pekerjaan_wali')->nullable()->after('nama_wali');
            }

            // Pastikan kolom lain juga ada
            if (!Schema::hasColumn('santri_registrations', 'foto')) {
                $table->string('foto')->nullable()->after('pekerjaan_wali');
            }

            if (!Schema::hasColumn('santri_registrations', 'kk')) {
                $table->string('kk')->nullable()->after('foto');
            }

            if (!Schema::hasColumn('santri_registrations', 'alasan_penolakan')) {
                $table->text('alasan_penolakan')->nullable()->after('status');
            }

            if (!Schema::hasColumn('santri_registrations', 'tanggal_verifikasi')) {
                $table->timestamp('tanggal_verifikasi')->nullable()->after('alasan_penolakan');
            }
        });
    }

    public function down()
    {
        Schema::table('santri_registrations', function (Blueprint $table) {
            $table->dropColumn([
                'pekerjaan_wali',
                'foto',
                'kk',
                'alasan_penolakan',
                'tanggal_verifikasi'
            ]);
        });
    }
};
