<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class RentSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 50) as $index) {
            DB::table('rents')->insert([
                "book_id" => $faker->numberBetween($min = 1, $max = 130),
                "user_id" => $faker->numberBetween($min = 1, $max = 49),
            ]);

            };
    }
}