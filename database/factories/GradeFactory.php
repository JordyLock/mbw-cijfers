<?php

use Faker\Generator as Faker;
use Faker\Provider\Lorem as Lorem;

$factory->define(App\Grade::class, function (Faker $faker) {
	$lorem = new Lorem($faker);
	$vakken = array('Engels', 'Nederlands', 'Wiskunde', 'Duits');
    return [
        'subject' => $vakken[array_rand($vakken)],
        'grade' => $faker->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 10),
        'user_id' => $faker->biasedNumberBetween($min = 3, $max = 17, $function = 'sqrt'),
        'test_name' => $faker->word,
        'description' => $lorem->words(10,true),
    ];
});