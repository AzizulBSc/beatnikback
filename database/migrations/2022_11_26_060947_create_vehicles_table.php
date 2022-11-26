<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('model');
            $table->bigInteger('customer_id');
            $table->bigInteger('price')->nullable();
            $table->bigInteger('vehicle_color_id');
            $table->bigInteger('vehicle_brand_id');
            $table->bigInteger('vehicle_category_id');
            $table->string('engin_num');
            $table->string('image')->nullable();
            $table->string('num_plate');
            $table->string('chasis_num');
            $table->year('model_year')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
