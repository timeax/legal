<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_settings', function (Blueprint $table) {
            $table->id();
            //----
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('currency_id');
            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('account_id');
            //-----------
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('account_id')->references('id')->on('account_infos');
            //-----
            $table->unsignedTinyInteger('push_notifications')->default(0);
            $table->json('notifications')->comment('')->nullable();
            $table->unsignedTinyInteger('mask_push_notifications')->default(1);
            //---
            $table->string('phising_code');

            $table->json('dynamic_settings')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_settings');
    }
};
