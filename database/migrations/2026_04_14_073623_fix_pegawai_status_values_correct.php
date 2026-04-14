<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Perbaiki semua nilai status menjadi lowercase
        DB::table('pegawai')
            ->where('status', 'Aktif')
            ->orWhere('status', 'ACTIVE')
            ->orWhere('status', 'active')
            ->update(['status' => 'aktif']);

        DB::table('pegawai')
            ->where('status', 'Cuti')
            ->orWhere('status', 'CUTI')
            ->orWhere('status', 'leave')
            ->update(['status' => 'cuti']);

        DB::table('pegawai')
            ->where('status', 'Non-Aktif')
            ->orWhere('status', 'NONAKTIF')
            ->orWhere('status', 'nonactive')
            ->orWhere('status', 'inactive')
            ->update(['status' => 'nonaktif']);
    }

    public function down(): void
    {
        // Rollback tidak diperlukan karena hanya perbaikan data
    }
};
