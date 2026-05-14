<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWhatsappReplyFieldsToFeedbacksTable extends Migration
{
    public function up()
    {
        Schema::table('feedbacks', function (Blueprint $table) {
            $table->text('whatsapp_reply')->nullable()->after('reply_message');
            $table->timestamp('whatsapp_replied_at')->nullable()->after('whatsapp_reply');
            $table->string('whatsapp_reply_status')->default('pending')->after('whatsapp_replied_at'); // pending, sent, failed
        });
    }

    public function down()
    {
        Schema::table('feedbacks', function (Blueprint $table) {
            $table->dropColumn(['whatsapp_reply', 'whatsapp_replied_at', 'whatsapp_reply_status']);
        });
    }
}