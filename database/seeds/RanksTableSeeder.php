<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            ['name' => 'Giỏi' , 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=>'Khá','created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=>'Trung Bình','created_at' => Carbon::now()->format('Y-m-d H:i:s')]
        ]);
    }
}
