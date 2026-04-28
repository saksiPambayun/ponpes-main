<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registration_waves', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., "Gelombang 1", "Gelombang 2"
            $table->text('description')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->boolean('is_active')->default(true);
            $table->integer('quota')->nullable(); // Maximum registrations
            $table->integer('registered_count')->default(0); // Current registrations
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registration_waves');
    }
};