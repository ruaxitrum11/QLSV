<?php

use Illuminate\Database\Seeder;

class RanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ranks')->insert([
            ['name' => 'Giỏi'],
            ['name'=>'Khá'],
            ['name'=>'Trung Bình']
        ]);
    }
}
