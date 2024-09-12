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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            //---
            $table->string('icon')->nullable();
            $table->integer('default')->unsigned()->comment('0 => false, 1 => true');
            $table->string('code')->nullable()->unique();
            $table->string('color')->nullable();
            $table->string('gecko_id')->unique();
            $table->string('curr_name')->unique();
            $table->string('type')->comment('fiat or crypto');
            $table->string('status')->comment('active or inactive');
            $table->decimal('rate')->unsigned();
            $table->json('charges')->nullable();
            //-----
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
