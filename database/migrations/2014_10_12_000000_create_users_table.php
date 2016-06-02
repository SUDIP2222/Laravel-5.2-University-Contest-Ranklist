<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('user_name');
            $table->string('email')->unique();
            $table->string('department');
            $table->string('university');
            $table->string('student_id');
            $table->string('phone');
            $table->string('password');
            $table->string('is_a');
            $table->string('code');
            $table->boolean('active');
            $table->boolean('admin_active');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
