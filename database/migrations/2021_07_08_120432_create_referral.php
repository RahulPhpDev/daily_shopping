<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferral extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referral', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->on('users')->references('id');

            $table->string('code', 10);

            $table->softDeletes();

            $table->timestamp('created_at');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('refered_by')->nullable();
             $table->foreign('refered_by')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referral');
          Schema::table('advertisements', function (Blueprint $table) {
               $table->dropColoum('refered_by');
        });
    }
}
