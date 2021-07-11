<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VehicalRoute extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_routes', function (Blueprint $table){
           $table->id();
           $table->unsignedBigInteger('vehicle_id');
           $table->unsignedBigInteger('location_id');

            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('location_id')->references('id')->on('locations');
           $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_routes');
    }
}
