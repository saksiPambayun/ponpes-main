<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Cek apakah tabel santri_registrations ada
        if (Schema::hasTable('santri_registrations')) {
            Schema::table('santri_registrations', function (Blueprint $table) {
                // Cek apakah kolom wave_id sudah ada
                if (!Schema::hasColumn('santri_registrations', 'wave_id')) {
                    $table->foreignId('wave_id')
                        ->nullable()
                        ->constrained('registration_waves')
                        ->nullOnDelete();
                }

                // Cek apakah kolom acceptance_status sudah ada
                if (!Schema::hasColumn('santri_registrations', 'acceptance_status')) {
                    $table->enum('acceptance_status', ['pending', 'accepted', 'rejected', 'waiting_list'])
                        ->default('pending');
                }

                // Cek apakah kolom acceptance_note sudah ada
                if (!Schema::hasColumn('santri_registrations', 'acceptance_note')) {
                    $table->text('acceptance_note')->nullable();
                }

                // Cek apakah kolom announcement_date sudah ada
                if (!Schema::hasColumn('santri_registrations', 'announcement_date')) {
                    $table->timestamp('announcement_date')->nullable();
                }
            });
        }
    }

    public function down()
    {
        if (Schema::hasTable('santri_registrations')) {
            Schema::table('santri_registrations', function (Blueprint $table) {
                if (Schema::hasColumn('santri_registrations', 'wave_id')) {
                    $table->dropForeign(['wave_id']);
                    $table->dropColumn('wave_id');
                }
                if (Schema::hasColumn('santri_registrations', 'acceptance_status')) {
                    $table->dropColumn('acceptance_status');
                }
                if (Schema::hasColumn('santri_registrations', 'acceptance_note')) {
                    $table->dropColumn('acceptance_note');
                }
                if (Schema::hasColumn('santri_registrations', 'announcement_date')) {
                    $table->dropColumn('announcement_date');
                }
            });
        }
    }
};
