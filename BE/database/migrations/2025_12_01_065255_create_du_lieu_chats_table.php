<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('du_lieu_chats', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->longText('embedding');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('du_lieu_chats', function (Blueprint $table) {
            $table->string('hash', 100)->nullable()->after('embedding');
        });
    }
};
