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
        Schema::create('escrows', function (Blueprint $table) {
            $table->id();
            $table->char('type');

            $table->unsignedBigInteger('wallet_id');
            $table->foreign('wallet_id')->references('id')->on('wallets');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('ref');
            $table->foreign('ref')->references('ref')->on('transactions');

            $table->double('amount')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('escrows');
    }
};
