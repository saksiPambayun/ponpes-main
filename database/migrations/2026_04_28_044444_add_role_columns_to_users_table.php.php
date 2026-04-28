<?php
// database/migrations/2026_01_01_000001_add_role_columns_to_users_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Cek apakah kolom sudah ada sebelum menambah
            if (!Schema::hasColumn('users', 'role')) {
                $table->enum('role', ['user', 'admin', 'superadmin'])->default('user')->after('email');
            }

            if (!Schema::hasColumn('users', 'status')) {
                $table->string('status')->default('active')->after('role');
            }

            if (!Schema::hasColumn('users', 'phone')) {
                $table->string('phone')->nullable()->after('status');
            }

            if (!Schema::hasColumn('users', 'address')) {
                $table->text('address')->nullable()->after('phone');
            }

            if (!Schema::hasColumn('users', 'avatar')) {
                $table->string('avatar')->nullable()->after('address');
            }

            if (!Schema::hasColumn('users', 'bio')) {
                $table->text('bio')->nullable()->after('avatar');
            }

            // Tambah index untuk performance
            $table->index('role');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'status', 'phone', 'address', 'avatar', 'bio']);
        });
    }
};
