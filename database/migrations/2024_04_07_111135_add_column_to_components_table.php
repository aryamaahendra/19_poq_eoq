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
        Schema::table('components', function (Blueprint $table) {
            $table->unsignedInteger('order_cost')->default(10000);
            $table->unsignedInteger('holding_cost_unit')->default(100);
            $table->unsignedInteger('lead_time')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('components', function (Blueprint $table) {
            //
        });
    }
};
