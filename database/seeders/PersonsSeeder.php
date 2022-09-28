<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PersonsSeeder extends Seeder
{

    public function run()
    {
        $faker = Factory::create('pl_PL');
        DB::table('people')->truncate();
        for ($i = 0; $i < 100; $i++) {
            $gender = $faker->randomElement(['mężczyzna', 'kobieta']);
            DB::table('people')->insert([
                'name' => $faker->firstName($gender),
                'surname' => $faker->lastName(),
                'age' => $faker->numberBetween(1, 99),
                'gender' => $gender,
                'postal_code' => $faker->postcode(),
                'city' => $faker->city(),
                'street' => $faker->streetName(),
                'house_number' => $faker->buildingNumber(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

        }
    }
}
