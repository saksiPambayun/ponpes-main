<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambah kolom username jika belum ada
            if (!Schema::hasColumn('users', 'username')) {
                $table->string('username')->unique()->after('name');
            }

            // Tambah kolom email_verified_at jika belum ada
            if (!Schema::hasColumn('users', 'email_verified_at')) {
                $table->timestamp('email_verified_at')->nullable()->after('email');
            }

            // Tambah kolom status jika belum ada
            if (!Schema::hasColumn('users', 'status')) {
                $table->enum('status', ['active', 'inactive'])->default('active')->after('role');
            }

            // Tambah kolom address jika belum ada
            if (!Schema::hasColumn('users', 'address')) {
                $table->text('address')->nullable()->after('phone');
            }

            // Tambah kolom avatar jika belum ada
            if (!Schema::hasColumn('users', 'avatar')) {
                $table->string('avatar')->nullable()->after('address');
            }

            // ========== KOLOM YANG DIPERLUKAN UNTUK OTP ==========

            // Tambah kolom whatsapp_number (DIPAKAI di RegisterController)
            if (!Schema::hasColumn('users', 'whatsapp_number')) {
                $table->string('whatsapp_number')->nullable()->after('phone');
            }

            // Tambah kolom is_verified (DIPAKAI di LoginController)
            if (!Schema::hasColumn('users', 'is_verified')) {
                $table->boolean('is_verified')->default(false)->after('status');
            }

            // Tambah kolom verified_at (opsional, untuk catatan waktu verifikasi)
            if (!Schema::hasColumn('users', 'verified_at')) {
                $table->timestamp('verified_at')->nullable()->after('is_verified');
            }

            // Ubah role agar mendukung 'user'
            DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('superadmin', 'admin', 'user') NOT NULL DEFAULT 'user'");
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'username',
                'email_verified_at',
                'status',
                'address',
                'avatar',
                'whatsapp_number',
                'is_verified',
                'verified_at'
            ]);
            DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('superadmin', 'admin') NOT NULL DEFAULT 'admin'");
        });
    }
};
