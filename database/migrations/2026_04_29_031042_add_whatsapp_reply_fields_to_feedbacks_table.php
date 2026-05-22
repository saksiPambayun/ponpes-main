<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('feedbacks', function (Blueprint $table) {
            if (!Schema::hasColumn('feedbacks', 'whatsapp_reply')) {
                $table->text('whatsapp_reply')->nullable()->after('reply_message');
            }
            if (!Schema::hasColumn('feedbacks', 'whatsapp_replied_at')) {
                $table->timestamp('whatsapp_replied_at')->nullable()->after('whatsapp_reply');
            }
            if (!Schema::hasColumn('feedbacks', 'whatsapp_reply_status')) {
                $table->enum('whatsapp_reply_status', ['pending', 'sent', 'failed'])->default('pending')->after('whatsapp_replied_at');
            }
        });
    }

    public function down()
    {
        Schema::table('feedbacks', function (Blueprint $table) {
            // Hapus foreign key jika ada
            if (Schema::hasColumn('feedbacks', 'replied_by')) {
                $table->dropForeign(['replied_by']);
            }

            // Drop columns dengan pengecekan
            if (Schema::hasColumn('feedbacks', 'whatsapp_reply')) {
                $table->dropColumn('whatsapp_reply');
            }
            if (Schema::hasColumn('feedbacks', 'whatsapp_replied_at')) {
                $table->dropColumn('whatsapp_replied_at');
            }
            if (Schema::hasColumn('feedbacks', 'whatsapp_reply_status')) {
                $table->dropColumn('whatsapp_reply_status');
            }
        });
    }
};
