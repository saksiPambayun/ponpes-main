<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('santri_registrations', function (Blueprint $table) {
            if (!Schema::hasColumn('santri_registrations', 'angkatan')) {
                $table->year('angkatan')->nullable()->after('status');
            }

            // Tambah index untuk filter angkatan
            $table->index('angkatan')->after('angkatan');
        });
    }

    public function down()
    {
        Schema::table('santri_registrations', function (Blueprint $table) {
            // Hapus index jika ada
            $table->dropIndex(['angkatan']);

            // Drop column jika ada
            if (Schema::hasColumn('santri_registrations', 'angkatan')) {
                $table->dropColumn('angkatan');
            }
        });
    }
};
