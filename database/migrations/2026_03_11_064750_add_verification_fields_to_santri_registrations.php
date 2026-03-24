<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('santri_registrations', function (Blueprint $table) {
            if (!Schema::hasColumn('santri_registrations', 'status')) {
                $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending')->after('no_wali');
            }
            if (!Schema::hasColumn('santri_registrations', 'alasan_penolakan')) {
                $table->text('alasan_penolakan')->nullable()->after('status');
            }
            if (!Schema::hasColumn('santri_registrations', 'tanggal_verifikasi')) {
                $table->timestamp('tanggal_verifikasi')->nullable()->after('alasan_penolakan');
            }
            if (!Schema::hasColumn('santri_registrations', 'verified_by')) {
                $table->unsignedBigInteger('verified_by')->nullable()->after('tanggal_verifikasi');
            }

            // Kolom baru: informasi wali & dokumen
            if (!Schema::hasColumn('santri_registrations', 'nama_wali')) {
                $table->string('nama_wali')->nullable()->after('no_wali');
            }
            if (!Schema::hasColumn('santri_registrations', 'pekerjaan')) {
                $table->string('pekerjaan')->nullable()->after('nama_wali');
            }
            if (!Schema::hasColumn('santri_registrations', 'dok_kk')) {
                $table->string('dok_kk')->nullable()->after('pekerjaan');
            }
            if (!Schema::hasColumn('santri_registrations', 'dok_akta')) {
                $table->string('dok_akta')->nullable()->after('dok_kk');
            }
        });
    }

    public function down()
    {
        Schema::table('santri_registrations', function (Blueprint $table) {
            $table->dropColumn([
                'status',
                'alasan_penolakan',
                'tanggal_verifikasi',
                'verified_by',
                'nama_wali',
                'pekerjaan',
                'dok_kk',
                'dok_akta',
            ]);
        });
    }
};