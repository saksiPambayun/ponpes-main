<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pegawai', function (Blueprint $table) {

            if (!Schema::hasColumn('pegawai', 'no_telepon')) {
                $table->string('no_telepon')->nullable();
            }

            if (!Schema::hasColumn('pegawai', 'tipe_pegawai')) {
                $table->enum('tipe_pegawai', [
                    'tetap',
                    'kontrak',
                    'magang',
                    'honorer'
                ])->nullable();
            }

            if (!Schema::hasColumn('pegawai', 'tempat_lahir')) {
                $table->string('tempat_lahir')->nullable();
            }

            if (!Schema::hasColumn('pegawai', 'agama')) {
                $table->string('agama')->nullable();
            }

            if (!Schema::hasColumn('pegawai', 'alamat')) {
                $table->text('alamat')->nullable();
            }

            if (!Schema::hasColumn('pegawai', 'foto_ijazah')) {
                $table->string('foto_ijazah')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('pegawai', function (Blueprint $table) {

            $table->dropColumn([
                'no_telepon',
                'tipe_pegawai',
                'tempat_lahir',
                'agama',
                'alamat',
                'foto_ijazah'
            ]);

        });
    }
};
