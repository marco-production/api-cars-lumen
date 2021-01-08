<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vehicles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('make_id')->unsigned();
            $table->integer('model_id')->unsigned();
            $table->integer('fuel_id')->unsigned();
            $table->integer('vehicle_type_id')->unsigned();
            $table->integer('year')->unsigned();
            $table->string('chassis')->nullable();
            $table->text('description')->nullable();
            $table->boolean('condition')->nullable()->default(true);
            $table->boolean('status')->nullable()->default(true);
            $table->text('image')->nullable();
            $table->string('slug')->unique();

            $table->foreign('fuel_id')->references('id')->on('fuels')->onDelete('cascade');
            $table->foreign('make_id')->references('id')->on('main_makes')->onDelete('cascade');
            $table->foreign('model_id')->references('id')->on('make_models')->onDelete('cascade');
            $table->foreign('vehicle_type_id')->references('id')->on('vehicle_types')->onDelete('cascade');
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
}
