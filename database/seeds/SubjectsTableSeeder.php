<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('subjects')->insert([
            ['name' => 'Toán'],
            ['name' => 'Lý'],
            ['name' => 'Hóa']
        ]);
    }
}
