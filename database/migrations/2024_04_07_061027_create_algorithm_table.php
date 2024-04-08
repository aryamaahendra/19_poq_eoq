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
        Schema::create('algorithm', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('component_id');
            $table->foreign('component_id')->references('id')->on('components');

            $table->float('POQ');
            $table->float('EOQ');
            $table->float('ROP');
            $table->float('order_frequency');
            // $table->float('ROP');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('algorithm', function (Blueprint $table) {
            $table->dropForeign(['component_id']);
        });

        Schema::dropIfExists('algorithm');
    }
};
