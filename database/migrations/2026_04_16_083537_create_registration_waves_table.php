<?php
// database/migrations/2026_01_15_000001_create_registration_waves_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('registration_waves', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Gelombang 1, Gelombang 2, etc
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('is_active')->default(true);
            $table->text('description')->nullable();
            $table->integer('quota')->nullable(); // Kuota pendaftaran
            $table->integer('registered_count')->default(0); // Jumlah terdaftar
            $table->timestamps();
        });

        // Tambahkan kolom wave_id ke tabel santri_registrations
        Schema::table('santri_registrations', function (Blueprint $table) {
            $table->foreignId('wave_id')->nullable()->constrained('registration_waves')->onDelete('set null');
            $table->enum('acceptance_status', ['pending', 'accepted', 'rejected', 'waiting_list'])->default('pending')->change();
            $table->text('acceptance_note')->nullable();
            $table->timestamp('announcement_date')->nullable();
        });
    }

    public function down()
    {
        Schema::table('santri_registrations', function (Blueprint $table) {
            $table->dropForeign(['wave_id']);
            $table->dropColumn(['wave_id', 'acceptance_note', 'announcement_date']);
        });
        Schema::dropIfExists('registration_waves');
    }
};
