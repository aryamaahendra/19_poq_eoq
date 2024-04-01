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
        Schema::create('sell_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('sell_id');
            $table->foreign('sell_id')->references('id')->on('sells');

            $table->unsignedBigInteger('component_id');
            $table->foreign('component_id')->references('id')->on('components');

            $table->unsignedSmallInteger('qty');
            $table->unsignedInteger('unit_price');
            $table->unsignedInteger('total_price');

            $table->string('description', 255);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sell_items', function (Blueprint $table) {
            $table->dropForeign(['sell_id']);
            $table->dropForeign(['component_id']);
        });

        Schema::dropIfExists('sell_items');
    }
};
