<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('min_years_service');
            $table->integer('num_days');
            $table->integer('max_days');
            $table->boolean('for_male');
            $table->boolean('for_female');
            $table->boolean('convert_to_cash');
            $table->boolean('require_docs');
            $table->boolean('carry_over');
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
        Schema::drop('types');
    }
}
