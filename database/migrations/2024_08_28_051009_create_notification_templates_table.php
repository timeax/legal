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
        Schema::create('notification_templates', function (Blueprint $table) {
            $table->id();
            //-----------
            $table->string('key')->unique();
            //------

            $table->string('subject');
            $table->json('codes');

            $table->json('default_codes')->default(json_encode([
                'first_name' => 'Users first name',
                'name' => 'Users full name',
                'last_name' => 'Users last name',
                'phising_code' => 'Users phising code'
            ]));

            $table->unsignedTinyInteger('email_status');
            $table->unsignedTinyInteger('log_status');
            $table->unsignedTinyInteger('push_status');
            $table->unsignedTinyInteger('sms_status');
            $table->unsignedTinyInteger('admin_status');


            $table->json('email');
            $table->json('log');
            $table->json('push');
            $table->json('sms');
            $table->json('admin');

            $table->unsignedTinyInteger('category_id');
            $table->foreign('category_id')->references('id')->on('notification_categories');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification_templates');
    }
};
