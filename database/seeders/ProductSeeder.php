<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++){
            DB::table('products')->insert([
                'user_id' => mt_rand(1, 10),
                'name' => Str::random(10),
                'count' => mt_rand(0, 30),
                'price' => mt_rand(1000, 11000),
            ]);
        }

    }
}
