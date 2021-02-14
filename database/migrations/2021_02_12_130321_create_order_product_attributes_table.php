<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->unsignedBigInteger('product_attribute_id');
            $table->foreign('product_attribute_id')
                ->on( (new App\Models\ProductAttribute) ->getTable())
                ->references('id')->onDelete('cascade');
            $table->string('quantity');
            $table->double('price')->default(0);
            $table->timestamp('deliver_at')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('order_product_attributes');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
