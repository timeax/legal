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
        Schema::create('trade_limits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trade_id');
            $table->foreign('trade_id')->references('id')->on('trade_types');

            $table->unsignedTinyInteger('is_fixed');
            $table->double('limit');

            $table->unsignedBigInteger('from')->nullable();
            $table->unsignedBigInteger('to')->nullable();

            $table->unsignedTinyInteger('status')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trade_limits');
    }
};
