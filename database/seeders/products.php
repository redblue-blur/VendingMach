<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(['email' => 'abc@gmail.com','password' => Hash::make(12345),'created_at' =>  \Carbon\Carbon::now()]);
        DB::table('machines')->insert(['5' => '15','10' => '10','20' => '5', 'created_at' =>  \Carbon\Carbon::now()]);
        DB::table('products')->insert(['name' => 'Rock','price' => '10','count' => '10','machine_id' => '1', 'created_at' =>  \Carbon\Carbon::now()]);
        DB::table('products')->insert(['name' => 'Rocky','price' => '10','count' => '10','machine_id' => '1', 'created_at' =>  \Carbon\Carbon::now()]);
        DB::table('products')->insert(['name' => 'Brock','price' => '10','count' => '10','machine_id' => '1', 'created_at' =>  \Carbon\Carbon::now()]);
        DB::table('products')->insert(['name' => 'Brocky','price' => '10','count' => '10','machine_id' => '1', 'created_at' =>  \Carbon\Carbon::now()]);
        DB::table('products')->insert(['name' => 'orc','price' => '10','count' => '10','machine_id' => '1', 'created_at' =>  \Carbon\Carbon::now()]);
    }
}
