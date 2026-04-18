<?php
// database/migrations/xxxx_xx_xx_xxxxxx_add_acceptance_columns_to_santri_registrations.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('santri_registrations', function (Blueprint $table) {
            // Tambahkan kolom wave_id dulu
            $table->foreignId('wave_id')->nullable()->after('id')->constrained('registration_waves')->onDelete('set null');

            // Tambahkan kolom acceptance_status (jika belum ada)
            if (!Schema::hasColumn('santri_registrations', 'acceptance_status')) {
                $table->enum('acceptance_status', ['pending', 'accepted', 'rejected', 'waiting_list'])->default('pending');
            }

            // Tambahkan kolom acceptance_note
            if (!Schema::hasColumn('santri_registrations', 'acceptance_note')) {
                $table->text('acceptance_note')->nullable();
            }

            // Tambahkan kolom announcement_date
            if (!Schema::hasColumn('santri_registrations', 'announcement_date')) {
                $table->timestamp('announcement_date')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('santri_registrations', function (Blueprint $table) {
            $table->dropForeign(['wave_id']);
            $table->dropColumn(['wave_id', 'acceptance_status', 'acceptance_note', 'announcement_date']);
        });
    }
};
