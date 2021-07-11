<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->on('products')->references('id')->onDelete('cascade');

            $table->unsignedBigInteger('user_location_id');
            $table->foreign('user_location_id')->on('user_location')->references('id')->onDelete('cascade');

            $table->tinyInteger('type')->comment('1:daily need, 2: few days');

            $table->integer('quantity');

            $table->char('price', 7);

            $table->longText('delivery');

            $table->tinyInteger('status')->default(0);

            $table->text('details')->nullable();

            $table->timestamps();

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
        Schema::dropIfExists('subscriptions');
    }
}
