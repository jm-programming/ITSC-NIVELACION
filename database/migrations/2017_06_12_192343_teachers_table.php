<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('names', 45);
            $table->string('last_name', 45);
            $table->boolean('teacher_status');
            $table->string('teacher_code', 15);
            $table->string('identity_card', 15);
            $table->string('personal_phone');
            $table->string('cellphone');

            $table->integer('users_id')->unsigned();

            $table->foreign('users_id')->references('id')->on('users');
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
        Schema::dropIfExists('teachers');
    }
}
