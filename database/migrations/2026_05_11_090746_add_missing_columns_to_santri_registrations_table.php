<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('santri_registrations', function (Blueprint $table) {
            // Tambah kolom jenis_kelamin jika belum ada
            if (!Schema::hasColumn('santri_registrations', 'jenis_kelamin')) {
                $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable()->after('nama_lengkap');
            }

            // Tambah kolom angkatan jika belum ada
            if (!Schema::hasColumn('santri_registrations', 'angkatan')) {
                $table->year('angkatan')->nullable()->after('status');
            }

            // Tambah kolom tempat_lahir jika belum ada
            if (!Schema::hasColumn('santri_registrations', 'tempat_lahir')) {
                $table->string('tempat_lahir', 100)->nullable()->after('tanggal_lahir');
            }
        });
    }

    public function down()
    {
        Schema::table('santri_registrations', function (Blueprint $table) {
            if (Schema::hasColumn('santri_registrations', 'jenis_kelamin')) {
                $table->dropColumn('jenis_kelamin');
            }
            if (Schema::hasColumn('santri_registrations', 'angkatan')) {
                $table->dropColumn('angkatan');
            }
            if (Schema::hasColumn('santri_registrations', 'tempat_lahir')) {
                $table->dropColumn('tempat_lahir');
            }
        });
    }
};
