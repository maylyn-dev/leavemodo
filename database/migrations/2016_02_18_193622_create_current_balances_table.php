<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrentBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('current_balances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('consumed')->unsigned();
            $table->integer('remaining')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('type_id')->unsigned();
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
        Schema::drop('current_balances');
    }
}
