<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Cek apakah kolom status sudah ada sebelum menambah
        if (!Schema::hasColumn('struktur_organisasi', 'status')) {
            Schema::table('struktur_organisasi', function (Blueprint $table) {
                $table->enum('status', ['aktif', 'nonaktif'])->default('aktif')->after('deskripsi');
            });
        }
    }

    public function down()
    {
        if (Schema::hasColumn('struktur_organisasi', 'status')) {
            Schema::table('struktur_organisasi', function (Blueprint $table) {
                $table->dropColumn('status');
            });
        }
    }
};