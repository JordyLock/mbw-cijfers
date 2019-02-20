<?php

use Faker\Generator as Faker;

$factory->define(App\Group_user::class, function (Faker $faker) {
    return [
    	'group_id' => $faker->biasedNumberBetween($min = 1, $max = 5, $function = 'sqrt'),
        'user_id' => $faker->biasedNumberBetween($min = 3, $max = 17, $function = 'sqrt'),
    ];
});
