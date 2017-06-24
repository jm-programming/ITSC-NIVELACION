<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('users')->insert([
			'job' => 'admin',
			'email' => 'admin@itsc.com',
			'password' => bcrypt('123456'),
			'status' => 1,
		]);
	}
}
