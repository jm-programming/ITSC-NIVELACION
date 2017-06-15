<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubjectsHasTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects_has_teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subjects_id')->unsigned();
            $table->foreign('subjects_id')->references('id')->on('subjects');

            $table->integer('teachers_id')->unsigned();
            $table->foreign('teachers_id')->references('id')->on('teachers');
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
        Schema::dropIfExists('subjects_has_teachers');
    }
}
