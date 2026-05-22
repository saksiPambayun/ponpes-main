<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'is_verified')) {
                $table->boolean('is_verified')->default(false)->after('email');
            }
            if (!Schema::hasColumn('users', 'otp')) {
                $table->string('otp', 6)->nullable()->after('is_verified');
            }
            if (!Schema::hasColumn('users', 'otp_expires_at')) {
                $table->timestamp('otp_expires_at')->nullable()->after('otp');
            }

            // Tambah index untuk performance
            $table->index(['otp', 'otp_expires_at'])->after('otp_expires_at');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Hapus index jika ada
            $table->dropIndex(['otp', 'otp_expires_at']);

            // Drop columns dengan pengecekan
            if (Schema::hasColumn('users', 'is_verified')) {
                $table->dropColumn('is_verified');
            }
            if (Schema::hasColumn('users', 'otp')) {
                $table->dropColumn('otp');
            }
            if (Schema::hasColumn('users', 'otp_expires_at')) {
                $table->dropColumn('otp_expires_at');
            }
        });
    }
};
