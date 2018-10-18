<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            ['name' => 'Toán','created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Lý','created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Hóa','created_at' => Carbon::now()->format('Y-m-d H:i:s')]
        ]);
    }
}
