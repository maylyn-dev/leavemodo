<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender');
            $table->string('address')->nullable();
            $table->string('contact_no')->nullable();
            $table->timestamp('birth_date')->nullable();
            $table->string('civil_status');
            $table->timestamp('date_hired');
            $table->text('admin_notes')->nullable();
            $table->integer('position_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->boolean('is_admin')->nullable();
            $table->boolean('is_supervisor')->nullable();
            $table->boolean('is_employee')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
