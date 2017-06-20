<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'email' => 'admin@itsc.com',
            'job' => 'admin',
        	'password' => bcrypt('123456'),
        	'status' => 1,
        ]);
    }
}
