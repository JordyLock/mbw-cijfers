<?php

use Faker\Generator as Faker;
use Faker\Provider\Lorem as Lorem;

$factory->define(App\Group::class, function (Faker $faker) {
	$lorem = new Lorem($faker);
	$klassen = array('MBIAO16A5', 'MBIAO16A0', 'MBIAO17A5', 'MBIAO16A0');
    return [
        'name' => $klassen[array_rand($klassen)],
        'mentor' => $faker->word,
    ];
});