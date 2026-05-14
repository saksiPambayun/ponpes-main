<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('pegawai', function (Blueprint $table) {
        // Tambahkan status dan kolom pendukung lainnya yang ada di Controller
        if (!Schema::hasColumn('pegawai', 'status')) {
            $table->string('status')->default('aktif')->after('nama');
        }
        if (!Schema::hasColumn('pegawai', 'divisi')) {
            $table->string('divisi')->nullable()->after('jabatan');
        }
        if (!Schema::hasColumn('pegawai', 'tanggal_bergabung')) {
            $table->date('tanggal_bergabung')->nullable()->after('status');
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pegawai', function (Blueprint $table) {
            // Menghapus kolom status jika migration di-rollback
            $table->dropColumn('status');
        });
    }
};