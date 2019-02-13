<?php

use Faker\Generator as Faker;
use Faker\Provider\Lorem as Lorem;

$factory->define(App\Group::class, function (Faker $faker) {
	$lorem = new Lorem($faker);
    return [
        'name' => $faker->word,
        'mentor' => $faker->word,
    ];
});