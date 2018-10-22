<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'number_id' => 90000000,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('subjects')->insert([
            ['name' => 'Toán','created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Lý','created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Hóa','created_at' => Carbon::now()->format('Y-m-d H:i:s')]
        ]);

        DB::table('clients')->insert([
            ['number_id' => 10000000, 'name' => 'trunghieu', 'email' => 'trunghieu@gmail.com', 'password' => bcrypt('123456'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['number_id' => 10000001, 'name' => 'trunghieu1', 'email' => 'trunghieu1@gmail.com', 'password' => bcrypt('123456'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ]);

    }
}
