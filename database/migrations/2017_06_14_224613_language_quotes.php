<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LanguageQuotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_quotes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('names', 45);
            $table->string('last_name', 45);
            $table->string('matricula', 10);
            $table->string('career', 45);
            $table->date('birthday');
            $table->string('identity_card');
            $table->string('email', 180)->unique();
            $table->date('date');
            $table->timeTz('time');
            $table->string('location', 90);
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
        Schema::dropIfExists('language_quotes');
    }
}
