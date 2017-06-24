<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('employees', function (Blueprint $table) {
			$table->increments('id');
			$table->string('names', 45);
			$table->string('last_name', 45);
			$table->string('email', 45);
			$table->string('job', 45)->nullable();
			$table->string('office_phone', 20)->nullable();
			$table->string('personal_phone', 20)->nullable();
			$table->string('cellphone', 20)->nullable();
			$table->longText('address');
			$table->string('identity_card', 15);
			$table->string('civil_status', 25);

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
	public function down() {
		Schema::dropIfExists('employees');
	}
}
