<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('user_role', function($table) {
          $table->id();
          $table->unsignedBigInteger('user_id');
          $table->unsignedBigInteger('role_id');

          $table->foreign('role_id')->references('id')->on('roles');
          $table->foreign('user_id')->references('id')->on('users');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('user_role');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
