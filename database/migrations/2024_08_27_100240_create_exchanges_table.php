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
        Schema::create('exchanges', function (Blueprint $table) {
            $table->id();
            //-----
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('transaction_id');
            $table->string('from');
            $table->string('to');
            //---
            $table->foreign('from')->references('code')->on('currencies');
            $table->foreign('to')->references('code')->on('currencies');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('transaction_id')->references('id')->on('transactions');
            //---
            $table->string('type')->comment('LIMIT or INSTANT');
            //-- monetary data
            $table->double('amount');
            $table->double('charges');
            $table->double('total');
            $table->double('gain');
            $table->double('rate');
            ///-------------
            $table->dateTime('expire_at');
            //-------
            $table->string('status')->default(STATUS_PENDING);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exchanges');
    }
};
