<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('date_applied');
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->text('purpose');
            $table->string('name_relative')->nullable();
            $table->string('relation')->nullable();
            $table->text('emp_notes')->nullable();
            $table->text('manager_notes')->nullable();
            $table->text('admin_notes')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->integer('status_id')->unsigned();
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
        Schema::drop('applications');
    }
}
