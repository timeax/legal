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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('trnx');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->decimal('charge')->unsigned()->default(0);
            $table->decimal('amount')->unsigned();

            $table->unsignedBigInteger('currency_id');
            $table->foreign('currency_id')->references('id')->on('currencies');

            $table->string('remark');
            $table->string('details')->nullable();

            $table->char('type');
            $table->string('ref')->unique();

            $table->string('status')->default(STATUS_PENDING);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
