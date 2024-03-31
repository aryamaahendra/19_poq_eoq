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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');

            $table->unsignedBigInteger('component_id');
            $table->foreign('component_id')->references('id')->on('components');

            $table->unsignedSmallInteger('qty');
            $table->unsignedInteger('unit_price');
            $table->unsignedInteger('total_price');

            $table->string('vehicle_number', 64);
            $table->string('description', 255);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
            $table->dropForeign(['component_id']);
        });

        Schema::dropIfExists('order_items');
    }
};
