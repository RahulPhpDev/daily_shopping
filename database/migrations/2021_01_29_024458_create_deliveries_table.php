<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {

            $table->id();
            $table->string('quantity', 10);
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('deliver_to');
            $table->unsignedBigInteger('deliver_by');
            $table->unsignedBigInteger('order_product_id');


            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('deliver_to')->references('id')->on('users');
            $table->foreign('deliver_by')->references('id')->on('users');
            $table->foreign('order_product_id')->references('id')->on('order_products');

            $table->timestamp('deliver_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deliveries');
    }
}
