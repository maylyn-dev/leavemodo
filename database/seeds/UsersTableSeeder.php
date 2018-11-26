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
        	'name'	=>	'Maylyn Talampas',
        	'email'	=>	'maylyntalampas21@gmail.com',
        	'password'	=>	bcrypt('password'),
        	'gender'	=>	'Female',
        	'address'	=>	'Pasig City',
        	'contact_no'	=>	'09976754323',
        	'birth_date'	=>	'1912-06-23',
        	'civil_status'	=>	'Single',
        	'date_hired'	=>	'2018-01-01',
        	'position_id'	=>	1,
        	'department_id'	=>	1,
        	'is_admin'		=>	1
        ]);
    }
}
