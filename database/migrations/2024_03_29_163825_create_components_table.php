<?php

use App\Actions\Components\MeasurementEnum;
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
        Schema::create('components', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128);
            $table->enum('measurement', MeasurementEnum::all());

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('component_categories');

            $table->unsignedSmallInteger('in_stock')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('components', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });

        Schema::dropIfExists('components');
    }
};
