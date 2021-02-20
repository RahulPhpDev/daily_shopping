<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('order_product_deliveries');
        Schema::create('order_product_deliveries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_product_attribute_id');
//            $table->foreign('order_product_attribute_id')->on('order_products')->references('id')->onDelete('cascade');
            $table->tinyInteger('type')->default(0);
            $table->json('timing')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('order_product_deliveries');
    }
}
