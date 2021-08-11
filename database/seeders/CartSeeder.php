<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++){
            DB::table('carts')->insert([
                'user_id' => mt_rand(0, 9),
                'product_id' => mt_rand(0, 9),
                'count' => mt_rand(0, 30),
            ]);
        }
    }
}
