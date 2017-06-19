<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InscribedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscribed', function (Blueprint $table) {
            $table->increments('id');
            $table->double('first_midterm')->nullable();
            $table->double('second_midterm')->nullable();
            $table->double('pratice_score')->nullable();
            $table->double('final_exam')->nullable();
            $table->double('score')->nullable();
            $table->string('literal', 5)->nullable();
            $table->integer('assistance')->nullable();

            $table->integer('teachers_id')->unsigned();
            $table->foreign('teachers_id')->references('id')->on('teachers');

            $table->integer('sections_id')->unsigned();
            $table->foreign('sections_id')->references('id')->on('sections');
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
        Schema::dropIfExists('inscribed');
    }
}
