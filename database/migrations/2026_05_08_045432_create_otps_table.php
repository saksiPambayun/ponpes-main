<?php
// database/migrations/2024_01_01_000001_create_otps_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('otps', function (Blueprint $table) {
            $table->id();
            $table->string('identifier'); // email atau nomor telepon
            $table->string('otp', 6);
            $table->string('type'); // 'email' or 'whatsapp'
            $table->string('purpose'); // 'login', 'register', 'verify'
            $table->timestamp('expires_at')->nullable();
            $table->boolean('is_used')->default(false);
            $table->timestamps();
            
            $table->index(['identifier', 'otp', 'is_used']);
            $table->index('expires_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('otps');
    }
};