<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach (range(1, 10) as $index) {
            DB::table('customers')->insert([
                'name' => Str::random(10),
                'phone' => Str::random(10),
                'address' => Str::random(10),
            ]);
        }
    }
}