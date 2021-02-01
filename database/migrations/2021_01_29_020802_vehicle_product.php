<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VehicleProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_products', function (Blueprint $table){
           $table->id();
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('product_id');

            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('vehicle_products');
    }
}
