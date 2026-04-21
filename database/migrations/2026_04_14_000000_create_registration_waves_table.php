<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // 1. Buat tabel registration_waves
        Schema::create('registration_waves', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('is_active')->default(true);
            $table->text('description')->nullable();
            $table->integer('quota')->nullable();
            $table->integer('registered_count')->default(0);
            $table->timestamps();
        });

        // 2. Tambahkan kolom ke santri_registrations
        Schema::table('santri_registrations', function (Blueprint $table) {
            $table->foreignId('wave_id')
                ->nullable()
                ->constrained('registration_waves')
                ->nullOnDelete();

            $table->enum('acceptance_status', ['pending', 'accepted', 'rejected', 'waiting_list'])
                ->default('pending');

            $table->text('acceptance_note')->nullable();
            $table->timestamp('announcement_date')->nullable();
        });
    }

    public function down()
    {
        Schema::table('santri_registrations', function (Blueprint $table) {
            $table->dropForeign(['wave_id']);
            $table->dropColumn([
                'wave_id',
                'acceptance_status',
                'acceptance_note',
                'announcement_date'
            ]);
        });

        Schema::dropIfExists('registration_waves');
    }
};