<?php

use Faker\Generator as Faker;
use Faker\Provider\Lorem as Lorem;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
	$tussenvoegsels = array('de', 'van de', 'van der', 'van');
	$lorem = new Lorem($faker);
    return [
        'name' => $faker->firstName,
        'prefix' => $tussenvoegsels[array_rand($tussenvoegsels)],
        'lastname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'role' => 'student',
        'classname' => 'n.v.t',
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
