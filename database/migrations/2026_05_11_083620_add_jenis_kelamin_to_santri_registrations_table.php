<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('santri_registrations', function (Blueprint $table) {
            // Cek jika kolom BELUM ada, baru tambah
            if (!Schema::hasColumn('santri_registrations', 'jenis_kelamin')) {
                $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable()->after('nama_lengkap');
            }
        });
    }

    public function down(): void
    {
        Schema::table('santri_registrations', function (Blueprint $table) {
            if (Schema::hasColumn('santri_registrations', 'jenis_kelamin')) {
                $table->dropColumn('jenis_kelamin');
            }
        });
    }
};