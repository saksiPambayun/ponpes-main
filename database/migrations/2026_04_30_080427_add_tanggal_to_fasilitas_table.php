<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('fasilitas', function (Blueprint $table) {
            if (!Schema::hasColumn('fasilitas', 'tanggal_fasilitas')) {
                $table->date('tanggal_fasilitas')->nullable()->after('deskripsi');
            }

            // Tambah index untuk filter tanggal
            $table->index('tanggal_fasilitas')->after('tanggal_fasilitas');
        });
    }

    public function down()
    {
        Schema::table('fasilitas', function (Blueprint $table) {
            // Hapus index jika ada
            $table->dropIndex(['tanggal_fasilitas']);

            // Drop column jika ada
            if (Schema::hasColumn('fasilitas', 'tanggal_fasilitas')) {
                $table->dropColumn('tanggal_fasilitas');
            }
        });
    }
};
