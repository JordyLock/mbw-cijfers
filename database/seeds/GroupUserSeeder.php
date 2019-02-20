<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class GroupUserSeeder extends Seeder

{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 16; $i++) { 
            # code...
        $faker = Faker::create();
        DB::table('group_user')->insert([
            'group_id' => $faker->biasedNumberBetween($min = 1, $max = 5, $function = 'sqrt'),
            'user_id' => $faker->biasedNumberBetween($min = 3, $max = 17, $function = 'sqrt'),
        ]);
        }
    }
}