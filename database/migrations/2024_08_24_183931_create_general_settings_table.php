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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            //--
            $table->unsignedBigInteger('currency_id');
            $table->foreign('currency_id')->references('id')->on('currencies');
            //-------
            $table->string('smtp_host')->nullable();
            $table->string('smtp_port')->nullable();
            $table->string('smtp_user')->nullable();
            $table->string('smtp_pass')->nullable();
            //--------------
            $table->string('mail_encryption')->nullable();
            $table->string('mail_type');

            $table->string('from_email')->nullable();
            $table->string('from_name')->nullable();

            $table->string('contact_no')->nullable();

            $table->unsignedTinyInteger('is_maintenance')->default(0);
            $table->string('maintenence')->default('Site is currently under maintenance');

            $table->unsignedTinyInteger('registration')->default(1);
            $table->unsignedTinyInteger('kyc')->default(1);

            $table->unsignedTinyInteger('recaptcha')->default(1);

            $table->json('notification_settings')->nullable()->comment('{ sms: boolean, email: boolean, push: boolean }');

            $table->json('api_settings')->nullable()->comment('Add into categories, eg: { title: string, group: string, settings: {...} }, PS. it is an array');

            $table->unsignedTinyInteger('verify_email')->default(1)->comment('Enable email verifications on site');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
