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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->integer('unique_key')->unsigned();
            $table->string('name');
            $table->string('code')->unique();
            $table->string('dial_code')->unique();
            $table->string('flag');
            //---
            $table->string('currency_id')->unique();
            $table->foreign('currency_id')->references('id')->on('currencies');
            //------
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
