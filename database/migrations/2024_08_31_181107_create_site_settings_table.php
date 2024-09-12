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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            //------
            $table->string('title');
            //---
            $table->string('header_logo')->nullable();
            $table->string('favicon');
            $table->string('theme_color')->nullable();
            //------
            $table->string('font');
            $table->string('font_family');
            //----------;
            $table->json('colors')->nullable()->comment('');
            //-------
            $table->json('prev_colors')->nullable();
            //---
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
