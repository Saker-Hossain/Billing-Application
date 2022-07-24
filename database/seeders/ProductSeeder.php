<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        foreach (range(1, 10) as $index) {
            DB::table('products')->insert([
                'code' => Str::random(10),
                'name' => Str::random(10),
                'rate' => Str::random(10),

            ]);

        }
    }
}