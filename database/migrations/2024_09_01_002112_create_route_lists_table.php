<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //Array<{name: string, id: string, route: string, category: string, status: boolean, isGroup: boolean}>
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('route_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->string('route');

            $table->unsignedTinyInteger('is_group');
            $table->string('group_id')->nullable();

            $table->foreign('group_id')->references('id')->on('route_lists');

            $table->unsignedTinyInteger('status');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('route_lists');
    }
};
