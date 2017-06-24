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
            'names' => 'Administrador',
            'last_name' => 'Administrador2',
            'identity_card' => '223-0155545-5',
            'civil_status' => 'Soltero',
            'gender' => 'Femenino',
        	'email' => 'admin@itsc.com',
        	'password' => bcrypt('123456'),
        	'status' => 1,
            'rolls_id' => 1,
        ]);
    }
}

