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
        Schema::create('kyc_forms', function (Blueprint $table) {
            $table->id();
            //-------
            $table->unsignedTinyInteger('type');
            $table->string('label');
            $table->string('html_type');
            $table->string('step');
            $table->string('name');
            $table->unsignedTinyInteger('required')->comment('0 => no, 1 => yes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kyc_forms');
    }
};
