<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\Rent;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $rents = Rent::all();
        foreach ($rents as $rent) {
            $rent->update([
                'invoice_number' => $faker->ean8,
            ]);
        }
    }
}
