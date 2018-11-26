<?php

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            'name' => 'Software Developer',
            'description' => 'Develops softwares'
        ],
        [
            'name' => 'Core Content Writer',
            'description' => 'Writes core content'
        ],
        [
            'name' => 'Website Developer',
            'description' => 'Creates websites for clients'
        ]);
    }
}
