<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'name' => 'Web Development',
            'description' => 'Web Development Department'
        ],
        [
            'name' => 'Content',
            'description' => 'Content Department'
        ],
        [
            'name' => 'Enterprise',
            'description' => 'Enterprise Department'
        ]);
    }
}
